<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Assignment - Assignment Tracker</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="bg-light">
    <?php require __DIR__ . '/../../views/layout/header.php'; ?>
    

    <div class="container py-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4">
                        <h3 class="text-center text-primary mb-4">Edit Assignment</h3>
                        
                        <?php require __DIR__ . '/../../../common/flash_msg.php'; ?>
                        <form method="POST">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" id="title" name="title" class="form-control"
                                       value="<?= htmlspecialchars($row['title']) ?>"
                                       placeholder="Enter assignment title" required>
                            </div>

                            <div class="mb-3">
                                <label for="year" class="form-label">Year</label>
                                <select id="year" name="year" class="form-select" required>
                                    <option value="1" <?= $row['target_year'] == 1 ? 'selected' : '' ?>>First</option>
                                    <option value="2" <?= $row['target_year'] == 2 ? 'selected' : '' ?>>Second</option>
                                    <option value="3" <?= $row['target_year'] == 3 ? 'selected' : '' ?>>Third</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" id="subject" name="subject" class="form-control"
                                       value="<?= htmlspecialchars($row['subject']) ?>"
                                       placeholder="Enter subject name" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" rows="4" class="form-control"
                                          placeholder="Enter assignment description"
                                          required><?= htmlspecialchars($row['description']) ?></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="due_date" class="form-label">Due Date</label>
                                <input type="datetime-local" id="due_date" name="due_date" class="form-control"
                                       value="<?= htmlspecialchars(date('Y-m-d\TH:i', strtotime($row['due_date']))) ?>" required>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="index.php?controller=faculty&action=listAssignments" class="btn btn-secondary w-50 me-2">
                                    Go Back
                                </a>
                                <button type="submit" class="btn btn-success w-50">
                                    Update Assignment
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require __DIR__ . '/../../views/layout/footer.php'; ?>
</body>
</html>
