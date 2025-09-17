
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$inventory_id = isset($_POST['inventory_id']) ? $_POST['inventory_id'] : 0;

if (empty($inventory_id)) {
    http_response_code(400);
    echo json_encode(['error' => 'Inventory ID is required']);
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE inventory SET is_deleted = 1 WHERE id = ?");
    $stmt->execute([$inventory_id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
