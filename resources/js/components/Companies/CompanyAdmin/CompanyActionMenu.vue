<template>
    <fragment>
        <Header>
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                Меню действий
            </template>
        </Header>
        <div class="section mt-2">
            <div class="section-title">Blocked</div>
            <div class="card">
                <div class="card-body">

                    <div class="mt-1"></div>

                    <button type="button" class="btn btn-primary btn-lg btn-block">Списать CashBack</button>
                    <div class="mt-1"></div>

                    <button type="button" class="btn btn-primary btn-lg btn-block" @click="getPercent(10)">Начислить
                        CashBack 10%
                    </button>
                    <div class="mt-1"></div>

                    <button type="button" class="btn btn-primary btn-lg btn-block" @click="getPercent(5)">Начислить
                        CashBack 5%
                    </button>
                    <div class="mt-1"></div>

                    <button type="button" class="btn btn-primary btn-lg btn-block">Добавить администратора</button>
                    <div class="mt-1"></div>

                    <button type="button" class="btn btn-primary btn-lg btn-block">Убрать администратора</button>
                    <div class="mt-1"></div>

                    <button type="button" class="btn btn-primary btn-lg btn-block">Завершить работу</button>

                </div>
            </div>
        </div>
        <CashbackModal :company="company" :percent="percent"></CashbackModal>
    </fragment>
</template>

<script>
import Header from "../../LayoutComponents/Header";
import CashbackModal from "../../Modals/CashbackModal";

export default {
    name: "CompanyActionMenu",
    components: {CashbackModal, Header},
    props: {
        company: {
            required: true
        }
    },
    data() {
        return {
            percent: 0
        }
    },
    methods: {
        getPercent(num) {
            this.percent = num
            $('#CashbackModal').modal('show');
        }
    }
}
</script>

<style scoped>

</style>
