<?php
// SETARA Submodules/Contents Data
$contentsData = [
    [
        'id' => 1,
        'moduleId' => 1,
        'moduleName' => 'Makanan Tinggi Zat Besi',
        'title' => 'Pengenalan Zat Besi',
        'contentType' => 'article',
        'order' => 1,
        'isPublished' => true
    ],
    [
        'id' => 2,
        'moduleId' => 1,
        'moduleName' => 'Makanan Tinggi Zat Besi',
        'title' => 'Daftar Sayuran Kaya Zat Besi',
        'contentType' => 'article',
        'order' => 2,
        'isPublished' => true
    ],
    [
        'id' => 3,
        'moduleId' => 1,
        'moduleName' => 'Makanan Tinggi Zat Besi',
        'title' => 'Video: Cara Mengolah Sayuran',
        'contentType' => 'video',
        'order' => 3,
        'isPublished' => true
    ],
    [
        'id' => 4,
        'moduleId' => 1,
        'moduleName' => 'Makanan Tinggi Zat Besi',
        'title' => 'Buah-buahan untuk Penderita Thalassemia',
        'contentType' => 'article',
        'order' => 4,
        'isPublished' => false
    ]
];

// Get all modules for dropdown
$modulesData = [
    ['id' => 1, 'title' => 'Makanan Tinggi Zat Besi', 'clusterId' => 1],
    ['id' => 2, 'title' => 'Makanan yang Harus Dihindari', 'clusterId' => 1],
    ['id' => 3, 'title' => 'Jenis-jenis Obat Thalassemia', 'clusterId' => 2],
    ['id' => 4, 'title' => 'Cara Konsumsi Obat yang Benar', 'clusterId' => 2],
];

$script = '<script>
    // Delete Content
    $(".delete-content-btn").on("click", function() {
        if(confirm("Apakah Anda yakin ingin menghapus konten ini?")) {
            $(this).closest("tr").fadeOut();
            // TODO: Add Firebase logic to delete content
        }
    });

    // Add Content Button
    $("#addContentBtn").on("click", function() {
        $("#editContentModal").modal("show");
        $("#editContentModalLabel").text("Tambah Konten Baru");
        // Reset form
        $("#editContentForm")[0].reset();
        // Show article by default
        $("#articleContent").show();
        $("#videoContent").hide();
    });

    // Edit Content Button
    $(".edit-content-btn").on("click", function(e) {
        e.preventDefault();
        var contentId = $(this).data("content-id");
        $("#editContentModal").modal("show");
        $("#editContentModalLabel").text("Edit Konten");
        // TODO: Populate modal with content data from Firebase
    });

    // Toggle content type fields
    $("input[name=contentType]").on("change", function() {
        if($(this).val() === "article") {
            $("#articleContent").slideDown();
            $("#videoContent").slideUp();
        } else {
            $("#articleContent").slideUp();
            $("#videoContent").slideDown();
        }
    });
</script>';
?>

<?php include './partials/layouts/layoutTop.php' ?>

