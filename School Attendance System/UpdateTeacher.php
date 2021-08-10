<?php

    include_once 'db.php';

    global $db;

    $jsoninput = file_get_contents('php://input');
    $data = json_decode($jsoninput); 
    
    $staff_id=$data->staff_id;
    $Teacher_name=$data->Teacher_name;
    $ClassID=$data->ClassID;
    $Teacher_email=$data->Teacher_email;
    $TeacherID=$data->TeacherID;
   
    
	$sql = "UPDATE `teacher_class` SET  staff_id ={$staff_id} ,Teacher_name = \"{ $Teacher_name}\",ClassID= {$ClassID},Teacher_email = \"{$Teacher_email}\" WHERE TeacherID={$TeacherID} " ;
    
    ///UPDATE `stud_class` SET Student_Name = 'miwar' WHERE StudentID = 4
	$result = $db->query($sql)->affectedRows();
	echo (json_encode($result));
	$db->close();

?>