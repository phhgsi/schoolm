
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$event_id = isset($_POST['event_id']) ? $_POST['event_id'] : 0;
$title = isset($_POST['title']) ? $_POST['title'] : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';
$event_date = isset($_POST['event_date']) ? $_POST['event_date'] : '';

if (empty($event_id) || empty($title) || empty($event_date)) {
    http_response_code(400);
    echo json_encode(['error' => 'Event ID, title and date are required']);
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE events SET title = ?, description = ?, event_date = ? WHERE id = ?");
    $stmt->execute([$title, $description, $event_date, $event_id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
