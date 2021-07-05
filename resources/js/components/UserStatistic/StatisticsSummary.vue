<template>
    <fragment>
        <div class="section wallet-card-section pt-1">
            <div class="wallet-card">
                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title">Суммарный кэшбек</span>
                        <h1 class="total">$ {{ cashback }}</h1>
                    </div>
                    <div class="right">
                        <a href="#" class="button" data-bs-toggle="modal" data-bs-target="#depositActionSheet">
                            <ion-icon name="add-outline"></ion-icon>
                        </a>
                    </div>
                </div>
                <!-- * Balance -->
                <!-- Wallet Footer -->
                <div class="wallet-footer">
                    <div class="item" v-for="action in actions">
                        <StatisticAction :icon=action.icon
                                         :title=action.title
                                         :link=action.link
                                         :exchange=action.exchange></StatisticAction>
                    </div>
                </div>
                <!-- * Wallet Footer -->
            </div>
        </div>
        <div class="section">
            <div class="row mt-2">
                <div class="col-6" v-for="statistic in statistics">
                    <div class="stat-box">
                        <div class="title">{{ statistic.title }}</div>
                        <div class="value">{{ statistic.value }} $</div>
                    </div>
                </div>
            </div>
        </div>

        <TransactionsModal :title="currentTitle" :exchange=currentExchange></TransactionsModal>
        <TransactionsModal title="Увеличение суммарного кэшбека" modalID="depositActionSheet"
                           :recipient=false></TransactionsModal>
    </fragment>
</template>

<script>
import StatisticAction from "./StatisticAction";
import {eventBus} from "../../app";
import TransactionsModal from "../Modals/TransactionsModal";

export default {
    name: "StatisticsSummary",
    components: {StatisticAction, TransactionsModal},
    props: {
        cashback: {
            required: true,
            type: Number
        }
    },
    data: function () {
        return {
            actions: [
                {icon: 'withdraw', title: 'Вывод кэшбека'},
                {icon: 'send', title: 'Отправка кэшбека'},
                {icon: 'history', title: 'История действий', link: '/history'},
                {icon: 'exchange', title: 'Обмен кэшбека', exchange: true},
            ],
            currentTitle: '',
            currentExchange: false,
            statistics: [
                {title: "Income", value: "200"},
                {title: "Income", value: "200"},
                {title: "Income", value: "200"},
                {title: "Income", value: "200"}
            ]
        }
    },
    mounted() {
        eventBus.$on('showModal', this.getCurrentModal)
    },
    methods: {
        getCurrentModal(title, exchange) {
            this.currentTitle = title
            this.currentExchange = exchange
        }
    }
}
</script>
<style scoped>
.stat-box {
    margin: 1% !important;
}
</style>
