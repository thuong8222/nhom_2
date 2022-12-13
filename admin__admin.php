<?php 
    include("admin__menu.php");
?>
    <div class="center">
        <div class="container">
            <!-- h1{Home}+.col-3*4>h1{5}{Cate} -->
            <h1>Table Admin</h1>
            <a href="admin__add.php" class="btn__admin">Add Admin </a>
            <table>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>UserName</th>
                    <th>Actions</th>
                </tr>
                <!-- Hiện tất cả dữ liệu trên sql ra table -->
                <?php
                $sql = "SELECT * FROM `ad`";
                $res = mysqli_query($con, $sql);
                if(isset($res)){
                    $rows = mysqli_num_rows($res);
                    if($rows > 0){
                        while ($rows = mysqli_fetch_array($res)){
                            $id = $rows['id'];
                            $full_name = $rows['full_name'];
                            $user_name = $rows['user_name'];
                            echo"
                            <tr>
                            <td>$id</td>
                           <td>$full_name</td>
                            <td>$user_name</td>
                             <td>
                                 <a href='admin__update__password.php?id=$id' class='btn__update'>Update Password</a>
                                 <a href='admin__update.php?id=$id' class='btn__update'>Update</a>
                                 <a href='admin__delete.php?id=$id' class='btn__delete'>Delete</a>
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