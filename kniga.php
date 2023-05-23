<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/kniga.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    

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
        <?php
        if ($_COOKIE['user']!=''):
          $book_id = $_POST['book_id'];
          $mysql = new mysqli('std-mysql','std_1832_magazin','123456789','std_1832_magazin');
          $result = $mysql->query("SELECT * FROM `произведение` WHERE `id`= '$book_id'");
          $book = $result->fetch_assoc();
          $book_name = $book['Название'];
          $book_year = $book['Год'];
          $book_image = $book['image'];
          $book_comment = $book['Описание'];
          $result = $mysql->query("SELECT * FROM `автор_has_произведение` WHERE `Произведение_id`= '$book_id'");   
          $author = $result->fetch_assoc();
          $author_id = $author['Автор_Код'];
          $result = $mysql->query("SELECT * FROM `автор` WHERE `Код`= '$author_id'");   
          $author = $result->fetch_assoc();
          $author_name = $author['Имя'];
          $author_lastname = $author['Фамилия'];
          $result = $mysql->query("SELECT * FROM `цена` WHERE `Произведение_id`= '$book_id'");
          $cost = $result->fetch_assoc();
          $book_cost = $cost['Стоимость'];
          ?>
                     

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


     <div class="kesagub-cell kesagub1">
     <img class="foto" src="<?php if ($book_image!=NULL){echo $book_image;}else{echo 'img/books.png';}?>" alt="">
     </div>


<div class="kesagub-cell kesagub2">
    <p class="menu">Название книги: <?php echo $book_name; ?></p>
    <p class="menu">ID книги: <?php echo $book_id ;?></p>
    <p class="menu">Автор: <?php echo $author_name." ".$author_lastname ;?></p>
    <p class="menu">Год выпуска: <?php echo $book_year ;?></p>
     </div>
     


     <div class="kesagub-cell kesagub3">
    <p class="i">Цена:<?php echo $book_cost."₽" ?></p>
    <form action="add-book.php" method="POST">
          <input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
          <button type = "submit" class="add">
              Добавить
          </button>
        </form>
                    
     </div>

    </div>
    <div class="kesagub-cell kesagub4">
     <p class="hlopik"><?php echo $book_comment; ?></p>
     
     </div>
   </div>
   
  </div>  <?php endif; ?>
  <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-  mb-3">
      <li class="nav-item"><a href="index.php" class="nav-link px-2 text-dark">Главная</a></li>
      <li class="nav-item"><a href="lk.php" class="nav-link px-2 text-dark">Личный кабинет</a></li>
      <li class="nav-item"><a href="korzina.php" class="nav-link px-2 text-dark">Корзина</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">Выйти</a></li>
    </ul>
    <p class="text-center text-dark">© 2023 Московский Политехнический Университет</p>
  </footer>

  
</body>
</html>