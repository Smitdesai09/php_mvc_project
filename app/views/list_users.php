<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
</head>
<body>
<h2>Admin Panel</h2>
<a href="index.php?controller=admin&action=addUser">Add New User</a>
<a href="index.php?controller=auth&action=logout">Logout</a>
<table border="1" cellpadding="6">
    <thead>
        <tr>
            <th>ID</th><th>Username</th><th>Email</th><th>Full Name</th><th>Role</th><th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $u): ?>
        <tr>
            <td><?= $u['user_id'] ?></td>
            <td><?= htmlspecialchars($u['username']) ?></td>
            <td><?= htmlspecialchars($u['email']) ?></td>
            <td><?= htmlspecialchars($u['full_name']) ?></td>
            <td><?= htmlspecialchars($u['role']) ?></td>
            <td>
                <a href="index.php?controller=admin&action=editUser&id=<?= $u['user_id'] ?>">Edit</a> |
                <a href="index.php?controller=admin&action=deleteUser&id=<?= $u['user_id'] ?>" onclick="return confirm('Delete this user?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
