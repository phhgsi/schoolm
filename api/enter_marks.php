
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_POST['academic_year_id']) ? $_POST['academic_year_id'] : 1;
$exam_id = isset($_POST['exam_id']) ? $_POST['exam_id'] : 0;
$subject_id = isset($_POST['subject_id']) ? $_POST['subject_id'] : 0;
$marks = isset($_POST['marks']) ? $_POST['marks'] : [];

if (empty($exam_id) || empty($subject_id) || empty($marks)) {
    http_response_code(400);
    echo json_encode(['error' => 'Exam, subject and marks are required']);
    exit;
}

try {
    foreach ($marks as $mark) {
        $student_id = $mark['student_id'];
        $student_marks = $mark['marks'];

        // Check if marks already entered for the student
        $stmt = $pdo->prepare("SELECT id FROM marks WHERE student_id = ? AND subject_id = ? AND exam_id = ?");
        $stmt->execute([$student_id, $subject_id, $exam_id]);
        $existing_marks = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existing_marks) {
            // Update existing marks
            $stmt = $pdo->prepare("UPDATE marks SET marks = ? WHERE id = ?");
            $stmt->execute([$student_marks, $existing_marks['id']]);
        } else {
            // Insert new marks
            $stmt = $pdo->prepare("INSERT INTO marks (student_id, subject_id, exam_id, marks, academic_year_id) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$student_id, $subject_id, $exam_id, $student_marks, $academic_year_id]);
        }
    }

    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
