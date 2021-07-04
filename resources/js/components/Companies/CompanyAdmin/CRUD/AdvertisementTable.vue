<template>
    <fragment>
        <Header>
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                Ваша реклама
            </template>
        </Header>
        <br/>
        <br/>
        <div class="section mt-2 mb-2">
            <div class="section-title">
                Добавить новую рекламу
                <button @click="newModal" type="button" class="btn btn-icon btn-info me-1">
                    <ion-icon name="add-outline"></ion-icon>
                </button>
                <button @click="getStoryAdminMenu" type="button" class="btn btn-outline-info rounded shadowed">Меню историй</button>
            </div>

            <div class="card text-center">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Код</th>
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Создатель</th>
                            <th>Изображение</th>
                            <th>Тип рекламы</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="advertisement in advertisements" :key="advertisement.id">
                            <td>{{ advertisement.id }}</td>
                            <td>{{ advertisement.title }}</td>
                            <td>{{ advertisement.description }}</td>
                            <td>{{ advertisement.creator_id }}</td>
                            <td>
                                <img :src="advertisement.images" alt="image"
                                     class="imaged w100">
                            </td>
                            <td>{{ advertisement.type }}</td>
                            <td>
                                <a href="#" @click="editModal(advertisement)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd"
                                              d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </a>
                                /
                                <a href="#"  @click="deleteAdvertisement(advertisement.id)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd"
                                              d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="AddNew" tabindex="-1" aria-labelledby="AddNewLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" id="AddNewLabel">Добавить новую рекламу</h5>
                        <h5 class="modal-title" v-show="editmode" id="UpdateLabel">Редактировать рекламу</h5>
                    </div>
                    <form @submit.prevent="editmode ? updateAdvertisement() : createAdvertisement()">
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
                                    <img v-if="editmode" :src="form.images" alt="image" class="imaged" style="width:inherit">
                                    <input name="file" type="file" id="fileuploadInput" accept=".png, .jpg, .jpeg"
                                           @change="handleFile" >
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
                            <button v-show="editmode" type="submit" class="btn btn-success">Обновить</button>
                            <button v-show="!editmode" type="submit" class="btn btn-primary">Создать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </fragment>
</template>

<script>
import Header from "../../../LayoutComponents/Header";
import Form from 'vform';
import { HasError} from "vform/src/components/bootstrap5"

export default {
    name: "AdvertisementTable",
    components: { Header, HasError},
    props: {
        advertisements: {
            type: Object,
            required: true
        }
    },
    data: function () {
        return {
            editmode: false,
            form: new Form({
                id: '',
                title: '',
                description: '',
                creator_id: '',
                images: '',
                type: ''
            })
        }
    },
    methods: {
        updateAdvertisement() {
            this.form.put('api/admin/advertisement/' + this.form.id)
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
        editModal(record) {
            this.editmode = true;
            this.form.reset();
            $('#AddNew').modal('show');
            this.form.fill(record);
        },
        newModal() {
            this.editmode = false;
            this.form.reset();
            $('#AddNew').modal('show');
        },

        deleteAdvertisement(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Вы уверены?',
                text: "Отменить действие будет невозможно",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Да, удалить',
                cancelButtonText: 'Отмена',
                reverseButtons: true
            }).then((result) => {
                //send request to the server
                if (result.isConfirmed) {
                    this.form.delete('api/admin/advertisement/' + id).then(() => {

                        swalWithBootstrapButtons.fire(
                            'Удалено',
                            'Выбранная запись была удалена',
                            'success'
                        )
                        Fire.$emit('AfterCreate');
                    })
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Отменено',
                        'Удаление было отменено',
                        'error'
                    )
                }

            }).catch(() => {
                swal("Ошибка", "Что-то пошло не так ):", "warning")
            });
        },
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
        getStoryAdminMenu(){
            window.location.href = 'story-admin-menu';
        }
        // loadRecords() {
        //    axios.get('api/admin/products').then(({data}) => (this.products = data.data));
        // },


    },

    // created() {
    //   this.loadRecords();
    //   Fire.$on('AfterCreate', () => {
    //      this.loadRecords();
    //  });

    // }

}

</script>

<style scoped>

</style>
