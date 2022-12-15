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
                $password_2 = $row['password_2'];
                $phone = $row['phone'];
                $gen = $row['gen'];
                $email = $row['email'];
                $address = $row['address'];
                
            }
        }
        ?>
        <form action="admin__user__update.php" method="post">
            <table>
                <tr>
                    <td>
                        Full Name:
                    </td>
                    <td>
                        <input type="text" name="name" id="" value="<?php echo $name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        User Name:
                    </td>
                    <td>
                        <input type="text" name="user" id="" value="<?php echo $user; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Sex:
                    </td>
                    <td><select name="gen" id="">
                            <option value="<?php echo $user; ?>">Nữ</option>
                            <option value="<?php echo $user; ?>">Nam</option>
                        </select></td>
                </tr>
                <tr>
                    <td>phone </td>
                    <td><input type="text" name="phone" id="" value="<?php echo $phone; ?>"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" id=""
                            pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})"
                            value="<?php echo $email; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        address <small>(*)</small>
                    </td>
                    <td><input type="text" name="address" id="" value="<?php echo $address; ?>"></td>
                </tr>


                <tr>
                    <td>
                        Password:
                    </td>
                    <td>
                        <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Phải chứa ít nhất 1 số và 1 chữ hoa và chữ thường và có ít nhất 8 ký tự trở lên "
                            id="" value="<?php echo $password; ?>">
                    </td>
                </tr>
                <tr>

                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Add">
                    </td>
                </tr>
            </table>
            <!-- <table>
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
                        <input type="password" name="password" value="<?php echo $password; ?>" id=""
                            placeholder="Password" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Add">
                    </td>
                </tr>
            </table> -->
        </form>
    </div>
</div>
<?php
include("admin__footer.php");
?>
<?php
// update dữ liệu người dùng
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $user = $_POST['user'];
    $password = md5($_POST['password']);
    $password_2 = md5($_POST['password_2']);
    $phone = $_POST['phone'];
   
    $gen = $_POST['gen'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $sql = "UPDATE `user` SET 
        name='$name',
        user='$user',
        password='$password',
        password_2='$password_2',
        phone='$phone',
        gen='$gen',
        address='$address',
        email='$email'

        WHERE `id`=$id;
        ";
    $res = mysqli_query($con, $sql);
    if (isset($res)) {
        echo "Yes";
        header('location:admin__user.php');
    }
}
?>