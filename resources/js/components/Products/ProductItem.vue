<template>
    <div class="bill-box">
        <div class="img-wrapper">
            <img :src="items.image" alt="img" class="image-block imaged w48">
        </div>
        <div class="price">{{ items.price }}</div>
        <p>{{ items.description }}</p>
        <a v-if="action" :href="'#'" class="btn btn-primary btn-block btn-sm">Купить</a>
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
    }
}
</script>
