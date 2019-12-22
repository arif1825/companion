<?php
include "../database.php";
session_start();
if($_SESSION["useremail"]=="")
{
header("location:../login_register/index.php");	
}
?>
<html>
<head>
<title>Edit Profile</title>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Profile Login Widget Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<link href='//fonts.googleapis.com/css?family=Josefin+Slab:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Carter+One' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery-1.11.1.min.js"></script> 
<!-- //js -->
<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion           
				width: 'auto', //auto or any width like 600px
				fit: true   // 100% fit in a container
			});
		});
	   </script>
</head>
<body>
<div class="content">
<?php
				  $email=$_SESSION["useremail"];
                $result=mysqli_query($arif,"select * from register where email='$email'");
				$resultset=mysqli_fetch_assoc($result);
				$name=$resultset["name"];
				
				?>
	<h1><?php echo $name; ?></h1>
	<div class="main">
			<div style=" margin-left:200px;" class="profile-left ">
				<div class="sap_tabs">
				<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
					<ul class="resp-tabs-list">
						<li style="width:364px;" class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Edit Profile</span></li>
						
						<div class="clear"> </div>
					</ul>				  	 
					<div class="resp-tabs-container">
						
						<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
							<div class="login-top sign-top">
								<form method="post" enctype="multipart/form-data">
									
									<textarea class="form-control" name="about" required placeholder="About..." style="max-height:200px; max-width:300px; min-width:300px;
                                    min-height:100px; color:#06F; font-size:20px;"></textarea>
                                    
									<br><br>
                                    <input class="form-control" required type="file" name="profilepic"/>
                                    <br><br><br>		
									
                                    <input id="fbtn" name="update" type="submit" value="Send"/>
									
								</form>
                                <?php
                                if(isset($_POST["update"]))
								{
									$source=$_FILES["profilepic"]["tmp_name"];
	$destination="uploads/".$_FILES["profilepic"]["name"];
	move_uploaded_file($source,$destination);
	
	$about=$_POST["about"];
	$email=$_SESSION["useremail"];
	$result=mysqli_query($arif,"select * from profile where email='$email'");
	if(mysqli_num_rows($result) > 0)
	{
	mysqli_query($arif,"update profile set profilepic='$destination', about='$about', email='$email' where email='$email'");
	echo "<script>alert('Profile Updated Sucessfully')</script>";	
	}
	else{
	mysqli_query($arif,"insert into profile ( profilepic, about,email) values ('$destination','$about','$email')");
	echo "<script>alert('Success')</script>";
	}
									
								}
								
								?>
                                
              <form method="post">
              <input name="uloc" type="text" class="email" placeholder="My Location" required/>
              <input name="utown" type="text" class="email" placeholder="Town Or District Or state" required/>
              <input id="fbtn" name="loc" type="submit" value="Update"/>
              
              </form>
               <?php
               if(isset($_POST["loc"]))
			   {
				   $loc=$_POST["uloc"];
				   $town=$_POST["utown"];
				   $result=mysqli_query($arif,"select * from location where email='$email'");
				   if(mysqli_num_rows($result) > 0)
				   {
					  mysqli_query($arif,"update location set location='$loc',town='$town',date=NOW() where email='$email'");
					  echo "<script>alert('Location Updated')</script>"; 
					}
					else
					{
						mysqli_query($arif,"insert into location (email,location,town,date) values ('$email', '$loc','$town',NOW())");
						echo "<script>alert('Location Added')</script>";	
					}
				   
				}
			   
			   ?>
               <br><br> 
               <hr>
               <h2>Change Password</h2>
               <form method="post">
              <input name="pass" type="text" class="email" placeholder=" Enter New Password" required/>
              <input name="cpass" type="text" class="email" placeholder="Confirm Password" required/>
              <input id="fbtn" name="btnpass" type="submit" value="Update"/>
              
              </form>                
               <?php
               if(isset($_POST["btnpass"]))
			   {
				$pass=$_POST["pass"];
				$cpass=$_POST["cpass"];
				if(strlen($pass) > 12 || strlen($cpass) > 12)
				{
				echo "<span style='color:red;'>Password Cannot Be Greater Than 12 Characters</span>";	
				}
				elseif(strlen($pass) < 8 || strlen($cpass) < 8)
				{
				echo "<span style='color:red;'>Password Cannot Be Less Than 8 Characters</span>";	
				}
				elseif($pass==$cpass)
				{
					mysqli_query($arif,"update register set password='$cpass' where email='$email'");
					echo "<span style='color:green;'>Password Changed Sucessfully</span>";
				}
				else
				{
				echo "<span style='color:red;'>Password Does Not Match</span>";	
				}   
				}
			   
			   ?>          <br><br>       
                           <a href="profile.php">Back</a>     
                               
								<div class="login-bottom">
									<ul>
										
										<li>
											
                                            
										</li>
									<ul>
									<div class="clear"></div>
								</div>	
							</div>
						</div>
						<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
							<div class="login-top">
								<form>
									<input type="text" class="email" placeholder="Email" required/>
									<input type="password" class="password" placeholder="Password" required/>	
									<input type="checkbox" id="brand" value="">
									<label for="brand"><span></span> Remember me?</label>
								</form>
								<div class="login-bottom">
									<ul>
										<li>
											<a href="forgot.php">Forgot password?</a>
										</li>
										<li>
											<form>
												<input type="submit" value="LOGIN"/>
											</form>
										</li>
									<ul>
									<div class="clear"></div>
								</div>	
							</div>
						</div>
					</div>	
				</div>
				<div class="clear"> </div>
				
			</div>
			
			</div>
			<div class="profile-middle">
				
			
			<div class="clear"> </div>
		
	</div>
    
</div>

</body>
</html>
