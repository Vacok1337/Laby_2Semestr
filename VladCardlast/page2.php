<?php
// Запускаем сессию
session_start();

// Проверяем, существуют ли сессионные переменные
if (isset($_SESSION["user_name"]) && isset($_SESSION["user_address"]) && isset($_SESSION["send_what"])) {
    // Выводим данные из сессионных переменных
    //echo "Имя пользователя: " . $_SESSION["user_name"] . "<br>";
    echo "Адрес пользователя: " . $_SESSION["user_address"] . "<br>";
    echo "Прислать: " . $_SESSION["send_what"] . "<br>";

    // Выводим идентификатор сессии
    echo "Идентификатор сессии: " . session_id();
} else {
    // Если сессионные переменные отсутствуют, проверяем URL на наличие данных
    if (isset($_GET["address"]) && isset($_GET["send_what"])) {
        //echo "Адрес пользователя: " . $_GET["address"] . "<br>";
        echo "Прислать: " . $_GET["send_what"] . "<br>";
        echo "Идентификатор сессии: " . session_id();
    } else {
        // Если сессионные переменные и данные в URL отсутствуют, перенаправляем на главную страницу
        header("Location: index.php");
        exit();
    }
}
?>
