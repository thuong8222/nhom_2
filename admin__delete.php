<?php 
    include('db.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM `ad` WHERE id=$id";
    $res = mysqli_query($con,$sql);
    if(isset($res)){
        header('location:admin__admin.php');
    }
    else{
        echo `Error`;
    }
?>