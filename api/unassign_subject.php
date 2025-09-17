
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$class_subject_id = isset($_POST['class_subject_id']) ? $_POST['class_subject_id'] : 0;

if (empty($class_subject_id)) {
    http_response_code(400);
    echo json_encode(['error' => 'Class subject id is required']);
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE class_subjects SET is_deleted = 1 WHERE id = ?");
    $stmt->execute([$class_subject_id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
