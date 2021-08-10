<?php

    include_once 'db.php';

    global $db;

    $jsoninput = file_get_contents('php://input');
    $data = json_decode($jsoninput); 
    
    $AttendanceID=$data->AttendanceID;
    
	$sql = "DELETE FROM `Attendance` WHERE AttendanceID = {$AttendanceID}";//{$ClassID}
	$result = $db->query($sql)->affectedRows();
	echo (json_encode($result));
	$db->close();

?>