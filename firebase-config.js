// firebase-config.js
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-app.js";
import { getAuth } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-auth.js";
import { getFirestore } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-firestore.js";

const firebaseConfig = {
    apiKey: "AIzaSyBHgI85DqwJyrkz2vw2a9raKFa7bzlC_sQ",
    authDomain: "tunedrop-bdca6.firebaseapp.com",
    databaseURL: "https://tunedrop-bdca6-default-rtdb.firebaseio.com",
    projectId: "tunedrop-bdca6",
    storageBucket: "tunedrop-bdca6.appspot.com",
    messagingSenderId: "965322278645",
    appId: "1:965322278645:android:e1582eebcff3279c64e7bc"
};

// Inicializa Firebase
const app = initializeApp(firebaseConfig);

// Exporta servicios para usar en otros archivos
export const auth = getAuth(app);
export const db = getFirestore(app);
export default app;
