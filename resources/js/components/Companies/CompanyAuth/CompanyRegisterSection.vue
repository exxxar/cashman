<template>
    <div id="appCapsule" class="full-height">
        <Header class="bg-transparent border-0">
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:right>
                <a href="login-company" class="headerButton">Авторизоваться в компании</a>
            </template>
        </Header>
        <div class="section mt-2 text-center">
            <h1>Зарегистрируйте аакаунт Вашей компании</h1>
            <h4>Создайте аккаунт компании в Cashman!</h4>
        </div>
        <div class="section mb-5 p-2">
            <AlertErrors :form="form" class="mb-2"></AlertErrors>
            <form @submit.prevent="registerCompany" @keydown="form.onKeydown($event)">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="title">Название</label>
                                <input v-model="form.title" type="text" class="form-control" id="title"
                                       placeholder="Название вашей компании"
                                       name="title">
                                <HasError :form="form" field="title"/>
                                <i class="clear-input">
                                    <ion-icon name="close-circle-outline"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="domain">Домен</label>
                                <input v-model="form.domain" type="text" class="form-control" id="domain"
                                       placeholder="Домен вашей компании"
                                       name="domain">
                                <HasError :form="form" field="domain"/>
                                <i class="clear-input">
                                    <ion-icon name="close-circle-outline"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password">Пароль</label>
                                <input type="password" class="form-control" id="password" autocomplete="new-password"
                                       placeholder="Пароль для аккаунта вашей компании" name="password"
                                       v-model="form.password">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                            <HasError :form="form" field="password"/>
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password-confirmation">Повторите пароль</label>
                                <input type="password" class="form-control" id="password-confirmation"
                                       autocomplete="new-password"
                                       placeholder="Подтвердите пароль"
                                       name="password_confirmation"
                                       v-model="form.password_confirmation">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                            <HasError :form="form" field="password_confirmation"/>
                        </div>

                        <div class="form-group basic">
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
                                    <div class="subtitle">...или нажмите, чтобы загрузить файлы с Вашего компьютера</div>
                                </div>
                            </vue-dropzone>
                            <HasError :form="form" field="image"/>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="textarea4">Описание</label>
                                <textarea v-model="form.description" id="textarea4" rows="2" class="form-control"
                                          placeholder="Описание"
                                          name="description"></textarea>
                                <HasError :form="form" field="description"/>
                                <i class="clear-input">
                                    <ion-icon name="close-circle-outline"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="position">Адрес компании</label>
                                <textarea v-model="form.position" id="position" rows="2" class="form-control"
                                          placeholder="Адрес компании"
                                          name="position"></textarea>
                                <HasError :form="form" field="position"/>
                                <i class="clear-input">
                                    <ion-icon name="close-circle-outline"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group basic">
                            <label class="form-check-label" for="customCheckb1">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#withdrawActionSheet">Купить подписку</a>
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox mt-2 mb-1">
                            <div class="form-check">
                                <input v-model="form.confirmed" type="checkbox" class="form-check-input"
                                       id="customCheckb1">
                                <label class="form-check-label" for="customCheckb1">
                                    Я согласен с <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">условиями соглашения</a>
                                </label>
                                <HasError :form="form" field="confirmed"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-button-group transparent">
                    <button type="submit" :disabled='form.errors.any() || !isComplete'  class="btn btn-primary btn-block btn-lg">Зарегистрировать</button>
                </div>
            </form>
        </div>
        <TransactionsModal title="Купить подписку"></TransactionsModal>
        <InformModal></InformModal>
    </div>
</template>

<script>
import InformModal from "../../Modals/InformModal";
import Header from "../../LayoutComponents/Header";
import Form from "vform"
import {AlertErrors, HasError} from "vform/src/components/bootstrap5"
import TransactionsModal from "../../Modals/TransactionsModal";
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";
export default {
    name: "CompanyRegisterSection",
    components: {
        InformModal, TransactionsModal, Header,
        HasError, AlertErrors,  vueDropzone: vue2Dropzone
    },
    data: function () {
        return {
            form: new Form({
                title: '',
                domain: '',
                password: '',
                password_confirmation: '',
                description: '',
                image: null,
                position: '',
                confirmed: ''
            }),
            dropzoneOptions: {
                url: "api/files",
                acceptedFiles: ".png, .jpg, .jpeg",
                addRemoveLinks: true,
                maxFiles: 1
            }
        }
    },
    methods: {
        registerCompany() {
            this.form.post('/register-company').then (function (response) {
                if (response.data.href !== undefined) {
                    location.href = response.data.href
                } else {
                    //location.reload(true);
                }

            })
                .catch(function (error) {
                    console.log(error);});

        },
        uploadSuccess(file, response) {
            this.form.image = response.file;
        },

        fileRemoved() {}
    },
    computed: {
        isComplete () {
            return this.form.title  && this.form.domain && this.form.password &&
                this.form.password_confirmation && this.form.confirmed  && this.form.position
                && this.form.image  && this.form.description;
        }
    }
}
</script>
