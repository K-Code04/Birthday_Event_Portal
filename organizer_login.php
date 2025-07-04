<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizer Login - Birthday Event Portal</title>
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
                    <a href="login_page.php" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                    <a href="register_page.php" class="nav-link">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a href="organizer_login.php" class="nav-link active">Organizer</a>
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
            <h1>Event Organizer Portal</h1>
            <p>Manage your birthday events and attendee registrations</p>
        </div>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="form-container">
                <div style="text-align: center; margin-bottom: 2rem;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #28a745, #20c997); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                        <i class="fas fa-user-tie" style="font-size: 2rem; color: white;"></i>
                    </div>
                    <h2>Organizer Sign In</h2>
                    <p style="color: #666;">Access your event management dashboard</p>
                </div>

                <form id="organizerLoginForm" data-form="organizer_login" method="POST" action="php/organizer_login.php">
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required placeholder="Enter your registered email" autocomplete="email">
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
                            <span>Keep me signed in for 30 days</span>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-full">
                        <i class="fas fa-sign-in-alt"></i> Sign In to Dashboard
                    </button>
                </form>

                <div style="text-align: center; margin-top: 2rem;">
                    <a href="forgot_password.php" style="color: #28a745; text-decoration: none;">
                        <i class="fas fa-key"></i> Forgot your password?
                    </a>
                </div>

                <div style="text-align: center; margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #e1e8ed;">
                    <p>Not an organizer yet? <a href="become_organizer.php" style="color: #28a745; font-weight: 500;">Apply to become an organizer</a></p>
                </div>

                <div style="text-align: center; margin-top: 1rem;">
                    <p>Looking for user login? <a href="login_page.php" style="color: #ff6b6b; font-weight: 500;">User Login</a></p>
                </div>
            </div>

            <!-- Demo Credentials Section -->
            <div class="dashboard-section" style="max-width: 500px; margin: 3rem auto 0;">
                <h3 style="text-align: center; margin-bottom: 1.5rem; color: #28a745;">Demo Organizer Credentials</h3>
                <p style="text-align: center; margin-bottom: 1.5rem; color: #666;">Use these credentials to test the organizer dashboard:</p>
                
                <div style="background: #f8f9fa; padding: 1rem; border-radius: 8px; border-left: 4px solid #28a745;">
                    <h4 style="margin: 0 0 0.5rem 0; color: #333;">Demo Organizer Account</h4>
                    <p style="margin: 0; font-family: monospace; color: #666;">
                        Email: organizer@demo.com<br>
                        Password: Organizer123!
                    </p>
                    <button onclick="fillOrganizerCredentials()" class="btn btn-secondary" style="margin-top: 0.5rem; padding: 5px 15px; font-size: 0.9rem;">
                        Fill Credentials
                    </button>
                </div>
            </div>

            <!-- Organizer Benefits -->
            <div style="margin-top: 4rem;">
                <h2 style="text-align: center; margin-bottom: 3rem;">Why Organize Events on Birthday Portal?</h2>
                <div class="features-grid" style="max-width: 800px; margin: 0 auto;">
                    <div class="feature-card">
                        <div class="feature-icon" style="background: linear-gradient(135deg, #28a745, #20c997);">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Reach More Families</h3>
                        <p>Connect with families looking for birthday party services in your area through our platform.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon" style="background: linear-gradient(135deg, #28a745, #20c997);">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Manage Events Easily</h3>
                        <p>Comprehensive dashboard to create, update, and track your events and attendee registrations.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon" style="background: linear-gradient(135deg, #28a745, #20c997);">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <h3>Secure Payments</h3>
                        <p>Integrated payment processing and financial reporting for all your birthday events.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon" style="background: linear-gradient(135deg, #28a745, #20c997);">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3>Dedicated Support</h3>
                        <p>Get priority support and resources to help you succeed as a birthday event organizer.</p>
                    </div>
                </div>
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
                    <p><i class="fas fa-phone"></i> +60 635-5032</p>
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
        function fillOrganizerCredentials() {
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            
            emailInput.value = 'organizer@demo.com';
            passwordInput.value = 'Organizer123!';
            
            showMessage('Demo organizer credentials filled successfully!', 'success');
        }

        // Auto-focus email field
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('email').focus();
        });



//Organizer Login With Fetch

document.getElementById('organizerLoginForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const form = e.target;
    const email = form.email.value;
    const password = form.password.value;
    const remember_me = form.remember_me.checked ? 1 : 0;

    try {
        const res = await fetch('php/organizer_login.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                email,
                password,
                remember_me
            })
        });

        const data = await res.json();

        if (data.success) {
            alert('Login successful!');
            // Save token or redirect to dashboard
            window.location.href = 'organizer_dashboard.php'; // change to your actual dashboard
        } else {
            alert(data.message || 'Login failed.');
        }
    } catch (err) {
        alert('Server error. Please try again.');
        console.error(err);
    }
});
    </script>
</body>
</html>
