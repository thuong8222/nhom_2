<?php
include("admin__menu.php");
?>
<div class="center">
    <div class="container">
        <!-- h1{Home}+.col-3*4>h1{5}{Cate} -->
        <h1>Update Cate</h1>
        <?php
    // láy dữ liệu từ sql
    $id = $_GET['id'];
    $sql = "SELECT * FROM `cate` where id='$id'";
    $res = mysqli_query($con, $sql);
    if (isset($res)) {
      $row = mysqli_fetch_array($res);
      $title = $row['title'];
      $featured = $row['featured'];
      $active = $row['active'];
    } ?>
        <form action="admin__cate__update.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" id="" value="<?php echo $title; ?>" placeholder="Title" />
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
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Add Cate" />
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
// Update dữ liệu lên sql
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $title = $_POST['title'];
  $featured = $_POST['featured'];
  $active = $_POST['active'];
  $sql = "UPDATE `cate` set
  title='$title',
  featured='$featured',
  active='$active'
  where id='$id'";
  $res = mysqli_query($con, $sql);
  header('Location:admin__cate.php');
  echo $sql;
}
?>