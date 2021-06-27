<template>
    <a :href="'news/' + this.item.id" v-on:click="getNewsItem">
    <div class="blog-card">
        <img :src="item.image" alt="image" class="imaged w-100">
        <div class="text">
            <h4 class="title">{{item.title}}</h4>
        </div>
    </div>
    </a>
</template>

<script>
export default {
    name: "NewsItem",
    props:{
        item:{
            type:Object,
            required: true
        }
    },
    methods:{
        getNewsItem(){
            axios.get('news/' + this.item.id)
        }
    }
}
</script>

<style scoped>

</style>
