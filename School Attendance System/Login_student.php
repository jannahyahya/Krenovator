<?php

    include_once 'db.php';

    global $db;
try{
    
    $jsoninput = file_get_contents('php://input');
    $data = json_decode($jsoninput); 
    
    $n_matrix=    isset($data->n_matrix) ? $data->n_matrix : "";
    
    $ic=  isset($data->ic) ? $data->ic : 0;

	$sql = "SELECT * FROM `student` WHERE n_matrix = \"{$n_matrix}\" AND ic= {$ic}" ;//{$ClassID}
	//echo $sql;
    $result = $db->query($sql)->fetchArray();

    if(isset($result["StudentID"])) 
    { 
        $result["UserLogin"] =true; 
        $result["type"] = "Student";
        
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