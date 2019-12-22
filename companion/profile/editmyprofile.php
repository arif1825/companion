<?php
include "../database.php";
session_start();
if($_SESSION["useremail"]=="")
{
header("location:../login_register/index.php");	
}
ob_start();
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
						<li style="width:364px;" class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Edit Full Profile</span></li>
						
						<div class="clear"> </div>
					</ul>				  	 
					<div class="resp-tabs-container">
						
						<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
							<div class="login-top sign-top">
								
              <?php
			  $email=$_SESSION["useremail"];
              $result1=mysqli_query($arif,"select * from myprofile where email='$email'");
			  if(mysqli_num_rows($result1) > 0)
			  {
			  $a=mysqli_fetch_assoc($result1);
			  $std=$a["std"];   
				 $work=$a["work"];
				 $hschool=$a["hschool"];
				 $colg=$a["colg"];
				 $htown=$a["htown"];
				 $ccity=$a["ccity"];
				 $fb=$a["fb"]; 
				 $website=$a["website"];
				 $dob=$a["dob"];
				 $gen=$a["gender"];
				 $rlg=$a["religion"];
				 $about=$a["about"];
				 $q=$a["fq"];
				  $phone=$a["phone"];
			  
			  }
			  else
			  {
				  
			  $std="";   
				 $work="";
				 $hschool="";
				 $colg="";
				 $htown="";
				 $ccity="";
				 $fb=""; 
				 $website="";
				 $dob="";
				 $gen="";
				 $rlg="";
				 $about="";
				 $q="";
				  $phone="";
				  
				  
			}
			  ?>                 
                                
              <form method="post">
              <input name="studying" value="<?php echo $std; ?>" type="text" class="email" placeholder="studying"  />
              <input name="work" value="<?php echo $work; ?>" type="text" class="email" placeholder="work"  />
              <input name="hschool" value="<?php echo $hschool; ?>" type="text" class="email" placeholder="High School"  />
              <input name="college" value="<?php echo $colg; ?>" type="text" class="email" placeholder="College"  />
              <input name="htown" value="<?php echo $htown; ?>" type="text" class="email" placeholder="HomeTown"  />
              <input name="ccity" value="<?php echo $ccity; ?>" type="text" class="email" placeholder="Current City"  />
              <input name="phone" value="<?php echo $phone; ?>" type="text" class="email" placeholder="phone"  />
              <input name="facebook" value="<?php echo $fb; ?>" type="text" class="email" placeholder="Facebook Username"  />
              <input name="website" value="<?php echo $website; ?>" type="text" class="email" placeholder="Any Website"  />
              <span>Birthday</span>&nbsp;&nbsp;&nbsp;&nbsp;<input style="width:60%;" name="dob" type="date" class="email" placeholder="work"  /><br><br>
              <input value="<?php echo $gen; ?>" name="gender" type="text" class="email" placeholder="gender"  />
              
              <input value="<?php echo $rlg; ?>" name="Religion" type="text" class="email" placeholder="Religion"  />
              <textarea name="about"  required    placeholder="<?php echo $about; ?>" style="max-height:200px; max-width:300px; min-width:300px;
                                    min-height:100px; color:#06F; font-size:20px;"></textarea>
                                    <textarea required name="fqoute"   placeholder="<?php echo $q; ?>" style="max-height:200px; max-width:300px; min-width:300px;
                                    min-height:100px; color:#06F; font-size:20px;"></textarea>
                                    <br><br>
              <input id="fbtn" name="btnupdate" type="submit" value="Update"/>
              
              </form>
               <?php
               if(isset($_POST["btnupdate"]))
			   {
				   $std=$_POST["studying"];   
				 $work=$_POST["work"];
				 $hschool=$_POST["hschool"];
				 $colg=$_POST["college"];
				 $htown=$_POST["htown"];
				 $ccity=$_POST["ccity"];
				 $fb=$_POST["facebook"]; 
				 $website=$_POST["website"];
				 $dob=$_POST["dob"];
				 $gen=$_POST["gender"];
				 $rlg=$_POST["Religion"];
				 $about=$_POST["about"];
				 $q=$_POST["fqoute"];
				  $phone=$_POST["phone"];
				  $email=$_SESSION["useremail"];
				   $chk=mysqli_query($arif,"select * from myprofile where email='$email'");
				   if(mysqli_num_rows($chk) > 0)
				   {
					   mysqli_query($arif,"update myprofile set email='$email', std='$std',work='$work',
					   hschool='$hschool',colg='$colg',htown='$htown',ccity='$ccity',fb='$fb',dob='$dob',gender='$gen',religion='$rlg',about='$about',fq='$q',website='$website',phone='$phone' where email='$email'");
					   header("location:editmyprofile.php");
					   echo "<script>alert('Profile Updated Sucessfully')</script>";
					   
					   
					}
				else
				{
				 
				  
				  mysqli_query($arif,"insert into myprofile (email,std,work,hschool,colg,htown,ccity,fb,dob,gender,religion,about,fq,website,phone) values ('$email','$std','$work','$hschool','$colg','$htown','$ccity','$fb','$dob','$gen','$rlg','$about','$q','$website','$phone')");
				  header("location:editmyprofile.php");
				  echo "<script>alert('Success')</script>";
				  
				}
				  
				   
				}
			   
			   
			   
			   
			   
			   ?>                 
                                
                           <a href="myprofile.php">Back</a>     
                               
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
									<input type="text" class="email" placeholder="Email"  />
									<input type="password" class="password" placeholder="Password"  />	
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
