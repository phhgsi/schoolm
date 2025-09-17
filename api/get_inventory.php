
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_GET['academic_year_id']) ? $_GET['academic_year_id'] : 1;

try {
    $stmt = $pdo->prepare("SELECT * FROM inventory WHERE academic_year_id = ? AND is_deleted = 0 ORDER BY name");
    $stmt->execute([$academic_year_id]);
    $inventory = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($inventory);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
