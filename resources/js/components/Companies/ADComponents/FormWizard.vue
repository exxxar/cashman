<template>
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-pills nav-wizard nav-fill">
                <li @click="selectTab(index)" class="nav-item" :class="tab.isActive ? 'active' : 'in-active'" v-for="(tab, index) in tabs" v-bind:key="`tab-${index}`">
                    <a class="nav-link"  href="#">
                        <span class="tabStatus">{{index+1}} </span>
                        <span class="tabLabel">{{tab.title}}</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="col-lg-8 mx-auto">

                <form>
                    <slot></slot>
                </form>

            </div>
        </div>
        <div class="card-footer text-center">
            <div class="btn-group" role="group">
                <button @click="previousTab" :disabled="currentTab === 0" class="btn btn-warning">Previous</button>
                <button @click="nextTab" v-if="currentTab < totalTabs - 1" class="btn btn-primary">Next</button>
                <button @click="onSubmit" v-if="currentTab === totalTabs - 1" class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>
</template>

<script>
import { store } from "./store.js";
export default {
    name: "FormWizard",
    data(){
        return{
            tabs: [],
            currentTab : 0,
            totalTabs : 0,
            storeState: store.state,
        }
    },
    mounted(){
        this.tabs = this.$children;
        this.totalTabs = this.tabs.length;
        this.currentTab = this.tabs.findIndex((tab) => tab.isActive === true);
        if(this.currentTab === -1 && this.totalTabs > 0){  //Select first tab if none is marked selected
            this.tabs[0].isActive = true;
            this.currentTab = 0;
        }
    },
    methods:{
        previousTab(){
            this._switchTab(this.currentTab - 1);
        },

        nextTab(){

            if(this._validateCurrentTab() === false)
                return;

            this._switchTab(this.currentTab + 1);

        },

        selectTab(index){
            if(index < this.currentTab){
                this._switchTab(index);
            }

            if(this._validateCurrentTab() === false){
                return;
            }

            this._switchTab(index);

        },


        onSubmit(){
            if(this._validateCurrentTab() === false)
                return;
            this.$emit('onComplete');
        },

        _switchTab(index){
            //Disable all tabs
            this.tabs.forEach(tab => {
                tab.isActive = false;
            });

            this.currentTab = index;
            this.tabs[index].isActive = true;
        },

        _validateCurrentTab(){
            if(Object.keys(this.storeState.v).length === 0 && this.storeState.v.constructor === Object)
                return true;

            this.storeState.v.$touch();

            if (this.storeState.v.$invalid) {
                return false;
            }

            return true;
        }
    },
    watch:{
        currentTab(){
            store.setCurrentTab(this.currentTab);
        }
    }
}
</script>

<style scoped>

</style>
