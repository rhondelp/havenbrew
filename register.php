<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | HavenBrew</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;800&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="Pictures/logo1.png">

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="auth-body">

    <div class="auth-container">
        <div class="auth-header">
            <a href="login.php" class="auth-logo">Haven<span>Brew</span></a>
            <h2>Create Account</h2>
            <p>Join us and enjoy your daily brew privileges</p>
        </div>

        <form action="backend/register_process.php" method="POST" class="auth-form">
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" name="fullname" placeholder="John Doe" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="enter your email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
            </div>

            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm_password" placeholder="••••••••" required>
            </div>

            <button type="submit" class="auth-btn">Create Account</button>
        </form>

        <div class="auth-footer">
            <p>Already have an account? <a href="login.php">Sign In</a></p>
        </div>
    </div>

    <!-- SweetAlert Response Notifications -->
    <script>
        const urlParams = new window.URLSearchParams(window.location.search);
        
        if (urlParams.has('error')) {
            const error = urlParams.get('error');
            let message = 'An error occurred during registration.';
            if (error === 'empty') message = 'Please fill in all fields.';
            if (error === 'mismatch') message = 'Passwords do not match!';
            if (error === 'exists') message = 'This email is already registered!';

            Swal.fire({
                icon: 'error',
                title: 'Registration Failed',
                text: message,
                confirmButtonColor: '#d4a373',
                background: '#1c1612',
                color: '#fefae0'
            });

            // Clean the URL query parameters without reloading
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.pathname);
            }
        }
    </script>

</body>
</html>