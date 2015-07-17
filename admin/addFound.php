
<html>
<head>Found<title></title></head>
</html>
<?php
	include('loginvarifier.php');
	include('config.php');
	

	if((!(isset($_POST['txtProductName']))) or(!isset($_POST['txtCategory'])) or (!isset($_POST['txtFoundFrom'])) or 
	(!isset($_POST['txtPersonName'])) or (!isset($_POST['txtMobileNumber'])) or (!isset($_POST['txtEmailAddress'])))
	{
		echo "<script>alert('Some Values are missing');</script>";
		header( "refresh:0; url=found.php" );
	}
	else
	{
		$product=$_POST['txtProductName'];
		$cat=$_POST['txtCategory'];
		$foundFrom=$_POST['txtFoundFrom'];
		$person=$_POST['txtPersonName'];
		$contact=$_POST['txtMobileNumber'];
		$Email=$_POST['txtEmailAddress'];	
		$image = $_FILES['txtLostImage'] ;
						   
		$name = $_FILES['txtLostImage']['name'] ;
		$image = addslashes(file_get_contents($_FILES['txtLostImage']['tmp_name'])) ; 
		$query="insert into foundmaster(ProductName,Category,Image,FoundFrom,ContactNumber,EmailAdd,PersonName)
				values('{$product}','{$cat}','{$image}','{$foundFrom}','{$contact}','{$Email}','{$person}')";
		$result= mysql_query($query) or die(mysql_error());
		echo "<script>alert('New Found added');</script>";
		header( "refresh:0; url=found.php" );
		
	}
	
	
		
	
		
	  
?>