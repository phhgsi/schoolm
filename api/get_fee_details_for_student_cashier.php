
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_GET['academic_year_id']) ? $_GET['academic_year_id'] : 1;
$student_id = isset($_GET['student_id']) ? $_GET['student_id'] : 0;

if (empty($student_id)) {
    http_response_code(400);
    echo json_encode(['error' => 'Student id is required']);
    exit;
}

try {
    // Get student's class
    $stmt = $pdo->prepare("SELECT class_id FROM students WHERE id = ?");
    $stmt->execute([$student_id]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
    $class_id = $student['class_id'];

    // Get fee structures for the class
    $stmt = $pdo->prepare("SELECT id, fee_type, amount FROM fee_structures WHERE class_id = ? AND academic_year_id = ? AND is_deleted = 0");
    $stmt->execute([$class_id, $academic_year_id]);
    $fee_structures = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Get fee payments for the student
    $stmt = $pdo->prepare("SELECT fee_structure_id, SUM(amount_paid) as total_paid FROM fee_payments WHERE student_id = ? AND academic_year_id = ? GROUP BY fee_structure_id");
    $stmt->execute([$student_id, $academic_year_id]);
    $fee_payments = $stmt->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_GROUP);

    $response = [];
    foreach ($fee_structures as $fs) {
        $total_paid = isset($fee_payments[$fs['id']]) ? $fee_payments[$fs['id']][0]['total_paid'] : 0;
        $due_amount = $fs['amount'] - $total_paid;
        $response[] = [
            'fee_structure_id' => $fs['id'],
            'fee_type' => $fs['fee_type'],
            'amount' => $fs['amount'],
            'total_paid' => $total_paid,
            'due_amount' => $due_amount
        ];
    }

    echo json_encode($response);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
