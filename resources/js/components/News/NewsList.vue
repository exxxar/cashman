<template>
    <div class="section mt-4">
        <div class="section-heading padding">
            <h2 class="title">Последние новости</h2>
            <a href="news" class="link">Посмотреть все</a>
        </div>
        <!-- carousel multiple -->
        <div class="carousel-multiple splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide" v-for="item in items">
                        <NewsItem :item="item"></NewsItem>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import NewsItem from "./NewsItem";

export default {
    name: "NewsList",
    components: {NewsItem},
    data: function () {
        return {
            items: [
                {id: 1, image: "assets/sample/photo/1.jpg", title: "What will be the value of bitcoin in the next..."},
                {id: 2, image: "assets/sample/photo/2.jpg", title: "Rules you need to know in business"},
                {id: 3, image: "assets/sample/photo/3.jpg", title: "10 easy ways to save your money"},
                {id: 4, image: "assets/sample/photo/4.jpg", title: "10 easy ways to save your money"}
            ]
        }
    }
}
</script>
