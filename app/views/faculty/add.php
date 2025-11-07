<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Assignment - Assignment Tracker</title>
</head>

<body class="bg-light">
    <?php require __DIR__ . '/../../views/layout/header.php'; ?>
    <?php require __DIR__ . '/../../../common/flash_msg.php'; ?>

    <div class="container py-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4">
                        <h3 class="text-center text-primary mb-4">Add New Assignment</h3>

                        <form method="POST">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" id="title" name="title" class="form-control" 
                                       placeholder="Enter assignment title" required>
                            </div>

                            <div class="mb-3">
                                <label for="year" class="form-label">Year</label>
                                <select id="year" name="year" class="form-select" required>
                                    <option value="1" selected>First</option>
                                    <option value="2">Second</option>
                                    <option value="3">Third</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" id="subject" name="subject" class="form-control" 
                                       placeholder="Enter subject name" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control" rows="4"
                                          placeholder="Enter assignment description" required></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="due_date" class="form-label">Due Date</label>
                                <input type="datetime-local" id="due_date" name="due_date" class="form-control" required>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="index.php?controller=faculty&action=listAssignments" 
                                   class="btn btn-secondary w-50 me-2">
                                   Cancel
                                </a>
                                <button type="submit" class="btn btn-success w-50">
                                    Submit Assignment
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
