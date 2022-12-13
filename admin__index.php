<?php
include("admin__menu.php");
?>
<div class="center">
    <div class="container">
        <!-- Đếm xem có bao nhiêu danh mục,admin,food,order -->
        <?php
        $sql = "SELECT * FROM `ad`";
        $res = mysqli_query($con, $sql);
        $count = mysqli_num_rows($res);
        $sql_1 = "SELECT * FROM `cate`";
        $res_2 = mysqli_query($con, $sql_1);
        $count_2 = mysqli_num_rows($res_2);
        $sql_3 = "SELECT * FROM `food`";
        $res_3 = mysqli_query($con, $sql_3);
        $count_3 = mysqli_num_rows($res_3);
        // $sql_4 = "SELECT * FROM `order`";
        // $res_4 = mysqli_query($con, $sql_4);
        // $count_4 = mysqli_num_rows($res_4);

        ?>
        <!-- h1{Home}+.col-3*4>h1{5}{Cate} -->
        <h1>Home</h1>
        <div class="col-3">
            <h1><?php echo $count; ?></h1>
            Admin
        </div>
        <div class="col-3">
            <h1><?php echo $count_2; ?></h1>
            Category
        </div>
        <div class="col-3">
            <h1><?php echo $count_3; ?></h1>
            Food
        </div>
        <div class="col-3">
            <h1>5</h1>
            Order
        </div>
    </div>
</div>
<?php
include("admin__footer.php");
?>