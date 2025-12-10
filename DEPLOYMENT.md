# 🚀 SETARA Admin Panel - Deployment Guide

## 📋 Prerequisites

- GitHub account (momochan32)
- Firebase project (setara-app-production)
- Repository: https://github.com/momochan32/setara-admin-panel

---

## 🌐 Option 1: GitHub Pages (Recommended - FREE)

### Step 1: Enable GitHub Pages

1. Go to: https://github.com/momochan32/setara-admin-panel/settings/pages
2. Under "Source", select:
   - Branch: `main`
   - Folder: `/ (root)`
3. Click "Save"
4. Wait 2-3 minutes for deployment
5. Your site will be available at: `https://momochan32.github.io/setara-admin-panel/`

### Step 2: Access the Site

After deployment, access:
- **Login Page**: https://momochan32.github.io/setara-admin-panel/login.html
- **Dashboard**: https://momochan32.github.io/setara-admin-panel/index.html

### Step 3: Firebase Configuration

The Firebase config is already embedded in the code (from env-config.js fallback). However, for production security:

1. Create GitHub Secret for Firebase config:
   - Go to: https://github.com/momochan32/setara-admin-panel/settings/secrets/actions
   - Click "New repository secret"
   - Add each Firebase config as separate secret:
     - `FIREBASE_API_KEY`
     - `FIREBASE_AUTH_DOMAIN`
     - `FIREBASE_PROJECT_ID`
     - `FIREBASE_STORAGE_BUCKET`
     - `FIREBASE_MESSAGING_SENDER_ID`
     - `FIREBASE_APP_ID`
     - `FIREBASE_MEASUREMENT_ID`

2. Create GitHub Action to inject secrets (optional - for enhanced security)

---

## 🔥 Firebase Setup

### Firestore Collections Structure

Pastikan Firestore Anda memiliki struktur collections berikut:

```
setara-app-production/
├── users/
│   ├── {userId}/
│   │   ├── name: string
│   │   ├── email: string
│   │   ├── age: number
│   │   ├── gender: "male" | "female"
│   │   ├── thalassemiaType: "mayor" | "minor"
│   │   ├── phone: string
│   │   ├── emergencyContactName: string
│   │   ├── emergencyContactPhone: string
│   │   ├── emergencyContactRelation: string
│   │   ├── createdAt: timestamp
│   │   └── updatedAt: timestamp
│
├── clusters/
│   ├── {clusterId}/
│   │   ├── title: string
│   │   ├── description: string
│   │   ├── icon: string (RemixIcon class)
│   │   ├── iconColor: string
│   │   ├── bgColor: string
│   │   ├── order: number
│   │   ├── moduleCount: number
│   │   ├── createdAt: timestamp
│   │   └── updatedAt: timestamp
│
├── modules/
│   ├── {moduleId}/
│   │   ├── clusterId: string
│   │   ├── title: string
│   │   ├── description: string
│   │   ├── duration: number (minutes)
│   │   ├── order: number
│   │   ├── isPublished: boolean
│   │   ├── createdAt: timestamp
│   │   └── updatedAt: timestamp
│
├── submodules/
│   ├── {submoduleId}/
│   │   ├── moduleId: string
│   │   ├── title: string
│   │   ├── contentType: "article" | "video"
│   │   ├── content: string (HTML or URL)
│   │   ├── order: number
│   │   ├── isPublished: boolean
│   │   ├── createdAt: timestamp
│   │   └── updatedAt: timestamp
│
├── quizzes/
│   ├── {quizId}/
│   │   ├── moduleId: string
│   │   ├── question: string
│   │   ├── type: "multiple_choice" | "true_false"
│   │   ├── options: array
│   │   ├── correctAnswer: string
│   │   ├── points: number
│   │   ├── createdAt: timestamp
│   │   └── updatedAt: timestamp
│
├── discussions/
│   ├── {discussionId}/
│   │   ├── userId: string
│   │   ├── title: string
│   │   ├── content: string
│   │   ├── category: string
│   │   ├── replies: number
│   │   ├── createdAt: timestamp
│   │   └── updatedAt: timestamp
│
└── broadcasts/
    ├── {broadcastId}/
        ├── title: string
        ├── message: string
        ├── targetAudience: "all" | "mayor" | "minor"
        ├── sentAt: timestamp
        ├── createdAt: timestamp
        └── updatedAt: timestamp
```

