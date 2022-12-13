<?php
include('db.php');
include('banner.php')
?>
<link rel="stylesheet" href="./css/order.css" />
<?php
include('header_menu.php')
?>
<div class="oder">
  <div class="oder__container">
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
    <form class="ship" action="" method="post">
      <div class="col-6">
        <div class="heading">
          <h4>1. ĐỊA CHỈ THANH TOÁN VÀ GIAO HÀNG</h4>
        </div>
        <div class="bottom">
          <p>THÔNG TIN THANH TOÁN</p>
          <a href="./reg.php">Đăng ký tài khoản mua hàng</a>
          <span>|</span>
          <a href="./login.php">Đăng nhập</a> <br />
          <b>Mua hàng không cần thanh toán</b>
          <input type="text" name="name" id="" required placeholder="Họ & Tên" />
          <input type="text" name="call" id="" required placeholder="Số điện thoại" />
          <input type="text" name="address" id="" required placeholder="Địa chỉ" />
          <textarea name="note" id="" cols="30" rows="10" placeholder="Ghi chú đơn hàng"></textarea>
        </div>
      </div>
      <div class="col-6">
        <div class="heading">
          <h4>2. THÔNG TIN ĐƠN HÀNG</h4>
        </div>
        <div class="bottom" style="height: 200px;">
          <div class="introduce__left-main">
            <div class="introduce__left-title-hr">
              <b>Thành tiền</b>
              <small>
                <?php
                echo $_SESSION['sum'];
                ?>đ
              </small>
            </div>
            <div class="introduce__left-title-hr">
              <b>Phí vận chuyển</b>
              <small>0đ</small>
            </div>
            <div class="introduce__left-title-hr">
              <b class="title">Thanh toán</b>
              <small style="color: #eb483d; font-size: 17px;">
                <?php
                echo $_SESSION['sum'];
                ?>đ
              </small>
            </div>
            <div class="button">

              <button name="submit" class="submit">Đặt hàng</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<?php
include('footer_menu.php');
?>
<!-- gửi thông tin người dùng về trang sql -->
<?php
if (isset($_POST['submit'])) {
  $order_id = $_GET['order_id'];
  $sql = "DELETE FROM `cart` WHERE order_id='$order_id'";
  $res = mysqli_query($con, $sql);
  // echo $sql;
  $name = $_POST['name'];
  $call = $_POST['call'];
  $address = $_POST['address'];
  $note = $_POST['note'];
  $sql_2 = "INSERT INTO `order`(`name`,`call`,`address`,`note`) 
            VALUES ('$name','$call','$address','$note')";
  // echo $sql;
  if ($con->query($sql_2) === TRUE) {
    // echo "Yes";
    echo "<script>window.open('index.php','_self')</script>";
  } else {
    echo "Error" . $sql_2 . $con->error;
  }
}
?>