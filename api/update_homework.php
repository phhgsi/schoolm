
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$homework_id = isset($_POST['homework_id']) ? $_POST['homework_id'] : 0;
$class_id = isset($_POST['class_id']) ? $_POST['class_id'] : 0;
$subject_id = isset($_POST['subject_id']) ? $_POST['subject_id'] : 0;
$title = isset($_POST['title']) ? $_POST['title'] : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';
$due_date = isset($_POST['due_date']) ? $_POST['due_date'] : '';

if (empty($homework_id) || empty($class_id) || empty($subject_id) || empty($title) || empty($due_date)) {
    http_response_code(400);
    echo json_encode(['error' => 'All fields are required']);
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE homework SET class_id = ?, subject_id = ?, title = ?, description = ?, due_date = ? WHERE id = ?");
    $stmt->execute([$class_id, $subject_id, $title, $description, $due_date, $homework_id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
