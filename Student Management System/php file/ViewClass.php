<?php

    include_once 'db.php';

    global $db;

    $jsoninput = file_get_contents('php://input');
    $data = json_decode($jsoninput); 
    
    
	$sql = "SELECT * FROM `class`" ;
	$result = $db->query($sql)->fetchAll();
	echo (json_encode($result));
	$db->close();

?>