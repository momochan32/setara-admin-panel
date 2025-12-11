// Authentication Guard
// This file checks if user is authenticated before accessing protected pages
// Uses global Firebase objects from firebase-config.js

// Wait for Firebase to be initialized
function initAuthGuard() {
    // Check if Firebase is loaded
    if (typeof firebase === 'undefined' || !window.firebaseAuth) {
        console.error('Firebase not initialized. Make sure firebase-config.js is loaded first.');
        return;
    }

    const auth = window.firebaseAuth;

    // Check if current page is login page
    const isLoginPage = window.location.pathname.includes('login.html');

    // Monitor auth state
    firebase.auth().onAuthStateChanged((user) => {
        if (!user && !isLoginPage) {
            // User is not logged in and trying to access protected page
            console.log('User not authenticated, redirecting to login...');
            window.location.href = 'login.html';
        } else if (user && isLoginPage) {
            // User is logged in and trying to access login page
            console.log('User already authenticated, redirecting to dashboard...');
            window.location.href = 'index.html';
        } else if (user) {
            // User is authenticated
            console.log('User authenticated:', user.email);
        }
    });
}

// Run auth guard when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAuthGuard);
} else {
    initAuthGuard();
}

// Global auth check function
window.requireAuth = function() {
    return new Promise((resolve, reject) => {
        const auth = window.firebaseAuth;
        if (!auth) {
            reject(new Error('Firebase Auth not initialized'));
            return;
        }

        const unsubscribe = firebase.auth().onAuthStateChanged((user) => {
            unsubscribe();
            if (user) {
                resolve(user);
            } else {
                reject(new Error('Not authenticated'));
            }
        });
    });
};

// Global logout function
window.logout = async function() {
    try {
        const auth = window.firebaseAuth;
        if (!auth) {
            throw new Error('Firebase Auth not initialized');
        }
        await firebase.auth().signOut();
        window.location.href = 'login.html';
    } catch (error) {
        console.error('Logout error:', error);
        alert('Gagal logout: ' + error.message);
    }
};
