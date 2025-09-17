
<?php
session_start();
include '../includes/config.php';

header('Content-Type: application/json');

$student_id = $_SESSION['user_id']; // Assuming the logged in user is a student

try {
    $stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
    $stmt->execute([$student_id]);
    $profile = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($profile);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
