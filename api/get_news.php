<?php
include '../includes/config.php';

$stmt = $pdo->query("SELECT * FROM news WHERE is_deleted = 0 ORDER BY date DESC");
$news = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($news);
?>