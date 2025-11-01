<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
</head>
<body>

<?php include 'common/flash_msg.php'; ?>

<h2>Admin Panel</h2>


<a href="index.php?controller=admin&action=addUser">
    <button type="button">Add New User</button>
</a>
    
<a href="index.php?controller=auth&action=logout">
    <button type="button">Logout</button>
</a>


<hr>


<table border="1" cellpadding="6">
    <thead>
        <tr>
            <th>ID</th><th>Username</th><th>Email</th><th>Full Name</th><th>Role</th><th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user): ?>
        <tr>
            <td><?= $user['user_id'] ?></td>
            <td><?= htmlspecialchars($user['username']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td><?= htmlspecialchars($user['full_name']) ?></td>
            <td><?= htmlspecialchars($user['role']) ?></td>
            <td>
                <a href="index.php?controller=admin&action=editUser&id=<?= $user['user_id'] ?>">Edit</a> |
                <a href="index.php?controller=admin&action=deleteUser&id=<?= $user['user_id'] ?>" onclick="return confirm('Delete this user?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
