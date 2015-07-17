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
                <a href="changepass.php" target=""><b>Change Password</b></a>
                <a href="editprofile.php" target=""><b>Edit Profile</b></a>
               
                
                <span class="right">
                    <a href="logout.php">
                        <strong>LogOut(<?php echo $login_session; ?>)</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div>
           
			<header>
				<h1>Delete Records?</h1>
            </header>       
      <div  >
    		  
				
                
            	<?php
					if(!isset($_SESSION))
					{
						session_start();	
					}
					include('config.php');
					$query="Select *from foundmaster where EmailAdd='{$login_session}'";
					$result=mysql_query($query) or die(mysql_error());
					while($row=mysql_fetch_array($result))
					{
						
						?>
                        <center><a href="delete.php?id="<?php echo $row['FoundID']; ?><?php echo $row['ProductName']; ?></a></center>
						
                        <?php
					}
				?>	
</div>      
</div>

</body>
</html>



