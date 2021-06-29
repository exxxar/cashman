<template>
    <fragment>
        <Header>
            <template v-slot:left>
                <a :href="'#'" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                Добавить рекламу
            </template>
        </Header>
        <br/>
        <br/>
    <form-wizard @onComplete="onComplete" >
        <tab-content title="Название и описание рекламы" :selected="true">
            <div class="form-group">
                <label >Название</label>
                <input
                    type="text"
                    class="form-control"
                    :class="hasError('title') ? 'is-invalid' : ''"
                    placeholder="Введите название"
                    v-model="formData.title"
                >
                <div v-if="hasError('title')" class="invalid-feedback">
                    <div class="error" v-if="!$v.formData.title.required">Введите название рекламы</div>
                </div>
            </div>
            <div class="form-group">
                <label>Описание</label>
                <input
                    type="text"
                    class="form-control"
                    :class="hasError('description') ? 'is-invalid' : ''"
                    placeholder="Введите описание рекламы"
                    v-model="formData.description">
                <div v-if="hasError('email')" class="invalid-feedback">
                    <div class="error" v-if="!$v.formData.description.required">Введите описание рекламы</div>
                </div>
            </div>
        </tab-content>
        <tab-content title="Изображение">
            <div class="form-group basic">
                <label>Изображение для рекламы</label>
                <div class="custom-file-upload" id="fileUpload1">
                    <input name="image" type="file" id="fileuploadInput" accept=".png, .jpg, .jpeg"
                           class="form-control"
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
                <HasError :form="formData" field="image"/>
            </div>

        </tab-content>
        <tab-content title="Условия соглашения">
            <div class="form-group">
                <label>Ознакомьтесь с условиями соглашения</label>
            <div class="form-group form-check">
                <div class="custom-control custom-checkbox mt-2 mb-1">
                    <div class="form-check">
                        <input v-model="formData.terms" type="checkbox" class="form-check-input"
                               :class="hasError('terms') ? 'is-invalid' : ''"
                               id="customCheckb1">
                        <label class="form-check-label" for="customCheckb1">
                            I agree <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">terms and
                            conditions</a>
                        </label>
                        <div v-if="hasError('terms')" class="invalid-feedback">
                            <div class="error" v-if="!$v.formData.terms.required">Please select terms and conditions.</div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </tab-content>
    </form-wizard>
        <BottomMenu></BottomMenu>
        <InformModal></InformModal>
    </fragment>
</template>

<script>
import FormWizard from './FormWizard.vue';
import TabContent from './TabContent.vue';
import ValidationHelper from './ValidationHelper.vue';
import { required } from 'vuelidate/lib/validators';
import InformModal from "../../Modals/InformModal";
import BottomMenu from "../../LayoutComponents/BottomMenu";
import Header from "../../LayoutComponents/Header";
import Form from "vform"
import {HasError} from "vform/src/components/bootstrap5"
const checked = (value) => value === true;
export default {
    name: "StepFormValidation",
    components: {
        BottomMenu,
        InformModal,
        FormWizard,
        TabContent,
        Header,
        HasError
    },
    mixins: [ValidationHelper],
    data(){
        return {
            formData: new Form({
                title: '',
                description: '',
                image: null,
                terms: false
            }),
            validationRules:[
                {title: {required}, description: {required} },
                { terms: {checked} }
            ]
        }
    },
    methods: {
        onComplete() {
            alert("Submitting Form ! Rock On");
            this.$refs.formwizard.changeStatus();
        },
        reset() {
            for (let field in this.formData) {
                this.formData[field] = null;
            }
        },
        handleFile(event) {
            this.formData.image = event.target.files[0]
        }
    }
}
</script>

<style scoped>

</style>
