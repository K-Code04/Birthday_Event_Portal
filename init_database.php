<?php
/**
 * Database Initialization Script
 * Birthday Event Portal - Creates database tables and sample data
 */

require_once 'config.php';

try {
    // Create users table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            full_name VARCHAR(100) NOT NULL,
            email VARCHAR(100) UNIQUE NOT NULL,
            phone VARCHAR(20) NOT NULL,
            password_hash VARCHAR(255) NOT NULL,
            date_of_birth DATE NULL,
            city VARCHAR(50) NULL,
            interests VARCHAR(100) NULL,
            newsletter_subscribed TINYINT DEFAULT 0,
            user_type ENUM('user', 'admin') DEFAULT 'user',
            status ENUM('active', 'inactive') DEFAULT 'active',
            last_login TIMESTAMP NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ");

    // Create organizers table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS organizers (
            id INT AUTO_INCREMENT PRIMARY KEY,
            business_name VARCHAR(100) NOT NULL,
            email VARCHAR(100) UNIQUE NOT NULL,
            phone VARCHAR(20) NOT NULL,
            password_hash VARCHAR(255) NOT NULL,
            contact_person VARCHAR(100) NOT NULL,
            address TEXT NULL,
            city VARCHAR(50) NULL,
            description TEXT NULL,
            experience_years INT DEFAULT 0,
            approved TINYINT DEFAULT 0,
            status ENUM('active', 'inactive') DEFAULT 'active',
            last_login TIMESTAMP NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ");

    // Create events table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS events (
            id INT AUTO_INCREMENT PRIMARY KEY,
            organizer_id INT NOT NULL,
            title VARCHAR(200) NOT NULL,
            description TEXT NOT NULL,
            category VARCHAR(50) NOT NULL,
            event_date DATETIME NOT NULL,
            location VARCHAR(200) NOT NULL,
            price DECIMAL(10,2) NOT NULL,
            max_attendees INT NOT NULL,
            age_requirements VARCHAR(50) NULL,
            includes TEXT NULL,
            special_notes TEXT NULL,
            status ENUM('draft', 'active', 'cancelled', 'completed') DEFAULT 'draft',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (organizer_id) REFERENCES organizers(id) ON DELETE CASCADE
        )
    ");

    // Create event_registrations table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS event_registrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            event_id INT NOT NULL,
            user_id INT NOT NULL,
            child_name VARCHAR(100) NOT NULL,
            child_age INT NOT NULL,
            parent_name VARCHAR(100) NOT NULL,
            parent_email VARCHAR(100) NOT NULL,
            parent_phone VARCHAR(20) NOT NULL,
            guest_count INT DEFAULT 1,
            special_requests TEXT NULL,
            status ENUM('confirmed', 'waiting_list', 'cancelled') DEFAULT 'confirmed',
            registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
            UNIQUE KEY unique_user_event (user_id, event_id)
        )
    ");

    // Create activity_log table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS activity_log (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NULL,
            organizer_id INT NULL,
            event_id INT NULL,
            action VARCHAR(50) NOT NULL,
            description TEXT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
            FOREIGN KEY (organizer_id) REFERENCES organizers(id) ON DELETE SET NULL,
            FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE SET NULL
        )
    ");

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

    // Insert demo organizers
    $demoOrganizers = [
        [
            'business_name' => "Sarah's Event Planning",
            'email' => 'organizer@demo.com',
            'phone' => '(555) 234-5678',
            'password_hash' => hashPassword('Organizer123!'),
            'contact_person' => 'Sarah Wilson',
            'address' => '123 Party Street, New York, NY 10001',
            'city' => 'New York',
            'description' => 'Professional birthday party organizer with 8+ years of experience creating magical celebrations.',
            'experience_years' => 8,
            'approved' => 1
        ],
        [
            'business_name' => 'GameZone Events',
            'email' => 'gamezone@demo.com',
            'phone' => '(555) 345-6789',
            'password_hash' => hashPassword('GameZone123!'),
            'contact_person' => 'Mike Chen',
            'address' => '456 Tech Avenue, Chicago, IL 60601',
            'city' => 'Chicago',
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

    // Insert demo events
    $demoEvents = [
        [
            'organizer_id' => 1,
            'title' => 'Magical Princess Birthday Party',
            'description' => 'Join us for a magical princess-themed birthday party that will create unforgettable memories for your little one! This enchanting celebration features princess performers, dress-up activities, and royal entertainment.',
            'category' => 'Kids Party',
            'event_date' => '2024-01-15 14:00:00',
            'location' => 'Rainbow Community Center, New York',
            'price' => 45.00,
            'max_attendees' => 20,
            'age_requirements' => 'Ages 4-8',
            'includes' => 'Princess performer, decorations, cake, party favors',
            'status' => 'active'
        ],
        [
            'organizer_id' => 2,
            'title' => 'Teen Gaming Birthday Tournament',
            'description' => 'Epic gaming tournament birthday party for teenagers with the latest video games, prizes, and pizza party.',
            'category' => 'Teen Birthday',
            'event_date' => '2024-01-25 16:00:00',
            'location' => 'Tech Arena, Chicago',
            'price' => 30.00,
            'max_attendees' => 15,
            'age_requirements' => 'Ages 13-17',
            'includes' => 'Gaming stations, pizza, drinks, prizes',
            'status' => 'active'
        ],
        [
            'organizer_id' => 1,
            'title' => 'Unicorn Theme Birthday Extravaganza',
            'description' => 'Magical unicorn-themed birthday party with rainbow decorations, unicorn crafts, and mystical entertainment.',
            'category' => 'Theme Party',
            'event_date' => '2024-02-01 13:00:00',
            'location' => 'Fairy Tale Gardens, Miami',
            'price' => 50.00,
            'max_attendees' => 25,
            'age_requirements' => 'Ages 4-10',
            'includes' => 'Unicorn decorations, crafts, entertainment, cake',
            'status' => 'active'
        ],
        [
            'organizer_id' => 1,
            'title' => 'Circus Birthday Spectacular',
            'description' => 'Amazing circus-themed birthday party with clowns, acrobats, balloon animals, and carnival games for all ages.',
            'category' => 'Theme Party',
            'event_date' => '2024-02-05 15:00:00',
            'location' => 'Central Park Pavilion, New York',
            'price' => 55.00,
            'max_attendees' => 30,
            'age_requirements' => 'All ages welcome',
            'includes' => 'Circus performers, games, balloon animals, snacks',
            'status' => 'active'
        ]
    ];

    foreach ($demoEvents as $event) {
        $stmt = $pdo->prepare("
            INSERT IGNORE INTO events (
                organizer_id, title, description, category, event_date,
                location, price, max_attendees, age_requirements, includes, status
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $event['organizer_id'],
            $event['title'],
            $event['description'],
            $event['category'],
            $event['event_date'],
            $event['location'],
            $event['price'],
            $event['max_attendees'],
            $event['age_requirements'],
            $event['includes'],
            $event['status']
        ]);
    }

    echo json_encode([
        'success' => true,
        'message' => 'Database initialized successfully with sample data'
    ]);

} catch (PDOException $e) {
    error_log("Database initialization error: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Database initialization failed: ' . $e->getMessage()
    ]);
} catch (Exception $e) {
    error_log("Database initialization error: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'An unexpected error occurred'
    ]);
}
?>