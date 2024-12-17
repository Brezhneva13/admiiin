<?php
// view.php

require 'db.php'; // файл для подключения к базе данных

$table = $_GET['table']; // Получаем имя таблицы из URL
$stmt = $pdo->query("SELECT * FROM $table");
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <title>Просмотр данных</title>
</head>
<body>
    <h1>Данные из таблицы: <?= htmlspecialchars($table) ?></h1>
    <table border="1">
        <thead>
            <tr>
                <?php if (!empty($records)): ?>
                    <?php foreach (array_keys($records[0]) as $column): ?>
                        <th><?= htmlspecialchars($column) ?></th>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($records as $record): ?>
                <tr>
                    <?php foreach ($record as $value): ?>
                        <td><?= htmlspecialchars($value) ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
