<?php

    include_once 'db.php';

    global $db;

    $jsoninput = file_get_contents('php://input');
    $data = json_decode($jsoninput); 
    
  

    $Name=$data->Name;
    $Year=$data->Year;
    $HomeRoom_Teacher=$data->HomeRoom_Teacher;
    

    //kena ada no kad RFID dulu
    //--->INSERT INTO stud_class SET Student_Name = " Aminahhhah",ClassID = 1 ,Student_email='amina@gmail.com'
	$sql = "INSERT INTO  `class` SET  Name = \"{$Name}\" ,Year = {$Year},HomeRoom_Teacher = {$HomeRoom_Teacher}  " ;
    
	$result = $db->query($sql)->affectedRows();
	echo (json_encode($result));
	$db->close();

 ?> 