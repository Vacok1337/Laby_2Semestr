<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заказ</title>
</head>
<body>
    <form action="process_form.php" method="POST">
        <label for="name">Ваше имя:</label>
        <input type="text" name="name" id="name" required><br>
        
        <label for="address">Ваш адрес:</label>
        <input type="text" name="address" id="address" required><br>

        <label for="send_what">Прислать:</label>
        <input type="text" name="send_what" id="send_what" required><br>
        
        <input type="submit" name="send_order" value="Послать заказ">
        <input type="reset" value="Сброс">
    </form>
</body>
</html>
