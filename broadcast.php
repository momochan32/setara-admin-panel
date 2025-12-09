<?php
// SETARA Broadcast History Data
$broadcastHistory = [
    [
        'id' => 1,
        'title' => 'Jadwal Transfusi Rutin',
        'body' => 'Pengingat untuk jadwal transfusi darah minggu ini. Jangan lupa untuk datang tepat waktu!',
        'targetAudience' => 'All Users',
        'sentDate' => '2024-12-08 10:00',
        'recipientCount' => 156
    ],
    [
        'id' => 2,
        'title' => 'Modul Baru: Nutrisi Sehat',
        'body' => 'Modul edukasi baru tentang nutrisi sehat telah tersedia. Yuk pelajari sekarang!',
        'targetAudience' => 'All Users',
        'sentDate' => '2024-12-07 15:30',
        'recipientCount' => 156
    ],
    [
        'id' => 3,
        'title' => 'Selamat! Level Warrior',
        'body' => 'Selamat kepada pengguna yang telah mencapai level Warrior. Terus semangat!',
        'targetAudience' => 'Warrior',
        'sentDate' => '2024-12-06 09:00',
        'recipientCount' => 42
    ],
    [
        'id' => 4,
        'title' => 'Tips Mengatasi Kelelahan',
        'body' => 'Pelajari tips dan trik untuk mengatasi kelelahan setelah transfusi darah.',
        'targetAudience' => 'All Users',
        'sentDate' => '2024-12-05 14:00',
        'recipientCount' => 156
    ]
];

$script = '<script>
    // Send Broadcast
    $("#sendBroadcastBtn").on("click", function(e) {
        e.preventDefault();

        var title = $("#broadcastTitle").val();
        var body = $("#broadcastBody").val();
        var target = $("#targetAudience").val();

        if(!title || !body || !target) {
            alert("Mohon lengkapi semua field!");
            return;
        }

        if(confirm("Apakah Anda yakin ingin mengirim notifikasi ini?")) {
            alert("Notifikasi berhasil dikirim! (Demo Mode - Integrasi Firebase akan ditambahkan)");
            // TODO: Add Firebase Cloud Messaging logic
            $("#broadcastTitle").val("");
            $("#broadcastBody").val("");
            $("#targetAudience").val("");
        }
    });

    // Character counter for body
    $("#broadcastBody").on("input", function() {
        var length = $(this).val().length;
        $("#charCount").text(length + " / 500 karakter");
    });
</script>';
?>

<?php include './partials/layouts/layoutTop.php' ?>

