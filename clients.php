<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: auth.php');
    exit;
}

require 'db.php';

// Получение данных клиентов
$stmt = $pdo->query("SELECT * FROM Client");
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Клиенты</title>
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <h1>Клиенты</h1>
    <table>
        <thead>
            <tr>
                <th>Номер клиента</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Телефон</th>
                <th>Адрес</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?= htmlspecialchars($client['ClientNumber']) ?></td>
                    <td><?= htmlspecialchars($client['Name']) ?></td>
                    <td><?= htmlspecialchars($client['Surname']) ?></td>
                    <td><?= htmlspecialchars($client['Phone']) ?></td>
                    <td><?= htmlspecialchars($client['Address']) ?></td>
                    <td>
                        <a href="edit_client.php?id=<?= $client['ClientNumber'] ?>">Редактировать</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php">Назад</a>
</body>
</html>
