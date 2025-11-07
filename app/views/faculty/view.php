<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Assignment</title>
</head>
<body>
    <?php require __DIR__. '/../../views/layout/header.php'; ?>

    <?php require __DIR__. '/../../../common/flash_msg.php'; ?>
    
    <a type="button" class="btn btn-link" href="index.php?controller=faculty&action=listAssignments">&larr; Back</a>

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
    <h3 class="text-center">Submissions</h3>
    <table class="table table-striped table-hover">
        <tr class="table-dark">
            <th scope="col">Student Roll</th>
            <th scope="col">Student Name</th>
            <th scope="col">Submission Date</th>
            <th scope="col">Submit Type</th>
            <th scope="col">Aprroval Status</th>
            <th scope="col">Actions</th>
        </tr>
        <?php if(!$submissions){ ?>
            <tr>
                <td class="text-center" colspan="6">No Submissions are done yet!</td>
            </tr>
        <?php } ?>
        <?php foreach($submissions as $row){ ?>
            <tr>
                <td> <?= htmlspecialchars($row['student_username']) ?> </td>
                <td> <?= htmlspecialchars($row['student_name']) ?> </td>
                <td> <?= htmlspecialchars($row['submit_date']) ?> </td>
                <td> <?php if (strtotime($row['submit_date']) > strtotime($assignment['due_date'])) { echo 'Late';}
                else { echo 'On-Time'; } ?>
                </td>
                <td> <?= htmlspecialchars($row['approval_status']) ?> </td>
                <td>
                    <a type="button" class="btn btn-secondary" href="index.php?controller=faculty&action=viewFile&id=<?=$row['submission_id']?>" target="_blank">View Work</a> |
                    <a type="button" class="btn btn-success" href="index.php?controller=faculty&action=approveSubmission&id=<?=$row['submission_id']?>">Approve</a> |
                    <a type="button" class="btn btn-danger" href="index.php?controller=faculty&action=rejectSubmission&id=<?=$row['submission_id']?>" onclick="return confirm('Are you really want to reject the submission?')">Reject</a> 
                </td>
            </tr>
        <?php } ?>
    </table>

    <?php require __DIR__. '/../../views/layout/footer.php'; ?>
</body>
</html>