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
                <a href="/history" class="headerButton">
                    <ion-icon class="icon" name="notifications-outline"></ion-icon>
                    <span class="badge badge-danger">1</span>
                </a>
                <a href="/user-profile" class="headerButton">
                    <img :src="'storage/'+auth_user.avatar" alt="image" class="imaged w32">
                    <span class="badge badge-danger">2</span>
                </a>
            </template>
        </Header>
        <SideMenu :auth_user="auth_user"></SideMenu>
        <div id="appCapsule" class="full-height">
            <StatisticsSummary :cashback="1500"></StatisticsSummary>
            <HistoryActionList :show-detail="false"></HistoryActionList>
            <AchievementList :show-detail="false"></AchievementList>
            <CashBackList></CashBackList>
            <StoryList></StoryList>
            <ProductTile></ProductTile>
            <CompanyList :user="auth_user"></CompanyList>
            <UserList :show-friends="true"></UserList>
            <NewsList></NewsList>
        </div>
        <Footer class="padding-bottom-70"></Footer>
        <BottomMenu></BottomMenu>
    </fragment>
</template>

<script>
import Header from "../LayoutComponents/Header";
import AchievementList from "../Achievements/AchievementList";
import UserList from "../Users/UserList";
import ProductTile from "../Products/ProductTile";
import CashBackList from "../CashBack/CashBackList";
import Footer from "../LayoutComponents/Footer";
import BottomMenu from "../LayoutComponents/BottomMenu";
import HistoryActionList from "../HistoryAction/HistoryActionList";
import StoryList from "../Stories/StoryList";
import StatisticsSummary from "../UserStatistic/StatisticsSummary";
import NewsList from "../News/NewsList";
import CompanyList from "../Companies/CompanyList/CompanyList";
import SideMenu from "../LayoutComponents/SideMenu";

export default {
    name: "UserPageComponent",
    components: {
        CompanyList,
        NewsList,
        StatisticsSummary,
        StoryList,
        HistoryActionList,
        BottomMenu, Footer, CashBackList, ProductTile, UserList, AchievementList, Header, SideMenu
    },
    props:{
        auth_user:{
            default: null
        }
    },
}
</script>
