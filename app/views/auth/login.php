<?php include __DIR__ . '/../../../public/bootstrap.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Tracker - Login</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow-lg p-4" style="width: 400px; border-radius: 1rem;">
        <h3 class="text-center mb-4 text-primary">Assignment Tracker</h3>
        <h5 class="text-center mb-4">Login</h5>

        <form method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Enter Email</label>
                <input 
                    type="email" 
                    class="form-control" 
                    id="email" 
                    name="email" 
                    placeholder="E-mail" 
                    required
                >
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Enter Password</label>
                <div class="input-group">
                    <input 
                        type="password" 
                        class="form-control" 
                        id="password" 
                        name="password" 
                        placeholder="Password" 
                        required
                    >
                    <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                        <i class="bi bi-eye-fill"></i>
                    </span>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success w-50 me-2">Login</button>
                <button type="reset" class="btn btn-secondary w-50">Reset</button>
            </div>
        </form>

            <?php include 'common/flash_msg.php'; ?>
        
    </div>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    const icon = togglePassword.querySelector('i');

    togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        
       
        icon.classList.toggle('bi-eye-fill');
        icon.classList.toggle('bi-eye-slash-fill');
    });
</script>

</body>
</html>