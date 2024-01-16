<?php
define('DB_HOST', 'localhost'); //Адрес
define('DB_USER', 'root'); //Имя пользователя
define('DB_PASSWORD', ''); //Пароль
define('DB_NAME', 'call_center'); //Имя БД
$connect = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
mysqli_set_charset($connect, "utf8");
?>