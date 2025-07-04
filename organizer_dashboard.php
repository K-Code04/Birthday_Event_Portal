<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizer Dashboard - Birthday Event Portal</title>
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
                    <a href="organizer_dashboard.php" class="nav-link active">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="logout()">Logout</a>
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
            <h1>Welcome, <span id="organizerName">Sarah's Event Planning</span>!</h1>
            <p>Manage your birthday events and track attendee registrations</p>
        </div>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Quick Stats -->
            <div class="stats-grid" style="margin-bottom: 3rem;">
                <div class="stat-item" style="background: white; padding: 2rem; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); text-align: center;">
                    <div class="stat-number" style="color: #28a745;">5</div>
                    <div class="stat-label" style="color: #333;">Active Events</div>
                </div>
                <div class="stat-item" style="background: white; padding: 2rem; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); text-align: center;">
                    <div class="stat-number" style="color: #17a2b8;">42</div>
                    <div class="stat-label" style="color: #333;">Total Registrations</div>
                </div>
                <div class="stat-item" style="background: white; padding: 2rem; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); text-align: center;">
                    <div class="stat-number" style="color: #ffc107;">8</div>
                    <div class="stat-label" style="color: #333;">Pending Reviews</div>
                </div>
                <div class="stat-item" style="background: white; padding: 2rem; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); text-align: center;">
                    <div class="stat-number" style="color: #ff6b6b;">RM3,240</div>
                    <div class="stat-label" style="color: #333;">Monthly Revenue</div>
                </div>
            </div>

            <!-- Event Management -->
            <div class="dashboard-section">
                <div class="dashboard-header">
                    <h2>My Events</h2>
                    <button class="btn btn-primary" onclick="showAddEventModal()">
                        <i class="fas fa-plus"></i> Add New Event
                    </button>
                </div>

                <div id="organizerEvents">
                    <!-- Event 1 -->
                    <div class="event-management-card" style="border: 1px solid #e1e8ed; border-radius: 12px; padding: 1.5rem; margin-bottom: 1.5rem; background: white;">
                        <div style="display: grid; grid-template-columns: 1fr auto; gap: 2rem; align-items: start;">
                            <div>
                                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                                    <h3 style="margin: 0; color: #333;">Magical Princess Birthday Party</h3>
                                    <span class="status-badge" style="background: #d4edda; color: #155724; padding: 5px 15px; border-radius: 20px; font-size: 0.9rem;">Active</span>
                                </div>
                                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; color: #666; margin-bottom: 1rem;">
                                    <div>
                                        <i class="fas fa-calendar" style="color: #28a745; margin-right: 8px;"></i>
                                        <span>July 15, 2025 - 2:00 PM</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-map-marker-alt" style="color: #28a745; margin-right: 8px;"></i>
                                        <span>Rainbow Community Center</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-users" style="color: #28a745; margin-right: 8px;"></i>
                                        <span>12 / 20 Registered</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-dollar-sign" style="color: #28a745; margin-right: 8px;"></i>
                                        <span>RM45 per child</span>
                                    </div>
                                </div>
                                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                                    <button class="btn btn-secondary" onclick="viewEventAttendees(1)" style="padding: 8px 16px; font-size: 0.9rem;">
                                        <i class="fas fa-users"></i> View Attendees
                                    </button>
                                    <button class="btn btn-secondary" onclick="editEvent(1)" style="padding: 8px 16px; font-size: 0.9rem;">
                                        <i class="fas fa-edit"></i> Edit Event
                                    </button>
                                    <button class="btn btn-outline" onclick="deleteEvent(1)" style="border: 1px solid #dc3545; color: #dc3545; background: white; padding: 8px 16px; font-size: 0.9rem;">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Event 2 -->
                    <div class="event-management-card" style="border: 1px solid #e1e8ed; border-radius: 12px; padding: 1.5rem; margin-bottom: 1.5rem; background: white;">
                        <div style="display: grid; grid-template-columns: 1fr auto; gap: 2rem; align-items: start;">
                            <div>
                                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                                    <h3 style="margin: 0; color: #333;">Teen Gaming Birthday Tournament</h3>
                                    <span class="status-badge" style="background: #d4edda; color: #155724; padding: 5px 15px; border-radius: 20px; font-size: 0.9rem;">Active</span>
                                </div>
                                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; color: #666; margin-bottom: 1rem;">
                                    <div>
                                        <i class="fas fa-calendar" style="color: #28a745; margin-right: 8px;"></i>
                                        <span>September 25, 2025 - 4:00 PM</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-map-marker-alt" style="color: #28a745; margin-right: 8px;"></i>
                                        <span>Tech Arena, Bandar Saujana Putra</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-users" style="color: #28a745; margin-right: 8px;"></i>
                                        <span>8 / 15 Registered</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-dollar-sign" style="color: #28a745; margin-right: 8px;"></i>
                                        <span>RM30 per teen</span>
                                    </div>
                                </div>
                                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                                    <button class="btn btn-secondary" onclick="viewEventAttendees(3)" style="padding: 8px 16px; font-size: 0.9rem;">
                                        <i class="fas fa-users"></i> View Attendees
                                    </button>
                                    <button class="btn btn-secondary" onclick="editEvent(3)" style="padding: 8px 16px; font-size: 0.9rem;">
                                        <i class="fas fa-edit"></i> Edit Event
                                    </button>
                                    <button class="btn btn-outline" onclick="deleteEvent(3)" style="border: 1px solid #dc3545; color: #dc3545; background: white; padding: 8px 16px; font-size: 0.9rem;">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Event 3 -->
                    <div class="event-management-card" style="border: 1px solid #e1e8ed; border-radius: 12px; padding: 1.5rem; margin-bottom: 1.5rem; background: white;">
                        <div style="display: grid; grid-template-columns: 1fr auto; gap: 2rem; align-items: start;">
                            <div>
                                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                                    <h3 style="margin: 0; color: #333;">Superhero Adventure Party</h3>
                                    <span class="status-badge" style="background: #fff3cd; color: #856404; padding: 5px 15px; border-radius: 20px; font-size: 0.9rem;">Draft</span>
                                </div>
                                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; color: #666; margin-bottom: 1rem;">
                                    <div>
                                        <i class="fas fa-calendar" style="color: #28a745; margin-right: 8px;"></i>
                                        <span>August 12, 2025 - 3:00 PM</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-map-marker-alt" style="color: #28a745; margin-right: 8px;"></i>
                                        <span>Hero Hall, Kuala Lumpur</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-users" style="color: #28a745; margin-right: 8px;"></i>
                                        <span>0 / 25 Registered</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-dollar-sign" style="color: #28a745; margin-right: 8px;"></i>
                                        <span>RM50 per child</span>
                                    </div>
                                </div>
                                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                                    <button class="btn btn-primary" onclick="publishEvent(5)" style="padding: 8px 16px; font-size: 0.9rem;">
                                        <i class="fas fa-rocket"></i> Publish Event
                                    </button>
                                    <button class="btn btn-secondary" onclick="editEvent(5)" style="padding: 8px 16px; font-size: 0.9rem;">
                                        <i class="fas fa-edit"></i> Edit Event
                                    </button>
                                    <button class="btn btn-outline" onclick="deleteEvent(5)" style="border: 1px solid #dc3545; color: #dc3545; background: white; padding: 8px 16px; font-size: 0.9rem;">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Attendee Management -->
            <div class="dashboard-section" id="attendeeManagement" style="display: none;">
                <div class="dashboard-header">
                    <h2>Event Attendees: <span id="selectedEventTitle">Magical Princess Birthday Party</span></h2>
                    <button class="btn btn-secondary" onclick="hideAttendeeManagement()">
                        <i class="fas fa-arrow-left"></i> Back to Events
                    </button>
                </div>

                <div class="attendee-table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Child Name</th>
                                <th>Age</th>
                                <th>Parent/Guardian</th>
                                <th>Contact</th>
                                <th>Status</th>
                                <th>Registration Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="attendeeTableBody">
                            <tr>
                                <td>Emma Johnson</td>
                                <td>6</td>
                                <td>Sarah Johnson</td>
                                <td>sarah.johnson@email.com<br>0111 475-4758</td>
                                <td><span class="status-badge status-confirmed">Confirmed</span></td>
                                <td>July 5, 2025</td>
                                <td>
                                    <select onchange="updateAttendeeStatus(1, this.value)" style="padding: 5px; border-radius: 4px; border: 1px solid #ddd;">
                                        <option value="confirmed" selected>Confirmed</option>
                                        <option value="waiting">Waiting List</option>
                                        <option value="cancelled">Cancelled</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Alex Rodriguez</td>
                                <td>5</td>
                                <td>Maria Rodriguez</td>
                                <td>maria.rodriguez@email.com<br>0111 234-5678</td>
                                <td><span class="status-badge status-confirmed">Confirmed</span></td>
                                <td>July 7, 2025</td>
                                <td>
                                    <select onchange="updateAttendeeStatus(2, this.value)" style="padding: 5px; border-radius: 4px; border: 1px solid #ddd;">
                                        <option value="confirmed" selected>Confirmed</option>
                                        <option value="waiting">Waiting List</option>
                                        <option value="cancelled">Cancelled</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Sophie Chen</td>
                                <td>7</td>
                                <td>David Chen</td>
                                <td>david.chen@email.com<br>0111 345-6789</td>
                                <td><span class="status-badge status-waiting">Waiting List</span></td>
                                <td>July 10, 2025</td>
                                <td>
                                    <select onchange="updateAttendeeStatus(3, this.value)" style="padding: 5px; border-radius: 4px; border: 1px solid #ddd;">
                                        <option value="confirmed">Confirmed</option>
                                        <option value="waiting" selected>Waiting List</option>
                                        <option value="cancelled">Cancelled</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Add/Edit Event Modal Content -->
            <div class="dashboard-section" id="eventFormSection" style="display: none;">
                <div class="dashboard-header">
                    <h2 id="eventFormTitle">Add New Event</h2>
                    <button class="btn btn-secondary" onclick="hideEventForm()">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                </div>

                <div class="form-container" style="max-width: 800px;">
                    <form id="eventForm" data-form="add-event">
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                            <div>
                                <div class="form-group">
                                    <label for="eventTitle">Event Title *</label>
                                    <input type="text" id="eventTitle" name="title" required placeholder="Enter event title">
                                </div>

                                <div class="form-group">
                                    <label for="eventCategory">Category *</label>
                                    <select id="eventCategory" name="category" required>
                                        <option value="">Select category</option>
                                        <option value="Kids Party">Kids Party</option>
                                        <option value="Teen Birthday">Teen Birthday</option>
                                        <option value="Adult Birthday">Adult Birthday</option>
                                        <option value="Milestone Birthday">Milestone Birthday</option>
                                        <option value="Theme Party">Theme Party</option>
                                        <option value="Corporate Event">Corporate Event</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="eventDate">Event Date *</label>
                                    <input type="datetime-local" id="eventDate" name="event_date" required>
                                </div>

                                <div class="form-group">
                                    <label for="eventLocation">Location *</label>
                                    <input type="text" id="eventLocation" name="location" required placeholder="Enter venue address">
                                </div>

                                <div class="form-group">
                                    <label for="eventPrice">Price per Person *</label>
                                    <input type="number" id="eventPrice" name="price" required placeholder="0.00" step="0.01" min="0">
                                </div>

                                <div class="form-group">
                                    <label for="maxAttendees">Maximum Attendees *</label>
                                    <input type="number" id="maxAttendees" name="max_attendees" required placeholder="Enter maximum capacity" min="1">
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label for="eventDescription">Event Description *</label>
                                    <textarea id="eventDescription" name="description" required rows="8" placeholder="Describe your event in detail..."></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="eventRequirements">Age Requirements</label>
                                    <input type="text" id="eventRequirements" name="age_requirements" placeholder="e.g., Ages 5-10">
                                </div>

                                <div class="form-group">
                                    <label for="eventIncludes">What's Included</label>
                                    <textarea id="eventIncludes" name="includes" rows="4" placeholder="List what's included in the event..."></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="specialNotes">Special Notes</label>
                                    <textarea id="specialNotes" name="special_notes" rows="3" placeholder="Any special instructions or notes..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div style="margin-top: 2rem; display: flex; gap: 1rem; justify-content: flex-end;">
                            <button type="button" class="btn btn-secondary" onclick="hideEventForm()">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Save Event
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Analytics Section -->
            <div class="dashboard-section">
                <h2>Analytics Overview</h2>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                    <div style="background: white; padding: 2rem; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                        <h3 style="color: #28a745; margin-bottom: 1rem;">This Month</h3>
                        <div style="display: grid; gap: 1rem;">
                            <div style="display: flex; justify-content: space-between;">
                                <span>Events Created:</span>
                                <strong>3</strong>
                            </div>
                            <div style="display: flex; justify-content: space-between;">
                                <span>Total Registrations:</span>
                                <strong>42</strong>
                            </div>
                            <div style="display: flex; justify-content: space-between;">
                                <span>Revenue:</span>
                                <strong>RM3,240</strong>
                            </div>
                            <div style="display: flex; justify-content: space-between;">
                                <span>Avg. Rating:</span>
                                <strong>4.8/5</strong>
                            </div>
                        </div>
                    </div>

                    <div style="background: white; padding: 2rem; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                        <h3 style="color: #17a2b8; margin-bottom: 1rem;">All Time</h3>
                        <div style="display: grid; gap: 1rem;">
                            <div style="display: flex; justify-content: space-between;">
                                <span>Total Events:</span>
                                <strong>24</strong>
                            </div>
                            <div style="display: flex; justify-content: space-between;">
                                <span>Happy Customers:</span>
                                <strong>187</strong>
                            </div>
                            <div style="display: flex; justify-content: space-between;">
                                <span>Total Revenue:</span>
                                <strong>RM15,680</strong>
                            </div>
                            <div style="display: flex; justify-content: space-between;">
                                <span>Success Rate:</span>
                                <strong>96%</strong>
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
        // Organizer dashboard specific functions

        function showAddEventModal() {
            document.getElementById('eventFormSection').style.display = 'block';
            document.getElementById('eventFormTitle').textContent = 'Add New Event';
            document.getElementById('eventForm').reset();
            document.getElementById('eventForm').removeAttribute('data-event-id');
        }

        function hideEventForm() {
            document.getElementById('eventFormSection').style.display = 'none';
        }

        function editEvent(eventId) {
            document.getElementById('eventFormSection').style.display = 'block';
            document.getElementById('eventFormTitle').textContent = 'Edit Event';
            document.getElementById('eventForm').setAttribute('data-event-id', eventId);
            
            // In a real application, this would load event data from the server
            showMessage('Loading event data for editing...', 'info');
        }

        function publishEvent(eventId) {
            if (confirm('Are you sure you want to publish this event? It will become visible to users.')) {
                showMessage('Event published successfully!', 'success');
                // Refresh the events list
                setTimeout(() => {
                    location.reload();
                }, 2000);
            }
        }

        function viewEventAttendees(eventId) {
            document.getElementById('attendeeManagement').style.display = 'block';
            // In a real application, this would load attendee data from the server
            showMessage('Loading attendee data...', 'info');
        }

        function hideAttendeeManagement() {
            document.getElementById('attendeeManagement').style.display = 'none';
        }

        function updateAttendeeStatus(registrationId, status) {
            // In a real application, this would call the updateAttendeeStatus function from script.js
            const statusText = status.charAt(0).toUpperCase() + status.slice(1);
            showMessage(`Attendee status updated to RM{statusText}`, 'success');
        }

        // Load organizer data on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadOrganizerData();
        });

        function loadOrganizerData() {
            // Simulate loading organizer data
            const organizerName = localStorage.getItem('organizerName') || "Sarah's Event Planning";
            document.getElementById('organizerName').textContent = organizerName;
        }
    </script>
</body>
</html>