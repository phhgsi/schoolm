
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$child_id = isset($_GET['child_id']) ? $_GET['child_id'] : 0;

if (empty($child_id)) {
    http_response_code(400);
    echo json_encode(['error' => 'Child ID is required']);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
    $stmt->execute([$child_id]);
    $profile = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($profile);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
