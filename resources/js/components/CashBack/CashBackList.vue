<template>
    <div class="section full mt-4">
        <div class="section-heading padding">
            <h2 class="title">История начисления/списания</h2>
            <a href="app-cards.html" class="link">View All</a>
        </div>

        <!-- carousel single -->
        <div class="carousel-single splide">
            <div class="splide__track">
                <ul class="splide__list">

                    <li class="splide__slide" v-for="cashback in cashbacks">
                       <CashBackItem :cashback=cashback></CashBackItem>
                    </li>

                </ul>
            </div>
        </div>
        <!-- * carousel single -->

    </div>
</template>

<script>
import CashBackItem from "./CashBackItem";
export default {
name: "CashBackList",
    components: {CashBackItem},
    data: function(){
    return{
        cashbacks:[
            {image: "assets/sample/brand/1.jpg", value: "1000", money_in_check:"200",
                description: "Кешбек с покупки телефона", type: "Начисление"},
            {image: "assets/sample/brand/2.jpg", value: "1000", money_in_check:"200",
                description: "Кешбек с покупки телефона", type: "Начисление"},
            {image: "assets/sample/brand/3.jpg", value: "1000", money_in_check:"200",
                description: "Кешбек с покупки телефона", type: "Начисление"},
        ]
    }
    }
}
</script>

<style scoped>

</style>
