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

                    <button type="button" class="btn btn-primary btn-lg btn-block" @click="showModal">Начислить
                        CashBack {{company.cashback_percent}}%
                    </button>
                    <div class="mt-1"></div>

                    <div class="mt-1"></div>

                    <button type="button" class="btn btn-primary btn-lg btn-block">Добавить администратора</button>
                    <div class="mt-1"></div>

                    <button type="button" class="btn btn-primary btn-lg btn-block">Убрать администратора</button>
                    <div class="mt-1"></div>

                    <button type="button" class="btn btn-primary btn-lg btn-block">Завершить работу</button>

                </div>
            </div>
        </div>
        <CashbackModal :company="company" :admin="admin" :user="user"></CashbackModal>
    </fragment>
</template>

<script>
import Header from "../../LayoutComponents/Header";
import CashbackModal from "../../Modals/CashbackModal";
import {eventBus} from "../../../app";

export default {
    name: "CompanyActionMenu",
    components: {CashbackModal, Header},
    props: {
        company: {
            required: true
        },
        admin:{
            required:true,
            type: Number
        }
    },
    data() {
        return {
            user: 0
        }
    },
    methods: {
        showModal() {
            $('#CashbackModal').modal('show');
        }
    },
    mounted() {
            let param = location.search
            if(param.length>0) {
                console.log(param.slice(param.indexOf('=')+1))
                eventBus.$emit('userId', param.slice(param.indexOf('=')+1))
                $('#CashbackModal').modal('show');
            }

    }
}
</script>

<style scoped>

</style>
