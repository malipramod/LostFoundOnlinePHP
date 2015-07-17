<!DOCTYPE html>
<html>
<head>
<?php
			include('loginvarifier.php');
?>
<title>Lost Something</title>
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
                <a href="found.php" target=""><b>Found</b></a>
                <span class="right">
                    <a href="logout.php">
                        <strong>LogOut(<?php echo $login_session; ?>)</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div>
			<header>
				<h1>Did you Lost Something?</h1>
            </header>       
      <div  class="form">
      <?php      	  
				include('config.php');
				$query="Select *from usermaster where EmailId='{$login_session}'";
				
				$result=mysql_query($query) or die(mysql_error());
				
				while($row=mysql_fetch_array($result))
				{
					
			?>
    		<form id="contactform" method="post" action="" enctype="multipart/form-data"> 
    			<p class="contact"><label for="name">Product Name</label></p> 
    			<input id="name" name="txtProduct" placeholder="Lost Thing" required tabindex="1" type="text" title="Lost thing"> 
    			 
    			<p class="contact"><label for="email">Image</label></p> 
    			<input type="file" name="file" tabindex="2" required>
                
                <p class="contact"><label for="username">Lost From</label></p> 
    			<input id="username" name="txtLostFrom" placeholder="Where did you Lost?" required tabindex="3" type="text" title="Where did you Found?"> 
    			 <p class="contact"><label for="username">Contact Number</label></p> 
    			<input id="username" name="txtMobileNumber" placeholder="Your Contact Number" required tabindex="4" type="text" title="Provide Your Contact Number"> 
                <p class="contact"><label for="username">Email Address</label></p> 
    			<input id="username" name="txtEmail" value="<?php echo $row['EmailID']; ?>" placeholder="Your Email Address" readonly required tabindex="5" type="text" title="Your Email Address"> 
                  <?php
			   }
				?>
                <p class="contact"><label for="username">Person Name</label></p> 
    			<input id="username" name="txtPersonName" placeholder="The Person Who have Lost" required tabindex="6" type="text" title="The Person Who have found?">  
        
               
  			<p class="contact"><label for="username">Category</label></p> 
            <select tabindex="7" class="select-style gender" name="txtCategory">
            <?php
							include('config.php');
							$query="select *from categorymaster ORDER BY CategoryName ASC";
							$result=mysql_query($query);
							while($row=mysql_fetch_array($result,MYSQL_ASSOC))
							{
								echo "<option value='".$row['CategoryName']."'>".$row['CategoryName']."</option>";	
							}
			?>
           
            
            </select><br><br>
            
            
            <input class="buttom" name="submit" id="submit" tabindex="8" value="Add Lost" type="submit"> 	 
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
	
	if((isset($_POST['txtProduct'])) and isset($_POST['txtCategory']) and isset($_POST['txtLostFrom']) and 
	isset($_POST['txtPersonName']) and isset($_POST['txtMobileNumber']) and isset($_POST['txtEmail']) and 
	isset($_FILES["file"]["name"]))
	{
		
		echo "hi";
		$product=$_POST['txtProduct'];
		$cat=$_POST['txtCategory'];
		$lostFrom=$_POST['txtLostFrom'];
		$person=$_POST['txtPersonName'];
		$contact=$_POST['txtMobileNumber'];
		$Email=$_POST['txtEmail'];	
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
					 $query="insert into lostmaster(ProductName,Category,Image,LostFrom,ContactNumber,EmailAdd,PersonName)
				values('{$product}','{$cat}','{$filename}','{$lostFrom}','{$contact}','{$Email}','{$person}')";
				$result= mysql_query($query) or die(mysql_error());
				
				if($result)
						{
							echo "<script>alert('Added Successfully');</script>";							
					 	 	$_SESSION['user_signup']=$username;																				
						 	header( "refresh:0; url=found.php" );	
						}
						else
						{
							echo "<script>alert('Could Not Add');</script>";												 	 																				
						 	header( "refresh:0; url=found.php" );	
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
		echo "Some Values are Missing";
	}	  
?>