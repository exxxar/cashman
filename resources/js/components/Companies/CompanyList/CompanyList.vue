<template>
    <div class="section mt-4">
        <div class="section-heading padding">
            <h2 class="title">Компании</h2>
            <a href="/search-company" class="link">Посмотреть все</a>
        </div>
        <!-- carousel single -->
        <div class="carousel-multiple splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide" v-for="company in companies">
                        <CompanyItem :company="company"></CompanyItem>
                    </li>
                </ul>
            </div>
        </div>
        <!-- * carousel single -->
    </div>
</template>

<script>
import CompanyItem from "./CompanyItem";

export default {
    name: "CompanyList",
    components: {CompanyItem},
    data: function () {
        return {
            companies: []
        }
    },
    methods:{
        getList(){
            axios.get('api/company/list')
                .then( response => {
                    this.companies = response.data
                })
                .catch( error => {
                    console.log(error);
                })
        }
    },
    mounted(){
        this.getList();
    }

}
</script>
