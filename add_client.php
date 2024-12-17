<?php
// add_client.php

// Подключение к базе данных
require 'db.php'; // файл для подключения к базе данных

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Вставка данных в таблицу clients
    $stmt = $pdo->prepare("INSERT INTO clients (name, email) VALUES (?, ?)");
    if ($stmt->execute([$name, $email])) {
        echo "Клиент успешно добавлен.";
    } else {
        echo "Ошибка при добавлении клиента.";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <title>Добавить клиента</title>
</head>
<body>
    <h1>Добавить клиента</h1>
    <form method="POST">
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <button type="submit">Добавить</button>
    </form>
</body>
</html>
