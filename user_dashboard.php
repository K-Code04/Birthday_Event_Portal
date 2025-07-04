<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Birthday Event Portal</title>
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
                    <a href="user_dashboard.php" class="nav-link active">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link" onclick="logout()">Logout</a>
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
            <h1>Welcome Back, <span id="userName">Sarah</span>!</h1>
            <p>Manage your birthday event registrations and discover new celebrations</p>
        </div>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Quick Stats -->
            <div class="stats-grid" style="margin-bottom: 3rem;">
                <div class="stat-item" style="background: white; padding: 2rem; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); text-align: center;">
                    <div class="stat-number" style="color: #ff6b6b;">3</div>
                    <div class="stat-label" style="color: #333;">Registered Events</div>
                </div>
                <div class="stat-item" style="background: white; padding: 2rem; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); text-align: center;">
                    <div class="stat-number" style="color: #28a745;">2</div>
                    <div class="stat-label" style="color: #333;">Confirmed</div>
                </div>
                <div class="stat-item" style="background: white; padding: 2rem; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); text-align: center;">
                    <div class="stat-number" style="color: #ffc107;">1</div>
                    <div class="stat-label" style="color: #333;">Waiting List</div>
                </div>
                <div class="stat-item" style="background: white; padding: 2rem; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); text-align: center;">
                    <div class="stat-number" style="color: #17a2b8;">5</div>
                    <div class="stat-label" style="color: #333;">Events Attended</div>
                </div>
            </div>

            <!-- My Registered Events -->
            <div class="dashboard-section">
                <div class="dashboard-header">
                    <h2>My Registered Events</h2>
                    <a href="events.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Find More Events
                    </a>
                </div>

                <div id="registeredEvents">
                    <!-- Event Registration 1 -->
                    <div class="event-registration" style="border: 1px solid #e1e8ed; border-radius: 12px; padding: 1.5rem; margin-bottom: 1.5rem; background: white;">
                        <div style="display: grid; grid-template-columns: 1fr auto; gap: 2rem; align-items: start;">
                            <div>
                                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                                    <h3 style="margin: 0; color: #333;">Magical Princess Birthday Party</h3>
                                    <span class="status-badge status-confirmed">Confirmed</span>
                                </div>
                                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; color: #666;">
                                    <div>
                                        <i class="fas fa-calendar" style="color: #ff6b6b; margin-right: 8px;"></i>
                                        <span>July 15, 2025 - 2:00 PM</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-map-marker-alt" style="color: #ff6b6b; margin-right: 8px;"></i>
                                        <span>Rainbow Community Center</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-user" style="color: #ff6b6b; margin-right: 8px;"></i>
                                        <span>Sarah's Event Planning</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-child" style="color: #ff6b6b; margin-right: 8px;"></i>
                                        <span>Emma (Age 6)</span>
                                    </div>
                                </div>
                                <p style="margin-top: 1rem; color: #666;">Registration confirmed for 1 child. Please arrive 15 minutes early for check-in.</p>
                            </div>
                            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                                <a href="event_details.php?id=1" class="btn btn-secondary" style="text-decoration: none; white-space: nowrap;">
                                    <i class="fas fa-eye"></i> View Details
                                </a>
                                <button class="btn btn-outline" onclick="cancelRegistration(1)" style="border: 1px solid #dc3545; color: #dc3545; background: white;">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Event Registration 2 -->
                    <div class="event-registration" style="border: 1px solid #e1e8ed; border-radius: 12px; padding: 1.5rem; margin-bottom: 1.5rem; background: white;">
                        <div style="display: grid; grid-template-columns: 1fr auto; gap: 2rem; align-items: start;">
                            <div>
                                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                                    <h3 style="margin: 0; color: #333;">Teen Gaming Birthday Tournament</h3>
                                    <span class="status-badge status-confirmed">Confirmed</span>
                                </div>
                                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; color: #666;">
                                    <div>
                                        <i class="fas fa-calendar" style="color: #ff6b6b; margin-right: 8px;"></i>
                                        <span>Semptember 25, 2025 - 4:00 PM</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-map-marker-alt" style="color: #ff6b6b; margin-right: 8px;"></i>
                                        <span>Tech Arena, Bandar Saujana Putra</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-user" style="color: #ff6b6b; margin-right: 8px;"></i>
                                        <span>GameZone Events</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-child" style="color: #ff6b6b; margin-right: 8px;"></i>
                                        <span>Alex (Age 14)</span>
                                    </div>
                                </div>
                                <p style="margin-top: 1rem; color: #666;">Gaming tournament registration confirmed. Bring your own controller if preferred.</p>
                            </div>
                            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                                <a href="event_details.php?id=3" class="btn btn-secondary" style="text-decoration: none; white-space: nowrap;">
                                    <i class="fas fa-eye"></i> View Details
                                </a>
                                <button class="btn btn-outline" onclick="cancelRegistration(3)" style="border: 1px solid #dc3545; color: #dc3545; background: white;">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Event Registration 3 -->
                    <div class="event-registration" style="border: 1px solid #e1e8ed; border-radius: 12px; padding: 1.5rem; margin-bottom: 1.5rem; background: white;">
                        <div style="display: grid; grid-template-columns: 1fr auto; gap: 2rem; align-items: start;">
                            <div>
                                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                                    <h3 style="margin: 0; color: #333;">Unicorn Theme Birthday Extravaganza</h3>
                                    <span class="status-badge status-waiting">Waiting List</span>
                                </div>
                                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; color: #666;">
                                    <div>
                                        <i class="fas fa-calendar" style="color: #ff6b6b; margin-right: 8px;"></i>
                                        <span>October 1, 2025 - 1:00 PM</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-map-marker-alt" style="color: #ff6b6b; margin-right: 8px;"></i>
                                        <span>Fairy Tale Gardens, Putra Jaya</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-user" style="color: #ff6b6b; margin-right: 8px;"></i>
                                        <span>Dream Party Planners</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-child" style="color: #ff6b6b; margin-right: 8px;"></i>
                                        <span>Sophie (Age 5)</span>
                                    </div>
                                </div>
                                <p style="margin-top: 1rem; color: #666;">You are #3 on the waiting list. We'll notify you if a spot becomes available.</p>
                            </div>
                            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                                <a href="event_details.php?id=4" class="btn btn-secondary" style="text-decoration: none; white-space: nowrap;">
                                    <i class="fas fa-eye"></i> View Details
                                </a>
                                <button class="btn btn-outline" onclick="cancelRegistration(4)" style="border: 1px solid #dc3545; color: #dc3545; background: white;">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="dashboard-section">
                <div class="dashboard-header">
                    <h2>Recent Activity</h2>
                </div>

                <div class="activity-list">
                    <div style="display: flex; align-items: center; gap: 1rem; padding: 1rem; border-bottom: 1px solid #f1f3f4;">
                        <div style="width: 40px; height: 40px; background: #e8f5e8; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-check" style="color: #28a745;"></i>
                        </div>
                        <div style="flex: 1;">
                            <p style="margin: 0; font-weight: 500;">Registration confirmed for Teen Gaming Birthday Tournament</p>
                            <p style="margin: 0; color: #666; font-size: 0.9rem;">Semptember 27, 2025 at 3:20 PM</p>
                        </div>
                    </div>

                    <div style="display: flex; align-items: center; gap: 1rem; padding: 1rem; border-bottom: 1px solid #f1f3f4;">
                        <div style="width: 40px; height: 40px; background: #fff3cd; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-clock" style="color: #856404;"></i>
                        </div>
                        <div style="flex: 1;">
                            <p style="margin: 0; font-weight: 500;">Added to waiting list for Unicorn Theme Birthday Extravaganza</p>
                            <p style="margin: 0; color: #666; font-size: 0.9rem;">October 8, 2025 at 11:45 AM</p>
                        </div>
                    </div>

                    <div style="display: flex; align-items: center; gap: 1rem; padding: 1rem; border-bottom: 1px solid #f1f3f4;">
                        <div style="width: 40px; height: 40px; background: #e8f5e8; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-calendar-plus" style="color: #28a745;"></i>
                        </div>
                        <div style="flex: 1;">
                            <p style="margin: 0; font-weight: 500;">Successfully registered for Magical Princess Birthday Party</p>
                            <p style="margin: 0; color: #666; font-size: 0.9rem;">July 17, 2025 at 2:15 PM</p>
                        </div>
                    </div>

                    <div style="display: flex; align-items: center; gap: 1rem; padding: 1rem;">
                        <div style="width: 40px; height: 40px; background: #d1ecf1; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-user-plus" style="color: #0c5460;"></i>
                        </div>
                        <div style="flex: 1;">
                            <p style="margin: 0; font-weight: 500;">Account created successfully</p>
                            <p style="margin: 0; color: #666; font-size: 0.9rem;">July 3, 2025 at 10:30 AM</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Management -->
            <div class="dashboard-section">
                <div class="dashboard-header">
                    <h2>Profile Management</h2>
                    <button class="btn btn-secondary" onclick="editProfile()">
                        <i class="fas fa-edit"></i> Edit Profile
                    </button>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
                    <div>
                        <h4 style="color: #ff6b6b; margin-bottom: 1rem;">Personal Information</h4>
                        <div style="display: grid; gap: 0.5rem;">
                            <div><strong>Name:</strong> Sarah Johnson</div>
                            <div><strong>Email:</strong> sarah.johnson@email.com</div>
                            <div><strong>Phone:</strong> 0111 635-5032</div>
                            <div><strong>City:</strong> Kuala Lumpur, KL</div>
                        </div>
                    </div>
                    <div>
                        <h4 style="color: #ff6b6b; margin-bottom: 1rem;">Preferences</h4>
                        <div style="display: grid; gap: 0.5rem;">
                            <div><strong>Interests:</strong> Kids Parties, Theme Parties</div>
                            <div><strong>Newsletter:</strong> Subscribed</div>
                            <div><strong>Notifications:</strong> Email & SMS</div>
                            <div><strong>Member Since:</strong> July 2025</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="dashboard-section">
                <h2>Quick Actions</h2>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                    <a href="events.php" class="btn btn-primary" style="text-decoration: none; text-align: center; padding: 1.5rem;">
                        <i class="fas fa-search" style="display: block; font-size: 2rem; margin-bottom: 0.5rem;"></i>
                        Browse Events
                    </a>
                    <button class="btn btn-secondary" onclick="viewEventHistory()" style="text-align: center; padding: 1.5rem;">
                        <i class="fas fa-history" style="display: block; font-size: 2rem; margin-bottom: 0.5rem;"></i>
                        Event History
                    </button>
                    <button class="btn btn-secondary" onclick="manageNotifications()" style="text-align: center; padding: 1.5rem;">
                        <i class="fas fa-bell" style="display: block; font-size: 2rem; margin-bottom: 0.5rem;"></i>
                        Notifications
                    </button>
                    <button class="btn btn-secondary" onclick="contactSupport()" style="text-align: center; padding: 1.5rem;">
                        <i class="fas fa-headset" style="display: block; font-size: 2rem; margin-bottom: 0.5rem;"></i>
                        Support
                    </button>
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
        // Dashboard specific JavaScript functions

        function cancelRegistration(eventId) {
            if (confirm('Are you sure you want to cancel your registration for this event?')) {
                // In a real application, this would make an API call
                showMessage('Registration cancelled successfully. You will receive a confirmation email.', 'success');
                
                // Remove the event registration from display
                setTimeout(() => {
                    location.reload();
                }, 2000);
            }
        }

        function editProfile() {
            showMessage('Profile editing feature coming soon!', 'info');
        }

        function viewEventHistory() {
            showMessage('Event history feature coming soon!', 'info');
        }

        function manageNotifications() {
            showMessage('Notification settings feature coming soon!', 'info');
        }

        function contactSupport() {
            window.open('mailto:support@birthdayportal.com?subject=Support Request', '_blank');
        }

        // Load user data on page load
        document.addEventListener('DOMContentLoaded', function() {
            // In a real application, this would fetch user data from the server
            loadUserData();
        });

        function loadUserData() {
            // Simulate loading user data
            const userName = localStorage.getItem('userName') || 'Sarah';
            document.getElementById('userName').textContent = userName;
        }
    </script>
</body>
</html>