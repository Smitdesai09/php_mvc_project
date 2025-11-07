<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Work</title>
</head>

<body>

  <?php require __DIR__. '/../../views/layout/header.php'; ?>
  <!-- <br> -->
  <?php require __DIR__ . '/../../../common/flash_msg.php'; ?>

<style>
  html{
    box-sizing: border-box;
  }
  body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #fafafa;
    padding-bottom: 80px;
  }

  h1 {
    text-align: center;
    margin-top: 10px;
    margin-bottom: 20px;
    font-size: clamp(1.5rem, 2vw, 2rem);
  }

  /* Grid automatically adjusts columns */
  .main {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 10px;
    align-items: stretch;
  }

  .workcard {
    margin-left:1.5vh;
    margin-right: 1.5vh;
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
    padding: 10px;
    transition: transform 0.2s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%; /* Fill grid cell */
  }

  .workcard:hover {
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
    margin-top: auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .last p {
    font-size: 1.3rem;
    color: #2f4f4f;
  }

  .workbutton {
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

  .workbutton:hover {
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

    .workbutton {
      width: 100%;
    }
  }
</style>

  <?php if(!empty($alerts)) { ?>
    <div>
      <?php foreach ($alerts as $alert) { ?>
        <div class="alert alert-danger text-center" role="alert"><?= $alert ?></div><br>
      <?php } ?>
    </div>
  <?php } ?>

  <h1 class="heading">My Work</h1>
  <div class="main">
    <?php foreach ($assignmentList as $assignment) { ?>
      <div class="workcard">
        <div class="title">
          <p><?= htmlspecialchars($assignment['title']) ?></p>
        </div>
        <div class="duedate">
          <p>Due <?= date("M j", strtotime(htmlspecialchars($assignment['due_date']))) ?></p>
        </div>
        <div class="last">
          <p><?= htmlspecialchars($assignment['status']) ?></p>
          <a href="index.php?controller=Student&action=view_assignment&id=<?= urlencode($assignment['assignment_id']) ?>" class="workbutton">SUBMIT</a>
        </div>
      </div>
    <?php } ?>
  </div>
  
  <?php require __DIR__. '/../../views/layout/footer.php'; ?>
</body>

</html>