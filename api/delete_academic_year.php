
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$id = isset($_POST['id']) ? $_POST['id'] : 0;

if (empty($id)) {
    http_response_code(400);
    echo json_encode(['error' => 'ID is required']);
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE academic_year SET is_deleted = 1 WHERE id = ?");
    $stmt->execute([$id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
