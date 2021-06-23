<template>
    <div id="appCapsule">
        <Header>
            <template v-slot:left>
                <a href='/' class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
        </Header>
        <div class="section mt-2 text-center">
            <h1>Log in</h1>
            <h4>Fill the form to log in</h4>
        </div>
        <div class="section mb-5 p-2" >
            <form @submit.prevent="checkForm">
                <div class="card" >
                    <div class="card-body pb-1">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email">E-mail</label>
                                <input  type="email"  name="email"  id="email" placeholder="Your e-mail"
                                       class="form-control"  :class="$v.user.email.$error ? 'is-invalid' : ''"
                                       v-model.trim="user.email">
                                <p v-if="!$v.user.email.required" class="invalid-feedback">
                                    Field is required
                                </p>
                                <p v-if=" !$v.user.email.email" class="invalid-feedback">
                                    Email is incorrect
                                </p>

                            </div>
                        </div>

                        <div class="form-group basic" >
                            <div class="input-wrapper">
                                <label class="label" for="password">Password</label>
                                <input  type="password"   id="password" name="password"  autocomplete="off"
                                       placeholder="Your password"
                                       class="form-control" :class="$v.user.password.$error ? 'is-invalid' : ''"
                                        v-model.trim="user.password">
                                <p v-if="!$v.user.password.required" class="invalid-feedback">
                                    Field is required
                                </p>

                            </div>
                        </div>

                    </div>
                </div>


                <div class="form-links mt-2">
                    <div>
                        <a href="/register">Register Now</a>
                    </div>
                    <div><a href="password/reset" class="text-muted">Forgot Password?</a></div>
                </div>

                <div class="form-button-group  transparent">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Login</button>
                </div>
                <div class="section mt-2 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="p-1">
                                <div class="text-center">
                                    <h2 class="text-primary mb-2">Authorize via social networks</h2>

                                    <a href="/auth/facebook" class="btn btn-facebook btn-icon me-05">
                                        <ion-icon name="logo-facebook"></ion-icon>
                                    </a>

                                    <a href="/auth/twitter" class="btn btn-twitter btn-icon me-05">
                                        <ion-icon name="logo-twitter"></ion-icon>
                                    </a>

                                    <a href="/auth/google" class="btn btn-whatsapp btn-icon me-05">
                                        <ion-icon name="logo-google"></ion-icon>
                                    </a>

                                    <a href="/auth/vkontakte" class="btn btn-linkedin btn-icon me-05">
                                        <ion-icon name="logo-vk"></ion-icon>
                                    </a>

                                    <a href="/auth/telegram" class="btn btn-instagram btn-icon me-05">
                                        <ion-icon name="logo-instagram"></ion-icon>
                                    </a>

                                    <a href="/auth/yandex" class="btn btn-twitch btn-icon me-05">
                                        <ion-icon name="logo-twitch"></ion-icon>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { validationMixin } from 'vuelidate'
import { required, minLength, email } from 'vuelidate/lib/validators'
import Header from "../LayoutComponents/Header";

export default {
    mixins: [validationMixin],
    name: "UserLoginSection",
    components:{Header},
    data() {
        return {
            user: {
                email: '',
                password: '',
            },


        };
    },
    validations: {
        user: {
            email: {
                required,
                email
            },
            password: {
                required
            }
        }
    },
    methods: {
        checkForm() {
            this.$v.user.$touch()
            if (!this.$v.user.$error) {
                axios({
                    method: 'post',
                    url: '/login',
                    data: this.user
                })
            }

        }
    }
}

</script>

<style scoped>

</style>
