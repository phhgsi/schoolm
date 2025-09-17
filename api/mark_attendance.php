
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_POST['academic_year_id']) ? $_POST['academic_year_id'] : 1;
$student_id = isset($_POST['student_id']) ? $_POST['student_id'] : 0;
$class_id = isset($_POST['class_id']) ? $_POST['class_id'] : 0;
$attendance_date = isset($_POST['attendance_date']) ? $_POST['attendance_date'] : date('Y-m-d');
$status = isset($_POST['status']) ? $_POST['status'] : '';

if (empty($student_id) || empty($class_id) || empty($status)) {
    http_response_code(400);
    echo json_encode(['error' => 'Student, class and status are required']);
    exit;
}

try {
    // Check if attendance already marked for the student on the given date
    $stmt = $pdo->prepare("SELECT id FROM attendance WHERE student_id = ? AND attendance_date = ?");
    $stmt->execute([$student_id, $attendance_date]);
    $existing_attendance = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existing_attendance) {
        // Update existing attendance
        $stmt = $pdo->prepare("UPDATE attendance SET status = ? WHERE id = ?");
        $stmt->execute([$status, $existing_attendance['id']]);
    } else {
        // Insert new attendance
        $stmt = $pdo->prepare("INSERT INTO attendance (student_id, class_id, attendance_date, status, academic_year_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$student_id, $class_id, $attendance_date, $status, $academic_year_id]);
    }

    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
