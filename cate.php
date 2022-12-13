<?php
include('db.php');
include('banner.php');
?>
<link rel="stylesheet" href="./css/style-banh-my.css">
<?php
include('header_menu.php');
?>
<div class="content">
    <div class="content__container">
        <!-- liên kết id danh mục của sản phẩm -->
        <?php
    $title_id = $_GET['title'];
    $asc = $_GET['asc'];
    $cate_id = $_GET['cate_id'];
    $sql = "SELECT * FROM `cate` WHERE id='$cate_id' ";
    $res = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
      $id = $row['id'];
      $title = $row['title'];
      echo "
           <div class='content__left'>$title </div>
          ";
    }
    ?>
        <div class="content__right">
            <?php echo "
            <a style='text-decoration: none;margin-left: 10px;' href='./cate.php?cate_id=$cate_id&title=id&asc=asc'>Mới nhất</a>";
      echo "
            <a style='text-decoration: none;margin-left: 10px;' href='./cate.php?cate_id=$cate_id&title=price&asc=asc'>Sắp xếp theo giá tăng dần</a>";
      echo "
            <a style='text-decoration: none;margin-left: 10px;' href='./cate.php?cate_id=$cate_id&title=price&asc=desc'>Sắp xếp theo giá giảm dần</a>";
      ?>
        </div>
    </div>
</div>
<div class="hero">
    <div class="hero__container">
        <!-- Tính toán giá sản phẩm -->
        <?php

    ?>
        <?php
    $sql = "SELECT * FROM `food`  where cate_id='$cate_id' ORDER BY `food`.`$title_id` $asc LIMIT 0,5";
    //limit 0,4 giới hạn sản phẩm hiển thị là 4, max là limit 6
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
        $pro = $row['pro'];
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
        // hiển thị sản phẩm
        echo "
          <div class='main__eat'>
             <p>-$pro%</p>
           <img src='./img/$image' alt='' />
          <a href='./details.php?id=$id'>$title</a>
            <div class='main__money'>
                <i>$price_4<i>đ</i></i>
                <span>$price.$price_2<span>đ</span></span>
            </div>
          </div>
      
          ";
      }
    } else {
      echo "Khong co hang";
    }
    ?>
    </div>
</div>
<?php
include('footer_menu.php');
?>