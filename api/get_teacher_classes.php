
<?php
session_start();
include '../includes/config.php';

header('Content-Type: application/json');

$teacher_id = $_SESSION['user_id']; // Assuming the logged in user is a teacher

try {
    $stmt = $pdo->prepare("SELECT c.id, c.name FROM classes c JOIN teacher_classes tc ON c.id = tc.class_id WHERE tc.teacher_id = ? AND c.is_deleted = 0");
    $stmt->execute([$teacher_id]);
    $classes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($classes);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
