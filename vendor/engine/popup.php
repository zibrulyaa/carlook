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
<? require_once '../../vendor/head.php'?>
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
                <input class="add__form-btn btn" name="save" type="submit" value="Изменить">
            </form>
        </div>
    </div>
</section>
<script src="js/main.min.js"></script>
</body>
</html>