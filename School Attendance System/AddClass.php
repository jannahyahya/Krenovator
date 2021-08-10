<?php

    include_once 'db.php';

    global $db;

    $jsoninput = file_get_contents('php://input');
    $data = json_decode($jsoninput); 
    
  
    $Class_name=$data->Class_name;
    $Total_Student=$data->Total_Student;

    //kena ada no kad RFID dulu
    //--->INSERT INTO stud_class SET Student_Name = " Aminahhhah",ClassID = 1 ,Student_email='amina@gmail.com'
	$sql = "INSERT INTO  `class` SET  Class_name = \"{$Class_name}\" , Total_Student ={$Total_Student} " ;
    
	$result = $db->query($sql)->affectedRows();
	echo (json_encode($result));
	$db->close();

 ?> 