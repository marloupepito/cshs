 // // Scripts for firebase and firebase messaging
 // importScripts("https://www.gstatic.com/firebasejs/8.2.0/firebase-app.js");
 // importScripts("https://www.gstatic.com/firebasejs/8.2.0/firebase-messaging.js");

 // // Initialize the Firebase app in the service worker by passing the generated config
 // const firebaseConfig = {
 //   apiKey: "AIzaSyCEWu84oouauWuPrPwHBVrrmUqiUMgiJCc",
 //   authDomain: "calatrava-cshs.firebaseapp.com",
 //   projectId: "calatrava-cshs",
 //   storageBucket: "calatrava-cshs.appspot.com",
 //   messagingSenderId: "494667424208",
 //   appId: "1:494667424208:web:c67972dfded30d7b8cd9d5",
 // };

 // firebase.initializeApp(firebaseConfig);

 // // Retrieve firebase messaging
 // const messaging = firebase.messaging();

 // messaging.onBackgroundMessage(function(payload) {
 //   console.log("Received background message ", payload);

 //   const notificationTitle = payload.notification.title;
 //   const notificationOptions = {
 //     body: payload.notification.body,
 //   };

 //   self.registration.showNotification(notificationTitle, notificationOptions);
 // });


// if ('serviceWorker' in navigator) {
// navigator.serviceWorker.register('../firebase-messaging-sw.js')
//   .then(function(registration) {
//     console.log('Registration successful, scope is:', registration.scope);
//   }).catch(function(err) {
//     console.log('Service worker registration failed, error:', err);
//   });
// }