<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Assignment</title>
</head>

<body>
    <?php require __DIR__ . '/../../views/layout/header.php'; ?>

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
            align-items: center;
            padding: 40px 15px;
            width: 100%;
            gap: 30px;
        }

        /* Assignment Card */
        .main {
            background: #fff;
            border-radius: 12px;
            padding: 25px 30px;
            width: 100%;
            max-width: 700px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            border: 1px solid #e2e2e2;
        }

        h1 {
            text-align: center;
            color: #0077b6;
            font-size: 2.2em;
            margin-bottom: 25px;
            padding-bottom: 10px;
        }

        /* Back button */
        .button {
            display: inline-block;
            padding: 8px 14px;
            margin-bottom: 15px;
            background-color: #0077b6;
            color: white;
            border-radius: 6px;
            border: none;
            text-decoration: none;
            transition: 0.2s;
        }

        .button:hover {
            background-color: #005f87;
        }

        /* Assignment details */
        .detail {
            display: grid;
            gap: 10px;
        }

        .detail p {
            display: grid;
            grid-template-columns: 140px 1fr;
            align-items: center;
            padding: 6px 0;
            border-bottom: 1px solid #e2e2e2;
            font-size: 1em;
        }

        .detail p:last-child {
            border-bottom: none;
        }

        .detail span {
            font-weight: 600;
            color: #0077b6;
        }

        /* Submissions card */
        .table-container {
            width: 100%;
            max-width: 900px;
            background: #fff;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            border: 1px solid #e2e2e2;
        }

        .table-container h3 {
            text-align: center;
            font-size: 2em;
            color: #0077b6;
            margin-bottom: 20px;
        }

        /* Flash message */
        .flash-message {
            margin: 10px 0 20px;
            padding: 12px 16px;
            border-radius: 6px;
            font-weight: 500;
            text-align: center;
        }

        .flash-message.error {
            background-color: #fde2e2;
            color: #b30000;
            border-left: 5px solid #d11a2a;
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            vertical-align: middle;
        }

        th {
            background-color: #0077b6;
            color: #fff;
            font-weight: 600;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Buttons */
        td a.btn {
            margin: 4px;
            white-space: nowrap;
            font-size: 0.95em;
        }

        /* Scroll for smaller screens */
        @media (max-width: 800px) {
            .main {
                padding: 20px;
                width: 90%;
            }

            .detail p {
                grid-template-columns: 120px 1fr;
                font-size: 0.95em;
            }

            .table-container {
                width: 95%;
                padding: 20px;
                overflow-x: auto;
            }

            table {
                min-width: 500px;
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
            h1 {
                font-size: 1.8em;
            }

            .table-container h3 {
                font-size: 1.6em;
            }

            td:nth-child(6) {
                display: flex;
                flex-direction: column;
                gap: 5px;
            }

            td a.btn {
                width: 100%;
                font-size: 0.9em;
            }
        }
    </style>

    <div class="container-wrap">
        <div class="main">
            <a href="index.php?controller=faculty&action=listAssignments" class="button">&larr; Back</a>
            <h1>Assignment Details</h1>

            <div class="detail">
                <p><span>Title</span><?= htmlspecialchars($assignment['title']) ?></p>
                <p>
                    <span>Year</span>
                    <?php
                    if ($assignment['target_year'] == 1) {
                        echo "First";
                    } elseif ($assignment['target_year'] == 2) {
                        echo "Second";
                    } else {
                        echo "Third";
                    }
                    ?>
                </p>
                <p><span>Subject</span><?= htmlspecialchars($assignment['subject']) ?></p>
                <p><span>Description</span><?= htmlspecialchars($assignment['description']) ?></p>
                <p><span>DueDate</span>
                    <?php
                    $due = new DateTime($assignment['due_date']);
                    echo $due->format('j M Y, H:i A');
                    ?>
                </p>
                <p><span>Owner</span><?= htmlspecialchars($assignment['full_name']) ?></p>
                <p><span>CreatedDate</span>
                    <?php
                    $due = new DateTime($assignment['created_date']);
                    echo $due->format('j M Y, H:i A');
                    ?>
                </p>
            </div>
        </div>

        <div class="table-container">
            <h3>Submissions</h3>
            <?php require __DIR__ . '/../../../common/flash_msg.php'; ?>

            <table>
                <tr>
                    <th>Student Roll</th>
                    <th>Student Name</th>
                    <th>Submission Date</th>
                    <th>Submit Type</th>
                    <th>Approval Status</th>
                    <th>Actions</th>
                </tr>

                <?php if (!$submissions) { ?>
                    <tr>
                        <td colspan="6">No Submissions are done yet!</td>
                    </tr>
                <?php } ?>

                <?php foreach ($submissions as $row) { ?>
                    <tr>
                        <td><?= htmlspecialchars($row['student_username']) ?></td>
                        <td><?= htmlspecialchars($row['student_name']) ?></td>
                        <td><?= htmlspecialchars($row['submit_date']) ?></td>
                        <td>
                            <?php
                            if (strtotime($row['submit_date']) > strtotime($assignment['due_date'])) {
                                echo 'Late';
                            } else {
                                echo 'On-Time';
                            }
                            ?>
                        </td>
                        <td><?= htmlspecialchars($row['approval_status']) ?></td>
                        <td>
                            <a class="btn btn-secondary" href="index.php?controller=faculty&action=viewFile&id=<?= $row['submission_id'] ?>" target="_blank">View Work</a>
                            <a class="btn btn-success" href="index.php?controller=faculty&action=approveSubmission&id=<?= $row['submission_id'] ?>">Approve</a>
                            <a class="btn btn-danger" href="index.php?controller=faculty&action=rejectSubmission&id=<?= $row['submission_id'] ?>" onclick="return confirm('Are you really want to reject the submission?')">Reject</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    <?php require __DIR__ . '/../../views/layout/footer.php'; ?>
</body>

</html>
