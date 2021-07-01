<template>
    <div id="appCapsule">
        <Header class="bg-transparent border-0">
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
        </Header>
        <div class="section mt-2 text-center">
            <h1>Log in</h1>
            <h4>Fill the form to log in</h4>
        </div>
        <div class="section mb-5 p-2">
            <AlertErrors :form="form" class="mb-2"></AlertErrors>
            <form @submit.prevent="loginUser"
                  @keydown="form.onKeydown($event)">
                <div class="card">
                    <div class="card-body pb-1">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email">E-mail</label>
                                <input v-model="form.email" type="email" name="email" id="email"
                                       placeholder="Your e-mail"
                                       class="form-control">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                            <HasError :form="form" field="email"/>
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password">Password</label>
                                <input v-model="form.password" type="password" id="password" name="password"
                                       autocomplete="off"
                                       placeholder="Your password"
                                       class="form-control">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                            <HasError :form="form" field="password"/>
                        </div>
                    </div>
                </div>
                <div class="form-links mt-2">
                    <div>
                        <a href="register">Register Now</a>
                    </div>
                    <div>
                        <a href="password/reset" class="text-muted">Forgot Password?</a>
                    </div>
                </div>
                <div id="social_icon">
                    <div class="section mt-2 text-center border-bottom">
                        <h2>or</h2>
                    </div>
                    <div class="section p-2 text-center">
                        <a class="btn btn-icon btn-facebook  me-05" href="auth/facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="btn btn-icon btn-twitter me-05" href="auth/twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-icon btn-google me-05" href="auth/google">
                            <i class="fab fa-google"></i>
                        </a>
                        <a class="btn btn-icon btn-vk me-05" href="auth/vkontakte">
                            <i class="fab fa-vk"></i>
                        </a>
                        <a class="btn btn-icon btn-telegram me-05" href="auth/telegram">
                            <i class="fab fa-telegram"></i>
                        </a>
                        <a class="btn btn-icon btn-yandex me-05" href="auth/yandex">
                            <i class="fab fa-yandex"></i>
                        </a>
                    </div>
                </div>
                <div class="form-button-group transparent">
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
    name: "UserLoginSection",
    components: {Header, HasError, AlertErrors},
    data: function () {
        return {
            form: new Form({
                email: '',
                password: ''
            })
        }
    },
    methods: {
        async loginUser() {
            await this.form.post('login')
            window.location.href = 'user-profile';
        },
    }
}
</script>
