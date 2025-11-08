<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add User - Assignment Tracker</title>
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
                        <h3 class="text-center text-primary mb-4">Add New User</h3>

                        <?php require __DIR__ . '/../../../common/flash_msg.php'; ?>
                        <form method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" id="username" name="username" class="form-control" placeholder="Enter username" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
                            </div>

                            <div class="mb-3">
                                <label for="full_name" class="form-label">Full Name</label>
                                <input type="text" id="full_name" name="full_name" class="form-control" placeholder="Enter full name" required>
                            </div>

                            <div class="mb-3">
                                <label for="target_year" class="form-label">Target Year</label>
                                <select id="target_year" name="target_year" class="form-select" required>
                                    <option value="">Select Year</option>
                                    <option value="1st Year">1st Year</option>
                                    <option value="2nd Year">2nd Year</option>
                                    <option value="3rd Year">3rd Year</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="role" class="form-label">Role</label>
                                <select id="role" name="role" class="form-select">
                                    <option value="Admin">Admin</option>
                                    <option value="Faculty">Faculty</option>
                                    <option value="Student">Student</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="index.php?controller=admin&action=listUsers" class="btn btn-secondary w-50 me-2">
                                    Go Back
                                </a>
                                <button type="submit" class="btn btn-success w-50">
                                    Create User
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
