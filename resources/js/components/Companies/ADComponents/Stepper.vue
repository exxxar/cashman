<template>
    <fragment>
        <Header>
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                Add Advertising
            </template>
        </Header>
        <br/>
        <br/>
        <form-wizard @onComplete="onComplete" enctype="multipart/form-data">
            <tab-content title="Название и описание рекламы" :selected="true">
                <div class="form-group">
                    <label>Название</label>
                    <input
                        type="text"
                        class="form-control"
                        :class="hasError('title') ? 'is-invalid' : ''"
                        placeholder="Введите название"
                        v-model="formData.title">
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
                    <div v-if="hasError('description')" class="invalid-feedback">
                        <div class="error" v-if="!$v.formData.description.required">Введите описание рекламы</div>
                    </div>
                </div>
            </tab-content>
            <tab-content title="Изображение">
                <div class="form-group">
                    <label class="control-label col-lg-1 text-semibold">Images</label>
                    <vue-dropzone  ref="myVueDropzone" id="dropzone" name="image"
                                   :class="hasError('image') ? 'is-invalid' : ''"
                                   :options="dropzoneOptions"
                     v-on:vdropzone-sending="handleFile"
                     v-on:vdropzone-canceled="canceledFile"></vue-dropzone>
                    <div v-if="hasError('image')" class="invalid-feedback">
                        <div class="error" v-if="!$v.formData.image.required">Добавьте изображение рекламы
                        </div>
                    </div>
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
                                    <div class="error" v-if="!$v.formData.terms.required">Please select terms and
                                        conditions.
                                    </div>
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
import {FormWizard, TabContent, ValidationHelper} from 'vue-step-wizard'
import {required} from 'vuelidate/lib/validators';
import InformModal from "../../Modals/InformModal";
import BottomMenu from "../../LayoutComponents/BottomMenu";
import Header from "../../LayoutComponents/Header";
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
const checked = (value) => value === true;
export default {
    name: "StepFormValidation",
    components: {
        BottomMenu,
        InformModal,
        FormWizard,
        TabContent,
        Header,
        vueDropzone: vue2Dropzone
    },
    mixins: [ValidationHelper],
    data() {
        return {
            formData: {
                title: '',
                description: '',
                image: '',
                terms: false
            },
            validationRules: [
                {title: {required}, description: {required}},
                { image:{required}},
                {terms: {checked}}
            ],
            dropzoneOptions: {
                url: '/api/add-story',
                thumbnailWidth: 150,
                maxFilesize: 0.5,
                addRemoveLinks: true,
                maxFiles: 1,
                dictDefaultMessage: "<i class='fas fa-cloud-upload-alt'></i>UPLOAD ME"
            },
            show: false,
        }
    },

    methods: {
        onComplete() {
            alert('AlertSuccess')
            this.$refs.formwizard.changeStatus();
        },
        reset() {
            for (let field in this.formData) {
                this.formData[field] = null;
            }
        },
        handleFile(file) {
            this.formData.image = file.name
            console.log(this.formData.image)
        },
        canceledFile() {
            this.formData.image = null
        }
    }
}
</script>
