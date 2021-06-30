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
                <a href="app-notifications.html" class="headerButton">
                    <ion-icon class="icon" name="notifications-outline"></ion-icon>
                    <span class="badge badge-danger">4</span>
                </a>
                <a href="user-settings" class="headerButton">
                    <img src="assets/sample/avatar/avatar1.jpg" alt="image" class="imaged w32">
                    <span class="badge badge-danger">6</span>
                </a>
            </template>
        </Header>
        <SideMenu></SideMenu>
        <div id="appCapsule">
            <StatisticsSummary :cashback="1500"></StatisticsSummary>
            <br/>
            <MainStatisctic></MainStatisctic>
            <HistoryActionList :show-detail="false"></HistoryActionList>
            <AchievementList :show-detail="false"></AchievementList>
            <CashBackList></CashBackList>
            <StoryList></StoryList>
            <ProductTile></ProductTile>
            <CompanyList></CompanyList>
            <UserList :show-friends="true"></UserList>
            <NewsList></NewsList>
            <Footer></Footer>
        </div>
        <BottomMenu></BottomMenu>
    </fragment>
</template>

<script>
import Header from "../LayoutComponents/Header";
import AchievementList from "../Achievements/AchievementList";
import SideMenu from "../LayoutComponents/SideMenu";
import UserList from "../Users/UserList";
import ProductTile from "../Products/ProductTile";
import CashBackList from "../CashBack/CashBackList";
import Footer from "../LayoutComponents/Footer";
import BottomMenu from "../LayoutComponents/BottomMenu";
import HistoryActionList from "../HistoryAction/HistoryActionList";
import StoryList from "../Stories/StoryList";
import MainStatisctic from "../UserStatistic/MainStatistic";
import StatisticsSummary from "../UserStatistic/StatisticsSummary";
import NewsList from "../News/NewsList";
import CompanyList from "../Companies/CompanyList/CompanyList";

export default {
    name: "UserPageComponent",
    components: {
        CompanyList,
        NewsList,
        StatisticsSummary,
        MainStatisctic,
        StoryList,
        HistoryActionList,
        BottomMenu, Footer, CashBackList, ProductTile, UserList, AchievementList, Header, SideMenu
    }
}
</script>
