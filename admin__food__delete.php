<?php 
    include('db.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM `food` WHERE id=$id";
    $res = mysqli_query($con,$sql);
    if(isset($res)){
        header('location:admin__food.php');
    }
    else{
        echo `Error`;
    }
?>