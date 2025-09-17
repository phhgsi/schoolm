
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_GET['academic_year_id']) ? $_GET['academic_year_id'] : 1;
$class_id = isset($_GET['class_id']) ? $_GET['class_id'] : 0;
$subject_id = isset($_GET['subject_id']) ? $_GET['subject_id'] : 0;
$exam_id = isset($_GET['exam_id']) ? $_GET['exam_id'] : 0;

try {
    $stmt = $pdo->prepare("SELECT s.id, s.scholar_number, CONCAT(s.first_name, ' ', s.last_name) as name, m.marks FROM students s LEFT JOIN marks m ON s.id = m.student_id AND m.subject_id = ? AND m.exam_id = ? WHERE s.class_id = ? AND s.academic_year_id = ? AND s.is_deleted = 0 ORDER BY s.first_name");
    $stmt->execute([$subject_id, $exam_id, $class_id, $academic_year_id]);
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($students);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
