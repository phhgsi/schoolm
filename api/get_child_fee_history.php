
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$child_id = isset($_GET['child_id']) ? $_GET['child_id'] : 0;
$academic_year_id = 1; // Assuming current academic year

if (empty($child_id)) {
    http_response_code(400);
    echo json_encode(['error' => 'Child ID is required']);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT fs.fee_type, fp.amount_paid, fp.payment_date FROM fee_payments fp JOIN fee_structures fs ON fp.fee_structure_id = fs.id WHERE fp.student_id = ? AND fp.academic_year_id = ? ORDER BY fp.payment_date DESC");
    $stmt->execute([$child_id, $academic_year_id]);
    $fees = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($fees);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
