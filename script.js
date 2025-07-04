/**
 * Birthday Event Portal - Main JavaScript File
 * Handles navigation, form validation, event management, and user interactions
 */

// Global variables
let currentUser = null;
let currentEvents = [];
let filteredEvents = [];

// DOM Content Loaded Event
document.addEventListener('DOMContentLoaded', function() {
    initializeApp();
});

/**
 * Initialize the application
 */
function initializeApp() {
    setupNavigation();
    setupEventListeners();
    checkLoginStatus();
    loadEvents();
    setupVideoPlayer();
}

/**
 * Setup navigation functionality including mobile menu
 */
function setupNavigation() {
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');
    
    if (hamburger && navMenu) {
        hamburger.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            hamburger.classList.toggle('active');
        });
    }
    
    // Close mobile menu when clicking on nav links
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            navMenu.classList.remove('active');
            hamburger.classList.remove('active');
        });
    });
    
    // Set active navigation item based on current page
    setActiveNavigation();
}

/**
 * Set active navigation item based on current page
 */
function setActiveNavigation() {
    const currentPage = window.location.pathname.split('/').pop() || 'index.php';
    const navLinks = document.querySelectorAll('.nav-link');
    
    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === currentPage) {
            link.classList.add('active');
        }
    });
}

/**
 * Setup global event listeners
 */
function setupEventListeners() {
    // Form submissions
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', handleFormSubmission);
    });
    
    // Event card clicks
    document.addEventListener('click', function(e) {
        if (e.target.closest('.event-card')) {
            const eventCard = e.target.closest('.event-card');
            const eventId = eventCard.dataset.eventId;
            if (eventId) {
                viewEventDetails(eventId);
            }
        }
    });
    
    // Filter events
    const filterInputs = document.querySelectorAll('.filter-input');
    filterInputs.forEach(input => {
        input.addEventListener('input', filterEvents);
        input.addEventListener('change', filterEvents);
    });
    
    // Search functionality
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('input', debounce(searchEvents, 300));
    }
}

/**
 * Check if user is logged in
 */
function checkLoginStatus() {
    const token = localStorage.getItem('authToken');
    const userType = localStorage.getItem('userType');
    
    if (token) {
        // Validate token with server
        fetch('php/validate_token.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + token
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                currentUser = data.user;
                updateNavigationForLoggedInUser(userType);
            } else {
                logout();
            }
        })
        .catch(error => {
            console.error('Token validation error:', error);
            logout();
        });
    }
}

/**
 * Update navigation for logged in users
 */
function updateNavigationForLoggedInUser(userType) {
    const navMenu = document.querySelector('.nav-menu');
    if (!navMenu) return;
    
    // Remove login/register links
    const loginLink = navMenu.querySelector('a[href="login.php"]');
    const registerLink = navMenu.querySelector('a[href="register.php"]');
    const organizerLink = navMenu.querySelector('a[href="organizer_login.php"]');
    
    if (loginLink) loginLink.parentElement.remove();
    if (registerLink) registerLink.parentElement.remove();
    if (organizerLink) organizerLink.parentElement.remove();
    
    // Add dashboard and logout links
    const dashboardUrl = userType === 'organizer' ? 'organizer_dashboard.php' : 'user_dashboard.php';
    const navItem = document.createElement('li');
    navItem.className = 'nav-item';
    navItem.innerHTML = `
        <a href="${dashboardUrl}" class="nav-link">Dashboard</a>
    `;
    navMenu.appendChild(navItem);
    
    const logoutItem = document.createElement('li');
    logoutItem.className = 'nav-item';
    logoutItem.innerHTML = `
        <a href="#" class="nav-link" onclick="logout()">Logout</a>
    `;
    navMenu.appendChild(logoutItem);
}

/**
 * Handle form submissions
 */
function handleFormSubmission(e) {
    e.preventDefault();
    const form = e.target;
    const formType = form.dataset.form || form.id;
    
    switch(formType) {
        case 'loginForm':
        case 'login':
            handleLogin(form);
            break;
        case 'registerForm':
        case 'register':
            handleRegister(form);
            break;
        case 'organizerLoginForm':
        case 'organizer-login':
            handleOrganizerLogin(form);
            break;
        case 'eventForm':
        case 'add-event':
            handleEventSubmission(form);
            break;
        case 'eventRegistration':
            handleEventRegistration(form);
            break;
        default:
            console.log('Unknown form type:', formType);
    }
}

