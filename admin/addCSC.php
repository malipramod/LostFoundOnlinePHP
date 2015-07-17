<?php
	include('loginvarifier.php');
	include('config.php');
	
	if(isset($_POST['opnCountry']) and isset($_POST['txtState']))
	{
		$country=$_POST['opnCountry'];
		$state=$_POST['txtState'];
		$query="Insert into statemaster(CountryID,StateName) values('{$country}','{$state}')";
		$result=mysql_query($query) or die(mysql_error());
		echo "<script>alert('State added')</script>";
		header( "refresh:0; url=Setting.php" );
	}
	
	elseif(isset($_POST['opnCountry']) and isset($_POST['opnState']) and isset($_POST['txtCity']))
	{
		$country=$_POST['opnCountry'];
		$state=$_POST['opnState'];
		$city=$_POST['txtCity'];
		$query="Insert into citymaster(CountryID,StateID,CityName) values('{$country}','{$state}','{$city}')";
		$result=mysql_query($query) or die(mysql_error());
		echo "<script>alert('City added')</script>";
		header( "refresh:0; url=Setting.php" );
	}
	else
	{
		echo "Some Error";	
	}
?>