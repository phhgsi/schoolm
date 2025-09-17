
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_POST['academic_year_id']) ? $_POST['academic_year_id'] : 1;
$exam_name = isset($_POST['exam_name']) ? $_POST['exam_name'] : '';

if (empty($exam_name)) {
    http_response_code(400);
    echo json_encode(['error' => 'Exam name is required']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO exams (name, academic_year_id) VALUES (?, ?)");
    $stmt->execute([$exam_name, $academic_year_id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
