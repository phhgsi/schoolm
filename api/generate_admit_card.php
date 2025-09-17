
<?php
include '../includes/config.php';

$student_id = isset($_GET['student_id']) ? $_GET['student_id'] : 0;
$exam_id = isset($_GET['exam_id']) ? $_GET['exam_id'] : 0;

if (empty($student_id) || empty($exam_id)) {
    die('Student and exam are required');
}

try {
    // Get student details
    $stmt = $pdo->prepare("SELECT s.*, c.name as class_name FROM students s JOIN classes c ON s.class_id = c.id WHERE s.id = ?");
    $stmt->execute([$student_id]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    // Get exam details
    $stmt = $pdo->prepare("SELECT * FROM exams WHERE id = ?");
    $stmt->execute([$exam_id]);
    $exam = $stmt->fetch(PDO::FETCH_ASSOC);

    // Get exam schedule
    $stmt = $pdo->prepare("SELECT s.name as subject_name, es.exam_date, es.start_time, es.end_time FROM exam_subjects es JOIN subjects s ON es.subject_id = s.id WHERE es.exam_id = ? AND es.class_id = ? ORDER BY es.exam_date, es.start_time");
    $stmt->execute([$exam_id, $student['class_id']]);
    $exam_schedule = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die('Database error: ' . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admit Card</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">
    <div class="border-2 border-black p-4 m-4">
        <div class="text-center">
            <h1 class="text-2xl font-bold">School Name</h1>
            <h2 class="text-xl font-bold"><?php echo $exam['name']; ?> Admit Card</h2>
        </div>
        <div class="flex justify-between items-center mt-4">
            <div>
                <p><span class="font-bold">Student Name:</span> <?php echo $student['first_name'] . ' ' . $student['last_name']; ?></p>
                <p><span class="font-bold">Scholar No:</span> <?php echo $student['scholar_number']; ?></p>
                <p><span class="font-bold">Father's Name:</span> <?php echo $student['father_name']; ?></p>
                <p><span class="font-bold">Class:</span> <?php echo $student['class_name']; ?></p>
            </div>
            <div>
                <img src="../<?php echo $student['student_photo']; ?>" alt="Student Photo" class="w-24 h-24 object-cover">
            </div>
        </div>
        <div class="mt-4">
            <h3 class="text-lg font-bold">Exam Schedule</h3>
            <table class="min-w-full bg-white mt-2">
                <thead>
                    <tr>
                        <th class="py-2 px-4 bg-gray-200">Subject</th>
                        <th class="py-2 px-4 bg-gray-200">Date</th>
                        <th class="py-2 px-4 bg-gray-200">Start Time</th>
                        <th class="py-2 px-4 bg-gray-200">End Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($exam_schedule as $schedule): ?>
                        <tr>
                            <td class="py-2 px-4 border-b"><?php echo $schedule['subject_name']; ?></td>
                            <td class="py-2 px-4 border-b"><?php echo $schedule['exam_date']; ?></td>
                            <td class="py-2 px-4 border-b"><?php echo $schedule['start_time']; ?></td>
                            <td class="py-2 px-4 border-b"><?php echo $schedule['end_time']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="flex justify-between mt-8">
            <div>
                <p class="font-bold">Principal's Signature</p>
            </div>
            <div>
                <p class="font-bold">Exam Controller's Signature</p>
            </div>
        </div>
    </div>
</body>
</html>
