<?php
// details.php

require 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM transactions WHERE transaction_id = ?");
$stmt->execute([$id]);
$transaction = $stmt->fetch(PDO::FETCH_ASSOC);

// Получаем связанные записи, например, клиента
$stmt = $pdo->prepare("SELECT * FROM clients WHERE client_id = ?");
$stmt->execute([$transaction['client_id']]);
$client = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <title>Детали транзакции</title>
</head>
<body>
    <h1>Детали транзакции</h1>
    <p>Номер транзакции: <?= $transaction['transaction_id'] ?></p>
    <p>Сумма: <?= $transaction['amount'] ?> ₽</p>
    <p>Статус: <?= $transaction['status'] ?></p>
    <h2>Клиент</h2>
    <p>Имя: <?= $client['name'] ?></p>
    <p>Email: <?= $client['email'] ?></p>
</body>
</html>
