/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue').default;
import LoadScript from 'vue-plugin-load-script';

Vue.use(LoadScript);
import Fragment from 'vue-fragment'

import VueLazyload from 'vue-lazyload'

Vue.use(VueLazyload, {
    preLoad: 1,
    error: 'assets/logo-icon.png',
    loading: 'assets/loading.gif',
    attempt: 1
})

Vue.use(Fragment.Plugin)
export const eventBus = new Vue()
import VueRecord from '@codekraft-studio/vue-record'

import store from './store/index'


Vue.use(VueRecord)
Vue.config.ignoredElements = [/^ion-/]
import Swal from 'sweetalert2'
window.Swal = Swal;

import AudioRecorder from 'vue-audio-recorder'
Vue.use(AudioRecorder)
var VueScrollTo = require('vue-scrollto');

Vue.use(VueScrollTo)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//User Authentication
Vue.component('user-login-component', require('./components/Autentification/UserLoginSection').default);
Vue.component('user-register-component', require('./components/Autentification/UserRegisterSection').default);
Vue.component('user-register-stepper', require('./components/Autentification/UserRegisterStepper').default);

//Pages
Vue.component('main-page', require('./components/Pages/MainPage').default);
Vue.component('user-page', require('./components/Pages/UserProfilePage').default);
Vue.component('user-settings', require('./components/Pages/UserSettingsPage').default);
Vue.component('achievement', require('./components/Pages/AchievemеntPage').default);
Vue.component('achievement-detail', require('./components/Achievements/AchievementDetail').default);
Vue.component('history', require('./components/Pages/HistoryPage').default);
Vue.component('history-action-detail', require('./components/HistoryAction/HistoryActionDetail').default);
Vue.component('user-friends', require('./components/Users/UserFriendsList').default);
Vue.component('users-friends-tree', require('./components/Users/UsersFriendsTree').default);
Vue.component('news', require('./components/Pages/NewsPage').default);
Vue.component('news-detail', require('./components/News/NewsDetail').default);
Vue.component('page-not-found', require('./components/Pages/NotFoundPage').default);
Vue.component('promo-code', require('./components/Promocode/PromoCodeBlock').default);
Vue.component('about-page', require('./components/Pages/AboutPage').default);
Vue.component('landing-page', require('./components/Pages/LandingPage').default);
Vue.component('company-profile', require('./components/Companies/CompanyProfile').default);
Vue.component('ad-list', require('./components/Companies/ADComponents/Stepper').default);
Vue.component('search-company', require('./components/Companies/SearchCompanySection').default);
Vue.component('edit-company', require('./components/Companies/CompanyAdmin/CompanyEditSection').default);
Vue.component('edit-profile', require('./components/Pages/UserProfileEditSection').default);
Vue.component('region-map-block', require('./components/Companies/RegionMapBlock').default);
//Company Admin
Vue.component('company-admin-menu', require('./components/Companies/CompanyAdmin/CRUD/CompanyAdminMenu').default);
Vue.component('company-admin-products', require('./components/Companies/CompanyAdmin/CRUD/ProductsTable').default);
Vue.component('company-admin-advertisement', require('./components/Companies/CompanyAdmin/CRUD/AdvertisementTable').default);
Vue.component('company-admin-users', require('./components/Companies/CompanyAdmin/CRUD/UsersTable').default);
Vue.component('story-admin-menu', require('./components/Companies/CompanyAdmin/StoryAdminMenu').default);
Vue.component('company-action-menu', require('./components/Companies/CompanyAdmin/CompanyActionMenu').default);
Vue.component('company-group-admin', require('./components/Companies/CompanyAdmin/CompanyGroupAdmin').default);
Vue.component('add-promocode', require('./components/Companies/CompanyAdmin/CRUD/AddPromocodeBlock').default);
//Company Authentication
Vue.component('company-register-component', require('./components/Companies/CompanyAuth/CompanyRegisterSection').default);
Vue.component('company-login-component', require('./components/Companies/CompanyAuth/CompanyLoginSection').default);

//Products
Vue.component('products', require('./components/Products/ProductList').default);

Vue.component('side-menu', require('./components/LayoutComponents/SideMenu').default);

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
window.Toast = Toast;
window.Fire = new Vue();
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store
});
