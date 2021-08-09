<template>
    <fragment>
        <Header id="companies">
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                Компании
            </template>
            <template v-slot:right>
                <a href="javascript:;" class="headerButton toggle-searchbox">
                    <ion-icon name="search-outline"></ion-icon>
                </a>
            </template>
        </Header>
        <SearchComponent></SearchComponent>
        <div id="appCapsule" class="full-height">
            <div class="section tab-content mt-2 mb-2">
                <div class="row">
                    <div class="col-3 mb-2" v-for="company in paginatedData">
                        <CompanyItem :company="company" :user="auth_user" :allow-add="true"></CompanyItem>
                    </div>
                </div>
            </div>
            <nav>
                <ul class="pagination pagination-rounded" >
                    <li >
                        <button class="page-link" @click="prevPage" :disabled="pageNumber===0" type="button">Предыдущая</button></li>
                    <li class="disabled ">
                        <a class="page-link"  style="background: #fff !important;color: #6236FF !important;">
                            Страница {{ pageNumber+1 }} из {{ pageCount }}
                        </a>
                    </li>
                    <li>
                        <button class="page-link"  @click="nextPage" :disabled="pageNumber >= pageCount-1" type="button">Следующая</button>
                    </li>
                </ul>
            </nav>

        </div>
        <BottomMenu></BottomMenu>
    </fragment>
</template>

<script>
import Header from "../LayoutComponents/Header";
import CompanyItem from "./CompanyList/CompanyItem";
import SearchComponent from "../LayoutComponents/SearchComponent";
import BottomMenu from "../LayoutComponents/BottomMenu";
import {mapGetters} from 'vuex'

export default {
    name: "SearchCompanySection",
    components: {BottomMenu, SearchComponent, CompanyItem, Header},
    data: function () {
        return {
            pageNumber: 0,
            size: 8

        }
    },
    methods:{
        nextPage(){
            this.pageNumber++;
        },
        prevPage(){
            this.pageNumber--;
        }
    },
    props:{
        auth_user:{
            default: null
        }
    },

    mounted() {
        this.$store.dispatch('GET_COMPANIES')

        window.Echo.channel('search')
            .listen('.searchResults', (e) => {
                this.$store.commit('SET_COMPANIES', e.companies)
            })
    },
    computed: {
        groupedCompanies() {
            return this.companies;
        },
        ...mapGetters([
            'companies'
        ]),
        pageCount(){
            let l = this.groupedCompanies.length,
                s = this.size;
            return Math.ceil(l/s);
        },
        paginatedData(){
            const start = this.pageNumber * this.size,
                end = start + this.size;
            return this.groupedCompanies.slice(start, end);
        }
    }
}
</script>

<style scoped>
.pagination {
    justify-content: center;
}
.page-link{
    background: #6236FF !important;
    color: #fff !important;
}

</style>
