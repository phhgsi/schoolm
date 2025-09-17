
<?php
session_start();
include '../includes/config.php';

header('Content-Type: application/json');

$teacher_id = $_SESSION['user_id']; // Assuming the logged in user is a teacher

try {
    $stmt = $pdo->prepare("SELECT e.id, e.name FROM exams e JOIN exam_subjects es ON e.id = es.exam_id JOIN teacher_subjects ts ON es.subject_id = ts.subject_id WHERE ts.teacher_id = ? AND e.is_deleted = 0 GROUP BY e.id");
    $stmt->execute([$teacher_id]);
    $exams = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($exams);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
