
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$student_id = isset($_GET['id']) ? $_GET['id'] : 0;

if (empty($student_id)) {
    http_response_code(400);
    echo json_encode(['error' => 'Student ID is required']);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT s.*, c.name as class_name FROM students s JOIN classes c ON s.class_id = c.id WHERE s.id = ?");
    $stmt->execute([$student_id]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($student);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
