
<?php
session_start();
include '../includes/config.php';

header('Content-Type: application/json');

$student_id = $_SESSION['user_id']; // Assuming the logged in user is a student
$academic_year_id = 1; // Assuming current academic year

try {
    $stmt = $pdo->prepare("SELECT fs.fee_type, fp.amount_paid, fp.payment_date FROM fee_payments fp JOIN fee_structures fs ON fp.fee_structure_id = fs.id WHERE fp.student_id = ? AND fp.academic_year_id = ? ORDER BY fp.payment_date DESC");
    $stmt->execute([$student_id, $academic_year_id]);
    $fees = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($fees);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
