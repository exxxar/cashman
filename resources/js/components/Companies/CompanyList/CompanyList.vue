<template>
    <div class="section mb-3 mt-4">
        <div class="section-heading padding">
            <h2 class="title">Companies</h2>
            <a :href="'/search-company'" class="link">View All</a>
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
                {title: "title1", description: "Music Monthly Subscription", image: "assets/sample/brand/2.jpg"},
                {title: "title2", description: "Music Monthly Subscription", image: "assets/sample/brand/1.jpg"},
                {title: "title3", description: "Music Monthly Subscription", image: "assets/sample/brand/3.jpg"},
                {title: "title4", description: "Music Monthly Subscription", image: "assets/sample/brand/4.jpg"},
            ]
        }
    }
}
</script>

<style scoped>

</style>
