<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
    <?php require __DIR__ . '/../../views/layout/header.php'; ?>

    <?php require __DIR__ . '/../../../common/flash_msg.php'; ?>

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
            /* gap: 20px; */
            flex-wrap: wrap;
            padding: 30px 0;
        }

        .main {
            background: #ffffff;
            border: 1px solid black;
            border-radius: 8px;
            padding: 10px 20px;
            width: 500px;
            box-shadow: 5px 8px 10px rgba(0, 0, 0, 0.8);
           margin-bottom: 1.3vh;
        }
        .uplode{
            background: #ffffff;
            border: 1px solid black;
            border-radius: 8px;
            padding: 15px 20px;
            width: 500px;
            box-shadow: 5px 8px 10px rgba(0, 0, 0, 0.8);
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
            padding: 5px 10px;
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
            color:white;
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
             display: flex;
        align-items: center;
        /* gap: 10px; space between elements */
        flex-wrap: nowrap; /* keep all elements in one line */
            padding-top: 10px;
        }

        input[type="file"] {
            display: none;
        }
        input[type="submit"].button1 {
            margin: 0;
            flex-shrink: 0; /* prevent shrinking */
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
            flex-shrink: 0; /* prevent shrinking */
            margin-right:18vh;
        }
        #file-selected {
            font-size: 1em;
            color: darkgreen;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            max-width: 200px; /* adjust width as needed */
        }

        .file-label:hover {
            transition: 0.5s ease-out;
            background-color: darkgreen;
            color: white;
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
            <a href="index.php?controller=Student&action=list_assignment" class="button"><i class="fa-solid fa-arrow-left"></i> Back</a>
            <h1>Assignment Detail</h1>

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
                <p> <span>DueDate </span><?= date("M j", strtotime(htmlspecialchars($assignment['due_date']))) ?></p>
                <p><span>Owner</span> <?= htmlspecialchars($assignment['full_name']) ?></p>
                <p><span>CreatedDate </span> <?= date("M j", strtotime(htmlspecialchars($assignment['created_date']))) ?></p>
            </div>
        </div>
        <div class="uplode">
             <form action="index.php?controller=Student&action=upload_assignment&id=<?= $assignment['assignment_id']; ?>" method="post" enctype="multipart/form-data">
                <label for="file" class="file-label">
                    <i class="fa-solid fa-upload"></i>
                    <span id="file-name">Choose File</span>
                </label>
                <input type="file" id="file" name="file">
                 <span id="file-selected"></span>
                <input type="submit" name="submit" class="button1">
            </form>
        </div>
    </div>

                                    
    <?php require __DIR__ . '/../../views/layout/footer.php'; ?>
    <script>
        const fileInput = document.getElementById('file');
    const fileSelected = document.getElementById('file-selected');

    fileInput.addEventListener('change', function() {
        if (fileInput.files.length > 0) {
            fileSelected.textContent = fileInput.files[0].name; // show file next to label
        } else {
            fileSelected.textContent = 'No file chosen';
        }
});
</script>
</body>

</html>