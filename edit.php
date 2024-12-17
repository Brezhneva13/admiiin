<?php
// edit.php

// Подключение к базе данных
require 'db.php'; // файл для подключения к базе данных

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $transactionId = $_POST['transaction_id'];
    $amount = $_POST['amount'];
    $status = $_POST['status'];

    // Обновление данных в базе
    $stmt = $pdo->prepare("UPDATE transactions SET amount = ?, status = ? WHERE transaction_id = ?");
    $stmt->execute([$amount, $status, $transactionId]);

    header('Location: index.php'); // Перенаправление на главную страницу
    exit;
}

// Получение данных для редактирования
$transactionId = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM transactions WHERE transaction_id = ?");
$stmt->execute([$transactionId]);
$transaction = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <title>Редактировать транзакцию</title>
</head>
<body>
    <h1>Редактировать транзакцию</h1>
    <form method="POST">
        <input type="hidden" name="transaction_id" value="<?= $transaction['transaction_id'] ?>">
        <label>Сумма:</label>
        <input type="text" name="amount" value="<?= $transaction['amount'] ?>" required>
        <label>Статус:</label>
        <select name="status">
            <option value="success" <?= $transaction['status'] === 'success' ? 'selected' : '' ?>>Успешно</option>
            <option value="error" <?= $transaction['status'] === 'error' ? 'selected' : '' ?>>Ошибка</option>
        </select>
        <button type="submit">Сохранить</button>
    </form>
</body>
</html>
