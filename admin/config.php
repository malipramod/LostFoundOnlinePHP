<?php 
	$host='localhost';
	$user='root';
	$pass='';
	$con=mysql_connect($host,$user,$pass) or die('Server Error'.mysql_error());
	$db='lostandfound';
	mysql_select_db($db) or die("Couldn't Connect with database".mysql_error($con));
?>