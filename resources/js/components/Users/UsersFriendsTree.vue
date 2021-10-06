<template>
    <fragment>
        <Header>
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                Дерево друзей
            </template>
        </Header>
        <div id="appCapsule" class="full-height">
            <br/>
            <h4 class="text-center" v-if="treeData===null">Пригласите друзей в одну из ваших компаний, чтобы построить
                дерево друзей!</h4>
            <div v-if="treeData===null" class="d-flex justify-content-center">
                <button @click="addFriends" type="button" class="btn btn-inline btn-primary me-1">
                    Пригласить друзей
                </button>
            </div>
            <div id="UsersFriendsTree" v-if="treeData!==null">
                <TreeChart :json="treeData"/>
            </div>
        </div>
        <Footer class="padding-bottom-70"></Footer>
        <BottomMenu></BottomMenu>
    </fragment>
</template>

<script>
import Header from "../LayoutComponents/Header";
import Footer from "../LayoutComponents/Footer";
import BottomMenu from "../LayoutComponents/BottomMenu";
import TreeChart from "vue-tree-chart";

export default {
    name: "UsersFriendsTree",
    components: {BottomMenu, Footer, Header, TreeChart},
    props: {
        treeData: {
            required: true
        },
        id: {
            required: true,
            type: Number
        },
        company: {
            required: true,
            type: Number
        }
    },
    methods: {
        addFriends() {
            window.location.href = '/promo-code/' + this.id + '/' + this.company;
        }
    }

}
</script>
