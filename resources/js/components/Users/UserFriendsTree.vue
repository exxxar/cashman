<template>
    <fragment>
        <Header>
            <template v-slot:left>
                <a href='#' class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                Дерево друзей
            </template>
        </Header>
        <br/>
    <div class="section mt- mb-2">
        <div class="section-title">Ваши рефералы</div>
        <div class="card">
            <!-- timeline -->
            <div class="timeline timed ms-1 me-2" v-for="friend in friends">
                <UserFriendsTreeItem :friend="friend"></UserFriendsTreeItem>
            </div>
            <!-- * timeline -->
        </div>
    </div>
    </fragment>
</template>

<script>
import UserFriendsTreeItem from "./UserFriendsTreeItem";
import Header from "../LayoutComponents/Header";
export default {
    name: "UserFriendsTree",
    components: {Header, UserFriendsTreeItem},
    data: function(){
        return{
            friends: [
                {avatar: "assets/sample/avatar/avatar9.jpg", created_at:"06:24 PM"},
                {avatar: "assets/sample/avatar/avatar9.jpg", created_at:"06:24 PM"},
                {avatar: "assets/sample/avatar/avatar9.jpg", created_at:"06:24 PM"},
                {avatar: "assets/sample/avatar/avatar9.jpg", created_at:"06:24 PM"},

            ]
        }
    },
}
</script>

<style scoped>

</style>
