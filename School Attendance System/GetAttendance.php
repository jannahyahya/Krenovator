<?php

    include_once 'db.php';

    global $db;

    $jsoninput = file_get_contents('php://input');
    $data = json_decode($jsoninput); 
    
    

    $AttendanceID=$data->AttendanceID;
    $DateUpdated=$data->DateUpdated;
    $month = date('m');
    
    //monthlist=["","January","February","March","April","May","June","July","August","September","October","November","December"]
    //UPDATE `attendance` SET `DateUpdated`= "2021-06-07" WHERE AttendanceID = 5
    //{$month}={$month}+1 ,
    $sql ="UPDATE `Att_Student` SET DateUpdated= \"{$DateUpdated}\" , {$month}={$month}+1 WHERE AttendanceID={$AttendanceID} ";
	//$sql = "UPDATE `Attendance` SET RFIDID ={$RFIDID} , Student_Name = \"{$Student_Name}\" ,Student_email = \"{$Student_email}\" ,ClassID = {$ClassID} WHERE StudentID= {$StudentID} ; " ;
    //echo ($sql);
    ///UPDATE `stud_class` SET Student_Name = 'miwar' WHERE StudentID = 4
	$result = $db->query($sql)->affectedRows();
	echo (json_encode($result));
	$db->close();

 ?>