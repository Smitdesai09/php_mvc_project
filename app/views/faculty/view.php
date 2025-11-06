<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Assignment</title>
</head>
<body>
    <?php require __DIR__. '/../../../common/flash_msg.php'; ?>
    
    <br>
    <a href="index.php?controller=faculty&action=listAssignments">&larr; Back to List</a>
    <br>
    <h3>Assignment Details:</h3>
    <div class="assignment_details">
        <p>Title: <?= htmlspecialchars($assignment['title']) ?></p>
        <p>Year: <?php if($assignment['target_year'] ==1){ echo "First"; }
                    elseif($assignment['target_year'] ==2){ echo "Second"; }
                    else{ echo "Third"; } ?>
        </p>
        <p>Subject: <?= htmlspecialchars($assignment['subject']) ?></p>
        <p>Description: <?= htmlspecialchars($assignment['description']) ?></p>
        <b><p>Due Date: <?php 
                        $due= new DateTime($assignment['due_date']);
                        echo $due->format('j M Y, H:i A'); 
                    ?>
        </p></b>
        <p>Owner: <?= htmlspecialchars($assignment['full_name']) ?></p>
        <p>Creation Date: <?php 
                        $due= new DateTime($assignment['created_date']);
                        echo $due->format('j M Y, H:i A'); 
                    ?>
        </p>
    </div>
    <Br><br>
    <h3>Submissions:</h3>
    <table border="2" cellspacing="7" cellpadding="8">
        <tr>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Submission Date</th>
            <th>Submit Type</th>
            <th>Aprroval Status</th>
            <th>Actions</th>
        </tr>
        <?php if(!$submissions){ ?>
            <tr>
                <td colspan="4">No Submissions are done yet!</td>
            </tr>
        <?php } ?>
        <?php foreach($submissions as $row){ ?>
            <tr>
                <td> <?= htmlspecialchars($row['student_id']) ?> </td>
                <td> <?= htmlspecialchars($row['student_name']) ?> </td>
                <td> <?= htmlspecialchars($row['submit_date']) ?> </td>
                <td> <?php if (strtotime($row['submit_date']) > strtotime($assignment['due_date'])) { echo 'Late';}
                else { echo 'On-Time'; } ?>
                </td>
                <td> <?= htmlspecialchars($row['approval_status']) ?> </td>
                <td>
                    <a href="index.php?controller=faculty&action=viewFile&id=<?=$row['submission_id']?>" target="_blank"><button>View Work</button></a> |
                    <a href="index.php?controller=faculty&action=approveSubmission&id=<?=$row['submission_id']?>"><button>Aprrove</button></a> |
                    <a href="index.php?controller=faculty&action=rejectSubmission&id=<?=$row['submission_id']?>" onclick="return confirm('Are you really want to reject the submission?')"><button>Reject</button></a> 
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>