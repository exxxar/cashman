<template>
    <div class="stat-box">
        <div class="title">{{ statistic.title }}</div>
        <div class="value text-success">{{ statistic.value }}</div>
    </div>
</template>

<script>
export default {
    name: "ItemStatistic",
    props: {
        statistic: {
            required: true,
            type: Object
        }
    }
}
</script>

<style scoped>
.stat-box {
    margin: 1% !important;
}
</style>
