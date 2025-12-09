<?php
// SETARA Education Modules Data (Sample from Nutrisi Cluster)
$modulesData = [
    [
        'id' => 1,
        'clusterId' => 1,
        'clusterName' => 'Nutrisi',
        'title' => 'Makanan Tinggi Zat Besi',
        'description' => 'Pengenalan makanan yang kaya akan zat besi dan manfaatnya bagi penderita Thalassemia.',
        'estimatedTime' => 15,
        'order' => 1,
        'submoduleCount' => 4,
        'isPublished' => true
    ],
    [
        'id' => 2,
        'clusterId' => 1,
        'clusterName' => 'Nutrisi',
        'title' => 'Makanan yang Harus Dihindari',
        'description' => 'Daftar makanan yang sebaiknya dihindari dan alasan mengapa makanan tersebut tidak baik.',
        'estimatedTime' => 12,
        'order' => 2,
        'submoduleCount' => 3,
        'isPublished' => true
    ],
    [
        'id' => 3,
        'clusterId' => 1,
        'clusterName' => 'Nutrisi',
        'title' => 'Menu Sehat Harian',
        'description' => 'Contoh menu makanan sehat untuk sarapan, makan siang, dan makan malam.',
        'estimatedTime' => 20,
        'order' => 3,
        'submoduleCount' => 5,
        'isPublished' => true
    ],
    [
        'id' => 4,
        'clusterId' => 1,
        'clusterName' => 'Nutrisi',
        'title' => 'Suplemen dan Vitamin',
        'description' => 'Panduan tentang suplemen dan vitamin yang diperlukan untuk mendukung kesehatan.',
        'estimatedTime' => 10,
        'order' => 4,
        'submoduleCount' => 2,
        'isPublished' => false
    ],
    [
        'id' => 5,
        'clusterId' => 1,
        'clusterName' => 'Nutrisi',
        'title' => 'Hidrasi yang Tepat',
        'description' => 'Pentingnya hidrasi dan berapa banyak cairan yang harus dikonsumsi setiap hari.',
        'estimatedTime' => 8,
        'order' => 5,
        'submoduleCount' => 2,
        'isPublished' => true
    ],
    [
        'id' => 6,
        'clusterId' => 1,
        'clusterName' => 'Nutrisi',
        'title' => 'Camilan Sehat',
        'description' => 'Rekomendasi camilan sehat yang aman dan bergizi untuk penderita Thalassemia.',
        'estimatedTime' => 7,
        'order' => 6,
        'submoduleCount' => 3,
        'isPublished' => true
    ],
    [
        'id' => 7,
        'clusterId' => 1,
        'clusterName' => 'Nutrisi',
        'title' => 'Mitos dan Fakta Nutrisi',
        'description' => 'Membongkar mitos seputar nutrisi untuk penderita Thalassemia.',
        'estimatedTime' => 10,
        'order' => 7,
        'submoduleCount' => 4,
        'isPublished' => true
    ],
    [
        'id' => 8,
        'clusterId' => 1,
        'clusterName' => 'Nutrisi',
        'title' => 'Tips Memasak Sehat',
        'description' => 'Teknik memasak yang mempertahankan nutrisi dan tips membuat makanan lebih lezat.',
        'estimatedTime' => 18,
        'order' => 8,
        'submoduleCount' => 5,
        'isPublished' => false
    ]
];

$script = '<script>
    // Delete Module
    $(".delete-module-btn").on("click", function() {
        if(confirm("Apakah Anda yakin ingin menghapus modul ini?")) {
            $(this).closest("tr").fadeOut();
            // TODO: Add Firebase logic to delete module
        }
    });

    // Toggle Publish Status
    $(".toggle-publish-btn").on("click", function() {
        var $badge = $(this).closest("td").find(".status-badge");
        if($badge.hasClass("bg-success-focus")) {
            $badge.removeClass("bg-success-focus text-success-600 border-success-main").addClass("bg-warning-focus text-warning-600 border-warning-main");
            $badge.text("Draft");
        } else {
            $badge.removeClass("bg-warning-focus text-warning-600 border-warning-main").addClass("bg-success-focus text-success-600 border-success-main");
            $badge.text("Published");
        }
    });

    // Add Module
    $("#addModuleBtn").on("click", function() {
        $("#editModuleModal").modal("show");
        $("#editModuleModalLabel").text("Tambah Modul Baru");
    });

    // Edit Module
    $(".edit-module-btn").on("click", function() {
        var moduleId = $(this).data("module-id");
        // TODO: Populate form with module data from Firebase
        $("#editModuleModal").modal("show");
        $("#editModuleModalLabel").text("Edit Modul");
    });
