<?php

include_once 'db.php';

$debug = 0;

$test = 0;
function getMachine(int $id = 0, $name = "", int $Capacity = 0, int $Process = 0, $Status = "")
{
	global $db, $debug;
	$sql = "SELECT * FROM machine";
	$result = $db->query($sql)->fetchAll();
	echo (json_encode($result));
	$db->close();
}

function delMachine(int $id = 0, $name = "", int $Capacity = 0, int $Process = 0, $Status = "")
{
	//delMachine(1);
	//daelete a row with that ID
	global $db, $debug;
	if ($id != 0) {
		$sql = "DELETE FROM machine WHERE Mac_ID = {$id}";
		if ($debug) echo ($sql);
		$db->query($sql);
		$db->close();
	}
}

function updateMachine(int $id = 0, $name = "", int $Capacity = 0, int $Process = 0, $Status = "")
{
	global $db, $debug;
	if ($id != 0 and $name != "" and $Capacity != 0 and $Process != 0 and $Status != "") {
		$sql = "UPDATE machine SET Mac_Label = \"{$name}\", Mac_Capacity={$Capacity}, Mac_Process={$Process},Status=\"{$Status}\" WHERE Mac_ID = {$id};";
		if ($debug) echo ($sql);
		$db->query($sql);
		$db->close();
	}
}
//updateMachine(1,"MK10",20,1,"Ready");
//will update a row with that id, using this value.


function addMachine(int $id = 0, $name = "", int $Capacity = 0, int $Process = 0, $Status = "")
{
	//addMachine(0,"MK11",20,1,"Ready");
	//will add a row with that value. 
	global $db, $debug;
	if ($name != "" and $Capacity != 0 and $Process != 0 and $Status != "") {
		$sql = "INSERT INTO `machine`( `Mac_Label`, `Mac_Capacity`, `Mac_Process`, `Status`) VALUES (\"{$name}\",'{$Capacity}','{$Process}',\"{$Status}\")";
		if ($debug) echo ($sql);
		$db->query($sql);
		$db->close();
	}
}

function Dummy($a = 0, $b = 0, $c = 0, $d = 0, $e = 0)
{
	//Function dummy exist so that nothing will be done if action == 0
}


if (isset($_GET['Action'])) {
	$Action = $_GET['Action'];

	$ID = isset($_GET['ID']) ? (int)$_GET['ID'] : 0;

	$Name = (isset($_GET['Name'])) ? $_GET['Name'] : "";

	$Capacity = (isset($_GET['Capacity'])) ? (int)$_GET['Capacity'] : 0;

	$Process = (isset($_GET['Process'])) ? (int)$_GET['Process'] : 0;

	$Status = (isset($_GET['Status'])) ? $_GET['Status'] : "";

	//The function is standardized to take 5 input variable.
	//Eventho we dont need all value in getMachine, we will still send all value. this is to make the array function method possible. 
	//This is the array of function.
	$fn = array('Dummy', 'addMachine', 'getMachine', 'updateMachine', 'delMachine');

	$fn[$Action]($ID, $Name, $Capacity, $Process, $Status);
}

//To display HTML form, set test = 1
if ($test == 1) {
?>
	<form method="get" action="Machine.php" name="form" id="your_form_id" enctype="multipart/mixed">
		<input type="text" name="Action" id="Action" placeholder="Action" required /> <br>
		<input type="text" name="ID" id="ID" placeholder="ID" required /> <br>
		<input type="text" name="Name" id="Name" placeholder="Name" required /> <br>
		<input type="text" name="Capacity" id="Capacity" placeholder="Capacity" required /> <br>
		<input type="text" name="Process" id="Process" placeholder="Process" required /> <br>
		<input type="text" name="Status" id="Status" placeholder="Status" required /> <br>
		<input type="submit" name="btnsubmit" value="Submit" />
	</form>
<?php
};
?>