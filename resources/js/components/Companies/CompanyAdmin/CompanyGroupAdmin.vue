<template>
<fragment>
<Header>
    <template v-slot:left>
        <a href="#" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </template>
    <template v-slot:title>
        Администраторы компании
    </template>
</Header>
    <div id="appCapsule" class="full-height">
    <div class="section inset mt-2 mb-2">
    <ul class="listview image-listview inset">
        <li v-for="admin in admins">
           <FriendItem :user="admin" type="admin"></FriendItem>
        </li>

    </ul>
    </div>
</div>
</fragment>
</template>
<script>
import Header from "../../LayoutComponents/Header";
import FriendItem from "../../Users/FriendItem";

export default {
    name: "CompanyGroupAdmin",
    components:{FriendItem, Header},
    data: function () {
        return {
            admins: [
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

<style scoped>

</style>
