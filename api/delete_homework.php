
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$homework_id = isset($_POST['homework_id']) ? $_POST['homework_id'] : 0;

if (empty($homework_id)) {
    http_response_code(400);
    echo json_encode(['error' => 'Homework ID is required']);
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE homework SET is_deleted = 1 WHERE id = ?");
    $stmt->execute([$homework_id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
