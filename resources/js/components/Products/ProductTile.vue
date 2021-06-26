<template>
    <div class="section full mt-4">
        <div class="section-heading padding">
            <h2 class="title">Акции</h2>
            <a :href="'products'" class="link">Посмотреть все</a>
        </div>
        <!-- carousel multiple -->
        <div class="carousel-multiple splide">
            <div class="splide__track">
                <ul class="splide__list">

                    <li class="splide__slide" v-for="item in items">
                        <ProductItem :items=item
                        ></ProductItem>
                    </li>

                </ul>
            </div>
        </div>
        <!-- * carousel multiple -->
    </div>

</template>

<script>
import ProductItem from "./ProductItem";
export default {
    name: "ProductTile",
    components:{ProductItem},
    data: function () {
        return {
            items: [
                {image: "assets/sample/brand/2.jpg",
                    price: 14,
                    description: "Music Monthly Subscription"},
                {image: "assets/sample/brand/2.jpg",
                    price: 14,
                    description: "Music Monthly Subscription"},
                {image: "assets/sample/brand/2.jpg",
                    price: 14,
                    description: "Music Monthly Subscription"},
                {image: "assets/sample/brand/2.jpg",
                    price: 14,
                    description: "Music Monthly Subscription"},
            ],
        }
    }
}
</script>

<style scoped>

</style>
