<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | HavenBrew</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;800&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="pictures/logo1.png">

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="auth-body">

    <div class="auth-container">
        <div class="auth-header">
            <a href="#" class="auth-logo">Haven<span>Brew</span></a>
            <h2>Welcome Back</h2>
            <p>Please enter your details to sign in</p>
        </div>

        <form action="backend/login_process.php" method="POST" class="auth-form">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="enter your email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
            </div>

            <button type="submit" class="auth-btn">Sign In</button>
        </form>

        <div class="auth-footer">
            <p>Don't have an account? <a href="register.php">Sign Up</a></p>
        </div>
    </div>

    <!-- SweetAlert Response Notifications -->
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        
        if (urlParams.has('registered')) {
            Swal.fire({
                icon: 'success',
                title: 'Registration Successful!',
                text: 'You can now log in with your credentials.',
                confirmButtonColor: '#d4a373'
            });
        }

        if (urlParams.has('error')) {
            const error = urlParams.get('error');
            let message = 'An error occurred. Please try again.';
            if (error === 'empty') message = 'Please fill in all required fields.';
            if (error === 'invalid') message = 'Invalid email address or password.';
            if (error === 'unauthorized') message = 'Please log in first to access HavenBrew.';

            Swal.fire({
                icon: 'error',
                title: 'Access Denied',
                text: message,
                confirmButtonColor: '#d4a373'
            });
        }

        if (urlParams.has('logged_out')) {
            Swal.fire({
                icon: 'info',
                title: 'Logged Out',
                text: 'You have been successfully logged out.',
                confirmButtonColor: '#d4a373'
            });
        }
    </script>

</body>
</html>