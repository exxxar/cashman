<template>
    <div class="section full mt-4">
        <div class="section-heading padding">
            <h2 class="title">Пользователи</h2>
            <a href="javascript:;" class="link">Просмотр</a>
        </div>
        <!-- carousel small -->
        <div class="carousel-small splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide" v-for="user in users">
                        <UserItem :user=user></UserItem>
                    </li>
                </ul>
            </div>
        </div>
        <!-- * carousel small -->
    </div>
</template>

<script>
import UserItem from "./UserItem";
export default {
    name: "UserList",
    components: {UserItem},
    data: function(){
        return{
            users: [
                {avatar: "assets/sample/avatar/avatar9.jpg", name: "Alex"},
                {avatar: "assets/sample/avatar/avatar9.jpg", name: "Alex"},
                {avatar: "assets/sample/avatar/avatar9.jpg", name: "Alex"},
                {avatar: "assets/sample/avatar/avatar9.jpg", name: "Alex"},
                {avatar: "assets/sample/avatar/avatar9.jpg", name: "Alex"},
                {avatar: "assets/sample/avatar/avatar9.jpg", name: "Alex"},
                {avatar: "assets/sample/avatar/avatar9.jpg", name: "Alex"},
                {avatar: "assets/sample/avatar/avatar9.jpg", name: "Alex"},
                {avatar: "assets/sample/avatar/avatar9.jpg", name: "Alex"},
                {avatar: "assets/sample/avatar/avatar9.jpg", name: "Alex"},
            ]
        }
    }
}
</script>

<style scoped>

</style>
