<?php
// SETARA Education Clusters Data
$clustersData = [
    [
        'id' => 1,
        'icon' => 'ri-restaurant-line',
        'iconColor' => 'text-success-600',
        'bgColor' => 'bg-success-focus',
        'title' => 'Nutrisi',
        'description' => 'Panduan lengkap tentang nutrisi yang tepat untuk penderita Thalassemia, termasuk makanan yang dianjurkan dan dihindari.',
        'order' => 1,
        'moduleCount' => 8
    ],
    [
        'id' => 2,
        'icon' => 'ri-medicine-bottle-line',
        'iconColor' => 'text-danger-600',
        'bgColor' => 'bg-danger-focus',
        'title' => 'Obat-obatan',
        'description' => 'Informasi lengkap tentang jenis obat, cara konsumsi, efek samping, dan pentingnya kepatuhan minum obat.',
        'order' => 2,
        'moduleCount' => 6
    ],
    [
        'id' => 3,
        'icon' => 'ri-heart-pulse-line',
        'iconColor' => 'text-primary-600',
        'bgColor' => 'bg-primary-focus',
        'title' => 'Aktivitas Fisik',
        'description' => 'Panduan olahraga dan aktivitas fisik yang aman dan bermanfaat untuk penderita Thalassemia.',
        'order' => 3,
        'moduleCount' => 5
    ],
    [
        'id' => 4,
        'icon' => 'ri-mental-health-line',
        'iconColor' => 'text-purple',
        'bgColor' => 'bg-lilac-100',
        'title' => 'Kesehatan Mental',
        'description' => 'Strategi mengelola stres, kecemasan, dan menjaga kesehatan mental sebagai penderita Thalassemia.',
        'order' => 4,
        'moduleCount' => 7
    ],
    [
        'id' => 5,
        'icon' => 'ri-test-tube-line',
        'iconColor' => 'text-info-600',
        'bgColor' => 'bg-info-focus',
        'title' => 'Transfusi Darah',
        'description' => 'Penjelasan tentang proses transfusi darah, persiapan, dan perawatan pasca transfusi.',
        'order' => 5,
        'moduleCount' => 4
    ],
    [
        'id' => 6,
        'icon' => 'ri-hospital-line',
        'iconColor' => 'text-warning-600',
        'bgColor' => 'bg-warning-focus',
        'title' => 'Perawatan Medis',
        'description' => 'Panduan tentang perawatan medis rutin, pemeriksaan berkala, dan komplikasi yang perlu diwaspadai.',
        'order' => 6,
        'moduleCount' => 6
    ],
    [
        'id' => 7,
        'icon' => 'ri-team-line',
        'iconColor' => 'text-cyan',
        'bgColor' => 'bg-cyan-focus',
        'title' => 'Kehidupan Sosial',
        'description' => 'Tips menjalani kehidupan sosial, berinteraksi dengan teman, dan menjelaskan kondisi Thalassemia kepada orang lain.',
        'order' => 7,
        'moduleCount' => 5
    ],
    [
        'id' => 8,
        'icon' => 'ri-information-line',
        'iconColor' => 'text-indigo',
        'bgColor' => 'bg-lilac-100',
        'title' => 'Pengetahuan Umum',
        'description' => 'Informasi dasar tentang Thalassemia, jenis-jenisnya, gejala, dan bagaimana penyakit ini diwariskan.',
        'order' => 8,
        'moduleCount' => 9
    ]
];

$script = '<script>
    // Add Cluster Modal (placeholder)
    $("#addClusterBtn").on("click", function() {
        $("#addClusterModal").modal("show");
    });

    // Edit Cluster
    $(".edit-cluster-btn").on("click", function() {
        var clusterId = $(this).data("cluster-id");
        // TODO: Populate modal with cluster data from Firebase
        $("#addClusterModal").modal("show");
    });

    // Delete Cluster
    $(".delete-cluster-btn").on("click", function() {
        if(confirm("Apakah Anda yakin ingin menghapus klaster ini?")) {
            $(this).closest(".cluster-card-item").fadeOut();
            // TODO: Add Firebase logic to delete cluster
        }
    });
</script>';
?>

<?php include './partials/layouts/layoutTop.php' ?>

