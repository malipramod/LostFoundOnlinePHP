<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Admin Login</title>
  <link rel="stylesheet" href="css/stylelogin.css">
  
</head>
<body>
  <form method="post" action="" class="login">
    <p>
      <label for="login">Email:</label>
      <input type="text" name="txtEmail" id="login" title="Email Address" required="required" >
    </p>

    <p>
      <label for="password">Password:</label>
      <input type="password" name="txtPassword" id="password" title="Password" required="required" >
    </p>

    <p class="login-submit">
      <button type="submit" class="login-button" title="LogIn">Login</button>
    </p>

    <p class="forgot-password"><a href="index.php">Forgot your password?</a></p>
  </form>

</body>
</html>
<?php
	session_start();
	include('config.php');
	
	if(isset($_POST['txtEmail']) and isset($_POST['txtPassword']))
	{
		
		$username=addslashes($_POST['txtEmail']);
		$password=addslashes($_POST['txtPassword']);
		$query="SELECT * FROM adminmaster WHERE EmailID='$username' and password='$password'";
		$result=mysql_query($query)  or die(mysql_error());
		$row=mysql_fetch_array($result);
		
		$count=mysql_num_rows($result);
		
		if($count==1)
			{				
				$_SESSION['login_user']=$username;			
				header("location: admin.php");
			}
			else
			{
				echo "<script>alert('Email Address or Password is wrong!');</script>";
			}
		}
?>
