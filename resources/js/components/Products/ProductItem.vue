<template>
    <div class="col-6 mb-2">
        <div class="bill-box">
            <div class="img-wrapper">
                <img :src="image" alt="img" class="image-block imaged w48">
            </div>
            <div class="price">{{price}}</div>
            <p>{{description}}</p>
            <a href="#" class="btn btn-primary btn-block btn-sm">BUY NOW</a>
        </div>
    </div>
</template>

<script>
export default {
    name: "ProductItem",
    props:{
        image:{
            type: String,
            required: true
        },
        price:{
            type: Float32Array,
            required: true
        },
        description:{
            type: String,
            required: true
        }
    }
}
</script>

<style scoped>

</style>
