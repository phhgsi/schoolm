
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_GET['academic_year_id']) ? $_GET['academic_year_id'] : 1;

try {
    $stmt = $pdo->prepare("SELECT s.scholar_number, CONCAT(s.first_name, ' ', s.last_name) as name, c.name as class_name, fs.fee_type, (fs.amount - IFNULL(fp.total_paid, 0)) as due_amount FROM students s JOIN classes c ON s.class_id = c.id JOIN fee_structures fs ON s.class_id = fs.class_id LEFT JOIN (SELECT student_id, fee_structure_id, SUM(amount_paid) as total_paid FROM fee_payments GROUP BY student_id, fee_structure_id) fp ON s.id = fp.student_id AND fs.id = fp.fee_structure_id WHERE s.is_deleted = 0 AND s.academic_year_id = ? AND (fs.amount - IFNULL(fp.total_paid, 0)) > 0 ORDER BY s.first_name");
    $stmt->execute([$academic_year_id]);
    $pending_fees = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($pending_fees);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
