<?php 
    include('db.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM `user` WHERE id=$id";
    $res = mysqli_query($con,$sql);
    if(isset($res)){
        header('location:admin__user.php');
    }
    else{
        echo `Error`;
    }
