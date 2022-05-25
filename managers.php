<?php
session_start(); //стартуем сессию

//Если переменная auth из сессии не пуста и равна true, то дадим доступ:
if (!empty($_SESSION['auth']) and $_SESSION['auth']):?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarLook</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/libs.min.css">
    <link rel="stylesheet" href="css/style.css">
    <?php require 'db/db.php'?>
</head>

<body>
    <section class="managers">
        <div class="container">
            <nav class="menu">
                <ul class="menu__list">
                    <li class="menu__list-item"><a class="menu__list-link menu__list-home" href="home.php">Личный Кабинет</a></li>
                    <li class="menu__list-item"><a class="menu__list-link menu__list-cars " href="cars.php">Автомобили</a></li>
                    <li class="menu__list-item"><a class="menu__list-link menu__list-clients " href="clients.php">Клиенты</a></li>
                    <li class="menu__list-item"><a class="menu__list-link menu__list-managers active" href="managers.php">Сотрудники</a>
                    </li>
                </ul>
            </nav>
            <div class="managers__inner">
                <div class="tabs">
                    <div class="tabs__pane tabs__pane_show">
                        <a class="popup__btn manager" href="#manager">Создать</a>
                        <? require 'vendor/manager/manager.php'?>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="popup__overlay mfp-hide" id="manager">
        <form class="add__form" action="vendor/manager/add.php" method="post">
            <div class="popup__title">Сотрудник</div>
            <label class="popup__inner">
                <input class="form-input" name="fname"  type="text" required>
                <p class="popup__text">Фамилия</p>
            </label>
            <label class="popup__inner">
                <input class="form-input" name="lname" type="text" required>
                <p class="popup__text">Имя</p>
            </label>
            <label class="popup__inner">
                <input class="form-input" name="mname"  type="text" required>
                <p class="popup__text">Отчество</p>
            </label>
            <label class="popup__inner">
                <select name="post" required>
                    <option value="">Выберите</option>
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
                <input class="form-input" name="tel"  type="text" required>
                <p class="popup__text">Телефон</p>
            </label>
            <input class="add__form-btn btn" name="save" type="submit" value="Добавить">
        </form>
    </div>


    <script src="js/main.min.js"></script>
</body>

</html>

<?php
else:
    echo 'Доступ запрещен!';
    ?>
<?php   endif; ?>