/**
 * Handle user login
 */
function handleLogin(form) {
    const formData = new FormData(form);
    const submitBtn = form.querySelector('button[type="submit"]');
    
    showLoading(submitBtn);
    
    fetch('php/login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        hideLoading(submitBtn);
        
        if (data.success) {
            localStorage.setItem('authToken', data.token);
            localStorage.setItem('userType', 'user');
            showMessage('Login successful! Redirecting...', 'success');
            setTimeout(() => {
                window.location.href = 'user_dashboard.php';
            }, 1500);
        } else {
            showMessage(data.message || 'Login failed. Please try again.', 'error');
        }
    })
    .catch(error => {
        hideLoading(submitBtn);
        console.error('Login error:', error);
        showMessage('An error occurred. Please try again.', 'error');
    });
}

/**
 * Handle user registration
 */
function handleRegister(form) {
    const formData = new FormData(form);
    const password = formData.get('password');
    const confirmPassword = formData.get('confirm_password');
    
    // Validate password match
    if (password !== confirmPassword) {
        showMessage('Passwords do not match.', 'error');
        return;
    }
    
    // Validate password strength
    if (!validatePassword(password)) {
        showMessage('Password must be at least 8 characters long and contain uppercase, lowercase, and number.', 'error');
        return;
    }
    
    const submitBtn = form.querySelector('button[type="submit"]');
    showLoading(submitBtn);
    
    fetch('php/register.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        hideLoading(submitBtn);
        
        if (data.success) {
            showMessage('Registration successful! Please login to continue.', 'success');
            setTimeout(() => {
                window.location.href = 'login.php';
            }, 2000);
        } else {
            showMessage(data.message || 'Registration failed. Please try again.', 'error');
        }
    })
    .catch(error => {
        hideLoading(submitBtn);
        console.error('Registration error:', error);
        showMessage('An error occurred. Please try again.', 'error');
    });
}

/**
 * Handle organizer login
 */
function handleOrganizerLogin(form) {
    const formData = new FormData(form);
    const submitBtn = form.querySelector('button[type="submit"]');
    
    showLoading(submitBtn);
    
    fetch('php/organizer_login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        hideLoading(submitBtn);
        
        if (data.success) {
            localStorage.setItem('authToken', data.token);
            localStorage.setItem('userType', 'organizer');
            showMessage('Login successful! Redirecting...', 'success');
            setTimeout(() => {
                window.location.href = 'organizer_dashboard.php';
            }, 1500);
        } else {
            showMessage(data.message || 'Login failed. Please try again.', 'error');
        }
    })
    .catch(error => {
        hideLoading(submitBtn);
        console.error('Organizer login error:', error);
        showMessage('An error occurred. Please try again.', 'error');
    });
}

/**
 * Handle event registration
 */
function handleEventRegistration(form) {
    if (!currentUser) {
        showMessage('Please login to register for events.', 'error');
        setTimeout(() => {
            window.location.href = 'login.php';
        }, 2000);
        return;
    }
    
    const formData = new FormData(form);
    const submitBtn = form.querySelector('button[type="submit"]');
    
    showLoading(submitBtn);
    
    fetch('php/register_event.php', {
        method: 'POST',
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('authToken')
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        hideLoading(submitBtn);
        
        if (data.success) {
            showMessage('Successfully registered for the event!', 'success');
            form.reset();
        } else {
            showMessage(data.message || 'Registration failed. Please try again.', 'error');
        }
    })
    .catch(error => {
        hideLoading(submitBtn);
        console.error('Event registration error:', error);
        showMessage('An error occurred. Please try again.', 'error');
    });
}

/**
 * Handle event creation/update by organizers
 */
function handleEventSubmission(form) {
    const formData = new FormData(form);
    const submitBtn = form.querySelector('button[type="submit"]');
    const isEdit = form.dataset.eventId;
    
    showLoading(submitBtn);
    
    const url = isEdit ? 'php/update_event.php' : 'php/create_event.php';
    
    fetch(url, {
        method: 'POST',
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('authToken')
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        hideLoading(submitBtn);
        
        if (data.success) {
            const message = isEdit ? 'Event updated successfully!' : 'Event created successfully!';
            showMessage(message, 'success');
            
            if (!isEdit) {
                form.reset();
            }
            
            // Refresh events list
            loadEvents();
        } else {
            showMessage(data.message || 'Operation failed. Please try again.', 'error');
        }
    })
    .catch(error => {
        hideLoading(submitBtn);
        console.error('Event submission error:', error);
        showMessage('An error occurred. Please try again.', 'error');
    });
}

