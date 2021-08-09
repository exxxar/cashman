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
                    <div class="col-3 mb-2" v-for="company in companies">
                        <CompanyItem :company="company" :user="auth_user" :allow-add="true"></CompanyItem>
                    </div>
                </div>
            </div>
            <nav>
                <ul class="pagination pagination-rounded" >
                    <li :class="{ disabled: !pagination.prev_page_url }"
                        @click.prevent="getResults(pagination.prev_page_url)">
                        <a class="page-link" v-scroll-to="'#companies'" href="#">Предыдущая</a></li>
                    <li class="disabled ">
                        <a class="page-link" href="#" style="background: #fff !important;color: #6236FF !important;">
                            Страница {{ pagination.current_page }} из {{ pagination.last_page }}
                        </a>
                    </li>
                    <li :class="{ disabled: !pagination.next_page_url }"
                        @click.prevent="getResults(pagination.next_page_url)">
                        <a class="page-link" v-scroll-to="'#companies'" href="#">Следующая</a>
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

export default {
    name: "SearchCompanySection",
    components: {BottomMenu, SearchComponent, CompanyItem, Header},
    data: function () {
        return {
            companies: [],
            pagination: {}
        }
    },
    props:{
        auth_user:{
            default: null
        }
    },
    methods: {
        getResults(page_url) {
            page_url = page_url || '/api/company/search'
            axios.get(page_url)
                .then(response => {
                    this.companies = response.data.data
                    this.makePagination(response.data)
                });
        },
        makePagination(response) {
            this.pagination = {
                current_page: response.current_page,
                last_page: response.last_page,
                prev_page_url: response.prev_page_url,
                next_page_url: response.next_page_url,
            }
        },

    },
    mounted() {
        this.getResults();
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
