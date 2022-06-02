<?php
require_once '../../db/db.php';
$id = $_GET['id'];
global $db;
$query = $db->prepare("SELECT * FROM drive WHERE id = $id");
$query->execute();
$drive = $query->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang=ru">
<? require_once '../../vendor/head.php'?>
<body class="editPage">
<section class="cars">
    <div class="container">
        <div class="popup__overlay">
            <form class="add__form" action="edit.php" method="post">
                <div class="popup__title">Привод</div>
                <input type="hidden" name="id" value="<?= $drive['id']?>">
                <label class="popup__inner">
                    <input class="form-input" type="text" name="name" value="<?= $drive['name']?>">
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