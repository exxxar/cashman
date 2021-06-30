<template>
    <div id="appCapsule">
        <Header>
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:right>
                <a href="login-company" class="headerButton">Login</a>
            </template>
        </Header>
        <div class="section mt-2 text-center">
            <h1>Register Your company now</h1>
            <h4>Create an company account</h4>
        </div>
        <div class="section mb-5 p-2">
            <AlertErrors :form="form"></AlertErrors>
            <form @submit.prevent="registerCompany" @keydown="form.onKeydown($event)">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="title">Title</label>
                                <input v-model="form.title" type="text" class="form-control" id="title"
                                       placeholder="Your company title"
                                       name="title">
                                <HasError :form="form" field="title"/>
                                <i class="clear-input">
                                    <ion-icon name="close-circle-outline"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="domain">Domain</label>
                                <input v-model="form.domain" type="text" class="form-control" id="domain"
                                       placeholder="Your company domain"
                                       name="domain">
                                <HasError :form="form" field="domain"/>
                                <i class="clear-input">
                                    <ion-icon name="close-circle-outline"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
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
                            <HasError :form="form" field="logo"/>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="textarea4">Description</label>
                                <textarea v-model="form.description" id="textarea4" rows="2" class="form-control"
                                          placeholder="Description"
                                          name="description"></textarea>
                                <HasError :form="form" field="description"/>
                                <i class="clear-input">
                                    <ion-icon name="close-circle-outline"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group basic">
                            <label class="form-check-label" for="customCheckb1">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#withdrawActionSheet">Buy
                                    subscription now</a>
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox mt-2 mb-1">
                            <div class="form-check">
                                <input v-model="form.confirmed" type="checkbox" class="form-check-input"
                                       id="customCheckb1">
                                <label class="form-check-label" for="customCheckb1">
                                    I agree <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">terms and
                                    conditions</a>
                                </label>
                                <HasError :form="form" field="confirmed"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-button transparent">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Register</button>
                </div>
            </form>
        </div>
        <TransactionsModal title="Купить подписку"></TransactionsModal>
        <InformModal></InformModal>
    </div>
</template>

<script>
import InformModal from "../Modals/InformModal";
import Header from "../LayoutComponents/Header";
import Form from "vform"
import {AlertErrors, HasError} from "vform/src/components/bootstrap5"
import TransactionsModal from "../Modals/TransactionsModal";

export default {
    name: "CompanyRegisterSection",
    components: {
        InformModal, TransactionsModal, Header,
        HasError, AlertErrors
    },
    data: function () {
        return {
            form: new Form({
                title: '',
                domain: '',
                description: '',
                logo: null,
                confirmed: ''
            })
        }
    },
    methods: {
        async registerCompany() {
            await this.form.post('api/company/register')
            window.location.href = 'company-profile';
        },
        handleFile(event) {
            this.form.logo = event.target.files[0]
        }
    }
}
</script>
