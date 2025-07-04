<?php
require_once 'config.php';

// Insert demo organizers
    $demoOrganizers = [
        [
            'business_name' => "Sarah's Event Planning",
            'email' => 'organizer@demo.com',
            'phone' => '0111 356-3636',
            'password_hash' => hashPassword('Organizer123!'),
            'contact_person' => 'Sarah Wilson',
            'address' => '123 Party Street, KLCC, KL 10001',
            'city' => 'KLCC',
            'description' => 'Professional birthday party organizer with 8+ years of experience creating magical celebrations.',
            'experience_years' => 8,
            'approved' => 1
        ],
        [
            'business_name' => 'GameZone Events',
            'email' => 'gamezone@demo.com',
            'phone' => '0111 346-5674',
            'password_hash' => hashPassword('GameZone123!'),
            'contact_person' => 'Mike Chen',
            'address' => '456 Tech Avenue, CyberJaya, Selangor 60001',
            'city' => 'Cyberjaya',
            'description' => 'Gaming party specialists for teens and young adults.',
            'experience_years' => 5,
            'approved' => 1
        ]
    ];

    foreach ($demoOrganizers as $organizer) {
        $stmt = $pdo->prepare("
            INSERT IGNORE INTO organizers (
                business_name, email, phone, password_hash, contact_person,
                address, city, description, experience_years, approved
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $organizer['business_name'],
            $organizer['email'],
            $organizer['phone'],
            $organizer['password_hash'],
            $organizer['contact_person'],
            $organizer['address'],
            $organizer['city'],
            $organizer['description'],
            $organizer['experience_years'],
            $organizer['approved']
        ]);
    }
?>