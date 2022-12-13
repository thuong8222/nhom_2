<?php
include('db.php');
include('banner.php');
?>
<link rel="stylesheet" href="./style_index.css">
<?php
include('header_menu.php');
?>
<div class="banner">
    <div class="banner__content">
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
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Welcome FastFood</h5>
                        <a href="./store.php"><i class="fa fa-file-alt"></i>MENU</a>
                    </div>
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
<div class="hero">

    <div class="hero__container">

        <div class="hero__left">
            <img src="./img/canh-ga.jpg" alt="" />
        </div>
        <div class="hero__right">
            <div class="hero__right-top">
                <img src="./img/sua-chua.jpg" alt="" />
                <img src="./img/ga-chua-ngot.jpeg" alt="" />
            </div>
            <div class="hero__right-bottom">
                <img src="./img/main-du-ga.jpg" alt="" />
            </div>
        </div>
    </div>
</div>
<div class="menu">
    <div class="menu__container">
        <div class="menu__left">
            <div class="menu__left-heading">
                <img src="./img/bg_thucdon.png.webp" alt="" />
            </div>
            <div class="menu__left-bottom">
                <ul>
                    <!-- điều hướng danh mục sản phẩm -->
                    <?php
          $sql = "SELECT * FROM `cate` LIMIT 0,4";
          $res = mysqli_query($con, $sql);
          while ($row = mysqli_fetch_assoc($res)) {
            $id = $row['id'];
            $title = $row['title'];
            echo "
          <li>
          <a href='./cate.php?cate_id=$id&title=id&asc=asc'>$title</a>
          </li>
          ";
          }
          ?>
                </ul>
            </div>
        </div>
        <div class="menu__right">
            <!-- hiển thị sản phẩm -->
            <?php
      $sql = "SELECT * FROM `food` where cate_id='24' order by 1 DESC LIMIT 0,1 ";
      $res = mysqli_query($con, $sql);
      $count = mysqli_num_rows($res);
      if ($count > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
          $id = $row['id'];
          $title = $row['title'];
          $price = $row['price'];
          $price_2 = $row['price_2'];
          $desc = $row['desc'];
          $image = $row['image'];
          if ($price_2 < 10) {
            $price_2 = '00' . $price_2;
          } else if ($price_2 < 100) {
            $price_2 = '0' . $price_2;
          }
          echo "
           <div class='menu__right-start'>
        <div class='menu__right-start-heading'>
          <p>Món Mới</p>
        </div>
        <div class='menu__right-start-bottom'>
          <div class='menu__eat'>
            <img src='./img/$image' alt='' />
            <a href='./details.php?id=$id'>$title</a>
            <div class='menu__money'>
              <span>$price.$price_2<span>đ</span></span>
            </div>
          </div>
        </div>
      </div>   ";
        }
      } else {
        echo "Khong co hang";
      }
      ?>
            <div class="menu__right-center">
                <!-- hiển thị sản phẩm -->
                <?php
        $sql = "SELECT * FROM `food` where cate_id='25' order by 1 DESC LIMIT 0,1 ";
        $res = mysqli_query($con, $sql);
        $count = mysqli_num_rows($res);
        if ($count > 0) {
          while ($row = mysqli_fetch_assoc($res)) {
            $id = $row['id'];
            $title = $row['title'];
            $price = $row['price'];
            $desc = $row['desc'];
            $image = $row['image'];
            $price_2 = $row['price_2'];
            if ($price_2 < 10) {
              $price_2 = '00' . $price_2;
            } else if ($price_2 < 100) {
              $price_2 = '0' . $price_2;
            }
            // hiển thị sản phẩm
            echo "
             <div class='menu__right-center-title'>
          <div class='menu__center-eat'>
            <img src='./img/$image' alt='' />
             <a href='./details.php?id=$id'>$title</a>
            <div class='menu__center-money'>
              <span>
              $price.$price_2<span>đ</span>
              </span>
            </div>
          </div>
        </div>  ";
          }
        } else {
          echo "Khong co hang";
        }
        ?>
            </div>
            <div class="menu__right-end">
                <div class="menu__right-end-bottom">
                    <div class="menu__eat-end">
                        <!-- hiển thị sản phẩm và tính % giảm giá -->
                        <?php
            $sql = "SELECT * FROM `food` where cate_id='26' order by 1 DESC LIMIT 0,1 ";
            $res = mysqli_query($con, $sql);
            $count = mysqli_num_rows($res);
            if ($count > 0) {
              while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $price_2 = $row['price_2'];
                $pro = $row['pro'];
                $desc = $row['desc'];
                $image = $row['image'];
                if ($price_2 < 10) {
                  $price_2 = '00' . $price_2;
                } else if ($price_2 < 100) {
                  $price_2 = '0' . $price_2;
                }
                $price_3 = ($price * 1000 + $price_2) - ($price * 1000 + $price_2) * $pro / 100;
                if ($price_3 % 1000 < 10) {
                  $price_4 = floor($price_3 / 1000) . ".00" . ($price_3 % 1000);
                } else if ($price_3 % 1000 < 100) {
                  $price_4 = floor($price_3 / 1000) . ".0" . ($price_3 % 1000);
                } else {
                  $price_4 = floor($price_3 / 1000) . "." . ($price_3 % 1000);
                }
                if ($pro != 0) {
                  echo "<p>-$pro%</p>";
                }
                // hiển thị sản phẩm
                echo "
            <img src='./img/$image' alt='' />
           <a href='./details.php?id=$id'>$title</a>
            <div class='menu__money-end'>
              <span>
              $price.$price_2<span>đ</span>
              </span>
            </div>  ";
              }
            } else {
              echo "Khong co hang";
            }
            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('footer_menu.php');
?>