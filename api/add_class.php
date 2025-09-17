
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_POST['academic_year_id']) ? $_POST['academic_year_id'] : 1;
$class_name = isset($_POST['class_name']) ? $_POST['class_name'] : '';

if (empty($class_name)) {
    http_response_code(400);
    echo json_encode(['error' => 'Class name is required']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO classes (name, academic_year_id) VALUES (?, ?)");
    $stmt->execute([$class_name, $academic_year_id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
