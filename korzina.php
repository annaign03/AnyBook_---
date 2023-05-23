<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/korzina.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    
    <title>Главная</title>

    <style>
   body {
    background: url(img/bg.jpg),
                url(img/фон1.jpg);
    background-repeat:repeat-y;
    background-attachment:fixed;
    -moz-background-size: 100%; /* Firefox 3.6+ */
    -webkit-background-size: 100%; /* Safari 3.1+ и Chrome 4.0+ */
    -o-background-size: 100%; /* Opera 9.6+ */
    background-size: 100%; /* Современные браузеры */
   }

  </style>
</head>
<body>

<header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="index.php" class="icon" ><img src="img/polka.png" alt="mdo" width="70" height="75"></a></li>
          <li><a href="index.php" class="icon"><img src="img/main.png" alt="mdo" width="230" height="100"></a></li>
        </ul>

        <form  method="POST" action="catalog.php" class="mx-auto" style="width: 700px" role="search">
          <input name="search" type="search" class="form-control" placeholder="Поиск..." aria-label="Поиск">
        </form>

<div class="dropdown">
          <button class="dropbtn"><a href="<?php if($_COOKIE['user']){echo "lk.php";}else{echo "auth.php";} ?>" class="icon" >
            <img src="img/icon.png" alt="mdo" width="70" height="66">
              </a></button>
                <div class="dropdown-content">
                <?php
                    if ($_COOKIE['user']!=''):?>
                    <a href="/lk.php">Личный кабинет</a>
                    <a href="/catalog.php">Каталог</a>
                    <a href="disauth.php">Выйти</a>
                    <?php else: ?>
                    <a href="auth.php">Войти</a>
                    <?php
                    
                        endif;
                        ?> 
                  
                </div>
        </div>



      
          <a href="<?php if($_COOKIE['user']){echo "korzina.php";}else{echo "auth.php";} ?>" class="korzina">
            <img src="img/korzina.png" alt="mdo" width="90" height="86" >
          </a>
  </div>
    </div>
  </header>


  <div class="container">
  <div class="damisamu-dsakgcesan">
   <div class="kesagub">
    <div class="gsame-kigcesan">
     <div class="kesagub-cell kesagub1">
     <nav class="menu1">
		<div class="ramka2"><a href="#">Личные данные</a></div><br>
        <div class="ramka2"><a href="zakaz.php">Мои заказы</a></div><br>
        <div class="ramka2"><a href="korzina.php">Корзина</a></div><br>
        <div class="ramka2"><a href="catalog.php">Каталог</a></div><br>
        <div class="ramka2"><a href="disauth.php">Выйти</a></div><br>
   </nav>
     </div>
     <?php $mysql = new mysqli('std-mysql','std_1832_magazin','123456789','std_1832_magazin');
  $login = $_COOKIE['user'];
  $result = $mysql->query("SELECT * FROM `покупатель` WHERE `login`= '$login'");
  $user = $result->fetch_assoc();
  $user_id = $user['id'];
  $result = $mysql->query("SELECT * FROM `корзина` WHERE `покупатель_id`= '$user_id'");
  $goods_id = [];
  $goods_kolvo = [];
  if (mysqli_num_rows($result)==0){
    echo "Корзина пуста";
  } else {
    while($row = $result->fetch_assoc()) {
      $goods_id[] = $row['Произведение_id'];
      $goods_kolvo[] = $row['Количество'];
    }
    for($i=0;$i<count($goods_id);$i++){
      $book_id = $goods_id[$i];
      $book_kolvo = $goods_kolvo[$i];
      $result = $mysql->query("SELECT * FROM `произведение` WHERE `id`= '$book_id'");
      $book = $result->fetch_assoc();
      $book_name = $book['Название'];
      $book_year = $book['Год'];
      $book_image = $book['image'];
      $result = $mysql->query("SELECT Стоимость FROM `цена` WHERE `Произведение_id`= '$book_id'");
      $price = $result->fetch_assoc();
      $book_price = $price["Стоимость"];
      $result=$mysql->query("SELECT * FROM `автор_has_произведение` WHERE `Произведение_id`= '$book_id'");
      $author = $result->fetch_assoc();
      $book_author = $author['Автор_Код'];
      $result=$mysql->query("SELECT * FROM `автор` WHERE `код`= '$book_author'");
      $author = $result->fetch_assoc();
      $book_author = $author['Имя'];
      $book_author_lastname = $author['Фамилия'];
      ?>
      <div class="kesagub-cell kesagub2">
  <div class="flex container">
  <div class="cart">
     <p class="name1"><?php echo $book_name ?></p>
     <img class="cartn" src="<?php if ($book_image!=NULL){echo $book_image;}else{echo 'img/books.png';}?>" alt="">
     <div class="cost">
       <?php echo $book_author." ".$book_author_lastname ?>
     </div>
     <div class="cost">
     <?php echo $book_price ?>₽
     </div>
     <div class="damisamu-dsakgcesan">
   <div class="kesagub1">
    <div class="gsame-kigcesan">
     <div class="kesagub-cell1 kesagub1">
     <form action="substract-book-korzina.php" method="POST">
       <input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
       <button type = "submit" class="mey">
           -
       </button>
     </form>
     </div>
     <div class="kesagub-cell1 kesagub3">
     <div class="cost">
     <?php echo $book_kolvo ?>шт.
     </div>
     </div>
     <div class="kesagub-cell kesagub2">
     <form action="add-book-korzina.php" method="POST">
       <input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
       <button type = "submit" class="mey">
           +
       </button>
     </form>
     </div>
    </div>
   </div>
  </div>
     
     
     
     
  </div>
  </div>
     </div>
     
       <?php }
   }
 $mysql->close;
 ?>
 <form action="add-zakaz.php" method="POST">
       <button type = "submit" class="add">
           Купить
       </button>
     </form>
  </div>
  </div>
  </div>
  </div>
  </div>
     </div>
    </div>
   </div>
  </div>
  </div>





  <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-  mb-3">
      <li class="nav-item"><a href="index.php" class="nav-link px-2 text-dark">Главная</a></li>
      <li class="nav-item"><a href="lk.php" class="nav-link px-2 text-dark">Личный кабинет</a></li>
      <li class="nav-item"><a href="korzina.php" class="nav-link px-2 text-dark">Корзина</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">Выйти</a></li>
    </ul>
    <p class="text-center text-dark">© 2023 Московский Политехнический Университет</p>
  </footer>





</div>

 
  
  
   




</body>
</html>