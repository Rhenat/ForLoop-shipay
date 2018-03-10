<?php
//Database conneection settings
	$host = "localhost";
	$username = "root";
	$password = "";
	$database = "shiipay";
	$mysqli = new mysqli($host,$username,$password,$database) or die($mysqli->error);
?>