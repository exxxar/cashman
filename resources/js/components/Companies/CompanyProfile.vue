<template>
    <fragment>
        <Header class="bg-primary text-light">
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                {{ company.title }}
            </template>
            <template v-slot:right>
                <a href="javascript:;" class="headerButton">
                    <ion-icon name="mail-outline"></ion-icon>
                </a>
                <a href="javascript:;" class="headerButton">
                    <ion-icon name="person-add-outline"></ion-icon>
                </a>
            </template>
        </Header>
        <div id="appCapsule">

            <div class="section mt-2">
                <div class="profile-head">
                    <div class="avatar">
                        <img :src="company.image" alt="avatar" class="imaged w64 rounded">
                    </div>
                    <div class="in">
                        <h3 class="name">{{ company.title }}</h3>
                        <h5 class="subtext">{{ company.position }}</h5>
                    </div>
                </div>
            </div>

            <div class="section full mt-2">
                <div class="profile-stats pl-2 pr-2">
                    <a href="#" class="item">
                        <strong>{{ company.products }}</strong>products
                    </a>
                    <a href="#" class="item">
                        <strong>{{ company.users }}</strong>users
                    </a>
                    <a href="#" class="item">
                        <strong>{{ company.stories }}</strong>stories
                    </a>

                    <a href="#" class="item">
                        <strong>{{ company.news }}</strong>news
                    </a>
                </div>
            </div>

            <div class="section mt-1 mb-2">
                <div class="profile-info">
                    <div class=" bio">
                        {{ company.description }}
                    </div>
                    <div class="link">
                        <a href="#">{{ company.region }}</a>
                    </div>
                </div>
            </div>
            <StoryList add-new=true></StoryList>
            <br/>
            <div class="section full">
                <div class="wide-block transparent p-0">
                    <ul class="nav nav-tabs lined iconed" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#feed" role="tab">
                                <ion-icon name="grid-outline"></ion-icon>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#friends" role="tab">
                                <ion-icon name="people-outline"></ion-icon>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#bookmarks" role="tab">
                                <ion-icon name="bookmark-outline"></ion-icon>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#settings" role="tab">
                                <ion-icon name="settings-outline"></ion-icon>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- tab content -->
            <div class="section full mb-2">
                <div class="tab-content">

                    <!-- feed -->
                    <div class="tab-pane fade show active" id="feed" role="tabpanel">
                        <div class="mt-2 pr-2 pl-2">
                            <div class="row">
                                <div class="col-4 mb-2" v-for="item in items">
                                    <NewsItem :item="item"></NewsItem>
                                </div>

                            </div>
                        </div>

                        <div class="row" style="margin-left: 4px; margin-right: 5px">
                            <div class="col-6">
                                <a :href="'#'" class="btn btn-outline-primary btn-lg btn-block">Больше новостей</a>
                            </div>
                            <div class="col-6">
                                <a :href="'/add-advertising'" class="btn btn-lg btn-primary btn-block">Добавить новость</a>
                            </div>
                        </div>
                    </div>
                    <!-- * feed -->

                    <!-- * friends -->
                    <div class="tab-pane fade" id="friends" role="tabpanel">
                        <ul class="listview image-listview flush transparent pt-1">
                            <li v-for="user in users">
                                <FriendItem :user="user"></FriendItem>
                            </li>

                        </ul>
                    </div>
                    <!-- * friends -->

                    <!--  bookmarks -->
                    <div class="tab-pane fade" id="bookmarks" role="tabpanel">
                        <div class="row">
                            <div class="col-4 mb-2" v-for="product in products">
                                <ProductItem :items="product" :action=false></ProductItem>
                            </div>
                        </div>
                        <div class="row" style="margin-left: 4px; margin-right: 5px">
                            <div class="col-6">
                                <a :href="'#'" class="btn btn-outline-primary btn-lg btn-block">Больше продуктов</a>
                            </div>
                            <div class="col-6">
                                <a :href="'#'" class="btn btn-lg btn-primary btn-block">Добавить продукт</a>
                            </div>
                        </div>
                    </div>
                    <!-- * bookmarks -->
                    <!-- settings -->
                    <div class="tab-pane fade" id="settings" role="tabpanel">
                        <ul class="listview image-listview text flush transparent pt-1">
                            <li>
                                <a href="#" class="item">
                                    <div class="in">
                                        <div class="text-danger">Настройки профиля компании</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="item">
                                    <div class="in">
                                        <div>История начисления/списания</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="item">
                                    <div class="in">
                                        <div>Добавление промокода компании</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- * settings -->
                </div>
            </div>
            <!-- * tab content -->
        </div>
        <BottomMenu></BottomMenu>
    </fragment>
</template>

<script>
import Header from "../LayoutComponents/Header";
import Footer from "../LayoutComponents/Footer";
import BottomMenu from "../LayoutComponents/BottomMenu";
import StoryList from "../Stories/StoryList";
import NewsItem from "../News/NewsItem";
import FriendItem from "../Users/FriendItem";
import ProductItem from "../Products/ProductItem";
import ProductTile from "../Products/ProductTile";

export default {
    name: "CompanyProfile",
    components: {ProductTile, ProductItem, FriendItem, NewsItem, StoryList, BottomMenu, Footer, Header},
    props: {
        company: {
            type: Object,
            required: true
        }
    },
    data: function () {
        return {
            items: [
                {id: 1, image: "assets/sample/photo/1.jpg", title: "What will be the value of bitcoin in the next..."},
                {id: 2, image: "assets/sample/photo/2.jpg", title: "Rules you need to know in business"},
                {id: 3, image: "assets/sample/photo/3.jpg", title: "10 easy ways to save your money"},
                {id: 4, image: "assets/sample/photo/4.jpg", title: "10 easy ways to save your money"},
                {id: 5, image: "assets/sample/photo/2.jpg", title: "Rules you need to know in business"},
                {id: 6, image: "assets/sample/photo/3.jpg", title: "Rules you need to know in business"},
            ],
            users: [
                {avatar: "assets/sample/avatar/avatar9.jpg", name: "Alex", region: "Florida"},
                {avatar: "assets/sample/avatar/avatar9.jpg", name: "Alex", region: "Florida"},
                {avatar: "assets/sample/avatar/avatar9.jpg", name: "Alex", region: "Florida"},
                {avatar: "assets/sample/avatar/avatar9.jpg", name: "Alex", region: "Florida"},
                {avatar: "assets/sample/avatar/avatar9.jpg", name: "Alex", region: "Florida"},
            ],
            products: [
                {image: "assets/sample/brand/2.jpg", price: 14, description: "Music Monthly Subscription"},
                {image: "assets/sample/brand/2.jpg", price: 14, description: "Music Monthly Subscription"},
                {image: "assets/sample/brand/2.jpg", price: 14, description: "Music Monthly Subscription"},
                {image: "assets/sample/brand/2.jpg", price: 14, description: "Music Monthly Subscription"},
                {image: "assets/sample/brand/1.jpg", price: 140, description: "Music Monthly Subscription"},
                {image: "assets/sample/brand/3.jpg", price: 1400, description: "Music Monthly Subscription"},
            ],
        }
    },
    mounted() {
        document.querySelector('body').classList.add('bg-white');
    }
}
</script>

<style scoped>

</style>
