<?php 
    include("admin__menu.php");
?>
<div class="center">
    <div class="container">
        <!-- h1{Home}+.col-3*4>h1{5}{Cate} -->
        <h1>Table Cate</h1>
        <a href="admin__cate__add.php" class="btn__admin">Add Category </a>
        <table>
            <tr>
                <th>STT</th>
                <th>Title</th>
                <th>Appearance</th>
                <th>Active</th>
            </tr>
            <?php
                // hiển thị dữ liệu từ bên sql
                $sql = "SELECT * FROM `cate`";
                $res = mysqli_query($con, $sql);
                if(isset($res)){
                    $rows = mysqli_num_rows($res);
                    if($rows > 0){
                        while ($rows = mysqli_fetch_array($res)){
                            $id = $rows['id'];
                            $title = $rows['title'];
                            $active = $rows['active'];
                            echo"
                            <tr>
                            <td>$id</td>
                            <td>$title</td>
                            <td>$active</td>
                             <td>
                                 <a href='admin__cate__update.php?id=$id' class='btn__update'>Update Cate</a>
                                 <a href='admin__cate__delete.php?id=$id' class='btn__delete'>Delete Cate</a>
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