<?php
$mysqli = new mysqli('localhost', 'root', 'root', 'todo2');
//$mysqli->connect_error will kill the code and an erroir message will pop up
if($mysqli-> connect_errno){
	die('Connect Error(' . $mysqli->connect_errno . ')'
		. $mysqli->connect_errno);
}else{
	// echo "Connection Made";
}
$mysqli->close();




?>