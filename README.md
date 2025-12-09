# SETARA Admin Panel

SETARA (Self-Care Education for Thalassemia) Admin Panel adalah sistem manajemen konten untuk aplikasi edukasi dan manajemen kesehatan bagi remaja penderita Thalassemia.

## 🌟 Fitur Utama

### 📊 Dashboard
- Statistik pengguna dan aktivitas
- Grafik kepatuhan minum obat
- Ringkasan aktivitas terbaru
- Distribusi jenis Thalassemia (Mayor/Minor)

### 👥 Manajemen Pengguna
- Daftar lengkap pengguna aplikasi
- Detail profil pengguna (nama, usia, jenis Thalassemia)
- Informasi kontak darurat
- Statistik aktivitas pengguna
- Status kepatuhan minum obat

### 📚 Manajemen Edukasi
- **Klaster Edukasi**: Kategori utama konten (Nutrisi, Obat-obatan, Aktivitas Fisik, dll)
- **Modul**: Topik pembelajaran dalam setiap klaster
- **Sub-Modul/Konten**: Artikel (HTML) atau Video (URL) pembelajaran
- Sistem publikasi (Published/Draft)
- Urutan konten yang dapat diatur

### ❓ Manajemen Kuis
- Pertanyaan pilihan ganda (4 opsi)
- Pertanyaan Benar/Salah (2 opsi)
- Sistem poin untuk setiap pertanyaan
- Filter berdasarkan modul dan tipe

### 💬 Forum Diskusi
- Manajemen topik diskusi
- Moderasi pesan
- Statistik engagement

### 📢 Broadcast
- Kirim pengumuman ke semua pengguna
- Notifikasi push (placeholder untuk Firebase)
- Riwayat broadcast

### ⚙️ Pengaturan
- Kebijakan Privasi
- Syarat & Ketentuan Layanan
- Manajemen Admin (placeholder)
- Konfigurasi Aplikasi (placeholder)
- Backup & Import Data (placeholder)

## 🎨 Desain

- **Warna Tema**: #6DB33F (Green) - mencerminkan kesehatan dan harapan
- **Framework**: Bootstrap 5
- **Icons**: RemixIcon & Iconify
- **Font**: Default system fonts
- **Responsif**: Mobile-first design

## 🚀 Cara Instalasi

### Prerequisites
- PHP 7.4 atau lebih tinggi
- Web server (Apache/Nginx)
- Browser modern

### Instalasi Lokal

1. Clone repository ini:
```bash
git clone https://github.com/[your-username]/setara-admin-panel.git
cd setara-admin-panel
```

2. Jalankan dengan PHP built-in server:
```bash
php -S localhost:8000
```

3. Buka browser dan akses:
```
http://localhost:8000/login.php
```

4. Klik tombol "Masuk ke Dashboard" untuk mengakses admin panel

### Deploy ke Hosting

1. Upload semua file ke direktori public_html atau www
2. Pastikan file permissions sudah benar
3. Akses melalui domain Anda: `https://yourdomain.com/login.php`

## 📁 Struktur Folder

```
setara-admin-panel/
├── assets/
│   ├── css/          # Stylesheets
│   ├── js/           # JavaScript files
│   ├── images/       # Images and icons
│   └── sass/         # SCSS source files
├── partials/
│   ├── layouts/      # Layout components
│   ├── head.php      # HTML head section
│   ├── sidebar.php   # Sidebar navigation
│   ├── footer.php    # Footer
│   └── scripts.php   # JavaScript includes
├── login.php         # Landing/login page
├── index.php         # Dashboard
├── users.php         # User management
├── edu-clusters.php  # Education clusters
├── edu-modules.php   # Education modules
├── edu-contents.php  # Education contents
├── quizzes.php       # Quiz management
├── community.php     # Discussion forum
├── broadcast.php     # Broadcast messages
├── settings.php      # Settings hub
├── privacy-policy.php
├── terms-service.php
└── README.md
```

## 🔒 Keamanan

⚠️ **PENTING**: Ini adalah versi DEMO dengan static data.

Untuk production:
- Implementasi sistem autentikasi yang proper
- Integrasi dengan Firebase/database
- Validasi input dan sanitasi data
- HTTPS wajib digunakan
- Implementasi CSRF protection
- Role-based access control (RBAC)

## 🗄️ Database (Future Integration)

Project ini dirancang untuk integrasi dengan **Firebase Firestore** dengan struktur collections:

```
users/
  - uid
  - name
  - email
  - age
  - gender
  - thalassemiaType
  - emergencyContact {}

clusters/
  - id
  - title
  - description
  - icon
  - order

modules/
  - id
  - clusterId
  - title
  - description
  - duration
  - order

submodules/
  - id
  - moduleId
  - title
  - contentType (article/video)
  - content
  - order

quizzes/
  - id
  - moduleId
  - question
  - type (multiple_choice/true_false)
  - options []
  - correctAnswer
  - points
```

## 🛠️ Teknologi yang Digunakan

- **Backend**: PHP (native, no framework)
- **Frontend**: HTML5, CSS3, JavaScript (jQuery)
- **Styling**: Bootstrap 5, Custom SCSS
- **Icons**: RemixIcon, Iconify
- **Charts**: ApexCharts (untuk grafik dashboard)
- **Database**: Firebase Firestore (planned)

## 📝 TODO / Roadmap

- [ ] Implementasi autentikasi Firebase
- [ ] Integrasi Firestore untuk CRUD operations
- [ ] Firebase Cloud Messaging untuk push notifications
- [ ] Upload gambar untuk profil user
- [ ] Rich text editor untuk artikel (TinyMCE/CKEditor)
- [ ] Export data ke CSV/Excel
- [ ] Email notifications untuk admin
- [ ] Multi-language support
- [ ] Dark mode
- [ ] Analytics dashboard yang lebih detail

## 👥 Kontributor

- **Developer**: SETARA Development Team
- **Design**: Based on WowDash Template
- **Branding**: SETARA (#6DB33F Green Theme)

## 📄 Lisensi

This project is for educational and healthcare purposes.

## 📞 Kontak

Untuk pertanyaan atau dukungan:
- Email: support@setara.id
- Website: [setara.id](https://setara.id) (placeholder)

---

**SETARA** - Self-Care Education for Thalassemia
*Membantu remaja Thalassemia menjalani hidup yang lebih sehat dan berkualitas*