<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Sub-Modul / Konten</h6>
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
            <li class="fw-medium">
                <a href="edu-modules.php" class="d-flex align-items-center gap-1 hover-text-primary">
                    Modul
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Konten</li>
        </ul>
    </div>

    <div class="card h-100 p-0 radius-12">
        <div class="card-header border-bottom bg-base py-16 px-24">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div>
                    <h6 class="text-lg mb-4">Sub-Modul: Makanan Tinggi Zat Besi</h6>
                    <p class="text-sm text-secondary-light mb-0">Kelola konten pembelajaran dalam modul ini</p>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <a href="edu-modules.php" class="btn btn-outline-primary-600 radius-8 px-20 py-11">
                        <iconify-icon icon="solar:arrow-left-linear" class="icon text-xl line-height-1"></iconify-icon>
                        Kembali
                    </a>
                    <button type="button" id="addContentBtn" class="btn btn-primary-600 radius-8 px-20 py-11">
                        <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                        Tambah Konten
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
                            <th scope="col">Judul Sub-Modul</th>
                            <th scope="col" class="text-center" width="120">Tipe Konten</th>
                            <th scope="col" class="text-center" width="80">Urutan</th>
                            <th scope="col" class="text-center" width="120">Status</th>
                            <th scope="col" class="text-center" width="180">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($contentsData as $index => $content): ?>
                        <tr>
                            <td class="text-center">
                                <span class="text-secondary-light fw-medium"><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <?php if($content['contentType'] == 'video'): ?>
                                        <iconify-icon icon="solar:videocamera-record-bold" class="text-danger-600 text-xl"></iconify-icon>
                                    <?php else: ?>
                                        <iconify-icon icon="solar:document-text-bold" class="text-primary-600 text-xl"></iconify-icon>
                                    <?php endif; ?>
                                    <h6 class="text-md mb-0 fw-semibold"><?php echo $content['title']; ?></h6>
                                </div>
                            </td>
                            <td class="text-center">
                                <?php if($content['contentType'] == 'video'): ?>
                                    <span class="badge bg-danger-focus text-danger-600 px-16 py-6 radius-4 fw-medium text-sm">
                                        <iconify-icon icon="solar:play-circle-outline" class="icon"></iconify-icon>
                                        Video
                                    </span>
                                <?php else: ?>
                                    <span class="badge bg-primary-focus text-primary-600 px-16 py-6 radius-4 fw-medium text-sm">
                                        <iconify-icon icon="solar:document-text-outline" class="icon"></iconify-icon>
                                        Artikel
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-neutral-200 text-neutral-900 px-16 py-6 radius-4 fw-semibold">
                                    <?php echo $content['order']; ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <?php if($content['isPublished']): ?>
                                    <span class="bg-success-focus text-success-600 border border-success-main px-16 py-4 radius-4 fw-medium text-sm">Published</span>
                                <?php else: ?>
                                    <span class="bg-warning-focus text-warning-600 border border-warning-main px-16 py-4 radius-4 fw-medium text-sm">Draft</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <div class="d-flex align-items-center gap-8 justify-content-center">
                                    <button type="button" class="edit-content-btn bg-success-focus text-success-600 bg-hover-success-200 fw-medium w-36-px h-36-px d-flex justify-content-center align-items-center rounded-circle" data-content-id="<?php echo $content['id']; ?>" title="Edit Konten">
                                        <iconify-icon icon="lucide:edit" class="icon text-lg"></iconify-icon>
                                    </button>
                                    <button type="button" class="bg-info-focus text-info-600 bg-hover-info-200 fw-medium w-36-px h-36-px d-flex justify-content-center align-items-center rounded-circle" title="Preview">
                                        <iconify-icon icon="solar:eye-outline" class="icon text-lg"></iconify-icon>
                                    </button>
                                    <button type="button" class="delete-content-btn bg-danger-focus bg-hover-danger-200 text-danger-600 fw-medium w-36-px h-36-px d-flex justify-content-center align-items-center rounded-circle" data-content-id="<?php echo $content['id']; ?>" title="Hapus">
                                        <iconify-icon icon="fluent:delete-24-regular" class="icon text-lg"></iconify-icon>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Info Card -->
            <div class="alert alert-primary-focus border border-primary-main d-flex align-items-start gap-3 mt-24" role="alert">
                <iconify-icon icon="mdi:information-outline" class="text-primary-600 text-2xl flex-shrink-0 mt-4"></iconify-icon>
                <div>
                    <h6 class="text-primary-600 mb-8">Tentang Sub-Modul</h6>
                    <p class="text-sm text-secondary-light mb-0">
                        Sub-modul adalah unit konten terkecil dalam sistem edukasi SETARA. Setiap sub-modul dapat berupa artikel (HTML) atau video (URL YouTube).
                        Klik <strong>"Edit Konten"</strong> untuk membuka editor dan mengelola konten.
                    </p>
                </div>
            </div>

            <!-- Content Statistics -->
            <div class="row gy-3 mt-16">
                <div class="col-md-4">
                    <div class="p-16 border radius-8 bg-primary-focus">
                        <div class="d-flex align-items-center gap-2 mb-8">
                            <iconify-icon icon="solar:document-text-bold" class="text-primary-600 text-2xl"></iconify-icon>
                            <span class="text-sm text-secondary-light">Artikel</span>
                        </div>
                        <h4 class="mb-0 text-primary-600">3</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-16 border radius-8 bg-danger-focus">
                        <div class="d-flex align-items-center gap-2 mb-8">
                            <iconify-icon icon="solar:videocamera-record-bold" class="text-danger-600 text-2xl"></iconify-icon>
                            <span class="text-sm text-secondary-light">Video</span>
                        </div>
                        <h4 class="mb-0 text-danger-600">1</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-16 border radius-8 bg-success-focus">
                        <div class="d-flex align-items-center gap-2 mb-8">
                            <iconify-icon icon="solar:check-circle-bold" class="text-success-600 text-2xl"></iconify-icon>
                            <span class="text-sm text-secondary-light">Published</span>
                        </div>
                        <h4 class="mb-0 text-success-600">3 / 4</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add/Edit Content Modal -->
