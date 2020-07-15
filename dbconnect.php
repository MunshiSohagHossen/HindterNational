<?php

$server = "localhost";
$username = "root";
$pass = "";

$con = new mysqli($server,$username,$pass);
if($con->connect_error){
	//echo "Unable to connect.<br/>";
}else{
	//echo "Connection Successful.<br/>";
}

$con->select_db("hindternational");

?>