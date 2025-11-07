<!DOCTYPE html>
<html>

<head>
    <title>Manage Users</title>
</head>

<body>
    <?php require __DIR__ . '/../../views/layout/header.php'; ?>

    <?php require __DIR__. '/../../../common/flash_msg.php'; ?>

    <h2 >Admin Panel</h2>
    <a type="button" class="btn btn-primary" href="index.php?controller=admin&action=addUser">Add New User</a>

    <hr>
    <table class="table table-striped table-hover">
        <thead>
            <tr class="table-dark">
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
                        <a type="button" class="btn btn-secondary" href="index.php?controller=admin&action=editUser&id=<?= $user['user_id'] ?>">Edit</a> |
                        <a type="button" class="btn btn-danger" href="index.php?controller=admin&action=deleteUser&id=<?= $user['user_id'] ?>" onclick="return confirm('Delete this user?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php require __DIR__. '/../../views/layout/footer.php'; ?>
</body>

</html>