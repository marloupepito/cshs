import { initializeApp } from "firebase/app";
import { getMessaging,getToken } from "firebase/messaging";

const firebaseConfig = {
  apiKey: "AIzaSyCEWu84oouauWuPrPwHBVrrmUqiUMgiJCc",
  authDomain: "calatrava-cshs.firebaseapp.com",
  projectId: "calatrava-cshs",
  storageBucket: "calatrava-cshs.appspot.com",
  messagingSenderId: "494667424208",
  appId: "1:494667424208:web:c67972dfded30d7b8cd9d5"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);



function requestPermission() {
  console.log('Requesting permission...');
  Notification.requestPermission().then((permission) => {
    if (permission === 'granted') {

      // Initialize Firebase Cloud Messaging and get a reference to the service
        const messaging = getMessaging(app);
        getToken(messaging,{vapidKey: 'BJFKCiJyMJIz5y9CC2A3Nm62Nvnw3-WwiGMmPLdEqsYFPpEOX29QJMnGASihU6abQTyBvLpc2zYGGiQaZQV3kb8'})
        .then(res=>{
          if(res){
            console.log('success',res)
          }else{
             console.log('error',res)
          }
        });
        
      console.log('Notification permission granted.');
    }else{
      console.log('You dont Have permission.');
    }
  })
}

requestPermission()