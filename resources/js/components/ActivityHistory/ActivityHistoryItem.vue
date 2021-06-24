<template>
    <fragment>
        <div class="detail">
            <img :src="activity.image" alt="img" class="image-block imaged w48">
            <div>
                <strong>{{activity.name}}</strong>
                <p>{{activity.type}}</p>
            </div>
        </div>
        <div class="right">
            <div class="price text-danger">{{activity.price}}</div>
        </div>
    </fragment>
</template>

<script>
export default {
    name: "ActivityHistoryItem",
    props:{
        activity:{
            required: true,
            type: Object
        }
    }
}
</script>

<style scoped>

</style>
