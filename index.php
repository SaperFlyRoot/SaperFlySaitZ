<?php
include("include/db_connect.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <!--кодировка-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
       <!--Для поисковика что бы понимал о чёем сайт(description)-->
        <meta name="description" content="Интернет магазин цифровой техники">
        <!--Ключевые слова-->
        <meta name="Keywords" content="Купить ноутбук, купить телефон, купить, недорого, симферополь, в симферополе, онлайн">
        <!--Автоподгрузка документа(не знаю еще буду ли использовать)(тут у казано каждые 5 сек)-->
        <meta html-equiv="refresh" content="5; URL=http://www.xxx.ru" >
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js"></script>
        <script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="/js/jcarousellite_1.0.1.js"></script>
        <script type="text/javascript" src="/js/shop-script.js"></script>
        <script type="text/javascript" src="/js/jquery.cookie.min.js"></script>
        <script type="text/javascript" src="/trackbar/jquery.trackbar.js"></script>
        <script type="text/javascript" src="/js/TextChange.js"></script>
    </head>
     <body>
         <div id="block-body">
         <?php
            include("include/block-header.php");
            ?>
             <div id="block-right">
             
             <?php
                 include("include/block-category.php");
                 include("include/block-parameter.php");
                 include("include/block-news.php");
            ?>
             </div>
             <div id="block-content">
             
                 <div id="block-sorting">
                 <p id="nav-breadcrumbs"><a href="index.php">Главная странциа</a> \ <span>Все товары</span></p>
                     
                     <ul id="options-list">
                     <li>ВИД:</li>
                         <li><img id="style-grid" src="/img/icon-grid.png" /></li>
                         <li><img id="style-list" src="/img/icon-list.png" /></li

                        <li>Сортировка:</li>
                         <li><a id="select-sort">Без сортировки</a>

                             <ul id="sorting-list">
                                 <li><a href="">От дешевых к дорогим</a></li>
                                 <li><a href="">От дорогих к дешевым</a></li>
                                 <li><a href="">Популярное</a></li>
                                 <li><a href="">Новинки</a></li>
                                 <li><a href="">От А до Я</a></li>
                             </ul>
                         </li>
                     </ul>
                 </div>

             <ul id="block-tovar-grid">
              <?php
              $result =  mysqli_query($link, "SELECT * FROM  `table_products`");
              if(mysqli_num_rows($result) > 0) {
                  $row = mysqli_fetch_array($result);
                  do {
                      if ($row["image"] != "" && file_exists("./uploads_images/" . $row["image"])) {
                          $img_path = './uploads_images/' . $row["image"];
                          $max_width = 200;
                          $max_height = 200;
                          list($width, $height) = getimagesize($img_path);
                          $ratioh = $max_height / $height;
                          $ratiow = $max_width / $width;
                          $ratio = min($ratioh, $ratiow);
                          $width = intval($ratio * $width);
                          $height = intval($ratio * $height);
                      } else {
                          $img_path = "/img/no-images.png";
                          $width = 110;
                          $height = 200;
                      }
                      echo '
                    <li>
                    <div class="block-images-grid">
                    <img src="'.$img_path .'" width="'.$width .'" height="'.$height.'"/>
                    </div>
                    <p class="style-title-grid"><a href="">'.$row["title"].'</a></p>
                    <ul class="reviews-and-counts-grid">
                    <li><img src="/img/eye-icon.png"/><p>0</p></li>
                    <li><img src="/img/comment-icon.png"/><p>0</p></li>
                    </ul>
                    <a class="add-cart-style-grid"></a>
                    <p class="style-price-grid"><strong>'.$row["price"].'</strong>руб.</p>
                    <div class="mini-features">' . $row["mini_features"].'</div>
                    </li>
                    ';
                  } while ($row = mysqli_fetch_array($result));
              }
            ?>
                 <ul id="block-tovar-list">
                     <?php
                     $result =  mysqli_query($link, "SELECT * FROM  `table_products` WHERE visible='1'");
                     if(mysqli_num_rows($result) > 0) {
                         $row = mysqli_fetch_array($result);
                         do {
                             if ($row["image"] != "" && file_exists("./uploads_images/" . $row["image"])) {
                                 $img_path = './uploads_images/' . $row["image"];
                                 $max_width = 150;
                                 $max_height = 150;
                                 list($width, $height) = getimagesize($img_path);
                                 $ratioh = $max_height / $height;
                                 $ratiow = $max_width / $width;
                                 $ratio = min($ratioh, $ratiow);
                                 $width = intval($ratio * $width);
                                 $height = intval($ratio * $height);
                             } else {
                                 $img_path = "/img/noimages80x70.png";
                                 $width = 80;
                                 $height = 70;
                             }
                             echo '
                    <li>
                    <div class="block-images-list">
                    <img src="'.$img_path .'" width="'.$width .'" height="'.$height.'"/>
                    </div>
                    
                    <ul class="reviews-and-counts-list">
                    <li><img src="/img/eye-icon.png"/><p>0</p></li>
                    <li><img src="/img/comment-icon.png"/><p>0</p></li>
                    </ul>
                    <p class="style-title-list"><a href="">'.$row["title"].'</a></p>
                    
                    <a class="add-cart-style-list"></a>
                    <p class="style-text-list"><strong>'.$row["price"].'</strong>руб.</p>
                    <div class="mini_description">' . $row["mini_features"].'</div>
                    </li>
                    ';
                         } while ($row = mysqli_fetch_array($result));
                     }
                     ?>
                 </ul>
                 </ul>
             <?php
            include("include/block-footer.php");
            ?>
         </div>
        </body>
</html>