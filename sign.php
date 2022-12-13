<!DOCTYPE html>
<html lang="en">
<?php
include('db.php')
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="sign.php" method="POST">
        <input type="text" name="name" id="" placeholder="Username"> <br> <br>
        <input type="password" name="password" id="" placeholder="Password"> <br><br>
        <input type="password" name="password_2" id="" placeholder="Password again"> <br><br>
        <input type="submit" name="submit" value="Sign">
    </form>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $password_2 = $_POST['password_2'];
    if ($password == $password_2) {
        $sql = "INSERT INTO user(`name`,`password`,`password_2`)
        VALUES ('$name', '$password','$password_2')";
        $res = mysqli_query($con, $sql);
        $sql_2="Select * from user where id='$id'";
        $res_2 = mysqli_query($con, $sql);
        echo $sql;
        $count = mysqli_num_rows($res_2);
        echo $count; 
        if ($count < 0) {
            echo "<script>alert('Chúc mừng quý khách đã đăng ký thành công')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            echo "<script>alert('Chu mung quy khach da dang ky 1 lan')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    } else {
        echo "<script>alert('Quy khach da nhap sai tk')</script>";
    }
}

?>