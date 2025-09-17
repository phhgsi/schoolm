
<?php
include '../includes/config.php';

$student_id = isset($_GET['student_id']) ? $_GET['student_id'] : 0;

if (empty($student_id)) {
    die('Student is required');
}

try {
    // Get student details
    $stmt = $pdo->prepare("SELECT s.*, c.name as class_name FROM students s JOIN classes c ON s.class_id = c.id WHERE s.id = ?");
    $stmt->execute([$student_id]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die('Database error: ' . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonafide Certificate</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">
    <div class="border-2 border-black p-8 m-8">
        <div class="text-center">
            <h1 class="text-3xl font-bold">School Name</h1>
            <p class="text-lg">123 School Street, City, State, 12345</p>
            <h2 class="text-2xl font-bold mt-8 underline">BONAFIDE CERTIFICATE</h2>
        </div>
        <div class="mt-8">
            <p class="text-lg">This is to certify that <strong><?php echo $student['first_name'] . ' ' . $student['last_name']; ?></strong> is a bonafide student of this school.</p>
            <p class="text-lg mt-4">He/She is studying in class <strong><?php echo $student['class_name']; ?></strong> during the academic year <strong><?php echo date('Y'); ?>-<?php echo date('Y') + 1; ?></strong>.</p>
            <p class="text-lg mt-4">His/Her date of birth as per our school record is <strong><?php echo date('d-m-Y', strtotime($student['dob'])); ?></strong>.</p>
            <p class="text-lg mt-4">We wish him/her all the best for his/her future.</p>
        </div>
        <div class="flex justify-between mt-16">
            <div>
                <p class="font-bold">Date: <?php echo date('d-m-Y'); ?></p>
            </div>
            <div>
                <p class="font-bold">Principal's Signature</p>
            </div>
        </div>
    </div>
</body>
</html>
