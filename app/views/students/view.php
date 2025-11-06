<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        table {
            margin: 20px auto;
        }

        body {
            text-align: center;
        }
    </style>
    <?php require __DIR__ . '/../../views/layout/header.php'; ?>

    <?php require __DIR__ . '/../../../common/flash_msg.php'; ?>

    <a href="index.php?controller=Student&action=list_assignment">&larr; Back</a>

    <h1>Assignment Detail</h1>
    <p>Title : <?= htmlspecialchars($assignment['title']) ?></p>
    <p>
        Year : <?php if ($assignment['target_year'] == 1) {
                    echo "First";
                } elseif ($assignment['target_year'] == 2) {
                    echo "Second";
                } else {
                    echo "Third";
                }
                ?>
    </p>
    <p>Subject : <?= htmlspecialchars($assignment['subject']) ?></p>
    <p>Description : <?= htmlspecialchars($assignment['description']) ?></p>
    <p>DueDate : <?= date("M j", strtotime(htmlspecialchars($assignment['due_date']))) ?></p>
    <p>Owner : <?= htmlspecialchars($assignment['full_name']) ?></p>
    <p>CreatedDate : <?= date("M j", strtotime(htmlspecialchars($assignment['created_date']))) ?></p>
    <form action="index.php?controller=Student&action=upload_assignment&id=<?= $assignment['assignment_id']; ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="submit">
    </form>

    <?php require __DIR__ . '/../../views/layout/footer.php'; ?>
</body>

</html>