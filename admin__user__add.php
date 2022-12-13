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
                        name:
                    </td>
                    <td>
                        <input type="text" name="name" id="" placeholder="name" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Password:
                    </td>
                    <td>
                        <input type="password" name="password" id="" placeholder="Password" require>
                    </td>
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
// Thêm dữ liệu ng dùng
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    // echo $name;
    $password = $_POST['password'];
    // echo $password;
    // INSERT INTO ten bang(ten cot) VALUES ('$gia tri')
    $sql = "INSERT INTO `user` (name,password)
        VALUES ('$name','$password')
        ";
    if ($con->query($sql) === TRUE) {
        echo "Yes";
        header("Location:admin__user.php ");
    } else {
        echo "Error" . $sql . $con->error;
    }
}
?>