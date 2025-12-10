// Master Firebase Application Controller
// This file orchestrates all Firebase operations across pages

import { usersAPI, clustersAPI, modulesAPI, submodulesAPI, quizzesAPI, discussionsAPI, broadcastsAPI, showLoading, hideLoading, showToast } from './firebase-crud.js';

// Page detection and initialization
const currentPage = window.location.pathname.split('/').pop().replace('.html', '');

// Global state management
window.SETARA = {
    currentUser: null,
    data: {
        users: [],
        clusters: [],
        modules: [],
        submodules: [],
        quizzes: [],
        discussions: [],
        broadcasts: []
    },
    api: {
        users: usersAPI,
        clusters: clustersAPI,
        modules: modulesAPI,
        submodules: submodulesAPI,
        quizzes: quizzesAPI,
        discussions: discussionsAPI,
        broadcasts: broadcastsAPI
    },
    utils: {
        showLoading,
        hideLoading,
        showToast
    }
};

// Initialize app based on current page
document.addEventListener('DOMContentLoaded', async () => {
    console.log('SETARA App initializing for page:', currentPage);

    // Load data based on page
    switch (currentPage) {
        case 'index':
        case '':
            await initDashboard();
            break;
        case 'users':
            await initUsers();
            break;
        case 'edu-clusters':
            await initClusters();
            break;
        case 'edu-modules':
            await initModules();
            break;
        case 'edu-contents':
            await initSubmodules();
            break;
        case 'quizzes':
            await initQuizzes();
            break;
        case 'community':
            await initCommunity();
            break;
        case 'broadcast':
            await initBroadcast();
            break;
    }
});

// ============================================
// DASHBOARD INITIALIZATION
// ============================================
async function initDashboard() {
    showLoading();

    // Load all data for dashboard
    const [usersResult, clustersResult, modulesResult] = await Promise.all([
        usersAPI.getAll(),
        clustersAPI.getAll(),
        modulesAPI.getAll()
    ]);

    if (usersResult.success) {
        SETARA.data.users = usersResult.data;
        updateDashboardStats();
    }

    if (clustersResult.success) {
        SETARA.data.clusters = clustersResult.data;
    }

    if (modulesResult.success) {
        SETARA.data.modules = modulesResult.data;
    }

    hideLoading();
}

function updateDashboardStats() {
    const users = SETARA.data.users;

    // Update total users
    const totalUsersEl = document.querySelector('#totalUsers');
    if (totalUsersEl) {
        totalUsersEl.textContent = users.length;
    }

    // Update active users today (mock: 60% of total)
    const activeUsersEl = document.querySelector('#activeUsers');
    if (activeUsersEl) {
        activeUsersEl.textContent = Math.floor(users.length * 0.6);
    }

    // Count by thalassemia type
    const mayorCount = users.filter(u => u.thalassemiaType === 'mayor').length;
    const minorCount = users.filter(u => u.thalassemiaType === 'minor').length;

    const mayorEl = document.querySelector('#mayorCount');
    const minorEl = document.querySelector('#minorCount');

    if (mayorEl) mayorEl.textContent = `${mayorCount} (${Math.round(mayorCount/users.length*100)}%)`;
    if (minorEl) minorEl.textContent = `${minorCount} (${Math.round(minorCount/users.length*100)}%)`;
}

// ============================================
// USERS PAGE INITIALIZATION
// ============================================
async function initUsers() {
    showLoading();

    const result = await usersAPI.getAll();

    if (result.success) {
        SETARA.data.users = result.data;
        renderUsersTable(result.data);
    } else {
        showToast('Gagal memuat data pengguna: ' + result.error, 'error');
    }

    hideLoading();

    // Setup event listeners
    setupUsersEventListeners();
}

