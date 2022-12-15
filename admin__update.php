<?php 
    include("admin__menu.php");
?>
<div class="center">
    <div class="container">
        <!-- h1{Home}+.col-3*4>h1{5}{Cate} -->
        <h1>Update</h1>
        <?php 
                $id = $_GET['id'];
                $sql = "SELECT * FROM `ad`";
                $res = mysqli_query($con,$sql);
                if(isset($res)){
                    $count = mysqli_num_rows($res);
                    if($count>0){
                        $row = mysqli_fetch_array($res);
                        $full_name = $row['full_name'];
                        $user_name = $row['user_name'];
                        
                    }
                }
            ?>
        <form action="admin__update.php" method="post">
            <table>
                <tr>
                    <td>
                        Full Name:
                    </td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name;?>" id=""
                            placeholder="Full name" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        User Name:
                    </td>
                    <td>
                        <input type="text" name="user_name" value="<?php echo $user_name;?>" id=""
                            placeholder="User name" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Add">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php 
    include("admin__footer.php");
?>
<?php 
    if (isset($_POST['submit'])){
        $id=$_POST['id'];
        $full_name=$_POST['full_name'];
        $user_name = $_POST['user_name'];
        $sql = "UPDATE `ad` SET 
        full_name='$full_name',
        user_name='$user_name'
        WHERE `id`=$id;
        ";
        $res = mysqli_query($con,$sql);
        if(isset($res)){
            echo "Yes";
            header('location:admin__admin.php');
        }
}
?>