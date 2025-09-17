
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$image_id = isset($_POST['image_id']) ? $_POST['image_id'] : 0;

if (empty($image_id)) {
    http_response_code(400);
    echo json_encode(['error' => 'Image ID is required']);
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE gallery SET is_deleted = 1 WHERE id = ?");
    $stmt->execute([$image_id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
