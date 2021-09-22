<template>
    <div class="bill-box">
        <div class="img-wrapper">
            <img :src="productImage(items.image)" alt="img" class="image-block imaged w-100 images-product">
        </div>
        <div class="price" v-html="items.price"></div>
        <p v-html="items.title"></p>
        <a v-if="action" href="#" class="btn btn-primary btn-block btn-sm">Купить</a>
    </div>
</template>

<script>
export default {
    name: "ProductItem",
    props: {
        items: {
            required: true,
            type: Object
        },
        action:{
            default: true
        }
    },
    methods:{
        productImage(image){
            if(image.toString().startsWith('products/')){
                return './../assets/sample/'+image
            }
            return image
        }
    }
}
</script>
<style>
.images-product {
    object-fit: contain;
}
</style>
