<template>
    <div class="modal fade" id="AddNew" tabindex="-1" aria-labelledby="AddNewLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" v-show="!editmode" id="AddNewLabel">Добавить новый товар</h5>
                    <h5 class="modal-title" v-show="editmode" id="UpdateLabel">Редактировать запись о товаре</h5>

                </div>
                <form @submit.prevent="editmode ? updateProduct() : createProduct()">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Название товара</label>
                            <input v-model="form.title" type="text" name="title"
                                   placeholder="Название товара"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('title') }">
                            <HasError :form="form" field="title"></HasError>
                        </div>
                        <div class="form-group">
                            <label>Описание товара</label>
                            <input v-model="form.description" type="text" name="description"
                                   placeholder="Описание товара"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('description') }">
                            <HasError :form="form" field="description"></HasError>
                        </div>
                        <div class="form-group">
                            <label>Цена</label>
                            <input v-model="form.price" type="number" name="price"
                                   placeholder="Цена"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('price') }">
                            <HasError :form="form" field="price"></HasError>
                        </div>
                        <div class="form-group">
                            <label>Цена по акции</label>
                            <input v-model="form.discount_price" type="number" name="discount_price"
                                   placeholder="Цена по акции"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('discount_price') }">
                            <HasError :form="form" field="discount_price"></HasError>
                        </div>
                        <div class="form-group">
                            <label>Тип акции</label>
                            <input v-model="form.type" type="text" name="type"
                                   placeholder="Тип акции"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                            <HasError :form="form" field="type"></HasError>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Закрыть</button>
                        <button v-show="editmode" type="submit" class="btn btn-success">Обновить</button>
                        <button v-show="!editmode" type="submit" class="btn btn-primary">Создать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { HasError} from "vform/src/components/bootstrap5"
export default {
    name: "ProductsModal",
    components:{HasError},
    props: {
        form: {
            required: true
        },
        editmode:{
            required: true
        }
    },
    methods: {
        updateProduct() {
            this.form.put('api/admin/products/' + this.form.id)
                .then(() => {
                    $('#AddNew').modal('hide');
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: 'btn btn-success',
                            cancelButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                    })
                    swalWithBootstrapButtons.fire(
                        'Обновлено',
                        'Выбранная запись была обновлена',
                        'success'
                    )
                    Fire.$emit('AfterCreate');
                })
                .catch(() => {

                });
        },
        createProduct() {
            this.form.post('api/admin/products')
                .then(() => {
                    Fire.$emit('AfterCreate');

                    $('#AddNew').modal('hide');

                    Toast.fire({
                        icon: 'success',
                        title: 'Запись успешно добавлена'
                    });
                })
                .catch(() => {

                })
        },
    }
}
</script>

<style scoped>

</style>
