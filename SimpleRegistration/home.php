<?php

session_start();


$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'users');
$name = $_POST['user'];
$pass = $_POST['password'];


$s = "select * from user' where name = '$name' && password ='$pass'";

$result = mysqli_query($con,$s);
$num = mysqli_num_rows($result);



?>

<html>
<head>
<title> Home page </title>
<link rel ="stylesheet" type="text/css" href="style.css">
<link rel= "stylesheet" type="text/css" 
href = "https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<a class= "float-right" href ="logout.php">LOGOUT</a>
<h1>Welcome <?php echo $_SESSION['username']; ?> </h1>
</div>
<div class="update">
    <h2>Update Your Information</h2>
<table>
    
</table>
</div>
</body>




</html>