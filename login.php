<?php
/**
 * User Login Handler
 * Birthday Event Portal - User Authentication API
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

    // Check user credentials
    $stmt = $pdo->prepare("
        SELECT id, full_name, email, password_hash, status, created_at
        FROM users 
        WHERE email = ? AND user_type = 'user'
    ");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user || !verifyPassword($password, $user['password_hash'])) {
        sendError('Invalid email or password');
    }

    if ($user['status'] === 'inactive') {
        sendError('Account is inactive. Please contact support.');
    }

    // Generate JWT token
    $tokenExpiry = time() + ($rememberMe ? JWT_EXPIRY * 30 : JWT_EXPIRY); // 30 days if remember me
    $payload = [
        'user_id' => $user['id'],
        'email' => $user['email'],
        'user_type' => 'user',
        'iat' => time(),
        'exp' => $tokenExpiry
    ];

    $token = generateJWT($payload);

    // Update last login
    $updateStmt = $pdo->prepare("UPDATE users SET last_login = NOW() WHERE id = ?");
    $updateStmt->execute([$user['id']]);

    // Log login activity
    $activityStmt = $pdo->prepare("
        INSERT INTO activity_log (user_id, action, description, created_at)
        VALUES (?, 'login', 'User logged in', NOW())
    ");
    $activityStmt->execute([$user['id']]);

    sendSuccess([
        'token' => $token,
        'user' => [
            'id' => $user['id'],
            'full_name' => $user['full_name'],
            'email' => $user['email']
        ]
    ], 'Login successful');

} catch (PDOException $e) {
    error_log("Login error: " . $e->getMessage());
    sendError('Login failed. Please try again.');
} catch (Exception $e) {
    error_log("Login error: " . $e->getMessage());
    sendError('An unexpected error occurred');
}
?>


