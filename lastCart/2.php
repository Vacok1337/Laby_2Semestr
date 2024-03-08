<?php
session_start();

if(isset($_SESSION['user_email']) && isset($_SESSION['user_message'])) {
    $user_email = $_SESSION['user_email'];
    $user_message = $_SESSION['user_message'];
    

    echo "E-mail пользователя: " . $user_email . "<br>";
    echo "Сообщение пользователя: " . $user_message . "<br>";
    

    echo "Имя сессии: " . session_name() . "<br>";
    echo "Значение идентификатора сессии: " . session_id() . "<br>";
} else {
    echo "Данные не найдены.";
}
?>
