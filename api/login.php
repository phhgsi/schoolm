
<?php
session_start();
include '../includes/config.php';

header('Content-Type: application/json');

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if (empty($username) || empty($password)) {
    http_response_code(400);
    echo json_encode(['error' => 'Username and password are required']);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT u.id, u.username, u.password, r.name as role FROM users u JOIN roles r ON u.role_id = r.id WHERE u.username = ? AND u.is_deleted = 0");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        $redirect_url = '../index.php';
        switch ($user['role']) {
            case 'Admin':
                $redirect_url = '../admin/index.php';
                break;
            case 'Teacher':
                $redirect_url = '../teacher/index.php';
                break;
            case 'Cashier':
                $redirect_url = '../cashier/index.php';
                break;
            case 'Student':
                $redirect_url = '../student/index.php';
                break;
            case 'Parent':
                $redirect_url = '../parent/index.php';
                break;
        }

        echo json_encode(['success' => true, 'redirect' => $redirect_url]);
    } else {
        http_response_code(401);
        echo json_encode(['error' => 'Invalid username or password']);
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
