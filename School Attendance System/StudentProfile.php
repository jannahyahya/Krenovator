<?php

    include_once 'db.php';

    global $db;

    $jsoninput = file_get_contents('php://input');
    $data = json_decode($jsoninput); 
    
    $StudentID=$data->StudentID;
    
	$sql = "SELECT * FROM `att_student` WHERE StudentID= {$StudentID}" ;
	$result = $db->query($sql)->fetchAll();
	echo (json_encode($result));
	$db->close();

?>