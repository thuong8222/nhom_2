<?php 
    include('db.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM `cart` WHERE id=$id";
    $res = mysqli_query($con,$sql);
    if(isset($res)){
        header('location:cart.php');
    }
    else{
        echo `Error`;
    }
