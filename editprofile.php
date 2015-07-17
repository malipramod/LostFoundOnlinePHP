<!DOCTYPE html>
<html>
<head>
<?php
			include('loginvarifier.php');
?>
<title>Edit Profile</title>
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
                <a href="changepass.php" target=""><b>Change Password</b></a>
               
                
                <span class="right">
                    <a href="logout.php">
                        <strong>LogOut(<?php echo $login_session; ?>)</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div>
           
			<header>
				<h1>Edit Profile</h1>
            </header>       
      <div  class="form" >
     
     	<?php      	  
				include('config.php');
				$query="Select *from usermaster where EmailId='{$login_session}'";
				
				$result=mysql_query($query) or die(mysql_error());
				
				while($row=mysql_fetch_array($result))
				{
					
			?>
    		<form id="contactform" method="post" action="" enctype="multipart/form-data">  
             
    			<p class="contact"><label for="name">First Name</label></p> 
    			<input id="name" name="txtFirstName" required tabindex="1" type="text" title="Change First Name"> 
                
                <p class="contact"><label for="name">Last Name</label></p> 
    			<input id="name" name="txtLastName" required tabindex="2" type="text" title="Change Last Name"> 
    			 
    			<p class="contact"><label for="email">Change Profile Pic</label></p> 
    			<input type="file" name="file" tabindex="2" required> 
                
                <p class="contact"><label for="username">User Name</label></p> 
    			<input id="username" name="txtUserName" required tabindex="3" type="text" title="Change User Name">
                 
    			 <p class="contact"><label for="username">Contact Number</label></p> 
    			<input id="username" name="txtMobileNumber" required tabindex="4" type="text" title="Change Contact Number"> 
                
                <p class="contact"><label for="username">Email Address</label></p> 
    			<input id="username" value="<?php echo $row['EmailID']; ?>" name="txtEmail" readonly required tabindex="5" type="text" title="Your Email Address"> 
                <?php
			   }
				?>               
        
               
  			<p class="contact"><label for="username" >Gender</label></p> 
            <select tabindex="7" class="select-style gender" name="txtGender">
           
           <option value="Male">Male</option>
           <option value="Female">Female</option>
            
            </select><br><br>
            
            
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

	if((isset($_POST['txtFirstName'])) and isset($_POST['txtLastName']) and isset($_POST['txtUserName']) and 
	isset($_POST['txtMobileNumber']) and isset($_POST['txtEmail']) and isset($_FILES['file']['name']) and isset($_POST['txtGender']))
	{		
		$firstname=$_POST['txtFirstName'];		
		$lastname=$_POST['txtLastName'];
		$username=$_POST['txtUserName'];
		$contact=$_POST['txtMobileNumber'];
		$Email=$_POST['txtEmail'];	
		$gender=$_POST['txtGender'];
		$filename=$_FILES["file"]["name"];
		$filetype=$_FILES["file"]["type"];
		$filesize=$_FILES["file"]["size"];
		$fileerror=$_FILES["file"]["error"];
		$tempname=$_FILES["file"]["tmp_name"];
		
						   
		
		if ((($filetype == "image/gif") or ($filetype == "image/jpg") or ($filetype == "image/jpeg") or 
		($filetype == "image/pjpeg")) and ($filesize < 100000))
		{
			$username=$_SESSION['login_user'];
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
					 $query="update usermaster set FirstName='{$firstname}',LastName='{$lastname}',ProPic='{$filename}',UserName='{$username}',MobileNumber='{$contact}',
					 EmailID='{$Email}',Gender='{$gender}' where EmailID='{$login_session}'";
				$result= mysql_query($query) or die(mysql_error());
				
				if($result)
						{
					 	 	$_SESSION['user_signup']=$username;																				
							echo "<script>alert('Updated Successfully');</script>";
							header( "refresh:0; url=editprofile.php" );
						}
						else
						{
							echo "<script>alert('Could not update');</script>";
							header( "refresh:0; url=editprofile.php" );	
						}
				}
			}
			}
			else
	  	{
		  echo "<b><center>";
	   echo "Invalid file Type ::<br> file type ::".$filetype." <br> file size::: ".$filesize;
	   echo "</center></b>";
		}
	}
	else
	{
		
	}	  
?>