<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Каталог продукции</title>
</head>
<body>
    <h1>Каталог продукции</h1>

    <form method="get">
        <label for="search">Поиск:</label>
        <input type="text" name="search">
        <input type="submit" value="Искать">

        <label for="sort">Сортировка:</label>
        <select name="sort">
            <option value="id">По ID</option>
            <option value="categori">По категории</option>
            <option value="yslygi">По услугам</option>
        </select>

        <input type="submit" value="Применить сортировку">
    </form>

    <?php
    // Подключение к базе данных
    $mysqli = new mysqli('localhost', 'root', '', 'ПСИП лабы');

    // Проверка соединения
    if ($mysqli->connect_error) {
        die('Ошибка подключения (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    // Запрос к базе данных для получения данных о продуктах
    $query = "SELECT id, categori, yslygi FROM catalog";

    // Дополнительные параметры
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';

    // Добавление условий поиска и сортировки
    if (!empty($search)) {
        $query .= " WHERE categori LIKE '%$search%' OR yslygi LIKE '%$search%'";
    }

    $query .= " ORDER BY $sort";

    // Выполнение запроса
    $result = $mysqli->query($query);

    // Проверка наличия данных
    if ($result->num_rows > 0) {
        // Вывод данных о продуктах в виде таблицы
        echo '<table border="1">';
        echo '<tr><th>ID</th><th>Категория</th><th>Услуги</th></tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['categori'] . '</td>';
            echo '<td>' . $row['yslygi'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'Нет данных в таблице catalog';
    }

    // Закрытие соединения с базой данных
    $mysqli->close();
    ?>
</body>
</html>
