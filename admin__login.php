<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>đăng nhập trang quản trị</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="login">
        <h1>Login admin's page </h1>
        <br>
        <form action="admin__login.php" method="post">
            Username:
            <input type="text" placeholder="Username" name="user_name" required> <br><br>
            Password:
            <input type="password" placeholder="Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Phải chứa ít nhất 1 số và 1 chữ hoa và chữ thường và có ít nhất 8 ký tự trở lên "><br><br>

            <input type="submit" value="Login" name="submit">
            <input type="reset" value="Cancel">

        </form>

    </div>
</body>

</html>
<?php
// Thêm dữ liệu vào sql
if (isset($_GET['submit'])) {
    $username = $_POST['user_name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `ad` 
        WHERE user_name ='$username' 
        AND `password` ='$password'  ";
    $res = mysqli_query($con, $sql);
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        header('location:admin__index.php');
        $_SESSION['login'] = "<div>Đăng hập thành công</div>";
    } else {
        echo "<script>alert('Sai tài khoản hoặc mật khẩu !')</script>";
    }
}
?>