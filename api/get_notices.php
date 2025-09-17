<?php
include '../includes/config.php';

$stmt = $pdo->query("SELECT * FROM notices WHERE is_deleted = 0 ORDER BY date DESC");
$notices = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($notices);
?>