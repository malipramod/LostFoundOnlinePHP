<html>
<head>Lost<title></title></head>
</html>

<?php
	include('loginvarifier.php');
	include('config.php');
	

	if((!(isset($_POST['txtProductName']))) or(!isset($_POST['txtCategory'])) or (!isset($_POST['txtLostFrom'])) or 
	(!isset($_POST['txtPersonName'])) or (!isset($_POST['txtMobileNumber'])) or (!isset($_POST['txtEmailAddress'])))
	{
		echo "<script>alert('Some Values are missing')</script>";
		header( "refresh:0; url=lost.php" );
	}
	else
	{
		$product=$_POST['txtProductName'];
		$cat=$_POST['txtCategory'];
		$lostFrom=$_POST['txtLostFrom'];
		$person=$_POST['txtPersonName'];
		$contact=$_POST['txtMobileNumber'];
		$Email=$_POST['txtEmailAddress'];	
		$image = $_FILES['LostImage'] ;
						   
		$name = $_FILES['LostImage']['name'] ;
		$image = addslashes(file_get_contents($_FILES['LostImage']['tmp_name'])) ; 
		$query="insert into lostmaster(ProductName,Category,Image,LostFrom,ContactNumber,EmailAdd,PersonName)
				values('{$product}','{$cat}','{$image}','{$lostFrom}','{$contact}','{$Email}','{$person}')";
		$result= mysql_query($query) or die(mysql_error());
		echo "<script>alert('New Lost Added');</script>";
		header( "refresh:0; url=lost.php" );
		
	}
	
	
		
	
		
	  
?>