### Firestore Security Rules

Add these rules in Firebase Console > Firestore Database > Rules:

```javascript
rules_version = '2';
service cloud.firestore {
  match /databases/{database}/documents {
    // Allow admin access (you can add authentication later)
    match /{document=**} {
      allow read, write: if true; // Change this in production!
    }
  }
}
```

⚠️ **WARNING**: The above rules allow public read/write. For production:
1. Implement Firebase Authentication
2. Add proper role-based access control
3. Restrict write access to authenticated admin users only

---

## 🔒 Security Considerations

### For GitHub Pages Deployment:

1. **Firebase Credentials**:
   - Currently hardcoded in fallback (not ideal for production)
   - For better security, use GitHub Secrets + Actions
   - Or restrict Firebase rules by domain

2. **Firebase Security Rules**:
   ```javascript
   // Better production rules:
   match /databases/{database}/documents {
     match /{document=**} {
       allow read: if request.auth != null;
       allow write: if request.auth != null &&
                      get(/databases/$(database)/documents/admins/$(request.auth.uid)).data.role == 'admin';
     }
   }
   ```

3. **Domain Restrictions** (Firebase Console):
   - Go to Firebase Console > Authentication > Settings
   - Add authorized domain: `momochan32.github.io`

---

## 🧪 Testing Locally

Before deploying, test locally:

```bash
# Option 1: Python server
cd /Users/khafidbachtiar/Documents/wowdash-php
python3 -m http.server 8000

# Option 2: PHP server (still works with .html files)
php -S localhost:8000

# Option 3: Node.js http-server
npx http-server -p 8000
```

Then open: http://localhost:8000/login.html

---

## 📝 Post-Deployment Checklist

- [ ] GitHub Pages enabled and deployed
- [ ] Firebase Firestore collections created
- [ ] Security rules configured (even if permissive for now)
- [ ] Tested login page loads
- [ ] Tested Firebase connection (check browser console)
- [ ] Tested CRUD operations on at least one page
- [ ] Verified mobile responsiveness

---

## 🐛 Troubleshooting

### Issue: "Failed to load module script"

**Solution**: Firebase modules use ES6 imports. Ensure you're accessing via HTTP/HTTPS, not `file://`

### Issue: "Firebase not defined"

**Solution**:
1. Check browser console for errors
2. Verify Firebase config in `assets/js/firebase-config.js`
3. Check if `assets/js/env-config.js` exists (should be gitignored)

### Issue: "Firestore permission denied"

**Solution**: Update Firestore security rules to allow access

### Issue: "CORS error"

**Solution**: Firebase should handle CORS automatically. If issues persist:
1. Check Firebase Console > Authentication > Settings > Authorized domains
2. Add your GitHub Pages domain

---

## 📞 Need Help?

1. Check browser console for errors (F12)
2. Verify Firebase config is correct
3. Test Firestore connection in Firebase Console
4. Ensure GitHub Pages is properly deployed

---

## 🎉 Success!

If everything works, you should be able to:
1. ✅ Access login page at GitHub Pages URL
2. ✅ Click "Masuk ke Dashboard" and see dashboard
3. ✅ Navigate to Users page and see data from Firebase
4. ✅ Create, read, update, delete data in real-time

**Live URL**: https://momochan32.github.io/setara-admin-panel/login.html

Enjoy your SETARA Admin Panel! 🎊
