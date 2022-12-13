<?php
session_start();
$con = mysqli_connect('localhost','root','','btl');
if(mysqli_connect_error()){
    echo "Error connecting" . mysqli_connect_error();
}

?>