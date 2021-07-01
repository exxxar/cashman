<template>
    <fragment>
        <Header>
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                You Friends
            </template>
            <template v-slot:right>
                <a href="/friends-tree" type="button" class="btn btn-text-primary">Friends Tree</a>
            </template>
        </Header>
        <br/>
        <div id="appCapsule">
            <div class="section inset mt-2 mb-2">
                <div class="accordion" id="accordionExample5">
                    <div class="accordion-item">
                        <h2 class="accordion-header bg-primary">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accordiond1">
                                История добавления друзей
                            </button>
                        </h2>
                        <div id="accordiond1" class="accordion-collapse collapse" data-bs-parent="#accordionExample5">
                            <div class="accordion-body">
                                <UserFriendsAddHistory></UserFriendsAddHistory>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="listview image-listview inset">
                <li v-for="friend in friends">
                    <FriendItem :user=friend></FriendItem>
                </li>
            </ul>
            <Footer></Footer>
        </div>
        <BottomMenu></BottomMenu>
    </fragment>
</template>

<script>
import Header from "../LayoutComponents/Header";
import FriendItem from "./FriendItem";
import UserFriendsAddHistory from "./UserFriendsAddHistory";
import BottomMenu from "../LayoutComponents/BottomMenu";
import Footer from "../LayoutComponents/Footer";

export default {
    name: "UserFriendsList",
    components: {Footer, BottomMenu, UserFriendsAddHistory, FriendItem, Header},
    data: function () {
        return {
            friends: [
                {avatar: "assets/sample/avatar/avatar9.jpg", name: "Alex", region: "Florida"},
                {avatar: "assets/sample/avatar/avatar9.jpg", name: "Alex", region: "Florida"},
                {avatar: "assets/sample/avatar/avatar9.jpg", name: "Alex", region: "Florida"},
                {avatar: "assets/sample/avatar/avatar9.jpg", name: "Alex", region: "Florida"},
                {avatar: "assets/sample/avatar/avatar9.jpg", name: "Alex", region: "Florida"},
            ]
        }
    },
}
</script>
