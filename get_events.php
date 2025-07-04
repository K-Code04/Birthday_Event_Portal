<?php
/**
 * Get Events Handler
 * Birthday Event Portal - Event Listing API
 */

require_once 'config.php';

// Only allow GET requests
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    sendError('Method not allowed', 405);
}

try {
    // Get query parameters for filtering
    $category = sanitizeInput($_GET['category'] ?? '');
    $location = sanitizeInput($_GET['location'] ?? '');
    $search = sanitizeInput($_GET['search'] ?? '');
    $limit = intval($_GET['limit'] ?? 50);
    $offset = intval($_GET['offset'] ?? 0);

    // Build query with filters
    $whereConditions = ["e.status = 'active'", "e.event_date >= NOW()"];
    $params = [];

    if (!empty($category)) {
        $whereConditions[] = "e.category = ?";
        $params[] = $category;
    }

    if (!empty($location)) {
        $whereConditions[] = "e.location LIKE ?";
        $params[] = "%{$location}%";
    }

    if (!empty($search)) {
        $whereConditions[] = "(e.title LIKE ? OR e.description LIKE ? OR o.business_name LIKE ?)";
        $params[] = "%{$search}%";
        $params[] = "%{$search}%";
        $params[] = "%{$search}%";
    }

    $whereClause = implode(' AND ', $whereConditions);

    $sql = "
        SELECT 
            e.id,
            e.title,
            e.description,
            e.category,
            e.event_date,
            e.location,
            e.price,
            e.max_attendees,
            e.age_requirements,
            e.includes,
            e.special_notes,
            e.created_at,
            o.business_name as organizer_name,
            o.email as organizer_email,
            o.phone as organizer_phone,
            (SELECT COUNT(*) FROM event_registrations er WHERE er.event_id = e.id AND er.status = 'confirmed') as registered_count
        FROM events e
        JOIN organizers o ON e.organizer_id = o.id
        WHERE {$whereClause}
        ORDER BY e.event_date ASC
        LIMIT ? OFFSET ?
    ";

    $params[] = $limit;
    $params[] = $offset;

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $events = $stmt->fetchAll();

    // Get total count for pagination
    $countSql = "
        SELECT COUNT(*) as total
        FROM events e
        JOIN organizers o ON e.organizer_id = o.id
        WHERE {$whereClause}
    ";

    $countParams = array_slice($params, 0, -2); // Remove limit and offset
    $countStmt = $pdo->prepare($countSql);
    $countStmt->execute($countParams);
    $totalCount = $countStmt->fetch()['total'];

    sendSuccess([
        'events' => $events,
        'total_count' => $totalCount,
        'limit' => $limit,
        'offset' => $offset
    ], 'Events retrieved successfully');

} catch (PDOException $e) {
    error_log("Get events error: " . $e->getMessage());
    sendError('Failed to retrieve events');
} catch (Exception $e) {
    error_log("Get events error: " . $e->getMessage());
    sendError('An unexpected error occurred');
}
?>