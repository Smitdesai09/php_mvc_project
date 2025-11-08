<!DOCTYPE html>
<html>

<head>
    <title>Manage Users</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="bg-light">
    <?php require __DIR__ . '/../../views/layout/header.php'; ?>
    
    <div class="container my-5">
        <div class="bg-white rounded-4 shadow-sm p-5 mx-auto mb-5" style="max-width: 900px;">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold m-0 text-dark">Admin Panel</h2>
                <a type="button" class="btn btn-primary px-4" href="index.php?controller=admin&action=addUser">Add New User</a>
            </div>
            <?php require __DIR__ . '/../../../common/flash_msg.php'; ?>
            <hr>
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= $user['user_id'] ?></td>
                                <td><?= htmlspecialchars($user['username']) ?></td>
                                <td><?= htmlspecialchars($user['email']) ?></td>
                                <td><?= htmlspecialchars($user['full_name']) ?></td>
                                <td><?= htmlspecialchars($user['role']) ?></td>
                                <td>
                                    <a type="button" class="btn btn-sm btn-secondary" href="index.php?controller=admin&action=editUser&id=<?= $user['user_id'] ?>">Edit</a>
                                    <a type="button" class="btn btn-sm btn-danger" href="index.php?controller=admin&action=deleteUser&id=<?= $user['user_id'] ?>" onclick="return confirm('Delete this user?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php require __DIR__ . '/../../views/layout/footer.php'; ?>
</body>

</html>
