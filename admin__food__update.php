<?php
include("admin__menu.php");
?>
<div class="center">
    <div class="container">
        <!-- h1{Home}+.col-3*4>h1{5}{Cate} -->
        <h1>Update</h1>
        <?php
        // lấy dữ liệu bên sql
        $id = $_GET['id'];
        $sql = "SELECT * FROM `food` where id='$id'";
        $res = mysqli_query($con, $sql);
        if (isset($res)) {
            $row = mysqli_fetch_array($res);
            $title = $row['title'];
            $desc = $row['desc'];
            echo  $desc;
            $price = $row['price'];
            $price_2 = $row['price_2'];
            $pro = $row['pro'];
            $image = $row['image'];
            $cate_id = $row['cate_id'];
            $featured = $row['featured'];
            $active = $row['active'];
        }
        ?>
        <form action="admin__food__update.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        Title:
                    </td>
                    <td>
                        <input type="text" name="title" id="" placeholder="Title" value="<?php echo $title; ?>"
                            required />
                    </td>
                </tr>
                <tr>
                    <td>
                        Desc:
                    </td>
                    <td>

                        <textarea name="desc"><?php echo $desc; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        Price:
                    </td>
                    <td>
                        <input type="text" name="price" id="" placeholder="Price" value="<?php echo $price; ?>"
                            required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Price 2:
                    </td>
                    <td>
                        <input type="text" name="price_2" id="" placeholder="Price 2" value="<?php echo $price_2; ?>"
                            required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Promotion:
                    </td>
                    <td>
                        <input type="text" name="pro" id="" value="<?php echo $pro; ?>" placeholder="Promotion">
                    </td>
                </tr>
                <tr>
                    <td>Image:</td>
                    <td>
                        <img src="./img/<?php echo $image ?>" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        Image:
                    </td>
                    <td>
                        <input type="file" name="image" accept="image/png, image/gif, image/jpeg">
                    </td>
                </tr>

                <tr>
                    <td>
                        Cate:
                    </td>
                    <td>
                        <!-- chọn danh mục sp -->
                        <select name="cate_id">
                            <?php
                            $sql = "SELECT * FROM `cate` WHERE active='Yes'";
                            $res = mysqli_query($con, $sql);
                            $count = mysqli_num_rows($res);
                            if ($count > 0) {
                                while ($row = mysqli_fetch_array($res)) {
                                    $cat_id = $row['id'];
                                    $title = $row['title'];
                                    echo "<option  value='$cat_id'>$title</option>";
                                }
                            } else {
                                echo `<h3>Khong co san pham</h3>`;
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php
                                if ($active == "Yes") {
                                    echo "checked";
                                }
                                ?> type="radio" name="active" id="" value="Yes" />Yes
                        <input <?php
                                if ($active == "No") {
                                    echo "checked";
                                }
                                ?> type="radio" name="active" id="" value="No" />No
                    </td>
                </tr>
                <tr>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <td colspan="2"><input type="submit" name="submit" value="Add Food"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
include("admin__footer.php");
?>
<?php
// update sql
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    echo $id;
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $price_2 = $_POST['price_2'];
    $pro = $_POST['pro'];

    $cate_id = $_POST['cate_id'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];
    $sql = "UPDATE `food` set
    title='$title',
    `desc`='$desc',
    price ='$price',
    price_2 ='$price_2',
    pro ='$pro',";
    
    if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $ext = end(explode('.', $image));
        $image = "thuong" . rand(00000, 99999) . "." . $ext;
        $temp_name = $_FILES['image']['tmp_name'];
        $upload = move_uploaded_file($temp_name, "./img/$image");
        echo $image;
        $sql .= "image='$image',";
    }
    $sql .=
    "cate_id = '$cate_id',
    featured='$featured',
     active='$active'
    where id='$id'";
    $res = mysqli_query($con, $sql);
    if (isset($res)) {
        echo "<script>window.open('admin__food.php','_self')</script>";
    }
}
?>