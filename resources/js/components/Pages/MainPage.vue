<template>
    <fragment>
        <Header>
            <template v-slot:left>
                <a :href="'#'" class="headerButton" data-bs-toggle="modal" data-bs-target="#sidebarPanel">
                    <ion-icon name="menu-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                <img :src="'assets/logo.png'" alt="logo" class="logo">
            </template>
            <template v-slot:right>
                <a :href="'app-notifications.html'" class="headerButton">
                    <ion-icon class="icon" name="notifications-outline"></ion-icon>
                    <span class="badge badge-danger">4</span>
                </a>
                <a :href="'app-settings.html'" class="headerButton">
                    <img :src="'assets/sample/avatar/avatar1.jpg'" alt="image" class="imaged w32">
                    <span class="badge badge-danger">6</span>
                </a>
            </template>
        </Header>
        <SideMenu></SideMenu>
        <div id="appCapsule">
            <ActivityHistoryList></ActivityHistoryList>
            <StoryList></StoryList>
            <ProductTile></ProductTile>
            <NewsList></NewsList>
            <UserList :show-friends="false"></UserList>
            <CallbackForm></CallbackForm>
            <Footer></Footer>
        </div>
        <BottomMenu></BottomMenu>
    </fragment>
</template>

<script>
import Header from "../LayoutComponents/Header";
import SideMenu from "../LayoutComponents/SideMenu";
import BottomMenu from "../LayoutComponents/BottomMenu";
import Footer from "../LayoutComponents/Footer";
import CallbackForm from "../Callback/CallbackForm";
import ProductTile from "../Products/ProductTile";
import StoryList from "../Stories/StoryList";
import ActivityHistoryList from "../ActivityHistory/ActivityHistoryList";
import UserList from "../Users/UserList";
import NewsList from "../News/NewsList";

export default {
    name: "MainPageComponent",
    components: {
        NewsList,
        UserList,
        ActivityHistoryList, StoryList, ProductTile, CallbackForm, Footer, BottomMenu, SideMenu, Header}
}
</script>

<style scoped>

</style>
