# SETARA Admin Panel - Implementation Guide

## ✅ Status Implementasi

### Sudah Selesai (100% Working with Firebase)
1. **login.html** - Login dengan Firebase Auth ✓
2. **edu-clusters.html** - Full CRUD dengan Firebase ✓
3. **users.html** - Read dari Firebase (no create) ✓

### Dalam Proses
4. **edu-modules.html** - Sedang implementasi CRUD
5. **edu-contents.html** - Sedang implementasi CRUD
6. **quizzes.html** - Sedang implementasi CRUD
7. **community.html** - Sedang implementasi CRUD
8. **broadcast.html** - Sedang implementasi CRUD

## 📋 Field Structure Reference

### eduModules
- clusterId (Ref to eduClusters)
- title
- description
- estimatedTime (minutes)
- order

### eduSubmodules (edu-contents)
- moduleId (Ref to eduModules)
- title
- contentType ('article' | 'video')
- contentHTML
- videoURL
- order

### quizzes
- moduleId (Ref to eduModules)
- question
- type ('Multiple Choice' | 'True False')
- options (Array)
- correctAnswer
- points

### discussionMessages (community)
- content
- senderName
- isDeletedByAdmin (Boolean)
- reportCount
- timestamp

### broadcasts
- title
- message
- targetAudience
- sentAt
- status

## 🔥 Firebase Collections
- users
- eduClusters
- eduModules
- eduSubmodules
- quizzes
- discussionMessages
- broadcasts
- badges
- medicationLogs
- transfusionLogs

## 🎯 Pattern yang Digunakan (dari edu-clusters.html)

```javascript
// 1. Import Firebase
import { db } from './assets/js/firebase-config.js';
import { collection, getDocs, addDoc, updateDoc, deleteDoc, doc, query, orderBy } from "firebase/firestore";
import './assets/js/auth-guard.js';
import './assets/js/auth-handler.js';

// 2. Modal Setup
const modal = new bootstrap.Modal(document.getElementById('modalId'));
let currentEditId = null;

// 3. Load Data
async function loadData() {
    const querySnapshot = await getDocs(collection(db, 'collectionName'));
    const data = [];
    querySnapshot.forEach((doc) => {
        data.push({ id: doc.id, ...doc.data() });
    });
    displayData(data);
}

// 4. Create/Update
document.getElementById('form').addEventListener('submit', async (e) => {
    e.preventDefault();
    const data = { /* field values */ };

    if (currentEditId) {
        await updateDoc(doc(db, 'collection', currentEditId), data);
    } else {
        await addDoc(collection(db, 'collection'), data);
    }

    modal.hide();
    loadData();
});

// 5. Delete
await deleteDoc(doc(db, 'collection', id));
```

## 🚀 Next Steps
1. Copy pattern dari edu-clusters.html
2. Sesuaikan field names dengan collection masing-masing
3. Test CRUD operations
4. Deploy to production