</script>';
?>

<?php include './partials/layouts/layoutTop.php' ?>

<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Modul Edukasi</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.php" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">
                <a href="edu-clusters.php" class="d-flex align-items-center gap-1 hover-text-primary">
                    Klaster
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Modul</li>
        </ul>
    </div>

    <div class="card h-100 p-0 radius-12">
        <div class="card-header border-bottom bg-base py-16 px-24">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div>
                    <h6 class="text-lg mb-4">Modul: Nutrisi</h6>
                    <p class="text-sm text-secondary-light mb-0">Total <?php echo count($modulesData); ?> modul pembelajaran</p>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <a href="edu-clusters.php" class="btn btn-outline-primary-600 radius-8 px-20 py-11">
                        <iconify-icon icon="solar:arrow-left-linear" class="icon text-xl line-height-1"></iconify-icon>
                        Kembali
                    </a>
                    <button type="button" id="addModuleBtn" class="btn btn-primary-600 radius-8 px-20 py-11">
                        <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                        Tambah Modul
                    </button>
                </div>
            </div>
        </div>

        <div class="card-body p-24">
            <div class="table-responsive">
                <table class="table bordered-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center" width="60">No</th>
                            <th scope="col">Judul Modul</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col" class="text-center" width="120">Waktu (Menit)</th>
                            <th scope="col" class="text-center" width="80">Urutan</th>
                            <th scope="col" class="text-center" width="100">Sub-Modul</th>
                            <th scope="col" class="text-center" width="120">Status</th>
                            <th scope="col" class="text-center" width="200">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($modulesData as $index => $module): ?>
                        <tr>
                            <td class="text-center">
                                <span class="text-secondary-light fw-medium"><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></span>
                            </td>
                            <td>
                                <h6 class="text-md mb-0 fw-semibold"><?php echo $module['title']; ?></h6>
                            </td>
                            <td>
                                <p class="text-sm text-secondary-light mb-0"><?php echo $module['description']; ?></p>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-info-focus text-info-600 px-12 py-4 radius-4 fw-medium text-sm">
                                    <iconify-icon icon="solar:clock-circle-outline" class="icon"></iconify-icon>
                                    <?php echo $module['estimatedTime']; ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-neutral-200 text-neutral-900 px-16 py-6 radius-4 fw-semibold">
                                    <?php echo $module['order']; ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="text-primary-600 fw-semibold"><?php echo $module['submoduleCount']; ?></span>
                            </td>
                            <td class="text-center">
                                <?php if($module['isPublished']): ?>
                                    <span class="status-badge bg-success-focus text-success-600 border border-success-main px-16 py-4 radius-4 fw-medium text-sm">Published</span>
                                <?php else: ?>
                                    <span class="status-badge bg-warning-focus text-warning-600 border border-warning-main px-16 py-4 radius-4 fw-medium text-sm">Draft</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <div class="d-flex align-items-center gap-8 justify-content-center">
                                    <a href="edu-contents.php?module_id=<?php echo $module['id']; ?>" class="bg-primary-focus bg-hover-primary-200 text-primary-600 fw-medium w-36-px h-36-px d-flex justify-content-center align-items-center rounded-circle" title="Kelola Sub-Modul">
                                        <iconify-icon icon="solar:document-text-outline" class="icon text-lg"></iconify-icon>
                                    </a>
                                    <button type="button" class="edit-module-btn bg-success-focus text-success-600 bg-hover-success-200 fw-medium w-36-px h-36-px d-flex justify-content-center align-items-center rounded-circle" data-module-id="<?php echo $module['id']; ?>" title="Edit Modul">
                                        <iconify-icon icon="lucide:edit" class="icon text-lg"></iconify-icon>
                                    </button>
                                    <button type="button" class="toggle-publish-btn bg-info-focus text-info-600 bg-hover-info-200 fw-medium w-36-px h-36-px d-flex justify-content-center align-items-center rounded-circle" title="Toggle Publish">
                                        <iconify-icon icon="solar:eye-outline" class="icon text-lg"></iconify-icon>
                                    </button>
                                    <button type="button" class="delete-module-btn bg-danger-focus bg-hover-danger-200 text-danger-600 fw-medium w-36-px h-36-px d-flex justify-content-center align-items-center rounded-circle" title="Hapus Modul">
                                        <iconify-icon icon="fluent:delete-24-regular" class="icon text-lg"></iconify-icon>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Module Statistics -->
            <div class="row gy-3 mt-24">
                <div class="col-md-3 col-sm-6">
                    <div class="p-16 border radius-8 bg-success-focus">
                        <div class="d-flex align-items-center gap-2 mb-8">
                            <iconify-icon icon="solar:check-circle-bold" class="text-success-600 text-2xl"></iconify-icon>
                            <span class="text-sm text-secondary-light">Published</span>
                        </div>
                        <h4 class="mb-0 text-success-600">6</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="p-16 border radius-8 bg-warning-focus">
                        <div class="d-flex align-items-center gap-2 mb-8">
                            <iconify-icon icon="solar:file-text-bold" class="text-warning-600 text-2xl"></iconify-icon>
                            <span class="text-sm text-secondary-light">Draft</span>
                        </div>
                        <h4 class="mb-0 text-warning-600">2</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="p-16 border radius-8 bg-info-focus">
                        <div class="d-flex align-items-center gap-2 mb-8">
                            <iconify-icon icon="solar:clock-circle-bold" class="text-info-600 text-2xl"></iconify-icon>
                            <span class="text-sm text-secondary-light">Total Waktu</span>
                        </div>
                        <h4 class="mb-0 text-info-600">100 Min</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="p-16 border radius-8 bg-primary-focus">
                        <div class="d-flex align-items-center gap-2 mb-8">
                            <iconify-icon icon="solar:layers-bold" class="text-primary-600 text-2xl"></iconify-icon>
                            <span class="text-sm text-secondary-light">Sub-Modul</span>
                        </div>
                        <h4 class="mb-0 text-primary-600">28</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add/Edit Module Modal -->
