<?php
include('db.php');
include('banner.php');
?>
<link rel="stylesheet" href="./css/reg.css">
<link rel="stylesheet" href="./css/login.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
<?php
include('header_menu.php');
?>
<script>
function check_pass() {
    var pa1 = document.getElementById("passw1").value;
    var pa2 = document.getElementById("passw2").value;
    if (pa1 != pa2) {
        document.getElementById("check").innerHTML = "Mật khẩu chưa khớp";
    } else {
        document.getElementById("check").innerHTML = "";
    }
}
</script>
<!-- <script>
function Function_showPassword() {
    var x = document.getElementById("passw1");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script> -->
<div class="login">
    <div class="login__container">
        <div class="introduce__left">
            <div class="introduce__left-heading">
                <span>TÀI KHOẢN</span>
                <i class="fa fa-align-right"></i>
            </div>
            <div class="introduce__left-main">
                <div class="introduce__left-title-hr">
                    <a href="./login.php">
                        <i class="fa fa-sign-in"></i>
                        <span>Đăng nhập</span>
                    </a>
                </div>
                <div class="introduce__left-title" style="padding: 4px 0;">
                    <a href="./reg.php" style="color: #e23d31;">
                        <i class="fa fa-key"></i>
                        <span>Đăng ký</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="content__left-heading">
                <a href="./index.php">Trang chủ</a>
                <i class="fa fa-angle-double-right"></i>
                <span>Đăng ký</span>
            </div>
            <div class="content__left-title">
                <span>ĐĂNG KÝ TÀI KHOẢN</span>
            </div>
            <div class="form">
                <form action="reg.php" method="POST">
                    <div class="introduce__left-title-hr">
                        <span>Thông tin tài khoản</span>
                    </div>
                    <table>
                        <tr>
                            <th>Tài khoản<small>(*)</small></td>
                            <td><input type="text" name="user" id="" required></td>
                        </tr>
                        <tr style="height: 50px;">
                            <th>Mật khẩu <small>(*)</small></th>
                            <td>
                                <div class="input_pW">
                                    <input type="password" name="password" class="form-input" required
                                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                        title="Phải chứa ít nhất 1 số và 1 chữ hoa và chữ thường và có ít nhất 8 ký tự trở lên "
                                        style="position: absolute;">
                                    <span id="eye">
                                        <i class="far fa-eye"></i>
                                    </span>
                                </div>

                            </td>
                        </tr>
                        <tr style="height: 90px;">
                            <th>Nhập lại mật khẩu <small>(*)</small></th>
                            <td><input onkeyup="check_pass();" type="password" name="password_2" class="form-input"
                                    minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                    title="Phải chứa ít nhất 1 số và 1 chữ hoa và chữ thường và có ít nhất 8 ký tự trở lên "
                                    required>

                            </td>
                        </tr>
                    </table>
                    <div class="introduce__left-title-hr">
                        <span>Thông tin cá nhân</span>
                    </div>
                    <table>
                        <tr>
                            <th>Họ và tên <small>(*)</small></td>
                            <td><input type="text" name="name" id="" autofocus required></td>
                        </tr>
                        <tr>
                            <th>Giới tính</th>
                            <td><select name="gen" id="">
                                    <option value="Nữ">Nữ</option>
                                    <option value="Nam">Nam</option>
                                </select></td>
                        </tr>
                        <tr>
                            <th>Điện thoại <small>(*)</small></th>
                            <td><input type="number" name="phone" id="" required></td>
                        </tr>
                        <tr>
                            <th>Email<small>(*)</small></th>
                            <th><input type="email" name="email" id=""
                                    pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})"
                                    required>
                            </th>
                        </tr>
                        <tr>
                            <th>Địa chỉ <small>(*)</small></th>
                            <td><input type="text" name="address" id="" required></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><button style="margin-top: 30px" name="submit">Đăng ký</button></td>

                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include('footer_menu.php');
?>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="js/showpassword.js"></script>
<!-- đăng ký tài khoản -->
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $user = $_POST['user'];
    $password = md5($_POST['password']);
    $password_2 = md5($_POST['password_2']);
    $phone = $_POST['phone'];
    $user = $_POST['user'];
    $gen = $_POST['gen'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $check_sql_user = "SELECT `user` FROM `user` WHERE user = '$user'";
    $result_check_sql_user = mysqli_query($conn, $check_sql_user);
    if(mysqli_num_rows($result_check_sql_user) > 0){
        echo "('Tên đã tồn tại')<a href='reg.php'> Trở lại</a> ";
        exit;
            
     }
    if($password== $password_2){
        $sql = "INSERT INTO `user`(`name`,`user`,`password`,`phone`,`gen`,`address`,`password_2`,`email`) 
            VALUES ('$name','$user','$password','$phone','$gen','$address','$password_2','$email')";
        $res = mysqli_query($con, $sql);
        $_SESSION['name'] = $name;
        echo "<script>alert('Đăng ký tài khoản thành công')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }else{
        echo "<script>alert('Mật khẩu không khớp')</script>";
    }
}
?>