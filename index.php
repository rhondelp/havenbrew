<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php?error=unauthorized");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HavenBrew | Your Daily Coffee Fix</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,800;1,400&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="Pictures/logo1.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="logopic">Haven<span>Brew</span></div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#Products">Menu</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#info">Info</a></li>
            <li><a href="#">About Us</a></li>
            <li>
                <?php if (isset($_SESSION["fullname"])): ?>
                    <span style="color: var(--primary-accent); font-weight: 500; margin-right: 10px;">
                        Hi, <?php echo htmlspecialchars($_SESSION["fullname"]); ?>
                    </span>
                <?php endif; ?>
                <button type="button" class="login-btn" onclick="confirmLogout()">Logout</button>
            </li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <header class="hero">
        <div class="hero-content">
            <h1>HavenBrew</h1>
            <h2>Your Daily Dose of <br><span>Happiness</span></h2>
            <a href="#Products" class="hero-btn">Explore Menu</a>
        </div>
    </header>

    <div class="section-divider"></div>

    <!-- Products Section -->
    <main class="P-container">
        <section class="Products" id="Products">
            <h2 class="section-title">Featured Brews</h2>
            <div class="product-grid">
                
                <div class="product-card">
                    <div class="product-image">
                        <img src="Pictures/c1.png" alt="Espresso Special">
                    </div>
                    <div class="product-info">
                        <h3>Espresso Roast</h3>
                        <p class="price">$3.99</p>
                    </div>
                    <button class="add-to-cart-btn">Add to Cart</button>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <img src="Pictures/c2.png" alt="Caramel Macchiato">
                    </div>
                    <div class="product-info">
                        <h3>Caramel Macchiato</h3>
                        <p class="price">$4.99</p>
                    </div>
                    <button class="add-to-cart-btn">Add to Cart</button>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <img src="Pictures/c3.png" alt="Hazelnut Latte">
                    </div>
                    <div class="product-info">
                        <h3>Hazelnut Latte</h3>
                        <p class="price">$5.99</p>
                    </div>
                    <button class="add-to-cart-btn">Add to Cart</button>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <img src="Pictures/c4.png" alt="Dark Mocha">
                    </div>
                    <div class="product-info">
                        <h3>Dark Mocha</h3>
                        <p class="price">$6.99</p>
                    </div>
                    <button class="add-to-cart-btn">Add to Cart</button>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <img src="Pictures/c1.png" alt="Classic Americano">
                    </div>
                    <div class="product-info">
                        <h3>Classic Americano</h3>
                        <p class="price">$3.99</p>
                    </div>
                    <button class="add-to-cart-btn">Add to Cart</button>
                </div>

            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer" id="info">
        <div class="footer-container">
            <div class="footer-brand">
                <div class="coffee-logo">☕</div>
                <h3>HAVENBREW</h3>
                <p>Bringing people together,<br>one cup at a time.</p>
            </div>

            <div class="footer-column">
                <h4>GET IN TOUCH</h4>
                <p>📍 Labuyo, Tangub City</p>
                <p>📞 09123456789</p>
                <p>✉️ brew.haven@gmail.com</p>
            </div>

            <div class="footer-column">
                <h4>OPENING HOURS</h4>
                <p><span>Weekdays:</span> 8:00 AM – 9:00 PM</p>
                <p><span>Saturdays:</span> 1:00 PM – 8:00 PM</p>
                <p><span>Sundays:</span> Closed</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 HavenBrew. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Use window explicitly to satisfy strict JavaScript / TypeScript linters
        const urlParams = new window.URLSearchParams(window.location.search);

        if (urlParams.has('login_success')) {
            Swal.fire({
                icon: 'success',
                title: 'Welcome Back!',
                text: 'Logged in successfully as <?php echo htmlspecialchars($_SESSION["fullname"] ?? "User"); ?>.',
                timer: 2200,
                showConfirmButton: false,
                background: '#1c1612',
                color: '#fefae0',
                iconColor: '#d4a373'
            });

            // Remove query parameters from address bar without reloading
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.pathname);
            }
        }

        // SweetAlert Confirmation prior to logging out
        function confirmLogout() {
            Swal.fire({
                title: 'Sign Out?',
                text: 'Are you sure you want to end your current session?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d4a373',
                cancelButtonColor: '#3a2e2b',
                confirmButtonText: 'Yes, Logout',
                cancelButtonText: 'Cancel',
                background: '#1c1612',
                color: '#fefae0'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'backend/logout.php';
                }
            });
        }
    </script>
</body>
</html>