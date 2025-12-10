// Firebase CRUD Operations
import { db } from './firebase-config.js';
import {
    collection,
    doc,
    getDoc,
    getDocs,
    addDoc,
    updateDoc,
    deleteDoc,
    query,
    where,
    orderBy,
    limit,
    Timestamp
} from "https://www.gstatic.com/firebasejs/10.7.1/firebase-firestore.js";

// ============================================
// USERS CRUD
// ============================================

export const usersAPI = {
    // Get all users
    async getAll() {
        try {
            const querySnapshot = await getDocs(collection(db, "users"));
            const users = [];
            querySnapshot.forEach((doc) => {
                users.push({ id: doc.id, ...doc.data() });
            });
            return { success: true, data: users };
        } catch (error) {
            console.error("Error getting users:", error);
            return { success: false, error: error.message };
        }
    },

    // Get user by ID
    async getById(userId) {
        try {
            const docRef = doc(db, "users", userId);
            const docSnap = await getDoc(docRef);

            if (docSnap.exists()) {
                return { success: true, data: { id: docSnap.id, ...docSnap.data() } };
            } else {
                return { success: false, error: "User not found" };
            }
        } catch (error) {
            console.error("Error getting user:", error);
            return { success: false, error: error.message };
        }
    },

    // Create new user
    async create(userData) {
        try {
            const docRef = await addDoc(collection(db, "users"), {
                ...userData,
                createdAt: Timestamp.now(),
                updatedAt: Timestamp.now()
            });
            return { success: true, id: docRef.id };
        } catch (error) {
            console.error("Error creating user:", error);
            return { success: false, error: error.message };
        }
    },

    // Update user
    async update(userId, userData) {
        try {
            const docRef = doc(db, "users", userId);
            await updateDoc(docRef, {
                ...userData,
                updatedAt: Timestamp.now()
            });
            return { success: true };
        } catch (error) {
            console.error("Error updating user:", error);
            return { success: false, error: error.message };
        }
    },

    // Delete user
    async delete(userId) {
        try {
            await deleteDoc(doc(db, "users", userId));
            return { success: true };
        } catch (error) {
            console.error("Error deleting user:", error);
            return { success: false, error: error.message };
        }
    }
};

// ============================================
// CLUSTERS CRUD
// ============================================

export const clustersAPI = {
    async getAll() {
        try {
            const q = query(collection(db, "clusters"), orderBy("order", "asc"));
            const querySnapshot = await getDocs(q);
            const clusters = [];
            querySnapshot.forEach((doc) => {
                clusters.push({ id: doc.id, ...doc.data() });
            });
            return { success: true, data: clusters };
        } catch (error) {
            console.error("Error getting clusters:", error);
            return { success: false, error: error.message };
        }
    },

    async getById(clusterId) {
        try {
            const docRef = doc(db, "clusters", clusterId);
            const docSnap = await getDoc(docRef);

            if (docSnap.exists()) {
                return { success: true, data: { id: docSnap.id, ...docSnap.data() } };
            } else {
                return { success: false, error: "Cluster not found" };
            }
        } catch (error) {
            console.error("Error getting cluster:", error);
            return { success: false, error: error.message };
        }
    },

    async create(clusterData) {
        try {
            const docRef = await addDoc(collection(db, "clusters"), {
                ...clusterData,
                createdAt: Timestamp.now(),
                updatedAt: Timestamp.now()
            });
            return { success: true, id: docRef.id };
        } catch (error) {
            console.error("Error creating cluster:", error);
            return { success: false, error: error.message };
        }
    },

    async update(clusterId, clusterData) {
        try {
            const docRef = doc(db, "clusters", clusterId);
            await updateDoc(docRef, {
                ...clusterData,
                updatedAt: Timestamp.now()
            });
            return { success: true };
        } catch (error) {
            console.error("Error updating cluster:", error);
            return { success: false, error: error.message };
        }
    },

    async delete(clusterId) {
        try {
            await deleteDoc(doc(db, "clusters", clusterId));
            return { success: true };
        } catch (error) {
            console.error("Error deleting cluster:", error);
            return { success: false, error: error.message };
        }
    }
};

