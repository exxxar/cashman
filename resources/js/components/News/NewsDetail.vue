<template>
    <fragment>
        <Header>
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                {{ item.title }}
            </template>
        </Header>
        <div id="appCapsule" class="full-height">
            <div class="section mt-2">
                <h1>
                    {{ item.title }}
                </h1>
                <div class="blog-header-info mt-2 mb-2">
                    <div>
                        <img :src="item.avatar" alt="img" class="imaged w24 rounded me-05">
                        by {{ item.name }}
                    </div>
                    <div>
                        {{ item.created_at }}
                    </div>
                </div>
            </div>
            <div class="section mt-2">
                <figure>
                    <img :src="item.image" alt="image" class="imaged img-fluid">
                </figure>
                <p>
                    {{ item.description }}
                </p>
                <figure>
                    <img v-if="item.image2" :src="item.image2" alt="image" class="imaged img-fluid">
                </figure>
                <h3 v-if="item.title2">{{ item.title2 }}</h3>
                <p v-if="item.description2">
                    {{ item.description2 }}
                </p>
            </div>
            <div class="section">
                <button class="btn btn-block btn-primary" data-bs-toggle="modal" data-bs-target="#actionSheetShare">
                    <ion-icon name="share-outline"></ion-icon>
                    Share This Post
                </button>
            </div>
            <div class="section mt-3">
                <h2>Related Posts</h2>
                <div class="row mt-3">
                    <div class="col-6 mb-2" v-for="item in items">
                        <NewsItem :item="item"></NewsItem>
                    </div>
                </div>
            </div>
        </div>
        <BottomMenu></BottomMenu>
        <ShareModal></ShareModal>
    </fragment>
</template>

<script>
import ShareModal from "../Modals/ShareModal";
import NewsItem from "./NewsItem";
import Header from "../LayoutComponents/Header";
import BottomMenu from "../LayoutComponents/BottomMenu";

export default {
    name: "NewsDetail",
    components: {BottomMenu, NewsItem, ShareModal, Header},
    props: {
        item: {
            type: Object,
            required: true
        }
    },
    data: function () {
        return {
            items: [
                {
                    id: 1,
                    image: "../assets/sample/photo/1.jpg",
                    title: "What will be the value of bitcoin in the next..."
                },
                {
                    id: 2,
                    image: "../assets/sample/photo/2.jpg",
                    title: "Rules you need to know in business"
                },
                {
                    id: 3,
                    image: "../assets/sample/photo/3.jpg",
                    title: "10 easy ways to save your money"
                },
                {
                    id: 4,
                    image: "../assets/sample/photo/4.jpg",
                    title: "10 easy ways to save your money"
                }
            ]
        }
    }
}
</script>
