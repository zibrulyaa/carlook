<?php
session_start(); //стартуем сессию

//Если переменная auth из сессии не пуста и равна true, то дадим доступ:
if (!empty($_SESSION['auth']) and $_SESSION['auth']):?>
<!DOCTYPE html>
<html lang="ru">
<?   require 'vendor/head.php'?>
<?   require 'db/db.php'?>
<body>
    <section class="clients">
        <div class="container">
            <nav class="menu">
                <ul class="menu__list">
                    <li class="menu__list-item"><a class="menu__list-link menu__list-home" href="home.php">Личный Кабинет</a></li>
                    <li class="menu__list-item"><a class="menu__list-link menu__list-cars " href="cars.php">Автомобили</a></li>
                    <li class="menu__list-item"><a class="menu__list-link menu__list-clients active" href="clients.php">Клиенты</a></li>
                    <li class="menu__list-item"><a class="menu__list-link menu__list-managers " href="managers.php">Сотрудники</a>
                    </li>
                </ul>
            </nav>
            <div class="clients__inner">
                <div class="tabs">
                    <div class="tabs__nav"> <button class="tabs__btn tabs__btn_active">Заявки</button> <button class="tabs__btn">Клиенты</button> </div>
                    <div class="tabs__content">
                        <div class="tabs__pane tabs__pane_show"> <a class="popup__btn request" href="#request">Создать</a>
                            <? require 'vendor/request/request.php'?>
                        </div>
                        <div class="tabs__pane">
                            <a class="popup__btn client" href="#client">Создать</a>
                            <? require 'vendor/client/client.php'?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="popup__overlay mfp-hide" id="request">
        <form class="add__form" action="vendor/request/add.php" method="post">
            <div class="popup__title">Заявка</div> <label class="popup__inner">
                <input class="form-input" name="date" type="date" required>
                <p class="popup__text">Дата</p>
            </label>
            <label class="popup__inner">
                <select name="manager" required>
                    <option value="">Выберите</option>
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
                <select name="client" required>
                    <option value="">Выберите</option>
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
                <select name="car" required>
                    <option value="">Выберите</option>
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
                <select name="status" required>
                    <option value="">Выберите</option>
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
            <input class="add__form-btn btn" name="save" type="submit" value="Добавить">
        </form>
    </div>

    <div class="popup__overlay mfp-hide" id="client">
        <form class="add__form" action="vendor/client/add.php" method="post">
            <div class="popup__title">Клиент</div>
            <label class="popup__inner">
                <input class="form-input" name="fname" type="text" required>
                <p class="popup__text">Фамилия</p>
            </label>
            <label class="popup__inner">
                <input class="form-input" name="lname" type="text" required>
                <p class="popup__text">Имя</p>
            </label>
            <label class="popup__inner"> <input class="form-input" name="mname" type="text" required>
                <p class="popup__text">Отчество</p>
            </label>
            <label class="popup__inner">
                <input class="form-input" name="tel" type="text" required>
                <p class="popup__text">Телефон</p>
            </label> <input class="add__form-btn btn" name="save" type="submit" value="Добавить">
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

