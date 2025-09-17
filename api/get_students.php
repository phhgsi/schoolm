
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_GET['academic_year_id']) ? $_GET['academic_year_id'] : 1;

try {
    $stmt = $pdo->prepare("SELECT s.id, s.scholar_number, CONCAT(s.first_name, ' ', s.last_name) as name, c.name as class_name, s.father_name FROM students s JOIN classes c ON s.class_id = c.id WHERE s.is_deleted = 0 AND s.academic_year_id = ? ORDER BY s.first_name");
    $stmt->execute([$academic_year_id]);
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($students);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
