<?php
// Параметры подключения
$host = 'localhost'; // или IP-адрес вашего сервера
$db = 'transaction_system'; // имя вашей базы данных
$user = 'your_username'; // ваше имя пользователя
$pass = 'your_password'; // ваш пароль

try {
    // Создание нового подключения с использованием PDO
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    
    // Установка режима обработки ошибок
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Подключение успешно!";
} catch (PDOException $e) {
    // Обработка ошибок подключения
    echo "Ошибка подключения: " . $e->getMessage();
}
?>
