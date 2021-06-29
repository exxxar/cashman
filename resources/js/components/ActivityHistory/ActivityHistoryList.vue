<template>
    <div class="section mt-4">
        <div class="section-heading padding">
            <h2 class="title">History Activity</h2>
            <a :href="'app-transactions.html'" class="link">View All</a>
        </div>
        <div class="transactions">
            <a :href="'app-transaction-detail.html'" class="item" v-for="item in activity">
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
                {image: "assets/sample/avatar/avatar4.jpg", name: "Beatriz Brito", type: "Transfer", price: " + 187 $"},
                {image: "assets/sample/avatar/avatar4.jpg", name: "Beatriz Brito", type: "Transfer", price: " - 187 $"},
                {image: "assets/sample/avatar/avatar4.jpg", name: "Beatriz Brito", type: "Transfer", price: " + 187 $"},
                {image: "assets/sample/avatar/avatar4.jpg", name: "Beatriz Brito", type: "Transfer", price: " - 187 $"},
            ]
        }
    }
}
</script>
