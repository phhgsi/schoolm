
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$event_id = isset($_POST['event_id']) ? $_POST['event_id'] : 0;

if (empty($event_id)) {
    http_response_code(400);
    echo json_encode(['error' => 'Event ID is required']);
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE events SET is_deleted = 1 WHERE id = ?");
    $stmt->execute([$event_id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
