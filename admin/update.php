<?php
	include('config.php');
	include('loginvarifier.php');
	if(isset($_POST['txtFirstName']) and isset($_POST['txtLastName']) and isset($_POST['txtUserName']) and 
	isset($_POST['txtEmail']) and isset($_POST['txtMobileNumber']))
	{
			$firstName=$_POST['txtFirstName'];
			$lastName=$_POST['txtLastName'];
			$userName=$_POST['txtUserName'];
			$email=$_POST['txtEmail'];
			$mobil=$_POST['txtMobileNumber'];
			$query="update adminmaster set FirstName='{$firstName}',LastName='{$lastName}',LastName='{$lastName}',EmailID='{$email}',MobileNumber='{$mobil}' where EmailID='$login_session'";
			$result=mysql_query($query);
			if($result)
			{
				echo "<script>alert('Successfully Updated');</script>";
				header( "refresh:0; url=myprofile.php" );			
			}
			else
			{
				echo "<script>alert('Something Went Wrong Could not update');</script>";
				header( "refresh:0; url=myprofile.php" );
			}
			
		}
		
	elseif(isset($_POST['txtNewPassword']) and isset($_POST['txtConfirmPassword']))
	{
		$newPassword=addslashes($_POST['txtNewPassword']);
		$confirmPassword=addslashes($_POST['txtConfirmPassword']);		
		$lenght=strlen($confirmPassword);
		if($lenght>=6 and $lenght<=32)
		{
			if($newPassword==$confirmPassword and $confirmPassword==$newPassword)
			{
				$query="update adminmaster set Password={$newPassword} where EMailID='{$login_session}'";
				$result=mysql_query($query) or die(mysql_error());
				if($result)
				{
					echo "<script>alert('Successfully Updated');</script>";
					header( "refresh:0; url=myprofile.php" );	
				}
				else
				{
					echo "<script>alert('Something Went Wrong Could not update');</script>";
					header( "refresh:0; url=myprofile.php" );
				}
			}
			else
			{		echo "<script>alert('Password Doesn't matches');</script>";								
		   			 header( "refresh:0; url=myprofile.php" );	
			}
		}
		else
		{			
				echo "<script>alert('Characters should in the range of 6 to 32');</script>";
				header( "refresh:0; url=myprofile.php" );			
		}
	}
	else
	{
		echo "<script>alert('Some Error');</script>";
	}

?>