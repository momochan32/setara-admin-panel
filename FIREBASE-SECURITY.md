# 🔒 Firebase Security Configuration

## ⚠️ CRITICAL: Setup Keamanan Sebelum Deploy ke Public

Karena repository ini PUBLIC, siapa saja bisa melihat Firebase credentials Anda. Untuk melindungi data, Anda **HARUS** mengkonfigurasi security rules di Firebase!

---

## 1️⃣ Firestore Security Rules (WAJIB!)

### Buka Firebase Console:
```
https://console.firebase.google.com/project/setara-app-production/firestore/rules
```

### Replace rules dengan ini:

```javascript
rules_version = '2';
service cloud.firestore {
  match /databases/{database}/documents {

    // Helper function: Check if user is authenticated admin
    function isAdmin() {
      return request.auth != null &&
             exists(/databases/$(database)/documents/admins/$(request.auth.uid));
    }

    // ====================
    // ADMIN COLLECTIONS - Require authentication
    // ====================

    // Users collection - Admin only
    match /users/{userId} {
      allow read: if isAdmin();
      allow write: if isAdmin();
    }

    // Clusters collection - Admin only
    match /clusters/{clusterId} {
      allow read: if true; // Public read for mobile app
      allow write: if isAdmin();
    }

    // Modules collection - Admin only write, public read
    match /modules/{moduleId} {
      allow read: if true; // Public read for mobile app
      allow write: if isAdmin();
    }

    // Submodules collection - Admin only write, public read
    match /submodules/{submoduleId} {
      allow read: if true; // Public read for mobile app
      allow write: if isAdmin();
    }

    // Quizzes collection - Admin only write, public read
    match /quizzes/{quizId} {
      allow read: if true; // Public read for mobile app
      allow write: if isAdmin();
    }

    // Discussions collection - Users can create, admin can moderate
    match /discussions/{discussionId} {
      allow read: if true;
      allow create: if request.auth != null;
      allow update, delete: if isAdmin();
    }

    // Broadcasts collection - Admin only
    match /broadcasts/{broadcastId} {
      allow read: if true; // Public read for notifications
      allow write: if isAdmin();
    }

    // Admins collection - Super restricted
    match /admins/{adminId} {
      allow read, write: if false; // Never allow direct access
    }
  }
}
```

### Penjelasan Rules:
- ✅ **Public Read**: Collections yang perlu dibaca mobile app (clusters, modules, dll)
- ❌ **Admin Only Write**: Hanya admin authenticated yang bisa menulis
- 🔒 **Users Protected**: Data user hanya bisa diakses admin
- 🚫 **Admins Locked**: Collection admins tidak bisa diakses langsung

---

## 2️⃣ Setup Admin Authentication

### A. Buat Admin User di Firebase Console

1. Buka Authentication:
   ```
   https://console.firebase.google.com/project/setara-app-production/authentication/users
   ```

2. Klik **Add User**
   - Email: `admin@setara.id` (atau email Anda)
   - Password: `[buat password kuat]`
   - Copy **User UID** setelah dibuat

3. Buat Admin Document di Firestore:
   - Collection: `admins`
   - Document ID: `[paste User UID dari step 2]`
   - Fields:
     ```json
     {
       "email": "admin@setara.id",
       "role": "admin",
       "name": "Super Admin",
       "createdAt": [timestamp]
     }
     ```

### B. Update Firebase Config untuk Auth

File `assets/js/firebase-config.js` sudah include Firebase Auth, jadi tinggal implementasi login.

---

## 3️⃣ Authorized Domains (Recommended)

Batasi domain yang bisa akses Firebase:

1. Buka Settings:
   ```
   https://console.firebase.google.com/project/setara-app-production/authentication/settings
   ```

2. Scroll ke **Authorized domains**

3. Tambahkan:
   - `localhost` (untuk development)
   - `momochan32.github.io` (untuk GitHub Pages)
   - Domain custom Anda (jika ada)

4. **HAPUS** domain lain yang tidak dikenal!

---

## 4️⃣ Firebase App Check (Advanced - Optional)

Untuk keamanan ekstra, aktifkan App Check:

1. Buka App Check:
   ```
   https://console.firebase.google.com/project/setara-app-production/appcheck
   ```

2. Enable untuk Web App

3. Pilih provider: **reCAPTCHA v3**

4. Daftar site keys di Google reCAPTCHA

⚠️ **Note**: App Check agak kompleks, skip dulu jika masih development.

---

## 5️⃣ Monitoring & Alerts

### Enable Security Alerts:

1. Buka Project Settings:
   ```
   https://console.firebase.google.com/project/setara-app-production/settings/general
   ```

2. Scroll ke **Service Accounts**

3. Enable notifications untuk:
   - Unusual activity
   - Security rule violations
   - Quota exceeded

---

## 🚨 Red Flags - Tanda-tanda Serangan:

Monitor hal berikut di Firebase Console:

1. **Usage Spike** - Tiba-tiba banyak requests
2. **Unknown IPs** - Akses dari lokasi tidak biasa
3. **Failed Auth Attempts** - Banyak login gagal
4. **Rule Violations** - Banyak request ditolak

---

## 📝 Checklist Keamanan:

Sebelum deploy public, pastikan:

- [ ] Firestore Security Rules sudah diupdate (bukan allow all!)
- [ ] Admin user sudah dibuat di Authentication
- [ ] Admin document sudah ada di collection `admins`
- [ ] Authorized domains sudah dikonfigurasi
- [ ] Security alerts sudah enabled
- [ ] Test auth flow sudah jalan
- [ ] Firebase credentials di public repo (ini OK karena protected by rules)

---

## ⚡ Quick Security Test:

```javascript
// Test di browser console (tanpa auth):
// Should FAIL with permission denied:
await db.collection('users').add({test: 'data'});

// Should SUCCEED (read public data):
await db.collection('clusters').get();
```

---

## 🆘 Jika Terjadi Breach:

1. **Immediately**: Disable Firestore di Console
2. **Rotate**: Generate new Firebase credentials
3. **Review**: Check Firestore audit logs
4. **Update**: Push new config ke GitHub
5. **Monitor**: Watch for unusual activity

---

## 📞 Resources:

- Firebase Security Rules: https://firebase.google.com/docs/firestore/security/get-started
- Best Practices: https://firebase.google.com/docs/firestore/security/rules-conditions
- App Check: https://firebase.google.com/docs/app-check

---

## ✅ TL;DR - Must Do:

1. **Update Firestore Rules** ← PALING PENTING!
2. Setup Admin Authentication
3. Add Authorized Domains
4. Test security rules

Tanpa langkah di atas, **siapa saja bisa mengakses dan memodifikasi data Firebase Anda!** 🚨
