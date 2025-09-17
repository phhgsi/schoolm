
<?php
session_start();
include '../includes/config.php';

header('Content-Type: application/json');

$student_id = $_SESSION['user_id']; // Assuming the logged in user is a student
$academic_year_id = 1; // Assuming current academic year

try {
    $stmt = $pdo->prepare("SELECT e.name as exam_name, s.name as subject_name, m.marks FROM marks m JOIN exams e ON m.exam_id = e.id JOIN subjects s ON m.subject_id = s.id WHERE m.student_id = ? AND m.academic_year_id = ?");
    $stmt->execute([$student_id, $academic_year_id]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_GROUP);
    echo json_encode($results);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
