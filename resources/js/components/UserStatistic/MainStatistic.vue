<template>
    <div class="section">
        <div class="section-heading">
            <h2 class="title">Статистика</h2>
            <a href="#" class="link">View All</a>
        </div>
        <div class="row mt-2">
            <div class="col-6" v-for="statistic in statistics">
                <ItemStatistic :statistic=statistic></ItemStatistic>
            </div>
        </div>
    </div>
</template>

<script>
import ItemStatistic from "./ItemStatistic";

export default {
    name: "MainStatistic",
    components: {ItemStatistic},
    data: function () {
        return {
            statistics: [
                {title: "Income", value: "200"},
                {title: "Income", value: "200"},
                {title: "Income", value: "200"},
                {title: "Income", value: "200"}
            ]
        }
    }
}
</script>
