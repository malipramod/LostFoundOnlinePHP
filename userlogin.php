<!DOCTYPE html>
<html lang="en">
    <head>
    
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>LogIn to You Account</title>
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="images/hlogo.png"> 
        <link rel="stylesheet" type="text/css" href="css/style1.css" />
		<script src="js/modernizr.custom.63321.js"></script>
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
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
				<cetenr><h1><b>Sign In</b></h1></center>
			</header>
			 
			<section class="main">
				<form class="form-1" method="post" action="">
					<p class="field">
						<input type="text" name="txtUserName" placeholder="Username or email" title="UserName" required>
						<i class="" ></i>
					</p>
						<p class="field">
							<input type="password" name="txtPassword" placeholder="Password" title="Password" required>
							<i class=""></i>
					</p>
                    </p>
						<p class="field">
                        <br>
							<a href="forgetpassword.php" title="Forgot Password"><strong>Forget Password?</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a title="Not a Member?" href="usersignup.php">SignUp</a></strong>
					</p>
					<p class="submit">
						<button type="submit" name="submit" title="Log In"></button>
					</p>
                   
				</form>
			</section>
        </div>
    </body>
</html>

<?php
	session_start();
	include('config.php');
	if(isset($_POST['txtUserName']) and isset($_POST['txtPassword']))
	{
		
		$username=addslashes($_POST['txtUserName']);
		$password=addslashes(sha1($_POST['txtPassword']));
		
		$query="SELECT * FROM usermaster WHERE EmailID='$username' and Password='$password'";
		$result=mysql_query($query)  or die(mysql_error());
		$row=mysql_fetch_array($result);
		
		$count=mysql_num_rows($result);
			if($count==1)
			{															
				if($result!="")
				{
					$_SESSION['login_user']=$username;
					header("location: home.php");
				}
			}
			else
			{
				echo "<center>UserName or Password is wrong</center>";
                
			}
		}
			
	
?>