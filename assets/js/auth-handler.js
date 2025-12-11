// Auth Handler for all protected pages
// Uses global logout function from auth-guard.js

// Wait for DOM to load
document.addEventListener('DOMContentLoaded', () => {
    // Attach logout handler
    const logoutBtn = document.getElementById('logoutBtn');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', async (e) => {
            e.preventDefault();
            if (confirm('Apakah Anda yakin ingin keluar?')) {
                if (typeof window.logout === 'function') {
                    await window.logout();
                } else {
                    console.error('Logout function not available');
                    alert('Error: Fungsi logout tidak tersedia');
                }
            }
        });
    }
});
