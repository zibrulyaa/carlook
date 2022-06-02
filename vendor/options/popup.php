<?php
require_once '../../db/db.php';
$id = $_GET['id'];
global $db;
$query = $db->prepare("SELECT * FROM `options` WHERE id = $id");
$query->execute();
$option = $query->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang=ru">
<? require_once '../../vendor/head.php'?>
<body class="editPage">
<section class="cars">
    <div class="container">

        <div class="popup__overlay">
            <form class="add__form" action="edit.php" method="post">
                <div class="popup__title">Опции</div>
                <input type="hidden" name="id" value="<?= $option['id']?>">
                <label class="popup__inner">
                    <input class="form-input" name="name" type="text" value="<?= $option['name']?>">
                    <p class="popup__text">Название</p>
                </label>
                <input class="add__form-btn btn" type="submit" value="Изменить">
            </form>
        </div>
    </div>
</section>
<script src="js/main.min.js"></script>
</body>
</html>