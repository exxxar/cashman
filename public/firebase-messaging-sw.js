importScripts('https://www.gstatic.com/firebasejs/8.3.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.0/firebase-messaging.js');

firebase.initializeApp({
    apiKey: '{{"API_KEY"}}',
    authDomain: '{{"AUTH_DOMAIN"}}',
    projectId: '{{"PROJECT_ID"}}',
    storageBucket: '{{"STORAGE_BUCKET"}}',
    messagingSenderId: '{{"MESSAGING_SENDER_ID"}}',
    appId: '{{"APP_ID"}}',
    measurementId: '{{"MEASURE_ID"}}'
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
