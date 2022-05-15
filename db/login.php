<?php
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

$pass = md5($pass); // Создаем хэш из пароля

$mysql = new mysqli('localhost', 'root', '', 'f0650590_carlook');


$result = $mysql->query("SELECT * FROM users WHERE login = '$login' AND password = '$pass'");
$user = $result->fetch_assoc(); // Конвертируем в массив

if(count($user) == 0){
    echo "Такой пользователь не найден.";
    exit();
}
else if(count($user) == 1){
    echo "Логин или пароль введены неверно";
    exit();
}

setcookie('user', $user['name'], time() + 3600, "/");

$mysql->close();

header('Location: ../../home.php');
