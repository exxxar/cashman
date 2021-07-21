<template>
    <fragment>
        <Header>
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                News
            </template>
        </Header>
        <div id="appCapsule" class="full-height">
            <div class="section tab-content mt-2 mb-2">
                <div class="row">
                    <div class="col-6 mb-2" v-for="item in items">
                        <NewsItem :item="item"></NewsItem>
                    </div>
                </div>
                <div>
                    <a href="javascript:;" class="btn btn-block btn-primary btn-lg">Load More</a>
                </div>
            </div>
        </div>
        <BottomMenu></BottomMenu>
    </fragment>
</template>

<script>
import NewsItem from "../News/NewsItem";
import Header from "../LayoutComponents/Header";
import BottomMenu from "../LayoutComponents/BottomMenu";
import Footer from "../LayoutComponents/Footer";

export default {
    name: "NewsPage",
    components: {Footer, BottomMenu, NewsItem, Header},
    data: function () {
        return {
            items: [
                {id: 1, image: "assets/sample/photo/1.jpg", title: "What will be the value of bitcoin in the next..."},
                {id: 2, image: "assets/sample/photo/2.jpg", title: "Rules you need to know in business"},
                {id: 3, image: "assets/sample/photo/3.jpg", title: "10 easy ways to save your money"},
                {id: 4, image: "assets/sample/photo/4.jpg", title: "10 easy ways to save your money"}
            ]
        }
    }
}
</script>
