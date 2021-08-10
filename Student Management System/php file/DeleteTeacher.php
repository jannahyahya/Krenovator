<?php

    include_once 'db.php';

    global $db;

    $jsoninput = file_get_contents('php://input');
    $data = json_decode($jsoninput); 
    
    $TeacherID=$data->TeacherID;
    
	$sql = "DELETE FROM `teacher` WHERE ID = {$ID}";//{$ClassID}
	$result = $db->query($sql)->affectedRows();
	echo (json_encode($result));
	$db->close();

?>