// ============================================
// MODULES CRUD
// ============================================

export const modulesAPI = {
    async getAll() {
        try {
            const q = query(collection(db, "modules"), orderBy("order", "asc"));
            const querySnapshot = await getDocs(q);
            const modules = [];
            querySnapshot.forEach((doc) => {
                modules.push({ id: doc.id, ...doc.data() });
            });
            return { success: true, data: modules };
        } catch (error) {
            console.error("Error getting modules:", error);
            return { success: false, error: error.message };
        }
    },

    async getByClusterId(clusterId) {
        try {
            const q = query(
                collection(db, "modules"),
                where("clusterId", "==", clusterId),
                orderBy("order", "asc")
            );
            const querySnapshot = await getDocs(q);
            const modules = [];
            querySnapshot.forEach((doc) => {
                modules.push({ id: doc.id, ...doc.data() });
            });
            return { success: true, data: modules };
        } catch (error) {
            console.error("Error getting modules:", error);
            return { success: false, error: error.message };
        }
    },

    async getById(moduleId) {
        try {
            const docRef = doc(db, "modules", moduleId);
            const docSnap = await getDoc(docRef);

            if (docSnap.exists()) {
                return { success: true, data: { id: docSnap.id, ...docSnap.data() } };
            } else {
                return { success: false, error: "Module not found" };
            }
        } catch (error) {
            console.error("Error getting module:", error);
            return { success: false, error: error.message };
        }
    },

    async create(moduleData) {
        try {
            const docRef = await addDoc(collection(db, "modules"), {
                ...moduleData,
                createdAt: Timestamp.now(),
                updatedAt: Timestamp.now()
            });
            return { success: true, id: docRef.id };
        } catch (error) {
            console.error("Error creating module:", error);
            return { success: false, error: error.message };
        }
    },

    async update(moduleId, moduleData) {
        try {
            const docRef = doc(db, "modules", moduleId);
            await updateDoc(docRef, {
                ...moduleData,
                updatedAt: Timestamp.now()
            });
            return { success: true };
        } catch (error) {
            console.error("Error updating module:", error);
            return { success: false, error: error.message };
        }
    },

    async delete(moduleId) {
        try {
            await deleteDoc(doc(db, "modules", moduleId));
            return { success: true };
        } catch (error) {
            console.error("Error deleting module:", error);
            return { success: false, error: error.message };
        }
    }
};

// ============================================
// SUBMODULES/CONTENTS CRUD
// ============================================

export const submodulesAPI = {
    async getAll() {
        try {
            const q = query(collection(db, "submodules"), orderBy("order", "asc"));
            const querySnapshot = await getDocs(q);
            const submodules = [];
            querySnapshot.forEach((doc) => {
                submodules.push({ id: doc.id, ...doc.data() });
            });
            return { success: true, data: submodules };
        } catch (error) {
            console.error("Error getting submodules:", error);
            return { success: false, error: error.message };
        }
    },

    async getByModuleId(moduleId) {
        try {
            const q = query(
                collection(db, "submodules"),
                where("moduleId", "==", moduleId),
                orderBy("order", "asc")
            );
            const querySnapshot = await getDocs(q);
            const submodules = [];
            querySnapshot.forEach((doc) => {
                submodules.push({ id: doc.id, ...doc.data() });
            });
            return { success: true, data: submodules };
        } catch (error) {
            console.error("Error getting submodules:", error);
            return { success: false, error: error.message };
        }
    },

    async getById(submoduleId) {
        try {
            const docRef = doc(db, "submodules", submoduleId);
            const docSnap = await getDoc(docRef);

            if (docSnap.exists()) {
                return { success: true, data: { id: docSnap.id, ...docSnap.data() } };
            } else {
                return { success: false, error: "Submodule not found" };
            }
        } catch (error) {
            console.error("Error getting submodule:", error);
            return { success: false, error: error.message };
        }
    },

    async create(submoduleData) {
        try {
            const docRef = await addDoc(collection(db, "submodules"), {
                ...submoduleData,
                createdAt: Timestamp.now(),
                updatedAt: Timestamp.now()
            });
            return { success: true, id: docRef.id };
        } catch (error) {
            console.error("Error creating submodule:", error);
            return { success: false, error: error.message };
        }
    },

    async update(submoduleId, submoduleData) {
        try {
            const docRef = doc(db, "submodules", submoduleId);
            await updateDoc(docRef, {
                ...submoduleData,
                updatedAt: Timestamp.now()
            });
            return { success: true };
        } catch (error) {
            console.error("Error updating submodule:", error);
            return { success: false, error: error.message };
        }
    },

    async delete(submoduleId) {
        try {
            await deleteDoc(doc(db, "submodules", submoduleId));
            return { success: true };
        } catch (error) {
            console.error("Error deleting submodule:", error);
            return { success: false, error: error.message };
        }
    }
};

