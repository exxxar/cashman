<template>
    <div id="appCapsule">
        <Header>
            <template v-slot:left>
                <a :href="'#'" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
        </Header>
        <div class="section mt-2 text-center">
            <h1>Log in your company account</h1>
            <h4>Fill the form to log in</h4>
        </div>
        <div class="section mb-5 p-2">
            <AlertErrors :form="form"></AlertErrors>
            <form @submit.prevent="loginCompany" @keydown="form.onKeydown($event)">
                <div class="card">
                    <div class="card-body pb-1">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="domain">Domain</label>
                                <input v-model="form.domain" type="text" class="form-control"
                                       id="domain" placeholder="Your domain" name="domain">
                                <i class="clear-input">
                                    <ion-icon name="close-circle-outline"></ion-icon>
                                </i>
                            </div>
                            <HasError :form="form" field="domain"/>
                        </div>
                    </div>
                </div>
                <div class="form-links mt-2">
                    <div>
                        <a :href="'register-company'">Register Your Company Now</a>
                    </div>
                </div>
                <div class="form-button-group  transparent">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Log in</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import Header from "../LayoutComponents/Header";
import Form from "vform"
import {AlertErrors, HasError} from "vform/src/components/bootstrap5"

export default {
    name: "CompanyLoginSection",
    components: {Header, HasError, AlertErrors},
    data: function () {
        return {
            form: new Form({
                domain: ''
            })
        }
    },
    methods: {
        async loginCompany() {
            await this.form.post('api/company/login')
        },
    }
}
</script>
