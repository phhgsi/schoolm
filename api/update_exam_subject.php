
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$exam_subject_id = isset($_POST['exam_subject_id']) ? $_POST['exam_subject_id'] : 0;
$exam_date = isset($_POST['exam_date']) ? $_POST['exam_date'] : '';
$start_time = isset($_POST['start_time']) ? $_POST['start_time'] : '';
$end_time = isset($_POST['end_time']) ? $_POST['end_time'] : '';

if (empty($exam_subject_id) || empty($exam_date) || empty($start_time) || empty($end_time)) {
    http_response_code(400);
    echo json_encode(['error' => 'All fields are required']);
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE exam_subjects SET exam_date = ?, start_time = ?, end_time = ? WHERE id = ?");
    $stmt->execute([$exam_date, $start_time, $end_time, $exam_subject_id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
