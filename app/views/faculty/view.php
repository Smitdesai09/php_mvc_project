<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Assignment</title>
</head>

<body>
    <?php require __DIR__ . '/../../views/layout/header.php'; ?>
    <?php require __DIR__ . '/../../../common/flash_msg.php'; ?>
    <!-- <?php require __DIR__ . '/../../../common/flash_msg.php'; ?> -->

    <!-- <a type="button" class="btn btn-link" href="index.php?controller=faculty&action=listAssignments">&larr; Back</a> -->

    <!-- <div class="assignment_details">
        <h3>Assignment Details:</h3>
        <a href="index.php?controller=faculty&action=listAssignments">&larr; Back to List</a>
        <p>Title: <?= htmlspecialchars($assignment['title']) ?></p>
        <p>Year: <?php if ($assignment['target_year'] == 1) {
                        echo "First";
                    } elseif ($assignment['target_year'] == 2) {
                        echo "Second";
                    } else {
                        echo "Third";
                    } ?>
        </p>
        <p>Subject: <?= htmlspecialchars($assignment['subject']) ?></p>
        <p>Description: <?= htmlspecialchars($assignment['description']) ?></p>
        <b><p>Due Date: <?php
                        $due = new DateTime($assignment['due_date']);
                        echo $due->format('j M Y, H:i A');
                        ?>
        </p></b>
        <p>Owner: <?= htmlspecialchars($assignment['full_name']) ?></p>
        <p>Creation Date: <?php
                            $due = new DateTime($assignment['created_date']);
                            echo $due->format('j M Y, H:i A');
                            ?>
        </p>
    </div> -->

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            background: #f4f6fa;
            color: #333;
        }

        .container-wrap {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 30px 0;
            width: 100%;
        }

        .main {
            background: #ffffff;
            border: 1px solid black;
            border-radius: 8px;
            padding: 10px 20px;
            width: 500px;
            box-shadow: 5px 8px 10px rgba(0, 0, 0, 0.8);
            /* margin-top: 1.5vh; */
        }

        h1 {
            text-align: center;
            color: #0077b6;
            font-size: 2.9em;
            margin-bottom: 2vh;
            padding-bottom: 1.5vh;
        }

        .button {
            display: inline-block;
            /* margin: auto 20.8vh; */
            padding: 6px 10px;
            margin-bottom: 15px;
            background-color: white;
            color: forestgreen;
            border-radius: 6px;
            border: none;
            text-decoration: none;
        }

        .button:hover {
            transition: 0.5s ease-out;
            background-color: forestgreen;
            color: white;
        }

        .detail p {
            display: grid;
            grid-template-columns: 150px 1fr;
            align-items: center;
            padding: 2px 0;
            border-bottom: 0.12em solid #0077b6;
            font-size: 1.13em;
        }

        .detail span {
            font-size: 1.15em;
            color: darkgreen;
            line-height: 1.3em;
        }

        .button1 {
            padding: 8px 15px;
            border: none;
            border-radius: 6px;
            font-size: 1.1em;
            font-weight: 500;
            background-color: white;
            color: darkgreen;
        }

        .button1:hover {
            transition: 0.5s ease-out;
            background-color: darkgreen;
            color: white;
        }

        form {
            padding-top: 10px;
        }

        input[type="file"] {
            display: none;
        }

        .file-label {
            display: inline-block;
            padding: 8px 15px;
            border: none;
            border-radius: 6px;
            font-size: 1.1em;
            font-weight: 500;
            background-color: white;
            color: darkgreen;
            margin-right: 22vh;
        }

        .file-label:hover {
            transition: 0.5s ease-out;
            background-color: darkgreen;
            color: white;
        }

        .table-container {
            width: 90%;
            overflow-x: auto;
            margin: 30px auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px; /* Keeps table readable even on narrow screens */
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        @media (max-width: 600px) {
            .table-container {
                width: 95%;
                padding: 10px;
            }

            table {
                font-size: 0.9em;
                min-width: 500px; /* Keep table scrollable but not squished */
            }

            th, td {
                padding: 8px;
            }

            .table-container::-webkit-scrollbar {
                height: 8px;
            }

            .table-container::-webkit-scrollbar-thumb {
                background-color: #0077b6;
                border-radius: 4px;
            }
        }

        @media (max-width: 600px) {
            .main {
                width: 90%;
                padding: 25px 20px;
            }

            .detail p {
                grid-template-columns: 100px 1fr;
                font-size: 0.95em;
            }
        }
    </style>

    <div class="container-wrap">
        <div class="main">
            <a href="index.php?controller=faculty&action=listAssignments" class="button">&larr; Back</a>
            <h1>Assignment Details</h1>

            <div class="detail">
                <p><span>Title </span><?= htmlspecialchars($assignment['title']) ?></p>
                <p>
                    <span>Year</span> <?php if ($assignment['target_year'] == 1) {
                                            echo "First";
                                        } elseif ($assignment['target_year'] == 2) {
                                            echo "Second";
                                        } else {
                                            echo "Third";
                                        }
                                        ?>
                </p>
                <p><span>Subject</span><?= htmlspecialchars($assignment['subject']) ?></p>
                <p><span>Description </span> <?= htmlspecialchars($assignment['description']) ?></p>
                <p><span>DueDate</span><?php
                                        $due = new DateTime($assignment['due_date']);
                                        echo $due->format('j M Y, H:i A');
                                        ?></p>
                <p><span>Owner</span> <?= htmlspecialchars($assignment['full_name']) ?></p>
                <p><span>CreatedDate</span><?php
                                            $due = new DateTime($assignment['created_date']);
                                            echo $due->format('j M Y, H:i A');
                                            ?></p>
            </div>
        </div>
        <div class="table-container">
            <h3 class="text-center" style="font-size:2.5em;color:#0077b6;">Submissions</h3>
            <table class="table table-striped table-hover">
                <tr class="table-dark">
                    <th scope="col">Student Roll</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Submission Date</th>
                    <th scope="col">Submit Type</th>
                    <th scope="col">Aprroval Status</th>
                    <th scope="col">Actions</th>
                </tr>
                <?php if (!$submissions) { ?>
                    <tr>
                        <td class="text-center" colspan="6">No Submissions are done yet!</td>
                    </tr>
                <?php } ?>
                <?php foreach ($submissions as $row) { ?>
                    <tr>
                        <td> <?= htmlspecialchars($row['student_username']) ?> </td>
                        <td> <?= htmlspecialchars($row['student_name']) ?> </td>
                        <td> <?= htmlspecialchars($row['submit_date']) ?> </td>
                        <td> <?php if (strtotime($row['submit_date']) > strtotime($assignment['due_date'])) {
                                    echo 'Late';
                                } else {
                                    echo 'On-Time';
                                } ?>
                        </td>
                        <td> <?= htmlspecialchars($row['approval_status']) ?> </td>
                        <td>
                            <!-- <a href="index.php?controller=faculty&action=viewFile&id=<?= $row['submission_id'] ?>" target="_blank"><button>View Work</button></a> |
                                <a href="index.php?controller=faculty&action=approveSubmission&id=<?= $row['submission_id'] ?>"><button>Aprrove</button></a> |
                                <a href="index.php?controller=faculty&action=rejectSubmission&id=<?= $row['submission_id'] ?>" onclick="return confirm('Are you really want to reject the submission?')"><button>Reject</button></a> -->
                            <a type="button" class="btn btn-secondary" href="index.php?controller=faculty&action=viewFile&id=<?= $row['submission_id'] ?>" target="_blank">View Work</a> |
                            <a type="button" class="btn btn-success" href="index.php?controller=faculty&action=approveSubmission&id=<?= $row['submission_id'] ?>">Approve</a> |
                            <a type="button" class="btn btn-danger" href="index.php?controller=faculty&action=rejectSubmission&id=<?= $row['submission_id'] ?>" onclick="return confirm('Are you really want to reject the submission?')">Reject</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    <?php require __DIR__ . '/../../views/layout/footer.php'; ?>
</body>

</html>