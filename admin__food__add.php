<?php
include("admin__menu.php");
?>
<div class="center">
    <div class="container">
        <!-- h1{Home}+.col-3*4>h1{5}{Cate} -->
        <h1>Add Food</h1>
        <form action="admin__food__add.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        Title:
                    </td>
                    <td>
                        <input type="text" name="title" id="" placeholder="Title" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Desc:
                    </td>
                    <td>
                        <textarea name="desc" placeholder=" Mo ta"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        Price:
                    </td>
                    <td>
                        <input type="text" name="price" id="" placeholder="Price" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Price 2:
                    </td>
                    <td>
                        <input type="text" name="price_2" id="" placeholder="Price 2" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Promotion:
                    </td>
                    <td>
                        <input type="text" name="pro" id="" placeholder="Promotion">
                    </td>
                </tr>
                <tr>
                    <td>
                        Image:
                    </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>
                        Cate:
                    </td>
                    <td>
                        <select name="cat_id">
                            <!-- lựa chọn danh mục -->
                            <?php
                            $sql = "SELECT * FROM `cate` WHERE active='Yes'";
                            $res = mysqli_query($con, $sql);
                            $count = mysqli_num_rows($res);
                            if ($count > 0) {
                                while ($row = mysqli_fetch_array($res)) {
                                    $cat_id = $row['id'];
                                    $title = $row['title'];
                                    echo "<option value='$cat_id'>$title</option>";
                                }
                            } else {
                                echo `<h3>Khong co san pham</h3>`;
                            }

                            ?>


                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Active:
                    </td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
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
// gửi dữ liệu lên sql
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $price_2 = $_POST['price_2'];
    $pro = $_POST['pro'];
    $cat_id = $_POST['cat_id'];
    
    if (isset($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $ext = end(explode('.', $image));
        $image = "quynh" . rand(00000, 99999) . "." . $ext;
        $temp_name = $_FILES['image']['tmp_name'];
        $upload = move_uploaded_file($temp_name, "./img/$image");
        echo $image;
    }
    if (isset($_POST['featured'])) {
        $featured = $_POST['featured'];
    } else {
        $featured = "No";
    }
    if (isset($_POST['active'])) {
        $active = $_POST['active'];
    } else {
        $active = "No";
    }
    $sql = "INSERT INTO `food`(`title`,`desc`,`price`,`price_2`,`pro`,`image`,`cate_id`, `featured`, `active`) 
        VALUES ('$title','$desc','$price','$price_2','$pro','$image','$cat_id','$featured','$active')";
    $res = mysqli_query($con, $sql);
    if (isset($res)) {
        echo "<script>alert('Them food thanh cong')</script>";
        echo "<script>window.open('admin__food.php','_self')</script>";
    }
}
?>