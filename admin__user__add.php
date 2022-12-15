<?php
include("admin__menu.php");
?>
<div class="center">
    <div class="container">
        <!-- h1{Home}+.col-3*4>h1{5}{Cate} -->
        <h1>Add User</h1>
        <form action="admin__user__add.php" method="post">
            <table>
                <tr>
                    <td>
                        Full Name:
                    </td>
                    <td>
                        <input type="text" name="name" id="" placeholder="full name" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        User Name:
                    </td>
                    <td>
                        <input type="text" name="user" id="" placeholder="name" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Sex:
                    </td>
                    <td><select name="gen" id="">
                            <option value="Nữ">Nữ</option>
                            <option value="Nam">Nam</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>phone </td>
                    <td><input type="number" name="phone" id="" required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" id=""
                            pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        address <small>(*)</small>
                    </td>
                    <td><input type="text" name="address" id="" required></td>
                </tr>


                <tr>
                    <td>
                        Password:
                    </td>
                    <td>
                        <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Phải chứa ít nhất 1 số và 1 chữ hoa và chữ thường và có ít nhất 8 ký tự trở lên "
                            id="" placeholder="Password" required>
                    </td>
                </tr>
                <tr>

                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
include("admin__footer.php");
?>
<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $user = $_POST['user'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $sex = $_POST['gen'];


    $password = md5($_POST['password']);
    $password_2 = md5($_POST['password_2']);



    $sql = "INSERT INTO `user` (name,password,password_2,user,gen,phone, email, address )
        VALUES ('$name','$password' ,'$password_2', '$user', '$sex', '$phone', '$email', '$address')
        ";
    if ($con->query($sql) === TRUE) {
        echo "Yes";
        header("Location:admin__user.php ");
    } else {
        echo "Error" . $sql . $con->error;
    }
}
?>