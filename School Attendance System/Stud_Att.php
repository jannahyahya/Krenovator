<?php

    include_once 'db.php';

    global $db;

    $jsoninput = file_get_contents('php://input');
    $data = json_decode($jsoninput); 
    
    $ClassID=$data->ClassID;
    
	$sql = "SELECT * FROM `att_student` WHERE ClassID = {$ClassID}" ;//{$ClassID}
	$result = $db->query($sql)->fetchAll();
	echo (json_encode($result));
	$db->close();

?>