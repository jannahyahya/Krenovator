<?php

session_start();


$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'users');
$name = $_POST['user'];
$pass = $_POST['password'];


$s = "select * from user where name = '$name' && password ='$pass'";

$result = mysqli_query($con,$s);
$num = mysqli_num_rows($result);


if (session_status() === PHP_SESSION_NONE) {
    header('Location: home.php');
    exit();
    }

else
    header('Location: login.php');



?>