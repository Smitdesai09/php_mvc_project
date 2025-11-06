<?php 
$config = require __DIR__ . '/../../../common/config.php'; 
include __DIR__ . '/../../../public/bootstrap.php'; 
?>

<style>
  body, html {
    margin: 0;
    padding: 0;
  }
  header {
    margin: 0;
    padding: 0;
  }
  .navbar {
    margin: 0 !important;
    padding: 0 !important;
    border: none !important;
  }
</style>

<header>
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm w-100">
    <div class="container-fluid d-flex justify-content-between align-items-center px-3 py-2">
      <a class="navbar-brand fw-bold text-light m-0" href="#">
        <?= htmlspecialchars($config['appName']) ?>
      </a>
      <button type="button" class="btn btn-dark border-0 p-0" data-bs-toggle="modal" data-bs-target="#profileModal">
        <i class="bi bi-person-circle fs-4 text-light"></i>
      </button>
    </div>
  </nav>

  <!-- Profile Modal -->
  <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-end mt-2 me-2">
      <div class="modal-content shadow border-0">
        <div class="modal-header py-2 bg-dark text-light">
          <h6 class="modal-title" id="profileModalLabel">Profile</h6>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center bg-body-tertiary">
          <h6 class="mb-3"><b>Name:</b> <?= htmlspecialchars($_SESSION['user']['name']) ?></h6>
          <a href="index.php?controller=auth&action=logout" class="w-100">
            <button class="btn btn-outline-danger btn-sm w-100">Logout</button>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</header>
