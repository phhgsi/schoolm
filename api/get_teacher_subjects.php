
<?php
session_start();
include '../includes/config.php';

header('Content-Type: application/json');

$teacher_id = $_SESSION['user_id']; // Assuming the logged in user is a teacher
$class_id = isset($_GET['class_id']) ? $_GET['class_id'] : 0;

try {
    $stmt = $pdo->prepare("SELECT s.id, s.name FROM subjects s JOIN teacher_subjects ts ON s.id = ts.subject_id WHERE ts.teacher_id = ? AND ts.class_id = ? AND s.is_deleted = 0");
    $stmt->execute([$teacher_id, $class_id]);
    $subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($subjects);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
