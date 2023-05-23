<?php 
if($_COOKIE['user']){
$book_id = $_POST['book_id'];
$user_login = $_COOKIE['user'];
$mysql = new mysqli('std-mysql','std_1832_magazin','123456789','std_1832_magazin');
$result = $mysql->query("SELECT id FROM `покупатель` WHERE `login`= '$user_login'");
$user_id = $result->fetch_assoc();
$user_id = $user_id['id'];
$result = $mysql->query("SELECT * FROM `корзина` WHERE `Произведение_id`= '$book_id' AND `Покупатель_id`= '$user_id'");
$kolvo = $result->fetch_assoc();
$kolvo = $kolvo['Количество'];
if($kolvo<=1){
    $result = $mysql->query("DELETE FROM `корзина` WHERE `корзина`.`Произведение_id` = '$book_id' AND `корзина`.`Покупатель_id` = '$user_id'");
}else{
    $result = $mysql->query("UPDATE `корзина` SET `Количество`=`Количество`-1 WHERE `Произведение_id`= '$book_id' AND `Покупатель_id`= '$user_id'");
}
$mysql->close;
header('Location: /korzina.php');}else{
    header('Location: /index.php');
}
?>