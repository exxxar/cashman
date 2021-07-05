<template>
    <a href="#">
        <div class="blog-card">
            <img :src="company.image" alt="image" class="imaged w-100">
            <div class="text text-center right-button">
                <h3>{{ company.title }}</h3>
                <a @click="getMap" type="button" class="item btn btn-icon btn-primary pos-ab-right-5">
                    <ion-icon name="map-outline"></ion-icon>
                </a>
            </div>
        </div>
    </a>
</template>

<script>
export default {
    name: "CompanyItem",
    props: {
        company: {
            type: Object,
            required: true
        }
    },
    methods:
        {
            getMap() {
                axios.get('region-map/' + this.company.id);
                window.location.href = 'region-map/' + this.company.id;
            }
        }
}
</script>
<style>
.right-button{
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}
.pos-ab-right-5{
    position: absolute;
    right: 5%;
}
@media screen and (max-width: 576px) {
    .right-button{
        display: block;
    }
    .pos-ab-right-5 {
        position: relative;
        right: 0;
    }
}
</style>
