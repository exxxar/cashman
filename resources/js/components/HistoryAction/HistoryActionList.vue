<template>
        <div class="section mt-4">
            <div v-if="!showDetail" class="section-heading">
                <h2 class="title">История последних действий</h2>
                <a :href="'/history'" class="link">View All</a>
            </div>
            <ul class="listview image-listview flush">
                <li class="active" v-for="action in actions">
                   <HistoryActionItem :action = action></HistoryActionItem>
                </li>
            </ul>

        </div>

</template>

<script>
import HistoryActionItem from "./HistoryActionItem";
export default {
    name: "HistoryActionList",
    components: {HistoryActionItem},
    data: function(){
        return{
            actions:[
                {id: 1, logo: "assets/sample/brand/1.jpg", value: "Payment Received", money_in_check: "200", description: "John sent you", type: "Payment Received", created_at: "5/3/2020 10:30 AM"},
                {id: 2,logo: "assets/sample/brand/2.jpg", value: "Payment Received", money_in_check: "200", description: "John sent you", type: "Payment Received", created_at: "5/3/2020 10:30 AM"},
                {id: 3,logo: "assets/sample/brand/3.jpg", value: "Payment Received", money_in_check: "200", description: "John sent you", type: "Payment Received", created_at: "5/3/2020 10:30 AM"},
                {id: 4,logo: "assets/sample/brand/4.jpg", value: "Payment Received", money_in_check: "200", description: "John sent you", type: "Payment Received", created_at: "5/3/2020 10:30 AM"}
              ]
        }
    },
    props:{
        showDetail:{
            required: true,
            type: Boolean
        }
    }
}
</script>

<style scoped>

</style>
