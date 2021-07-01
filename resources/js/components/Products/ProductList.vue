<template>
    <fragment>
        <div id="appCapsule">
            <Header>
                <template v-slot:left>
                    <a href="#" class="headerButton goBack">
                        <ion-icon name="chevron-back-outline"></ion-icon>
                    </a>
                </template>
                <template v-slot:title>
                    Products
                </template>
            </Header>
            <div class="section mt-4">
                <div class="section-heading padding">
                    <h2 class="title">Категории</h2>
                </div>
                <ul class="listview link-listview inset">
                    <li v-for="category in categories">
                        <a href="#">
                            {{ category.title }}
                            <span class="badge badge-primary">{{ category.number }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <StoryList></StoryList>
            <div class="section mt-4">
                <div class="section-heading padding">
                    <h2 class="title">Акции</h2>
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
            <Footer></Footer>
        </div>
        <BottomMenu></BottomMenu>
    </fragment>
</template>

<script>
import ProductItem from "./ProductItem";
import Header from "../LayoutComponents/Header";
import StoryList from "../Stories/StoryList";
import BottomMenu from "../LayoutComponents/BottomMenu";
import Footer from "../LayoutComponents/Footer";

export default {
    name: "ProductList",
    components: {Footer, StoryList, ProductItem, Header, BottomMenu},
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
