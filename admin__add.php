<?php 
    include("admin__menu.php");
?>
<div class="center">
    <div class="container">
        <!-- h1{Home}+.col-3*4>h1{5}{Cate} -->
        <h1>Add Admin</h1>
        <form action="admin__add.php" method="post">
            <table>
                <tr>
                    <td>
                        Full Name:
                    </td>
                    <td>
                        <input type="text" name="full_name" id="" placeholder="Full name" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        User name:
                    </td>
                    <td>
                        <input type="text" name="user_name" id="" placeholder="User name" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        Password:
                    </td>
                    <td>
                        <input type="password" name="password" id="" placeholder="Password"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Phải chứa ít nhất 1 số và 1 chữ hoa và chữ thường và có ít nhất 8 ký tự trở lên "
                            required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
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
    // Thêm dữ liệu lên sql
    if (isset($_POST['submit'])){
        $full_name = $_POST['full_name'];
        // echo $full_name;
        $user_name = $_POST['user_name'];
        // echo $user_name;
        $password= $_POST['password'];
        // echo $password;
        // INSERT INTO ten bang(ten cot) VALUES ('$gia tri')
        $sql = "INSERT INTO ad (full_name,user_name,'password')
        VALUES ('$full_name',' $user_name','$password')
        ";
        if($con->query($sql)===TRUE){
            echo "Yes";
            header("Location:admin__admin.php " );
        }
        else{
            echo "Error" .$sql .$con->error;
        }
}
?>