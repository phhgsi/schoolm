
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$staff_id = isset($_POST['staff_id']) ? $_POST['staff_id'] : 0;
$name = isset($_POST['name']) ? $_POST['name'] : '';
$role_id = isset($_POST['role_id']) ? $_POST['role_id'] : 0;
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';

if (empty($staff_id) || empty($name) || empty($role_id) || empty($email) || empty($phone)) {
    http_response_code(400);
    echo json_encode(['error' => 'All fields are required']);
    exit;
}

try {
    // Get user id
    $stmt = $pdo->prepare("SELECT user_id FROM staff WHERE id = ?");
    $stmt->execute([$staff_id]);
    $user_id = $stmt->fetchColumn();

    // Update user
    $stmt = $pdo->prepare("UPDATE users SET username = ?, role_id = ? WHERE id = ?");
    $stmt->execute([$email, $role_id, $user_id]);

    // Update staff
    $stmt = $pdo->prepare("UPDATE staff SET name = ?, email = ?, phone = ? WHERE id = ?");
    $stmt->execute([$name, $email, $phone, $staff_id]);

    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
