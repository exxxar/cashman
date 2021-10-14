<template>
    <div id="notification-7" class="notification-box">
        <div class="notification-dialog ios-style">
            <div class="notification-header">
                <div class="in">
                    <img src="assets/img/sample/avatar/avatar3.jpg" alt="image" class="imaged w24 rounded">
                    <strong>John Pacheco</strong>
                </div>
                <div class="right">
                    <span>5 mins ago</span>
                    <a href="#" class="close-button">
                        <ion-icon name="close-circle"></ion-icon>
                    </a>
                </div>
            </div>
            <div class="notification-content">
                <div class="in">
                    <h3 class="subtitle">Payment has been sent</h3>
                    <div class="text">
                        You just sent $ 200 to John.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {eventBus} from "../../app";

export default {
    name: "PersonalNotification",
   /* data: function () {
        return {
            message: [],
        }
    },
    mounted() {
        eventBus.$on('showNotification', this.getCurrentMessage)
    },
    methods: {
        getCurrentMessage(message) {
            this.message = message
        }
    }*/
}
</script>

<style scoped>

</style>
