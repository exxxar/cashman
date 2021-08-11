<template>
    <a :href="'news/' + this.item.id">
        <div class="blog-card">
            <img class="img imaged w-100 fill fixed-img-200-fill" v-lazy="'./../assets/sample/'+item.images.main" alt="image" >
            <div class="text">
                <h4 class="title">{{ item.title }}</h4>
            </div>
        </div>
    </a>
</template>

<script>
export default {
    name: "NewsItem",
    props: {
        item: {
            type: Object,
            required: true
        }
    }
}
</script>
<style>
.fixed-img-200-fill{
    object-fit: fill;
    height: 250px;
}
</style>
