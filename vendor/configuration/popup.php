<?php
require_once '../../db/db.php';

$id = $_GET['id'];
global $db;
$query = $db->prepare("SELECT * FROM configuration WHERE id = $id");
$query->execute();
$cnf = $query->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang=ru">
<? require_once '../../vendor/head.php'?>
<body class="editPage">
<section class="cars">
    <div class="container">

        <div class="popup__overlay" id="conf">
            <form class="add__form" action="edit.php" method="post">
                <div class="popup__title">Комплектация</div>
                <input type="hidden" name="id" value="<?= $cnf['id']?>">
                <label class="popup__inner">
                    <input class="form-input" type="text" name="name" value="<?= $cnf['name']?>">
                    <p class="popup__text">Название</p>
                </label>
                <label class="popup__inner">
                    <select name="engine">
                        <option selected value="<?=$cnf['engine_id']?>">
                            <?
                            $engine = getEngineById($cnf['engine_id']);
                            echo $engine;
                            ?>
                        </option>
                        <?
                        global $db;
                        $engines = getEngine();

                        foreach ($engines as $engine){
                            print '<option value="' . $engine[ 'id' ] . '">' . $engine[ 'name' ] . '</option>';
                        }
                        ?>
                    </select>
                    <p class="popup__text">двигатель</p>
                </label>
                <label class="popup__inner">
                    <select name="gear">
                        <option selected value="<?=$cnf['gearbox_id']?>">
                            <?
                            $engine = getGearById($cnf['gearbox_id']);
                            echo $engine;
                            ?>
                        </option>
                        <?
                        global $db;
                        $gears = getGear();
                        foreach ($gears as $gear){
                            print '<option value="' . $gear[ 'id' ] . '">' . $gear[ 'name' ] . '</option>';
                        }
                        ?>
                    </select>
                    <p class="popup__text">КПП</p>
                </label>
                <label class="popup__inner">
                    <select name="drive">
                        <option selected value="<?=$cnf['drive_id']?>">
                            <?
                            $engine = getDriveById($cnf['drive_id']);
                            echo $engine;
                            ?>
                        </option>
                        <?
                        global $db;
                        $drives = getDrive();
                        foreach ($drives as $drive){
                            print '<option value="' . $drive[ 'id' ] . '">' . $drive[ 'name' ] . ' </option>';
                        }
                        ?>
                    </select>
                    <p class="popup__text">Привод</p>
                </label>
                <label class="popup__inner">
                    <select name="options[]" id="additions" multiple='multiple'>
                        <?php
                        require '../../db/connect.php';
                        global $con;

                        $query = "SELECT option_id FROM configuration_options WHERE configuration_id = $id";
                        $query_run = mysqli_query($con,$query);
                        $arr = mysqli_fetch_all($query_run);
                        print_r($arr);

                        $query2 = "SELECT * from options";
                        $query_run2 = mysqli_query($con,$query2);

                        if(mysqli_num_rows($query_run2) > 0){

                            foreach ($query_run2 as $row){
                                ?>
                                <option <?= selectedOptions($row['id'])?> value="<?=$row['id']?>"><?=$row['name']?></option>
                                <?php
                            }
                        }
                        else{
                            ?>
                            <option value="">Опции не найдены</option>
                            <?php
                        }
                        ?>
                    </select>
                    <p class="popup__text">Опции</p>
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