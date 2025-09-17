
<?php
session_start();
include '../includes/config.php';

header('Content-Type: application/json');

$student_id = $_SESSION['user_id']; // Assuming the logged in user is a student
$academic_year_id = 1; // Assuming current academic year

try {
    $stmt = $pdo->prepare("SELECT attendance_date, status FROM attendance WHERE student_id = ? AND academic_year_id = ? ORDER BY attendance_date DESC");
    $stmt->execute([$student_id, $academic_year_id]);
    $attendance = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($attendance);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
