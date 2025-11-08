<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faculty Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
  <?php require __DIR__ . '/../../views/layout/header.php'; ?>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8fafc;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    .page-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 10px;
    }

    .page-header h2 {
      margin: 0;
      font-size: 1.6rem;
      font-weight: 600;
      color: #1f2937;
    }

    .add {
      display: inline-block;
      background-color: #007bff;
      color: white;
      padding: 10px 20px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: 600;
      transition: background-color 0.3s ease;
    }

    .add:hover {
      background-color: #0056b3;
    }

    .flash-container {
      margin-top: 15px;
    }

    .main {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      gap: 20px;
      margin-top: 20px;
    }

    .card {
      background: white;
      border-radius: 14px;
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.08);
      padding: 20px;
      position: relative;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .card:hover {
      transform: translateY(-3px);
      box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.12);
    }

    .card-title {
      font-size: 1.25rem;
      font-weight: 600;
      color: #1a1a1a;
      margin-bottom: 8px;
    }

    .card-info {
      color: #555;
      font-size: 0.95rem;
      margin-bottom: 6px;
    }

    .status {
      font-weight: 600;
    }

    .status.active {
      color: #1e9e44;
    }

    .status.closed {
      color: #b91c1c;
    }

    .btn-view {
      display: inline-block;
      border: 1.8px solid #d1d5db;
      background-color: #fff;
      color: #111827;
      padding: 9px 18px;
      border-radius: 8px;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.25s ease;
      width: 100%;
      text-align: center;
      box-shadow: none;
    }

    .btn-view:hover {
      background-color: #111827;
      color: white;
      box-shadow: none;
    }

    .menu {
      position: absolute;
      top: 14px;
      right: 14px;
    }

    .menu-btn {
      background: none;
      border: none;
      cursor: pointer;
      font-size: 1.2rem;
      color: #555;
    }

    .menu-content {
      display: none;
      position: absolute;
      top: 25px;
      right: 0;
      background: white;
      box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.1);
      border-radius: 6px;
      min-width: 120px;
      z-index: 10;
      overflow: hidden;
    }

    .menu-content a {
      display: block;
      padding: 10px 12px;
      font-size: 0.9rem;
      text-decoration: none;
      font-weight: 500;
    }

    .menu-content a.edit {
      color: #b7791f;
    }

    .menu-content a.delete {
      color: #b91c1c;
    }

    .card-footer {
      margin-top: 16px;
      border-top: 1px solid #e5e7eb;
      padding-top: 12px;
    }

    @media (max-width: 600px) {
      .page-header {
        flex-direction: column;
        align-items: flex-start;
      }

      .add {
        width: 100%;
        text-align: center;
      }
    }

    /* extra space if footer is fixed */
body {
  padding-bottom: 80px; /* adjust if footer height differs */
}

  </style>

  <div class="container">
    <div class="page-header">
      <h2>My Assignments</h2>
      <a href="index.php?controller=faculty&action=addAssignment" class="add">Add New Assignment</a>
    </div>

    <div class="flash-container">
      <?php require __DIR__ . '/../../../common/flash_msg.php'; ?>
    </div>

    <div class="main">
      <?php if (!$assignmentList) { ?>
        <p style="text-align:center; width:100%;">No assignments found.</p>
      <?php } ?>

      <?php foreach ($assignmentList as $row) {
        $due = new DateTime($row['due_date']);
        $now = new DateTime();
        $status = ($due < $now) ? "Closed" : "Active";
      ?>
        <div class="card">
          <div class="menu">
            <button class="menu-btn"><i class="fa-solid fa-ellipsis-vertical"></i></button>
            <div class="menu-content">
              <a href="index.php?controller=faculty&action=editAssignment&id=<?= $row['assignment_id'] ?>" class="edit">Edit</a>
              <a href="index.php?controller=faculty&action=deleteAssignment&id=<?= $row['assignment_id'] ?>" class="delete" onclick="return confirm('Are you sure you want to delete this assignment?')">Delete</a>
            </div>
          </div>

          <div class="card-body">
            <div class="card-title"><?= htmlspecialchars($row['title']) ?></div>
            <div class="card-info">Due Date: <?= $due->format('Y-m-d') ?></div>
            <div class="card-info">Status: <span class="status <?= strtolower($status) ?>"><?= $status ?></span></div>

            <div class="card-footer">
              <a href="index.php?controller=faculty&action=viewAssignment&id=<?= $row['assignment_id'] ?>" class="btn-view">View Submissions</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <script>
    document.addEventListener('click', function(e) {
      const menus = document.querySelectorAll('.menu-content');
      menus.forEach(menu => menu.style.display = 'none');
      if (e.target.closest('.menu-btn')) {
        const content = e.target.closest('.menu').querySelector('.menu-content');
        content.style.display = 'block';
        e.stopPropagation();
      }
    });
  </script>

  <?php require __DIR__ . '/../../views/layout/footer.php'; ?>
</body>

</html>
