<template>
    <div class="section mt-4">
        <div class="section-heading padding">
            <h2 class="title">Компании</h2>
            <a href="/search-company" class="link">Посмотреть все</a>
        </div>
        <!-- carousel single -->
        <div class="carousel-multiple splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide" v-for="company in companies">
                        <CompanyItem :company="company"></CompanyItem>
                    </li>
                </ul>
            </div>
        </div>
        <!-- * carousel single -->
    </div>
</template>

<script>
import CompanyItem from "./CompanyItem";

export default {
    name: "CompanyList",
    components: {CompanyItem},
    data: function () {
        return {
            companies: [
                {id: 1,title: "title1", description: "Music Monthly Subscription", image: "assets/sample/brand/2.jpg"},
                {id: 2,title: "title2", description: "Music Monthly Subscription", image: "assets/sample/brand/1.jpg"},
                {id: 3,title: "title3", description: "Music Monthly Subscription", image: "assets/sample/brand/3.jpg"},
                {id: 4,title: "title4", description: "Music Monthly Subscription", image: "assets/sample/brand/4.jpg"},
            ]
        }
    }
}
</script>
