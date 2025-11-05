
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Tracker</title>
</head>
<body>

    <h1>Login Form</h1><br>

    <form method="post">

       <label>Enter Email:</label><br>
        <input type="email" name="email" placeholder="E-email" required><br><br>

        <label>Enter Password:</label><br>
        <input type="password" name="password" placeholder="Password" required><br><br>

        <button type="submit">Login</button>
        <button type="reset">Reset</button>

    </form>
    <br>

    <?php include 'common/flash_msg.php'; ?>
</body>
</html>