/**
 * Load events from server
 */
function loadEvents() {
    fetch('php/get_events.php')
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            currentEvents = data.events;
            filteredEvents = [...currentEvents];
            displayEvents(filteredEvents);
        } else {
            console.error('Failed to load events:', data.message);
        }
    })
    .catch(error => {
        console.error('Error loading events:', error);
    });
}

/**
 * Display events in the events grid
 */
function displayEvents(events) {
    const eventsGrid = document.querySelector('.events-grid');
    if (!eventsGrid) return;
    
    if (events.length === 0) {
        eventsGrid.innerHTML = `
            <div class="no-events" style="grid-column: 1 / -1; text-align: center; padding: 3rem;">
                <i class="fas fa-calendar-times" style="font-size: 3rem; color: #ccc; margin-bottom: 1rem;"></i>
                <h3>No events found</h3>
                <p>Try adjusting your search criteria or check back later for new events.</p>
            </div>
        `;
        return;
    }
    
    eventsGrid.innerHTML = events.map(event => `
        <div class="event-card fade-in" data-event-id="${event.id}">
            <div class="event-image">
                🎂
            </div>
            <div class="event-content">
                <h3 class="event-title">${escapeHtml(event.title)}</h3>
                <div class="event-organizer">
                    <i class="fas fa-user"></i>
                    <span>${escapeHtml(event.organizer_name)}</span>
                </div>
                <div class="event-location">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>${escapeHtml(event.location)}</span>
                </div>
                <div class="event-date">
                    <i class="fas fa-calendar"></i>
                    <span>${formatDate(event.event_date)}</span>
                </div>
                <p class="event-description">${escapeHtml(event.description.substring(0, 100))}${event.description.length > 100 ? '...' : ''}</p>
                <div style="margin-top: 1rem;">
                    <a href="event_details.php?id=${event.id}" class="btn btn-primary" style="text-decoration: none;">
                        View Details
                    </a>
                </div>
            </div>
        </div>
    `).join('');
}

/**
 * Filter events based on search criteria
 */
function filterEvents() {
    const categoryFilter = document.getElementById('categoryFilter');
    const locationFilter = document.getElementById('locationFilter');
    const searchInput = document.getElementById('searchInput');
    
    let filtered = [...currentEvents];
    
    // Filter by category
    if (categoryFilter && categoryFilter.value) {
        filtered = filtered.filter(event => 
            event.category.toLowerCase() === categoryFilter.value.toLowerCase()
        );
    }
    
    // Filter by location
    if (locationFilter && locationFilter.value) {
        filtered = filtered.filter(event => 
            event.location.toLowerCase().includes(locationFilter.value.toLowerCase())
        );
    }
    
    // Filter by search query
    if (searchInput && searchInput.value.trim()) {
        const query = searchInput.value.toLowerCase().trim();
        filtered = filtered.filter(event => 
            event.title.toLowerCase().includes(query) ||
            event.description.toLowerCase().includes(query) ||
            event.organizer_name.toLowerCase().includes(query)
        );
    }
    
    filteredEvents = filtered;
    displayEvents(filteredEvents);
}

/**
 * Search events (debounced)
 */
function searchEvents() {
    filterEvents();
}

/**
 * View event details
 */
function viewEventDetails(eventId) {
    window.location.href = `event_details.php?id=${eventId}`;
}

/**
 * Setup video player functionality
 */
