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
    
    echo "Подключение успешно!<br>";

    // Запрос на выборку всех данных из таблицы 'Client'
    $stmt = $pdo->query("SELECT * FROM Client");

    // Проверка, есть ли данные
    if ($stmt->rowCount() > 0) {
        // Вывод заголовков таблицы
        echo "<table border='1'>
                <tr>
                    <th>ClientNumber</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>CardNumber</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Patronymic</th>
                    <th>BankNumber</th>
                </tr>";

        // Вывод данных
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>{$row['ClientNumber']}</td>
                    <td>{$row['Phone']}</td>
                    <td>{$row['Address']}</td>
                    <td>{$row['CardNumber']}</td>
                    <td>{$row['Name']}</td>
                    <td>{$row['Surname']}</td>
                    <td>{$row['Patronymic']}</td>
                    <td>{$row['BankNumber']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Нет записей в таблице 'Client'.";
    }
} catch (PDOException $e) {
    // Обработка ошибок подключения
    echo "Ошибка подключения: " . $e->getMessage();
}
?>
