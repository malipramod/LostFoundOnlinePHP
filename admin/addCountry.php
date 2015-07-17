<?php
	
			
	
	include('config.php');
	$countryName=$_POST['txtCountryName'];
	$countryCode=$_POST['txtCountryCode'];
	if(!(isset($countryName)) or $countryCode==NULL )
	{
		echo "<script>alert('Country Name is missing')</script>";
		
		
		if( (!isset($countryCode)) and $countryName=NULL)
		
		{
			echo "<script>alert('Country Code is missing')</script>";
			header( "refresh:0; url=Setting.php" );
		}
		header('location:Setting.php');
	}
	else
	{
		$query="insert into countrymaster(CountryName,CountryCode) values('".$_POST['txtCountryName']."','".$_POST['txtCountryCode']."')";
		$result=mysql_query($query) or die(mysql_error());
		if($result)
		{
			echo "<script>alert('Inserted Successfully')</script>";
			header( "refresh:0; url=Setting.php" );			
		}		
	}
	
?>