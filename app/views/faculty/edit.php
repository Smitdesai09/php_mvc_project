<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Assignment</title>
</head>
<body>
    <?php require __DIR__. '/../../../common/flash_msg.php'; ?>
    <br>
    <a href="index.php?controller=faculty&action=listAssignments">&larr; Back to List</a>
    <br><br>
    <form method="post">
        <label for="title">Title: </label>
        <input type="text" name="title" id="title" placeholder="Assignment Title" value="<?=htmlspecialchars($row['title'])?>" required>
        <br><br>

        <label for="year">Year: </label>
        <select name="year" id="year" required>
            <option value="1" <?php if($row['target_year']==1){?> selected <?php }?> >First</option>
            <option value="2" <?php if($row['target_year']==2){?> selected <?php }?> >Second</option>
            <option value="3" <?php if($row['target_year']==3){?> selected <?php }?> >Third</option>
        </select>
        <br><br>

        <label for="subject">Subject: </label>
        <input type="text" name="subject" id="subject" placeholder="Assignment Subject" value="<?=htmlspecialchars($row['subject'])?>" required>
        <br><br>

        <label for="description">Description: </label>
        <textarea id="description" name="description" rows="5" cols="35
        " placeholder="Assignment Description"  required><?=htmlspecialchars($row['description'])?></textarea>
        <br><br>

        <label for="due_date">Due Date: </label>
        <input type="datetime-local" name="due_date" id="due_date" value="<?=htmlspecialchars(date('Y-m-d\TH:i',strtotime($row['due_date'])))?>" required>
        <br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>