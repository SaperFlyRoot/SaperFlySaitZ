<?php
$link = new mysqli('localhost', 'admin', '0000', 'db_shop');
if (mysqli_connect_error()) {
 die('Ошибка подключения (' . mysqli_connect_errno() . ') '
  . mysqli_connect_error());
} 
mysqli_set_charset($link, "cp_1251");
?>