<?php
session_start(); //стартуем сессию

//Если переменная auth из сессии не пуста и равна true, то дадим доступ:
if (!empty($_SESSION['auth']) and $_SESSION['auth']):?>
    <!DOCTYPE html>
    <html lang=ru">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CarLook</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/libs.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
    <section class="home">
        <div class="container">
            <nav class="menu">
                <ul class="menu__list">
                    <li class="menu__list-item"><a class="menu__list-link menu__list-home active" href="home.php">Личный Кабинет</a></li>
                    <li class="menu__list-item"><a class="menu__list-link menu__list-cars " href="cars.php">Автомобили</a></li>
                    <li class="menu__list-item"><a class="menu__list-link menu__list-clients " href="clients.php">Клиенты</a></li>
                    <li class="menu__list-item"><a class="menu__list-link menu__list-managers " href="managers.php">Сотрудники</a>
                    </li>
                </ul>
            </nav>
            <div class="home__inner">
                <aside class="home__aside">
                    <div class="home__aside-avatar"> <img src="images/avatar.jpg" alt="avatar"> </div>
                    <p class="home__aside-name">Дмитрий Макаров</p>
                    <p class="home__aside-post">Администратор</p>
                    <form action="db/logout.php" method="post"> <input class="btn logout" type="submit" value="Выйти"> </form>
                </aside>
                <div class="home__content">
                    <div class="home__content-welcome"> Добро пожаловать, Дмитрий! </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/main.min.js"></script>
    </body>

    </html>

<?php
else:
echo 'Доступ запрещен!';
?>
<?php   endif; ?>