<div class="modal fade" id="editContentModal" tabindex="-1" aria-labelledby="editContentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editContentModalLabel">Tambah Konten Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editContentForm">
                    <div class="row">
                        <div class="col-md-8 mb-20">
                            <label class="form-label fw-semibold text-neutral-900">Pilih Modul <span class="text-danger-600">*</span></label>
                            <select class="form-select radius-8" required>
                                <option value="">-- Pilih Modul --</option>
                                <?php foreach ($modulesData as $module): ?>
                                <option value="<?php echo $module['id']; ?>"><?php echo $module['title']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-4 mb-20">
                            <label class="form-label fw-semibold text-neutral-900">Urutan <span class="text-danger-600">*</span></label>
                            <input type="number" class="form-control radius-8" placeholder="1" min="1" required>
                            <small class="text-secondary-light">Urutan tampilan konten</small>
                        </div>
                    </div>

                    <div class="mb-20">
                        <label class="form-label fw-semibold text-neutral-900">Judul Konten <span class="text-danger-600">*</span></label>
                        <input type="text" class="form-control radius-8" placeholder="Contoh: Pengenalan Zat Besi" required>
                    </div>

                    <div class="mb-20">
                        <label class="form-label fw-semibold text-neutral-900 d-block mb-12">Tipe Konten <span class="text-danger-600">*</span></label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="contentType" id="typeArticle" value="article" checked>
                                <label class="form-check-label" for="typeArticle">
                                    <iconify-icon icon="solar:document-text-bold" class="text-primary-600"></iconify-icon>
                                    Artikel (HTML)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="contentType" id="typeVideo" value="video">
                                <label class="form-check-label" for="typeVideo">
                                    <iconify-icon icon="solar:videocamera-record-bold" class="text-danger-600"></iconify-icon>
                                    Video (URL)
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Article Content (Show by default) -->
                    <div id="articleContent" class="mb-20">
                        <label class="form-label fw-semibold text-neutral-900">Konten Artikel (HTML) <span class="text-danger-600">*</span></label>
                        <textarea class="form-control radius-8" rows="12" placeholder="<h3>Judul Artikel</h3><p>Konten artikel dalam format HTML...</p>"></textarea>
                        <small class="text-secondary-light">
                            <iconify-icon icon="mdi:information-outline" class="text-info-600"></iconify-icon>
                            Gunakan format HTML untuk styling. Contoh: &lt;h3&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;strong&gt;, dll.
                        </small>
                    </div>

                    <!-- Video Content (Hidden by default) -->
                    <div id="videoContent" class="mb-20" style="display: none;">
                        <label class="form-label fw-semibold text-neutral-900">URL Video <span class="text-danger-600">*</span></label>
                        <input type="url" class="form-control radius-8" placeholder="https://www.youtube.com/watch?v=...">
                        <small class="text-secondary-light">
                            <iconify-icon icon="mdi:information-outline" class="text-info-600"></iconify-icon>
                            Masukkan URL video YouTube atau video hosting lainnya
                        </small>
                    </div>

                    <div class="mb-20">
                        <label class="form-label fw-semibold text-neutral-900 d-block mb-12">Status Publikasi <span class="text-danger-600">*</span></label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="isPublished" id="statusPublished" value="true" checked>
                                <label class="form-check-label" for="statusPublished">
                                    <span class="badge bg-success-focus text-success-600 px-12 py-4">Published</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="isPublished" id="statusDraft" value="false">
                                <label class="form-check-label" for="statusDraft">
                                    <span class="badge bg-warning-focus text-warning-600 px-12 py-4">Draft</span>
                                </label>
                            </div>
                        </div>
                        <small class="text-secondary-light">Draft tidak akan ditampilkan di aplikasi mobile</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary-600 radius-8" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary-600 radius-8">
                    <iconify-icon icon="solar:diskette-bold" class="icon"></iconify-icon>
                    Simpan Konten
                </button>
            </div>
        </div>
    </div>
</div>

<?php include './partials/layouts/layoutBottom.php' ?>
