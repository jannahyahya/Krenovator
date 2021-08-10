<?php

    include_once 'db.php';

    global $db;

    $jsoninput = file_get_contents('php://input');
    $data = json_decode($jsoninput); 
    
  
    $Student_Name=$data->Student_Name; 
    $Student_email=$data->Student_email;
    $ClassID=$data->ClassID;
    $RFIDID=$data->RFIDID;

    //kena ada no kad RFID dulu
    //--->INSERT INTO stud_class SET Student_Name = " Aminahhhah",ClassID = 1 ,Student_email='amina@gmail.com'
	$sql = "INSERT INTO  `stud_class` SET  Student_Name = \"{$Student_Name}\" ,Student_email = \"{$Student_email}\" , ClassID ={$ClassID} , RFIDID =\"{$RFIDID}\" " ;

    //echo ($sql);
    ///UPDATE `stud_class` SET Student_Name = 'miwar' WHERE StudentID = 4
	$result = $db->query($sql)->affectedRows();
    //INSERT INTO  `attendance` SET  StudentID = (select `student`.`StudentID` from `student` where `student`.`Student_Name`="miko" AND `student`.`RFIDID`="" AND `student`.`ClassID`="" AND `student`.`Student_email`="" limit 1)
    $sql = "INSERT INTO  `attendance` SET  StudentID = (select `student`.`StudentID` from `student` where `student`.`Student_Name`=\"{$Student_Name}\" AND `student`.`RFIDID`=\"{$RFIDID}\" AND `student`.`ClassID`={$ClassID} AND `student`.`Student_email`= \"{$Student_email}\" limit 1)" ;
    //echo ($sql);
    ///UPDATE `stud_class` SET Student_Name = 'miwar' WHERE StudentID = 4
	$result = $db->query($sql)->affectedRows();
	echo (json_encode($result));
	$db->close();

 ?> 