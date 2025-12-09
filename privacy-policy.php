<?php
// SETARA Privacy Policy Page
$lastUpdated = "9 Desember 2024";
?>

<?php include './partials/layouts/layoutTop.php' ?>

<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Kebijakan Privasi</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.php" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">
                <a href="settings.php" class="d-flex align-items-center gap-1 hover-text-primary">
                    Pengaturan
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Kebijakan Privasi</li>
        </ul>
    </div>

    <div class="card radius-12">
        <div class="card-header border-bottom bg-base py-20 px-24">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h5 class="mb-8">Kebijakan Privasi SETARA</h5>
                    <p class="text-sm text-secondary-light mb-0">
                        <iconify-icon icon="solar:calendar-outline" class="icon"></iconify-icon>
                        Terakhir diperbarui: <?php echo $lastUpdated; ?>
                    </p>
                </div>
                <button class="btn btn-outline-primary-600 radius-8 px-20 py-11" onclick="window.print()">
                    <iconify-icon icon="solar:printer-outline" class="icon text-lg"></iconify-icon>
                    Cetak
                </button>
            </div>
        </div>
        <div class="card-body p-24">
            <!-- Introduction -->
            <div class="mb-32">
                <div class="alert alert-primary-focus border border-primary-main d-flex align-items-start gap-3 mb-20">
                    <iconify-icon icon="solar:shield-check-outline" class="text-primary-600 text-2xl flex-shrink-0 mt-4"></iconify-icon>
                    <div>
                        <h6 class="text-primary-600 mb-8">Komitmen Kami terhadap Privasi Anda</h6>
                        <p class="text-sm text-secondary-light mb-0">
                            SETARA berkomitmen untuk melindungi privasi dan keamanan data pribadi Anda. Kebijakan privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi Anda saat menggunakan aplikasi SETARA.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Section 1 -->
            <div class="mb-32">
                <h5 class="mb-16 fw-bold">
                    <span class="badge bg-primary-600 text-white px-12 py-6 radius-4 me-8">1</span>
                    Informasi yang Kami Kumpulkan
                </h5>
                <div class="ps-20">
                    <h6 class="mb-12 fw-semibold">1.1 Informasi Pribadi</h6>
                    <p class="text-secondary-light mb-16">Kami mengumpulkan informasi pribadi yang Anda berikan secara sukarela saat mendaftar dan menggunakan aplikasi SETARA, termasuk:</p>
                    <ul class="list-unstyled ps-20 mb-20">
                        <li class="mb-8"><iconify-icon icon="solar:check-circle-bold" class="text-success-600 me-8"></iconify-icon>Nama lengkap</li>
                        <li class="mb-8"><iconify-icon icon="solar:check-circle-bold" class="text-success-600 me-8"></iconify-icon>Tanggal lahir dan usia</li>
                        <li class="mb-8"><iconify-icon icon="solar:check-circle-bold" class="text-success-600 me-8"></iconify-icon>Jenis kelamin</li>
                        <li class="mb-8"><iconify-icon icon="solar:check-circle-bold" class="text-success-600 me-8"></iconify-icon>Alamat email</li>
                        <li class="mb-8"><iconify-icon icon="solar:check-circle-bold" class="text-success-600 me-8"></iconify-icon>Nomor telepon</li>
                        <li class="mb-8"><iconify-icon icon="solar:check-circle-bold" class="text-success-600 me-8"></iconify-icon>Informasi kontak darurat</li>
                    </ul>

                    <h6 class="mb-12 fw-semibold mt-20">1.2 Informasi Kesehatan</h6>
                    <p class="text-secondary-light mb-16">Untuk memberikan layanan yang optimal, kami juga mengumpulkan informasi kesehatan terkait Thalassemia, seperti:</p>
                    <ul class="list-unstyled ps-20 mb-20">
                        <li class="mb-8"><iconify-icon icon="solar:check-circle-bold" class="text-success-600 me-8"></iconify-icon>Jenis Thalassemia (Mayor/Minor)</li>
                        <li class="mb-8"><iconify-icon icon="solar:check-circle-bold" class="text-success-600 me-8"></iconify-icon>Riwayat transfusi darah</li>
                        <li class="mb-8"><iconify-icon icon="solar:check-circle-bold" class="text-success-600 me-8"></iconify-icon>Data kepatuhan minum obat</li>
                        <li class="mb-8"><iconify-icon icon="solar:check-circle-bold" class="text-success-600 me-8"></iconify-icon>Catatan kesehatan harian</li>
                    </ul>

                    <h6 class="mb-12 fw-semibold mt-20">1.3 Data Aktivitas Aplikasi</h6>
                    <p class="text-secondary-light mb-16">Kami mengumpulkan data tentang penggunaan aplikasi Anda untuk meningkatkan layanan:</p>
                    <ul class="list-unstyled ps-20 mb-20">
                        <li class="mb-8"><iconify-icon icon="solar:check-circle-bold" class="text-success-600 me-8"></iconify-icon>Modul edukasi yang dibaca</li>
                        <li class="mb-8"><iconify-icon icon="solar:check-circle-bold" class="text-success-600 me-8"></iconify-icon>Hasil kuis dan pencapaian</li>
                        <li class="mb-8"><iconify-icon icon="solar:check-circle-bold" class="text-success-600 me-8"></iconify-icon>Interaksi di forum diskusi</li>
                        <li class="mb-8"><iconify-icon icon="solar:check-circle-bold" class="text-success-600 me-8"></iconify-icon>Log aktivitas dan waktu penggunaan</li>
                    </ul>
                </div>
            </div>

            <!-- Section 2 -->
            <div class="mb-32">
                <h5 class="mb-16 fw-bold">
                    <span class="badge bg-primary-600 text-white px-12 py-6 radius-4 me-8">2</span>
                    Bagaimana Kami Menggunakan Informasi Anda
                </h5>
                <div class="ps-20">
                    <p class="text-secondary-light mb-16">Kami menggunakan informasi yang dikumpulkan untuk:</p>
                    <ul class="list-unstyled ps-20 mb-20">
                        <li class="mb-12"><iconify-icon icon="solar:star-bold" class="text-warning-600 me-8"></iconify-icon><strong>Menyediakan layanan edukasi</strong> - Memberikan konten edukasi yang relevan tentang manajemen Thalassemia</li>
                        <li class="mb-12"><iconify-icon icon="solar:star-bold" class="text-warning-600 me-8"></iconify-icon><strong>Personalisasi pengalaman</strong> - Menyesuaikan konten berdasarkan profil dan kebutuhan Anda</li>
                        <li class="mb-12"><iconify-icon icon="solar:star-bold" class="text-warning-600 me-8"></iconify-icon><strong>Pengingat dan notifikasi</strong> - Mengirimkan pengingat untuk minum obat, jadwal transfusi, dll</li>
                        <li class="mb-12"><iconify-icon icon="solar:star-bold" class="text-warning-600 me-8"></iconify-icon><strong>Analisis dan peningkatan</strong> - Menganalisis data untuk meningkatkan kualitas layanan</li>
                        <li class="mb-12"><iconify-icon icon="solar:star-bold" class="text-warning-600 me-8"></iconify-icon><strong>Komunikasi</strong> - Menghubungi Anda untuk update penting atau dukungan teknis</li>
                    </ul>
                </div>
            </div>

            <!-- Section 3 -->
            <div class="mb-32">
                <h5 class="mb-16 fw-bold">
                    <span class="badge bg-primary-600 text-white px-12 py-6 radius-4 me-8">3</span>
                    Keamanan Data
                </h5>
                <div class="ps-20">
                    <p class="text-secondary-light mb-16">Kami menerapkan berbagai langkah keamanan untuk melindungi data Anda:</p>
                    <div class="row gy-3 mb-20">
                        <div class="col-md-6">
                            <div class="p-16 border radius-8 bg-success-focus">
                                <div class="d-flex align-items-start gap-3">
                                    <iconify-icon icon="solar:lock-password-outline" class="text-success-600 text-2xl flex-shrink-0"></iconify-icon>
                                    <div>
                                        <h6 class="mb-4 fw-semibold">Enkripsi Data</h6>
                                        <p class="text-sm text-secondary-light mb-0">Data sensitif dienkripsi menggunakan standar industri (AES-256)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-16 border radius-8 bg-info-focus">
                                <div class="d-flex align-items-start gap-3">
                                    <iconify-icon icon="solar:shield-network-outline" class="text-info-600 text-2xl flex-shrink-0"></iconify-icon>
                                    <div>
                                        <h6 class="mb-4 fw-semibold">Firewall & Monitoring</h6>
                                        <p class="text-sm text-secondary-light mb-0">Server dilindungi dengan firewall dan monitoring 24/7</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-16 border radius-8 bg-warning-focus">
                                <div class="d-flex align-items-start gap-3">
                                    <iconify-icon icon="solar:cloud-check-outline" class="text-warning-600 text-2xl flex-shrink-0"></iconify-icon>
                                    <div>
                                        <h6 class="mb-4 fw-semibold">Backup Berkala</h6>
                                        <p class="text-sm text-secondary-light mb-0">Data di-backup secara otomatis setiap hari</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-16 border radius-8 bg-danger-focus">
                                <div class="d-flex align-items-start gap-3">
                                    <iconify-icon icon="solar:user-id-outline" class="text-danger-600 text-2xl flex-shrink-0"></iconify-icon>
                                    <div>
                                        <h6 class="mb-4 fw-semibold">Akses Terbatas</h6>
                                        <p class="text-sm text-secondary-light mb-0">Hanya admin terotorisasi yang dapat mengakses data</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 4 -->
            <div class="mb-32">
                <h5 class="mb-16 fw-bold">
                    <span class="badge bg-primary-600 text-white px-12 py-6 radius-4 me-8">4</span>
                    Hak Anda
                </h5>
                <div class="ps-20">
                    <p class="text-secondary-light mb-16">Sebagai pengguna SETARA, Anda memiliki hak untuk:</p>
                    <ul class="list-unstyled ps-20 mb-20">
                        <li class="mb-12"><iconify-icon icon="solar:eye-outline" class="text-primary-600 me-8"></iconify-icon><strong>Mengakses data pribadi</strong> - Melihat data pribadi yang kami simpan tentang Anda</li>
                        <li class="mb-12"><iconify-icon icon="solar:pen-outline" class="text-primary-600 me-8"></iconify-icon><strong>Memperbaiki data</strong> - Memperbarui atau memperbaiki data yang tidak akurat</li>
                        <li class="mb-12"><iconify-icon icon="solar:trash-bin-trash-outline" class="text-primary-600 me-8"></iconify-icon><strong>Menghapus akun</strong> - Menghapus akun dan semua data terkait secara permanen</li>
                        <li class="mb-12"><iconify-icon icon="solar:download-outline" class="text-primary-600 me-8"></iconify-icon><strong>Mengunduh data</strong> - Mendapatkan salinan data Anda dalam format yang dapat dibaca</li>
                        <li class="mb-12"><iconify-icon icon="solar:shield-warning-outline" class="text-primary-600 me-8"></iconify-icon><strong>Mengajukan keluhan</strong> - Menghubungi kami jika ada kekhawatiran tentang privasi</li>
                    </ul>
                </div>
            </div>

            <!-- Section 5 -->
            <div class="mb-32">
                <h5 class="mb-16 fw-bold">
                    <span class="badge bg-primary-600 text-white px-12 py-6 radius-4 me-8">5</span>
                    Hubungi Kami
                </h5>
                <div class="ps-20">
                    <p class="text-secondary-light mb-16">Jika Anda memiliki pertanyaan atau kekhawatiran tentang kebijakan privasi ini, silakan hubungi kami:</p>
                    <div class="card border-0 bg-neutral-50 p-20">
                        <div class="row gy-3">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center gap-3">
                                    <iconify-icon icon="solar:letter-outline" class="text-primary-600 text-2xl"></iconify-icon>
                                    <div>
                                        <p class="text-sm text-secondary-light mb-4">Email</p>
                                        <h6 class="mb-0">privacy@setara.id</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center gap-3">
                                    <iconify-icon icon="solar:phone-outline" class="text-primary-600 text-2xl"></iconify-icon>
                                    <div>
                                        <p class="text-sm text-secondary-light mb-4">Telepon</p>
                                        <h6 class="mb-0">+62 21 1234 5678</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-start gap-3">
                                    <iconify-icon icon="solar:map-point-outline" class="text-primary-600 text-2xl flex-shrink-0"></iconify-icon>
                                    <div>
                                        <p class="text-sm text-secondary-light mb-4">Alamat</p>
                                        <h6 class="mb-0">Jl. Kesehatan No. 123, Jakarta Pusat, DKI Jakarta 10110</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="border-top pt-20">
                <div class="alert alert-info-focus border border-info-main d-flex align-items-start gap-3">
                    <iconify-icon icon="mdi:information-outline" class="text-info-600 text-2xl flex-shrink-0 mt-4"></iconify-icon>
                    <div>
                        <h6 class="text-info-600 mb-8">Perubahan Kebijakan</h6>
                        <p class="text-sm text-secondary-light mb-0">
                            Kami dapat memperbarui kebijakan privasi ini dari waktu ke waktu. Perubahan signifikan akan diberitahukan melalui email atau notifikasi di aplikasi. Dengan terus menggunakan SETARA setelah perubahan, Anda menyetujui kebijakan privasi yang telah diperbarui.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './partials/layouts/layoutBottom.php' ?>
