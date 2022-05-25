<!DOCTYPE html>
<html lang=ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/libs.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="login">
        <div class="container">
            <div class="login__inner">
                <div class="login__info">
                    <h1 class="login__info-title">CarLook</h1>
                    <p class="login__info-subtitle">Система управления данными</p>
                    <img class="login__info-img" src="images/car.svg" alt="">
                </div>
                <div class="login__form">
                    <form action="index.php" method="post">
                        <h3 class="login__form-title">Авторизация</h3>
                        <div class="login__form-box">
                            <div class="login__form-login"> <img src="/images/autorization/login.svg" alt=""> </div>
                            <input class="login__form-input" type="text" name="login" placeholder="Логин" required>
                        </div>
                        <div class="login__form-box">
                            <div class="login__form-password"> <img src="images/autorization/password.svg" alt=""></div>
                            <input class="login__form-input " type="password" name="password" placeholder="Пароль" required>
                        </div>
                        <input class="login__form-btn btn" type="submit" value="ВОЙТИ">
                    </form>
                    <?php
                    //Если форма авторизации отправлена...
                    if (!empty($_REQUEST['password']) and !empty($_REQUEST['login'])) {
                        //Пишем логин и пароль из формы в переменные (для удобства работы):
                        $login = $_REQUEST['login'];
                        $password = $_REQUEST['password'];

                        /*
                        Формируем и отсылаем SQL запрос:
                        ВЫБРАТЬ ИЗ таблицы_users ГДЕ поле_логин = $login
                        */

                        $mysql = new mysqli('localhost', 'root', '', 'f0650590_carlook');

                        $query = 'SELECT * FROM users WHERE login="' . $login . '"';
                        $result = $mysql->query($query); //ответ базы запишем в переменную $result

                        //Преобразуем ответ из БД в нормальный массив PHP:
                        $user = $result->fetch_assoc();

                        //Если база данных вернула не пустой ответ - значит такой логин есть...
                        if (!empty($user)) {
                            //Получим соль:
                            $salt = $user['salt'];

                            //Посолим пароль из формы:
                            $hash = md5($password);
                            $saltedPassword = $hash . $salt;

                            //Если соленый пароль из базы совпадает с соленым паролем из формы...
                            if ($user['password'] == $hash) {
                                //Стартуем сессию:
                                session_start();
                                //Пишем в сессию информацию о том, что мы авторизовались:
                                $_SESSION['auth'] = true;

                                /*
                                Пишем в сессию логин и id пользователя
                                (их мы берем из переменной $user!):
                                */
                                $_SESSION['id'] = $user['id'];
                                $_SESSION['login'] = $user['login'];
                                header("Location: home.php");
                            } //Если соленый пароль из базы НЕ совпадает с соленым паролем из формы...
                            else {
                                //Выводим сообщение 'Неправильный логин или пароль'.
                                echo  '<p class="error">Неправильный логин или пароль</p>';
                            }
                        } else {
                            //Нет такого логина, выведем сообщение об ошибке.
                            echo  '<p class="error">Неправильный логин или пароль</p>';
                        }
                    }?>
                </div>
            </div>
        </div>
    </section>
    <script src="js/main.min.js"></script>
</body>

</html>