function setupVideoPlayer() {
    const videoPlayer = document.querySelector('.video-player');
    const playBtn = document.getElementById('playBtn');
    const stopBtn = document.getElementById('stopBtn');
    
    if (!videoPlayer || !playBtn || !stopBtn) return;
    
    let isPlaying = false;
    let playTimer;
    
    playBtn.addEventListener('click', function() {
        if (!isPlaying) {
            playVideo();
        }
    });
    
    stopBtn.addEventListener('click', function() {
        if (isPlaying) {
            stopVideo();
        }
    });
    
    function playVideo() {
        isPlaying = true;
        videoPlayer.innerHTML = `
            <div style="text-align: center;">
                <i class="fas fa-play-circle" style="font-size: 4rem; margin-bottom: 1rem;"></i>
                <p>🎉 Birthday Party Planning Tips Video Playing... 🎂</p>
                <p>Learn how to organize the perfect birthday celebration!</p>
            </div>
            <div class="video-controls">
                <button class="video-btn" id="playBtn" disabled>
                    <i class="fas fa-play"></i> Play
                </button>
                <button class="video-btn" id="stopBtn">
                    <i class="fas fa-stop"></i> Stop
                </button>
            </div>
        `;
        
        // Simulate 20-second video
        playTimer = setTimeout(() => {
            stopVideo();
        }, 20000);
        
        // Re-attach event listeners
        document.getElementById('stopBtn').addEventListener('click', stopVideo);
    }
    
    function stopVideo() {
        isPlaying = false;
        clearTimeout(playTimer);
        
        videoPlayer.innerHTML = `
            <div style="text-align: center;">
                <i class="fas fa-video" style="font-size: 4rem; margin-bottom: 1rem;"></i>
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
        `;
        
        // Re-attach event listeners
        document.getElementById('playBtn').addEventListener('click', playVideo);
    }
}

/**
 * Logout function
 */
function logout() {
    localStorage.removeItem('authToken');
    localStorage.removeItem('userType');
    currentUser = null;
    showMessage('Logged out successfully!', 'success');
    setTimeout(() => {
        window.location.href = 'index.html';
    }, 1500);
}

/**
 * Utility function to show loading state
 */
function showLoading(element) {
    const originalText = element.innerHTML;
    element.dataset.originalText = originalText;
    element.innerHTML = '<span class="loading"></span> Processing...';
    element.disabled = true;
}

/**
 * Utility function to hide loading state
 */
function hideLoading(element) {
    element.innerHTML = element.dataset.originalText || 'Submit';
    element.disabled = false;
}

/**
 * Utility function to show messages
 */
function showMessage(message, type = 'info') {
    // Remove existing messages
    const existingMessages = document.querySelectorAll('.message');
    existingMessages.forEach(msg => msg.remove());
    
    const messageDiv = document.createElement('div');
    messageDiv.className = `message ${type}`;
    messageDiv.textContent = message;
    
    // Insert at the top of main content or form container
    const container = document.querySelector('.form-container') || 
                     document.querySelector('.main-content') || 
                     document.querySelector('.container') ||
                     document.body;
    
    container.insertBefore(messageDiv, container.firstChild);
    
    // Auto-remove after 5 seconds
    setTimeout(() => {
        messageDiv.remove();
    }, 5000);
}

/**
 * Utility function to escape HTML
 */
function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

/**
 * Utility function to format dates
 */
function formatDate(dateString) {
    const options = { 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    };
    return new Date(dateString).toLocaleDateString('en-US', options);
}

/**
 * Utility function to validate password strength
 */
function validatePassword(password) {
    const minLength = 8;
    const hasUpperCase = /[A-Z]/.test(password);
    const hasLowerCase = /[a-z]/.test(password);
    const hasNumbers = /\d/.test(password);
    
    return password.length >= minLength && hasUpperCase && hasLowerCase && hasNumbers;
}

/**
 * Utility function for debouncing
 */
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

/**
 * Delete event (for organizers)
 */
function deleteEvent(eventId) {
    if (!confirm('Are you sure you want to delete this event?')) {
        return;
    }
    
    fetch('php/delete_event.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + localStorage.getItem('authToken')
        },
        body: JSON.stringify({ event_id: eventId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showMessage('Event deleted successfully!', 'success');
            loadEvents();
        } else {
            showMessage(data.message || 'Failed to delete event.', 'error');
        }
    })
    .catch(error => {
        console.error('Delete event error:', error);
        showMessage('An error occurred. Please try again.', 'error');
    });
}

/**
 * Update attendee status (for organizers)
 */
function updateAttendeeStatus(registrationId, status) {
    fetch('php/update_attendee_status.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + localStorage.getItem('authToken')
        },
        body: JSON.stringify({ 
            registration_id: registrationId, 
            status: status 
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showMessage('Attendee status updated successfully!', 'success');
            // Refresh the attendees list
            if (typeof loadAttendees === 'function') {
                loadAttendees();
            }
        } else {
            showMessage(data.message || 'Failed to update status.', 'error');
        }
    })
    .catch(error => {
        console.error('Update status error:', error);
        showMessage('An error occurred. Please try again.', 'error');
    });
}