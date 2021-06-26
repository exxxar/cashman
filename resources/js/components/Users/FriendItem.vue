<template>
    <a href="#" class="item">
        <img :src="user.avatar" alt="image" class="imaged w86 rounded">
        <div class="in">
            <div>
                <header>Friend</header>
                <header>{{user.name}}</header>
                <footer>{{user.region}}</footer>
            </div>
            <span class="text-muted">Profile</span>
        </div>
    </a>
</template>

<script>
import Header from "../LayoutComponents/Header";
export default {
    name: "FriendItem",
    components: {Header},
    props: {
        user:
            {
                required: true,
                type: Object
            },

    }
}
</script>

<style scoped>
.listview > li header, li footer {
    font-size: 16px !important;
    margin: 10% !important;
}
</style>
