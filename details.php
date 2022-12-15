<?php
include('db.php');
include('banner.php');
?>
<link rel="stylesheet" href="./css/details.css">
<?php
include('header_menu.php');
$id_food = $_GET['id'];
?>

<div class="hero">
    <!-- kiểm tra xem sản phẩm có trong giỏ hàng chưa -->
    <?php  if (isset($_GET['add'])) {
    $id = $_GET['add'];
    $size = $_POST['size'];
    $sql = "SELECT * FROM `cart` WHERE id='$id'";
    $res = mysqli_query($con, $sql);
    // echo  $sql;
    $count = mysqli_num_rows($res);
    $sql_2 = "SELECT * FROM food WHERE id='$id'";
    $res_2 = mysqli_query($con, $sql_2);
    $row = mysqli_fetch_assoc($res_2);
    $price = $row['price'];
    $price_2 = $row['price_2'];
    if ($count > 0) {
      echo "<script>alert('Sản phẩm đã có trong giỏ hàng')</script>";
      echo "<script>window.open('details.php?id=$id','_self')</script>";
    } else {
      $sql_2 = "INSERT INTO cart(id,price,price_2,size)
       values('$id','$price','$price_2','$size')
       ";                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
      $res_2 = mysqli_query($con, $sql_2);
      // echo $sql_2;
      echo "<script>window.open('cart.php','_self')</script>";
    }
  }

  ?>
    <!-- thêm sản phẩm vào giỏ hàng -->
    <form class="hero__container" method="post" action="details.php?add=<?php echo $id_food ?>">
        <?php

    $sql = "SELECT * FROM food WHERE id='$id_food'";
    // echo $sql;
    $res = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
      $id = $row['id'];
      $title = $row['title'];
      $desc = $row['desc'];
      $price = $row['price'];
      $price_2 = $row['price_2'];
      $image = $row['image'];
      $pro = $row['pro'];
      if ($price_2 < 10) {
        $price_2 = '00' . $price_2;
      } else if ($price_2 < 100) {
        $price_2 = '0' . $price_2;
      }
      
      $price_3 = ($price * 1000 + $price_2) - ($price * 1000 + $price_2) * $pro / 100;
      if ($price_3 % 1000 < 10) {
        // 3.002đ = 3 + ".00"+ 2
        $price_4 = floor($price_3 / 1000) . ".00" . ($price_3 % 1000);
        
      } else if ($price_3 % 1000 < 100) {
        $price_4 = floor($price_3 / 1000) . ".0" . ($price_3 % 1000);
      } else {
        $price_4 = floor($price_3 / 1000) . "." . ($price_3 % 1000);
      }
      // hiển thị chi tiết đơn hàng
      echo "
    <div class='hero__left'>
      <img src='./img/$image' alt=''>
    </div>
    <div class='hero__right'>
        <h1>$title</h1> <br>
        <span>$desc</span><br> <br>
        <p name='qty'>$price_4 đ</p> <br>
        <div class='content'>
          <input type='number' id='value' name='size' value='1'/>
        </div> <br>
        <button type='submit' name='submit'><i class='fa fa-cart-plus'></i>Thêm vào giỏ hàng</button>
        <div class='hero__icon'>
          <a href='https://www.facebook.com'><i class='fa fa-facebook-square' style='color: #3a589d;'></i></a>
          <a href='https://twitter.com/?lang=vi'><i class='fa fa-twitter-square' style='color: #2478ba;'></i></a>
          <a href='https://web.telegram.org/k/'><i class='fa fa-telegram' style='color: black;'></i></a>
          <a href='https://www.google.com.vn/?hl=vi'><i class='fa fa-google-plus-square' style='color: #cb2320'></i></a>
          <a href='https://mail.google.com/mail/u/0/#inbox'><i class='fa fa-envelope-square'></i></a>
        </div>
      </div>
        ";
    }

    ?>

        <div class="container_1">
            <div class="content__right-bottom">
                <div class="content__right-bottom-heading">
                    <span>BÀI VIẾT NỔI BẬT</span>
                    <i class="fa fa-align-right"></i>
                </div>
                <div class="content__right-bottom-main">
                    <div class="content__right-bottom-title">
                        <div class="content__right-img">
                            <img src="./img/main-humberger.jpg" alt="" />
                            <a href="./news-humburger.php">Tặng 1 chiếc Humberger miễn phí cho ngày sinh nhật của
                                bạn</a>
                        </div>
                        <span>Tặng 1 chiếc Humberger miễn phí cho ngày sinh nhật của bạn.
                            Tặng...</span>
                    </div>
                </div>
                <div class="content__right-bottom-main">
                    <div class="content__right-bottom-title">
                        <div class="content__right-img">
                            <img src="./img/main-du-ga.jpg" alt="" />
                            <a href="./news-khuyen-mai-246.php">Khuyến mại thứ 2, thứ 4, thứ 6 hàng tuần khi mua 2 combo
                                Đùi gà chiên</a>
                        </div>
                        <span>Mua 2 combo Đùi gà chiên. Áp dụng vào các ngày trong tuần
                            như...</span>
                    </div>
                </div>
                <div class="content__right-bottom-main">
                    <div class="content__right-bottom-title">
                        <div class="content__right-img">
                            <img src="./img/canh-ga.jpg" alt="" />
                            <a href="./news-khuyen-mai-35.php">Khuyến mại thứ 3, thứ 5 hàng tuần</a>
                        </div>
                        <span>Mua 2 suất Cánh gà chiên mắm. Tặng...</span>
                    </div>
                </div>
                <div class="content__right-bottom-main">
                    <div class="content__right-bottom-title">
                        <div class="content__right-img">
                            <img src="./img/chanhleo.jpg" alt="" />
                            <a href="./news-khuyen-mai-nuoc.php">Tặng 1 Nước chanh leo vào chủ nhật</a>
                        </div>
                        <span>Tặng 1 Nước chanh leo vào chủ nhật khi mua 2 suất...</span>
                    </div>
                </div>
                <div class="content__right-bottom-main">
                    <div class="content__right-bottom-title">
                        <div class="content__right-img">
                            <img src="./img/main-humberger.jpg" alt="" />
                            <a href="./news-humburger.php">Tặng 1 chiếc Humberger miễn phí cho ngày sinh nhật của
                                bạn</a>
                        </div>
                        <span>Tặng 1 chiếc Humberger miễn phí cho ngày sinh nhật của bạn.
                            Tặng...</span>
                    </div>
                </div>
            </div>
    </form>
</div>
<?php
include('footer_menu.php');
?>