<template>
    <fragment>
            <Header>
                <template v-slot:left>
                    <a href="#" class="headerButton goBack">
                        <ion-icon name="chevron-back-outline"></ion-icon>
                    </a>
                </template>
                <template v-slot:title>
                    Акции
                </template>
            </Header>
        <div id="appCapsule" class="full-height">
            <div class="section mt-4">
                <div class="section-heading padding">
                    <h2 class="title">Категории</h2>
                </div>
                <ul class="listview link-listview inset">
                    <li v-for="category in categories">
                        <a href="#" @click="sortProducts(category)" v-scroll-to="'#products'">
                            {{ category.title }}
                            <span class="badge badge-primary">{{ category.number }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <StoryList :stories="stories"></StoryList>
            <div class="section mt-4" :key="trigger">
                <div class="section-heading padding">
                    <h2 v-if="currentCategory===''" class="title">Акции</h2>
                    <h2 v-if="currentCategory!==''" class="title" id="products">Акции из категории {{currentCategory}}</h2>
                </div>
                <div class="section tab-content mt-2 mb-1" >
                    <!-- waiting tab -->
                    <div class="tab-pane fade show active" id="waiting" role="tabpanel">
                        <div class="row d-flex justify-content-center">
                            <div class="col-6 col-sm-5 col-md-4 col-lg-3 col-xl-3 col-xxl-2 mb-2"
                                 v-for="item in paginatedProducts">
                                <ProductItem :items=item></ProductItem>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button :disabled='this.size >= items.length' href="javascript:;" class="btn btn-block btn-primary btn-lg" @click="increaseSize">Load More</button>
                </div>
            </div>
        </div>
        <Footer class="padding-bottom-70"></Footer>
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
            items: [],
            categories: [],
            stories: [],
            page: 0,
            size: 12,
            trigger: 0,
            currentCategory: ''
        }
    },
    methods:{
        getProductsAndCategories(){
            let vm = this
            axios.get('api/products')
                .then(response=> {
                    vm.items = response.data.products
                    vm.categories = response.data.categories
                    vm.stories = response.data.stories

                })
        },
        sortProducts(category){
            axios.get('products/category/'+category.id).then(response=>{
                this.items = response.data.products
                this.currentCategory = category.title
                this.trigger++
            })
        },
        increaseSize(){
            this.size+=this.size
        },
    },
    mounted() {
        this.getProductsAndCategories();
    },
    computed: {
        paginatedProducts() {
            const start = this.page * this.size,
                end = start + this.size;
            if (this.items.length > end) {
                return this.items.slice(start, end);
            }
            return this.items

        }
    },
}
</script>
