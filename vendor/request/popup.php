<?php
require_once '../../db/db.php';

$id = $_GET['id'];
global $db;
$query = $db->prepare("SELECT * FROM request WHERE id = $id");
$query->execute();
$cnf = $query->fetch(PDO::FETCH_ASSOC);

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



        <div class="popup__overlay" id="request">
            <form class="add__form" action="edit.php" method="post">
                <div class="popup__title">Заявка</div>
                <input type="hidden" name="id" value="<?= $cnf['id']?>">
                <label class="popup__inner">
                    <input class="form-input" name="date" type="date" value="<?= $cnf['date']?>">
                    <p class="popup__text">Дата</p>
                </label>
                <label class="popup__inner">
                    <select name="manager">
                        <option selected value="<?=$cnf['manager_id']?>">
                            <?
                            $var = getManagerById($cnf['manager_id']);
                            echo $var;
                            ?>
                        </option>
                        <?
                        global $db;
                        $vars = getManager();
                        foreach ($vars as $var){
                            print '<option value="' . $var[ 'id' ] . '">' . $var[ 'firstName' ] . ' ' . $var[ 'lastName' ] . ' ' .$var[ 'middleName' ] . '</option>';
                        }
                        ?>
                    </select>
                    <p class="popup__text">Менеджер</p>
                </label>
                <label class="popup__inner">
                    <select name="client">
                        <option selected value="<?=$cnf['client_id']?>">
                            <?
                            $var = getClientById($cnf['client_id']);
                            echo $var;
                            ?>
                        </option>
                        <?
                        global $db;
                        $vars = getClient();
                        foreach ($vars as $var){
                            print '<option value="' . $var[ 'id' ] . '">' . $var[ 'firstName' ] . ' ' . $var[ 'lastName' ] . ' ' .$var[ 'middleName' ] . '</option>';
                        }
                        ?>
                    </select>
                    <p class="popup__text">Клиент</p>
                </label>
                <label class="popup__inner">
                    <select name="car">
                        <option selected value="<?=$cnf['car_id']?>">
                            <?
                            $var = getCarById($cnf['car_id']);
                            echo $var;
                            ?>
                        </option>
                        <?
                        global $db;
                        $vars = getCar();

                        foreach ($vars as $var){
                            $brand = getBrandById($var["brand_id"]);
                            $model = getModelById($var["model_id"]);
                            $cnf = getCnfById($var["cnf_id"]);
                            print '<option value="' . $var[ 'id' ] . '">' . $brand . ' ' . $model . ' ' . $cnf .  '</option>';
                        }
                        ?>
                    </select>
                    <p class="popup__text">Автомобиль</p>
                </label>
                <label class="popup__inner">
                    <select name="status">
                        <option selected value="<?
                        $vars = getRequest();
                        foreach ($vars as $var){
                            $status = getStatusById($var["status_id"]);
                        }
                        echo $status;
                        ?>">
                            <?
                            $vars = getRequest();

                            foreach ($vars as $var){
                                $status = getStatusById($var["status_id"]);
                            }
                            echo $status;
                            ?>
                        </option>
                        <?
                        global $db;
                        $vars = getStatus();
                        foreach ($vars as $var){
                            print '<option value="' . $var[ 'id' ] . '">' . $var[ 'name' ] . '</option>';
                        }
                        ?>
                    </select>
                    <p class="popup__text">Статус</p>
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

