<?php

    include_once 'db.php';

    global $db;
try{
    $jsoninput = file_get_contents('php://input');
    $data = json_decode($jsoninput); 
    
    $Teacher_email=    isset($data->Teacher_email) ? $data->Teacher_email : "";
    
    $staff_id=  isset($data->staff_id) ? $data->staff_id : 0;

	$sql = "SELECT * FROM `teacher_class` WHERE Teacher_email = \"{$Teacher_email}\" AND staff_id= {$staff_id}" ;//{$ClassID}
	//echo $sql;
    $result = $db->query($sql)->fetchArray();

    if(isset($result["TeacherID"])) 
    { 

        $result["UserLogin"] =true; 
        $result["type"] = "Teacher";
        
    }//if wujud
    else  $result["UserLogin"] =false;//if x wujud 
    //if select * from teacher class = 1 row, then UserLogin:true,
    //else UserLogin:false
	echo (json_encode($result)); //bila bila nak debug, guna method backtrack
	$db->close();
    
}
catch(Exception $e) {
echo("{\"UserLogin\":false}");
}
?>