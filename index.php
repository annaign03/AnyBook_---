<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
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
    <?php
                    if ($_COOKIE['user']!=''):?>
                    <?php 
                        endif;
                        ?> 
  </header>
<p class="textt">Любая книга в любое время-</p>
<p class="textt">вот наш девиз!</p></br>
  <div class="flex">
    <button class="knopka"><a class="decor" href="catalog.php">Выбрать книгу</a></button>
  </div>


  <footer class="py-3 my-4">
    <ul class=" nav justify-content-center border-bottom pb-  mb-3">
      <li class="nav-item"><a href="index.php" class="nav-link px-2 text-dark">Главная</a></li>
      <li class="nav-item"><a href="lk.php" class="nav-link px-2 text-dark">Личный кабинет</a></li>
      <li class="nav-item"><a href="korzina.php" class="nav-link px-2 text-dark">Корзина</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">Выйти</a></li>
    </ul>
    <p class="text-center text-dark">© 2023 Московский Политехнический Университет</p>
  </footer>


  



</body>
</html>