<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Dashboard</title>
</head>

<body>
    <?php require __DIR__ . '/../../views/layout/header.php'; ?>

    <?php require __DIR__ . '/../../../common/flash_msg.php'; ?>

    <style>
        body{
            font-family: Arial, sans-serif;
            box-sizing: border-box;
        }
        /* h3{
            text-align: center;
            margin-top: 1.5rem;
            font-size: 2.3em;
            font-weight: 600;
            color: #007bff;
        } */
        .add {
            display: block;
            width: fit-content;
            margin: 1rem auto; /* centers it horizontally */
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .add:hover {
            background-color: #0056b3;
        }

        .main{
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(19.2rem, 1fr));
            gap:10px;
            padding-left: 10px;
            padding-right: 10px;
        }
        .buttons{
            display:flex;
            justify-content: space-between;
            gap: 8px;
            margin-top: auto;
        }
        #btn1{
            flex: 1;
            text-align: center;
            padding: 8px 20px;
            border-radius: 5px;
            transition: 0.3s;
            font-size: 0.9em;
            color:#43a047;
            background-color: white;
            text-decoration: none;
            font-size: 1.08em;
            font-weight: 600;
        }
        #btn1:hover{
            background-color:#43a047;
            color: white;
        }
        a#btn1.edit-btn {
            background-color:white; 
            color:#FF6500; 
        }
        a#btn1.edit-btn:hover {
            background-color: #FF6500; 
            color: white; 
        }
        
        a#btn1.delete-btn {
            background-color:white; 
            color:#e53935; 
        }
        a#btn1.delete-btn:hover {
            background-color: #e53935; 
            color: white; 
        }
        .card-body{
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .card{
            width: 100%;
            margin: 0 auto;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
        }
        .card:hover{
            transform: translateY(-4px);
        }
    </style>
    <!-- <h3>My Assignments</h3> -->
    <a href="index.php?controller=faculty&action=addAssignment"  class="add">Add New Assignment</a>

    <div class="main">
        <?php foreach($assignmentList as $row){ ?>
        <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
            <p class="card-text">
                <?php
                $due = new DateTime($row['due_date']);
                echo $due->format('j M Y, H:i A');
                ?>
            </p>
            <div class="buttons">
                <a href="index.php?controller=faculty&action=viewAssignment&id=<?= $row['assignment_id'] ?>" id="btn1">View</a>
                <a href="index.php?controller=faculty&action=editAssignment&id=<?= $row['assignment_id'] ?>" id="btn1" class="edit-btn">Edit</a>
                <a href="index.php?controller=faculty&action=deleteAssignment&id=<?= $row['assignment_id'] ?>" onclick="return confirm('Are you really want to delete the assignment?')" id="btn1" class="delete-btn">Delete</a>
            </div>
        </div>
    </div>
    <?php } ?>
    </div>

    <!-- <table>
        <tr>
            <th>Title</th>
            <th>Due Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php if (!$assignmentList) { ?>
            <tr>
                <td colspan="5">No Assignments found!</td>
            </tr>
        <?php } ?>
        <?php foreach ($assignmentList as $row) { ?>
            <tr>
                <td> <?= htmlspecialchars($row['title']) ?> </td>
                <td> <?php
                        $due = new DateTime($row['due_date']);
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
                    <a href="index.php?controller=faculty&action=viewAssignment&id=<?= $row['assignment_id'] ?>">View Submissions</a> |
                    <a href="index.php?controller=faculty&action=editAssignment&id=<?= $row['assignment_id'] ?>">Edit</a> |
                    <a href="index.php?controller=faculty&action=deleteAssignment&id=<?= $row['assignment_id'] ?>" onclick="return confirm('Are you really want to delete the assignment?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table> -->

    <?php require __DIR__ . '/../../views/layout/footer.php'; ?>
</body>

</html>