
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_GET['academic_year_id']) ? $_GET['academic_year_id'] : 1;
$class_id = isset($_GET['class_id']) ? $_GET['class_id'] : 0;

try {
    $stmt = $pdo->prepare("SELECT id, CONCAT(first_name, ' ', last_name) as name FROM students WHERE is_deleted = 0 AND academic_year_id = ? AND class_id = ? ORDER BY first_name");
    $stmt->execute([$academic_year_id, $class_id]);
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($students);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
