<template>
    <div class="modal fade" id="AddNew" tabindex="-1" aria-labelledby="AddNewLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="UpdateLabel">Редактировать рекламу</h5>
                </div>
                <form @submit.prevent="updateAdvertisement()">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Название рекламы</label>
                            <input v-model="form.title" type="text" name="title"
                                   placeholder="Название рекламы"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('title') }">
                            <HasError :form="form" field="title"></HasError>
                        </div>
                        <div class="form-group">
                            <label>Описание рекламы</label>
                            <input v-model="form.description" type="text" name="description"
                                   placeholder="Описание рекламы"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('description') }">
                            <HasError :form="form" field="description"></HasError>
                        </div>

                        <div class="form-group">
                            <label>Изображение рекламы</label>
                            <div class="custom-file-upload" id="fileUpload1">
                                <img :src="form.images" alt="image" class="imaged"
                                     style="width:inherit">
                                <input name="file" type="file" id="fileuploadInput" accept=".png, .jpg, .jpeg"
                                       @change="handleFile">
                                <label for="fileuploadInput">

                                <span>
                                    <strong>
                                        <ion-icon name="arrow-up-circle-outline"></ion-icon>
                                        <i>Upload a Photo</i>
                                    </strong>
                                </span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Тип рекламы</label>
                            <input v-model="form.type" type="text" name="type"
                                   placeholder="Тип рекламы"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                            <HasError :form="form" field="type"></HasError>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-success">Обновить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import {HasError} from "vform/src/components/bootstrap5"

export default {
    name: "AdvertisementModal",
    components: {HasError},
    props: {
        form: {
            required: true
        }
    },
    methods: {

        handleFile(event) {
            this.form.images = event.target.files[0]
        },
        createAdvertisement() {
            this.form.post('api/admin/advertisement')
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
