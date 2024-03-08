<?php
// Запускаем сессию
session_start();

// Проверяем, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["send_order"])) {
    // Получаем данные из формы
    $name = $_POST["name"];
    $address = $_POST["address"];
    $sendWhat = $_POST["send_what"];

    // Сохраняем данные в сессионных переменных
    $_SESSION["user_name"] = $name;
    $_SESSION["user_address"] = $address;
    $_SESSION["send_what"] = $sendWhat;

    // Создаем переменные $а и $b
    $a = $name;
    $b = $address;

    // Записываем значения переменных $а и $b в файл fio.txt
    $file = fopen("fio.txt", "w");
    fwrite($file, "Имя: " . $a . "\n");
    fwrite($file, "Адрес: " . $b . "\n");
    fclose($file);

    // Перенаправляем пользователя на страницу 2.php
    header("Location: page2.php?address={$address}&send_what={$sendWhat}");
    exit();
} else {
    // Если форма не была отправлена, перенаправляем на главную страницу
    header("Location: index.php");
    exit();
}
?>
