<template>
    <fragment>
    <div class="appHeader">
        <div class="left">
            <slot name="left"></slot>
        </div>
        <div class="pageTitle">
            <slot name="title"></slot>
        </div>
        <div class="right">
            <slot name="right"></slot>
        </div>
    </div>
        <AndroidPreview v-if="title!==null" textApplicationName="CashMan" :textTitle="title" :textBody="message" :image="image"></AndroidPreview>
    </fragment>
</template>

<script>
import { AndroidPreview, IphonePreview } from 'vue-push-notification-preview';
import 'vue-push-notification-preview/src/assets/devices.scss';
export default {
    name: "Header",
    components: {
        AndroidPreview,
        IphonePreview
    },
    data(){
        return{
            title: null,
            message: null,
            image: null
        }
    },
    methods:{
        getNot(){
            let vm = this;
            var firebaseConfig = {
                apiKey: 'AIzaSyBy3G_-OGoXyRaCqB4wZJAjrd3QE1PLDa8',
                authDomain: 'cashman-320612.firebaseapp.com',
                projectId: 'cashman-320612',
                storageBucket: 'cashman-320612.appspot.com',
                messagingSenderId: '291920612530',
                appId: '1:291920612530:web:ae679e33f6ced8a6a5cdab',
                measurementId: 'G-1MH9VQW03S'
            };

            firebase.initializeApp(firebaseConfig);
            const messaging = firebase.messaging();

            function initFirebaseMessagingRegistration() {
                messaging
                    .requestPermission()
                    .then(function () {
                        return messaging.getToken({ vapidKey: 'BL33NB4gjDr1gikXM9k8Np3ZSRmLrAfezQwa40i5P6BIl039XujRTMcTy7ZxbKS3R3L40G0ZPtVG8591Ph47v-o' })
                    })
                    .then(function(token) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: '{{ route("save-push-notification-token") }}',
                            type: 'POST',
                            data: {
                                token: token
                            },
                            dataType: 'JSON',
                        });

                    }).catch(function (err) {
                });
            }
            initFirebaseMessagingRegistration();

            messaging.onMessage(function(payload) {
                const noteTitle = payload.data.title;
                const noteOptions = {
                    body: payload.data.body,
                    icon: payload.data.image,
                };
                new Notification(noteTitle, noteOptions);
                vm.title = payload.data.title
                vm.description = payload.data.body
                vm.image = payload.data.image
            });

        }
    },
    mounted() {
        this.getNot()
    }
}
</script>
