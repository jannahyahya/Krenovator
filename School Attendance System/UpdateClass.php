<?php

    include_once 'db.php';

    global $db;

    $jsoninput = file_get_contents('php://input');
    $data = json_decode($jsoninput); 
    
    
    $ClassID=$data->ClassID;
    $Class_name=$data->Class_name;
    $Total_Student=$data->Total_Student;
    
   
    
	$sql = "UPDATE `class` SET  Class_name = \"{$Class_name}\" ,Total_Student = {$Total_Student} WHERE ClassID={$ClassID} " ;
    
    ///UPDATE `stud_class` SET Student_Name = 'miwar' WHERE StudentID = 4
	$result = $db->query($sql)->affectedRows();
	echo (json_encode($result));
	$db->close();

    ?>