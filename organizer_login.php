<?php
/**
 * Organizer Login Handler
 * Birthday Event Portal - Organizer Authentication API
 */

require_once 'config.php';


// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendError('Method not allowed', 405);
}

try {
    // Get and validate input data
    $email = sanitizeInput($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $rememberMe = isset($_POST['remember_me']) ? true : false;

    // Validate required fields
    if (empty($email) || !validateEmail($email)) {
        sendError('Valid email address is required');
    }

    if (empty($password)) {
        sendError('Password is required');
    }

    // Check organizer credentials
    $stmt = $pdo->prepare("
        SELECT id, business_name, email, password_hash, status, approved, created_at
        FROM organizers 
        WHERE email = ?
    ");
    $stmt->execute([$email]);
    $organizer = $stmt->fetch();

    if (!$organizer || !verifyPassword($password, $organizer['password_hash'])) {
        sendError('Invalid email or password');
    }

    if ($organizer['status'] === 'inactive') {
        sendError('Account is inactive. Please contact support.');
    }

    if (!$organizer['approved']) {
        sendError('Account is pending approval. Please wait for admin verification.');
    }

    // Generate JWT token
    $tokenExpiry = time() + ($rememberMe ? JWT_EXPIRY * 30 : JWT_EXPIRY); // 30 days if remember me
    $payload = [
        'organizer_id' => $organizer['id'],
        'email' => $organizer['email'],
        'user_type' => 'organizer',
        'iat' => time(),
        'exp' => $tokenExpiry
    ];

    $token = generateJWT($payload);

    // Update last login
    $updateStmt = $pdo->prepare("UPDATE organizers SET last_login = NOW() WHERE id = ?");
    $updateStmt->execute([$organizer['id']]);

    // Log login activity
    $activityStmt = $pdo->prepare("
        INSERT INTO activity_log (organizer_id, action, description, created_at)
        VALUES (?, 'login', 'Organizer logged in', NOW())
    ");
    $activityStmt->execute([$organizer['id']]);

    sendSuccess([
        'token' => $token,
        'organizer' => [
            'id' => $organizer['id'],
            'business_name' => $organizer['business_name'],
            'email' => $organizer['email']
        ]
    ], 'Login successful');

} catch (PDOException $e) {
    error_log("Organizer login error: " . $e->getMessage());
    sendError('Login failed. Please try again.');
} catch (Exception $e) {
    error_log("Organizer login error: " . $e->getMessage());
    sendError('An unexpected error occurred');
}
?>
