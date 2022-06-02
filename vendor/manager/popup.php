<?php
require_once '../../db/db.php';

$id = $_GET['id'];
global $db;
$query = $db->prepare("SELECT * FROM manager WHERE id = $id");
$query->execute();
$cnf = $query->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang=ru">
<? require_once '../../vendor/head.php'?>
<body class="editPage">
<section class="cars">
    <div class="container">

        <div class="popup__overlay" id="manager">
            <form class="add__form" action="edit.php" method="post">
                <div class="popup__title">Сотрудник</div>
                <input type="hidden" name="id" value="<?= $cnf['id']?>">
                <label class="popup__inner">
                    <input class="form-input" name="fname"  type="text" value="<?= $cnf['firstName']?>">
                    <p class="popup__text">Фамилия</p>
                </label>
                <label class="popup__inner">
                    <input class="form-input" name="lname"  type="text" value="<?= $cnf['lastName']?>">
                    <p class="popup__text">Имя</p>
                </label>
                <label class="popup__inner">
                    <input class="form-input" name="mname"  type="text" value="<?= $cnf['middleName']?>">
                    <p class="popup__text">Отчество</p>
                </label>
                <label class="popup__inner">
                    <select name="post">
                        <option selected value="<?=$cnf['post']?>">
                            <?
                            $var = getPostById($cnf['post']);
                            echo $var;
                            ?>
                        </option>
                        <?
                        global $db;
                        $vars = getPost();
                        foreach ($vars as $var){
                            print '<option value="' . $var[ 'id' ] . '">' . $var[ 'name' ] . '</option>';
                        }
                        ?>
                    </select>
                    <p class="popup__text">Должность</p>
                </label>
                <label class="popup__inner">
                    <input class="form-input" name="tel" required="" type="text" value="<?= $cnf['phone']?>">
                    <p class="popup__text">Телефон</p>
                </label>
                <input class="add__form-btn btn" name="save" type="submit" value="Изменить">
            </form>
        </div>







    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../../js/select.js"></script>

</body>
</html>
