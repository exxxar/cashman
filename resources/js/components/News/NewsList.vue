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
    props:{
        items:{
            type: Object,
            required: true
        }
    }
}
</script>
