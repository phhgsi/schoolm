
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_POST['academic_year_id']) ? $_POST['academic_year_id'] : 1;
$student_id = isset($_POST['student_id']) ? $_POST['student_id'] : 0;
$fee_structure_id = isset($_POST['fee_structure_id']) ? $_POST['fee_structure_id'] : 0;
$amount_paid = isset($_POST['amount_paid']) ? $_POST['amount_paid'] : 0;
$payment_date = isset($_POST['payment_date']) ? $_POST['payment_date'] : date('Y-m-d');

if (empty($student_id) || empty($fee_structure_id) || empty($amount_paid)) {
    http_response_code(400);
    echo json_encode(['error' => 'All fields are required']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO fee_payments (student_id, fee_structure_id, amount_paid, payment_date, academic_year_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$student_id, $fee_structure_id, $amount_paid, $payment_date, $academic_year_id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
