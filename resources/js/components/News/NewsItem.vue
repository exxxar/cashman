<template>
    <a :href="'news/' + this.item.id">
        <div class="blog-card">
            <img class="img w-100 fill fixed-height-images" v-lazy="'./../assets/sample/'+item.images.main" alt="image" >
            <div class="news-text">
                <h4 class="news-title">{{ item.title }}</h4>
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
.fixed-height-images{
    object-fit: cover;
}
.blog-card .news-title {
    display:flex;
    text-align: center;
    justify-content: center;
    margin: 0;
    font-weight: 500;
    line-height: 1.4em;
    overflow: hidden;
}
@media (max-width: 320px) {
    .fixed-height-images{
        height: 100px;
    }
    .blog-card .news-text {
        padding: 3% 5%;
    }
    .blog-card .news-title {
        height: 90px;
        font-size: 85%;
    }
}
@media (min-width: 320px) and (max-width: 375px) {
    .fixed-height-images{
        height: 110px;
    }
    .blog-card .news-text {
        padding: 3% 5%;
    }
    .blog-card .news-title {
        height: 90px;
        font-size: 85%;
    }
}
@media (min-width: 375px) and (max-width: 425px) {
    .fixed-height-images{
        height: 125px;
    }
    .blog-card .news-text {
        padding: 3% 5%;
    }
    .blog-card .news-title {
        height: 95px;
        font-size: 95%;
    }
}
@media (min-width: 425px) and (max-width: 600px) {
    .fixed-height-images{
        height: 125px;
    }
    .blog-card .news-text {
        padding: 7%;
    }
    .blog-card .news-title {
        height: 90px;
        font-size: 14px;
    }
}
@media (min-width: 600px) and (max-width: 768px) {
    .fixed-height-images{
        height: 130px;
    }
    .blog-card .news-text {
        padding: 5%;
    }
    .blog-card .news-title {
        height: 105px;
        font-size: 15px;
    }
}
@media (min-width: 768px) and (max-width: 992px) {
    .fixed-height-images{
        height: 140px;
    }
    .blog-card .news-text {
        padding: 8%;
    }
    .blog-card .news-title {
        height: 110px;
        font-size: 16px;
    }
}
@media (min-width: 992px) and (max-width: 1024px) {
    .fixed-height-images{
        height: 150px;
    }
    .blog-card .news-text {
        padding: 8%;
    }
    .blog-card .news-title {
        height: 110px;
        font-size: 18px;
    }
}
@media (min-width: 1024px) and (max-width: 1200px) {
    .fixed-height-images{
        height: 200px;
    }
    .blog-card .news-text {
        padding: 8%;
    }
    .blog-card .news-title {
        height: 115px;
        font-size: 17px;
    }
}
@media (min-width: 1200px) and (max-width: 1400px) {
    .fixed-height-images{
        height: 200px;
    }
    .blog-card .news-text {
        padding: 2%;
    }
    .blog-card .news-title {
        height: 110px;
        font-size: 20px;
    }
}
@media (min-width: 1400px) {
    .fixed-height-images{
        height: 250px;
    }
    .blog-card .news-text {
        padding: 5%;
    }
    .blog-card .news-title {
        height: 90px;
        font-size: 20px;
    }
}
</style>
