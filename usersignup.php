<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>SignUp Phase I</title>
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="images/hlogo.png"> 
        <link rel="stylesheet" type="text/css" href="css/style1.css" />
		<script src="js/modernizr.custom.63321.js"></script>
		
    </head>
    <body>
        <div class="container">
		
			<!-- Codrops top bar -->
            <div class="codrops-top">
                <a href="index.php">
                    <strong>&laquo; Return to Lost and Found </strong>
                </a>
                
            </div>
			
			<header>
			
				

				<div class="support-note">
					<span class="note-ie">Sorry, only modern browsers.</span>
				</div>
				<cetenr><h1><b>Sign Up :: Phase I</b></h1></center>
			</header>
            
			
			<section class="main">
				<form class="form-1" method="post" action="">
					<p class="field">
						<input type="text" name="txtFirstName" placeholder="First Name" title="Your First Name" required>
						<i class="" ></i>
					</p>
                    <p class="field">
                    <input type="text" name="txtLastName" placeholder="Last Name" title="Your Last Name" required>
						<i class="" ></i>
					</p>
                    <p class="field">
                    <input type="text" name="txtUserName" placeholder="User Name" title="UserName" required>
						<i class="" ></i>
					</p>                    
						<p class="field">
							<input type="password" name="txtPassword" placeholder="Password" title="Password" required>
							<i class=""></i>
					</p>
					<p class="field">
							<input type="password" name="txtConfirmPassword" placeholder="Confirm Password" title="Password" required>
							<i class=""></i>
					</p>
                    
                    <p class="field">
                    <input type="text" name="txtEmail" placeholder="Email Address" title="Your Email Address" required>
						<i class="" ></i>
					</p>
						<p class="field">
                    <input type="text" name="txMobile" placeholder="Mobile Number" title="Your Mobile Number" required maxlength="10">
						<i class="" ></i>
					</p>
                  
                    <p class="field">
                    	Gender:&nbsp;&nbsp;&nbsp;<select name="cmbGender" title="Select Gender" required="required">
                        	<option value="Male">Male</option>
                            <option value="Female">Female</option> 
                        </select>						
					</p>
                      <br>
                    <p class="field">
                    	<textarea name="txtAddress" placeholder="You Address" required rows="3" cols="32"></textarea>
					</p>
						<p class="field">
                        <br>
							<a href="forgetpassword.php" title="Forgot Password"><strong>Forget Password?</a> <br>&nbsp;Already a Member?&nbsp;<a title="Already a Member?" href="userlogin.php">LogIn</a></strong>
					</p>
					<p class="submit">
						<button type="submit" name="submit" title="Sign Up"></button>
					</p>
                   
				</form>
			</section>
        </div>
    </body>
</html>
<?php
	if(!isset($_SESSION))
	{
		session_start();
	}
	include('config.php');
	if(isset($_POST['txtFirstName']) and isset($_POST['txtLastName']) and isset($_POST['txtUserName']) and 
	isset($_POST['txtPassword']) and isset($_POST['txtConfirmPassword']) and isset($_POST['txtEmail']) and 
	isset($_POST['txMobile']) and isset($_POST['cmbGender']
	) and isset($_POST['txtAddress']))
	{
		
		$firstname=$_POST['txtFirstName'];
		$lastname=$_POST['txtLastName'];
		$username=$_POST['txtUserName'];
		$email=addslashes($_POST['txtEmail']);
		$password=addslashes(sha1($_POST['txtPassword']));
		$confirmPassword=addslashes(sha1($_POST['txtConfirmPassword']));
		$mobile=$_POST['txMobile'];
		$gender=$_POST['cmbGender'];
		$address=$_POST['txtAddress'];
		$passchars=strlen($password);
		$confirmcode=rand(1000,9999);
		$querysel="select emailID from usermaster where EmailID='{$email}'";
		$querysel2="select MobileNumber from usermaster where MobileNumber='{$mobile}'";
		$resultsel=mysql_query($querysel) or die(mysql_error());
		$resultsel2=mysql_query($querysel2) or die(mysql_error());
		//mail Confirmation code		
		 
		if(mysql_num_rows($resultsel)==0)
		{
			if(mysql_num_rows($resultsel2)==0)
			{	
			if($passchars>=6)
			{
				if($password==$confirmPassword and $confirmPassword==$password)
				{
					$query="Insert into usermaster(FirstName,LastName,UserName,Password,EmailID,MobileNumber,Gender,Address1,ConfirmationCode) values('{$firstname}','{$lastname}','{$username}','{$password}','{$email}','{$mobile}','{$gender}','{$address}','{$confirmcode}')";
					$result=mysql_query($query)  or die(mysql_error());		
					
						if($result)
						{		   									
									$from="Lost And Found";
									$subject = 'Confirmation Code';  
									$message = "Your Email Address has been Register to <a href='http://www.lostandfound.com'>Lost And Found</a><br>Here is your confirmation code:".$confirmcode."<br>Your UserName is:".$email."<br>Password:".sha1($password); 
									mail($email, $subject, $message);
									$_SESSION['user_signup']=$email;																				
									header("location:usersignupcontinue.php");
						}
						else
						{
							echo "<center>Something went wrong</center>";						
						}
					}
					else
					{
						echo "<center>Password Doesn't Matches</center>";
					}
			}
			else
			{
					echo "<center>Paasword must 6 to 32 characters long</center>";
			}
			}
		
		else
		{
				echo "<center>Mobile Number is  Already Registered</center>";
		}
	}
			else
			{
				echo "<center>Email Already Exists</center>";	
			}
		}
		else
		{
			
		}
	
?>
