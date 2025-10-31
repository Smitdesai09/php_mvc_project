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
        <h1>Assignment Detail</h1>
        <a href="index.php?contoller=Student&action=list_assignment"><- Back</a>               
        <p>Title : <?= htmlspecialchars($student['title']) ?></p>                        
        <p>
            Year : <?php if($student['target_year']==1){
                    echo "First";
                }   
                  elseif($student['target_year']==2){
                    echo "Second";
                }
                else{
                    echo "Third";
                }
            ?>
        </p>                        
        <p>Subject : <?= htmlspecialchars($student['subject']) ?></p>                        
        <p>Description : <?= htmlspecialchars($student['description']) ?></p>                        
        <p>DueDate : <?= htmlspecialchars($student['due_date']) ?></p> 
        <p>Owner : <?= htmlspecialchars($student['full_name']) ?></p> 
        <p>CreatedDate : <?= htmlspecialchars($student['created_date']) ?></p> 
    </div>
</body>
</html>
