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
                        <img :src="'assets/sample/'+company.image" alt="avatar" class="imaged w100 rounded">
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
                                           v-model="company.title" name="title" id="title">
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
                                    <label class="label" for="percent">Процент кэшбека</label>
                                    <input type="text" class="form-control" id="percent"
                                           placeholder="Процент кэшбека" v-model="company.cashback_percent"
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
                                           v-model="company.cashback_percent_level_1" name="cashback_percent_level_1">
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
                                           v-model="company.cashback_percent_level_2" name="cashback_percent_level_2">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="description">Описание компании</label>
                                    <textarea type="text" class="form-control" id="description"
                                              placeholder="Описание компании" v-model="company.description"
                                              name="description" @onKeyUp="SetNewSize(this)" cols="5"
                                              rows="6"></textarea>
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="position">Позиция</label>
                                    <input type="text" class="form-control" id="position"
                                           placeholder="Позиция компании" v-model="company.position"
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
                                           placeholder="Ссылка для обратной связи" v-model="company.callback_url"
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
                                           v-model="company.upload_vk_url" name="upload_vk_url">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            <div class="form-group basic">
                                <label class="label">Дополнительная информация</label>
                                <ul class="listview image-listview no-line no-space flush">
                                    <li v-for="(property, key) in company.properties">
                                        <div class="item flex-wrap flex-column d-flex">
                                            <p class="mb-0 w-100">{{ key }} : </p>
                                            <div class="in mb-1 w-100">
                                                <div class="input-wrapper w-100">
                                                    <input type="text" class="form-control"
                                                           :placeholder="key"
                                                           :value="property">
                                                    <i class="clear-input">
                                                        <ion-icon name="close-circle"></ion-icon>
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group basic">
                                <label class="label">Социальные сети</label>
                                <ul class="listview image-listview no-line no-space flush">
                                    <li v-for="(social, key) in company.socials">
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

export default {
    name: "CompanyEditSection",
    components: {Header},
    props: {
        company: {
            required: true
        }
    },

    methods: {
        async updateSettings() {
            axios.post('api/company/settings', this.company)

        },
        handleFile(event) {
            this.company.image = event.target.files[0]
        },
        SetNewSize(textarea) {
            if (textarea.value.length > 5) {
                textarea.cols = 50;
                textarea.rows = 50;
            } else {
                textarea.cols = 10;
                textarea.rows = 15;
            }
        }
    }
}
</script>

<style scoped>

</style>
