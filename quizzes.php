<?php
// SETARA Quizzes Data
$quizzesData = [
    [
        'id' => 1,
        'moduleTitle' => 'Makanan Tinggi Zat Besi',
        'question' => 'Makanan berikut yang tinggi zat besi dan baik untuk penderita Thalassemia adalah?',
        'type' => 'multiple_choice',
        'options' => ['A' => 'Bayam', 'B' => 'Kentang Goreng', 'C' => 'Soda', 'D' => 'Permen'],
        'correctAnswer' => 'A',
        'points' => 10,
        'order' => 1
    ],
    [
        'id' => 2,
        'moduleTitle' => 'Makanan Tinggi Zat Besi',
        'question' => 'Apakah penderita Thalassemia perlu membatasi konsumsi makanan tinggi zat besi?',
        'type' => 'true_false',
        'options' => ['A' => 'Benar', 'B' => 'Salah'],
        'correctAnswer' => 'A',
        'points' => 5,
        'order' => 2
    ],
    [
        'id' => 3,
        'moduleTitle' => 'Obat-obatan',
        'question' => 'Apa fungsi utama dari obat kelasi besi (iron chelator)?',
        'type' => 'multiple_choice',
        'options' => ['A' => 'Menambah zat besi', 'B' => 'Mengurangi kelebihan zat besi', 'C' => 'Menambah hemoglobin', 'D' => 'Menyembuhkan Thalassemia'],
        'correctAnswer' => 'B',
        'points' => 15,
        'order' => 1
    ],
    [
        'id' => 4,
        'moduleTitle' => 'Aktivitas Fisik',
        'question' => 'Penderita Thalassemia tidak boleh berolahraga sama sekali.',
        'type' => 'true_false',
        'options' => ['A' => 'Benar', 'B' => 'Salah'],
        'correctAnswer' => 'B',
        'points' => 5,
        'order' => 1
    ],
    [
        'id' => 5,
        'moduleTitle' => 'Transfusi Darah',
        'question' => 'Berapa sering rata-rata penderita Thalassemia Mayor memerlukan transfusi darah?',
        'type' => 'multiple_choice',
        'options' => ['A' => 'Setiap hari', 'B' => 'Setiap minggu', 'C' => 'Setiap 2-4 minggu', 'D' => 'Setiap tahun'],
        'correctAnswer' => 'C',
        'points' => 10,
        'order' => 1
    ]
];

$script = '<script>
    // Add Quiz Modal
    $("#addQuizBtn").on("click", function() {
        $("#addQuizModal").modal("show");
        $("#addQuizModalLabel").text("Tambah Pertanyaan Kuis");
        // Show multiple choice by default
        $("#optionsContainer").show();
        $("#trueFalseContainer").hide();
    });

    // Question Type Change
    $("input[name=questionType]").on("change", function() {
        if($(this).val() == "true_false") {
            $("#optionsContainer").slideUp();
            $("#trueFalseContainer").slideDown();
        } else {
            $("#optionsContainer").slideDown();
            $("#trueFalseContainer").slideUp();
        }
    });

    // Delete Quiz
    $(".delete-quiz-btn").on("click", function() {
        if(confirm("Apakah Anda yakin ingin menghapus pertanyaan ini?")) {
            $(this).closest("tr").fadeOut();
            // TODO: Add Firebase logic to delete quiz
        }
    });

    // Edit Quiz
    $(".edit-quiz-btn").on("click", function() {
        $("#addQuizModal").modal("show");
        $("#addQuizModalLabel").text("Edit Pertanyaan Kuis");
        // TODO: Populate modal with quiz data
    });
</script>';
?>

<?php include './partials/layouts/layoutTop.php' ?>

