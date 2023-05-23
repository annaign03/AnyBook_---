<?PHP setcookie('user', $user['login'], time() + 60*30,'/'); 
header('Location: /index.php');
?>