<?php
/**
 * User Registration Handler
 * Birthday Event Portal - User Registration API
 */

require_once 'config.php';


// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendError('Method not allowed', 405);
}

try {
    // Get and validate input data
    $fullName = sanitizeInput($_POST['full_name'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    $phone = sanitizeInput($_POST['phone'] ?? '');
    $password = $_POST['password'] ?? '';
    $dateOfBirth = $_POST['date_of_birth'] ?? null;
    $city = sanitizeInput($_POST['city'] ?? '');
    $interests = sanitizeInput($_POST['interests'] ?? '');
    $newsletter = isset($_POST['newsletter']) ? 1 : 0;
    $termsAgreed = isset($_POST['terms_agreed']) ? 1 : 0;

    // Validate required fields
    if (empty($fullName)) {
        sendError('Full name is required');
    }

    if (empty($email) || !validateEmail($email)) {
        sendError('Valid email address is required');
    }

    if (empty($phone)) {
        sendError('Phone number is required');
    }

    if (empty($password)) {
        sendError('Password is required');
    }

    if (!$termsAgreed) {
        sendError('You must agree to the terms and conditions');
    }

    // Validate password strength
    if (strlen($password) < 8) {
        sendError('Password must be at least 8 characters long');
    }

    if (!preg_match('/[A-Z]/', $password)) {
        sendError('Password must contain at least one uppercase letter');
    }

    if (!preg_match('/[a-z]/', $password)) {
        sendError('Password must contain at least one lowercase letter');
    }

    if (!preg_match('/[0-9]/', $password)) {
        sendError('Password must contain at least one number');
    }

    // Check if email already exists
    $checkStmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $checkStmt->execute([$email]);
    
    if ($checkStmt->fetch()) {
        sendError('Email address is already registered');
    }

    // Hash password
    $hashedPassword = hashPassword($password);

    // Insert new user
    $insertStmt = $pdo->prepare("
        INSERT INTO users (
            full_name, email, phone, password_hash, date_of_birth, 
            city, interests, newsletter_subscribed, created_at
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())
    ");

    $insertStmt->execute([
        $fullName,
        $email,
        $phone,
        $hashedPassword,
        $dateOfBirth ?: null,
        $city,
        $interests,
        $newsletter
    ]);

    $userId = $pdo->lastInsertId();

    // Log registration activity
    $activityStmt = $pdo->prepare("
        INSERT INTO activity_log (user_id, action, description, created_at)
        VALUES (?, 'registration', 'User account created', NOW())
    ");
    $activityStmt->execute([$userId]);

    sendSuccess([
        'user_id' => $userId,
        'email' => $email,
        'full_name' => $fullName
    ], 'Account created successfully');

} catch (PDOException $e) {
    error_log("Registration error: " . $e->getMessage());
    sendError('Registration failed. Please try again.');
} catch (Exception $e) {
    error_log("Registration error: " . $e->getMessage());
    sendError('An unexpected error occurred');
}
?>

