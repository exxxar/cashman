importScripts('https://www.gstatic.com/firebasejs/8.3.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.0/firebase-messaging.js');

firebase.initializeApp({
    apiKey: '{{env("API_KEY")}}',
    authDomain: '{{env("AUTH_DOMAIN")}}',
    projectId: '{{env("PROJECT_ID")}}',
    storageBucket: '{{env("STORAGE_BUCKET")}}',
    messagingSenderId: '{{env("MESSAGING_SENDER_ID")}}',
    appId: '1:291920612530:web:ae679e33f6ced8a6a5cdab',
    measurementId: '{{env("MEASURE_ID")}}'
});

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload,
    );

    const notificationTitle = payload.data.title;
    const notificationOptions = {
        body: payload.data.body,
        icon: payload.data.image,
    };

    return self.registration.showNotification(
        notificationTitle,
        notificationOptions,
    );
});