<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Manajemen Kuis</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.php" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Kuis</li>
        </ul>
    </div>

    <div class="card h-100 p-0 radius-12">
        <div class="card-header border-bottom bg-base py-16 px-24">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div>
                    <h6 class="text-lg mb-4">Daftar Pertanyaan Kuis</h6>
                    <p class="text-sm text-secondary-light mb-0">Kelola pertanyaan kuis untuk setiap modul edukasi</p>
                </div>
                <button type="button" id="addQuizBtn" class="btn btn-primary-600 radius-8 px-20 py-11">
                    <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                    Tambah Pertanyaan
                </button>
            </div>
        </div>

        <div class="card-body p-24">
            <!-- Filters -->
            <div class="d-flex align-items-center gap-3 mb-20">
                <select class="form-select w-auto radius-8">
                    <option value="">Semua Modul</option>
                    <option value="1">Makanan Tinggi Zat Besi</option>
                    <option value="2">Obat-obatan</option>
                    <option value="3">Aktivitas Fisik</option>
                    <option value="4">Transfusi Darah</option>
                </select>
                <select class="form-select w-auto radius-8">
                    <option value="">Semua Tipe</option>
                    <option value="multiple_choice">Pilihan Ganda</option>
                    <option value="true_false">Benar/Salah</option>
                </select>
            </div>

            <div class="table-responsive">
                <table class="table bordered-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center" width="60">No</th>
                            <th scope="col">Modul</th>
                            <th scope="col">Pertanyaan</th>
                            <th scope="col" class="text-center" width="120">Tipe</th>
                            <th scope="col" class="text-center" width="100">Jawaban</th>
                            <th scope="col" class="text-center" width="80">Poin</th>
                            <th scope="col" class="text-center" width="180">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($quizzesData as $index => $quiz): ?>
                        <tr>
                            <td class="text-center">
                                <span class="text-secondary-light fw-medium"><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></span>
                            </td>
                            <td>
                                <span class="badge bg-primary-focus text-primary-600 px-12 py-6 radius-4 fw-medium text-sm">
                                    <?php echo $quiz['moduleTitle']; ?>
                                </span>
                            </td>
                            <td>
                                <p class="text-sm mb-8 fw-semibold"><?php echo $quiz['question']; ?></p>
                                <div class="d-flex flex-wrap gap-2">
                                    <?php foreach($quiz['options'] as $key => $option): ?>
                                        <span class="badge <?php echo ($key == $quiz['correctAnswer']) ? 'bg-success-focus text-success-600 border border-success-main' : 'bg-neutral-200 text-neutral-700'; ?> px-8 py-4 text-xs">
                                            <?php echo $key ?>: <?php echo $option; ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            </td>
                            <td class="text-center">
                                <?php if($quiz['type'] == 'multiple_choice'): ?>
                                    <span class="badge bg-info-focus text-info-600 px-12 py-6 radius-4 fw-medium text-sm">
                                        Pilihan Ganda
                                    </span>
                                <?php else: ?>
                                    <span class="badge bg-warning-focus text-warning-600 px-12 py-6 radius-4 fw-medium text-sm">
                                        Benar/Salah
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-success-600 text-white px-12 py-6 radius-4 fw-semibold">
                                    <?php echo $quiz['correctAnswer']; ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="text-primary-600 fw-semibold"><?php echo $quiz['points']; ?></span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex align-items-center gap-8 justify-content-center">
                                    <button type="button" class="edit-quiz-btn bg-success-focus text-success-600 bg-hover-success-200 fw-medium w-36-px h-36-px d-flex justify-content-center align-items-center rounded-circle" title="Edit">
                                        <iconify-icon icon="lucide:edit" class="icon text-lg"></iconify-icon>
                                    </button>
                                    <button type="button" class="delete-quiz-btn bg-danger-focus bg-hover-danger-200 text-danger-600 fw-medium w-36-px h-36-px d-flex justify-content-center align-items-center rounded-circle" title="Hapus">
                                        <iconify-icon icon="fluent:delete-24-regular" class="icon text-lg"></iconify-icon>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Quiz Statistics -->
            <div class="row gy-3 mt-24">
                <div class="col-md-3 col-sm-6">
                    <div class="p-16 border radius-8 bg-primary-focus">
                        <div class="d-flex align-items-center gap-2 mb-8">
                            <iconify-icon icon="solar:document-text-bold" class="text-primary-600 text-2xl"></iconify-icon>
                            <span class="text-sm text-secondary-light">Total Pertanyaan</span>
                        </div>
                        <h4 class="mb-0 text-primary-600"><?php echo count($quizzesData); ?></h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="p-16 border radius-8 bg-info-focus">
                        <div class="d-flex align-items-center gap-2 mb-8">
                            <iconify-icon icon="solar:checklist-minimalistic-bold" class="text-info-600 text-2xl"></iconify-icon>
                            <span class="text-sm text-secondary-light">Pilihan Ganda</span>
                        </div>
                        <h4 class="mb-0 text-info-600">3</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="p-16 border radius-8 bg-warning-focus">
                        <div class="d-flex align-items-center gap-2 mb-8">
                            <iconify-icon icon="solar:check-circle-bold" class="text-warning-600 text-2xl"></iconify-icon>
                            <span class="text-sm text-secondary-light">Benar/Salah</span>
                        </div>
                        <h4 class="mb-0 text-warning-600">2</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="p-16 border radius-8 bg-success-focus">
                        <div class="d-flex align-items-center gap-2 mb-8">
                            <iconify-icon icon="solar:star-bold" class="text-success-600 text-2xl"></iconify-icon>
                            <span class="text-sm text-secondary-light">Total Poin</span>
                        </div>
                        <h4 class="mb-0 text-success-600">45</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add/Edit Quiz Modal -->
