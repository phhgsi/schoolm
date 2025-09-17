
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$id = isset($_POST['id']) ? $_POST['id'] : 0;
$year = isset($_POST['year']) ? $_POST['year'] : '';

if (empty($id) || empty($year)) {
    http_response_code(400);
    echo json_encode(['error' => 'ID and academic year are required']);
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE academic_year SET year = ? WHERE id = ?");
    $stmt->execute([$year, $id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
