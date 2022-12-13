<?php
include("admin__menu.php");
?>
<div class="center">
    <div class="container">
        <!-- h1{Home}+.col-3*4>h1{5}{Cate} -->
        <h1>Table Admin</h1>
        <a href="admin__user__add.php" class="btn__admin">Add Admin </a>
        <table>
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Password</th>
                <th>Actions</th>
            </tr>
            <?php
            // Hiển thị dữ liệu
            $sql = "SELECT * FROM `user`";
            $res = mysqli_query($con, $sql);
            if (isset($res)) {
                $rows = mysqli_num_rows($res);
                if ($rows > 0) {
                    while ($rows = mysqli_fetch_array($res)) {
                        $id = $rows['id'];
                        $name = $rows['name'];
                        $password = $rows['password'];
                        echo "
                            <tr>
                            <td>$id</td>
                            <td>$name</td>
                            <td>$password</td>
                            <td>
                                 <a href='admin__user__update.php?id=$id' class='btn__update'>Update</a>
                                 <a href='admin__user__delete.php?id=$id' class='btn__delete'>Delete</a>
                            </td>
                             </tr>
                            ";
                    }
                }
            }
            ?>
        </table>
    </div>
</div>
<?php
include("admin__footer.php");
?>