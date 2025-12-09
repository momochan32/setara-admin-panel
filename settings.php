<?php
// SETARA Settings Page
$settingsCategories = [
    [
        'title' => 'Kebijakan & Hukum',
        'icon' => 'ri-shield-check-line',
        'items' => [
            [
                'title' => 'Kebijakan Privasi',
                'description' => 'Panduan tentang bagaimana SETARA mengumpulkan, menggunakan, dan melindungi data pribadi Anda.',
                'icon' => 'solar:shield-user-outline',
                'iconColor' => 'text-primary-600',
                'bgColor' => 'bg-primary-focus',
                'url' => 'privacy-policy.php',
                'type' => 'internal'
            ],
            [
                'title' => 'Syarat & Ketentuan',
                'description' => 'Syarat dan ketentuan penggunaan aplikasi SETARA untuk admin dan pengguna.',
                'icon' => 'solar:document-text-outline',
                'iconColor' => 'text-info-600',
                'bgColor' => 'bg-info-focus',
                'url' => 'terms-service.php',
                'type' => 'internal'
            ]
        ]
    ],
    [
        'title' => 'Manajemen Admin',
        'icon' => 'ri-admin-line',
        'items' => [
            [
                'title' => 'Akun Admin',
                'description' => 'Kelola akun admin, tambah admin baru, atau ubah hak akses admin.',
                'icon' => 'solar:user-id-outline',
                'iconColor' => 'text-success-600',
                'bgColor' => 'bg-success-focus',
                'url' => 'admin-accounts.php',
                'type' => 'internal'
            ],
            [
                'title' => 'Log Aktivitas',
                'description' => 'Riwayat aktivitas admin dan perubahan data dalam sistem.',
                'icon' => 'solar:history-outline',
                'iconColor' => 'text-warning-600',
                'bgColor' => 'bg-warning-focus',
                'url' => 'activity-logs.php',
                'type' => 'internal'
            ]
        ]
    ],
    [
        'title' => 'Konfigurasi Aplikasi',
        'icon' => 'ri-settings-3-line',
        'items' => [
            [
                'title' => 'Pengaturan Umum',
                'description' => 'Pengaturan dasar aplikasi seperti nama aplikasi, logo, dan informasi kontak.',
                'icon' => 'solar:settings-outline',
                'iconColor' => 'text-purple',
                'bgColor' => 'bg-lilac-100',
                'url' => 'app-settings.php',
                'type' => 'internal'
            ],
            [
                'title' => 'Notifikasi Push',
                'description' => 'Konfigurasi pengiriman notifikasi push ke aplikasi mobile pengguna.',
                'icon' => 'solar:bell-outline',
                'iconColor' => 'text-danger-600',
                'bgColor' => 'bg-danger-focus',
                'url' => 'push-notification-settings.php',
                'type' => 'internal'
            ]
        ]
    ],
    [
        'title' => 'Data & Backup',
        'icon' => 'ri-database-2-line',
        'items' => [
            [
                'title' => 'Backup Data',
                'description' => 'Export dan backup data sistem secara berkala untuk keamanan data.',
                'icon' => 'solar:cloud-download-outline',
                'iconColor' => 'text-cyan',
                'bgColor' => 'bg-cyan-focus',
                'url' => 'backup-data.php',
                'type' => 'internal'
            ],
            [
                'title' => 'Import Data',
                'description' => 'Import data pengguna atau konten edukasi dari file CSV atau JSON.',
                'icon' => 'solar:cloud-upload-outline',
                'iconColor' => 'text-indigo',
                'bgColor' => 'bg-lilac-100',
                'url' => 'import-data.php',
                'type' => 'internal'
            ]
        ]
    ]
];

$script = '<script>
    // Handle settings item click
    $(".settings-item").on("click", function() {
        var url = $(this).data("url");
        var type = $(this).data("type");

        if(type === "internal") {
            window.location.href = url;
        } else {
            window.open(url, "_blank");
        }
    });
