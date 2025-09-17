
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_GET['academic_year_id']) ? $_GET['academic_year_id'] : 1;
$class_id = isset($_GET['class_id']) ? $_GET['class_id'] : 0;

try {
    $stmt = $pdo->prepare("SELECT s.id, s.name FROM subjects s JOIN class_subjects cs ON s.id = cs.subject_id WHERE cs.class_id = ? AND cs.academic_year_id = ? AND cs.is_deleted = 0");
    $stmt->execute([$class_id, $academic_year_id]);
    $subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($subjects);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
