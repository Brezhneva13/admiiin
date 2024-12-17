<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: auth.php');
    exit;
}

require 'db.php';

// Получение данных транзакций
$stmt = $pdo->query("SELECT * FROM Transaction");
$transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Транзакции</title>
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <h1>Транзакции</h1>
    <table>
        <thead>
            <tr>
                <th>Номер транзакции</th>
                <th>Дата</th>
                <th>Сумма</th>
                <th>Номер клиента</th>
                <th>Номер терминала</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactions as $transaction): ?>
                <tr>
                    <td><?= htmlspecialchars($transaction['TransactionNumber']) ?></td>
                    <td><?= htmlspecialchars($transaction['Date']) ?></td>
                    <td><?= htmlspecialchars($transaction['Amount']) ?> ₽</td>
                    <td><?= htmlspecialchars($transaction['ClientNumber']) ?></td>
                    <td><?= htmlspecialchars($transaction['TerminalNumber']) ?></td>
                    <td>
                        <a href="edit_transaction.php?id=<?= $transaction['TransactionNumber'] ?>">Редактировать</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php">Назад</a>
</body>
</html>
