<?php

    include_once 'db.php';

    global $db;

    $jsoninput = file_get_contents('php://input');
    $data = json_decode($jsoninput); 
    
  
 
    $Name=$data->Name;
    $Contact=$data->Contact;
   

    //kena ada no kad RFID dulu
    //--->INSERT INTO stud_class SET Student_Name = " Aminahhhah",ClassID = 1 ,Student_email='amina@gmail.com'
	$sql = "INSERT INTO  `teacher` SET  Name = \"{$Name}\", Contact =\"{$Contact}\" " ;

    
    
	$result = $db->query($sql)->affectedRows();
	echo (json_encode($result));
	$db->close();

 ?> 