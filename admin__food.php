<?php
include("admin__menu.php");
?>
<div class="center">
    <div class="container">
        <!-- h1{Home}+.col-3*4>h1{5}{Cate} -->
        <h1>Table Food</h1>
        <a href="admin__food__add.php" class="btn__admin">Add Food </a>
        <table>
            <tr>
                <th>STT</th>
                <th>Title</th>
                <th>Price</th>
                <th>Price 2</th>
                <th>Sale (%)</th>
                <th>Image</th>
                <th>Category</th>
                <th>Active</th>
            </tr>
            <?php
            // Hiển thị dữ liệu
            $sql = "SELECT * FROM `food`";
            $res = mysqli_query($con, $sql);
            if (isset($res)) {
                $rows = mysqli_num_rows($res);
                if ($rows > 0) {
                    while ($rows = mysqli_fetch_array($res)) {
                        $id = $rows['id'];
                        $title = $rows['title'];
                        $price = $rows['price'];
                        $price_2 = $rows['price_2'];
                        $cate_id = $rows['cate_id'];
                        $pro = $rows['pro'];
                        $image = $rows['image'];
                        $active = $rows['active'];
                        $sql_1 = "SELECT * FROM cate WHERE id='$cate_id'";
                        $res_2 = mysqli_query($con, $sql_1);
                     

                        echo "
                            <tr>
                            <td>$id</td>
                            <td>$title</td>
                            <td>$price</td>
                            <td>$price_2</td>
                            <td>$pro</td>
                            <td><img src='./img/$image' alt=''/></td>
                        ";
                        while ($row_2 = mysqli_fetch_array($res_2)) {
                            $cate = $row_2['title'];
                            echo "<td>$cate</td>";
                        }
                        
                        echo "
                            <td>$active</td>
                             <td>
                                 <a href='admin__food__update.php?id=$id' class='btn__update'>Update Food</a>
                                 <a href='admin__food__delete.php?id=$id' class='btn__delete'>Delete Food</a>
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