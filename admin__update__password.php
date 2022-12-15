<?php
include("admin__menu.php");
?>
<div class="center">
    <div class="container">
        <!-- h1{Home}+.col-3*4>h1{5}{Cate} -->
        <h1>Update Password</h1>
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        ?>
        <form action="admin__update__password.php" method="post">
            <table>
                <tr>
                    <td>
                        Current Password:
                    </td>
                    <td>
                        <input type="password" name="current_password" id="" placeholder="Current Password"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Phải chứa ít nhất 1 số và 1 chữ hoa và chữ thường và có ít nhất 8 ký tự trở lên "
                            required>
                    </td>
                </tr>
                <tr>
                    <td>
                        New Password:
                    </td>
                    <td>
                        <input type="password" name="new_password" id="" placeholder="Current Password"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Phải chứa ít nhất 1 số và 1 chữ hoa và chữ thường và có ít nhất 8 ký tự trở lên "
                            required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Confirm Password:
                    </td>
                    <td>
                        <input type="password" name="confirm_password" id="" placeholder="Current Password"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Phải chứa ít nhất 1 số và 1 chữ hoa và chữ thường và có ít nhất 8 ký tự trở lên "
                            required>
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
// Update 
if (isset($_GET['submit'])) {
    $id = $_POST['id'];
    $current_password = $_POST['current_password'];
    // echo $current_password;
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $sql = "SELECT * FROM `ad` 
    WHERE id='$id' AND password='current_password'";
    $res = mysqli_query($con, $sql);
    $count = mysqli_num_rows($res);
    if ($count > 0) {
        if (isset($res)) {
            // echo "hi";
            if ($new_password === $confirm_password) {
                $sql_2 = " UPDATE `ad` SET 
                    password='$new_password'
                    WHERE `id`=$id;
                  ";
                $res_2 = mysqli_query($con, $sql_2);
                if (isset($res_2)) {
                    echo "Yes";
                    header('location:admin__admin.php');
                } else {
                    header('location:admin__update__password.php');
                }
            }
        }
    }
};
?>