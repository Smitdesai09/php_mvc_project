<!DOCTYPE html>
<html>

<head>
    <title>Add User</title>
</head>

<body>
    <?php require __DIR__. '/../../views/layout/header.php'; ?>

    <h2>Add New User</h2>
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <label>Full Name:</label>
        <input type="text" name="full_name" required><br><br>

        <label>Target Year:</label>
        <input type="number" name="target_year"><br><br>

        <label>Role:</label>
        <select name="role">
            <option value="Admin">Admin</option>
            <option value="Faculty">Faculty</option>
            <option value="Student">Student</option>
        </select><br><br>

        <a href="index.php?controller=admin&action=listUsers">Go Back</a>
        <button type="submit">Create</button>
    </form>

    <?php require __DIR__. '/../../views/layout/footer.php'; ?>
</body>

</html>