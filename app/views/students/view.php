<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Assignment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
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
            gap: 30px;
        }

        /* Shared card design */
        .main,
        .upload-card {
            background: #fff;
            border: 1px solid #dcdcdc;
            border-radius: 10px;
            padding: 25px 30px;
            width: 100%;
            max-width: 700px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        /* Headings */
        h1 {
            text-align: center;
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 20px;
        }

        /* Back button */
        .button {
            display: inline-block;
            padding: 8px 14px;
            background-color: #2c3e50;
            color: #fff;
            border-radius: 6px;
            text-decoration: none;
            transition: background 0.2s;
        }

        .button:hover {
            background-color: #1a252f;
        }

        /* Assignment details */
        .detail {
            display: grid;
            gap: 10px;
        }

        .detail p {
            display: grid;
            grid-template-columns: 150px 1fr;
            padding: 6px 0;
            border-bottom: 1px solid #e2e2e2;
        }

        .detail span {
            font-weight: 600;
            color: #2c3e50;
        }

        /* Upload card */
        .upload-card {
            margin-bottom: 60px;
        }

        .upload-card h3 {
            text-align: center;
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 15px;
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

        /* File upload form */
        form {
            display: flex;
            align-items: center;
            flex-wrap: nowrap;
            justify-content: space-between;
            padding-top: 10px;
        }

        input[type="file"] {
            display: none;
        }

        .file-label,
        .button1 {
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            font-size: 1em;
            font-weight: 500;
            background-color: #fff;
            color: #2c3e50;
            border: 1px solid #2c3e50;
            transition: 0.2s;
            cursor: pointer;
        }

        .file-label:hover,
        .button1:hover {
            background-color: #2c3e50;
            color: #fff;
        }

        #file-selected {
            font-size: 0.9em;
            color: #2c3e50;
            flex-grow: 1;
            margin: 0 12px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* Responsive */


        @media (max-width: 700px) {
            form {
                flex-wrap: wrap;
                justify-content: center;
                gap: 10px;
            }

            .file-label,
            .button1 {
                flex: 1 1 auto;
                text-align: center;
            }

            #file-selected {
                width: 100%;
                text-align: center;
                order: 3;
            }
        }
    </style>

    <div class="container-wrap">
        <div class="main">
            <a href="index.php?controller=Student&action=list_assignment" class="button">
                <i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <h1>Assignment Details</h1>

            <div class="detail">
                <p><span>Title</span><?= htmlspecialchars($assignment['title']) ?></p>
                <p><span>Year</span>
                    <?php
                    if ($assignment['target_year'] == 1) echo "First";
                    elseif ($assignment['target_year'] == 2) echo "Second";
                    else echo "Third";
                    ?>
                </p>
                <p><span>Subject</span><?= htmlspecialchars($assignment['subject']) ?></p>
                <p><span>Description</span><?= htmlspecialchars($assignment['description']) ?></p>
                <p><span>Due Date</span><?= date("j M Y, H:i A", strtotime($assignment['due_date'])) ?></p>
                <p><span>Owner</span><?= htmlspecialchars($assignment['full_name']) ?></p>
                <p><span>Created</span><?= date("j M Y, H:i A", strtotime($assignment['created_date'])) ?></p>
            </div>
        </div>

        <div class="upload-card">
            <h3>Submit Your Work</h3>
            <?php require __DIR__ . '/../../../common/flash_msg.php'; ?>

            <form action="index.php?controller=Student&action=upload_assignment&id=<?= $assignment['assignment_id']; ?>" method="post" enctype="multipart/form-data">
                <label for="file" class="file-label">
                    <i class="fa-solid fa-upload"></i> Choose File
                </label>
                <input type="file" id="file" name="file">
                <span id="file-selected">No file chosen</span>
                <input type="submit" name="submit" class="button1" value="Upload">
            </form>
        </div>
    </div>

    <?php require __DIR__ . '/../../views/layout/footer.php'; ?>

    <script>
        const fileInput = document.getElementById('file');
        const fileSelected = document.getElementById('file-selected');

        fileInput.addEventListener('change', function() {
            fileSelected.textContent = fileInput.files.length > 0 ? fileInput.files[0].name : 'No file chosen';
        });
    </script>
</body>

</html>