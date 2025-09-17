
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$settings = isset($_POST['settings']) ? $_POST['settings'] : [];

if (empty($settings)) {
    http_response_code(400);
    echo json_encode(['error' => 'Settings are required']);
    exit;
}

try {
    foreach ($settings as $key => $value) {
        $stmt = $pdo->prepare("INSERT INTO settings (setting_key, setting_value) VALUES (?, ?) ON DUPLICATE KEY UPDATE setting_value = ?");
        $stmt->execute([$key, $value, $value]);
    }
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
