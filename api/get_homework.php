
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_GET['academic_year_id']) ? $_GET['academic_year_id'] : 1;
$class_id = isset($_GET['class_id']) ? $_GET['class_id'] : 0;

try {
    $stmt = $pdo->prepare("SELECT h.*, c.name as class_name, s.name as subject_name FROM homework h JOIN classes c ON h.class_id = c.id JOIN subjects s ON h.subject_id = s.id WHERE h.academic_year_id = ? AND h.class_id = ? AND h.is_deleted = 0 ORDER BY h.due_date DESC");
    $stmt->execute([$academic_year_id, $class_id]);
    $homework = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($homework);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
