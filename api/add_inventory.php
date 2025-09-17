
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_POST['academic_year_id']) ? $_POST['academic_year_id'] : 1;
$name = isset($_POST['name']) ? $_POST['name'] : '';
$category = isset($_POST['category']) ? $_POST['category'] : '';
$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 0;

if (empty($name) || empty($category) || empty($quantity)) {
    http_response_code(400);
    echo json_encode(['error' => 'All fields are required']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO inventory (name, category, quantity, academic_year_id) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $category, $quantity, $academic_year_id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
