<template>
    <div class="modal fade" id="CashbackModal" tabindex="-1" aria-labelledby="CashbackModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CashbackLabel">Списание кэшбека {{percent}}%</h5>
                </div>
                <form @submit.prevent="debitingCashback()">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Код пользователя</label>
                            <input v-model="form.user" type="text" name="user"
                                   placeholder="Код пользователя"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('user') }">
                            <HasError :form="form" field="user"></HasError>
                        </div>
                        <div class="form-group">
                            <label>Номер чека</label>
                            <input v-model="form.description" type="text" name="description"
                                   placeholder="Номер чека"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('description') }">
                            <HasError :form="form" field="description"></HasError>
                        </div>
                        <div class="form-group" @keypress="calculatePercent">
                            <label>Сумма чека</label>
                            <input v-model="form.sum" type="text" name="sum"
                                   placeholder="Сумма чека"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('sum') }">
                            <HasError :form="form" field="sum"></HasError>
                        </div>
                        <div class="form-group">
                            <label>Сумма списания</label>
                            <input v-model="form.cashback" type="text" name="cashback"
                                   placeholder="Сумма списания" readonly
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('cashback') }">
                            <HasError :form="form" field="cashback"></HasError>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-success">Списать кэшбек {{percent}}%</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import Form from "vform";
import {HasError} from "vform/src/components/bootstrap5"

export default {
    name: "CashbackModal",
    components:{HasError},
    props:{
        percent:{
            required: true,
        },
        company:{
            required: true
        }
    },
    data(){
        return{
            form:new Form({
                user: null,
                description: "",
                sum: null,
                cashback: null,
                company_id: 0
            })
        }
    },
    methods:{
        debitingCashback(){
            this.form.company_id = this.company
            this.form.post('api/debiting/cashback') .then(() => {
                $('#CashbackModal').modal('hide')
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })
                swalWithBootstrapButtons.fire(
                    'Кэшбек списан',
                    'Списание кэшбека в '+this.percent+'% прошло успешно!',
                    'success'
                )
            })
                .catch(() => {

                });

        },
        calculatePercent(){
            this.form.cashback = Math.ceil(this.form.sum/100*this.percent)
        }
    }
}
</script>

<style scoped>

</style>
