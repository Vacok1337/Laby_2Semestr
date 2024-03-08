<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    

    $_SESSION['user_email'] = $email;
    $_SESSION['user_message'] = $message;


    $a = $name;
    $b = $message;


    $file = fopen("fio.txt", "w");
    fwrite($file, "Имя: " . $a . "\n");
    fwrite($file, "Сообщение: " . $b);
    fclose($file);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Cart</title>
</head>
<body>
    <form action="index.php" method="post">
        <div class="login_block">
            <input type="text" name="name" placeholder="Укажите ваше имя!">
        </div>
        <div class="login_block mail_block">
            <input type="text" name="email" placeholder="Укажите ваш Email!">
        </div>
        <div class="login_block message_block">
            <input type="text" name="message" placeholder="Введите ваше сообщение">
        </div>
        <div class="login_block">
            <button type="submit">Отправить</button>
        </div>

        
    </form>

    <?
        include '2.php';
        include 'tables.php';
    ?>
</body>
</html>
