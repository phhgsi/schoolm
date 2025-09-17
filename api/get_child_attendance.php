
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$child_id = isset($_GET['child_id']) ? $_GET['child_id'] : 0;
$academic_year_id = 1; // Assuming current academic year

if (empty($child_id)) {
    http_response_code(400);
    echo json_encode(['error' => 'Child ID is required']);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT attendance_date, status FROM attendance WHERE student_id = ? AND academic_year_id = ? ORDER BY attendance_date DESC");
    $stmt->execute([$child_id, $academic_year_id]);
    $attendance = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($attendance);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
