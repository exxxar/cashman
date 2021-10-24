<template>
    <div class="modal fade" id="AdminsModal" tabindex="-1" aria-labelledby="CashbackModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 v-if="operation==='Add'" class="modal-title">Добавление администратора компании</h5>
                    <h5 v-if="operation==='Delete'" class="modal-title">Удаление администратора компании</h5>
                </div>
                <form @submit.prevent="operation==='Add' ? addAdmin() : deleteAdmin()">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Код пользователя</label>
                            <input v-model="form.user" type="text" name="user"
                                   placeholder="Код пользователя"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('user') }">
                            <HasError :form="form" field="user"></HasError>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Закрыть</button>
                        <button v-if="operation==='Add'" type="submit" class="btn btn-success">Добавить администратора
                        </button>
                        <button v-if="operation==='Delete'" type="submit" class="btn btn-success">Удалить
                            администратора
                        </button>
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
    name: "AdminsModal",
    components: {HasError},
    props: {
        operation: {
            required: true,
            type: String
        },
        company: {
            required: true
        }
    },
    data() {
        return {
            form: new Form({
                user: null,
                company: 0
            })
        }
    },
    methods: {
        deleteAdmin() {
            this.form.company = this.company
            this.form.post('api/delete/company/admin').then((response) => {
                $('#AdminsModal').modal('hide')
                this.form.user = null
                if (response.data.error !== undefined) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Выполнение операции невозможно!',
                        text: 'Выбранный пользователь не является администратором компании',
                    })
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Операция прошла успешно!',
                        text: 'Администратор успешно удален',
                    })
                }

            }).catch(() => {

            });
        },
        addAdmin() {
            this.form.company = this.company
            this.form.post('api/add/company/admin').then(() => {
                $('#AdminsModal').modal('hide')
                this.form.user = null
                Swal.fire({
                    icon: 'success',
                    title: 'Операция прошла успешно!',
                    text: 'Администратор успешно добавлен',
                })
            }).catch(() => {

            });
        }
    }
}
</script>

<style scoped>

</style>