<div class="modal fade" id="editModuleModal" tabindex="-1" aria-labelledby="editModuleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModuleModalLabel">Tambah Modul Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-20">
                        <label class="form-label fw-semibold text-neutral-900">Klaster <span class="text-danger-600">*</span></label>
                        <select class="form-control radius-8" required>
                            <option value="">-- Pilih Klaster --</option>
                            <option value="1" selected>Nutrisi</option>
                            <option value="2">Obat-obatan</option>
                            <option value="3">Aktivitas Fisik</option>
                            <option value="4">Kesehatan Mental</option>
                            <option value="5">Transfusi Darah</option>
                        </select>
                    </div>

                    <div class="mb-20">
                        <label class="form-label fw-semibold text-neutral-900">Judul Modul <span class="text-danger-600">*</span></label>
                        <input type="text" class="form-control radius-8" placeholder="Contoh: Makanan Tinggi Zat Besi" required>
                    </div>

                    <div class="mb-20">
                        <label class="form-label fw-semibold text-neutral-900">Deskripsi <span class="text-danger-600">*</span></label>
                        <textarea class="form-control radius-8" rows="3" placeholder="Masukkan deskripsi modul..." required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-20">
                            <label class="form-label fw-semibold text-neutral-900">Estimasi Waktu (Menit) <span class="text-danger-600">*</span></label>
                            <input type="number" class="form-control radius-8" placeholder="15" min="1" required>
                        </div>

                        <div class="col-md-6 mb-20">
                            <label class="form-label fw-semibold text-neutral-900">Urutan <span class="text-danger-600">*</span></label>
                            <input type="number" class="form-control radius-8" placeholder="1" min="1" required>
                        </div>
                    </div>

                    <div class="mb-20">
                        <label class="form-label fw-semibold text-neutral-900">Status Publikasi</label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="isPublished" id="publishedYes" value="true" checked>
                                <label class="form-check-label" for="publishedYes">
                                    Published
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="isPublished" id="publishedNo" value="false">
                                <label class="form-check-label" for="publishedNo">
                                    Draft
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary-600">Simpan Modul</button>
            </div>
        </div>
    </div>
</div>

<?php include './partials/layouts/layoutBottom.php' ?>
