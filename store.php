<?php
include('db.php');
include('banner.php');
?>
<link rel="stylesheet" href="./css/store.css" />
<?php
include('header_menu.php');
?>
<div class="banner">
    <div class="banner__container">
        <div class="banner__left">
            <div class="banner__left-heading">
                <p>HỖ TRỢ TRỰC TUYẾN</p>
            </div>
            <table>
                <tr class="banner__bd">
                    <td class="banner__left-img"></td>
                </tr>
                <tr class="banner__bd">
                    <td class="banner__bd">
                        <p>Hỗ trợ trực tuyến 1:</p>
                        <i class="fa fa-phone-square"></i>
                        <span>Hotline: 0123 456 789</span>
                    </td>
                </tr>
                <tr class="banner__bd">
                    <td class="banner__bd">
                        <p>Hỗ trợ trực tuyến 2:</p>
                        <i class="fa fa-phone-square"></i>
                        <span> Hotline: 0123 456 789</span>
                    </td>
                </tr>
                <tr class="banner__bd">
                    <td class="banner__bd">
                        <i class="fa fa-envelope"></i><span>FastFood@gmail.com</span>
                    </td>
                </tr>
            </table>
        </div>
        <div class="banner__right">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                        class="active bottom" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" class="bottom"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" class="bottom"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" class="bottom"
                        aria-label="Slide 4"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./img/banner-1-1.jpg" class="d-block w-100" alt="..." />
                    </div>
                    <div class="carousel-item">
                        <img src="./img/banner-4-4.jpg" class="d-block w-100" alt="..." />
                    </div>
                    <div class="carousel-item">
                        <img src="./img/banner-3.png" class="d-block w-100" alt="..." />
                    </div>
                    <div class="carousel-item end">
                        <img src="./img/banner-4.jpg" class="d-block w-100" alt="..." />
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="main">
    <div class="main__container">
        <!-- bdau 1 cate -->
        <div class="main__heading">
            <p>Gà</p>
            <img src="./img/content.png" alt="" />
        </div>
        <div class="main__content">
            <!-- tính % giảm giá và giá -->
            <?php
      $sql = "SELECT * FROM `food`  where cate_id='24'  LIMIT 0,4";
      $res = mysqli_query($con, $sql);
      $count = mysqli_num_rows($res);
      if ($count > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
          $id = $row['id'];
          $title = $row['title'];
          $price = $row['price'];
          $price_2 = $row['price_2'];
          if ($price_2 < 10) {
            //00 + 3 = 003
            $price_2 = '00' . $price_2;
          } else if ($price_2 < 100) {
            $price_2 = '0' . $price_2;
            //0 + 10 = 010
          }

          $desc = $row['desc'];
          $image = $row['image'];
          $pro = $row['pro'];
          $price_3 = ($price * 1000 + $price_2) - ($price * 1000 + $price_2) * $pro / 100;

          if ($price_3 % 1000 < 10) {
            // 3.002đ = 3 + ".00"+ 2
            $price_4 = floor($price_3 / 1000) . ".00" . ($price_3 % 1000);
          } else if ($price_3 % 1000 < 100) {
            $price_4 = floor($price_3 / 1000) . ".0" . ($price_3 % 1000);
          } else {
            $price_4 = floor($price_3 / 1000) . "." . ($price_3 % 1000);
          }

          echo "
         <div class='main__eat'>";
          // nếu giảm giá khác 0 thì hiện % giá
          if ($pro != 0) {
            echo "<p>-$pro%</p>";
          }
          // hiển thị sản phẩm
          echo "<img src='./img/$image' alt='' />
        <a href='./details.php?id=$id'>$title</a>
        <div class='main__money'>";
          if ($pro != 0) {
            echo "<i>$price.$price_2<i>đ</i></i>
          <span>$price_4<span>đ</span></span>";
          } else {
            echo "
            <span>$price_4<span>đ</span></span>   ";
          }
          echo "     
        </div>
      </div>  ";
        }
      } else {
        echo "Khong co hang";
      }
      ?>

        </div>
        <!--het nd 1 cate   -->
        <div class="main__heading">
            <p>Bánh mỳ</p>
            <img src="./img/content.png" alt="" />
        </div>
        <div class="main__content">
            <!-- tính % giảm giá và giá -->
            <?php
      $sql = "SELECT * FROM `food`  where cate_id='25'  LIMIT 0,4";
      $res = mysqli_query($con, $sql);
      $count = mysqli_num_rows($res);
      if ($count > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
          $id = $row['id'];
          $title = $row['title'];
          $price = $row['price'];
          $price_2 = $row['price_2'];
          if ($price_2 < 10) {
            $price_2 = '00' . $price_2;
          } else if ($price_2 < 100) {
            $price_2 = '0' . $price_2;
          }

          $desc = $row['desc'];
          $image = $row['image'];
          $pro = $row['pro'];
          $price_3 = ($price * 1000 + $price_2) - ($price * 1000 + $price_2) * $pro / 100;
          if ($price_3 % 1000 < 10) {
            $price_4 = floor($price_3 / 1000) . ".00" . ($price_3 % 1000);
          } else if ($price_3 % 1000 < 100) {
            $price_4 = floor($price_3 / 1000) . ".0" . ($price_3 % 1000);
          } else {
            $price_4 = floor($price_3 / 1000) . "." . ($price_3 % 1000);
          }

          echo "
         <div class='main__eat'>";
          // nếu giảm giá khác 0 thì hiện % giá
          if ($pro != 0) {
            echo "<p>-$pro%</p>";
          }
          // hiển thị sản phẩm
          echo "<img src='./img/$image' alt='' />
        <a href='./details.php?id=$id'>$title</a>
        <div class='main__money'>";
          if ($pro != 0) {
            echo "<i>$price.$price_2<i>đ</i></i>
          <span>$price_4<span>đ</span></span>";
          } else {
            echo "
            <span>$price_4<span>đ</span></span>   ";
          }
          echo "     
        </div>
      </div>  ";
        }
      } else {
        echo "Khong co hang";
      }
      ?>
        </div>
        <div class="main__heading">
            <p>Đồ uống</p>
            <img src="./img/content.png" alt="" />
        </div>
        <div class="main__content">
            <!-- tính % giảm giá và giá -->
            <?php
      $sql = "SELECT * FROM `food`  where cate_id='26'  LIMIT 0,4";
      $res = mysqli_query($con, $sql);
      $count = mysqli_num_rows($res);
      if ($count > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
          $id = $row['id'];
          $title = $row['title'];
          $price = $row['price'];
          $price_2 = $row['price_2'];
          if ($price_2 < 10) {
            $price_2 = '00' . $price_2;
          } else if ($price_2 < 100) {
            $price_2 = '0' . $price_2;
          }

          $desc = $row['desc'];
          $image = $row['image'];
          $pro = $row['pro'];
          $price_3 = ($price * 1000 + $price_2) - ($price * 1000 + $price_2) * $pro / 100;
          if ($price_3 % 1000 < 10) {
            $price_4 = floor($price_3 / 1000) . ".00" . ($price_3 % 1000);
          } else if ($price_3 % 1000 < 100) {
            $price_4 = floor($price_3 / 1000) . ".0" . ($price_3 % 1000);
          } else {
            $price_4 = floor($price_3 / 1000) . "." . ($price_3 % 1000);
          }

          echo "
         <div class='main__eat'>";
          // nếu giảm giá khác 0 thì hiện % giá
          if ($pro != 0) {
            echo "<p>-$pro%</p>";
          }
          // hiển thị sản phẩm
          echo "<img src='./img/$image' alt='' />
        <a href='./details.php?id=$id'>$title</a>
        <div class='main__money'>";
          if ($pro != 0) {
            echo "<i>$price.$price_2<i>đ</i></i>
          <span>$price_4<span>đ</span></span>";
          } else {
            echo "
            <span>$price_4<span>đ</span></span>   ";
          }
          echo "     
        </div>
      </div>  ";
        }
      } else {
        echo "Khong co hang";
      }
      ?>
        </div>
        <div class="main__heading">
            <p>Cơm trộn</p>
            <img src="./img/content.png" alt="" />
        </div>
        <div class="main__content">
            <!-- tính % giảm giá và giá -->
            <?php
      $sql = "SELECT * FROM `food`  where cate_id='27'  LIMIT 0,4";
      $res = mysqli_query($con, $sql);
      $count = mysqli_num_rows($res);
      if ($count > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
          $id = $row['id'];
          $title = $row['title'];
          $price = $row['price'];
          $price_2 = $row['price_2'];
          if ($price_2 < 10) {
            $price_2 = '00' . $price_2;
          } else if ($price_2 < 100) {
            $price_2 = '0' . $price_2;
          }

          $desc = $row['desc'];
          $image = $row['image'];
          $pro = $row['pro'];
          $price_3 = ($price * 1000 + $price_2) - ($price * 1000 + $price_2) * $pro / 100;
          if ($price_3 % 1000 < 10) {
            $price_4 = floor($price_3 / 1000) . ".00" . ($price_3 % 1000);
          } else if ($price_3 % 1000 < 100) {
            $price_4 = floor($price_3 / 1000) . ".0" . ($price_3 % 1000);
          } else {
            $price_4 = floor($price_3 / 1000) . "." . ($price_3 % 1000);
          }

          echo "
         <div class='main__eat'>";
          // nếu giảm giá khác 0 thì hiện % giá
          if ($pro != 0) {
            echo "<p>-$pro%</p>";
          }
          // hiển thị sản phẩm
          echo "<img src='./img/$image' alt='' />
        <a href='./details.php?id=$id'>$title</a>
        <div class='main__money'>";
          if ($pro != 0) {
            echo "<i>$price.$price_2<i>đ</i></i>
          <span>$price_4<span>đ</span></span>";
          } else {
            echo "
            <span>$price_4<span>đ</span></span>   ";
          }
          echo "     
        </div>
      </div>  ";
        }
      } else {
        echo "Khong co hang";
      }
      ?>
        </div>
        <div class="main__heading">
            <p>Pizza</p>
            <img src="./img/content.png" alt="" />
        </div>
        <div class="main__content">
            <!-- tính % giảm giá và giá -->
            <?php
      $sql = "SELECT * FROM `food`  where cate_id='28'  LIMIT 0,4";
      $res = mysqli_query($con, $sql);
      $count = mysqli_num_rows($res);
      if ($count > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
          $id = $row['id'];
          $title = $row['title'];
          $price = $row['price'];
          $price_2 = $row['price_2'];
          if ($price_2 < 10) {
            $price_2 = '00' . $price_2;
          } else if ($price_2 < 100) {
            $price_2 = '0' . $price_2;
          }

          $desc = $row['desc'];
          $image = $row['image'];
          $pro = $row['pro'];
          $price_3 = ($price * 1000 + $price_2) - ($price * 1000 + $price_2) * $pro / 100;
          if ($price_3 % 1000 < 10) {
            $price_4 = floor($price_3 / 1000) . ".00" . ($price_3 % 1000);
          } else if ($price_3 % 1000 < 100) {
            $price_4 = floor($price_3 / 1000) . ".0" . ($price_3 % 1000);
          } else {
            $price_4 = floor($price_3 / 1000) . "." . ($price_3 % 1000);
          }

          echo "
         <div class='main__eat'>";
          // nếu giảm giá khác 0 thì hiện % giá
          if ($pro != 0) {
            echo "<p>-$pro%</p>";
          }
          // hiển thị sản phẩm
          echo "<img src='./img/$image' alt='' />
        <a href='./details.php?id=$id'>$title</a>
        <div class='main__money'>";
          if ($pro != 0) {
            echo "<i>$price.$price_2<i>đ</i></i>
          <span>$price_4<span>đ</span></span>";
          } else {
            echo "
            <span>$price_4<span>đ</span></span>   ";
          }
          echo "     
        </div>
      </div>  ";
        }
      } else {
        echo "Khong co hang";
      }
      ?>
        </div>
        <div class="main__heading">
            <p>Mỳ</p>
            <img src="./img/content.png" alt="" />
        </div>
        <div class="main__content">
            <!-- tính % giảm giá và giá -->
            <?php
      $sql = "SELECT * FROM `food`  where cate_id='29'  LIMIT 0,4";
      $res = mysqli_query($con, $sql);
      $count = mysqli_num_rows($res);
      if ($count > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
          $id = $row['id'];
          $title = $row['title'];
          $price = $row['price'];
          $price_2 = $row['price_2'];
          if ($price_2 < 10) {
            $price_2 = '00' . $price_2;
          } else if ($price_2 < 100) {
            $price_2 = '0' . $price_2;
          }

          $desc = $row['desc'];
          $image = $row['image'];
          $pro = $row['pro'];
          $price_3 = ($price * 1000 + $price_2) - ($price * 1000 + $price_2) * $pro / 100;
          if ($price_3 % 1000 < 10) {
            $price_4 = floor($price_3 / 1000) . ".00" . ($price_3 % 1000);
          } else if ($price_3 % 1000 < 100) {
            $price_4 = floor($price_3 / 1000) . ".0" . ($price_3 % 1000);
          } else {
            $price_4 = floor($price_3 / 1000) . "." . ($price_3 % 1000);
          }

          echo "
         <div class='main__eat'>";
          // nếu giảm giá khác 0 thì hiện % giá
          if ($pro != 0) {
            echo "<p>-$pro%</p>";
          }
          // hiển thị sản phẩm
          echo "<img src='./img/$image' alt='' />
        <a href='./details.php?id=$id'>$title</a>
        <div class='main__money'>";
          if ($pro != 0) {
            echo "<i>$price.$price_2<i>đ</i></i>
          <span>$price_4<span>đ</span></span>";
          } else {
            echo "
            <span>$price_4<span>đ</span></span>   ";
          }
          echo "     
        </div>
      </div>  ";
        }
      } else {
        echo "Khong co hang";
      }
      ?>
        </div>

    </div>
</div>
<?php
include('footer_menu.php');
?>