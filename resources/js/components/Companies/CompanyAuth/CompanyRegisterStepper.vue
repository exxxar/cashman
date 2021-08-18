<template>
    <fragment>
        <Header>
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                Заполните дополнительную информацию о своей компании
            </template>
        </Header>
        <br/>
        <form-wizard @onComplete="onComplete" enctype="multipart/form-data">
            <tab-content title="Проценты кэшбека" :selected="true">
                <div class="form-group">
                    <label>Процент кэшбека</label>
                    <input
                        type="text"
                        class="form-control"
                        :class="hasError('cashback_percent') ? 'is-invalid' : ''"
                        placeholder="Введите процент кэшбека"
                        v-model="formData.cashback_percent">
                    <div v-if="hasError('cashback_percent')" class="invalid-feedback">
                        <div class="error" v-if="!$v.formData.cashback_percent.required">Введите процент кэшбека компании</div>
                        <div class="error" v-if="!$v.formData.cashback_percent.numeric">Процент кэшбека должен быть числом!</div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Процент кэшбека 1 уровня</label>
                    <input
                        type="text"
                        class="form-control"
                        :class="hasError('cashback_percent_level_1') ? 'is-invalid' : ''"
                        placeholder="Введите процент кэшбека 1 уровня"
                        v-model="formData.cashback_percent_level_1">
                    <div v-if="hasError('cashback_percent_level_1')" class="invalid-feedback">
                        <div class="error" v-if="!$v.formData.cashback_percent_level_1.required">Введите процент кэшбека 1 уровня компании</div>
                        <div class="error" v-if="!$v.formData.cashback_percent_level_1.numeric">Процент кэшбека 1 уровня должен быть числом!</div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Процент кэшбека 2 уровня</label>
                    <input
                        type="text"
                        class="form-control"
                        :class="hasError('cashback_percent_level_2') ? 'is-invalid' : ''"
                        placeholder="Введите процент кэшбека 2 уровня"
                        v-model="formData.cashback_percent_level_2">
                    <div v-if="hasError('cashback_percent_level_2')" class="invalid-feedback">
                        <div class="error" v-if="!$v.formData.cashback_percent_level_2.required">Введите процент кэшбека 2 уровня компании</div>
                        <div class="error" v-if="!$v.formData.cashback_percent_level_2.numeric">Процент кэшбека 2 уровня должен быть числом!</div>
                    </div>
                </div>
            </tab-content>
            <tab-content title="Ссылки компании">
                <div class="form-group">
                    <label>Ссылка для обратной связи</label>
                    <input
                        type="text"
                        class="form-control"
                        :class="hasError('callback_url') ? 'is-invalid' : ''"
                        placeholder="Введите ссылку для обратной связи с компанией"
                        v-model="formData.callback_url">
                    <div v-if="hasError('callback_url')" class="invalid-feedback">
                        <div class="error" v-if="!$v.formData.callback_url.required">Введите ссылку для обратной связи с компанией</div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Ссылка для загрузки товаров из ВКонтакте</label>
                    <input
                        type="text"
                        class="form-control"
                        :class="hasError('upload_vk_url') ? 'is-invalid' : ''"
                        placeholder="Введите ссылку для загрузки товаров из вк"
                        v-model="formData.upload_vk_url">
                    <div v-if="hasError('upload_vk_url')" class="invalid-feedback">
                        <div class="error" v-if="!$v.formData.upload_vk_url.required">Введите ссылку для загрузки товаров из вк</div>
                    </div>
                </div>
            </tab-content>
            <tab-content title="Дополнительная информация">
                <div class="form-group">
                    <label class="label">Дополнительная информация
                        <button @click="addProperty" type="button" class="btn btn-icon btn-info me-1">
                            <ion-icon name="add-outline"></ion-icon>
                        </button>
                    </label>
                    <ul class="listview image-listview no-line no-space flush">
                        <li v-for="(property, key) in company.properties">
                            <div class="item flex-wrap flex-column d-flex">
                                <p class="mb-0 w-100">{{ key }} : </p>
                                <div class="in mb-1 w-100">
                                    <div class="input-wrapper w-100">
                                        <input type="text" class="form-control"
                                               :placeholder="key"
                                               v-model="company.properties[key]">
                                        <i class="clear-input">
                                            <ion-icon name="close-circle"></ion-icon>
                                        </i>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li v-for="input in inputs">
                            <div class="input-wrapper w-100" style="display: flex!important; margin: 10px 0!important;">
                                <input type="text" class="form-control"
                                       placeholder="Вид информации"
                                       v-model="type">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                                <input type="text" class="form-control"
                                       :placeholder="input.placeholder"
                                       :disabled="!newKey"
                                       v-model="formData.properties[type]">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
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
                                               v-model="company.socials[key]">
                                        <i class="clear-input">
                                            <ion-icon name="close-circle"></ion-icon>
                                        </i>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </tab-content>
        </form-wizard>
        <BottomMenu></BottomMenu>
    </fragment>
</template>

<script>
import {FormWizard, TabContent, ValidationHelper} from 'vue-step-wizard'
import {required, numeric} from 'vuelidate/lib/validators';
import BottomMenu from "../../LayoutComponents/BottomMenu";
import Header from "../../LayoutComponents/Header";
export default {
    name: "CompanyRegisterStepper",
    components: {
        BottomMenu,
        FormWizard,
        TabContent,
        Header,
    },
    mixins: [ValidationHelper],
    data() {
        return {
            formData: {
                cashback_percent: '',
                cashback_percent_level_1: '',
                cashback_percent_level_2: '',
                callback_url: '',
                upload_vk_url: '',
                socials: {},
                properties: {},
                id: 0,
                title: '',
                description: '',
                image: ''
            },
            validationRules: [
                {cashback_percent: {required, numeric}, cashback_percent_level_1: {required, numeric}, cashback_percent_level_2: {required, numeric}},
                { callback_url: {required}, upload_vk_url: {required}},
                {}
            ],
            inputs: [],
            type: '',
        }
    },
    computed:{
        newKey(){
            return this.type
        }
    },
    props:{
        company:{
            required: true
        }
    },

    methods:{
        onComplete() {
            this.formData.id = this.company.id
            this.formData.title = this.company.title
            this.formData.description = this.company.description
            this.formData.image = this.company.image
            this.formData.socials = this.company.socials
            this.formData.properties = this.company.properties
            axios.post('api/company/settings', this.formData).then (function (response) {
                if (response.data.href !== undefined) {
                    location.href = response.data.href
                } else {
                    //location.reload(true);
                }

            })
                .catch(function (error) {
                    console.log(error);});
        },
        addProperty() {
            if(this.inputs.length>0) {
                this.inputs.splice(this.inputs.length-1)
                this.type = ''
            }
            this.inputs.push({
                placeholder: 'Дополнительная информация '
            })

        },
    }
}
</script>

<style scoped>

</style>