function renderUsersTable(users) {
    const tbody = document.querySelector('#usersTableBody');
    if (!tbody) return;

    tbody.innerHTML = users.map((user, index) => `
        <tr>
            <td class="text-center">${String(index + 1).padStart(2, '0')}</td>
            <td>
                <div class="d-flex align-items-center gap-3">
                    <div class="w-40-px h-40-px rounded-circle bg-primary-focus text-primary-600 d-flex justify-content-center align-items-center fw-semibold">
                        ${user.name ? user.name.charAt(0).toUpperCase() : 'U'}
                    </div>
                    <div>
                        <h6 class="mb-0">${user.name || 'Unknown'}</h6>
                        <span class="text-sm text-secondary-light">${user.email || '-'}</span>
                    </div>
                </div>
            </td>
            <td class="text-center">${user.age || '-'}</td>
            <td class="text-center">
                <span class="badge ${user.gender === 'female' ? 'bg-danger-focus text-danger-600' : 'bg-info-focus text-info-600'} px-12 py-6">
                    ${user.gender === 'female' ? 'Perempuan' : 'Laki-laki'}
                </span>
            </td>
            <td class="text-center">
                <span class="badge ${user.thalassemiaType === 'mayor' ? 'bg-danger-600 text-white' : 'bg-warning-600 text-white'} px-12 py-6">
                    ${user.thalassemiaType === 'mayor' ? 'Mayor' : 'Minor'}
                </span>
            </td>
            <td class="text-center">
                <div class="d-flex align-items-center gap-8 justify-content-center">
                    <button class="view-user-btn bg-primary-focus text-primary-600 bg-hover-primary-200 fw-medium w-36-px h-36-px d-flex justify-content-center align-items-center rounded-circle" data-user-id="${user.id}" title="Detail">
                        <iconify-icon icon="solar:eye-outline" class="icon text-lg"></iconify-icon>
                    </button>
                    <button class="delete-user-btn bg-danger-focus bg-hover-danger-200 text-danger-600 fw-medium w-36-px h-36-px d-flex justify-content-center align-items-center rounded-circle" data-user-id="${user.id}" title="Hapus">
                        <iconify-icon icon="fluent:delete-24-regular" class="icon text-lg"></iconify-icon>
                    </button>
                </div>
            </td>
        </tr>
    `).join('');
}

function setupUsersEventListeners() {
    // View user details
    document.addEventListener('click', async (e) => {
        const btn = e.target.closest('.view-user-btn');
        if (btn) {
            const userId = btn.dataset.userId;
            const user = SETARA.data.users.find(u => u.id === userId);
            if (user) {
                showUserModal(user);
            }
        }
    });

    // Delete user
    document.addEventListener('click', async (e) => {
        const btn = e.target.closest('.delete-user-btn');
        if (btn) {
            if (confirm('Apakah Anda yakin ingin menghapus pengguna ini?')) {
                showLoading();
                const userId = btn.dataset.userId;
                const result = await usersAPI.delete(userId);

                if (result.success) {
                    showToast('Pengguna berhasil dihapus');
                    await initUsers(); // Reload
                } else {
                    showToast('Gagal menghapus pengguna: ' + result.error, 'error');
                    hideLoading();
                }
            }
        }
    });
}

function showUserModal(user) {
    // Populate modal with user data
    const modal = new bootstrap.Modal(document.getElementById('userDetailModal'));

    document.getElementById('userName').textContent = user.name || '-';
    document.getElementById('userEmail').textContent = user.email || '-';
    document.getElementById('userAge').textContent = user.age || '-';
    document.getElementById('userGender').textContent = user.gender === 'female' ? 'Perempuan' : 'Laki-laki';
    document.getElementById('userType').textContent = user.thalassemiaType === 'mayor' ? 'Thalassemia Mayor' : 'Thalassemia Minor';
    document.getElementById('userPhone').textContent = user.phone || '-';

    // Emergency contact
    document.getElementById('emergencyName').textContent = user.emergencyContactName || '-';
    document.getElementById('emergencyPhone').textContent = user.emergencyContactPhone || '-';
    document.getElementById('emergencyRelation').textContent = user.emergencyContactRelation || '-';

    modal.show();
}

// ============================================
// CLUSTERS PAGE INITIALIZATION
// ============================================
async function initClusters() {
    showLoading();

    const result = await clustersAPI.getAll();

    if (result.success) {
        SETARA.data.clusters = result.data;
        renderClustersGrid(result.data);
    } else {
        showToast('Gagal memuat klaster: ' + result.error, 'error');
    }

    hideLoading();
    setupClustersEventListeners();
}

