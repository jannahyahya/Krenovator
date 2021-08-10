<?php

    include_once 'db.php';

    global $db;

    $jsoninput = file_get_contents('php://input');
    $data = json_decode($jsoninput); 
    
    $StudentID=$data->StudentID;
    $RFIDID=$data->RFIDID;
    $Student_Name=$data->Student_Name;
    $Class_name=$data->Class_name;
    $Student_email=$data->Student_email;
   
    
	$sql = "UPDATE `stud_class` SET RFIDID ={$RFIDID} ,Student_Name = \"{ $Student_Name}\",Class_name= \"{$Class_name}\" ,Student_email = \"{$Student_email}\" WHERE StudentID={$StudentID} " ;
    
    ///UPDATE `stud_class` SET Student_Name = 'miwar' WHERE StudentID = 4
	$result = $db->query($sql)->fetchUpdate();
	echo (json_encode($result));
	$db->close();

    ?>