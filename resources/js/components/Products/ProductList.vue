<template>
    <div id="appCapsule">
        <Header>
            <template v-slot:left>
                <a href='/' class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
        </Header>
        <div class="section mt-2 text-center">
        <h4>Categories</h4>
        </div>
    <CategoryList></CategoryList>
        <div class="section mt-2 text-center">
        <h4>Products</h4>
        </div>
        <div class="section tab-content mt-2 mb-1">

            <!-- waiting tab -->
            <div class="tab-pane fade show active" id="waiting" role="tabpanel">
                <div class="row">

                    <ProductItem :image="image"
                                 :description="description"
                                 :price="price"
                    ></ProductItem>
                    <ProductItem :image="image"
                                 :description="description"
                                 :price="price"
                    ></ProductItem>
                    <ProductItem :image="image"
                                 :description="description"
                                 :price="price"
                    ></ProductItem>
                    <ProductItem :image="image"
                                 :description="description"
                                 :price="price"
                    ></ProductItem>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ProductItem from "./ProductItem";
import CategoryList from "./CategoryList";
import Header from "../LayoutComponents/Header";

export default {
    name: "ProductList",
    components: {CategoryList, ProductItem,  Header},
    data: function () {
        return {
            image: "assets/sample/brand/2.jpg",
            price: 14,
            description: "Music Monthly Subscription"
        }
    }
}
</script>

<style scoped>

</style>
