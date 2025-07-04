<?php
/**
 * Event Registration Handler
 * Birthday Event Portal - Event Registration API
 */

require_once 'config.php';

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendError('Method not allowed', 405);
}

// Authenticate user
$user = authenticateUser();

try {
    // Get and validate input data
    $eventId = intval($_POST['event_id'] ?? 0);
    $childName = sanitizeInput($_POST['child_name'] ?? '');
    $childAge = intval($_POST['child_age'] ?? 0);
    $parentName = sanitizeInput($_POST['parent_name'] ?? '');
    $parentEmail = sanitizeInput($_POST['parent_email'] ?? '');
    $parentPhone = sanitizeInput($_POST['parent_phone'] ?? '');
    $guestCount = intval($_POST['guest_count'] ?? 1);
    $specialRequests = sanitizeInput($_POST['special_requests'] ?? '');

    // Validate required fields
    if ($eventId <= 0) {
        sendError('Valid event ID is required');
    }

    if (empty($childName)) {
        sendError('Child name is required');
    }

    if ($childAge <= 0 || $childAge > 18) {
        sendError('Valid child age is required');
    }

    if (empty($parentName)) {
        sendError('Parent/Guardian name is required');
    }

    if (empty($parentEmail) || !validateEmail($parentEmail)) {
        sendError('Valid parent email is required');
    }

    if (empty($parentPhone)) {
        sendError('Parent phone number is required');
    }

    // Check if event exists and is active
    $eventStmt = $pdo->prepare("
        SELECT id, title, max_attendees, event_date, price, organizer_id
        FROM events 
        WHERE id = ? AND status = 'active' AND event_date > NOW()
    ");
    $eventStmt->execute([$eventId]);
    $event = $eventStmt->fetch();

    if (!$event) {
        sendError('Event not found or no longer available');
    }

    // Check if user already registered for this event
    $existingStmt = $pdo->prepare("
        SELECT id FROM event_registrations 
        WHERE event_id = ? AND user_id = ? AND status != 'cancelled'
    ");
    $existingStmt->execute([$eventId, $user['user_id']]);

    if ($existingStmt->fetch()) {
        sendError('You are already registered for this event');
    }

    // Check current registration count
    $countStmt = $pdo->prepare("
        SELECT COUNT(*) as count 
        FROM event_registrations 
        WHERE event_id = ? AND status = 'confirmed'
    ");
    $countStmt->execute([$eventId]);
    $currentCount = $countStmt->fetch()['count'];

    // Determine registration status
    $status = ($currentCount < $event['max_attendees']) ? 'confirmed' : 'waiting_list';

    // Insert registration
    $insertStmt = $pdo->prepare("
        INSERT INTO event_registrations (
            event_id, user_id, child_name, child_age, parent_name, 
            parent_email, parent_phone, guest_count, special_requests, 
            status, registered_at
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())
    ");

    $insertStmt->execute([
        $eventId,
        $user['user_id'],
        $childName,
        $childAge,
        $parentName,
        $parentEmail,
        $parentPhone,
        $guestCount,
        $specialRequests,
        $status
    ]);

    $registrationId = $pdo->lastInsertId();

    // Log registration activity
    $activityStmt = $pdo->prepare("
        INSERT INTO activity_log (
            user_id, action, description, event_id, created_at
        ) VALUES (?, 'event_registration', ?, ?, NOW())
    ");
    $activityStmt->execute([
        $user['user_id'],
        "Registered for event: {$event['title']}",
        $eventId
    ]);

    $message = ($status === 'confirmed') 
        ? 'Registration confirmed! You will receive a confirmation email.'
        : 'You have been added to the waiting list. We will notify you if a spot becomes available.';

    sendSuccess([
        'registration_id' => $registrationId,
        'status' => $status,
        'event_title' => $event['title'],
        'event_date' => $event['event_date']
    ], $message);

} catch (PDOException $e) {
    error_log("Event registration error: " . $e->getMessage());
    sendError('Registration failed. Please try again.');
} catch (Exception $e) {
    error_log("Event registration error: " . $e->getMessage());
    sendError('An unexpected error occurred');
}
?> 

