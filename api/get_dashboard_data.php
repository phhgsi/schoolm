
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_GET['academic_year_id']) ? $_GET['academic_year_id'] : 1;

try {
    // Total students
    $stmt = $pdo->prepare("SELECT COUNT(*) as total_students FROM students WHERE academic_year_id = ? AND is_deleted = 0");
    $stmt->execute([$academic_year_id]);
    $total_students = $stmt->fetch(PDO::FETCH_ASSOC)['total_students'];

    // Total teachers
    $stmt = $pdo->prepare("SELECT COUNT(*) as total_teachers FROM teachers WHERE academic_year_id = ? AND is_deleted = 0");
    $stmt->execute([$academic_year_id]);
    $total_teachers = $stmt->fetch(PDO::FETCH_ASSOC)['total_teachers'];

    // Total classes
    $stmt = $pdo->prepare("SELECT COUNT(*) as total_classes FROM classes WHERE academic_year_id = ? AND is_deleted = 0");
    $stmt->execute([$academic_year_id]);
    $total_classes = $stmt->fetch(PDO::FETCH_ASSOC)['total_classes'];

    // Fee collection
    $stmt = $pdo->prepare("SELECT SUM(amount_paid) as total_fees_collected FROM fee_payments WHERE academic_year_id = ?");
    $stmt->execute([$academic_year_id]);
    $total_fees_collected = $stmt->fetch(PDO::FETCH_ASSOC)['total_fees_collected'];

    // Attendance summary
    $stmt = $pdo->prepare("SELECT status, COUNT(*) as count FROM attendance WHERE academic_year_id = ? GROUP BY status");
    $stmt->execute([$academic_year_id]);
    $attendance_summary = $stmt->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_GROUP);

    $response = [
        'total_students' => $total_students,
        'total_teachers' => $total_teachers,
        'total_classes' => $total_classes,
        'total_fees_collected' => $total_fees_collected,
        'attendance_summary' => $attendance_summary
    ];

    echo json_encode($response);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