function renderClustersGrid(clusters) {
    const container = document.querySelector('#clustersGrid');
    if (!container) return;

    container.innerHTML = clusters.map(cluster => `
        <div class="col-xxl-3 col-xl-4 col-md-6 col-sm-6 cluster-card-item">
            <div class="card shadow-sm border-0 h-100 radius-12 transition-2 hover-shadow-lg">
                <div class="card-body p-20">
                    <div class="d-flex align-items-center justify-content-between mb-20">
                        <div class="w-56-px h-56-px ${cluster.bgColor || 'bg-primary-focus'} rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                            <i class="${cluster.icon || 'ri-book-line'} ${cluster.iconColor || 'text-primary-600'} text-2xl"></i>
                        </div>
                        <span class="badge bg-neutral-200 text-neutral-700 px-12 py-6 text-xs fw-semibold radius-8">
                            #${cluster.order || 1}
                        </span>
                    </div>
                    <h6 class="mb-12 fw-bold text-lg">${cluster.title || 'Untitled'}</h6>
                    <p class="text-secondary-light text-sm mb-20 line-height-1-6" style="min-height: 60px;">${cluster.description || ''}</p>
                    <div class="d-flex align-items-center justify-content-between pt-16 border-top mb-16">
                        <div class="d-flex align-items-center gap-2">
                            <iconify-icon icon="solar:document-text-bold" class="text-primary-600 text-lg"></iconify-icon>
                            <span class="text-sm text-secondary-light fw-medium">${cluster.moduleCount || 0} Modul</span>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="edu-modules.html?cluster_id=${cluster.id}" class="btn btn-primary-600 radius-8 px-16 py-8 text-sm flex-fill">
                            <iconify-icon icon="solar:eye-outline" class="icon text-lg"></iconify-icon>
                            Lihat Modul
                        </a>
                        <button type="button" class="edit-cluster-btn btn btn-outline-success-600 radius-8 px-12 py-8 text-sm" data-cluster-id="${cluster.id}" title="Edit">
                            <iconify-icon icon="lucide:edit" class="icon text-lg"></iconify-icon>
                        </button>
                        <button type="button" class="delete-cluster-btn btn btn-outline-danger-600 radius-8 px-12 py-8 text-sm" data-cluster-id="${cluster.id}" title="Hapus">
                            <iconify-icon icon="fluent:delete-24-regular" class="icon text-lg"></iconify-icon>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `).join('');
}

function setupClustersEventListeners() {
    // Add cluster
    const addBtn = document.getElementById('addClusterBtn');
    if (addBtn) {
        addBtn.addEventListener('click', () => {
            const modal = new bootstrap.Modal(document.getElementById('addClusterModal'));
            modal.show();
        });
    }

    // Delete cluster
    document.addEventListener('click', async (e) => {
        const btn = e.target.closest('.delete-cluster-btn');
        if (btn) {
            if (confirm('Apakah Anda yakin ingin menghapus klaster ini?')) {
                showLoading();
                const clusterId = btn.dataset.clusterId;
                const result = await clustersAPI.delete(clusterId);

                if (result.success) {
                    showToast('Klaster berhasil dihapus');
                    await initClusters();
                } else {
                    showToast('Gagal menghapus klaster: ' + result.error, 'error');
                    hideLoading();
                }
            }
        }
    });
}

// Similar functions for modules, submodules, quizzes, etc.
async function initModules() {
    showLoading();
    const result = await modulesAPI.getAll();
    if (result.success) SETARA.data.modules = result.data;
    hideLoading();
}

async function initSubmodules() {
    showLoading();
    const result = await submodulesAPI.getAll();
    if (result.success) SETARA.data.submodules = result.data;
    hideLoading();
}

async function initQuizzes() {
    showLoading();
    const result = await quizzesAPI.getAll();
    if (result.success) SETARA.data.quizzes = result.data;
    hideLoading();
}

async function initCommunity() {
    showLoading();
    const result = await discussionsAPI.getAll();
    if (result.success) SETARA.data.discussions = result.data;
    hideLoading();
}

async function initBroadcast() {
    showLoading();
    const result = await broadcastsAPI.getAll();
    if (result.success) SETARA.data.broadcasts = result.data;
    hideLoading();
}

// Export for global access
window.initDashboard = initDashboard;
window.initUsers = initUsers;
window.initClusters = initClusters;
