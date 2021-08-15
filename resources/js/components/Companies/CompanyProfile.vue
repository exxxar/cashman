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
        <div id="appCapsule" class="full-height">

            <div class="section mt-2">
                <div class="profile-head">
                    <div class="avatar">
                        <img :src="'assets/sample/'+company.image" alt="avatar" class="imaged w64 rounded">
                    </div>
                    <div class="in">
                        <h2 >{{ company.title }}</h2>
                    </div>
                </div>
            </div>

            <div class="section full mt-2">
                <div class="profile-stats pl-2 pr-2">
                    <a href="#" class="item">
                        <strong>{{ products }}</strong>products
                    </a>
                    <a href="#" class="item">
                        <strong>{{ users }}</strong>users

                    </a>
                    <a href="#" class="item">
                        <strong>{{ stories.length }}</strong>stories

                    </a>

                    <a href="#" class="item">
                        <strong >{{ news.length }}</strong>news

                    </a>
                </div>
            </div>

            <div class="section mt-1 mb-2">
                <div class="profile-info">
                    <div class="bio subtext" >
                        <h3 v-if="company.description">О нас:</h3>
                        <h5 v-if="company.description">{{company.description}}</h5>
                        <h3 v-if="company.properties.time">Время работы:</h3>
                        <h4 v-if="company.properties.time">{{ company.properties.time }}</h4>
                        <h3 v-if="typeof(company.properties.address)!=='string' && company.properties.address">Наши адреса:</h3>
                        <div v-if="typeof(company.properties.address)!=='string'&& company.properties.address" v-for="address in company.properties.address">
                            <h4> {{ address }}</h4>
                        </div>
                        <h3 v-if="typeof(company.properties.address)==='string' && company.properties.address">Наш адрес:</h3>
                        <h4 v-if="typeof(company.properties.address)==='string' && company.properties.address">{{company.properties.address}}</h4>
                        <div v-for="(property, key) in company.properties">
                            <h4 v-if="key !== 'address' && key !== 'time'"> {{property}}</h4>

                        </div>
                    </div>
                    <div class="link" v-if="company.socials">
                        <h3>Социальные сети</h3>
                        <ul class="listview image-listview no-line no-space flush">
                            <li v-for="(social, key) in company.socials">
                                <div class="item" v-if="social!==null">
                                    <div class="icon-box bg-primary">
                                        <i :class="'fab fa-'+key"></i>
                                    </div>
                                    <div class="in">
                                        <div class="input-wrapper w-100">
                                            <a :href="social" target="_blank"><label>{{'Ссылка на профиль в '+key}}</label></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <StoryList :add-new="isAdmin" :stories="stories"></StoryList>
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
                        <li v-if="isAdmin" class="nav-item">
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
                                <div class="col-4 mb-2" v-for="item in news">
                                    <NewsItem :item="item"></NewsItem>
                                </div>

                            </div>
                        </div>

                        <div v-if="isAdmin" class="row" style="margin-left: 4px; margin-right: 5px">
                            <div class="col-6">
                                <a :href="'#'" class="btn btn-outline-primary btn-lg btn-block">Больше новостей</a>
                            </div>
                            <div class="col-6">
                                <a :href="'/add-advertising'" class="btn btn-lg btn-primary btn-block">Добавить новость</a>
                            </div>
                        </div>
                        <div v-if="!isAdmin" class="pr-2 pl-2">
                            <a href="#" class="btn btn-primary btn-lg btn-block">Больше новостей</a>
                        </div>
                    </div>
                    <!-- * feed -->

                    <!-- * friends -->
                    <div class="tab-pane fade" id="friends" role="tabpanel">
                        <ul class="listview image-listview flush transparent pt-1">
                            <li v-for="user in companyUsers">
                                <FriendItem :user="user"></FriendItem>
                            </li>

                        </ul>
                    </div>
                    <!-- * friends -->

                    <!--  bookmarks -->
                    <div class="tab-pane fade" id="bookmarks" role="tabpanel">
                        <div class="row">
                            <div class="col-4 mb-2" v-for="product in companyProducts">
                                <ProductItem :items="product" :action="!isAdmin"></ProductItem>
                            </div>
                        </div>
                        <div v-if="isAdmin" class="row" style="margin-left: 4px; margin-right: 5px">
                            <div class="col-6">
                                <a :href="'#'" class="btn btn-outline-primary btn-lg btn-block">Больше продуктов</a>
                            </div>
                            <div class="col-6">
                                <a :href="'#'" class="btn btn-lg btn-primary btn-block">Добавить продукт</a>
                            </div>
                        </div>
                        <div v-if="!isAdmin" class="pr-2 pl-2">
                            <a href="#" class="btn btn-primary btn-lg btn-block">Больше продуктов</a>
                        </div>
                    </div>
                    <!-- * bookmarks -->
                    <!-- settings -->
                    <div v-if="isAdmin" class="tab-pane fade" id="settings" role="tabpanel">
                        <ul class="listview image-listview text flush transparent pt-1">
                            <li>
                                <a :href="'/company-edit-'+company.id" class="item">
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
        },

        news:{
            required: true
        },
        stories:{
            required: true
        },
        products:{
            required: true
        },
        users:{
            required: true
        },
        isAdmin:{
            type:Boolean,
            default: false
        }

    },

    data: function () {
        return {
            companyItems: [
                {id: 1, image: "assets/sample/photo/1.jpg", title: "What will be the value of bitcoin in the next..."},
                {id: 2, image: "assets/sample/photo/2.jpg", title: "Rules you need to know in business"},
                {id: 3, image: "assets/sample/photo/3.jpg", title: "10 easy ways to save your money"},
                {id: 4, image: "assets/sample/photo/4.jpg", title: "10 easy ways to save your money"},
                {id: 5, image: "assets/sample/photo/2.jpg", title: "Rules you need to know in business"},
                {id: 6, image: "assets/sample/photo/3.jpg", title: "Rules you need to know in business"},
            ],
            companyUsers: [
                {avatar: "assets/sample/avatar/avatar9.jpg", name: "Alex", region: "Florida"},
                {avatar: "assets/sample/avatar/avatar9.jpg", name: "Alex", region: "Florida"},
                {avatar: "assets/sample/avatar/avatar9.jpg", name: "Alex", region: "Florida"},
                {avatar: "assets/sample/avatar/avatar9.jpg", name: "Alex", region: "Florida"},
                {avatar: "assets/sample/avatar/avatar9.jpg", name: "Alex", region: "Florida"},
            ],
            companyProducts: [
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
        console.log(this.news)
        console.log(this.stories)

    },

}
</script>

<style scoped>

</style>
