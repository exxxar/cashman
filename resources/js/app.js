/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import {req} from "vuelidate/lib/validators/common";

require('./bootstrap');

window.Vue = require('vue').default;
import Fragment from 'vue-fragment'
import {Form, HasError, AlertError} from 'vform';
Vue.use(Fragment.Plugin)
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('user-login-component', require('./components/Autentification/UserLoginSection').default);
Vue.component('user-register-component', require('./components/Autentification/UserRegisterSection').default);

Vue.component('main-page', require('./components/MainPage/MainPageComponent').default);
Vue.component('company-register-component', require('./components/Companies/CompanyRegisterSection').default);
Vue.component('company-login-component', require('./components/Companies/CompanyLoginSection').default);
Vue.component('products', require('./components/Products/ProductList').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
