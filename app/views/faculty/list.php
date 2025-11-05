<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Dashboard</title>
</head>
<body>
    <?php require __DIR__. '/../../../common/flash_msg.php'; ?>

    <br>
    <a href="index.php?controller=faculty&action=addAssignment">Add New Assignment</a>
    <br>
    <h3>My Assignments:</h3>
    <br>
    <table border="2" cellspacing="7" cellpadding="8">
        <tr>
            <th>Title</th>
            <th>Due Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php if(!$assignmentList){ ?>
            <tr>
                <td colspan="5">No Assignments found!</td>
            </tr>
        <?php } ?>
        <?php foreach($assignmentList as $row){ ?>
            <tr>
                <td> <?= htmlspecialchars($row['title']) ?> </td>
                <td> <?php 
                        $due= new DateTime($row['due_date']);
                        echo $due->format('j M Y, H:i A'); 
                    ?> 
                </td>
                <td> <?php 
                        $now = new DateTime();
                        $due = new DateTime($row['due_date']);
                        $status = ($due < $now) ? "Closed" : "Active";
                        echo $status;
                    ?>
                </td>
                <td>
                    <a href="index.php?controller=faculty&action=viewAssignment&id=<?=$row['assignment_id']?>">View Submissions</a> |
                    <a href="index.php?controller=faculty&action=editAssignment&id=<?=$row['assignment_id']?>">Edit</a> |
                    <a href="index.php?controller=faculty&action=deleteAssignment&id=<?=$row['assignment_id']?>" onclick="return confirm('Are you really want to delete the assignment?')">Delete</a> 
                </td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>