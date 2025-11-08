<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Work</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
  <?php require __DIR__ . '/../../views/layout/header.php'; ?>
  <?php require __DIR__ . '/../../../common/flash_msg.php'; ?>

  <style>
    html {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #f8fafc;
      padding-bottom: 80px;
      /* ensures visibility with fixed footer */
    }

    .page-header {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .page-header h2 {
      margin: 0;
      font-size: 1.6rem;
      font-weight: 600;
      color: #1f2937;
    }

    .flash-container {
      max-width: 1200px;
      margin: 10px auto;
      padding: 0 20px;
    }

    .main {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      gap: 20px;
      padding: 20px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .card {
      background: white;
      border-radius: 14px;
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.08);
      padding: 20px;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
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

    .status.due,
    .status.rejected {
      color: #b91c1c;
    }

    .status.waiting-for-approval {
      color: #fdaa04ff;
    }

    .status.approved {
      color: #1e9e44;
    }


    .btn-submit {
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

    .btn-submit:hover {
      background-color: #111827;
      color: white;
      box-shadow: none;
    }

    .card-footer {
      margin-top: 16px;
      border-top: 1px solid #e5e7eb;
      padding-top: 12px;
    }
  </style>

  <div class="page-header">
    <h2>My Work</h2>
  </div>

  <div class="flash-container">
    <?php require __DIR__ . '/../../../common/flash_msg.php'; ?>
  </div>

  <div class="main">
    <?php if (empty($assignmentList)) { ?>
      <p style="text-align:center; width:100%;">No assignments found.</p>
    <?php } else { ?>
      <?php foreach ($assignmentList as $assignment) { ?>
        <div class="card">
          <div class="card-body">
            <div class="card-title"><?= htmlspecialchars($assignment['title']) ?></div>
            <div class="card-info">
              Due <?= date("M j", strtotime(htmlspecialchars($assignment['due_date']))) ?>
            </div>
            <div class="card-info">
              Status:
              <span class="status <?= str_replace(' ', '-', strtolower($assignment['status'])) ?>">
                <?= htmlspecialchars($assignment['status']) ?>
              </span>
            </div>
            <div class="card-footer">
              <a href="index.php?controller=Student&action=view_assignment&id=<?= urlencode($assignment['assignment_id']) ?>" class="btn-submit">
                Submit Work
              </a>
            </div>
          </div>
        </div>
      <?php } ?>
    <?php } ?>
  </div>


  <?php require __DIR__ . '/../../views/layout/footer.php'; ?>
</body>

</html>