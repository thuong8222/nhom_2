<?php 
    include('db.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM `cate` WHERE id=$id";
    $res = mysqli_query($con,$sql);
    if(isset($res)){
        header('location:admin__cate.php');
    }
    else{
        echo `Error`;
    }
?>