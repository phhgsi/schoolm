
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_POST['academic_year_id']) ? $_POST['academic_year_id'] : 1;
$class_id = isset($_POST['class_id']) ? $_POST['class_id'] : 0;
$fee_type = isset($_POST['fee_type']) ? $_POST['fee_type'] : '';
$amount = isset($_POST['amount']) ? $_POST['amount'] : 0;

if (empty($class_id) || empty($fee_type) || empty($amount)) {
    http_response_code(400);
    echo json_encode(['error' => 'All fields are required']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO fee_structures (class_id, fee_type, amount, academic_year_id) VALUES (?, ?, ?, ?)");
    $stmt->execute([$class_id, $fee_type, $amount, $academic_year_id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
