<?php
$jsoninput = file_get_contents('php://input');
 
$data = json_decode($jsoninput);
echo $data->submit;
?>