// ============================================
// QUIZZES CRUD
// ============================================

export const quizzesAPI = {
    async getAll() {
        try {
            const querySnapshot = await getDocs(collection(db, "quizzes"));
            const quizzes = [];
            querySnapshot.forEach((doc) => {
                quizzes.push({ id: doc.id, ...doc.data() });
            });
            return { success: true, data: quizzes };
        } catch (error) {
            console.error("Error getting quizzes:", error);
            return { success: false, error: error.message };
        }
    },

    async getByModuleId(moduleId) {
        try {
            const q = query(
                collection(db, "quizzes"),
                where("moduleId", "==", moduleId)
            );
            const querySnapshot = await getDocs(q);
            const quizzes = [];
            querySnapshot.forEach((doc) => {
                quizzes.push({ id: doc.id, ...doc.data() });
            });
            return { success: true, data: quizzes };
        } catch (error) {
            console.error("Error getting quizzes:", error);
            return { success: false, error: error.message };
        }
    },

    async getById(quizId) {
        try {
            const docRef = doc(db, "quizzes", quizId);
            const docSnap = await getDoc(docRef);

            if (docSnap.exists()) {
                return { success: true, data: { id: docSnap.id, ...docSnap.data() } };
            } else {
                return { success: false, error: "Quiz not found" };
            }
        } catch (error) {
            console.error("Error getting quiz:", error);
            return { success: false, error: error.message };
        }
    },

    async create(quizData) {
        try {
            const docRef = await addDoc(collection(db, "quizzes"), {
                ...quizData,
                createdAt: Timestamp.now(),
                updatedAt: Timestamp.now()
            });
            return { success: true, id: docRef.id };
        } catch (error) {
            console.error("Error creating quiz:", error);
            return { success: false, error: error.message };
        }
    },

    async update(quizId, quizData) {
        try {
            const docRef = doc(db, "quizzes", quizId);
            await updateDoc(docRef, {
                ...quizData,
                updatedAt: Timestamp.now()
            });
            return { success: true };
        } catch (error) {
            console.error("Error updating quiz:", error);
            return { success: false, error: error.message };
        }
    },

    async delete(quizId) {
        try {
            await deleteDoc(doc(db, "quizzes", quizId));
            return { success: true };
        } catch (error) {
            console.error("Error deleting quiz:", error);
            return { success: false, error: error.message };
        }
    }
};

// ============================================
// COMMUNITY/DISCUSSIONS CRUD
// ============================================

