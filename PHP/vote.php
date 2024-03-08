<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Голосование</title>
</head>
<body>
    <h2>Голосование</h2>
    
    <?php
    // Обработка отправленного голоса
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['vote_option'])) {
            $voteOption = $_POST['vote_option'];

            // Считываем текущие результаты из файла
            $file = 'voting_results.txt';
            $results = [];

            if (file_exists($file)) {
                $results = json_decode(file_get_contents($file), true);
            }

            // Увеличиваем количество голосов для выбранного варианта
            if (isset($results[$voteOption])) {
                $results[$voteOption]++;
            } else {
                $results[$voteOption] = 1;
            }

            // Сохраняем обновленные результаты в файл
            file_put_contents($file, json_encode($results));

            echo "Ваш голос учтен!";
        }
    }
    ?>

    <form method="post" action="vote.php">
        <p>Довольны вы ли вы своей работой?</p>
        <label>
            <input type="radio" name="vote_option" value="option1" required> Да
        </label>
        <label>
            <input type="radio" name="vote_option" value="option2" required> Нет
        </label>
        <label>
            <input type="radio" name="vote_option" value="option3" required> Затрудняюсь ответить
        </label>
        <br>
        <input type="submit" value="Проголосовать">
    </form>

    <h3>Результаты голосования:</h3>
    <?php
    // Выводим текущие результаты
    if (file_exists($file)) {
        $results = json_decode(file_get_contents($file), true);
        foreach ($results as $option => $votes) {
            echo "{$option}: {$votes} голосов<br>";
        }
    } else {
        echo "Результаты голосования будут отображены здесь после первого голосования.";
    }
    ?>
</body>
</html>
