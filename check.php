<?php
$login=filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$name=filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$pass=filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
$firstname=filter_var(trim($_POST['firstname']), FILTER_SANITIZE_STRING);
$lastname=filter_var(trim($_POST['lastname']), FILTER_SANITIZE_STRING);
$phone=filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING);
$birthday=filter_var(trim($_POST['birthday']), FILTER_SANITIZE_STRING);
$today = date("Y-m-d");


$mysql = new mysqli('std-mysql','std_1832_magazin','123456789','std_1832_magazin');
$mysql->query("INSERT INTO `покупатель` (`Фамилия`,`Имя`,`Отчество`,`Телефон`,`Дата рождения`,`login`,`pass`,`Дата регистрации`) VALUES ('$firstname','$name','$lastname','$phone','$birthday','$login','$pass','$today')");
$mysql->close();
header('Location: /');
?>