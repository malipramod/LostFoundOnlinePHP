
<!DOCTYPE HTML>
<head>
<?php
			//include('loginvarifier.php');
			
?>
<title>Recent Lost And Founds</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style4.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/startstop-slider.js"></script>
</head>
<body>
  <div class="wrap">
	<div class="header">
		<div class="headertop_desc">
			<div class="call">
				
			</div>
			<div class="account_desc">
				<ul>
					<li>
					</li>
					
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="header_top">
			<div class="logo">
				<a href="home.php"><img src="images/logo.png" alt="" /></a>
			</div>
			  
			  <script type="text/javascript">
			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-2').removeClass('active');
				});

			});

		</script>
	 <div class="clear"></div>
  </div>
	<div class="header_bottom">
	     	<div class="menu">
	     		<ul>
			    	<li class="active"><a href="home.php">Home</a></li>
			    	
			    	<div class="clear"></div>
     			</ul>
	     	</div>
	     	<div class="search_box">
	     		
	     	</div>
	     	<div class="clear"></div>
	     </div>	     
	<div class="header_slide">
			<div class="header_bottom_left">				
				<div class="categories">
				  <ul>
				  	<h3>Categories</h3>
                    <?php
						include('config.php');
						$query="Select *From categorymaster";
						$result=mysql_query($query) or die(mysql_error());
						
					while($row=mysql_fetch_array($result,MYSQL_ASSOC))
					{
					?>
				      <li><a href="deletemessages.php?cat=<?php echo $row['CategoryID']; ?>"><?php echo $row['CategoryName'] ; ?></a></li>
				      
					   <?php
					   }
					   ?>
				  </ul>
				</div>					
	  	     </div>
					 <div class="header_bottom_right">					 
					 	 <div class="slider">					     
							 <div id="slider">
			                    <div id="mover">
			                    	<div id="slide-1" class="slide">	
                                    		                
									 <div class="slider-img">
                                    
									    <img src="images/slide-1-image.png" alt="learn more" />								    
									  </div>
						             	<div class="slider-text">
		                                 <h2><br><span>Gallary</span></h2>
		                                 <h3></h3>
									   <div class="features_list">
									   	<h4><a href="home.php">Return to Home</a></h4>							               						
							            </div>
                                      
							             
                                         
					                   </div>			               
									  <div class="clear"></div>				
				                  </div>	
                               
						             	<div class="slide">
						             		<div class="slider-text">
		                                 <h2><br><span>Gallary</span></h2>
		                                 <h3></h3>
									   <div class="features_list">
									   	<h4><a href="home.php">Return to Home</a></h4>							               						
							            </div>
							             
					                   </div>		
						             	 <div class="slider-img">
									     <img src="images/slide-3-image.jpg" alt="learn more" />
									  </div>						             					                 
									  <div class="clear"></div>				
				                  </div>
				                  <div class="slide">						             	
					                  <div class="slider-img">
									    <img src="images/slide-2-image.jpg" alt="learn more" />
									  </div>
									  <div class="slider-text">
		                                 <div class="slider-text">
		                                 <h2><br><span>Gallary</span></h2>
		                                 <h3></h3>
									   <div class="features_list">
									   	<h4><a href="home.php">Return to Home</a></h4>							               						
							            </div>
							            
					                   </div>	
									  <div class="clear"></div>				
				                  </div>												
			                 </div>		
		                </div>
					 <div class="clear"></div>					       
		         </div>
		      </div>
		   <div class="clear"></div>
		</div>
   </div>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Lost and Founds</h3>
    		</div>
    		<div class="see">
    		
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
           <?php
				include('config.php');
				$query="Select *from foundmaster";
				$result=mysql_query($query) or die(mysql_error());
				
				$imgdir = "uploads/";
				
				
				while($row=mysql_fetch_array($result,MYSQL_ASSOC))
				{
					$tempname = $row['Image'];
					$imagename=$imgdir."".$tempname;
					
			?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?id=<?php echo $row['FoundID']; ?>">
                     <img src="<?php echo $imagename; ?>" alt="" width="200" height="200" /></a>
					 <h2><?php echo $row['ProductName']; ?></h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees"><?php $row['Category']; ?></span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="preview.php?id=<?php echo $row['FoundID']; ?>">View Details</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
					 
				</div>
                <?php
				}
				?>
			</div>
			
    		</div>
    		<div class="clear"></div>
    	</div>
			
				
				
				
    </div>
 </div>
</div>
   <div class="footer">
   	  <div class="wrap">	
	     <div class="section group">
				
				
				
				<div class="col_1_of_4 span_1_of_4">
					
						<div class="social-icons">
							<h4>Follow Us</h4>
					   		  <ul>
							      <li><a href="https://www.facebook.com/i.m.pramod.mali" target="_blank"><img src="images/facebook.png" alt="" /></a></li>
							      
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>			
        </div>
        <div class="copy_right">
				<p>© All rights Reseverd | <a href="http://www.ddu.ac.in">DDU NADIAD</a> </p>
		   </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>

