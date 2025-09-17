
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_GET['academic_year_id']) ? $_GET['academic_year_id'] : 1;
$class_id = isset($_GET['class_id']) ? $_GET['class_id'] : 0;
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';

if (empty($class_id) || empty($start_date) || empty($end_date)) {
    http_response_code(400);
    echo json_encode(['error' => 'Class, start date and end date are required']);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT s.scholar_number, CONCAT(s.first_name, ' ', s.last_name) as name, a.attendance_date, a.status FROM attendance a JOIN students s ON a.student_id = s.id WHERE a.class_id = ? AND a.academic_year_id = ? AND a.attendance_date BETWEEN ? AND ? ORDER BY a.attendance_date, s.first_name");
    $stmt->execute([$class_id, $academic_year_id, $start_date, $end_date]);
    $report_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($report_data);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
