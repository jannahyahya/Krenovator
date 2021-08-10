<?php

    include_once 'db.php';

    global $db;

    $jsoninput = file_get_contents('php://input');
    $data = json_decode($jsoninput); 
    
  
    $staff_id=$data->staff_id; 
    $Teacher_name=$data->Teacher_name;
    $ClassID=$data->ClassID;
    $Class_name=$data->Class_name;
    $Teacher_email=$data->Teacher_email;

    //kena ada no kad RFID dulu
    //--->INSERT INTO stud_class SET Student_Name = " Aminahhhah",ClassID = 1 ,Student_email='amina@gmail.com'
	$sql = "INSERT INTO  `teacher_class` SET  staff_id = {$staff_id} ,Teacher_name = \"{$Teacher_name}\" , ClassID ={$ClassID} , Teacher_email =\"{$Teacher_email}\" , Class_name =\"{$Class_name}\"" ;

    
    
	$result = $db->query($sql)->affectedRows();
	echo (json_encode($result));
	$db->close();

 ?> 