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
        <h1>Only Show Targeted Year Student Assignement</h1>
        <a href="index.php?controller=Student&action=get_student">Go Back Dashbored</a>
        <table border="2" cellspacing="7" cellpadding="8">
            <tr>
                <td>Title</td><td>Subject</td><td>Target_Year</td>
            </tr>
            <?php foreach($students as $stu){ ?>
                <tr>
                    <td><?= htmlspecialchars($stu['title']) ?></td>
                    <td><?= htmlspecialchars($stu['subject']) ?></td>                                        
                    <td><?= htmlspecialchars($stu['target_year']) ?></td>                                   
                </tr>
            <?php }?>
        </table>
    </div>
</body>
</html>