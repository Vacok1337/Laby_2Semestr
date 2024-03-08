<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отображение данных из БД</title>
</head>
<body>

<h2>Данные до редактирования:</h2>
<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rental";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Выборка данных из БД до редактирования
$sql_before_edit = "SELECT * FROM Клиенты";
$result_before_edit = $conn->query($sql_before_edit);

if ($result_before_edit->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ФИО</th><th>Домашний адрес</th><th>Наименование товара</th><th>Дата выдачи</th><th>Дата возврата</th><th>Стоимость проката за сутки</th></tr>";

    while ($row = $result_before_edit->fetch_assoc()) {
        echo "<tr><td>" . $row["ФИО"] . "</td><td>" . $row["домашний_адрес"] . "</td><td>" . $row["наименование_товара"] . "</td><td>" . $row["дата_выдачи"] . "</td><td>" . $row["дата_возврата"] . "</td><td>" . $row["стоимость_проката_за_сутки"] . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "0 результатов";
}

$conn->close();
?>

<h2>Данные после редактирования:</h2>
<?php
// Подключение к базе данных
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Выполнение запроса на редактирование
$sql_edit = "UPDATE Клиенты SET стоимость_проката_за_сутки = 5.00 WHERE стоимость_проката_за_сутки = 3.00";
$conn->query($sql_edit);

// Выборка данных из БД после редактирования
$sql_after_edit = "SELECT * FROM Клиенты";
$result_after_edit = $conn->query($sql_after_edit);

if ($result_after_edit->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ФИО</th><th>Домашний адрес</th><th>Наименование товара</th><th>Дата выдачи</th><th>Дата возврата</th><th>Стоимость проката за сутки</th></tr>";

    while ($row = $result_after_edit->fetch_assoc()) {
        echo "<tr><td>" . $row["ФИО"] . "</td><td>" . $row["домашний_адрес"] . "</td><td>" . $row["наименование_товара"] . "</td><td>" . $row["дата_выдачи"] . "</td><td>" . $row["дата_возврата"] . "</td><td>" . $row["стоимость_проката_за_сутки"] . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "0 результатов";
}

$conn->close();
?>
</body>
</html>
