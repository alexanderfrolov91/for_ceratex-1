<?php
    if (($_POST['name'] !== '') && ($_POST['surname'] !== '') && ($_POST['age'] > 0) && ($_POST['age'] < 123)) {  /* Жанна Кальман	Ж 	21 февраля 1875 	4 августа 1997 	122 года, 164 дня 	 Франция */
        $host = 'localhost';
        $user = 'q98517su_1';
        $password = 'AzAzA1111';
        $database = 'q98517su_1';
        $link = mysqli_connect($host, $user, $password, $database);
        $query = "SELECT * FROM `test` WHERE `name1` LIKE '" . $_POST['name'] . "' AND `surname` LIKE '" . $_POST['surname'] . "' AND `age` LIKE '" . $_POST['age'] . "';";
        $result = mysqli_query($link, $query);
        $count = mysqli_num_rows($result);
        if ($count !== 0) {
            echo '<p>Такой пользователь уже существует!</p>';
        } else {
            $query = "INSERT INTO test (name1, surname, age) VALUES ('" . $_POST['name'] . "', '" . $_POST['surname'] . "', '" . $_POST['age'] . "')";
            mysqli_query($link, $query);
            echo '<p>Данные успешно записаны в БД!</p>';
        }
    } else {
        echo '<p>Ошибка, попробуйте еще раз!</p>';
    }
    echo '<script>
        function clear() {
            document.getElementById("text").innerHTML = "";
        }
        setTimeout(clear, 1000);
    </script>'
?>