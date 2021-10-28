<template>
    <fragment>
        <Header>
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:right>
                <a href='login' class="headerButton">Login</a>
            </template>
        </Header>
        <div class="section mt-2 text-center">
            <form-wizard @onComplete="onComplete">
                <p>Заполните информацию о Вашем аккаунте для завершения регистрации</p>
                <tab-content title="Почта" :selected="true">
                    <div class="form-group">
                        <label>Электронная почта</label>
                        <input
                            type="email"
                            class="form-control"
                            :class="hasError('email') ? 'is-invalid' : ''"
                            placeholder="Введите E-mail"
                            v-model="formData.email"
                            :disabled='isEmail'>
                        <div v-if="hasError('email')" class="invalid-feedback">
                            <div class="error" v-if="!$v.formData.email.required">Введите электронную почту</div>
                            <div class="error" v-if="!$v.formData.email.email">Введенный электронный адрес имеет
                                неверный
                                формат
                            </div>
                        </div>
                    </div>

                </tab-content>
                <tab-content title="Пароль">
                    <div class="form-group">
                        <label>Пароль</label>
                        <input
                            type="password"
                            class="form-control"
                            :class="hasError('password') ? 'is-invalid' : ''"
                            placeholder="Введите пароль"
                            v-model="formData.password">
                        <div v-if="hasError('password')" class="invalid-feedback">
                            <div class="error" v-if="!$v.formData.password.required">Введите пароль</div>
                            <div class="error" v-if="!$v.formData.password.minLength">Пароль должен быть не менее 8
                                символов
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Подтверждение пароля</label>
                        <input
                            type="password"
                            class="form-control"
                            :class="hasError('password_confirmation') ? 'is-invalid' : ''"
                            placeholder="Введите подтверждение пароля"
                            v-model="formData.password_confirmation">
                        <div v-if="hasError('password_confirmation')" class="invalid-feedback">
                            <div class="error" v-if="!$v.formData.password_confirmation.required">Введите подтвержение
                                пароля
                            </div>
                            <div class="error" v-if="!$v.formData.password_confirmation.sameAs">Пароли должны сопадать
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
                                    <input v-model="formData.submitted" type="checkbox" class="form-check-input"
                                           :class="hasError('submitted') ? 'is-invalid' : ''"
                                           id="customCheckb1">
                                    <label class="form-check-label" for="customCheckb1">
                                        I agree <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">terms
                                        and
                                        conditions</a>
                                    </label>
                                    <div v-if="hasError('submitted')" class="invalid-feedback">
                                        <div class="error" v-if="!$v.formData.submitted.required">Ознакомьтесь с
                                            условиями
                                            соглашения
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </tab-content>
            </form-wizard>
        </div>
        <BottomMenu></BottomMenu>
        <InformModal></InformModal>
    </fragment>
</template>

<script>
import {FormWizard, TabContent, ValidationHelper} from 'vue-step-wizard';
import {required, email, minLength, sameAs} from 'vuelidate/lib/validators';
import BottomMenu from "../LayoutComponents/BottomMenu";
import Header from "../LayoutComponents/Header";
import InformModal from "../Modals/InformModal";
import Form from "vform";

const checked = (value) => value === true;
export default {
    name: "UserRegisterStepper",
    components: {
        BottomMenu,
        FormWizard,
        TabContent,
        Header,
        InformModal
    },
    props: {
        email: {
            required: true
        }
    },
    mixins: [ValidationHelper],
    data() {
        return {
            formData: new Form({
                email: '',
                password: '',
                password_confirmation: '',
                submitted: ''
            }),
            validationRules: [
                {email: {required, email}},
                {password: {required, minLength: minLength(8)}, password_confirmation: {required}},
                {submitted: {checked}}
            ]
        }
    },
    mounted() {
        this.formData.email = this.email
    },
    computed: {
        isEmail() {
            return this.formData.email;
        }
    },
    methods: {
        onComplete() {
            this.formData.post('/register')
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire(
                'Поздравляем!',
                'Вы создали аккаунт в CashMan! Ваши данные сохранены',
                'success'
            ).then(() => {
                window.location.href = 'user-profile';
            })

        },
    }
}
</script>

<style scoped>

</style>
