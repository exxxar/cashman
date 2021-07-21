<template>
    <fragment>
        <Header class="no-border">
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                PromoCode Activation
            </template>
            <template v-slot:right>
                <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#DialogNotification">Help</a>
            </template>
        </Header>
        <div id="appCapsule" class="full-height">
            <div class="section">
                <div class="splash-page mt-5 mb-5">
                    <div class="mb-3">
                        <img :src="code" alt="QR Code" class="imaged square w140">
                    </div>
                    <h2 class="mb-2">Scan the QR Code</h2>
                    <p>
                        {{ description }}
                    </p>
                </div>
            </div>
            <div class="fixed-bar">
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-lg btn-outline-secondary btn-block goBack">Go Back</a>
                    </div>
                </div>
            </div>
        </div>
        <NotificationModal title="PromoCode Activation"
                           description="You can use QR code verification for two-factor authentication or protect actions.">
        </NotificationModal>
    </fragment>
</template>

<script>
import Header from "../LayoutComponents/Header";
import NotificationModal from "../Modals/NotificationModal";
import Footer from "../LayoutComponents/Footer";
import BottomMenu from "../LayoutComponents/BottomMenu";

export default {
    name: "PromoCodeBlock",
    components: {BottomMenu, Footer, NotificationModal, Header},
    props: {
        code: {
            type: String,
            default: "assets/sample/qr.png"
        },
        description: {
            type: String,
            default: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam aliquam."
        }
    },
    mounted() {
        document.querySelector('body').classList.add('bg-white');
    }
}
</script>
