
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$staff_id = isset($_POST['staff_id']) ? $_POST['staff_id'] : 0;

if (empty($staff_id)) {
    http_response_code(400);
    echo json_encode(['error' => 'Staff ID is required']);
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE staff SET is_deleted = 1 WHERE id = ?");
    $stmt->execute([$staff_id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
