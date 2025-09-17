<?php
include '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $stmt = $pdo->prepare("UPDATE news SET is_deleted = 1 WHERE id = ?");
    $stmt->execute([$id]);
}
?>