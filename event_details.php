<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details - Birthday Event Portal</title>
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

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Back Button -->
            <div style="margin-bottom: 2rem;">
                <a href="events.php" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Events
                </a>
            </div>

            <!-- Event Details -->
            <div class="dashboard-section">
                <div class="event-details-header" style="text-align: center; margin-bottom: 2rem;">
                    <div class="event-image" style="display: inline-block; width: 150px; height: 150px; margin-bottom: 1rem;">
                        🎂
                    </div>
                    <h1 id="eventTitle">Magical Princess Birthday Party</h1>
                    <div class="event-meta" style="display: flex; justify-content: center; gap: 2rem; margin-top: 1rem; flex-wrap: wrap;">
                        <div class="meta-item">
                            <i class="fas fa-user" style="color: #ff6b6b; margin-right: 8px;"></i>
                            <span id="eventOrganizer">Sarah's Event Planning</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-map-marker-alt" style="color: #ff6b6b; margin-right: 8px;"></i>
                            <span id="eventLocation">Rainbow Community Center, Kuala Lumpur</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-calendar" style="color: #ff6b6b; margin-right: 8px;"></i>
                            <span id="eventDate">July 15, 2025 - 2:00 PM</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-tag" style="color: #ff6b6b; margin-right: 8px;"></i>
                            <span id="eventCategory">Kids Party</span>
                        </div>
                    </div>
                </div>

                <!-- Event Description -->
                <div style="margin-bottom: 3rem;">
                    <h2>Event Description</h2>
                    <div id="eventDescription" style="line-height: 1.8; color: #666; font-size: 1.1rem;">
                        <p>Join us for a magical princess-themed birthday party that will create unforgettable memories for your little one! This enchanting celebration is designed for children ages 4-8 and features everything needed for the perfect royal celebration.</p>
                        
                        <p>Our experienced party planners will transform the venue into a magical kingdom with beautiful decorations, including:</p>
                        <ul style="margin: 1rem 0; padding-left: 2rem;">
                            <li>Princess castle backdrop and themed decorations</li>
                            <li>Pink and gold color scheme with balloons and streamers</li>
                            <li>Royal throne for the birthday princess</li>
                            <li>Fairy lights and magical ambiance</li>
                        </ul>

                        <p>Activities and entertainment include:</p>
                        <ul style="margin: 1rem 0; padding-left: 2rem;">
                            <li>Professional princess performer for 2 hours</li>
                            <li>Interactive storytelling and sing-alongs</li>
                            <li>Princess dress-up station with costumes and accessories</li>
                            <li>Crown decorating craft activity</li>
                            <li>Musical chairs and princess-themed games</li>
                            <li>Professional face painting</li>
                        </ul>

                        <p>Party includes birthday cake, snacks, and beverages for all guests. Each child will receive a special party favor bag to take home.</p>
                    </div>
                </div>

                <!-- Event Schedule -->
                <div style="margin-bottom: 3rem;">
                    <h2>Event Schedule</h2>
                    <div class="schedule-grid" style="display: grid; gap: 1rem;">
                        <div style="display: flex; align-items: center; padding: 1rem; background: #f8f9fa; border-radius: 8px;">
                            <div style="width: 80px; font-weight: 600; color: #ff6b6b;">2:00 PM</div>
                            <div>Guest arrival and princess dress-up time</div>
                        </div>
                        <div style="display: flex; align-items: center; padding: 1rem; background: #f8f9fa; border-radius: 8px;">
                            <div style="width: 80px; font-weight: 600; color: #ff6b6b;">2:30 PM</div>
                            <div>Princess performer arrival and welcome ceremony</div>
                        </div>
                        <div style="display: flex; align-items: center; padding: 1rem; background: #f8f9fa; border-radius: 8px;">
                            <div style="width: 80px; font-weight: 600; color: #ff6b6b;">3:00 PM</div>
                            <div>Interactive games and activities</div>
                        </div>
                        <div style="display: flex; align-items: center; padding: 1rem; background: #f8f9fa; border-radius: 8px;">
                            <div style="width: 80px; font-weight: 600; color: #ff6b6b;">3:45 PM</div>
                            <div>Crown decorating craft time</div>
                        </div>
                        <div style="display: flex; align-items: center; padding: 1rem; background: #f8f9fa; border-radius: 8px;">
                            <div style="width: 80px; font-weight: 600; color: #ff6b6b;">4:15 PM</div>
                            <div>Birthday cake ceremony and singing</div>
                        </div>
                        <div style="display: flex; align-items: center; padding: 1rem; background: #f8f9fa; border-radius: 8px;">
                            <div style="width: 80px; font-weight: 600; color: #ff6b6b;">4:45 PM</div>
                            <div>Party favor distribution and farewell</div>
                        </div>
                    </div>
                </div>

                <!-- Venue Information -->
                <div style="margin-bottom: 3rem;">
                    <h2>Venue Information</h2>
                    <div style="background: #f8f9fa; padding: 2rem; border-radius: 15px;">
                        <h3 style="color: #ff6b6b; margin-bottom: 1rem;">Rainbow Community Center</h3>
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1rem;">
                            <div>
                                <h4>Address:</h4>
                                <p>123 Rainbow Street<br>Kuala Lumpur, KL 50001</p>
                            </div>
                            <div>
                                <h4>Facilities:</h4>
                                <ul style="margin: 0; padding-left: 1rem;">
                                    <li>Large party room (accommodates 30 children)</li>
                                    <li>Sound system and microphone</li>
                                    <li>Tables and chairs provided</li>
                                    <li>Kitchen facilities available</li>
                                    <li>Free parking available</li>
                                </ul>
                            </div>
                            <div>
                                <h4>Accessibility:</h4>
                                <ul style="margin: 0; padding-left: 1rem;">
                                    <li>Wheelchair accessible</li>
                                    <li>Accessible restrooms</li>
                                    <li>Ground floor location</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Organizer Information -->
                <div style="margin-bottom: 3rem;">
                    <h2>Organizer Information</h2>
                    <div style="background: #f8f9fa; padding: 2rem; border-radius: 15px;">
                        <div style="display: flex; align-items: center; gap: 2rem; flex-wrap: wrap;">
                            <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #ff6b6b, #ff8e53); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem;">
                                S
                            </div>
                            <div style="flex: 1;">
                                <h3 style="color: #ff6b6b; margin-bottom: 0.5rem;">Sarah's Event Planning</h3>
                                <p style="margin-bottom: 1rem;">Professional birthday party organizer with 8+ years of experience creating magical celebrations for children and families.</p>
                                <div style="display: flex; gap: 2rem; flex-wrap: wrap;">
                                    <div>
                                        <i class="fas fa-star" style="color: #ffd700;"></i>
                                        <span>4.9/5 Rating (127 reviews)</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-phone" style="color: #ff6b6b;"></i>
                                        <span>0111 635-5032</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-envelope" style="color: #ff6b6b;"></i>
                                        <span>sarah@eventplanning.com</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               <!-- Video Section -->
