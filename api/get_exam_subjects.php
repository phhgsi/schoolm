
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_GET['academic_year_id']) ? $_GET['academic_year_id'] : 1;
$exam_id = isset($_GET['exam_id']) ? $_GET['exam_id'] : 0;
$class_id = isset($_GET['class_id']) ? $_GET['class_id'] : 0;

try {
    $stmt = $pdo->prepare("SELECT es.id, s.name as subject_name, es.exam_date, es.start_time, es.end_time FROM exam_subjects es JOIN subjects s ON es.subject_id = s.id WHERE es.exam_id = ? AND es.class_id = ? AND es.academic_year_id = ? AND es.is_deleted = 0 ORDER BY es.exam_date, es.start_time");
    $stmt->execute([$exam_id, $class_id, $academic_year_id]);
    $exam_subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($exam_subjects);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
