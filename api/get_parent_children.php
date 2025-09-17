
<?php
session_start();
include '../includes/config.php';

header('Content-Type: application/json');

$parent_id = $_SESSION['user_id']; // Assuming the logged in user is a parent

try {
    $stmt = $pdo->prepare("SELECT id, CONCAT(first_name, ' ', last_name) as name FROM students WHERE parent_id = ? AND is_deleted = 0");
    $stmt->execute([$parent_id]);
    $children = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($children);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
