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
    props:{
        items:{
            type:Object,
            required: true
        }
    }
}
</script>
