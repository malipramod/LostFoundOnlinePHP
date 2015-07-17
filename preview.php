
<!DOCTYPE HTML>
<head>
<?php
			include('loginvarifier.php');
?>
<title>Recent Lost And Founds</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style4.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
<link href="css/easy-responsive-tabs.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="css/global.css">
<script src="js/slides.min.jquery.js"></script>
<script>
		$(function(){
			$('#products').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				effect: 'slide, fade',
				crossfade: true,
				slideSpeed: 350,
				fadeSpeed: 500,
				generateNextPrev: true,
				generatePagination: false
			});
		});
	</script>
</head>
<body>
  <div class="wrap">
	<div class="header">
		<div class="headertop_desc">
			<div class="call">
				 
			</div>
			<div class="account_desc">
				<ul>
					<li></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="header_top">
			<div class="logo">
				<a href="index.html"><img src="images/logo.png" alt="" /></a>
			</div>
			  <div class="cart">
			  	   <p><div id="dd" class="">
			  	   	<ul class="dropdown">
							<li></li>
					</ul></div></p>
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
			    	<li><a href="home.php">Home</a></li>
			    	<li><a href="index.php">Back To Items</a></li>
			    	<div class="clear"></div>
     			</ul>
	     	</div>
	     	<div class="search_box">
	     		
	     	</div>
	     	<div class="clear"></div>
	     </div>	     	
   </div>
 <div class="main">
    <div class="content">
    	
    	</div>
    	<div class="section group">
        <?php	
			include('config.php');
					if (isset($_GET["id"])) 
					{
						$id = (int)$_GET["id"];
						
						$query="Select *from foundmaster where FoundID='{$id}'";
						$result=mysql_query($query) or die(mysql_error());
						$imgdir = "uploads/";
				
				
						while($row=mysql_fetch_array($result,MYSQL_ASSOC))
						{
							$tempname = $row['Image'];
							$imagename=$imgdir."".$tempname;
				
						
					?>
				<div class="cont-desc span_1_of_2">
				  <div class="product-details">				
					<div class="grid images_3_of_2">
						<div id="container">
						   <div id="products_example">
							   <div id="products">
								<div class="slides_container">
									<a href="" target="_blank"><img src="<?php echo $imagename; ?>" alt=" " width="350" 
                                    height="350" /></a>
									
								</div>
								<ul class="pagination">
									
								</ul>
							</div>
						</div>
					</div>
				</div>
                
				<div class="desc span_3_of_2">
					<h2><?php echo $row['ProductName']; ?> </h2>
					<p>Category:<?php echo $row['Category']; ?></p>
                    <p>Found From:<?php echo $row['FoundFrom']; ?></p>
                    <p>Contact:<?php echo $row['ContactNumber']; ?></p>
                    <p>Email Address:<span><?php echo $row['EmailAdd']; ?></span></p>						
					<div class="price">
						<p>Found By: <span><?php echo $row['PersonName']; ?></span></p>
					</div>
                   
					<div class="available">
						<p></p>
					<ul>
						
					</ul>
					</div>
				<div class="share-desc">
					<div class="share">
						
						<ul>
					    						    
			    		</ul>
					</div>
					<div class="button"><span><a href="">Ask For Item</a></span></div>					
					<div class="clear"></div>
				</div>
				 <div class="wish-list">
				 	<ul>
				 		
				 	</ul>
				 </div>
			</div>
			<div class="clear"></div>
		  </div>
		<div class="product_desc">	
							</div>

				 <div class="product-tags">
						 
					
					</div>
					
			    </div>	

				<div class="review">
					
				  	 </div>				
				</div>
			</div>
		 </div>
          
                    <?php 
						}
					}
				?>
	 </div>
	    <script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });
    });
   </script>		
   <div class="content_bottom">
    		<div class="heading">
    		
    		</div>
    		<div class="see">
    			
    		</div>
    		<div class="clear"></div>
    	</div>
   <div class="section group">
				
 		
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


<?php
					if (isset($_GET["id"])) 
					{
						include('config.php');
						$id = (int)$_GET["id"];
						
						$query="Select *from foundmaster where FoundID='{$id}'";
						$result=mysql_query($query) or die(mysql_error());
						
						$row=mysql_fetch_array($result,MYSQL_ASSOC);
						$to=$row['EmailAdd'];
						$from=$login_session;
						$subject="Asked For Item : ".$row['ProductName'];
						$message=$from." has asked for the item you have uploaded. Please Respond ".$to." by Email :".$to." or By Mobile Number: ".$row['ContactNumber'];
						mail($to,$subject,$message);
						
					}
						
?>
