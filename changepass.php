<!DOCTYPE html>
<html>
<head>
<?php
			include('loginvarifier.php');
?>
<title>Change Password</title>
<link rel="shortcut icon" href="images/hlogo.png"> 
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="css/style2.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/demo2.css" media="all" />
</head>
<body background="images/bgnoise_lg.png">
<div class="container">
			<!-- freshdesignweb top bar -->
            <div class="freshdesignweb-top">
                <a href="home.php" target=""><b>Home</b></a>
                <a href="editprofile.php" target=""><b>Edit Profile</b></a>
               
                
                <span class="right">
                    <a href="logout.php">
                        <strong>LogOut(<?php echo $login_session; ?>)</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div>
           
			<header>
				<h1>Change Password</h1>
            </header>       
      <div  class="form" >
    		<form id="contactform" method="post" action="" >  
             
    			<p class="contact"><label for="name">Current Password</label></p> 
    			<input id="name" name="txtCurrentPass" required tabindex="1" type="password" title="Current Password"> 
                
                <p class="contact"><label for="name">New Password</label></p> 
    			<input id="name" name="txtNewPass" required tabindex="2" type="password" title=">New Password">   
                
                <p class="contact"><label for="name">Reapeat Password</label></p> 
    			<input id="name" name="txtConfirmPass" required tabindex="2" type="password" title="Confirm Password">                    
            	<input class="buttom" name="submit" id="submit" tabindex="8" value="Change" type="submit"> 	
             
   </form> 
   
</div>      
</div>

</body>
</html>



<?php
	include('config.php');
	if(!isset($_SESSION))
	{
		session_start();
	}

	if((isset($_POST['txtCurrentPass'])) and isset($_POST['txtNewPass']) and isset($_POST['txtConfirmPass']))
	{	
		$length=strlen($_POST['txtNewPass']);
		
		$currentpass=addslashes(sha1($_POST['txtCurrentPass']));		
		$newpass=addslashes(sha1($_POST['txtNewPass']));
		$confirmpass=addslashes(sha1($_POST['txtConfirmPass']));
		
		$query1="Select * from usermaster where EmailID='{$login_session}'";
		$result1=mysql_query($query1);
		
		while($row1=mysql_fetch_array($result1))
		{
			$dbpass=$row1['Password'];
		}
		
		
			if($length<6)
			{
			
				echo "<center>Password must greater than 6 charactes</center>";	
			
			}
			else
			{
				if($newpass==$confirmpass and $confirmpass==$newpass)
				{
					
						if($currentpass==$dbpass)
						{
						$query="update usermaster set Password='{$newpass}' where EmailID='{$login_session}'";
						$result= mysql_query($query) or die(mysql_error());
				
							if($result)
							{
										
							 $_SESSION['user_signup']=$login_session;
							 	
								echo "<script>alert('Password Chnaged Successfully');</script>";
								header( "refresh:0; url=changepass.php" );																			
								
							}
							else
							{	
								echo "<center>Could Not able to update</center>";
							}
									
						}
						else
						{
							echo "<center>Could not matched new password with old one</center>";
						}
				}
				else
				{
					echo "<center>Password Doen't Matches</center>";	
				}
			}
			
		}
		else
		{
			//echo "Please Provide Values";			
		}
	
?>