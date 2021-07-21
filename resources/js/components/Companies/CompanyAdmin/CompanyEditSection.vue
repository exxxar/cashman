<template>
    <fragment>
        <Header>
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                Изменение данных компании
            </template>
        </Header>
        <div id="appCapsule" class="full-height">
            <div class="section mt-2 text-center">
                <div class="avatar-section">
                    <a href="#">
                        <img :src="form.image" alt="avatar" class="imaged w100 rounded">
                    </a>
                </div>
                <h1>Данные о компании</h1>
                <h4>Заполните данные о вашей компании</h4>
            </div>
            <div class="section mb-5 p-2">
                <form @submit.prevent="updateSettings">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="title">Название</label>
                                    <input type="text" class="form-control" placeholder="Название компании"
                                           v-model="form.title" name="title" id="title"
                                           :class="hasError('title') ? 'is-invalid' : ''">
                                    <div v-if="hasError('title')" class="invalid-feedback">
                                        <div class="error" v-if="!$v.form.title.required">Введите название компании</div>
                                    </div>
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            <div class="form-group basic">
                                <label class="label">Изменить логотип компании</label>
                                <div class="custom-file-upload" id="fileUpload1">
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
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="password1">Домен</label>
                                    <input type="text" class="form-control" id="password1" autocomplete="off"
                                           placeholder="Домен компании" v-model="form.domain" name="domain">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>

                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="percent">Процент кэшбека</label>
                                    <input type="text" class="form-control" id="percent"
                                           placeholder="Процент кэшбека" v-model="form.cashback_percent"
                                           name="cashback_percent">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="percent1">Процент кэшбека 1 уровня</label>
                                    <input type="text" class="form-control" id="percent1"
                                           placeholder="Процент кэшбека 1 уровня"
                                           v-model="form.cashback_percent_level_1" name="cashback_percent_level_1">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="percent2">Процент кэшбека 2 уровня</label>
                                    <input type="text" class="form-control" id="percent2"
                                           placeholder="Процент кэшбека 2 уровня"
                                           v-model="form.cashback_percent_level_2" name="cashback_percent_level_2">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="description">Описание компании</label>
                                    <input type="text" class="form-control" id="description"
                                           placeholder="Описание компании" v-model="form.description"
                                    name="description">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="position">Позиция</label>
                                    <input type="text" class="form-control" id="position"
                                           placeholder="Позиция компании" v-model="form.position"
                                    name="position">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="callback">Ссылка для обратной связи</label>
                                    <input type="text" class="form-control" id="callback"
                                           placeholder="Ссылка для обратной связи" v-model="form.callback_url"
                                    name="callback_url">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="vk-url">Ссылка для загрузки товаров из VK</label>
                                    <input type="text" class="form-control" id="vk-url"
                                           placeholder="Ссылка для загрузки товаров из VK"
                                           v-model="form.upload_vk_url" name="upload_vk_url">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            <div class="form-group basic">
                                <label class="label">Социальные сети</label>
                                <ul class="listview image-listview no-line no-space flush">
                                    <li v-for="(social, key) in form.socials">
                                        <div class="item">
                                            <div class="icon-box bg-primary">
                                                <i :class="'fab fa-'+key"></i>
                                            </div>
                                            <div class="in">
                                                <div class="input-wrapper w-100">
                                                    <input type="text" class="form-control" id="socials1"
                                                           :placeholder="'Ссылка на профиль в '+key"
                                                           :value="social">
                                                    <i class="clear-input">
                                                        <ion-icon name="close-circle"></ion-icon>
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="form-button-group transparent">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">
                            Обновить
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </fragment>
</template>

<script>
import Header from "../../LayoutComponents/Header";
import Form from 'vform';
import { ValidationHelper} from 'vue-step-wizard'
import {required} from 'vuelidate/lib/validators';
export default {
    name: "CompanyEditSection",
    components: {Header},
    mixins: [ValidationHelper],
    props: {
        company:{
            required: true
        }
    },
    data: function(){
        return{
            form: new Form({
                title: '',
                domain: '',
                description: '',
                image: '',
                position: '',
                cashback_percent: 0,
                cashback_percent_level_1: 0,
                cashback_percent_level_2: 0,
                callback_url: '',
                upload_vk_url: '',
                socials: []
            }),
            validationRules: [
                {title: {required}}
            ],
        }
    },
    mounted(){
        this.form=this.company
    },
    methods: {
       async updateSettings() {
           axios.post('api/company/settings', this.form)
               .then(function (response) {
                   window.location.href = 'company-profile';
               })
               .catch(function (error) {
                   console.log(error);
               });
        },
        handleFile(event) {
            this.form.image = event.target.files[0]
        }
    }
}
</script>

<style scoped>

</style>
