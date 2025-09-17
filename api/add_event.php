
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_POST['academic_year_id']) ? $_POST['academic_year_id'] : 1;
$title = isset($_POST['title']) ? $_POST['title'] : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';
$event_date = isset($_POST['event_date']) ? $_POST['event_date'] : '';

if (empty($title) || empty($event_date)) {
    http_response_code(400);
    echo json_encode(['error' => 'Title and date are required']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO events (title, description, event_date, academic_year_id) VALUES (?, ?, ?, ?)");
    $stmt->execute([$title, $description, $event_date, $academic_year_id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
