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
        <h1>Show Assignment Detail</h1>
        <a href="index.php?contoller=Student&action=get_all_assignment">Go Back To All Assignment</a>
        <table border="2" cellspacing="7" cellpadding="8">
            <tr>
                <td>Title</td><td>Subject</td><td>Description</td><td>Due_Date</td><td>Uplode Assignment</td>
            </tr>
            <tr>
                <td><?= htmlspecialchars($student['title']) ?></td>                   
                <td><?= htmlspecialchars($student['subject']) ?></td>                   
                <td><?= htmlspecialchars($student['description']) ?></td>                    
                <td><?= htmlspecialchars($student['due_date'])?></td>
                <td><a href="">Uplode</a></td>                                      
            </tr>
        </table>
    </div>
</body>
</html>