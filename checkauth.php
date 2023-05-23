<?php
$login=filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$pass=filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);


$mysql = new mysqli('std-mysql','std_1832_magazin','123456789','std_1832_magazin');

$result = $mysql->query("SELECT * FROM `покупатель` WHERE `login`= '$login' AND `pass` = '$pass'");
if (mysqli_num_rows($result)!=0){
    $user = $result->fetch_assoc();
    setcookie('user', $user['login'], time() + 60*30,'/');
    $mysql->close;
    header('Location: /lk.php');}
    else{
        echo"Пользователь не найден";
    }
?>
