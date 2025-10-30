<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        table{
            margin:20px auto;
        }
        body{
            text-align: center;
        }
    </style>
    <div>
        <h1>Only Show <?= $_SESSION['target_year'] ?>Year Student Assignement</h1>
        <table border="2" cellspacing="7" cellpadding="8">
            <tr>
                <td>Title</td><td>Target_Year</td><td>Assignment_Detail</td>
            </tr>
            <?php foreach($students as $stu){ ?>
                <tr>
                    <td><?= htmlspecialchars($stu['title']) ?></td>
                    <td><?= htmlspecialchars($stu['target_year']) ?></td> 
                    <td><a href="index.php?controller=Student&action=get_assignment_id&id=<?=urlencode($stu['assignment_id']) ?>">View</a></td>                                  
                </tr>
            <?php }?>
        </table>
    </div>
</body>
</html>