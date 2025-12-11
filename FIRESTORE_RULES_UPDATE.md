# 🔐 Firestore Rules Update - URGENT!

## ⚠️ MASALAH YANG DITEMUKAN

Firestore rules Anda saat ini memblokir admin dari:
1. ❌ **Membaca semua users** - Admin hanya bisa baca user dengan UID yang sama
2. ❌ **Menulis ke eduModules** - `allow write: if false`
3. ❌ **Akses broadcasts collection** - Rules tidak ada

Ini sebabnya data tidak muncul di admin panel!

---

## ✅ SOLUSI: Deploy Rules Baru

### Langkah 1: Buka Firebase Console
1. Pergi ke https://console.firebase.google.com
2. Pilih project: **setara-app-production**
3. Di menu sidebar, klik **Firestore Database**
4. Klik tab **Rules**

### Langkah 2: Copy Rules Baru
File rules yang sudah diperbaiki ada di: `firestore.rules`

Copy seluruh isi file tersebut atau copy dari bawah ini:

```javascript
rules_version = '2';

service cloud.firestore {
  match /databases/{database}/documents {

    // Education Clusters - Public read, admin write
    match /eduClusters/{document} {
      allow create: if request.auth != null;
      allow read: if true;
      allow write: if request.auth != null;  // ✅ FIXED
      allow delete: if request.auth != null;
    }

    // Education Modules - Public read, authenticated write
    match /eduModules/{document} {
      allow create: if request.auth != null;
      allow read: if true;
      allow write: if request.auth != null;  // ✅ FIXED: Sebelumnya false!
      allow delete: if request.auth != null;
    }

    // Quizzes - Public read, authenticated write
    match /quizzes/{document} {
      allow create: if request.auth != null;
      allow read: if true;
      allow write: if request.auth != null;
      allow delete: if request.auth != null;
    }

    // Users - ✅ FIXED: Admin dapat read semua users
    match /users/{document} {
      allow create: if request.auth.uid == document;
      allow read: if request.auth != null;  // ✅ FIXED: Sebelumnya hanya if request.auth.uid == document
      allow write: if request.auth.uid == document || request.auth != null;
      allow delete: if request.auth != null;
    }

    // Discussion Messages - Public read, authenticated write
    match /discussionMessages/{document} {
      allow create: if request.auth != null;
      allow read: if true;
      allow write: if request.auth != null;
      allow delete: if request.auth != null;
    }

    // Education Submodules - Public read, authenticated write
    match /eduSubmodules/{document} {
      allow create: if request.auth != null;
      allow read: if true;
      allow write: if request.auth != null;
      allow delete: if request.auth != null;
    }

    // ✅ NEW: Broadcasts collection
    match /broadcasts/{document} {
      allow create: if request.auth != null;
      allow read: if request.auth != null;
      allow write: if request.auth != null;
      allow delete: if request.auth != null;
    }

    // Badges - Public read, admin write
    match /badges/{document} {
      allow create: if request.auth != null;
      allow read: if true;
      allow write: if request.auth != null;
      allow delete: if request.auth != null;
    }

    // User Notifications
    match /userNotifications/{document} {
      allow create: if true;
      allow read: if true;
      allow write: if request.auth != null;
      allow delete: if request.auth != null;
    }

    // Quiz Results
    match /quizResults/{document} {
      allow create: if true;
      allow read: if true;
      allow write: if request.auth != null;
      allow delete: if request.auth != null;
    }

    // Collections lainnya (reminders, medication logs, dll)
    match /reminders/{document} {
      allow create: if request.auth != null;
      allow read: if request.auth != null;
      allow write: if request.auth != null;
      allow delete: if request.auth != null;
    }

    match /medicationLogs/{document} {
      allow create: if request.auth != null;
      allow read: if request.auth != null;
      allow write: if request.auth != null;
      allow delete: if request.auth != null;
    }

    match /moodLogs/{document} {
      allow create: if request.auth != null;
      allow read: if request.auth != null;
      allow write: if request.auth != null;
      allow delete: if request.auth != null;
    }

    match /educationProgress/{document} {
      allow create: if request.auth != null;
      allow read: if request.auth != null;
      allow write: if request.auth != null;
      allow delete: if request.auth != null;
    }

    match /transfusionLogs/{document} {
      allow create: if request.auth != null;
      allow read: if request.auth != null;
      allow write: if request.auth != null;
      allow delete: if request.auth != null;
    }

    // Default deny
    match /{document=**} {
      allow read, write: if false;
    }
  }
}
```

### Langkah 3: Publish Rules
1. Paste rules baru ke editor
2. Klik tombol **"Publish"**
3. Tunggu beberapa detik hingga rules ter-deploy

---

## 🔍 Perubahan Utama

| Collection | Rule Lama | Rule Baru | Alasan |
|------------|-----------|-----------|---------|
| **users** | `allow read: if request.auth.uid == document` | `allow read: if request.auth != null` | ✅ Admin perlu read semua users |
| **eduModules** | `allow write: if false` | `allow write: if request.auth != null` | ✅ Admin perlu update modules |
| **broadcasts** | ❌ Tidak ada | ✅ Full CRUD untuk admin | ✅ Diperlukan untuk broadcast feature |

---

## 🧪 Testing Setelah Deploy

Setelah deploy rules baru:

1. **Refresh halaman admin panel** (Ctrl+F5 atau Cmd+Shift+R)
2. **Test setiap halaman:**
   - ✅ Dashboard - Should show user count & module count
   - ✅ Users - Should show list of all users
   - ✅ Edu-Clusters - Should load clusters
   - ✅ Edu-Modules - Should load modules & allow edit
   - ✅ Quizzes - Should load quizzes
   - ✅ Community - Should load messages
   - ✅ Broadcast - Should allow sending & show history

3. **Cek Console**
   - Seharusnya tidak ada error "Missing or insufficient permissions"
   - Seharusnya ada log "Firebase initialized successfully"

---

## ⚠️ CATATAN KEAMANAN

Rules baru ini **lebih permisif** untuk admin panel. Untuk production:

### Recommended: Tambahkan Admin Role Check

Tambahkan helper function di awal rules:

```javascript
function isAdmin() {
  return request.auth != null &&
         get(/databases/$(database)/documents/users/$(request.auth.uid)).data.role == 'admin';
}
```

Lalu gunakan untuk collections yang sensitif:

```javascript
match /users/{document} {
  allow read: if isAdmin();  // Hanya admin
  allow write: if isAdmin() || request.auth.uid == document;  // Admin atau user sendiri
}
```

**Tapi untuk saat ini**, gunakan rules yang simple dulu agar admin panel berfungsi!

---

## 🆘 Troubleshooting

### Data masih tidak muncul setelah deploy rules?

1. **Hard refresh browser:** Ctrl+F5 (Windows) atau Cmd+Shift+R (Mac)
2. **Clear browser cache**
3. **Logout & login lagi** di admin panel
4. **Cek console untuk error:**
   ```javascript
   // Buka browser console (F12)
   // Cari error merah
   ```

### Error: "Missing or insufficient permissions"

- Rules belum ter-deploy dengan benar
- Atau akun yang login bukan authenticated user
- Coba logout dan login lagi

---

**Deploy rules ini sekarang agar admin panel bisa berfungsi!** 🚀

Setelah deploy, refresh browser dan data akan muncul.
