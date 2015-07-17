<?php
	include('config.php');
	if(!isset($_SESSION))
	{
		session_start();
	}
	if(isset($_POST['txtName']) and isset($_POST['txtEmail']) and isset($_POST['txtMessage']) and isset($_POST['txtSubject']))
	{
			$name=$_POST['txtName'];
			$email=$_POST['txtEmail'];
			$message=$_POST['txtMessage'];
			$subject=$_POST['txtSubject'];
			$date=date("Y-m-d");
			$query="Insert into querymaster(PersonName,EmailAddress,Query,Subject,Date,flag) 				values('{$name}','{$email}','{$message}','{$subject}','{$date}','1')";
			$result=mysql_query($query);
			
			if($result)
			{
				$ref = $_SERVER["HTTP_REFERER"];
				
				if ( $ref == '{$ref}' )
				{
					echo "<script>alert('You Query is Submitted Succesfully');</script>";
					header( "refresh:0; url=home.php" );

				}
				else
				{
					echo "<script>alert('You Query is Submitted Succesfully');</script>";
					header( "refresh:0; url=index.php" );
				}			
			}
			else
			{
					echo "Could not submit your Query";
									
			}						
	}
	else
	{
			echo "Some Values are missing";	
	}
?>