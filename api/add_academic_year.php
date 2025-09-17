
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$year = isset($_POST['year']) ? $_POST['year'] : '';

if (empty($year)) {
    http_response_code(400);
    echo json_encode(['error' => 'Academic year is required']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO academic_year (year) VALUES (?)");
    $stmt->execute([$year]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
