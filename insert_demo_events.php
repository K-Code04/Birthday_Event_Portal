<?php
require_once 'config.php';


// Insert demo events
    $demoEvents = [
        [
            'organizer_id' => 1,
            'title' => 'Magical Princess Birthday Party',
            'description' => 'Join us for a magical princess-themed birthday party that will create unforgettable memories for your little one! This enchanting celebration features princess performers, dress-up activities, and royal entertainment.',
            'category' => 'Kids Party',
            'event_date' => '2025-01-15 14:00:00',
            'location' => 'Rainbow Community Center, Cyber Jaya',
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
            'event_date' => '2025-01-25 16:00:00',
            'location' => 'Tech Arena, Bandar Saujana Putra',
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
            'event_date' => '2025-02-01 13:00:00',
            'location' => 'Fairy Tale Gardens, Putra Jaya',
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
            'event_date' => '2025-02-05 15:00:00',
            'location' => 'Central Park Pavilion, Bukit Jalil',
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
?>
