<?php 
include_once 'db.php'; //Connects to your Database 
include_once 'encrypt.php'; //Connects to your Database 
global $db;

$jsoninput = file_get_contents('php://input');
$data = json_decode($jsoninput); 
$loginid=isset($data->loginid) ? $data->loginid : NULL;
$pass=isset($data->pass) ? $data->pass : NULL;
$output =array();
if(!$loginid){
	die('{"msg":"You did not fill in LoginID"}');}

if(!$pass){
	die('{"msg":"You did not fill in Password"}');}
	
//this will run if both of the input is setted, so no need another if to check.
$output['msg']="No user found"; //default data to be returned. 
$check = "SELECT * FROM teacher WHERE LoginID = '".$loginid."'";
$info = $db->query($check)->fetchArray();
if(count($info)){   //check if array is empty
	if ($pass != $info['password']){
		die('{"msg":"Incorrect password, please try again."}'); //refer to main page later
	}
	else{ // if login is ok then we return value  
	$info['type']="teacher"; // this is how to add new item to php array
	unset($info['password']); //this is how to remove specific element
	$json_data=json_encode($info);

	$output['msg']="Login Success";
	$output['data']=encrypt($json_data);
	}
}
echo json_encode($output);//return whateva data yang ada, or return no user found.
?>