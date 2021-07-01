<template>
    <fragment>
        <Header class="border-0">
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                404 - Not found
            </template>
        </Header>
        <div id="appCapsule">
            <div class="section">
                <div class="splash-page mt-5 mb-5">
                    <img src="assets/logo-icon.png" alt="image" class="imaged w140">
                    <h1>404</h1>
                    <h2 class="mb-2">Страница не найдена</h2>
                    <p>Подождите несколько минут и совершите повторную попытку загрузки страницы или свяжитесь со
                        администрацией сайта</p>
                </div>
            </div>
            <div class="fixed-bar">
                <div class="row">
                    <div class="col-6">
                        <a href="#" class="btn btn-lg btn-outline-secondary btn-block goBack">
                            Назад
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="#" v-on:click="reloadPage" class="btn btn-lg btn-primary btn-block">
                            Попробовать снова
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </fragment>
</template>

<script>
import Header from "../LayoutComponents/Header";

export default {
    name: "NotFoundPage",
    components: {Header},
    methods: {
        reloadPage() {
            window.location.reload();
        }
    },
    mounted() {
        document.querySelector('body').classList.add('bg-white');
    }
}
</script>
