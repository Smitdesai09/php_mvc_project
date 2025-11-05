<!DOCTYPE html>
<html>

<head>
    <title>Add User</title>
</head>

<body>
    <a href="index.php?controller=admin&action=listUsers">&larr; Back</a>
    <br>
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

        <button type="submit">Create</button>
    </form>
</body>

</html>