<?php

    include_once 'db.php';

    global $db;

    $jsoninput = file_get_contents('php://input');
    $data = json_decode($jsoninput); 
    
    $StudentID=$data->StudentID;
    
	$sql = "DELETE FROM `student` WHERE StudentID = {$StudentID}";//{$ClassID}
	$result = $db->query($sql)->affectedRows();
	echo (json_encode($result));
	$db->close();

?>