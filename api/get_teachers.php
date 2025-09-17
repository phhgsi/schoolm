
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_GET['academic_year_id']) ? $_GET['academic_year_id'] : 1;

try {
    $stmt = $pdo->prepare("SELECT id, employee_id, CONCAT(first_name, ' ', last_name) as name, email, mobile_number FROM teachers WHERE is_deleted = 0 AND academic_year_id = ? ORDER BY first_name");
    $stmt->execute([$academic_year_id]);
    $teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($teachers);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
