<?php
require_once 'config.php'; // Include your config and DB connection


// Insert demo users
$demoUsers = [
    [
        'full_name' => 'Sarah Johnson',
        'email' => 'user@demo.com',
        'phone' => '0111 635-5032',
        'password_hash' => hashPassword('Demo123!'),
        'city' => 'Kuala Lumpur',
        'interests' => 'Kids Parties',
        'newsletter_subscribed' => 1
    ],
    [
        'full_name' => 'Admin User',
        'email' => 'admin@demo.com',
        'phone' => '0111 546-6573',
        'password_hash' => hashPassword('Admin123!'),
        'city' => 'Kuala Lumpur',
        'interests' => 'All Events',
        'user_type' => 'admin',
        'newsletter_subscribed' => 1
    ]
];

foreach ($demoUsers as $user) {
    $stmt = $pdo->prepare("
        INSERT IGNORE INTO users (
            full_name, email, phone, password_hash, city, 
            interests, user_type, newsletter_subscribed
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->execute([
        $user['full_name'],
        $user['email'],
        $user['phone'],
        $user['password_hash'],
        $user['city'],
        $user['interests'],
        $user['user_type'] ?? 'user',
        $user['newsletter_subscribed']
    ]);
}

echo "Demo users inserted successfully.";
?>
