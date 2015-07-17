<?php 
		include('loginvarifier.php');
include('config.php');

	//Delete Messages
	if (isset($_GET["deletemessages"])) 
	{
		$deletemessages = (int)$_GET["deletemessages"];
		
		$query="Delete from querymaster where QueryID='{$deletemessages}'";
		mysql_query($query) or die(mysql_error());
		echo "<script>alert('Successfully Removed');</script>";
		header( "refresh:0; url=messages.php" );
		
	} 
	elseif (isset($_GET["deletereplay"])) 
	{
		$deletereplay = (int)$_GET["deletereplay"];
		
		$query="Delete from replaymaster where ReplayID='{$deletereplay}'";
		mysql_query($query) or die(mysql_error());
		echo "<script>alert('Successfully Removed');</script>";
		header( "refresh:0; url=messages.php" );
		
	} 	
	//delete Founds
	elseif (isset($_GET["deletefound"])) 
	{
		$deletefound = (int)$_GET["deletefound"];		
		$query="Delete from foundmaster where FoundID='{$deletefound}'";
		mysql_query($query) or die(mysql_error());
		echo "<script>alert('Successfully Removed');</script>";
		header( "refresh:0; url=admin.php" );
		
	} 	
	elseif (isset($_GET["deletelost"])) 
	{
		$deletelost = (int)$_GET["deletelost"];		
		$query="Delete from lostmaster where LostID='{$deletelost}'";
		mysql_query($query) or die(mysql_error());
		echo "<script>alert('Successfully Removed');</script>";
		header( "refresh:0; url=admin.php" );
		
	} 
	elseif (isset($_GET["cat"])) 
	{
		$cat = (int)$_GET["cat"];		
		$query="Delete from categorymaster where CategoryID='{$cat}'";
		mysql_query($query) or die(mysql_error());
		echo "<script>alert('Successfully Removed');</script>";
		header('refresh:0; url=Setting.php');
		
	} 
	elseif (isset($_GET["deletecountry"])) 
	{
		$country = (int)$_GET["deletecountry"];		
		$query="Delete from countrymaster where CountryID='{$country}'";
		mysql_query($query) or die(mysql_error());
		echo "<script>alert('Successfully Removed');</script>";
		header("refresh:0; url=csc.php");
		
	} 
	elseif (isset($_GET["deletestate"])) 
	{
		$state = (int)$_GET["deletestate"];		
		$query="Delete from statemaster where StateID='{$state}'";
		mysql_query($query) or die(mysql_error());
		header('location:csc.php');
		
	} 
	elseif (isset($_GET["deletecity"])) 
	{
		$city = (int)$_GET["deletecity"];		
		$query="Delete from citymaster where CityID='{$city}'";
		mysql_query($query) or die(mysql_error());
		echo "<script>alert('Successfully Removed');</script>";
		header("refresh:0; url=csc.php");
		
	} 
	else 
	{
	   echo "No DataFound";
	}	
?>