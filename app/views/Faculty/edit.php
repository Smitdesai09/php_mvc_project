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
            <input type="text" name="title" id="title" placeholder="Assignment Title" value="<?=htmlspecialchars($row['title'])?>" required>
        </lable><br>

        <lable for="year">
            <select name="year" id="year" required>
                <option value="1" <?php if($row['target_year']==1){?> selected <?php }?> >First</option>
                <option value="2" <?php if($row['target_year']==2){?> selected <?php }?> >Second</option>
                <option value="3" <?php if($row['target_year']==3){?> selected <?php }?> >Third</option>
            </select>
        </lable><br>

        <lable for="subject">
            <input type="text" name="subject" id="subject" placeholder="Assignment Subject" value="<?=htmlspecialchars($row['subject'])?>" required>
        </lable><br>

        <lable for="description">
            <textarea id="description" name="description" rows="4" cols="16" placeholder="Assignment Description"  required><?=htmlspecialchars($row['description'])?></textarea>
        </lable><br>

        <lable for="due_date">
            <input type="date" name="due_date" id="due_date" value="<?=htmlspecialchars(substr($row['due_date'], 0, 10))?>" required>
        </lable><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>