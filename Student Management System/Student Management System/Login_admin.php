<?php

    include_once 'db.php';

    global $db;
try{
    
    $jsoninput = file_get_contents('php://input');
    $data = json_decode($jsoninput); 
    
    $NAme=    isset($data->NAme) ? $data->NAme : "";
    
    $PassID=  isset($data->PassID) ? $data->PassID : 0;

	$sql = "SELECT * FROM `admin` WHERE NAme = \"{$NAme}\" AND PassID= {$PassID}" ;//{$ClassID}
	//echo $sql;
    $result = $db->query($sql)->fetchArray();

    if(isset($result["AdminID"])) 
    { 
        $result["UserLogin"] =true; 
        $result["type"] = "Admin";
        
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