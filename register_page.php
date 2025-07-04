<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration - Birthday Event Portal</title>
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
                    <a href="register_page.php" class="nav-link active">Sign Up</a>
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
            <h1>Join Birthday Portal</h1>
            <p>Create your account to register for amazing birthday events</p>
        </div>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="form-container">
                <div style="text-align: center; margin-bottom: 2rem;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #ff6b6b, #ff8e53); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                        <i class="fas fa-user-plus" style="font-size: 2rem; color: white;"></i>
                    </div>
                    <h2>Create Your Account</h2>
                    <p style="color: #666;">Fill in your information to get started</p>
                </div>

                <form id="registerForm" data-form="register" method="POST" action="php/register.php">
                    <div class="form-group">
                        <label for="fullName">Full Name *</label>
                        <input type="text" id="fullName" name="full_name" required placeholder="Enter your full name">
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required placeholder="Enter your email address">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number *</label>
                        <input type="tel" id="phone" name="phone" pattern="01[0-9]{8,9}" maxlength="11" required placeholder="Enter your phone number">
                    </div>

                    <div class="form-group">
                        <label for="password">Password *</label>
                        <input type="password" id="password" name="password" required placeholder="Create a password">
                        <div style="font-size: 0.8rem; color: #666; margin-top: 0.5rem;">
                            Password must be at least 8 characters and include uppercase, lowercase, and number
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password *</label>
                        <input type="password" id="confirmPassword" name="confirm_password" required placeholder="Confirm your password">
                    </div>

                    <div class="form-group">
                        <label for="dateOfBirth">Date of Birth</label>
                        <input type="date" id="dateOfBirth" name="date_of_birth">
                    </div>

                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" placeholder="Enter your city">
                    </div>

                    <div class="form-group">
                        <label for="interests">Party Interests</label>
                        <select id="interests" name="interests">
                            <option value="">Select your interest</option>
                            <option value="Kids Parties">Kids Parties (Ages 4-12)</option>
                            <option value="Teen Parties">Teen Parties (Ages 13-17)</option>
                            <option value="Adult Birthdays">Adult Birthdays</option>
                            <option value="Milestone Birthdays">Milestone Birthdays (18th, 21st, 30th, etc.)</option>
                            <option value="Theme Parties">Theme Parties</option>
                            <option value="Corporate Events">Corporate Birthday Events</option>
                            <option value="All Events">All Types of Events</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label style="display: flex; align-items: center; gap: 10px;">
                            <input type="checkbox" name="newsletter" value="1">
                            <span>Subscribe to our newsletter for event updates and party planning tips</span>
                        </label>
                    </div>

                    <div class="form-group">
                        <label style="display: flex; align-items: center; gap: 10px;">
                            <input type="checkbox" name="terms_agreed" required>
                            <span>I agree to the <a href="terms.php" target="_blank" style="color: #ff6b6b;">Terms of Service</a> and <a href="privacy.php" target="_blank" style="color: #ff6b6b;">Privacy Policy</a> *</span>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-full">
                        <i class="fas fa-user-plus"></i> Create Account
                    </button>
                </form>

                <div style="text-align: center; margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #e1e8ed;">
                    <p>Already have an account? <a href="login_page.php" style="color: #ff6b6b; font-weight: 500;">Sign in here</a></p>
                </div>

                <div style="text-align: center; margin-top: 1rem;">
                    <p>Want to organize events? <a href="organizer_login.php" style="color: #ff6b6b; font-weight: 500;">Become an organizer</a></p>
                </div>
            </div>

            <!-- Benefits Section -->
            <div style="margin-top: 4rem;">
                <h2 style="text-align: center; margin-bottom: 3rem;">Why Join Birthday Portal?</h2>
                <div class="features-grid" style="max-width: 800px; margin: 0 auto;">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h3>Easy Event Registration</h3>
                        <p>Register for birthday events with just a few clicks and manage all your bookings from one place.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-bell"></i>
                        </div>
                        <h3>Event Notifications</h3>
                        <p>Get notified about new events in your area and reminders about upcoming celebrations you've registered for.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3>Exclusive Access</h3>
                        <p>Access to member-only events, early bird discounts, and special party planning resources.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Community Connection</h3>
                        <p>Connect with other families and party enthusiasts in your local community.</p>
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
        // Additional validation for registration form
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            if (password !== confirmPassword) {
                e.preventDefault();
                showMessage('Passwords do not match.', 'error');
                return;
            }
            
            if (!validatePassword(password)) {
                e.preventDefault();
                showMessage('Password must be at least 8 characters and include uppercase, lowercase, and number.', 'error');
                return;
            }
        });

        // Real-time password validation
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const isValid = validatePassword(password);
            const helpText = this.parentNode.querySelector('div');
            
            if (password.length > 0) {
                helpText.style.color = isValid ? '#28a745' : '#dc3545';
                helpText.innerHTML = isValid ? 
                    '<i class="fas fa-check"></i> Password meets requirements' : 
                    'Password must be at least 8 characters and include uppercase, lowercase, and number';
            } else {
                helpText.style.color = '#666';
                helpText.innerHTML = 'Password must be at least 8 characters and include uppercase, lowercase, and number';
            }
        });

        function validatePassword(password) {
            const minLength = 8;
            const hasUpperCase = /[A-Z]/.test(password);
            const hasLowerCase = /[a-z]/.test(password);
            const hasNumbers = /\d/.test(password);
            
            return password.length >= minLength && hasUpperCase && hasLowerCase && hasNumbers;
        }
    </script>
</body>
</html>
