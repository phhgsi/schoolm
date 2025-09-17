
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_POST['academic_year_id']) ? $_POST['academic_year_id'] : 1;
$class_id = isset($_POST['class_id']) ? $_POST['class_id'] : 0;
$subject_id = isset($_POST['subject_id']) ? $_POST['subject_id'] : 0;
$title = isset($_POST['title']) ? $_POST['title'] : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';
$due_date = isset($_POST['due_date']) ? $_POST['due_date'] : '';

if (empty($class_id) || empty($subject_id) || empty($title) || empty($due_date)) {
    http_response_code(400);
    echo json_encode(['error' => 'All fields are required']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO homework (class_id, subject_id, title, description, due_date, academic_year_id) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$class_id, $subject_id, $title, $description, $due_date, $academic_year_id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
