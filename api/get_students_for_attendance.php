
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_GET['academic_year_id']) ? $_GET['academic_year_id'] : 1;
$class_id = isset($_GET['class_id']) ? $_GET['class_id'] : 0;
$attendance_date = isset($_GET['attendance_date']) ? $_GET['attendance_date'] : date('Y-m-d');

try {
    $stmt = $pdo->prepare("SELECT s.id, s.scholar_number, CONCAT(s.first_name, ' ', s.last_name) as name, a.status FROM students s LEFT JOIN attendance a ON s.id = a.student_id AND a.attendance_date = ? WHERE s.class_id = ? AND s.academic_year_id = ? AND s.is_deleted = 0 ORDER BY s.first_name");
    $stmt->execute([$attendance_date, $class_id, $academic_year_id]);
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($students);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
