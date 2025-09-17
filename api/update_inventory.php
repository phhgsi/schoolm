
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$inventory_id = isset($_POST['inventory_id']) ? $_POST['inventory_id'] : 0;
$name = isset($_POST['name']) ? $_POST['name'] : '';
$category = isset($_POST['category']) ? $_POST['category'] : '';
$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 0;

if (empty($inventory_id) || empty($name) || empty($category) || empty($quantity)) {
    http_response_code(400);
    echo json_encode(['error' => 'All fields are required']);
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE inventory SET name = ?, category = ?, quantity = ? WHERE id = ?");
    $stmt->execute([$name, $category, $quantity, $inventory_id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
