
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$exam_subject_id = isset($_POST['exam_subject_id']) ? $_POST['exam_subject_id'] : 0;

if (empty($exam_subject_id)) {
    http_response_code(400);
    echo json_encode(['error' => 'Exam subject id is required']);
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE exam_subjects SET is_deleted = 1 WHERE id = ?");
    $stmt->execute([$exam_subject_id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
