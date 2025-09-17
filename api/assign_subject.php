
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_POST['academic_year_id']) ? $_POST['academic_year_id'] : 1;
$class_id = isset($_POST['class_id']) ? $_POST['class_id'] : 0;
$subject_id = isset($_POST['subject_id']) ? $_POST['subject_id'] : 0;

if (empty($class_id) || empty($subject_id)) {
    http_response_code(400);
    echo json_encode(['error' => 'Class and subject are required']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO class_subjects (class_id, subject_id, academic_year_id) VALUES (?, ?, ?)");
    $stmt->execute([$class_id, $subject_id, $academic_year_id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