<div class="modal fade" id="addQuizModal" tabindex="-1" aria-labelledby="addQuizModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addQuizModalLabel">Tambah Pertanyaan Kuis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-20">
                        <label class="form-label fw-semibold text-neutral-900">Pilih Modul</label>
                        <select class="form-select radius-8" required>
                            <option value="">-- Pilih Modul --</option>
                            <option value="1">Makanan Tinggi Zat Besi</option>
                            <option value="2">Makanan yang Harus Dihindari</option>
                            <option value="3">Obat-obatan dan Kepatuhan</option>
                        </select>
                    </div>

                    <div class="mb-20">
                        <label class="form-label fw-semibold text-neutral-900">Pertanyaan</label>
                        <textarea class="form-control radius-8" rows="3" placeholder="Masukkan pertanyaan kuis..." required></textarea>
                    </div>

                    <div class="mb-20">
                        <label class="form-label fw-semibold text-neutral-900">Tipe Pertanyaan</label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="questionType" id="typeMultiple" value="multiple_choice" checked>
                                <label class="form-check-label" for="typeMultiple">
                                    Pilihan Ganda
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="questionType" id="typeTrueFalse" value="true_false">
                                <label class="form-check-label" for="typeTrueFalse">
                                    Benar/Salah
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Multiple Choice Options (4 options) -->
                    <div id="optionsContainer">
                        <label class="form-label fw-semibold text-neutral-900 mb-12">Opsi Jawaban (Pilihan Ganda)</label>
                        <div class="row g-3 mb-12">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-primary-focus text-primary-600 fw-semibold">A</span>
                                    <input type="text" class="form-control" placeholder="Opsi A" required>
                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="radio" name="correctAnswerMultiple" value="A" title="Tandai sebagai jawaban benar">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-primary-focus text-primary-600 fw-semibold">B</span>
                                    <input type="text" class="form-control" placeholder="Opsi B" required>
                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="radio" name="correctAnswerMultiple" value="B" title="Tandai sebagai jawaban benar">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-primary-focus text-primary-600 fw-semibold">C</span>
                                    <input type="text" class="form-control" placeholder="Opsi C" required>
                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="radio" name="correctAnswerMultiple" value="C" title="Tandai sebagai jawaban benar">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-primary-focus text-primary-600 fw-semibold">D</span>
                                    <input type="text" class="form-control" placeholder="Opsi D" required>
                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="radio" name="correctAnswerMultiple" value="D" title="Tandai sebagai jawaban benar">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <small class="text-secondary-light">
                            <iconify-icon icon="mdi:information-outline" class="text-info-600"></iconify-icon>
                            Pilih radio button untuk menandai jawaban yang benar
                        </small>
                    </div>

                    <!-- True/False Options (2 options only) -->
                    <div id="trueFalseContainer" style="display: none;">
                        <label class="form-label fw-semibold text-neutral-900 mb-12">Opsi Jawaban (Benar/Salah)</label>
                        <div class="row g-3 mb-12">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-success-focus text-success-600 fw-semibold">A</span>
                                    <input type="text" class="form-control" value="Benar" readonly>
                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="radio" name="correctAnswerTrueFalse" value="A" title="Tandai sebagai jawaban benar">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-danger-focus text-danger-600 fw-semibold">B</span>
                                    <input type="text" class="form-control" value="Salah" readonly>
                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="radio" name="correctAnswerTrueFalse" value="B" title="Tandai sebagai jawaban benar">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <small class="text-secondary-light">
                            <iconify-icon icon="mdi:information-outline" class="text-info-600"></iconify-icon>
                            Pilih radio button untuk menandai jawaban yang benar (A = Benar, B = Salah)
                        </small>
                    </div>

                    <div class="mb-20">
                        <label class="form-label fw-semibold text-neutral-900">Poin</label>
                        <input type="number" class="form-control radius-8" placeholder="10" value="10" min="1" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary-600">Simpan Pertanyaan</button>
            </div>
        </div>
    </div>
</div>

<?php include './partials/layouts/layoutBottom.php' ?>
