<?php

session_start();


$con = mysqli_connect('localhost','jannah','jannah');
mysqli_select_db($con,'se1');
$name = $_POST['user'];
$pass = $_POST['password'];

$s1 = "select ID,Name from teacher";

$result1 = mysqli_query($con,$s1);
$num1 = mysqli_num_rows($result1);

$s2 = "select Name from class";

$result2 = mysqli_query($con,$s2);
$num2 = mysqli_num_rows($result2);

$s3 = "select * from subject";

$result3 = mysqli_query($con,$s3);
$num3 = mysqli_num_rows($result3);


echo "select";