export const discussionsAPI = {
    async getAll() {
        try {
            const q = query(collection(db, "discussions"), orderBy("createdAt", "desc"));
            const querySnapshot = await getDocs(q);
            const discussions = [];
            querySnapshot.forEach((doc) => {
                discussions.push({ id: doc.id, ...doc.data() });
            });
            return { success: true, data: discussions };
        } catch (error) {
            console.error("Error getting discussions:", error);
            return { success: false, error: error.message };
        }
    },

    async getById(discussionId) {
        try {
            const docRef = doc(db, "discussions", discussionId);
            const docSnap = await getDoc(docRef);

            if (docSnap.exists()) {
                return { success: true, data: { id: docSnap.id, ...docSnap.data() } };
            } else {
                return { success: false, error: "Discussion not found" };
            }
        } catch (error) {
            console.error("Error getting discussion:", error);
            return { success: false, error: error.message };
        }
    },

    async create(discussionData) {
        try {
            const docRef = await addDoc(collection(db, "discussions"), {
                ...discussionData,
                createdAt: Timestamp.now(),
                updatedAt: Timestamp.now()
            });
            return { success: true, id: docRef.id };
        } catch (error) {
            console.error("Error creating discussion:", error);
            return { success: false, error: error.message };
        }
    },

    async update(discussionId, discussionData) {
        try {
            const docRef = doc(db, "discussions", discussionId);
            await updateDoc(docRef, {
                ...discussionData,
                updatedAt: Timestamp.now()
            });
            return { success: true };
        } catch (error) {
            console.error("Error updating discussion:", error);
            return { success: false, error: error.message };
        }
    },

    async delete(discussionId) {
        try {
            await deleteDoc(doc(db, "discussions", discussionId));
            return { success: true };
        } catch (error) {
            console.error("Error deleting discussion:", error);
            return { success: false, error: error.message };
        }
    }
};

// ============================================
// BROADCASTS CRUD
// ============================================

export const broadcastsAPI = {
    async getAll() {
        try {
            const q = query(collection(db, "broadcasts"), orderBy("createdAt", "desc"));
            const querySnapshot = await getDocs(q);
            const broadcasts = [];
            querySnapshot.forEach((doc) => {
                broadcasts.push({ id: doc.id, ...doc.data() });
            });
            return { success: true, data: broadcasts };
        } catch (error) {
            console.error("Error getting broadcasts:", error);
            return { success: false, error: error.message };
        }
    },

    async getById(broadcastId) {
        try {
            const docRef = doc(db, "broadcasts", broadcastId);
            const docSnap = await getDoc(docRef);

            if (docSnap.exists()) {
                return { success: true, data: { id: docSnap.id, ...docSnap.data() } };
            } else {
                return { success: false, error: "Broadcast not found" };
            }
        } catch (error) {
            console.error("Error getting broadcast:", error);
            return { success: false, error: error.message };
        }
    },

    async create(broadcastData) {
        try {
            const docRef = await addDoc(collection(db, "broadcasts"), {
                ...broadcastData,
                createdAt: Timestamp.now(),
                updatedAt: Timestamp.now()
            });
            return { success: true, id: docRef.id };
        } catch (error) {
            console.error("Error creating broadcast:", error);
            return { success: false, error: error.message };
        }
    },

    async update(broadcastId, broadcastData) {
        try {
            const docRef = doc(db, "broadcasts", broadcastId);
            await updateDoc(docRef, {
                ...broadcastData,
                updatedAt: Timestamp.now()
            });
            return { success: true };
        } catch (error) {
            console.error("Error updating broadcast:", error);
            return { success: false, error: error.message };
        }
    },

    async delete(broadcastId) {
        try {
            await deleteDoc(doc(db, "broadcasts", broadcastId));
            return { success: true };
        } catch (error) {
            console.error("Error deleting broadcast:", error);
            return { success: false, error: error.message };
        }
    }
};

// Helper function to show loading state
export function showLoading() {
    // Add loading spinner or overlay
    const loadingHTML = `
        <div id="loadingOverlay" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); display: flex; justify-content: center; align-items: center; z-index: 9999;">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    `;
    document.body.insertAdjacentHTML('beforeend', loadingHTML);
}

export function hideLoading() {
    const overlay = document.getElementById('loadingOverlay');
    if (overlay) {
        overlay.remove();
    }
}

// Helper function to show toast notifications
export function showToast(message, type = 'success') {
    const toastHTML = `
        <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 11000;">
            <div class="toast show align-items-center text-white bg-${type === 'success' ? 'success' : 'danger'} border-0" role="alert">
                <div class="d-flex">
                    <div class="toast-body">
                        ${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        </div>
    `;
    document.body.insertAdjacentHTML('beforeend', toastHTML);

    // Auto remove after 3 seconds
    setTimeout(() => {
        const toasts = document.querySelectorAll('.toast-container');
        toasts.forEach(toast => toast.remove());
    }, 3000);
}
