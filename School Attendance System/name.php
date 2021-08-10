<?php

    include_once 'db.php';

    global $db;

    $jsoninput = file_get_contents('php://input');
    $data = json_decode($jsoninput); 
    
	$sql = "SELECT * FROM `list_student` " ;//{$ClassID}
	$result = mysqli_query($db, $sql);
	echo (json_encode($result));
	$db->close();

?>