</script>';
?>

<?php include './partials/layouts/layoutTop.php' ?>

<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Pengaturan</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.php" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Pengaturan</li>
        </ul>
    </div>

    <?php foreach ($settingsCategories as $category): ?>
    <div class="card h-100 p-0 radius-12 mb-24">
        <div class="card-header border-bottom bg-base py-16 px-24">
            <div class="d-flex align-items-center gap-2">
                <iconify-icon icon="<?php echo $category['icon']; ?>" class="text-primary-600 text-xl"></iconify-icon>
                <h6 class="text-lg mb-0"><?php echo $category['title']; ?></h6>
            </div>
        </div>
        <div class="card-body p-24">
            <div class="row gy-4">
                <?php foreach ($category['items'] as $item): ?>
                <div class="col-xxl-6 col-xl-6 col-md-6">
                    <div class="settings-item card border shadow-sm h-100 radius-12 transition-2 hover-shadow-lg cursor-pointer"
                         data-url="<?php echo $item['url']; ?>"
                         data-type="<?php echo $item['type']; ?>"
                         style="cursor: pointer;">
                        <div class="card-body p-20">
                            <div class="d-flex align-items-start gap-3">
                                <div class="w-48-px h-48-px <?php echo $item['bgColor']; ?> rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                    <iconify-icon icon="<?php echo $item['icon']; ?>" class="<?php echo $item['iconColor']; ?> text-xl"></iconify-icon>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-8 fw-semibold text-lg"><?php echo $item['title']; ?></h6>
                                    <p class="text-secondary-light text-sm mb-0 line-height-1-6"><?php echo $item['description']; ?></p>
                                </div>
                                <iconify-icon icon="solar:alt-arrow-right-outline" class="text-neutral-400 text-xl flex-shrink-0"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <!-- System Information Card -->
    <div class="card radius-12">
        <div class="card-header border-bottom bg-base py-16 px-24">
            <div class="d-flex align-items-center gap-2">
                <iconify-icon icon="solar:info-circle-outline" class="text-primary-600 text-xl"></iconify-icon>
                <h6 class="text-lg mb-0">Informasi Sistem</h6>
            </div>
        </div>
        <div class="card-body p-24">
            <div class="row gy-3">
                <div class="col-md-6">
                    <div class="d-flex align-items-center justify-content-between p-16 border radius-8 bg-neutral-50">
                        <div>
                            <span class="text-sm text-secondary-light d-block mb-4">Versi Aplikasi</span>
                            <h6 class="mb-0">SETARA Admin v1.0.0</h6>
                        </div>
                        <iconify-icon icon="solar:code-circle-outline" class="text-primary-600 text-2xl"></iconify-icon>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-center justify-content-between p-16 border radius-8 bg-neutral-50">
                        <div>
                            <span class="text-sm text-secondary-light d-block mb-4">Database</span>
                            <h6 class="mb-0">Firebase Firestore</h6>
                        </div>
                        <iconify-icon icon="solar:database-outline" class="text-success-600 text-2xl"></iconify-icon>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-center justify-content-between p-16 border radius-8 bg-neutral-50">
                        <div>
                            <span class="text-sm text-secondary-light d-block mb-4">Terakhir Update</span>
                            <h6 class="mb-0">9 Desember 2024</h6>
                        </div>
                        <iconify-icon icon="solar:calendar-outline" class="text-info-600 text-2xl"></iconify-icon>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-center justify-content-between p-16 border radius-8 bg-neutral-50">
                        <div>
                            <span class="text-sm text-secondary-light d-block mb-4">Developer</span>
                            <h6 class="mb-0">SETARA Team</h6>
                        </div>
                        <iconify-icon icon="solar:user-heart-outline" class="text-warning-600 text-2xl"></iconify-icon>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './partials/layouts/layoutBottom.php' ?>
