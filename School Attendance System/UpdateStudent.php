<?php

    include_once 'db.php';

    global $db;

    $jsoninput = file_get_contents('php://input');
    $data = json_decode($jsoninput); 
    
    $StudentID=$data->StudentID;
    $RFIDID=$data->RFIDID;
    $Student_Name=$data->Student_Name; 
    $Student_email=$data->Student_email;
    $ClassID=$data->ClassID;
   
    
	$sql = "UPDATE `student` SET RFIDID ={$RFIDID} , Student_Name = \"{$Student_Name}\" ,Student_email = \"{$Student_email}\" ,ClassID = {$ClassID} WHERE StudentID= {$StudentID} ; " ;
    //echo ($sql);
    ///UPDATE `stud_class` SET Student_Name = 'miwar' WHERE StudentID = 4
	$result = $db->query($sql)->affectedRows();
	echo (json_encode($result));
	$db->close();

 ?>