 <link rel="shortcut icon" href="./img/favi.png" type="image/x-icon">
 <style>
.demo__right a {
    text-decoration: none;
    color: white !important;
}

.demo__right a:hover {
    text-decoration: underline;
}

input[type="text"]:focus {
    box-shadow: 0px 1px 6px rgb(32 33 36 / 28%);
}
 </style>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
 </head>

 <body>
     <div class="demo">
         <div class="demo__container">
             <div class="demo__left">
                 <i class="fa fa-clock-o"></i>
                 8:30 - 22:30
                 <i class="fa fa-phone alo"></i>
                 +0123 456 789
             </div>
             <div class="demo__right">
                 <!-- khi đăng xuất sẽ hiện đăng nhập và đăng ký, khi đăng nhập sẽ hiện tên người dùng và đăng xuát -->
                 <?php
                    if (!isset($_SESSION['name'])) {
                        echo "
                 <a href='./reg.php'>Đăng ký</a>
                 ";
                    } else {
                        echo " Xin chào: " . $_SESSION['name'] . "";
                    }
                    ?>
                 <span style="margin: 0px 10px;">|</span>
                 <?php
                    if (!isset($_SESSION['name'])) {
                        echo "
                     <a href='./login.php'>Đăng nhập</a>
                     ";
                    } else {
                        echo "<a href='./logout.php'>Đăng xuất</a>";
                    }
                    ?>
             </div>
         </div>
     </div>
     <div class="header">
         <div class="header__container">
             <div class="header__left">
                 <ul class="nav__list">
                     <li class="nav__item-1">
                         <a href="./index.php" class="nav__link">TRANG CHỦ</a>
                     </li>
                     <span>/</span>
                     <li class="nav__item-2">
                         <a href="./store.php" class="nav__link">CỬA HÀNG</a>
                     </li>
                     <span>/</span>
                     <li class="nav__item-3">
                         <a href="./news.php" class="nav__link">TIN TỨC</a>
                     </li>
                 </ul>
             </div>
             <div class="header__logo">
                 <a href="./index.php"><img src="./img/logo.png" alt="" /></a>
             </div>
             <div class="header__right">
                 <ul class="nav__list">
                     <li class="nav__item-4">
                         <a href="./introduce.php" class="nav__link">GIỚI THIỆU</a>
                     </li>
                     <div action="" style="margin-right: 10px;">
                         <input type="text" name="" placeholder="Tìm kiếm ..." id="search" />
                         <i class="fa fa-search search"></i>
                     </div>
                     <!-- hiển thị số sản phẩm cso tên được tìm kiếm trong danh sách sản phẩm -->
                     <?php
                        $sql = "SELECT * FROM `cart`";
                        $res = mysqli_query($con, $sql);
                        $count = mysqli_num_rows($res);
                        ?>
                     <li class="nav__item-5" style="position: relative; cursor: pointer;">
                         <a href="./cart.php" style="color: black;">
                             <i style="font-size: 29px;" class="fa fa-cart-plus"></i>
                             <span
                                 style="position: absolute; top: -6px; right: -9px; width: 16px; font-size: 12px; height:16px; display: flex;align-items: center; justify-content: center; background-color:#e23d31; color:white; border-radius: 50%;">
                                 <?php echo $count; ?>
                             </span>
                         </a>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
     <?php
        include('search__out__food.php');
        ?>