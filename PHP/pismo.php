<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Отправка письма</title>
</head>
<body>
    <h1>Отправка письма</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $to = $_POST['to'];
        $from = $_POST['from'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        // Дополнительные заголовки
        $headers = "From: $from\r\n";
        $headers .= "Reply-To: $from\r\n";
        $headers .= "Content-Type: text/plain;charset=utf-8\r\n";

        // Отправка письма
        $mailSuccess = mail($to, $subject, $message, $headers);

        if ($mailSuccess) {
            echo "Письмо успешно отправлено.";
        } else {
            echo "Ошибка при отправке письма.";
        }
    }
    ?>

    <form method="post">
        <label for="to">Кому:</label>
        <input type="email" name="to" required><br>

        <label for="from">От кого:</label>
        <input type="email" name="from" required><br>

        <label for="subject">Тема:</label>
        <input type="text" name="subject" required><br>

        <label for="message">Текст письма:</label>
        <textarea name="message" rows="4" required></textarea><br>

        <input type="submit" value="Отправить">
    </form>
</body>
</html>
