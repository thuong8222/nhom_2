<?php
include('db.php');
include('banner.php')
?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="./css/cart.css">
<?php
include('header_menu.php')
?>
<div class="cart">
    <div class="container">
        <div class="introduce__center-heading">
            <ul>
                <li><a href="./index.php">Trang chủ</a></li>
                <i class="fa fa-angle-double-right"></i>
                <span>Giỏ hàng</span>
            </ul>
        </div>
        <div class="content__left-title">
            <span>GIỎ HÀNG CỦA TÔI</span>
        </div>
        <form action="">
            <table>
                <tr>
                    <th></th>
                    <th>TÊN SẢN PHẨM</th>
                    <th>ĐƠN GIÁ</th>
                    <th>SỐ LƯỢNG</th>
                    <th>THÀNH TIỀN</th>
                    <th></th>
                </tr>
                <!-- hiển thị sản phẩm liên kết từ id trang food và nhân số sản phẩm với giá -->
                <?php
                $sql = "SELECT * FROM `cart`";
                $res = mysqli_query($con, $sql);
                $sum = 0;
                while ($row = mysqli_fetch_array($res)) {
                    $food_id = $row['id'];
                    $order_id = $row['order_id'];
                    $size = $row['size'];
                    $sql_2 = "SELECT * FROM `food` WHERE `id` = '$food_id'";
                    $res_2 = mysqli_query($con, $sql_2);
                    while ($row_2 = mysqli_fetch_array($res_2)) {
                        $food_id = $row_2['id'];
                        $image = $row_2['image'];
                        $title = $row_2['title'];
                        $price = $row_2['price'];
                        $price_2 = $row_2['price_2'];
                        $pro = $row_2['pro'];
                        if ($price_2 < 10) {
                            $price_2 = '00' . $price_2;
                        } else if (
                            $price_2 < 100
                        ) {
                            $price_2 = '0' . $price_2;
                        }
                        $price_3 = ($price * 1000 + $price_2) - ($price * 1000 + $price_2) * $pro / 100;
                        if (
                            $price_3 % 1000 < 10
                        ) {
                            $price_4 = floor($price_3 / 1000) . ".00" . ($price_3 % 1000);
                        } else if (
                            $price_3 % 1000 < 100
                        ) {
                            $price_4 = floor($price_3 / 1000) . ".0" . ($price_3 % 1000);
                        } else {
                            $price_4 = floor($price_3 / 1000) . "." . ($price_3 % 1000);
                        }
                        $price_5 = $price_3 * $size;
                        if (
                            $price_5 % 1000 < 10
                        ) {
                            $price_6 = floor($price_5 / 1000) . ".00" . ($price_5 % 1000);
                        } else if (
                            $price_5 % 1000 < 100
                        ) {
                            $price_6 = floor($price_5 / 1000) . ".0" . ($price_5 % 1000);
                        } else {
                            $price_6 = floor($price_5 / 1000) . "." . ($price_5 % 1000);
                        }


                        $sum += $price_5;
                        
                        // hiển thị các sản phẩm
                        echo "
                        <tr>
                            <td><img src='./img/$image' alt=''></td>
                            <td>$title</td>
                            <td>$price_4</td>
                            <td>$size</td>
                            <td><span>$price_6</span></td>
                            <th><a href='admin__cart__delete.php?id=$food_id''><i class='material-icons'>delete_forever</i></a></th>
                        </tr>
                        ";
                    }
                }
                ?>
            </table>
            <?php
            if (
                $sum % 1000 < 10
            ) {
                $sum_1 = floor($sum / 1000) . ".00" . ($sum % 1000);
            } else if (
                $sum % 1000 < 100
            ) {
                $sum_1 = floor($sum / 1000) . ".0" . ($sum % 1000);
            } else {
                $sum_1 = floor($sum / 1000) . "." . ($sum % 1000);
            }
            $_SESSION['sum'] = $sum_1;
            ?>
            <div class="buy">
                <div class="buy__container">
                    <!-- hiển thị tổng số tiền cần thanh toán -->
                    <b>Tổng thanh toán: <span><?php echo $sum_1; ?>đ</span></b>
                    <div class="button">
                        <!-- sum=<?php echo $sum_1; ?>? -->
                        <a href="./store.php" class="btn_left">Tiếp tục mua hàng</a>
                        <a href="./order.php?order_id=<?php echo $order_id; ?> " class="btn_right">Tiến hành thanh toán</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include('footer_menu.php')
?>