<template>
    <div class="modal fade" id="CashbackModal" tabindex="-1" aria-labelledby="CashbackModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 v-if="type==='Начисление'" class="modal-title">Начисление кэшбека
                        {{company.cashback_percent}}%</h5>
                    <h5 v-if="type==='Списание'" class="modal-title">Списание кэшбека</h5>
                </div>
                <form @submit.prevent="type==='Начисление' ? debitingCashback() : offsCashback()">
                    <div class="modal-body">
                        <div v-if="type==='Начисление'" class="form-group">
                            <label>Код пользователя</label>
                            <input  v-model="form.user" type="text" name="user"
                                   placeholder="Код пользователя"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('user') }">
                            <HasError :form="form" field="user"></HasError>
                        </div>
                        <div  v-if="type==='Списание'"  class="form-group">
                            <label>Код пользователя</label>
                            <input v-model="form.user" type="text" name="user"
                                    placeholder="Код пользователя" v-on:blur="getUserBalance"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('user') }">
                            <HasError :form="form" field="user"></HasError>
                        </div>
                        <p v-if="score!==null">Доступная сумма для списания - {{score}}</p>
                        <div class="form-group">
                            <label>Номер чека</label>
                            <input v-model="form.description" type="text" name="description"
                                   placeholder="Номер чека"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('description') }">
                            <HasError :form="form" field="description"></HasError>
                        </div>
                        <div class="form-group">
                            <label>Сумма чека</label>
                            <input v-model="form.sum" type="text" name="sum"
                                   placeholder="Сумма чека"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('sum') }">
                            <HasError :form="form" field="sum"></HasError>
                        </div>
                        <div class="form-group">
                            <label>Фото чека</label>
                            <vue-dropzone
                                ref="myVueDropzone"
                                id="dropzone"
                                :options="dropzoneOptions"
                                :useCustomSlot="true"
                                v-on:vdropzone-success="uploadSuccess"
                                v-on:vdropzone-removed-file="fileRemoved"
                            >
                                <div class="dropzone-custom-content">
                                    <h3 class="dropzone-custom-title">Перетащите файлы для загрузки</h3>
                                    <div class="subtitle">...или нажмите, чтобы загрузить файлы с Вашего компьютера
                                    </div>
                                </div>
                            </vue-dropzone>
                        </div>
                        <div v-if="type==='Начисление'" class="form-group">
                            <label>Сумма списания</label>
                            <input v-model="calculatedCashBack" type="text" name="cashback"
                                   placeholder="Сумма списания" readonly
                                   class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" @click="filesRemove">
                            Закрыть
                        </button>
                        <button v-if="type==='Начисление'" type="submit" class="btn btn-success">Начислить кэшбек
                            {{company.cashback_percent}}%
                        </button>
                        <button v-if="type==='Списание'" type="submit" class="btn btn-success">Списать кэшбек</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import Form from "vform";
import {HasError} from "vform/src/components/bootstrap5"
import {eventBus} from "../../app";
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'

export default {
    name: "CashbackModal",
    components: {HasError, vueDropzone: vue2Dropzone},
    props: {
        company: {
            required: true
        },
        admin: {
            required: true,
            type: Number
        },
        user: {
            default: null
        },
        type: {
            required: true,
            type: String
        }
    },
    data() {
        return {
            form: new Form({
                user: null,
                description: "",
                sum: null,
                cashback: null,
                company: 0,
                admin: 0,
                image: null
            }),
            dropzoneOptions: {
                url: 'api/description/photo',
                acceptedFiles: ".png, .jpg, .jpeg",
                addRemoveLinks: true,
                maxFiles: 1
            },
            score: null
        }
    },
    computed: {
        calculatedCashBack() {
            return this.form.cashback = ((this.form.sum / 100) * this.company.cashback_percent).toFixed(2)
        }
    },
    mounted() {
        eventBus.$once('userId', this.getUserId)
        this.getUserBalance()
    },
    methods: {
        debitingCashback() {
            this.form.company = this.company
            this.form.admin = this.admin
            this.form.cashback = this.calculatedCashBack
            this.form.post('api/debiting/cashback').then(() => {
                $('#CashbackModal').modal('hide')
                this.filesRemove()
                this.form.user = null
                this.form.description = ""
                this.form.sum = null
                this.form.cashback = null
                Swal.fire({
                    icon: 'success',
                    title: 'Кэшбек начислен',
                    text: 'Начисление кэшбека в ' + this.company.cashback_percent + '% прошло успешно!',
                })

            })
                .catch(() => {

                });

        },
        offsCashback() {
            this.form.company = this.company
            this.form.admin = this.admin
            this.form.post('api/offs/cashback').then((response) => {
                $('#CashbackModal').modal('hide')
                this.filesRemove()
                this.form.user = null
                this.form.description = ""
                this.form.sum = null
                this.score = null;
                if (response.data.error !== undefined) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Выполнение списания невозможно!',
                        text: 'Недостаточно средств для выполнения операции',
                    })
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Кэшбек списан',
                        text: 'Списание кэшбека прошло успешно!',
                    })
                }
            })
                .catch(() => {

                });
        },
        uploadSuccess(file, response) {
            this.form.image = response.file;
        },
        fileRemoved() {
            this.form.image = null
        },
        filesRemove() {
            this.$refs.myVueDropzone.removeAllFiles()
        },
        getUserId(userId) {
            this.form.user = userId
        },
        getUserBalance(){
            if(this.form.user!==null && this.type==='Списание') {
                axios.get('api/balance/user/' + this.form.user + '/' + this.company['id']).then((response) => {
                    this.score = response.data.score
                })
            }

        }
    }
}
</script>

<style scoped>

</style>
