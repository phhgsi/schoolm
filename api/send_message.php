
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_POST['academic_year_id']) ? $_POST['academic_year_id'] : 1;
$recipient_type = isset($_POST['recipient_type']) ? $_POST['recipient_type'] : '';
$recipient_id = isset($_POST['recipient_id']) ? $_POST['recipient_id'] : null;
$subject = isset($_POST['subject']) ? $_POST['subject'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

if (empty($recipient_type) || empty($subject) || empty($message)) {
    http_response_code(400);
    echo json_encode(['error' => 'All fields are required']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO communications (recipient_type, recipient_id, subject, message, academic_year_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$recipient_type, $recipient_id, $subject, $message, $academic_year_id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
