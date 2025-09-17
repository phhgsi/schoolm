
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_GET['academic_year_id']) ? $_GET['academic_year_id'] : 1;

try {
    $stmt = $pdo->prepare("SELECT fs.id, c.name as class_name, fs.fee_type, fs.amount FROM fee_structures fs JOIN classes c ON fs.class_id = c.id WHERE fs.is_deleted = 0 AND fs.academic_year_id = ? ORDER BY c.name, fs.fee_type");
    $stmt->execute([$academic_year_id]);
    $fee_structures = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($fee_structures);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
