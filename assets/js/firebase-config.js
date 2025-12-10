// Firebase Configuration and Initialization
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-analytics.js";
import { getFirestore } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-firestore.js";
import { getAuth } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-auth.js";

// Load environment variables from .env
// Note: In production with GitHub Pages, you'll need to use GitHub Secrets
// and inject them during build, or use a config file (not recommended for sensitive data)

// For now, we'll load from a separate config file
let firebaseConfig = {};

// Try to load from env-config.js (gitignored, for local development)
try {
    const envModule = await import('./env-config.js');
    firebaseConfig = envModule.firebaseConfig;
} catch (error) {
    // Fallback to public config (you should use GitHub Secrets for production)
    console.warn('env-config.js not found, using fallback config');
    firebaseConfig = {
        apiKey: "AIzaSyBNR37tWnX7Ahv5w08sLIybHhCFPzNsbTI",
        authDomain: "setara-app-production.firebaseapp.com",
        projectId: "setara-app-production",
        storageBucket: "setara-app-production.firebasestorage.app",
        messagingSenderId: "1007146511774",
        appId: "1:1007146511774:web:ac2c48e8e95dd435263a8f",
        measurementId: "G-FJCRRYYPBG"
    };
}

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
const db = getFirestore(app);
const auth = getAuth(app);

// Export Firebase services
export { app, analytics, db, auth };
