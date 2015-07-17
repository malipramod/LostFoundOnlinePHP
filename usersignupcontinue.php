<!DOCTYPE html>
<html lang="en">
    <head>
    
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>SignUp Phase II</title>
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
				<cetenr><h1><b>Sign Up :: Phase II</b></h1></center>
			</header>
            
			
			<section class="main">
				<form class="form-1" method="post" action="" >
					<table>
                    <tr>
                    
                    <p class="field">
                    	<td><b>Country</b>&nbsp;&nbsp;&nbsp;</td><td><select name="cmdCountry" title="Select Country" required="required">						<?php
						include('config.php');
						$query="Select *from countrymaster Order by CountryName ASC";
						$result=mysql_query($query)or die(mysql_error());
						$row=mysql_num_rows($result);
						while($row=mysql_fetch_array($result,MYSQL_ASSOC))
						{
                        	echo "<option value='".$row['CountryName']."'>".$row['CountryName']."</option>";
						}
							
					?>
                        </select></td></tr>						
					</p>                    
                      <br>
                     
                     <tr>
                    <p class="field">
                    	<td><b>State</b>&nbsp;&nbsp;&nbsp;</td><td><select name="cmbState" title="Select State" required="required">
                        	<?php
										include('config.php');
										$query="select *from statemaster Order by StateName ASC";
										$result=mysql_query($query) or die(mysql_error());
										while($row=mysql_fetch_array($result,MYSQL_ASSOC))
										{
											echo "<option value='".$row['StateName']."'>".$row['StateName']."</option>";	
										}
									?>
                                                    
                        </select></td></tr>						
					</p>   
                    <tr>
                    <p class="field">
                    	<td><b>City</b>&nbsp;&nbsp;&nbsp;</td><td><select name="cmbCity" title="Select City" required="required">
                       <?php
						include('config.php');
						$query="Select *from citymaster Order by CityName ASC";
						$result=mysql_query($query) or die(mysql_error());
						
						while($row=mysql_fetch_array($result,MYSQL_ASSOC))
						{
                        	echo "<option value='".$row['CityName']."'>".$row['CityName']."</option>";
						}
							
					?>                          
                        </select></td></tr>						
					</p>   
                    <tr>
                   <p class="field">
                   <td><b>Code</b></td>
						<td><input type="text" name="txtConfirmationCode" placeholder="Confirmation Code" required title="Check you Email For Confirmation Code" maxlength="4"></td>
						<i class="" ></i>
					</p> 
						                 
                        
                        <tr><td></td><td></td></tr><tr><td></td><td></td></tr>
							<td colspan="2"><strong>Already a Member?&nbsp;</strong><a title="Already a Member?" href="userlogin.php"><strong>LogIn</strong></a></td>
					</p><tr>
                    <td colspan="2"><strong>Didn't Recieved Code?&nbsp;&nbsp;&nbsp;</strong><a title="Already a Member?" href="resend.php"><strong>Resend</strong></a></td>
					</p><tr>
                    
					<p class="submit">
						<button type="submit" name="submit" title="Finalize"></button>
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
	if(isset($_POST['cmdCountry']) and isset($_POST['cmbState']) and isset($_POST['cmbCity']) and 
	isset($_POST['txtConfirmationCode']))
	{
			$country=$_POST['cmdCountry'];
			$state=$_POST['cmbState'];
			$city=$_POST['cmbCity'];
			$username=$_SESSION['user_signup'];
			$confirmationcode=$_POST['txtConfirmationCode'];
			
			$query="Select *from usermaster where EmailID='$username'";
			$result1=mysql_query($query) or die(mysql_error());			
			$row=mysql_fetch_array($result1,MYSQL_ASSOC);

			if($confirmationcode==$row['ConfirmationCode'])
			{
				$query2="update usermaster set Country='{$country}',State='{$state}',City='{$city}' where EmailID='{$username}'";
				$result2=mysql_query($query2) or die(mysql_error());
				if($result2)
				{
					$_SESSION['user_signup']=$username;																				
					header("location:usersignupfinal.php");
				}
				else
				{
					echo "Coudld not Insert";	
				}
			}
			else
			{
				echo "Confirmation Code Doen't matches";
			}
	}
	else
	{
			echo "Values are not sufficient";
	}
	
	

	
?>
