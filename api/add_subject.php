
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_POST['academic_year_id']) ? $_POST['academic_year_id'] : 1;
$subject_name = isset($_POST['subject_name']) ? $_POST['subject_name'] : '';

if (empty($subject_name)) {
    http_response_code(400);
    echo json_encode(['error' => 'Subject name is required']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO subjects (name, academic_year_id) VALUES (?, ?)");
    $stmt->execute([$subject_name, $academic_year_id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
