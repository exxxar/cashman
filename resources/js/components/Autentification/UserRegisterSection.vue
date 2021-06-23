<template>
    <!-- App Capsule -->
    <div id="appCapsule">
        <Header>
            <template v-slot:left>
                <a href='/' class="headerButton goBack">
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
            <form @submit.prevent="checkForm">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" placeholder="Your e-mail"
                                       :class="$v.user.email.$error ? 'is-invalid' : ''"
                                       v-model.trim="user.email">
                                <p v-if="!$v.user.email.required" class="invalid-feedback">
                                    Field is required
                                </p>
                                <p v-if=" !$v.user.email.email" class="invalid-feedback">
                                    Email is incorrect
                                </p>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password">Password</label>
                                <input type="password" class="form-control" id="password" autocomplete="off"
                                       placeholder="Your password"
                                       :class="$v.user.password.$error ? 'is-invalid' : ''"
                                       v-model.trim="user.password">
                                <p v-if="!$v.user.password.required" class="invalid-feedback">
                                    Field is required
                                </p>
                                <p v-if="!$v.user.password.strongPassword" class="invalid-feedback">
                                    Strong passwords need to have a letter, a number, a special character, and be more than 8 characters long.
                                </p>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password-confirm">Password Again</label>
                                <input type="password" class="form-control" id="password-confirm" autocomplete="off"
                                       placeholder="Type password again"  :class="$v.user.submitPassword.$error ? 'is-invalid' : ''"
                                       v-model.trim="user.submitPassword">
                                <p v-if="!$v.user.submitPassword.required" class="invalid-feedback">Field is required</p>
                                <p v-if="!$v.user.submitPassword.sameAsPassword" class="invalid-feedback">The passwords do not match.</p>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox mt-2 mb-1">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="customCheckb1" :class="$v.user.submit.$error ? 'is-invalid' : ''"
                                       v-model.trim="user.submit">
                                <label class="form-check-label" for="customCheckb1">
                                    <p style="color: #000; display: inline">I agree</p> <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">terms and
                                       conditions</a>
                                </label>
                                <p v-if="!$v.user.submit.sameAs" class="invalid-feedback">Submit our terms and conditions</p>
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
import { validationMixin } from 'vuelidate'
import { required, sameAs, email } from 'vuelidate/lib/validators'
import InformModal from "../Modals/InformModal";
import Header from "../LayoutComponents/Header";

export default {
    components: {InformModal, Header},
    mixins: [validationMixin],
name: "UserRegisterSection",
    data() {
        return {
            user: {
                email: '',
                password: '',
                submitPassword: '',
                submit: false
            },


        }
    },

    validations: {
        user: {
            email: {
                required,
                email
            },
            password: {
                required,
                strongPassword(password) {
                    return (
                        /[a-z]/.test(password) &&
                        /[A-Z]/.test(password) &&
                        /[0-9]/.test(password) &&
                        /\W|_/.test(password) &&
                        password.length >= 8
                    );
                }
            },
            submitPassword: {
                required,
                sameAsPassword: sameAs("password")
            },
            submit:{
                sameAs: sameAs( () => true )
            }
        },
    },
        methods: {
            checkForm() {
                this.$v.user.$touch()
                if (!this.$v.user.$error) {
                    axios({
                        method: 'post',
                        url: '/register',
                        data: this.user
                    })
                }
            },

        }
}
</script>

<style scoped>

</style>
