
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_GET['academic_year_id']) ? $_GET['academic_year_id'] : 1;

try {
    $stmt = $pdo->prepare("SELECT s.*, r.name as role_name FROM staff s JOIN users u ON s.user_id = u.id JOIN roles r ON u.role_id = r.id WHERE s.academic_year_id = ? AND s.is_deleted = 0 ORDER BY s.name");
    $stmt->execute([$academic_year_id]);
    $staff = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($staff);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
