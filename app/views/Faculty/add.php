<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Assignment</title>
</head>
<body>
    <?php require __DIR__. '/../../../common/flash_msg.php'; ?>
    
    <form method="post">
        <lable for="title">
            <input type="text" name="title" id="title" placeholder="Assignment Title" required>
        </lable><br>

        <lable for="year">
            <select name="year" id="year" required>
                <option value="1" selected>First</option>
                <option value="2" >Second</option>
                <option value="3" >Third</option>
            </select>
        </lable><br>

        <lable for="subject">
            <input type="text" name="subject" id="subject" placeholder="Assignment Subject" required>
        </lable><br>

        <lable for="description">
            <textarea id="description" name="description" rows="16" cols="4" placeholder="Assignment Description" required></textarea>
        </lable><br>

        <lable for="due_date">
            <input type="date" name="due_date" id="due_date" required>
        </lable><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>