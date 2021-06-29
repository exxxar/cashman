<template>
    <div class="section mt- mb-2">
        <div class="card">
            <!-- timeline -->
            <div class="timeline timed ms-1 me-2" v-for="friend in friends">
                <UserFriendsTreeItem :friend="friend"></UserFriendsTreeItem>
            </div>
            <!-- * timeline -->
        </div>
    </div>
</template>

<script>
import UserFriendsTreeItem from "./UserFriendsAddHistoryItem";
import Header from "../LayoutComponents/Header";

export default {
    name: "UserFriendsAddHistory",
    components: {Header, UserFriendsTreeItem},
    data: function () {
        return {
            friends: [
                {avatar: "assets/sample/avatar/avatar9.jpg", created_at: "06:24 PM"},
                {avatar: "assets/sample/avatar/avatar9.jpg", created_at: "06:24 PM"},
                {avatar: "assets/sample/avatar/avatar9.jpg", created_at: "06:24 PM"},
                {avatar: "assets/sample/avatar/avatar9.jpg", created_at: "06:24 PM"},
            ]
        }
    },
}
</script>
