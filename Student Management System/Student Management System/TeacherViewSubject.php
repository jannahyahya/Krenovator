<?php

    include_once 'db.php';

    global $db;

    $jsoninput = file_get_contents('php://input');
    $data = json_decode($jsoninput); 
    

    
	$sql = "SELECT * FROM `teacher_subject` WHERE  TeacherID = $TeacherID " ;//{$ClassID}
    
	$result = $db->query($sql)->fetchAll();
	echo (json_encode($result));
	$db->close();

?>