<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Broadcast Notifikasi</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.php" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Broadcast</li>
        </ul>
    </div>

    <div class="row gy-4">
        <!-- Broadcast Form -->
        <div class="col-lg-8">
            <div class="card h-100">
                <div class="card-header border-bottom bg-base py-16 px-24">
                    <h6 class="text-lg mb-0">Kirim Notifikasi Push</h6>
                </div>
                <div class="card-body p-24">
                    <form>
                        <div class="mb-20">
                            <label for="broadcastTitle" class="form-label fw-semibold text-neutral-900 text-sm mb-8">
                                Judul Notifikasi <span class="text-danger-600">*</span>
                            </label>
                            <input type="text" class="form-control radius-8 border border-neutral-200" id="broadcastTitle" placeholder="Masukkan judul notifikasi..." maxlength="100">
                            <small class="text-secondary-light">Maksimal 100 karakter</small>
                        </div>

                        <div class="mb-20">
                            <label for="broadcastBody" class="form-label fw-semibold text-neutral-900 text-sm mb-8">
                                Isi Pesan <span class="text-danger-600">*</span>
                            </label>
                            <textarea class="form-control radius-8 border border-neutral-200" id="broadcastBody" rows="6" placeholder="Tulis pesan notifikasi Anda..." maxlength="500"></textarea>
                            <div class="d-flex justify-content-between align-items-center mt-8">
                                <small class="text-secondary-light">Maksimal 500 karakter</small>
                                <small class="text-secondary-light" id="charCount">0 / 500 karakter</small>
                            </div>
                        </div>

                        <div class="mb-24">
                            <label for="targetAudience" class="form-label fw-semibold text-neutral-900 text-sm mb-8">
                                Target Penerima <span class="text-danger-600">*</span>
                            </label>
                            <select class="form-select radius-8 border border-neutral-200" id="targetAudience">
                                <option value="">-- Pilih Target --</option>
                                <option value="all">Semua Pengguna</option>
                                <option value="beginner">Level Beginner</option>
                                <option value="warrior">Level Warrior</option>
                                <option value="champion">Level Champion</option>
                                <option value="hero">Level Hero</option>
                                <option value="mayor">Thalassemia Mayor</option>
                                <option value="minor">Thalassemia Minor</option>
                            </select>
                            <small class="text-secondary-light">Pilih kelompok pengguna yang akan menerima notifikasi</small>
                        </div>

                        <div class="d-flex align-items-center gap-3">
                            <button type="button" id="sendBroadcastBtn" class="btn btn-primary-600 radius-8 px-20 py-11">
                                <iconify-icon icon="solar:send-bold" class="icon text-xl line-height-1"></iconify-icon>
                                Kirim Notifikasi
                            </button>
                            <button type="button" class="btn btn-outline-secondary radius-8 px-20 py-11">
                                <iconify-icon icon="solar:refresh-bold" class="icon text-xl line-height-1"></iconify-icon>
                                Reset
                            </button>
                        </div>
                    </form>

                    <!-- Info Card -->
                    <div class="alert alert-warning-focus border border-warning-main d-flex align-items-start gap-3 mt-24" role="alert">
                        <iconify-icon icon="solar:danger-triangle-bold" class="text-warning-600 text-2xl flex-shrink-0 mt-4"></iconify-icon>
                        <div>
                            <h6 class="text-warning-600 mb-8">Penting!</h6>
                            <ul class="mb-0 ps-3">
                                <li class="text-sm text-secondary-light">Pastikan isi pesan jelas dan mudah dipahami</li>
                                <li class="text-sm text-secondary-light">Hindari mengirim notifikasi terlalu sering</li>
                                <li class="text-sm text-secondary-light">Notifikasi yang dikirim tidak dapat dibatalkan</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header border-bottom bg-base py-16 px-24">
                    <h6 class="text-md mb-0">Statistik Broadcast</h6>
                </div>
                <div class="card-body p-24">
                    <div class="mb-20 pb-20 border-bottom">
                        <div class="d-flex align-items-center gap-2 mb-8">
                            <iconify-icon icon="solar:user-bold" class="text-primary-600 text-xl"></iconify-icon>
                            <span class="text-sm text-secondary-light">Total Pengguna</span>
                        </div>
                        <h4 class="mb-0 text-primary-600">156</h4>
                    </div>

                    <div class="mb-20 pb-20 border-bottom">
                        <div class="d-flex align-items-center gap-2 mb-8">
                            <iconify-icon icon="solar:notification-unread-bold" class="text-success-600 text-xl"></iconify-icon>
                            <span class="text-sm text-secondary-light">Notifikasi Terkirim</span>
                        </div>
                        <h4 class="mb-0 text-success-600"><?php echo count($broadcastHistory); ?></h4>
                    </div>

                    <div>
                        <div class="d-flex align-items-center gap-2 mb-8">
                            <iconify-icon icon="solar:calendar-bold" class="text-info-600 text-xl"></iconify-icon>
                            <span class="text-sm text-secondary-light">Bulan Ini</span>
                        </div>
                        <h4 class="mb-0 text-info-600">4</h4>
                    </div>
                </div>
            </div>

            <!-- Target Groups -->
            <div class="card mt-24">
                <div class="card-header border-bottom bg-base py-16 px-24">
                    <h6 class="text-md mb-0">Kelompok Target</h6>
                </div>
                <div class="card-body p-24">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-12 d-flex justify-content-between align-items-center">
                            <span class="text-sm text-secondary-light">Semua Pengguna</span>
                            <span class="badge bg-primary-600 text-white px-12 py-4">156</span>
                        </li>
                        <li class="mb-12 d-flex justify-content-between align-items-center">
                            <span class="text-sm text-secondary-light">Level Beginner</span>
                            <span class="badge bg-success-focus text-success-600 px-12 py-4">38</span>
                        </li>
                        <li class="mb-12 d-flex justify-content-between align-items-center">
                            <span class="text-sm text-secondary-light">Level Warrior</span>
                            <span class="badge bg-success-focus text-success-600 px-12 py-4">42</span>
                        </li>
                        <li class="mb-12 d-flex justify-content-between align-items-center">
                            <span class="text-sm text-secondary-light">Level Champion</span>
                            <span class="badge bg-success-focus text-success-600 px-12 py-4">51</span>
                        </li>
                        <li class="mb-12 d-flex justify-content-between align-items-center">
                            <span class="text-sm text-secondary-light">Level Hero</span>
                            <span class="badge bg-success-focus text-success-600 px-12 py-4">25</span>
                        </li>
                        <li class="mb-12 d-flex justify-content-between align-items-center">
                            <span class="text-sm text-secondary-light">Thalassemia Mayor</span>
                            <span class="badge bg-danger-focus text-danger-600 px-12 py-4">89</span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center">
                            <span class="text-sm text-secondary-light">Thalassemia Minor</span>
                            <span class="badge bg-warning-focus text-warning-600 px-12 py-4">67</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Broadcast History -->
    <div class="card mt-24">
        <div class="card-header border-bottom bg-base py-16 px-24">
            <h6 class="text-lg mb-0">Riwayat Broadcast</h6>
        </div>
        <div class="card-body p-24">
            <div class="table-responsive">
                <table class="table bordered-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col" width="60">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Pesan</th>
                            <th scope="col" width="150">Target</th>
                            <th scope="col" width="120">Penerima</th>
                            <th scope="col" width="180">Tanggal Kirim</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($broadcastHistory as $index => $broadcast): ?>
                        <tr>
                            <td class="text-center"><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></td>
                            <td>
                                <h6 class="text-sm mb-0 fw-semibold"><?php echo $broadcast['title']; ?></h6>
                            </td>
                            <td>
                                <p class="text-sm text-secondary-light mb-0"><?php echo substr($broadcast['body'], 0, 60); ?>...</p>
                            </td>
                            <td>
                                <span class="badge bg-primary-focus text-primary-600 px-12 py-6 radius-4 text-xs fw-medium">
                                    <?php echo $broadcast['targetAudience']; ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="text-primary-600 fw-semibold"><?php echo $broadcast['recipientCount']; ?></span>
                            </td>
                            <td>
                                <span class="text-sm text-secondary-light"><?php echo $broadcast['sentDate']; ?></span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include './partials/layouts/layoutBottom.php' ?>
