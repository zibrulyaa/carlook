<?php
require_once '../../db/db.php';
$id = $_GET['id'];
global $db;
$query = $db->prepare("SELECT * FROM engine WHERE id = $id");
$query->execute();
$engine = $query->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang=ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarLook</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/libs.min.css">
    <link rel="stylesheet" href="../../css/style.min.css">
</head>
<body class="editPage">
<section class="cars">
    <div class="container">

        <div class="popup__overlay">
            <form class="add__form" action="edit.php" method="post">
                <div class="popup__title">Двигатель</div>
                <input type="hidden" name="id" value="<?= $engine['id']?>">
                <label class="popup__inner">
                    <input class="form-input" type="text" name="name" value="<?= $engine['name']?>">
                    <p class="popup__text">Название</p>
                </label>
                <label class="popup__inner">
                    <input class="form-input" type="text" name="power" value="<?= $engine['power']?>">
                    <p class="popup__text">Мощность</p>
                </label>
                <label class="popup__inner">
                    <input class="form-input" type="text" name="type" value="<?= $engine['type']?>">
                    <p class="popup__text">Тип</p>
                </label>
                <input class="add__form-btn btn" type="submit" value="Изменить">
            </form>
        </div>
    </div>
</section>
<script src="js/main.min.js"></script>
</body>
</html>