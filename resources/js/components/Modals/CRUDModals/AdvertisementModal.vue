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
                            <vue-dropzone
                                ref="myVueDropzone"
                                id="dropzone"
                                :class="{ 'is-invalid': form.errors.has('images') }"
                                :options="dropzoneOptions"
                                :useCustomSlot="true"
                                v-on:vdropzone-success="uploadSuccess"
                                v-on:vdropzone-removed-file="fileRemoved"
                            >
                                <div class="dropzone-custom-content">
                                    <h3 class="dropzone-custom-title">Drag and drop to upload content!</h3>
                                    <div class="subtitle">...or click to select a file from your computer</div>
                                </div>
                            </vue-dropzone>
                            <HasError :form="form" field="images"></HasError>
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
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
export default {
    name: "AdvertisementModal",
    components: {HasError, vueDropzone: vue2Dropzone},
    props: {
        form: {
            required: true
        }
    },
    data(){
        return{
            dropzoneOptions: {
                url: 'api/add-story',
                acceptedFiles: ".png, .jpg, .jpeg",
                addRemoveLinks: true,
                maxFiles: 1
            }
        }
    },
    methods: {

        uploadSuccess(file, response) {
            this.form.images = response.file;
        },
        fileRemoved() {},
        updateAdvertisement(){
            console.log(this.form);
            axios.put('api/admin/advertisement/'+this.form.id, this.form)
                .then(()=>{
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
                   // Fire.$emit('AfterCreate');
                    location.reload();
                })
                .catch(()=>{

                });
        },

    }
}
</script>

<style scoped>

</style>
