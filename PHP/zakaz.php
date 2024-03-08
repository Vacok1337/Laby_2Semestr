<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Оформление заказа</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Оформление заказа</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="name">Имя:</label>
        <input type="text" name="name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="phone">Телефон:</label>
        <input type="tel" name="phone" required>

        <label for="category">Категория:</label>
        <select name="category" required>
            <?php
            // Подключение к базе данных
            $mysqli = new mysqli('localhost', 'root', '', 'ПСИП лабы');

            // Проверка соединения
            if ($mysqli->connect_error) {
                die('Ошибка подключения (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
            }

            // Запрос к базе данных для получения данных о категориях
            $query = "SELECT id, categori FROM catalog";
            $result = $mysqli->query($query);

            // Вывод опций
            while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row['id'] . '">' . $row['categori'] . '</option>';
            }

            // Закрытие соединения с базой данных
            $mysqli->close();
            ?>
        </select>

        <label for="service">Услуга:</label>
        <select name="service" required>
            <?php
            // Подключение к базе данных
            $mysqli = new mysqli('localhost', 'root', '', 'ПСИП лабы');

            // Проверка соединения
            if ($mysqli->connect_error) {
                die('Ошибка подключения (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
            }

            // Запрос к базе данных для получения данных об услугах
            $query = "SELECT id, yslygi FROM catalog";
            $result = $mysqli->query($query);

            // Вывод опций
            while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row['id'] . '">' . $row['yslygi'] . '</option>';
            }

            // Закрытие соединения с базой данных
            $mysqli->close();
            ?>
        </select>

        <input type="submit" value="Заказать">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Подключение к базе данных
        $mysqli = new mysqli('localhost', 'root', '', 'ПСИП лабы');

        // Проверка соединения
        if ($mysqli->connect_error) {
            die('Ошибка подключения (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
        }

        // Получение данных из формы
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $category = $_POST['category'];
        $service = $_POST['service'];

        // Подготовка запроса для вставки данных в таблицу zakaz
        $query = "INSERT INTO zakaz (name, email, phone, categori, yslygi) VALUES ('$name', '$email', '$phone', '$category', '$service')";

        // Выполнение запроса
        if ($mysqli->query($query) === TRUE) {
            echo "Заказ успешно оформлен!";
        } else {
            echo "Ошибка при оформлении заказа: " . $mysqli->error;
        }

        // Закрытие соединения с базой данных
        $mysqli->close();
    }
    ?>
</body>
</html>
