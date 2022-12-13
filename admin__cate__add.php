<?php 
    include("admin__menu.php");
?>
<div class="center">
    <div class="container">
        <!-- h1{Home}+.col-3*4>h1{5}{Cate} -->
        <h1>Add Cate</h1>
        <form action="admin__cate__add.php" method="post" enctype="multipart/form-data">
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
                        Active:
                    </td>
                    <td>
                        <input type="radio" name="active" id="" value="Yes">Yes
                        <input type="radio" name="active" id="" value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Add Cate"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php 
    include("admin__footer.php");
?>
<?php 
    // Gửi dữ liệu lên sql
    if(isset($_POST['submit'])){
        $title =$_POST['title'];
        //print_r($_FILES['image']);
        //die();
    
        if(isset($_POST['featured'])){
            $featured=$_POST['featured'];
        }
        else{
            $featured="No";
        }
        if(isset($_POST['active'])){
            $active=$_POST['active'];
        }
        else{
            $active="No";
        }
        $sql="INSERT INTO `cate`(`title`,`featured`, `active`) 
        VALUES ('$title','$featured','$active')";
        $res = mysqli_query($con,$sql);
        if(isset($res)){
            header('location:admin__cate.php');
        }
        else{
            header('location:admin__cate__add.php?Error');
        }
    }
?>