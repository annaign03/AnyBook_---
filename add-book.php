<?php 
if($_COOKIE['user']){
$book_id = $_POST['book_id'];
$selected_category = $_POST['selected_category'];
$user_login = $_COOKIE['user'];
$mysql = new mysqli('std-mysql','std_1832_magazin','123456789','std_1832_magazin');
$result = $mysql->query("SELECT id FROM `покупатель` WHERE `login`= '$user_login'");
$user_id = $result->fetch_assoc();
$user_id = $user_id['id'];
$result = $mysql->query("SELECT * FROM `корзина` WHERE `Произведение_id`= '$book_id' AND `Покупатель_id`= '$user_id'");
if(mysqli_num_rows($result)==0){
    $result = $mysql->query("INSERT INTO `корзина` (`Произведение_id`, `Покупатель_id`, `Количество`) VALUES ('$book_id', '$user_id', '1')");
}else{
    $result = $mysql->query("UPDATE `корзина` SET `Количество`=`Количество`+1 WHERE `Произведение_id`= '$book_id' AND `Покупатель_id`= '$user_id'");

}
echo 
setcookie('selected_category', $selected_category, time() + 60,'/');
$mysql->close;
header('Location: /catalog.php');}else{
    header('Location: /index.php');
}
?>