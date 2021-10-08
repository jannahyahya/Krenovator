<?php

    include_once 'db.php';

    global $db;

    $jsoninput = file_get_contents('php://input');
    $data = json_decode($jsoninput); 
    
  
    $ID=$data->ID;
    $Name=$data->Name;
    $IC=$data->IC; 
    $Addresss=$data->Addresss;
    $Contact=$data->Contact;
    $ClassID=$data->ClassID;

   //UPDATE `student` SET IC ={$IC} ,Addresss = \"{$Addresss}\" ,Contact = \"{$Contact}\" ,ClassID = {$ClassID} WHERE ID= {$ID} " ;
    //echo ($sql);

    
	$sql = "INSERT INTO  `student` SET  IC ={$IC} , Name = \"{$Name}\" ,Addresss = \"{$Addresss}\" ,Contact = \"{$Contact}\" ,ClassID = {$ClassID} " ;

    ///UPDATE `stud_class` SET Student_Name = 'miwar' WHERE StudentID = 4
	$result = $db->query($sql)->affectedRows();
	echo (json_encode($result));
	$db->close();

 ?> 