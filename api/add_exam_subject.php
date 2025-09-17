
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_POST['academic_year_id']) ? $_POST['academic_year_id'] : 1;
$exam_id = isset($_POST['exam_id']) ? $_POST['exam_id'] : 0;
$class_id = isset($_POST['class_id']) ? $_POST['class_id'] : 0;
$subject_id = isset($_POST['subject_id']) ? $_POST['subject_id'] : 0;
$exam_date = isset($_POST['exam_date']) ? $_POST['exam_date'] : '';
$start_time = isset($_POST['start_time']) ? $_POST['start_time'] : '';
$end_time = isset($_POST['end_time']) ? $_POST['end_time'] : '';

if (empty($exam_id) || empty($class_id) || empty($subject_id) || empty($exam_date) || empty($start_time) || empty($end_time)) {
    http_response_code(400);
    echo json_encode(['error' => 'All fields are required']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO exam_subjects (exam_id, class_id, subject_id, exam_date, start_time, end_time, academic_year_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$exam_id, $class_id, $subject_id, $exam_date, $start_time, $end_time, $academic_year_id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
