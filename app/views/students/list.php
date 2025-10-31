<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Work</title>
</head>
<style>
  *{
    margin:0;
    padding:0;
  }
  .main{
    display: grid;
    grid-template-columns: repeat(3,1fr);
    /* gap: 4px; */
    justify-content: center;
  }
  .container{
    border: 1px solid grey;
    height: 170px;
    width: 400px;
    max-height: 170px;
    max-width: 400px;
    border-radius: 8px;
    box-shadow: 0px 4px 15px rgba(0,0,0,0.1);
    background-color: white;
    margin: 15px auto;
    }
  .title{
    padding: 15px;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: 600;
    font-size: 30px;
    color: black;
  }
  .duedate{
    margin-top: 0;
    padding-left: 15px;
    padding-bottom: 10px;
    font-family: Arial, Helvetica, sans-serif;
    font-size:20px;
    color: grey;
    padding-bottom: 5px;
  }
  .last{
    padding-left: 10px;
    padding-top: 10px;
    display: flex;
  }
  .last p{
    font-family: Arial, Helvetica, sans-serif;
    font-weight: 500;
    font-size: 18px;
    color: #2f4f4f;
    padding-top:5px;
  }
  .btn{
    margin-left: 20px;
    padding: 12px 35px;
    color: blue;
    background-color: white;
    border-style: none;
    border: 1px solid blue;
    border-radius: 6px;
    font-size: 16px;
    font-weight: 550;
    font-family: Arial, Helvetica, sans-serif;
    text-decoration: none;
  }
  .btn:hover{
    background-color: blue;
    color:white;
    transition: 0.5s ease;
    cursor: pointer;
  }
  .heading{
    text-align: center;
    margin-top: 15px;
    font-family: 'Courier New', Courier, monospace;
    font-size: 50px;
  }

</style>
<body>
    <h1 class="heading">My Work</h1>
    <div class="main">
        <?php foreach($students as $stu){ ?>
            <div class="container">
                <div class="title">
                <p><?= htmlspecialchars($stu['title']) ?></p>
                </div>
                <div class="duedate">
                <p><?= htmlspecialchars($stu['due_date'])?></p>
                </div>
                <div class="last">
                <p><?= htmlspecialchars($stu['status']) ?></p>
                <a href="index.php?controller=Student&action=get_assignment_id&id=<?=urlencode($stu['assignment_id']) ?>" class="btn">VIEW / SUBMIT</a>
                </div>
            </div>
        <?php }?>
    </div>
 
</body>
</html>
