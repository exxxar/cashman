<template>
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
</template>

<script>
export default {
    name: "Header",
    methods:{
        getNot(){
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
            });

        }
    },
    mounted() {
        this.getNot()
    }
}
</script>
