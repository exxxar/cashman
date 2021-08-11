<template>
    <fragment>
        <Header class="bg-primary text-light">
            <template v-slot:left>
                <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#sidebarPanel">
                    <ion-icon name="menu-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                <img src="assets/logo.png" alt="logo" class="logo">
            </template>
            <template v-slot:right>
                <a v-if="auth_user===null" href="/login" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="log-in-outline"></ion-icon>
                    </div>
                </a>
                <a v-if="auth_user!==null" href="/history" class="headerButton">
                    <ion-icon class="icon" name="notifications-outline"></ion-icon>
                    <span class="badge badge-danger">1</span>
                </a>
                <a v-if="auth_user!==null" href="/user-profile" class="headerButton">
                    <img :src="'storage/'+auth_user.avatar" alt="image" class="imaged w32">
                    <span class="badge badge-danger">2</span>
                </a>
            </template>
        </Header>
        <SideMenu :auth_user="auth_user"></SideMenu>
        <div id="appCapsule" class="full-height">
            <ActivityHistoryList></ActivityHistoryList>
            <StoryList :stories="stories"></StoryList>
            <ProductTile></ProductTile>
            <NewsList :items="news"></NewsList>
            <CompanyList :companies="companies"></CompanyList>
            <UserList :show-friends="false"></UserList>
            <CallbackForm></CallbackForm>
        </div>
        <Footer class="padding-bottom-70"></Footer>
        <BottomMenu></BottomMenu>
    </fragment>
</template>

<script>
import Header from "../LayoutComponents/Header";
import BottomMenu from "../LayoutComponents/BottomMenu";
import Footer from "../LayoutComponents/Footer";
import CallbackForm from "../Callback/CallbackForm";
import ProductTile from "../Products/ProductTile";
import StoryList from "../Stories/StoryList";
import ActivityHistoryList from "../ActivityHistory/ActivityHistoryList";
import UserList from "../Users/UserList";
import NewsList from "../News/NewsList";
import CompanyList from "../Companies/CompanyList/CompanyList";
import SideMenu from "../LayoutComponents/SideMenu";

export default {
    name: "MainPageComponent",
    components: {
        CompanyList,
        NewsList,
        UserList,
        ActivityHistoryList,
        StoryList,
        ProductTile,
        CallbackForm,
        Footer,
        BottomMenu,
        Header,
        SideMenu
    },
    props:{
        auth_user:{
            default: null
        },
        news:{
            required: true
        },
        companies:{
            required: true
        },
        stories:{
            required: true
        },
    },
}
</script>
