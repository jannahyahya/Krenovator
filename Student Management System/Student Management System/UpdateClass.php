<?php

    include_once 'db.php';

    global $db;

    $jsoninput = file_get_contents('php://input');
    $data = json_decode($jsoninput); 
    
    
    $ID=$data->ID;
    $Name=$data->Name;
    $Year=$data->Year;
    $HomeRoom_Teacher=$data->HomeRoom_Teacher;
    
   
    
	$sql = "UPDATE `class` SET  Name = \"{$Name}\" ,Year = {$Year},HomeRoom_Teacher = {$HomeRoom_Teacher}  WHERE ID={$ID} " ;
    
    ///UPDATE `stud_class` SET Student_Name = 'miwar' WHERE StudentID = 4
	$result = $db->query($sql)->affectedRows();
	echo (json_encode($result));
	$db->close();

    ?>