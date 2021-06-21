<template>
    <div id="appCapsule">
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
                <div class="form-links mt-2">
                        Login with
                        <a href='/auth/vkontakte' class="text-muted"><i class="fab fa-vk" aria-hidden="true"></i> VK</a>
                        <a href='/auth/facebook' class="text-muted"><i class="fab fa-facebook-f" aria-hidden="true"></i>Facebook</a>
                        <a href='/auth/google' class="text-muted"><i class="fab fa-google" aria-hidden="true"></i>Google</a>
                        <a href='/auth/telegram' class="text-muted"><i class="fab fa-telegram-plane" aria-hidden="true"></i>Telegram</a>
                        <a href='/auth/twitter' class="text-muted"><i class="fab fa-twitter" aria-hidden="true"></i>Twitter</a>
                        <a href='/auth/yandex' class="text-muted"><i class="fab fa-yandex-international" aria-hidden="true"></i>Yandex</a>
                </div>
            </form>
        </div>

    </div>
</template>

<script>
import { validationMixin } from 'vuelidate'
import { required, minLength, email } from 'vuelidate/lib/validators'
export default {
    mixins: [validationMixin],
    name: "UserLoginSection",
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
