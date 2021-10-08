<?php

    include_once 'db.php';

    global $db;

    $jsoninput = file_get_contents('php://input');
    $data = json_decode($jsoninput); 
    
    $Name=$data->Name;
    $Contact=$data->Contact;
    $ID=$data->ID;
   
	$sql = "UPDATE `teacher_class` SET   Name = \"{$Name}\", Contact =\"{$Contact}\"  WHERE ID={$ID} " ;
    
    ///UPDATE `stud_class` SET Student_Name = 'miwar' WHERE StudentID = 4
	$result = $db->query($sql)->affectedRows();
	echo (json_encode($result));
	$db->close();

?>