<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Klaster Edukasi</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.php" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">
                <a href="javascript:void(0)" class="d-flex align-items-center gap-1 hover-text-primary">
                    Edukasi
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Klaster</li>
        </ul>
    </div>

    <div class="card h-100 p-0 radius-12">
        <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center justify-content-between">
            <h6 class="text-lg mb-0">Daftar Klaster Edukasi</h6>
            <button type="button" id="addClusterBtn" class="btn btn-primary-600 radius-8 px-20 py-11">
                <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                Tambah Klaster
            </button>
        </div>
        <div class="card-body p-24">
            <div class="row gy-4">
                <?php foreach ($clustersData as $cluster): ?>
                <div class="col-xxl-3 col-xl-4 col-md-6 col-sm-6 cluster-card-item">
                    <div class="card shadow-sm border-0 h-100 radius-12 transition-2 hover-shadow-lg">
                        <div class="card-body p-20">
                            <div class="d-flex align-items-center justify-content-between mb-20">
                                <div class="w-56-px h-56-px <?php echo $cluster['bgColor']; ?> rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                    <i class="<?php echo $cluster['icon']; ?> <?php echo $cluster['iconColor']; ?> text-2xl"></i>
                                </div>
                                <span class="badge bg-neutral-200 text-neutral-700 px-12 py-6 text-xs fw-semibold radius-8">
                                    #<?php echo $cluster['order']; ?>
                                </span>
                            </div>

                            <h6 class="mb-12 fw-bold text-lg"><?php echo $cluster['title']; ?></h6>
                            <p class="text-secondary-light text-sm mb-20 line-height-1-6" style="min-height: 60px;"><?php echo $cluster['description']; ?></p>

                            <div class="d-flex align-items-center justify-content-between pt-16 border-top mb-16">
                                <div class="d-flex align-items-center gap-2">
                                    <iconify-icon icon="solar:document-text-bold" class="text-primary-600 text-lg"></iconify-icon>
                                    <span class="text-sm text-secondary-light fw-medium"><?php echo $cluster['moduleCount']; ?> Modul</span>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <a href="edu-modules.php?cluster_id=<?php echo $cluster['id']; ?>" class="btn btn-primary-600 radius-8 px-16 py-8 text-sm flex-fill">
                                    <iconify-icon icon="solar:eye-outline" class="icon text-lg"></iconify-icon>
                                    Lihat Modul
                                </a>
                                <button type="button" class="edit-cluster-btn btn btn-outline-success-600 radius-8 px-12 py-8 text-sm" data-cluster-id="<?php echo $cluster['id']; ?>" title="Edit">
                                    <iconify-icon icon="lucide:edit" class="icon text-lg"></iconify-icon>
                                </button>
                                <button type="button" class="delete-cluster-btn btn btn-outline-danger-600 radius-8 px-12 py-8 text-sm" title="Hapus">
                                    <iconify-icon icon="fluent:delete-24-regular" class="icon text-lg"></iconify-icon>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Info Box -->
            <div class="alert alert-info d-flex align-items-center mt-24" role="alert">
                <iconify-icon icon="mdi:information-outline" class="text-info-600 text-xl me-8 flex-shrink-0"></iconify-icon>
                <div>
                    <strong>Informasi:</strong> Klaster adalah kategori utama dalam konten edukasi. Setiap klaster berisi beberapa modul pembelajaran yang saling berkaitan.
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add/Edit Cluster Modal -->
<div class="modal fade" id="addClusterModal" tabindex="-1" aria-labelledby="addClusterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addClusterModalLabel">Tambah Klaster Edukasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-20">
                        <label class="form-label fw-semibold text-neutral-900">Judul Klaster <span class="text-danger-600">*</span></label>
                        <input type="text" class="form-control radius-8" placeholder="Contoh: Nutrisi" required>
                    </div>

                    <div class="mb-20">
                        <label class="form-label fw-semibold text-neutral-900">Deskripsi <span class="text-danger-600">*</span></label>
                        <textarea class="form-control radius-8" rows="4" placeholder="Masukkan deskripsi klaster..." required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-20">
                            <label class="form-label fw-semibold text-neutral-900">Icon (RemixIcon) <span class="text-danger-600">*</span></label>
                            <input type="text" class="form-control radius-8" placeholder="Contoh: ri-restaurant-line" required>
                            <small class="text-secondary-light">Lihat icon di: <a href="https://remixicon.com" target="_blank">remixicon.com</a></small>
                        </div>

                        <div class="col-md-6 mb-20">
                            <label class="form-label fw-semibold text-neutral-900">Warna Icon</label>
                            <select class="form-control radius-8">
                                <option value="text-primary-600">Primary (Hijau)</option>
                                <option value="text-success-600">Success</option>
                                <option value="text-danger-600">Danger (Merah)</option>
                                <option value="text-warning-600">Warning (Kuning)</option>
                                <option value="text-info-600">Info (Biru)</option>
                                <option value="text-purple">Purple</option>
                                <option value="text-cyan">Cyan</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-20">
                        <label class="form-label fw-semibold text-neutral-900">Urutan <span class="text-danger-600">*</span></label>
                        <input type="number" class="form-control radius-8" placeholder="1" min="1" required>
                        <small class="text-secondary-light">Urutan tampilan klaster</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary-600">Simpan Klaster</button>
            </div>
        </div>
    </div>
</div>

<?php include './partials/layouts/layoutBottom.php' ?>
