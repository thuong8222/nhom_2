<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body >
    <div class="login">
        <h1>Login</h1>
        <form action="admin__login.php" method="post">
            Username:
            <input type="text" placeholder="Username" name="username"> <br>
            Password:
            <input type="password" placeholder="Username" name="password"><br>
            <input type="submit" value="Login" name="submit">
        </form>

    </div>
</body>
</html>
<?php
    // Thêm dữ liệu vào sql
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password']; 
        $sql = "SELECT * FROM `ad` 
        WHERE user_name='$username' 
        AND password='$password'";
        $res = mysqli_query($con,$sql);
        $count = mysqli_num_rows($res);
        if($count==1){
            header('location:admin__index.php');
            $_SESSION['login']="<div>Đăng hập thành công</div>";
        }else{
            echo "<script>alert('Sai tài khoản hoặc mật khẩu !')</script>";
        }
}
?>