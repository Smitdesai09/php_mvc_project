<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Dashboard</title>
</head>
<body>
    <?php require __DIR__. '/../../../common/flash_msg.php'; ?>
    
    <a href="index.php?controller=faculty&action=addAssignment">Add Assignment</a>
    <table>
        <tr>
            <th>Title</th>
            <th>Year</th>
            <th>Subject</th>
            <th>Due Date</th>
            <th>Actions</th>
        </tr>
        <?php foreach($assignmentList as $row){ ?>
            <tr>
                <td> <?= htmlspecialchars($row['title']) ?> </td>
                <td> <?php if($row['target_year'] ==1){ echo "First"; }
                        elseif($row['target_year'] ==2){ echo "Second"; }
                        else{ echo "Third"; }
                ?> </td>
                <td> <?= htmlspecialchars($row['subject']) ?> </td>
                <td> <?= htmlspecialchars($row['due_date']) ?> </td>
                <td>
                    <a href="index.php?controller=faculty&action=viewAssignment&id=<?=$row['assignment_id']?>">View</a> |
                    <a href="index.php?controller=faculty&action=editAssignment&id=<?=$row['assignment_id']?>">Edit</a> |
                    <a href="index.php?controller=faculty&action=deleteAssignment&id=<?=$row['assignment_id']?>" onclick="return confirm('Are you really want to delete the assignment?')">Delete</a> 
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>