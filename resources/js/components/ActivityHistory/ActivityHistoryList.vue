<template>
    <div class="section mt-4">
        <div class="section-heading padding">
            <h2 class="title">История активности</h2>
            <a href="#" class="link">Посмотреть все</a>
        </div>
        <div class="transactions mx-3">
            <a href="#" class="item" v-for="item in activity">
                <ActivityHistoryItem :activity=item></ActivityHistoryItem>
            </a>
        </div>
    </div>
</template>

<script>
import ActivityHistoryItem from "./ActivityHistoryItem";

export default {
    name: "ActivityHistoryList",
    components: {ActivityHistoryItem},
    data: function () {
        return {
            activity: [
                {image: "assets/sample/avatar/avatar4.jpg", name: "Beatriz Brito", type: "Transfer", price: " + 18 $"},
                {image: "assets/sample/avatar/avatar4.jpg", name: "Beatriz Brito", type: "Transfer", price: " - 18 $"},
                {image: "assets/sample/avatar/avatar4.jpg", name: "Beatriz Brito", type: "Transfer", price: " + 18 $"},
                {image: "assets/sample/avatar/avatar4.jpg", name: "Beatriz Brito", type: "Transfer", price: " - 18 $"},
            ]
        }
    }
}
</script>
