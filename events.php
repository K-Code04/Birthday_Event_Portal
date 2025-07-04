<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Birthday Events - Birthday Event Portal</title>
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
                    <a href="events.php" class="nav-link active">Events</a>
                </li>
                <li class="nav-item">
                    <a href="login_page.php" class="nav-link">Login</a>
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
            <h1>Upcoming Birthday Events</h1>
            <p>Find the perfect birthday celebration near you</p>
        </div>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Filter Section -->
            <div class="filter-section">
                <h3>Filter Events</h3>
                <div class="filter-grid">
                    <div class="form-group">
                        <label for="searchInput">Search Events</label>
                        <input type="text" id="searchInput" class="filter-input" placeholder="Search by title, organizer, or description...">
                    </div>
                    <div class="form-group">
                        <label for="categoryFilter">Category</label>
                        <select id="categoryFilter" class="filter-input">
                            <option value="">All Categories</option>
                            <option value="Kids Party">Kids Party</option>
                            <option value="Adult Birthday">Adult Birthday</option>
                            <option value="Teen Birthday">Teen Birthday</option>
                            <option value="Milestone Birthday">Milestone Birthday</option>
                            <option value="Theme Party">Theme Party</option>
                            <option value="Corporate Event">Corporate Event</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="locationFilter">Location</label>
                        <input type="text" id="locationFilter" class="filter-input" placeholder="Enter city or venue...">
                    </div>
                    <div class="form-group">
                        <label for="dateFilter">Date</label>
                        <input type="date" id="dateFilter" class="filter-input">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" onclick="filterEvents()">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </div>
                </div>
            </div>

            <!-- Events Grid -->
            <div class="events-grid" id="eventsGrid">
                <!-- Sample Events - These will be loaded dynamically via JavaScript -->
                <div class="event-card fade-in" data-event-id="1">
                    <div class="event-image">
                        🎂
                    </div>
                    <div class="event-content">
                        <h3 class="event-title">Magical Princess Birthday Party</h3>
                        <div class="event-organizer">
                            <i class="fas fa-user"></i>
                            <span>Sarah's Event Planning</span>
                        </div>
                        <div class="event-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Rainbow Community Center, CyberJaya</span>
                        </div>
                        <div class="event-date">
                            <i class="fas fa-calendar"></i>
                            <span>July 15, 2025 - 2:00 PM</span>
                        </div>
                        <p class="event-description">A magical princess-themed birthday party complete with decorations, games, and entertainment for children ages 4-8.</p>
                        <div style="margin-top: 1rem;">
                            <a href="event_details.php?id=1" class="btn btn-primary" style="text-decoration: none;">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>

                <div class="event-card fade-in" data-event-id="2">
                    <div class="event-image">
                        🎉
                    </div>
                    <div class="event-content">
                        <h3 class="event-title">Adult Milestone 50th Birthday Bash</h3>
                        <div class="event-organizer">
                            <i class="fas fa-user"></i>
                            <span>Elite Celebrations</span>
                        </div>
                        <div class="event-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Grand Ballroom, Shah Alam</span>
                        </div>
                        <div class="event-date">
                            <i class="fas fa-calendar"></i>
                            <span>August 20, 2025 - 7:00 PM</span>
                        </div>
                        <p class="event-description">Elegant 50th birthday celebration with live music, gourmet dining, and sophisticated entertainment for adults.</p>
                        <div style="margin-top: 1rem;">
                            <a href="event_details.php?id=2" class="btn btn-primary" style="text-decoration: none;">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>

                <div class="event-card fade-in" data-event-id="3">
                    <div class="event-image">
                        🎈
                    </div>
                    <div class="event-content">
                        <h3 class="event-title">Teen Gaming Birthday Tournament</h3>
                        <div class="event-organizer">
                            <i class="fas fa-user"></i>
                            <span>GameZone Events</span>
                        </div>
                        <div class="event-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Tech Arena, Bandar Saujana Putra</span>
                        </div>
                        <div class="event-date">
                            <i class="fas fa-calendar"></i>
                            <span>September 25, 2025 - 4:00 PM</span>
                        </div>
                        <p class="event-description">Epic gaming tournament birthday party for teenagers with the latest video games, prizes, and pizza party.</p>
                        <div style="margin-top: 1rem;">
                            <a href="event_details.php?id=3" class="btn btn-primary" style="text-decoration: none;">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>

                <div class="event-card fade-in" data-event-id="4">
                    <div class="event-image">
                        🦄
                    </div>
                    <div class="event-content">
                        <h3 class="event-title">Unicorn Theme Birthday Extravaganza</h3>
                        <div class="event-organizer">
                            <i class="fas fa-user"></i>
                            <span>Dream Party Planners</span>
                        </div>
                        <div class="event-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Fairy Tale Gardens, Putra Jaya</span>
                        </div>
                        <div class="event-date">
                            <i class="fas fa-calendar"></i>
                            <span>October 1, 2025 - 1:00 PM</span>
                        </div>
                        <p class="event-description">Magical unicorn-themed birthday party with rainbow decorations, unicorn crafts, and mystical entertainment.</p>
                        <div style="margin-top: 1rem;">
                            <a href="event_details.php?id=4" class="btn btn-primary" style="text-decoration: none;">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>

                <div class="event-card fade-in" data-event-id="5">
                    <div class="event-image">
                        🎪
                    </div>
                    <div class="event-content">
                        <h3 class="event-title">Circus Birthday Spectacular</h3>
                        <div class="event-organizer">
                            <i class="fas fa-user"></i>
                            <span>Big Top Events</span>
                        </div>
                        <div class="event-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Central Park Pavilion, Bukit Jalil</span>
                        </div>
                        <div class="event-date">
                            <i class="fas fa-calendar"></i>
                            <span>November 5, 2025 - 3:00 PM</span>
                        </div>
                        <p class="event-description">Amazing circus-themed birthday party with clowns, acrobats, balloon animals, and carnival games for all ages.</p>
                        <div style="margin-top: 1rem;">
                            <a href="event_details.php?id=5" class="btn btn-primary" style="text-decoration: none;">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>

                <div class="event-card fade-in" data-event-id="6">
                    <div class="event-image">
                        🎭
                    </div>
                    <div class="event-content">
                        <h3 class="event-title">Corporate Team Birthday Celebration</h3>
                        <div class="event-organizer">
                            <i class="fas fa-user"></i>
                            <span>Professional Party Co.</span>
                        </div>
                        <div class="event-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Business Conference Center, KLCC</span>
                        </div>
                        <div class="event-date">
                            <i class="fas fa-calendar"></i>
                            <span>December 10, 2025 - 6:00 PM</span>
                        </div>
                        <p class="event-description">Professional birthday celebration for corporate teams with networking, team building activities, and catered dinner.</p>
                        <div style="margin-top: 1rem;">
                            <a href="event_details.php?id=6" class="btn btn-primary" style="text-decoration: none;">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Load More Section -->
            <div style="text-align: center; margin-top: 3rem;">
                <button class="btn btn-secondary" id="loadMoreBtn" onclick="loadMoreEvents()">
                    <i class="fas fa-plus"></i> Load More Events
                </button>
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
                    <p><i class="fas fa-phone"></i> +60 111-635-5032</p>
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
        // Additional JavaScript for events page
        function loadMoreEvents() {
            const loadMoreBtn = document.getElementById('loadMoreBtn');
            loadMoreBtn.innerHTML = '<span class="loading"></span> Loading...';
            loadMoreBtn.disabled = true;
            
            // Simulate loading more events
            setTimeout(() => {
                showMessage('No more events to load at this time.', 'info');
                loadMoreBtn.innerHTML = '<i class="fas fa-plus"></i> Load More Events';
                loadMoreBtn.disabled = false;
            }, 1500);
        }
    </script>
</body>
</html>