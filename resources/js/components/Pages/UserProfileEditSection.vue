<template>
    <fragment>
        <Header>
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                Изменение данных профиля
            </template>
        </Header>
        <div id="appCapsule" class="full-height">
            <div class="section mt-2 text-center">
                <div class="avatar-section">
                    <a href="#">
                        <img :src="form.avatar" alt="avatar" class="imaged w100 rounded">
                    </a>
                </div>
                <h1>Данные профиля</h1>
                <h4>Заполните данные вашего профиля</h4>
            </div>
            <div class="section mb-5 p-2">
                <form @submit.prevent="updateSettings">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="name">Имя</label>
                                    <input type="text" class="form-control" placeholder="Введите ваше имя"
                                           v-model="form.name" name="name" id="name">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            <div class="form-group basic">
                                <label class="label">Изменить аватар профиля</label>
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
                                    <label class="label" for="password1">Номер телефона</label>
                                    <input type="text" class="form-control" id="password1" autocomplete="off"
                                           placeholder="Введите ваш номер телефона" v-model="form.phone" name="phone">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>

                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="country">Страна</label>
                                    <input type="text" class="form-control" id="country"
                                           placeholder="Страна" v-model="form.country"
                                           name="country">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="region">Регион</label>
                                    <input type="text" class="form-control" id="region"
                                           placeholder="Регион"
                                           v-model="form.region" name="region">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="address">Адрес</label>
                                    <input type="text" class="form-control" id="address"
                                           placeholder="Адрес"
                                           v-model="form.address" name="address">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>

                            <div class="form-group basic">
                                <label class="label">Социальные сети</label>
                                <ul class="listview image-listview no-line no-space flush">
                                    <li v-for="(social, key) in form.messengers">
                                        <div class="item">
                                            <div class="icon-box bg-primary">
                                                <i :class="'fab fa-'+key"></i>
                                            </div>
                                            <div class="in">
                                                <div class="input-wrapper w-100">
                                                    <input type="text" class="form-control" id="socials1"
                                                           :placeholder="'Ссылка на '+key"
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

import Form from 'vform';
import Header from "../LayoutComponents/Header";
export default {
    name: "UserProfileEditSection",
    components: {Header},
    props: {
        form: new Form({
            name: '',
            phone: '',
            country: '',
            region: '',
            address: '',
            avatar: 0,
            messengers: []
        }),
    },
    methods: {
        updateSettings() {
            axios.post('api/user/settings', this.form)
                .then(function (response) {
                    window.location.href = 'user-profile';
                })
                .catch(function (error) {
                    console.log(error);
                });

        },
        handleFile(event) {
            this.form.avatar = event.target.files[0]
        }
    }
}
</script>

<style scoped>

</style>
