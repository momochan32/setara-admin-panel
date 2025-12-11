// Firebase Configuration and Initialization
// This file initializes Firebase using global CDN scripts

// Firebase config
const firebaseConfig = {
    apiKey: "AIzaSyBNR37tWnX7Ahv5w08sLIybHhCFPzNsbTI",
    authDomain: "setara-app-production.firebaseapp.com",
    projectId: "setara-app-production",
    storageBucket: "setara-app-production.firebasestorage.app",
    messagingSenderId: "1007146511774",
    appId: "1:1007146511774:web:ac2c48e8e95dd435263a8f",
    measurementId: "G-FJCRRYYPBG"
};

// Initialize Firebase (using global firebase object from CDN)
if (typeof firebase !== 'undefined') {
    window.firebaseApp = firebase.initializeApp(firebaseConfig);
    window.firebaseAnalytics = firebase.analytics();
    window.firebaseDb = firebase.firestore();
    window.firebaseAuth = firebase.auth();

    console.log('Firebase initialized successfully');
} else {
    console.error('Firebase SDK not loaded. Make sure to include Firebase scripts.');
}
