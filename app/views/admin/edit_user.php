<!DOCTYPE html>
<html>

<head>
    <title>Edit User</title>
</head>

<body>
    <?php require __DIR__. '/../../views/layout/header.php'; ?>

    <h2>Edit User</h2>
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br><br>

        <label>Full Name:</label>
        <input type="text" name="full_name" value="<?= htmlspecialchars($user['full_name']) ?>" required><br><br>

        <label>Target Year:</label><input type="number" name="target_year" value="<?= htmlspecialchars($user['target_year']) ?>"><br><br>

        <label>Role:</label>
        <select name="role">
            <option value="Admin" <?= $user['role'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
            <option value="Faculty" <?= $user['role'] == 'Faculty' ? 'selected' : '' ?>>Faculty</option>
            <option value="Student" <?= $user['role'] == 'Student' ? 'selected' : '' ?>>Student</option>
        </select><br><br>

        <a href="index.php?controller=admin&action=listUsers">Go Back</a>
        <button type="submit">Update</button>
    </form>

    <?php require __DIR__. '/../../views/layout/footer.php'; ?>
</body>

</html>