<template>
    <!-- card block -->
    <div class="card-block bg-primary">
        <div class="card-main">
            <div class="card-button dropdown">
                <img :src="'assets/sample/'+cashback.company.image" alt="img" class="image-block imaged w76">
            </div>
            <div class="balance">
                <span class="label">Кэшбек</span>
                <h1 class="title">$ {{ cashback.value }}</h1>
            </div>
            <div class="in">
                <div class="card-number" style="font-size: 10px!important;">
                    <span class="label">Описание</span>
                    {{ cashback.description }}
                </div>
                <div class="bottom">
                    <div class="card-expiry">
                        <span class="label">Сумма</span>
                        $ {{ cashback.money_in_check }}
                    </div>
                    <div class="card-ccv">
                        <span class="label">Тип</span>
                        {{ cashback.type }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * card block -->
</template>

<script>
export default {
    name: "CashBackItem",
    props: {
        cashback: {
            type: Object,
            required: true
        }
    }
}
</script>
