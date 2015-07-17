<!DOCTYPE html>
<html lang="en">
    <head>
    
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>SignUp Phase III</title>
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
				<cetenr><h1><b>Sign Up :: Phase III</b></h1></center>
			</header>
            
			
			<section class="main">
				<form class="form-1" method="post"  action="" enctype="multipart/form-data" >
					<table>
                    <tr>
                   <p class="field">
                   <td><b>Select Image</b></td>
						<td colspan="2"><input type="file" name="file"></td>
						<i class="" ></i>
					</p> 
						                 
                        </tr>
                        <br>
                        <tr>
							<td colspan="2"><strong>Already a Member?&nbsp;</strong><a title="Already a Member?" href="userlogin.php"><strong>LogIn</strong></a></td>
					</p>
                    <tr>
                    
					<p class="submit">
						<button type="submit" name="submit" title="Finalize"></button>
					</p>
                    </table>
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
	
	if(isset($_FILES['file']['name']))
	{
		$filename=$_FILES["file"]["name"];
		$filetype=$_FILES["file"]["type"];
		$filesize=$_FILES["file"]["size"];
		$fileerror=$_FILES["file"]["error"];
		$tempname=$_FILES["file"]["tmp_name"];

	if ((($filetype == "image/gif") or ($filetype == "image/jpg") or ($filetype == "image/jpeg") or ($filetype == "image/pjpeg")) and ($filesize < 100000))
			{
				$username=$_SESSION['user_signup'];
		  		if ($fileerror> 0)
			{
			  echo "File Error :  " . $fileerorr . "<br />";
			}
			else {			  			  			  
			  if (file_exists("images/".$filename))
				{
				   echo "<b>".$filename . " already exists. </b>";
				}else
				{

				   move_uploaded_file($tempname,"uploads/".$filename);

				  
				   ?>
					 <center>Uploaded File:<br>
					 <img src="uploads/<?php echo $filename; ?>"  width="250" height="250" alt="Image path Invalid" ></center> 
                     <?php
					 include('config.php');
					 
					 	$query="update usermaster set ProPic='{$filename}' where EmailID='$username'";
						$result=mysql_query($query) or die(mysql_error());
						
						if($result)
						{
					 	 	$_SESSION['user_signup']=$username;																				
						 	header("location:home.php");
						}
						else
						{
							echo "Could Not Insert";	
						}
			   }
			}
	  }else
	  {
		  echo "<b><center>";
	   echo "Invalid file Type ::<br> file type ::".$filetype." <br> file size::: ".$filesize;
	   echo "</center></b>";
	}
	
	}
		
?>
