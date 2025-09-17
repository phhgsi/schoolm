<?php
include '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = $_POST['date'];

    $stmt = $pdo->prepare("INSERT INTO news (title, content, date) VALUES (?, ?, ?)");
    $stmt->execute([$title, $content, $date]);
}
?>