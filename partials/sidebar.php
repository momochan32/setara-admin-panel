<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="index.php" class="sidebar-logo">
            <img src="assets/images/logo.png" alt="site logo" class="light-logo">
            <img src="assets/images/logo-light.png" alt="site logo" class="dark-logo">
            <img src="assets/images/logo-icon.png" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
    <ul class="sidebar-menu" id="sidebar-menu">
      <!-- Dashboard -->
      <li>
        <a href="index.php">
          <i class="ri-home-8-line text-xl me-14 d-flex w-auto"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <!-- Pengguna (Users) -->
      <li>
        <a href="users.php">
          <i class="ri-user-heart-line text-xl me-14 d-flex w-auto"></i>
          <span>Pengguna</span>
        </a>
      </li>

      <!-- Edukasi (Education) -->
      <li class="dropdown">
        <a href="javascript:void(0)">
          <i class="ri-book-open-line text-xl me-14 d-flex w-auto"></i>
          <span>Edukasi</span>
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="edu-clusters.php"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Klaster</a>
          </li>
          <li>
            <a href="edu-modules.php"><i class="ri-circle-fill circle-icon text-success-main w-auto"></i> Modul</a>
          </li>
          <li>
            <a href="edu-contents.php"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Sub-Modul/Konten</a>
          </li>
        </ul>
      </li>

      <!-- Kuis (Quiz) -->
      <li>
        <a href="quizzes.php">
          <i class="ri-question-answer-line text-xl me-14 d-flex w-auto"></i>
          <span>Kuis</span>
        </a>
      </li>

      <!-- Diskusi (Community) -->
      <li>
        <a href="community.php">
          <i class="ri-discuss-line text-xl me-14 d-flex w-auto"></i>
          <span>Diskusi</span>
        </a>
      </li>

      <!-- Broadcast -->
      <li>
        <a href="broadcast.php">
          <i class="ri-notification-3-line text-xl me-14 d-flex w-auto"></i>
          <span>Broadcast</span>
        </a>
      </li>

      <!-- Pengaturan (Settings) -->
      <li class="dropdown">
        <a href="javascript:void(0)">
          <i class="ri-settings-3-line text-xl me-14 d-flex w-auto"></i>
          <span>Pengaturan</span>
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="admin-management.php"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Admin Management</a>
          </li>
          <li>
            <a href="privacy-terms.php"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Privacy & Terms</a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</aside>