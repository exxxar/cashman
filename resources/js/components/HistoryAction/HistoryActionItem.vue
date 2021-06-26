<template>
    <a  :href="'history/action-' + this.action.id" @click="showActionDetail" class="item">
        <div class="icon-box bg-primary">
            <img :src="action.logo" alt="image" class="imaged w48 rounded">
        </div>
        <div class="in">
            <div>
                <div class="mb-05"><strong>{{action.value}}</strong></div>
                <div class="text-small mb-05">{{action.description}}<b> $ {{action.money_in_check}}</b></div>
                <div class="text-xsmall">{{action.created_at}}</div>
            </div>
            <span class="badge badge-primary badge-empty"></span>
        </div>
    </a>
</template>

<script>
export default {
    name: "HistoryActionItem",
    props:{
        action:{
            required: true,
            type: Object
        }
    },
    methods:{
        showActionDetail()
        {
            axios.get('history/action-' + this.action.id)
        }
    }
}
</script>

<style scoped>

</style>
