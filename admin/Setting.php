<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <?php
			include('loginvarifier.php');
		?>
        <?php
				include('config.php');
				$query="Select *from querymaster where flag=1";
				$result=mysql_query($query) or die(mysql_error());
				$count=0;
				while($row=mysql_fetch_array($result,MYSQL_ASSOC))
				{
					$count++;
				
				}
			?>
		<title>Settings</title>
       
        <!-- CSS Reset -->
		<link rel="stylesheet" type="text/css" href="css/reset.css" tppabs="http://www.xooom.pl/work/magicadmin/css/reset.css" media="screen" />
       
        <!-- Fluid 960 Grid System - CSS framework -->
		<link rel="stylesheet" type="text/css" href="css/grid.css" tppabs="http://www.xooom.pl/work/magicadmin/css/grid.css" media="screen" />
		
       
        
        <!-- Main stylesheet -->
        <link rel="stylesheet" type="text/css" href="css/styles.css" tppabs="http://www.xooom.pl/work/magicadmin/css/styles.css" media="screen" />
        
        
        
        <!-- Table sorter stylesheet -->
        <link rel="stylesheet" type="text/css" href="css/tablesorter.css" tppabs="http://www.xooom.pl/work/magicadmin/css/tablesorter.css" media="screen" />
        
        <!-- Thickbox stylesheet -->
        <link rel="stylesheet" type="text/css" href="css/thickbox.css" tppabs="http://www.xooom.pl/work/magicadmin/css/thickbox.css" media="screen" />
        
        <!-- Themes. Below are several color themes. Uncomment the line of your choice to switch to different color. All styles commented out means blue theme. -->
        <link rel="stylesheet" type="text/css" href="css/theme-blue.css" tppabs="http://www.xooom.pl/work/magicadmin/css/theme-blue.css" media="screen" />
       
        
		<!-- JQuery engine script-->
		<script type="text/javascript" src="jquery/jquery-1.3.2.min.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery-1.3.2.min.js"></script>
        
		<!-- JQuery WYSIWYG plugin script -->
		<script type="text/javascript" src="jquery/jquery.wysiwyg.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.wysiwyg.js"></script>
        
        <!-- JQuery tablesorter plugin script-->
		<script type="text/javascript" src="jquery/jquery.tablesorter.min.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.tablesorter.min.js"></script>
        
		<!-- JQuery pager plugin script for tablesorter tables -->
		<script type="text/javascript" src="jquery/jquery.tablesorter.pager.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.tablesorter.pager.js"></script>
        
		<!-- JQuery password strength plugin script -->
		<script type="text/javascript" src="jquery/jquery.pstrength-min.1.2.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.pstrength-min.1.2.js"></script>
        
		<!-- JQuery thickbox plugin script -->
		<script type="text/javascript" src="jquery/thickbox.js" tppabs="http://www.xooom.pl/work/magicadmin/js/thickbox.js"></script>
        
        <!-- Initiate tablesorter script -->
        <script type="text/javascript">
			$(document).ready(function() { 
				$("#myTable") 
				.tablesorter({
					// zebra coloring
					widgets: ['zebra'],
					// pass the headers argument and assing a object 
					headers: { 
						// assign the sixth column (we start counting zero) 
						6: { 
							// disable it by setting the property sorter to false 
							sorter: false 
						} 
					}
				}) 
			.tablesorterPager({container: $("#pager")}); 
		}); 
		</script>
        
       
	</head>
	<body>
    	<!-- Header -->
        <div id="header">
            <!-- Header. Status part -->
            <div id="header-status">
                <div class="container_12">
                    <div class="grid_8">
					&nbsp;
                    </div>
                    <div class="grid_4">
                        <a href="logout.php" id="logout">
                        Logout
                        </a>
                    </div>
                </div>
                <div style="clear:both;"></div>
            </div> <!-- End #header-status -->
            
            <!-- Header. Main part -->
            <div id="header-main">
                <div class="container_12">
                    <div class="grid_12">
                        <div id="logo">
                            <ul id="nav">
                                 <li  title="View Your Dashboad"><a href="admin.php">Dashboard</a></li>  
                                 <li><a href="lost.php" title="Lost Something?">Lost</a></li>
                                <li><a href="found.php" title="Found Something?">Found</a></li> 
                                <li><a href="messages.php" title="You Might Have Some Messages">Messages(<?php echo $count; ?>)</a></li>
                                <li><a href="notifications.php" title="Notifications Might Be Pending">Notification(10)</a></li>
                                <li ><a href="myprofile.php" title="View Or Change Your Profile Settings">My Profile</a></li>
                                <li id="current"><a href="Setting.php" title="Add or Remove Some Settings">Settings</a></li>
                                <li><a href="csc.php" title="View Remove or Edit Cities, States and Countries">City State Country</a></li>
                            </ul>
                        </div><!-- End. #Logo -->
                    </div><!-- End. .grid_12-->
                    <div style="clear: both;"></div>
                </div><!-- End. .container_12 -->
            </div> <!-- End #header-main -->
            <div style="clear: both;"></div>
            <!-- Sub navigation -->
            
        </div> <!-- End #header -->
        
		<div class="container_12">
        

            
            <!-- Dashboard icons -->
            <div class="grid_7">
            	
   				<a href="found.php" class="dashboard-module">
                	<img src="images/Crystal_Clear_write.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_write.gif" width="64" height="64" alt="edit" />
                	<span>Found Something?</span>
                </a>
                <a href="lost.php" class="dashboard-module">
                	<img src="images/Crystal_Clear_write.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_write.gif" width="64" height="64" alt="edit" />
                	<span>Lost Something?</span>
                </a>
                <a href="" class="dashboard-module">
                	<img src="images/Crystal_Clear_calendar.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_calendar.gif" width="64" height="64" alt="edit" />
                	<span>Calendar</span>
                </a>
                
                <a href="myprofile.php" class="dashboard-module">
                	<img src="images/Crystal_Clear_user.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_user.gif" width="64" height="64" alt="edit" />
                	<span>My profile</span>
                </a>
                
                <a href="admin.php" class="dashboard-module">
                	<img src="images/Crystal_Clear_stats.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_stats.gif" width="64" height="64" alt="edit" />
                	<span>Dashboad</span>
                </a>
                
                
                <div style="clear: both"></div>
            </div> <!-- End .grid_7 -->
            
            <!-- Account overview -->
            <div class="grid_5">
                <div class="module">
                        <h2><span>Account overview</span></h2>
                        
                        <div class="module-body">
                        
                        	<p>
                                <strong>User's Email: </strong><?php echo $login_session; ?><br />
                                <strong>Your last visit was on: </strong>20 January 2010,<br />
                                <strong>From IP: </strong><?php echo $_SERVER['REMOTE_ADDR']; ?>
                            </p>                        
                        </div>
                </div>
                <div style="clear:both;"></div>
            </div> <!-- End .grid_5 -->
            
           
                

                
			
            <!-- Categories list -->
            <div class="grid_6">
                
                <div class="module">
                     <h2><span> Add/Remove Categories</span></h2>
                        
                     <div class="module-body">
                     <?php
					 	include('config.php');
							$query="select *from categorymaster";
							$result=mysql_query($query);
							$rem="removable";
							while($row=mysql_fetch_array($result,MYSQL_ASSOC))
							{								
					?>
                    	 <a href="deletemessages.php?cat=<?php echo $row['CategoryID']; ?>" class="removable" id="<?php echo $row['CategoryID']; ?>"><?php echo $row['CategoryName'] ; ?></a><br />
                    <?php			
							}
					 ?>
  
                         <form action="addcategory.php" method="post">
                            <fieldset>
                                <input type="text" required="required" class="input-medium" name="txtCategory" />&nbsp;&nbsp;<input class="submit-green" type="submit" value="Add category" />
                            </fieldset>
                         </form>
                     </div>
                </div> <!-- module -->
                <div style="clear:both;"></div>
			</div> <!-- End .grid_6 -->
            
           	
           <div class="grid_6">
                
                <div class="module">
                     <h2><span>Add New Country</span></h2>
                        
                     <div class="module-body">                                                 
                         <form action="addCountry.php" method="post">
                            <fieldset>
                            <table>
                            <tr><td style="width:20%">Country Name</td><td><input type="text" class="input-medium" name="txtCountryName" required="required" /></td></tr>
							<tr><td>Country Code</td><td><input type="text" class="input-medium" name="txtCountryCode" required="required" /></td></tr>
							<tr><td></td><td><input class="submit-green" type="submit" value="Add Country" name="txtCountry" /></td></tr>                                
								
                                </table>
                            </fieldset>
                         </form>
                     </div>
                </div> <!-- module -->
                <div style="clear:both;"></div>
			</div> <!-- End .grid_6 -->
                
           <div class="grid_6">
                
                <div class="module">
                     <h2><span>Add New State</span></h2>
                        
                     <div class="module-body"> 
                     <form action="addCSC.php" method="post">
                        Select Country:&nbsp;&nbsp; <select class="pagesize input-short align-left" name="opnCountry">
                        	<?php
							include('config.php');
							$query="select *from countrymaster Order by CountryName ASC";
							$result=mysql_query($query);
							while($row=mysql_fetch_array($result,MYSQL_ASSOC))
							{
								echo "<option value='".$row['CountryName']."'>".$row['CountryName']."</option>";	
							}
						?>
                        </select>
                            <fieldset>
                                <input type="text" required="required" class="input-medium" name="txtState" />&nbsp;&nbsp;
                                <input class="submit-green" type="submit" value="Add State" name="btnState" />
                            </fieldset>
                         </form>
                         
                     </div>
                </div> <!-- module -->
                <div style="clear:both;"></div>
			</div> <!-- End .grid_6 -->
            
            
            <div class="grid_6">
                
                <div class="module">
                     <h2><span>Add New City</span></h2>
                        
                     <div class="module-body">                                                 
                         <form action="addCSC.php" method="post">
                         <table >
                         	<tr>
                            <td style="width:20%">Select Country</td>
                            <td style="width:0%"><select class="pagesize input-short align-left" name="opnCountry">
                            	<?php
										include('config.php');
										$query="select *from countrymaster Order by CountryName ASC";
										$result=mysql_query($query);
										while($row=mysql_fetch_array($result,MYSQL_ASSOC))
										{
											echo "<option value='".$row['CountryName']."'>".$row['CountryName']."</option>";	
										}
									?>
                            </select><br /></td>
                            </tr>
                            <tr>
                            <td style="width:20%">Select State</td>
                            <td style="width:0%"><select class="pagesize input-short align-left" name="opnState">
                            	<?php
										include('config.php');
										$query="select *from statemaster Order by StateName ASC";
										$result=mysql_query($query);
										while($row=mysql_fetch_array($result,MYSQL_ASSOC))
										{
											echo "<option value='".$row['StateName']."'>".$row['StateName']."</option>";	
										}
									?>
                            </select><br /></td>
                            </tr>
                         </table>
    
                            <fieldset>
                                <input type="text" required="required" class="input-medium" name="txtCity" />&nbsp;&nbsp;<input class="submit-green" type="submit" value="Add City" />
                            </fieldset>
                         </form>
                     </div>
                </div> <!-- module -->
                <div style="clear:both;"></div>
			</div> <!-- End .grid_6 -->
                
                
            
                </div> <!-- End .module -->
                <div style="clear:both;"></div>
            </div> <!-- End .grid_6 -->
            <div style="clear:both;"></div>
            
			
            
            
            
            <!-- End .grid_6 -->

            
            <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
		
           
        <!-- Footer -->
        <div id="footer">
        	<div class="container_12">
            	<div class="grid_12">
                	
                	<p>&copy; 2014. <a href="https://www.facebook.com/i.m.pramod.mali" title="Visit to official Profile">Pramod Mali</a> and <a href="https://www.facebook.com/i.m.pramod.mali" title="Visit to official Profile"> Keyur Maru</a>	</p>
        		</div>
            </div>
            <div style="clear:both;"></div>
        </div> <!-- End #footer -->
	</body>
</html>

