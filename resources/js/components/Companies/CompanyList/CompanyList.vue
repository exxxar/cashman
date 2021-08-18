<template>
    <div class="section mt-4" id="splide-slider">
        <div class="section-heading padding">
            <h2 class="title">Компании</h2>
            <a href="/search-company" class="link">Посмотреть все</a>
        </div>
        <!-- carousel single -->
        <div class="carousel-multiple splide" >
            <div class="splide__track">
                <ul class="splide__list">
                    <li v-if="user!==null" class="splide__slide" v-for="company in companies" >
                        <CompanyItem :company="company" :user="user"></CompanyItem>
                    </li>
                    <li v-if="user===null" class="splide__slide" v-for="company in companies">
                        <CompanyItem :company="company"></CompanyItem>
                    </li>
                </ul>
            </div>
        </div>
        <h4 class="text-center" v-if="companies.length===0">Вы пока не зарегистрировались ни в одной компании.
            Нажмите "Посмотреть все" для отображения списка компаний</h4>
        <!-- * carousel single -->
    </div>
</template>

<script>
import CompanyItem from "./CompanyItem";


export default {
    name: "CompanyList",
    components: {CompanyItem},
    props:{
        user:{
            default: null
        },
        companies:{
            type:Object,
        }
    },



}
</script>
