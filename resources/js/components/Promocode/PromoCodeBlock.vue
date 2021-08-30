<template>
    <fragment>
        <Header class="no-border">
            <template v-slot:left>
                <a href="/user-profile" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                Активация промокода
            </template>
            <template v-slot:right>
                <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#DialogNotification">Помощь</a>
            </template>
        </Header>
        <div id="appCapsule" class="full-height">
            <div class="section">
                <div class="splash-page mt-5 mb-5">
                    <div class="mb-3">
                        <vue-qrcode :value=code :options="{ width: 200 }"></vue-qrcode>
                    </div>
                    <h2 class="mb-2">Отканируйте QR Код</h2>
                    <p>
                        {{ description }}
                    </p>
                </div>
            </div>
            <div class="fixed-bar">
                <div class="row">
                    <div class="col-12">
                        <a href="/user-profile" class="btn btn-lg btn-outline-secondary btn-block goBack">Назад</a>
                    </div>
                </div>
            </div>
        </div>
        <NotificationModal title="Активация промокода"
                           description="Отправьте ссылку на эту страницу другу, чтобы пригласить его в компанию и получать многоуровневый кэшбек!">
        </NotificationModal>
    </fragment>
</template>

<script>
import Header from "../LayoutComponents/Header";
import NotificationModal from "../Modals/NotificationModal";
import Footer from "../LayoutComponents/Footer";
import BottomMenu from "../LayoutComponents/BottomMenu";
import VueQrcode from '@chenfengyuan/vue-qrcode';
export default {
    name: "PromoCodeBlock",
    components: {BottomMenu, Footer, NotificationModal, Header,  VueQrcode},
    props: {
        code: {
            required: true
        },
        description: {
            type: String,
            default: "Отправьте ссылку на эту страницу другу, чтобы пригласить его в компанию и получать многоуровневый кэшбек!"
        }
    },
    mounted() {
        document.querySelector('body').classList.add('bg-white');
    }
}
</script>
