<?php
$host = 'localhost';
$db = 'transaction_system';
$user = 'your_username'; // Укажите ваше имя пользователя
$pass = 'your_password'; // Укажите ваш пароль

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Ошибка подключения: " . $e->getMessage();
    exit;
}
?>
