
<?php
include '../includes/config.php';

header('Content-Type: application/json');

try {
    $stmt = $pdo->query("SELECT * FROM academic_year WHERE is_deleted = 0 ORDER BY year DESC");
    $years = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($years);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
