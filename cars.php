<?php
    require 'db/db.php'
?>
<!DOCTYPE html>
<html lang=ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarLook</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/libs.min.css">
    <link rel="stylesheet" href="css/style.min.css">
</head>

<body>
    <section class="cars">
        <div class="container">
            <nav class="menu">
                <ul class="menu__list">
                    <li class="menu__list-item menu__list-home">
                        <a class="menu__list-link" href="home.php">Личный
                            Кабинет</a>
                    </li>
                    <li class="menu__list-item menu__list-cars active">
                        <a class="menu__list-link" href="cars.php">Автомобили</a>
                    </li>
                    <li class="menu__list-item menu__list-clients ">
                        <a class="menu__list-link" href="clients.php">Клиенты</a>
                    </li>
                    <li class="menu__list-item menu__list-managers ">
                        <a class="menu__list-link" href="managers.php">Сотрудники</a>
                    </li>
                </ul>
            </nav>
            <div class="cars__inner">
                <div class="tabs">
                    <div class="tabs__nav">
                        <button class="tabs__btn tabs__btn_active">Автомобиль</button>
                        <button class="tabs__btn">комплектации</button>
                        <button class="tabs__btn">марка</button>
                        <button class="tabs__btn">модель</button>
                        <button class="tabs__btn">опции</button>
                        <button class="tabs__btn">цвета</button>
                        <button class="tabs__btn">двигатель</button>
                        <button class="tabs__btn">КПП</button>
                        <button class="tabs__btn">Кузов</button>
                        <button class="tabs__btn">Привод</button>
                    </div>

                    <div class="tabs__content">
                        <div class="tabs__pane tabs__pane_show">
                            <a class="popup__btn car" href="#car">Создать</a>
                            <?php require 'vendor/car/car.php'?>
                        </div>
                        <div class="tabs__pane">
                            <a class="popup__btn conf" href="#conf">Создать</a>
                            <?php require 'vendor/configuration/configuration.php'?>
                        </div>
                        <div class="tabs__pane">
                            <a class="popup__btn brand" href="#brand">Создать</a>
                            <?php require 'vendor/brand/brand.php'?>
                        </div>
                        <div class="tabs__pane">
                            <a class="popup__btn model" href="#model">Создать</a>
                            <?php  require 'vendor/model/model.php'?>
                        </div>
                        <div class="tabs__pane">
                            <a class="popup__btn adds" href="#adds">Создать</a>
                            <?php  require 'vendor/options/options.php'?>
                        </div>
                        <div class="tabs__pane">
                            <a class="popup__btn colors" href="#colors">Создать</a>
                            <?php  require 'vendor/color/color.php'?>
                        </div>
                        <div class="tabs__pane">
                            <a class="popup__btn engines" href="#engines">Создать</a>
                            <?php require 'vendor/engine/engine.php'?>
                        </div>
                        <div class="tabs__pane">
                            <a class="popup__btn gear" href="#gear">Создать</a>
                            <?php require 'vendor/gear/gear.php'?>
                        </div>
                        <div class="tabs__pane">
                            <a class="popup__btn body" href="#body">Создать</a>
                            <?php require 'vendor/body/body.php'?>
                        </div>
                        <div class="tabs__pane">
                            <a class="popup__btn drive" href="#drive">Создать</a>
                            <?php require 'vendor/drive/drive.php'?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Окно "Автомобиль" -->
    <div class="popup__overlay mfp-hide" id="car">
        <form class="add__form" action="vendor/car/add.php" method="post">
            <div class="popup__title">Автомобиль</div>
            <label class="popup__inner">
                <select name="brand">
                    <option value="0">Выберите</option>
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
                    <option value="0">Выберите</option>
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
                    <option value="0">Выберите</option>
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
                    <option value="0">Выберите</option>
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
                    <option value="0">Выберите</option>
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
                <input class="form-input" name="vin" type="text">
                <p class="popup__text">VIN-номер</p>
            </label>
            <label class="popup__inner">
                <select name="stock">
                    <option value="0">Выберите</option>
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
                <input class="form-input" name="date" required="" type="date">
                <p class="popup__text">Год Выпуска</p>
            </label>
            <label class="popup__inner">
                <input class="form-input" name="price" type="text">
                <p class="popup__text">Итоговая стоимость</p>
            </label>

            <input class="add__form-btn btn" name="save" type="submit" value="Добавить">
        </form>
    </div>
    <!-- Окно "Комплектация" -->
    <div class="popup__overlay mfp-hide" id="conf">
        <form class="add__form" action="vendor/configuration/add.php" method="post">
            <div class="popup__title">Комплектация</div>
            <label class="popup__inner">
                <input class="form-input" type="text" name="name">
                <p class="popup__text">Название</p>
            </label>
            <label class="popup__inner">
                <select name="engine">
                    <option value="0">Выберите</option>
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
                    <option value="0">Выберите</option>
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
                    <option value="0">Выберите</option>
                    <?
                    global $db;
                    $drives = getDrive();
                    foreach ($drives as $drive){
                        print '<option value="' . $drive[ 'id' ] . '">' . $drive[ 'name' ] . '</option>';
                    }
                    ?>
                </select>
                <p class="popup__text">Привод</p>
            </label>
            <label class="popup__inner">
                <select name="options[]" id="additions" multiple='multiple'>
                    <?php
                        $con = mysqli_connect('localhost','root','', 'f0650590_carlook');
                        $query = "SELECT * FROM options";
                        $query_run = mysqli_query($con,$query);
                        if(mysqli_num_rows($query_run) > 0){
                            foreach ($query_run as $row){
                                ?>
                                    <option value="<?=$row['id']?>"><?=$row['name']?></option>
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
            <input class="add__form-btn btn" name="save" type="submit" value="Добавить">
        </form>
    </div>
    
    <!-- Окно "Марка" -->
    <div class="popup__overlay mfp-hide" id="brand">
        <form class="add__form" action="vendor/brand/add.php" method="post">
            <div class="popup__title">Марка</div>
            <label class="popup__inner">
                <input class="form-input" name="name" type="text">
                <p class="popup__text">Название</p>
            </label>
            <input class="add__form-btn btn" type="submit" value="Добавить">
        </form>
    </div>
 
    <!-- Окно "Модель" -->
    <div class="popup__overlay mfp-hide" id="model">
        <form class="add__form" action="vendor/model/add.php" method="post">
            <div class="popup__title">Модель</div>
            <label class="popup__inner">
                <input class="form-input" name="name" type="text">
                <p class="popup__text">Название</p>
            </label>
            <input class="add__form-btn btn" type="submit" value="Изменить">
        </form>
    </div>
    
    <!-- Окно "Опции" -->
    <div class="popup__overlay mfp-hide" id="adds">
        <form class="add__form" action="vendor/options/add.php" method="post">
            <div class="popup__title">Опции</div>
            <label class="popup__inner">
                <input class="form-input" name="name" type="text">
                <p class="popup__text">Название</p>
            </label>
            <input class="add__form-btn btn" type="submit" value="Добавить">
        </form>
    </div>
    
    <!-- Окно "Двигатель" -->
    <div class="popup__overlay mfp-hide" id="engines">
        <form class="add__form" action="vendor/engine/add.php" method="post">
            <div class="popup__title">двигатель</div>
            <label class="popup__inner">
                <input class="form-input" type="text" name="name">
                <p class="popup__text">Название</p>
            </label>
            <label class="popup__inner">
                <input class="form-input" type="text" name="power">
                <p class="popup__text">Мощность</p>
            </label>
            <label class="popup__inner">
                <input class="form-input" type="text" name="type">
                <p class="popup__text">Тип</p>
            </label>
            <input class="add__form-btn btn" type="submit" value="Добавить">
        </form>
    </div>
  
    <!-- Окно "Цвета" -->
    <div class="popup__overlay mfp-hide" id="colors">
        <form class="add__form" action="vendor/color/add.php" method="post">
            <div class="popup__title">Цвета</div>
            <label class="popup__inner">
                <input class="form-input" name="name" type="text">
                <p class="popup__text">Название</p>
            </label>
            <input class="add__form-btn btn" type="submit" value="Добавить">
        </form>
    </div>
  
    <!-- Окно "КПП" -->
    <div class="popup__overlay mfp-hide" id="gear">
        <form class="add__form" action="vendor/gear/add.php" method="post">
            <div class="popup__title">КПП</div>
            <label class="popup__inner">
                <input class="form-input" name="name" type="text">
                <p class="popup__text">Название</p>
            </label>
            <input class="add__form-btn btn" type="submit" value="Добавить">
        </form>
    </div>

    <!-- Окно "Кузов" -->
    <div class="popup__overlay mfp-hide" id="body">
        <form class="add__form" action="vendor/body/add.php" method="post">
            <div class="popup__title">Кузов</div>
            <label class="popup__inner">
                <input class="form-input" name="name" type="text">
                <p class="popup__text">Название</p>
            </label>
            <input class="add__form-btn btn" type="submit" value="Добавить">
        </form>
    </div>

    <!-- Окно "Привод" -->
    <div class="popup__overlay mfp-hide" id="drive">
        <form class="add__form" action="vendor/drive/add.php" method="post">
            <div class="popup__title">Кузов</div>
            <label class="popup__inner">
                <input class="form-input" name="name" type="text">
                <p class="popup__text">Название</p>
            </label>
            <input class="add__form-btn btn" type="submit" value="Добавить">
        </form>
    </div>


    <script src="js/main.min.js"></script>
</body>

</html>