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
        <h1>Only Show Targeted Year Student</h1>
        <table border="2" cellspacing="7" cellpadding="8">
            <tr>
                <td>User_id</td><td>Full_Name</td><td>Target_Year</td><td>All_Assignment</td>
            </tr>
            <?php foreach($students as $stu){ ?>
                <tr>
                    <td><?= htmlspecialchars($stu['user_id']) ?></td>                   
                    <td><?= htmlspecialchars($stu['full_name']) ?></td>                    
                    <td><?= htmlspecialchars($stu['target_year'])?></td>                    
                    <td><a href="index.php?controller=Student&action=get_assignment&year=<?= urlencode($stu['target_year'])?>">View</a></td>                  
                </tr>
            <?php }?>
        </table>
    </div>
</body>
</html>