// Firebase Utility Functions
// Common helper functions for Firebase CRUD operations

import { db } from './firebase-config.js';
import { collection, getDocs, getDoc, addDoc, updateDoc, deleteDoc, doc, query, orderBy, where } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-firestore.js";

/**
 * Get all documents from a collection
 */
export async function getAllDocuments(collectionName, orderByField = null, orderDirection = 'asc') {
    try {
        let q;
        if (orderByField) {
            q = query(collection(db, collectionName), orderBy(orderByField, orderDirection));
        } else {
            q = collection(db, collectionName);
        }

        const querySnapshot = await getDocs(q);
        const documents = [];
        querySnapshot.forEach((doc) => {
            documents.push({
                id: doc.id,
                ...doc.data()
            });
        });
        return { success: true, data: documents };
    } catch (error) {
        console.error(`Error getting documents from ${collectionName}:`, error);
        return { success: false, error: error.message };
    }
}

/**
 * Get a single document by ID
 */
export async function getDocument(collectionName, documentId) {
    try {
        const docRef = doc(db, collectionName, documentId);
        const docSnap = await getDoc(docRef);

        if (docSnap.exists()) {
            return {
                success: true,
                data: { id: docSnap.id, ...docSnap.data() }
            };
        } else {
            return { success: false, error: 'Document not found' };
        }
    } catch (error) {
        console.error(`Error getting document:`, error);
        return { success: false, error: error.message };
    }
}

/**
 * Add a new document
 */
export async function addDocument(collectionName, data) {
    try {
        const docRef = await addDoc(collection(db, collectionName), data);
        return { success: true, id: docRef.id };
    } catch (error) {
        console.error(`Error adding document:`, error);
        return { success: false, error: error.message };
    }
}

/**
 * Update an existing document
 */
export async function updateDocument(collectionName, documentId, data) {
    try {
        const docRef = doc(db, collectionName, documentId);
        await updateDoc(docRef, data);
        return { success: true };
    } catch (error) {
        console.error(`Error updating document:`, error);
        return { success: false, error: error.message };
    }
}

/**
 * Delete a document
 */
export async function deleteDocument(collectionName, documentId) {
    try {
        await deleteDoc(doc(db, collectionName, documentId));
        return { success: true };
    } catch (error) {
        console.error(`Error deleting document:`, error);
        return { success: false, error: error.message };
    }
}

/**
 * Query documents with where clause
 */
export async function queryDocuments(collectionName, field, operator, value) {
    try {
        const q = query(collection(db, collectionName), where(field, operator, value));
        const querySnapshot = await getDocs(q);
        const documents = [];
        querySnapshot.forEach((doc) => {
            documents.push({
                id: doc.id,
                ...doc.data()
            });
        });
        return { success: true, data: documents };
    } catch (error) {
        console.error(`Error querying documents:`, error);
        return { success: false, error: error.message };
    }
}

/**
 * Show loading spinner in container
 */
export function showLoading(containerId) {
    const container = document.getElementById(containerId);
    if (container) {
        container.innerHTML = '<div class="text-center py-5"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>';
    }
}

/**
 * Show error message in container
 */
export function showError(containerId, message) {
    const container = document.getElementById(containerId);
    if (container) {
        container.innerHTML = `<div class="alert alert-danger" role="alert">${message}</div>`;
    }
}

/**
 * Show success toast notification
 */
export function showSuccessToast(message) {
    // Using Bootstrap toast or simple alert
    if (typeof $ !== 'undefined') {
        // If jQuery is available, use a simple notification
        $('body').append(`
            <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
                <div class="toast show bg-success text-white" role="alert">
                    <div class="toast-body">
                        <i class="ri-check-line me-2"></i>${message}
                    </div>
                </div>
            </div>
        `);
        setTimeout(() => {
            $('.toast').fadeOut(() => $('.toast').remove());
        }, 3000);
    } else {
        alert(message);
    }
}

/**
 * Confirm delete action
 */
export function confirmDelete(itemName = 'item') {
    return confirm(`Apakah Anda yakin ingin menghapus ${itemName}? Tindakan ini tidak dapat dibatalkan.`);
}

/**
 * Format timestamp to readable date
 */
export function formatDate(timestamp) {
    if (!timestamp) return 'N/A';

    // Handle Firestore Timestamp
    const date = timestamp.toDate ? timestamp.toDate() : new Date(timestamp);

    return date.toLocaleDateString('id-ID', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });
}

/**
 * Validate form data
 */
export function validateForm(formId) {
    const form = document.getElementById(formId);
    if (!form) return false;

    return form.checkValidity();
}

/**
 * Reset form
 */
export function resetForm(formId) {
    const form = document.getElementById(formId);
    if (form) {
        form.reset();
    }
}

/**
 * Populate select dropdown with options
 */
export async function populateSelect(selectId, collectionName, valueField = 'id', textField = 'title', orderByField = 'order') {
    const select = document.getElementById(selectId);
    if (!select) return;

    const result = await getAllDocuments(collectionName, orderByField);

    if (result.success) {
        select.innerHTML = '<option value="">-- Pilih --</option>';
        result.data.forEach(item => {
            const option = document.createElement('option');
            option.value = item[valueField];
            option.textContent = item[textField];
            select.appendChild(option);
        });
    }
}

export default {
    getAllDocuments,
    getDocument,
    addDocument,
    updateDocument,
    deleteDocument,
    queryDocuments,
    showLoading,
    showError,
    showSuccessToast,
    confirmDelete,
    formatDate,
    validateForm,
    resetForm,
    populateSelect
};
