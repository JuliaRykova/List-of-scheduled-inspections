<?php

// подключаем файл
require_once 'config/connect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./tableSearch/tableSearch.js"></script>

</head>
<style>
    th,
    td {
        padding: 10px;
    }

    th {
        background-color: #00CED1;
    }

    td {
        background-color: #AFEEEE;
    }
</style>

<body>

    <!-- input для поиска по таблице -->

    <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="Проверяемый СМП">
    <input type="text" id="myInputSupervisoryAuthority" onkeyup='searchSupervisoryAuthority()' placeholder="Контролирующий орган">
    <input type="text" id="myInputBeginningVerification" onkeyup='searchBeginningVerification()' placeholder="Начало планового периода проверки">
    <input type="text" id="myInputEndVerification" onkeyup='searchEndVerification()' placeholder="Окончание планового периода проверки">
    <input type="number" id="myInputNumber" onkeyup='searchNumber()' placeholder="Плановая длительность">




    <!-- создание таблицы -->
    <!-- Атрибут data-filter-control="true" указывает на то, что элемент управления фильтра данных является активным и может быть использован для фильтрации данных. Атрибут data-show-search-clear-button="true" указывает на то, что кнопка очистки поиска будет показываться в элементе управления. -->
    <table class="table" id="myTable" data-filter-control="true" data-show-search-clear-batton="true">
        <tr>
            <th>№</th>
            <th>Проверяемый СМП </th>
            <th>Контролирующий орган</th>
            <th>Начало планового периода проверки</th>
            <th>Окончание планового периода проверки</th>
            <th>Плановая длительность</th>
        </tr>



        <!-- Подлючение к базе данных для вывода информации строк -->
        <?php
        $point = mysqli_query($connect, "SELECT * FROM `the register of scheduled inspections`");
        // mysqli_fetch_all функция получает все строки преобразует в массив и присваивает переменной  $point
        $point = mysqli_fetch_all($point);
        // проходимся по массиву базы данных
        foreach ($point as $onePoint) {
        ?>
            <!-- шаблон таблицы через которую при каждой итерации цикла выводятся значения -->
            <tr>
                <td><?= $onePoint[0] ?></td>
                <td><?= $onePoint[1] ?></td>
                <td><?= $onePoint[2] ?></td>
                <td><?= $onePoint[3] ?></td>
                <td><?= $onePoint[4] ?></td>
                <td><?= $onePoint[5] ?></td>
                <!-- переносим для редактирования на другую страницу -->
                <td><a href="./update.php?id=<?= $onePoint[0] ?>">Редактировать</a></td>
                <td><a href="./script/delete.php?id=<?= $onePoint[0] ?>">Удалить</a></td>

            </tr>
            <!-- закрытие цикла -->
        <?php
        }
        ?>
    </table>
    <!-- Форма добавления строк с бд -->
    <h2>Добавление проверки</h2>
    <form action="script/create.php" method="post">
        <h3>Проверяемый СМП</h3>
        <input type="text" name="title">
        <h3>Контролирующий орган</h3>
        <input type="text" name="control">
        <h3>Начало планового периода проверки</h3>
        <input type="date" name="beginningVerification">
        <h3>Окончание планового периода проверки</h3>
        <input type="date" name="endVerification">
        <h3>Плановая длительность</h3>
        <input type="number" name="duration">
        <br> <br>
        <button type="submit">Add</button>
    </form>

    <!-- скрипт для поиска по таблице -->
</body>

</html>