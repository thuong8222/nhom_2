<?php
include('db.php');
include('banner.php');
?>

<link rel="stylesheet" href="./css/login.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />


<?php
include('header_menu.php');
?>
<html>
<div class="login">
    <div class="login__container">
        <div class="introduce__left">
            <div class="introduce__left-heading">
                <span>TÀI KHOẢN</span>
                <i class="fa fa-align-right"></i>
            </div>
            <div class="introduce__left-main">
                <div class="introduce__left-title-hr">
                    <a href="./login.php" style="color: #e23d31;">
                        <i class="fa fa-sign-in"></i>
                        <span>Đăng nhập</span>
                    </a>
                </div>
                <div class="introduce__left-title" style="padding: 4px 0;">
                    <a href="./reg.php">
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
                <span>Đăng nhập</span>
            </div>
            <div class="content__left-title">
                <span>Quên mật khẩu</span>
            </div>
            <div class="form">
                <form action="user_fogetpassword" method="POST">
                    <table>
                        <tr>
                            <th>Tài khoản<small>(*)</small></td>
                            <td><input type="text" name="name" id="" required></td>
                        </tr>
                        <tr>
                            <th>Mật khẩu<small>(*)</small></th>
                            <td>
                                <div class="input_pW">
                                    <input type="password" name="password" class="form-input" required
                                        style="position: absolute;">
                                    <span id="eye">
                                        <i class="far fa-eye"></i>
                                    </span>
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td> </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><br><br> Nếu bạn chưa có tài khoản? <a href="reg.php">Đăng ký</a><br>
                                <a href="reg.php">Quên Mật khẩu ?</a>
                            </td>
                        </tr>
                        <tr>

                            <th></th>

                            <td><button type="submit" name="submit" style="margin-top: 30px;">Đăng nhập</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="js/showpassword.js"></script>

</html>
<?php
include('footer_menu.php');
?>
<!-- đăng nhập vào trang -->


<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM `user` WHERE name='$name' and `password`='$password'";
    $res = mysqli_query($con, $sql);
    $count = mysqli_num_rows($res);
    echo $count;
    if ($count <= 0) {
        echo "<script>alert('Tai khoan hoac mat khau sai')</script>";
    } else {
        $_SESSION['name'] = $name;
        echo "<script>window.open('index.php','_self')</script>";
    }
}

?>