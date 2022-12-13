<?php
include("admin__menu.php");
?>
<div class="center">
    <div class="container">
        <!-- h1{Home}+.col-3*4>h1{5}{Cate} -->
        <h1>Table Oder</h1>
        <table>
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Call</th>
                <th>Address</th>
                <th>Note</th>
            </tr>
            <?php
            // hiển thị từ trang order
            $sql = "SELECT * FROM `order`";
            $res = mysqli_query($con, $sql);
            if (isset($res)) {
                $rows = mysqli_num_rows($res);
                if ($rows > 0) {
                    while ($rows = mysqli_fetch_array($res)) {
                        $id = $rows['id'];
                        $name = $rows['name'];
                        $call = $rows['call'];
                        $address = $rows['address'];
                        $note = $rows['note'];
                        echo "
                            <tr>
                            <td>$id</td>
                            <td>$name</td>
                            <td>$call</td>
                            <td>$address</td>
                            <td>$note</td>
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