<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Work</title>
</head>
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: Arial, sans-serif;
    background-color: #fafafa;
    padding: 20px;
  }

  h1 {
    text-align: center;
    margin-bottom: 20px;
    font-size: clamp(1.5rem, 2vw, 2rem);
  }

  /* Grid automatically adjusts columns */
  .main {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 15px;
  }

  .container {
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
    padding: 15px;
    transition: transform 0.2s ease;
  }

  .container:hover {
    transform: translateY(-4px);
  }

  .title p {
    font-size: 1.75rem;
    font-weight: 600;
    margin-bottom: 5px;
  }

  .duedate p {
    color: gray;
    font-size: 1rem;
    margin-bottom: 10px;
  }

  .last {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .last p {
    font-size: 1.2rem;
    color: #2f4f4f;
  }

  .btn {
    border: 1px solid;
    color: #43a047;
    background-color: white;
    border-radius: 6px;
    padding: 9px 30px;
    font-size: 1.1rem;
    cursor: pointer;
    transition: 0.3s ease;
    text-decoration: none;
    text-align: center;
  }

  .btn:hover {
    color: white;
    background-color: #43a047;
  }

  /* Only one media query for very small screens */
  @media (max-width: 600px) {
    body {
      padding: 10px;
    }

    .last {
      flex-direction: column;
      align-items: flex-start;
    }

    .btn {
      width: 100%;
    }
  }
</style>

<body>
  <?php require __DIR__ . '/../../../common/flash_msg.php'; ?>
  <br>

  <a href="index.php?controller=auth&action=logout">
    <button type="button">Logout</button>
  </a>
  <br><br>
  
  <?php if(!empty($alerts)) { ?>
    <div>
      <h4>Notifications:</h4>
      <?php foreach ($alerts as $alert) { ?>
        <div><?= $alert ?></div><br>
      <?php } ?>
    </div>
  <?php } ?>
  <br><br>

  <h1 class="heading">My Work</h1>
  <div class="main">
    <?php foreach ($assignmentList as $assignment) { ?>
      <div class="container">
        <div class="title">
          <p><?= htmlspecialchars($assignment['title']) ?></p>
        </div>
        <div class="duedate">
          <p>Due <?= date("M j", strtotime(htmlspecialchars($assignment['due_date']))) ?></p>
        </div>
        <div class="last">
          <p><?= htmlspecialchars($assignment['status']) ?></p>
          <a href="index.php?controller=Student&action=view_assignment&id=<?= urlencode($assignment['assignment_id']) ?>" class="btn">SUBMIT</a>
        </div>
      </div>
    <?php } ?>
  </div>
</body>

</html>