<?php
$con = mysqli_connect("localhost","root", "", "cidcard");

if(!$con){
	die("connection failed: " .mysqli_connect_error());
}

?>