<div style="margin-bottom: 3rem;">
    <h2>Event Preview & Registration Tips</h2>
    <div class="video-container">
        <div class="video-player" id="eventVideo">
            <video width="100%" height="315" controls>
                <source src="videos/preview.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>
</div>

                                <p>Birthday Event Registration Tips</p>
                                <p>Click play to watch our helpful guide!</p>
                            </div>
                            <div class="video-controls">
                                <button class="video-btn" id="playBtn">
                                    <i class="fas fa-play"></i> Play
                                </button>
                                <button class="video-btn" id="stopBtn" disabled>
                                    <i class="fas fa-stop"></i> Stop
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Registration Section -->
                <div style="margin-bottom: 3rem;">
                    <h2>Register for This Event</h2>
                    <div class="form-container" style="max-width: 600px;">
                        <form id="eventRegistrationForm" data-form="eventRegistration" method="POST" action="php/register_event.php">
                            <div class="form-group">
                                <label for="childName">Child's Name *</label>
                                <input type="text" id="childName" name="child_name" required placeholder="Enter child's name">
                            </div>
                            
                            <div class="form-group">
                                <label for="childAge">Child's Age *</label>
                                <select id="childAge" name="child_age" required>
                                    <option value="">Select age</option>
                                    <option value="4">4 years old</option>
                                    <option value="5">5 years old</option>
                                    <option value="6">6 years old</option>
                                    <option value="7">7 years old</option>
                                    <option value="8">8 years old</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="parentName">Parent/Guardian Name *</label>
                                <input type="text" id="parentName" name="parent_name" required placeholder="Enter your name">
                            </div>
                            
                            <div class="form-group">
                                <label for="parentEmail">Email Address *</label>
                                <input type="email" id="parentEmail" name="parent_email" required placeholder="Enter your email">
                            </div>
                            
                            <div class="form-group">
                                <label for="parentPhone">Phone Number *</label>
                                <input type="tel" id="parentPhone" name="parent_phone" required placeholder="Enter your phone number">
                            </div>
                            
                            <div class="form-group">
                                <label for="guestCount">Number of Guests</label>
                                <select id="guestCount" name="guest_count">
                                    <option value="1">1 child</option>
                                    <option value="2">2 children</option>
                                    <option value="3">3 children</option>
                                    <option value="4">4 children</option>
                                    <option value="5">5+ children</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="specialRequests">Special Requests or Dietary Restrictions</label>
                                <textarea id="specialRequests" name="special_requests" rows="4" placeholder="Any special accommodations, allergies, or requests..."></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label style="display: flex; align-items: center; gap: 10px;">
                                    <input type="checkbox" name="terms_agreed" required>
                                    <span>I agree to the <a href="terms.php" target="_blank" style="color: #ff6b6b;">terms and conditions</a> and <a href="privacy.php" target="_blank" style="color: #ff6b6b;">privacy policy</a></span>
                                </label>
                            </div>
                            
                            <input type="hidden" name="event_id" value="1">
                            
                            <button type="submit" class="btn btn-primary btn-full">
                                <i class="fas fa-calendar-check"></i> Register Now
                            </button>
                        </form>
                        
                        <div style="text-align: center; margin-top: 2rem; padding: 1rem; background: #e8f5e8; border-radius: 8px;">
                            <p style="margin: 0; color: #2d5a2d;">
                                <i class="fas fa-info-circle"></i> 
                                Registration is free! Payment will be collected at the event.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Event Pricing -->
                <div style="margin-bottom: 3rem;">
                    <h2>Pricing Information</h2>
                    <div style="background: #f8f9fa; padding: 2rem; border-radius: 15px;">
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem;">
                            <div style="text-align: center; padding: 1rem; background: white; border-radius: 10px;">
                                <h4 style="color: #ff6b6b; margin-bottom: 0.5rem;">Per Child</h4>
                                <div style="font-size: 2rem; font-weight: 700; color: #333;">RM45</div>
                                <p style="margin: 0; color: #666;">Includes all activities, food, and party favor</p>
                            </div>
                            <div style="text-align: center; padding: 1rem; background: white; border-radius: 10px;">
                                <h4 style="color: #ff6b6b; margin-bottom: 0.5rem;">Adult Supervision</h4>
                                <div style="font-size: 2rem; font-weight: 700; color: #333;">Free</div>
                                <p style="margin: 0; color: #666;">Parents and guardians attend at no charge</p>
                            </div>
                            <div style="text-align: center; padding: 1rem; background: white; border-radius: 10px;">
                                <h4 style="color: #ff6b6b; margin-bottom: 0.5rem;">Group Discount</h4>
                                <div style="font-size: 2rem; font-weight: 700; color: #333;">10%</div>
                                <p style="margin: 0; color: #666;">For groups of 5+ children</p>
                            </div>
                        </div>
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
        // Load event details based on URL parameter
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const eventId = urlParams.get('id');
            
            if (eventId) {
                loadEventDetails(eventId);
            }
        });

        function loadEventDetails(eventId) {
            // In a real application, this would fetch from the server
            // For now, we'll use the sample data already loaded
            console.log('Loading event details for ID:', eventId);
        }
    </script>
</body>
</html>