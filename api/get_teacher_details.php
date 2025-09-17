
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$teacher_id = isset($_GET['id']) ? $_GET['id'] : 0;

if (empty($teacher_id)) {
    http_response_code(400);
    echo json_encode(['error' => 'Teacher ID is required']);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT * FROM teachers WHERE id = ?");
    $stmt->execute([$teacher_id]);
    $teacher = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($teacher);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
