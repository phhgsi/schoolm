
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_POST['academic_year_id']) ? $_POST['academic_year_id'] : 1;
$name = isset($_POST['name']) ? $_POST['name'] : '';
$role_id = isset($_POST['role_id']) ? $_POST['role_id'] : 0;
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : 'password'; // Default password

if (empty($name) || empty($role_id) || empty($email) || empty($phone)) {
    http_response_code(400);
    echo json_encode(['error' => 'All fields are required']);
    exit;
}

try {
    // Create user
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (username, password, role_id) VALUES (?, ?, ?)");
    $stmt->execute([$email, $hashed_password, $role_id]);
    $user_id = $pdo->lastInsertId();

    // Create staff
    $stmt = $pdo->prepare("INSERT INTO staff (user_id, name, email, phone, academic_year_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$user_id, $name, $email, $phone, $academic_year_id]);

    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
