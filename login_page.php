<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login - Birthday Event Portal</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Navigation Menu -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <i class="fas fa-birthday-cake"></i>
                <span>Birthday Portal</span>
            </div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="events.php" class="nav-link">Events</a>
                </li>
                <li class="nav-item">
                    <a href="login_page.php" class="nav-link active">Login</a>
                </li>
                <li class="nav-item">
                    <a href="register_page.php" class="nav-link">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a href="organizer_login.php" class="nav-link">Organizer</a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1>Welcome Back</h1>
            <p>Sign in to access your birthday event dashboard</p>
        </div>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="form-container">
                <div style="text-align: center; margin-bottom: 2rem;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #ff6b6b, #ff8e53); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                        <i class="fas fa-sign-in-alt" style="font-size: 2rem; color: white;"></i>
                    </div>
                    <h2>Sign In to Your Account</h2>
                    <p style="color: #666;">Enter your credentials to continue</p>
                </div>

                <form id="loginForm" data-form="login" method="POST" action="php/login.php">
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required placeholder="Enter your email address" autocomplete="email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password *</label>
                        <div style="position: relative;">
                            <input type="password" id="password" name="password" required placeholder="Enter your password" autocomplete="current-password">
                            <button type="button" id="togglePassword" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); background: none; border: none; color: #666; cursor: pointer;">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label style="display: flex; align-items: center; gap: 10px;">
                            <input type="checkbox" name="remember_me" value="1">
                            <span>Remember me for 30 days</span>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-full">
                        <i class="fas fa-sign-in-alt"></i> Sign In
                    </button>
                </form>

                <div style="text-align: center; margin-top: 2rem;">
                    <a href="forgot_password.php" style="color: #ff6b6b; text-decoration: none;">
                        <i class="fas fa-key"></i> Forgot your password?
                    </a>
                </div>

                <div style="text-align: center; margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #e1e8ed;">
                    <p>Don't have an account yet? <a href="register_page.php" style="color: #ff6b6b; font-weight: 500;">Create account</a></p>
                </div>

                <div style="text-align: center; margin-top: 1rem;">
                    <p>Are you an event organizer? <a href="organizer_login.php" style="color: #ff6b6b; font-weight: 500;">Organizer Login</a></p>
                </div>
            </div>

            <!-- Demo Credentials Section -->
            <div class="dashboard-section" style="max-width: 500px; margin: 3rem auto 0;">
                <h3 style="text-align: center; margin-bottom: 1.5rem; color: #ff6b6b;">Demo Credentials</h3>
                <p style="text-align: center; margin-bottom: 1.5rem; color: #666;">Use these credentials to test the application:</p>
                
                <div style="display: grid; gap: 1rem;">
                    <div style="background: #f8f9fa; padding: 1rem; border-radius: 8px; border-left: 4px solid #ff6b6b;">
                        <h4 style="margin: 0 0 0.5rem 0; color: #333;">Demo User Account</h4>
                        <p style="margin: 0; font-family: monospace; color: #666;">
                            Email: user@demo.com<br>
                            Password: Demo123!
                        </p>
                        <button onclick="fillDemoCredentials('user')" class="btn btn-secondary" style="margin-top: 0.5rem; padding: 5px 15px; font-size: 0.9rem;">
                            Fill Credentials
                        </button>
                    </div>
                    
                    <div style="background: #f8f9fa; padding: 1rem; border-radius: 8px; border-left: 4px solid #28a745;">
                        <h4 style="margin: 0 0 0.5rem 0; color: #333;">Demo Admin Account</h4>
                        <p style="margin: 0; font-family: monospace; color: #666;">
                            Email: admin@demo.com<br>
                            Password: Admin123!
                        </p>
                        <button onclick="fillDemoCredentials('admin')" class="btn btn-secondary" style="margin-top: 0.5rem; padding: 5px 15px; font-size: 0.9rem;">
                            Fill Credentials
                        </button>
                    </div>
                </div>
            </div>

            <!-- Security Notice -->
            <div style="max-width: 500px; margin: 2rem auto; padding: 1rem; background: #e8f5e8; border-radius: 8px; text-align: center;">
                <i class="fas fa-shield-alt" style="color: #28a745; margin-right: 8px;"></i>
                <small style="color: #2d5a2d;">Your data is protected with industry-standard encryption and security measures.</small>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="footer-logo">
                        <i class="fas fa-birthday-cake"></i>
                        <span>Birthday Portal</span>
                    </div>
                    <p>Making every birthday celebration special and memorable.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="events.php">Events</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>For Organizers</h3>
                    <ul>
                        <li><a href="organizer_login.php">Organizer Login</a></li>
                        <li><a href="become_organizer.php">Become Organizer</a></li>
                        <li><a href="guidelines.php">Guidelines</a></li>
                        <li><a href="support.php">Support</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Contact Info</h3>
                    <p><i class="fas fa-phone"></i> +60 111 635-5032</p>
                    <p><i class="fas fa-envelope"></i> info@birthdayportal.com</p>
                    <p><i class="fas fa-map-marker-alt"></i> 123 Party Street, Kuala Lumpur City</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Birthday Portal. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="js/script.js"></script>
    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Fill demo credentials function
        function fillDemoCredentials(type) {
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            
            if (type === 'user') {
                emailInput.value = 'user@demo.com';
                passwordInput.value = 'Demo123!';
            } else if (type === 'admin') {
                emailInput.value = 'admin@demo.com';
                passwordInput.value = 'Admin123!';
            }
            
            // Add visual feedback
            showMessage('Demo credentials filled successfully!', 'success');
        }

        // Auto-focus email field
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('email').focus();
        });
    </script>
</body>
</html>
