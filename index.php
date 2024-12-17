<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: auth.php');
    exit;
}

require 'db.php';

// Получение статистики или данных для отображения
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Панель управления</title>
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <nav>
        <a href="index.php">Панель управления</a>
        <a href="clients.php">Клиенты</a>
        <a href="transactions.php">Транзакции</a>
        <a href="logout.php">Выход</a>
    </nav>
    <h1>Панель управления</h1>
    <p>Добро пожаловать!</p>
</body>
</html>
