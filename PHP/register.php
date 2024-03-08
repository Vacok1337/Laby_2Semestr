<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Проверяем, получены ли данные из формы
    if (isset($_GET['username']) && isset($_GET['password'])) {
        $username = $_GET['username'];
        $password = $_GET['password'];

        // В реальном приложении следует провести проверку и фильтрацию входных данных

        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Регистрация успешна!";
        } else {
            echo "Ошибка: " . $conn->error;
        }
    } else {
        echo "Не все данные переданы";
    }
} else {
    echo "Некорректный метод запроса";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>
<body>
    <h2>Регистрация</h2>
    <form method="get" action="register.php">
        <label for="username">Имя пользователя:</label>
        <input type="text" name="username" required><br>

        <label for="password">Пароль:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Зарегистрироваться">
    </form>
</body>
</html>
