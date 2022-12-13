<?php
include("admin__menu.php");
?>
<div class="center">
    <div class="container">
        <!-- h1{Home}+.col-3*4>h1{5}{Cate} -->
        <h1>Update</h1>
        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM `user`";
        $res = mysqli_query($con, $sql);
        if (isset($res)) {
            $count = mysqli_num_rows($res);
            if ($count > 0) {
                $row = mysqli_fetch_array($res);
                $name = $row['name'];
                $password = $row['password'];
            }
        }
        ?>
        <form action="admin__user__update.php" method="post">
            <table>
                <tr>
                    <td>
                        Name:
                    </td>
                    <td>
                        <input type="text" name="name" value="<?php echo $name; ?>" id="" placeholder="Name" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Password:
                    </td>
                    <td>
                        <input type="password" name="password" value="<?php echo $password; ?>" id="" placeholder="Password" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
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
// update dữ liệu người dùng
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $sql = "UPDATE `user` SET 
        name='$name',
        password='$password'
        WHERE `id`=$id;
        ";
    $res = mysqli_query($con, $sql);
    if (isset($res)) {
        echo "Yes";
        header('location:admin__user.php');
    }
}
?>