<?php

    include_once 'db.php';

    global $db;

    $jsoninput = file_get_contents('php://input');
    $data = json_decode($jsoninput); 
    
    $ClassID=$data->ClassID;
    
	$sql = "DELETE FROM `class` WHERE ClassID = {$ClassID}";//{$ClassID}
	echo ($sql);
    $result = $db->query($sql)->affectedRows();
	echo (json_encode($result));
	$db->close();

?>