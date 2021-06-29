<template>
    <div id="appCapsule">
        <Header>
            <template v-slot:left>
                <a :href="'#'" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                Акции
            </template>
        </Header>
        <div class="section mt-2 text-center">
            <h4>Категории</h4>
        </div>
        <ul class="listview link-listview inset" v-for="category in categories">
            <CategoryList :category=category></CategoryList>
        </ul>
        <div class="section mt-2 text-center">
            <h4>Истории</h4>
        </div>
        <StoryList></StoryList>
        <div class="section mt-2 text-center">
            <h4>Продукты</h4>
        </div>
        <div class="section tab-content mt-2 mb-1">
            <!-- waiting tab -->
            <div class="tab-pane fade show active" id="waiting" role="tabpanel">
                <div class="row">
                    <div class="col-6 mb-2" v-for="item in items">
                        <ProductItem :items=item></ProductItem>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ProductItem from "./ProductItem";
import CategoryList from "./CategoryList";
import Header from "../LayoutComponents/Header";
import StoryList from "../Stories/StoryList";

export default {
    name: "ProductList",
    components: {StoryList, CategoryList, ProductItem, Header},
    data: function () {
        return {
            items: [
                {
                    image: "assets/sample/brand/2.jpg",
                    price: 14,
                    description: "Music Monthly Subscription"
                },
                {
                    image: "assets/sample/brand/2.jpg",
                    price: 14,
                    description: "Music Monthly Subscription"
                },
                {
                    image: "assets/sample/brand/2.jpg",
                    price: 14,
                    description: "Music Monthly Subscription"
                },
                {
                    image: "assets/sample/brand/2.jpg",
                    price: 14,
                    description: "Music Monthly Subscription"
                },
            ],
            categories: [
                {title: "Категория 1", number: 1},
                {title: "Категория 2", number: 2},
                {title: "Категория 2", number: 2},
            ]
        }
    }
}
</script>
