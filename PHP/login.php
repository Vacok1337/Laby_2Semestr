<?php
require_once 'db.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Преобразуем введенный логин в нижний регистр
    $usernameLower = strtolower($username);

    $sql = "SELECT * FROM users WHERE LOWER(username) = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usernameLower);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Авторизация успешна
            echo "Пользователь найден";

            // Добавление данных в таблицу userslogin
            $insertSql = "INSERT INTO userslogin (name, parol) VALUES (?, ?)";
            $insertStmt = $conn->prepare($insertSql);
            $insertStmt->bind_param("ss", $row['username'], $password);
            
            // Проверяем, успешно ли создан объект для подготовленного запроса
            if ($insertStmt !== false) {
                $insertStmt->execute();
                $insertStmt->close();
            } else {
                echo "Ошибка при создании запроса для добавления в userslogin";
            }
        } else {
            echo "Неверный пароль";
        }
    } else {
        echo "Пользователь не найден";
    }

    // Проверяем, успешно ли создан объект для подготовленного запроса
    if ($stmt !== false) {
        $stmt->close();
    } else {
        echo "Ошибка при создании запроса для поиска пользователя";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
</head>
<body>
    <h2>Авторизация</h2>
    <form method="post" action="login.php">
        <label for="username">Имя пользователя:</label>
        <input type="text" name="username" required><br>

        <label for="password">Пароль:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Войти">
    </form>
</body>
</html>
