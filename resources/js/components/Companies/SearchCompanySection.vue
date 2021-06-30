<template>
    <fragment>
        <Header>
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
        <div id="appCapsule">

            <div class="section tab-content mt-2 mb-2">

                <div class="row">
                    <div class="col-4 mb-2" v-for="company in companies">
                        <CompanyItem :company="company"></CompanyItem>
                    </div>
                </div>
            </div>
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
            companies: [
                {title: "title1", description: "Music Monthly Subscription", image: "assets/sample/brand/2.jpg"},
                {title: "title2", description: "Music Monthly Subscription", image: "assets/sample/brand/1.jpg"},
                {title: "title3", description: "Music Monthly Subscription", image: "assets/sample/brand/3.jpg"},
                {title: "title4", description: "Music Monthly Subscription", image: "assets/sample/brand/4.jpg"},
            ]
        }
    }
}
</script>

<style scoped>

</style>
