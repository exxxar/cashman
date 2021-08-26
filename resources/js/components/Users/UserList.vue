<template>
    <div class="section mt-4">
        <div class="section-heading padding">
            <h2 class="title">Пользователи</h2>
            <a v-if="showFriends" href="friends" class="link">Просмотреть все</a>
        </div>
        <!-- carousel small -->
        <splide :slides="users" :options="options">
            <splide-slide v-for="user in users" :key="user.id">
                <UserItem :user=user></UserItem>
            </splide-slide>
        </splide>
        <!-- * carousel small -->
    </div>
</template>

<script>
import UserItem from "./UserItem";
import { Splide, SplideSlide } from '@splidejs/vue-splide';
export default {
    name: "UserList",
    components: {UserItem,  Splide, SplideSlide},
    data: function () {
        return {
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
            ],
            options: {
                perPage: 9,
                rewind: false,
                type: "loop",
                gap: 16,
                padding: 16,
                arrows: false,
                pagination: false,
                breakpoints: {
                    768: {
                        perPage: 4
                    },
                    991: {
                        perPage: 7
                    }
                }
            },
        }
    },
    props: {
        showFriends: {
            required: true,
            type: Boolean
        }
    }
}
</script>
