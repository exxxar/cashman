<template>
    <!-- App Capsule -->
    <div id="appCapsule">
        <Header>
            <template v-slot:left>
                <a href='#' class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:right>
                <a href='/login' class="headerButton">
                    Login
                </a>
            </template>
        </Header>
        <div class="section mt-2 text-center">
            <h1>Register now</h1>
            <h4>Create an account</h4>
        </div>
        <div class="section mb-5 p-2">
            <AlertErrors :form="form"></AlertErrors>
            <form @submit.prevent="registerUser"
                  @keydown="form.onKeydown($event)">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" placeholder="Your e-mail"
                                       v-model="form.email" name="email">
                                <i class="clear-input">
                                    <ion-icon name="close-circle-outline"></ion-icon>
                                </i>
                            </div>
                            <HasError :form="form" field="email"/>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password">Password</label>
                                <input type="password" class="form-control" id="password" autocomplete="new-password"
                                       placeholder="Your password" name="password"
                                       v-model="form.password">
                                <i class="clear-input">
                                    <ion-icon name="close-circle-outline"></ion-icon>
                                </i>
                            </div>
                            <HasError :form="form" field="password"/>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password-confirmation">Password Again</label>
                                <input type="password" class="form-control" id="password-confirmation" autocomplete="new-password"
                                       placeholder="Type password again"
                                       name="password_confirmation"
                                       v-model="form.password_confirmation">

                                <i class="clear-input">
                                    <ion-icon name="close-circle-outline"></ion-icon>
                                </i>
                            </div>
                            <HasError :form="form" field="password_confirmation"/>
                        </div>
                        <div class="custom-control custom-checkbox mt-2 mb-1">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="customCheckb1"
                                       v-model="form.submitted">
                                <label class="form-check-label" for="customCheckb1">
                                    <p style="color: #000; display: inline">I agree</p> <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">terms and
                                       conditions</a>
                                </label>
                                <HasError :form="form" field="submitted"/>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="form-button-group transparent">
                    <button type="submit" class="btn btn-primary btn-block btn-lg"> Register</button>
                </div>

            </form>

        </div>
        <InformModal></InformModal>
    </div>
</template>

<script>
import Form from "vform"
import {AlertErrors,  HasError} from "vform/src/components/bootstrap5"
import InformModal from "../Modals/InformModal";
import Header from "../LayoutComponents/Header";

export default {
    components: {InformModal, Header, AlertErrors, HasError},
name: "UserRegisterSection",
    data: function () {
        return {
            form: new Form({
                email: '',
                password: '',
                password_confirmation: '',
                submitted: '',
            })
        }
    },
    methods: {
        async registerUser() {
            await this.form.post('/register')
        },
    }
}
</script>

<style scoped>

</style>
