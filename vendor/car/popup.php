<?php
require_once '../../db/db.php';

$id = $_GET['id'];
global $db;
$query = $db->prepare("SELECT * FROM car WHERE id = $id");
$query->execute();
$cnf = $query->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang=ru">
<? require_once '../../vendor/head.php'?>
<body class="editPage">
<section class="cars">
    <div class="container">


        <div class="popup__overlay " id="car">
            <form class="add__form" action="edit.php" method="post">
                <div class="popup__title">Автомобиль</div>
                <input type="hidden" name="id" value="<?= $cnf['id']?>">
                <label class="popup__inner">
                    <select name="brand">
                        <option selected value="<?=$cnf['brand_id']?>">
                            <?
                            $var = getBrandById($cnf['brand_id']);
                            echo $var;
                            ?>
                        </option>
                        <?
                        global $db;
                        $vars = getBrand();
                        foreach ($vars as $var){
                            print '<option value="' . $var[ 'id' ] . '">' . $var[ 'name' ] . '</option>';
                        }
                        ?>
                    </select>
                    <p class="popup__text">Марка</p>
                </label>
                <label class="popup__inner">
                    <select name="model">
                        <option selected value="<?=$cnf['model_id']?>">
                            <?
                            $var = getModelById($cnf['model_id']);
                            echo $var;
                            ?>
                        </option>
                        <?
                        global $db;
                        $vars = getModel();
                        foreach ($vars as $var){
                            print '<option value="' . $var[ 'id' ] . '">' . $var[ 'name' ] . '</option>';
                        }
                        ?>
                    </select>
                    <p class="popup__text">Модель</p>
                </label>
                <label class="popup__inner">
                    <select name="body">
                        <option selected value="<?=$cnf['body_id']?>">
                            <?
                            $var = getBodyById($cnf['body_id']);
                            echo $var;
                            ?>
                        </option>
                        <?
                        global $db;
                        $vars = getBody();
                        foreach ($vars as $var){
                            print '<option value="' . $var[ 'id' ] . '">' . $var[ 'name' ] . '</option>';
                        }
                        ?>
                    </select>
                    <p class="popup__text">Кузов</p>
                </label>
                <label class="popup__inner">
                    <select name="color">
                        <option selected value="<?=$cnf['color_id']?>">
                            <?
                            $var = getColorById($cnf['color_id']);
                            echo $var;
                            ?>
                        </option>
                        <?
                        global $db;
                        $vars = getColor();
                        foreach ($vars as $var){
                            print '<option value="' . $var[ 'id' ] . '">' . $var[ 'name' ] . '</option>';
                        }
                        ?>
                    </select>
                    <p class="popup__text">Цвет</p>
                </label>
                <label class="popup__inner">
                    <select name="cnf">
                        <option selected value="<?=$cnf['cnf_id']?>">
                            <?
                            $var = getCnfById($cnf['cnf_id']);
                            echo $var;
                            ?>
                        </option>
                        <?
                        global $db;
                        $vars = getСnf();
                        foreach ($vars as $var){
                            print '<option value="' . $var[ 'id' ] . '">' . $var[ 'name' ] . '</option>';
                        }
                        ?>
                    </select>
                    <p class="popup__text">Комплектация</p>
                </label>
                <label class="popup__inner">
                    <input class="form-input" name="vin" type="text" value="<?= $cnf['vin']?>">
                    <p class="popup__text">VIN-номер</p>
                </label>
                <label class="popup__inner">
                    <select name="stock">
                        <option selected value="<?=$cnf['stock_id']?>">
                            <?
                            $var = getStockById($cnf['stock_id']);
                            echo $var;
                            ?>
                        </option>
                        <?
                        global $db;
                        $vars = getStock();
                        foreach ($vars as $var){
                            print '<option value="' . $var[ 'id' ] . '">' . $var[ 'name' ] . '</option>';
                        }
                        ?>
                    </select>
                    <p class="popup__text">Наличие</p>
                </label>

                <label class="popup__inner">
                    <input class="form-input" name="date" required="" type="date" value="<?= $cnf['date']?>">
                    <p class="popup__text">Год Выпуска</p>
                </label>
                <label class="popup__inner">
                    <input class="form-input" name="price" type="text" value="<?= $cnf['price']?>">
                    <p class="popup__text">Итоговая стоимость</p>
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