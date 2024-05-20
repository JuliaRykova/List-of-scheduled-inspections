<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
require_once './config/connect.php';
$product_id = $_GET['id'];
$product = mysqli_query($connect, "SELECT * FROM `the register of scheduled inspections` WHERE `id` = '$product_id'");
$product = mysqli_fetch_assoc($product);
print_r($product);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Форма  редактирования -->
    <h2>Редактирование проверки</h2>
    <form action="script/update.php" method="post">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <h3>Проверяемый СМП</h3>
        <input type="text" name="title" value="<?= $product['title'] ?>">
        <h3>Контролирующий орган</h3>
        <input type="text" name="control" value="<?= $product['control'] ?>">
        <h3>Начало планового периода проверки</h3>
        <input type="date" name="beginningVerification" value="<?= $product['beginningVerification'] ?>">
        <h3>Окончание планового периода проверки</h3>
        <input type="date" name="endVerification" value="<?= $product['endVerification'] ?>">
        <h3>Плановая длительность</h3>
        <input type="number" name="duration" value="<?= $product['duration'] ?>">
        <br> <br>
        <button type="submit">Add</button>
    </form>
</body>

</html>