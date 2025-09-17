
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_GET['academic_year_id']) ? $_GET['academic_year_id'] : 1;
$class_id = isset($_GET['class_id']) ? $_GET['class_id'] : 0;

if (empty($class_id)) {
    http_response_code(400);
    echo json_encode(['error' => 'Class is required']);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT id, CONCAT(first_name, ' ', last_name) as name, scholar_number, father_name, student_photo FROM students WHERE class_id = ? AND academic_year_id = ? AND is_deleted = 0");
    $stmt->execute([$class_id, $academic_year_id]);
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($students);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
