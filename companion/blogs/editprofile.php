<?php
include "../database.php";
session_start();
if($_SESSION["useremail"]=="")
{
header("location:../login_register/index.php");	
}
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Profile</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php
				  $email=$_SESSION["useremail"];
                $result=mysqli_query($arif,"select * from register where email='$email'");
				$resultset=mysqli_fetch_assoc($result);
				$name=$resultset["name"];
				
				?>
                <a class="navbar-brand" href="../profile/myprofile.php"><?php echo $name;  ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../profile/myprofile.php">Home</a>
                    </li>
                    <li>
                        <a href="#About">About</a>
                    </li>
                    <li>
                        <a href="#location">Location</a>
                    </li>
                    <li>
                        <a href="#change">Change Password</a>
                    </li>
                    
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image:url(img/about-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1>Edit Profile</h1>
                        <hr class="small">
                        <span class="subheading">Update Your Profile</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <h1 id="About">About And DP</h1>
                <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                <form  method="post" novalidate enctype="multipart/form-data">
                    
                    
                    
                    
                    
                    
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label> Profile pic</label>
                            <input type="file" name="pic" class="form-control" placeholder="pic" id="name"  >
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    
                    
                    
                    
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>About</label>
                            <textarea name="upost" rows="5" class="form-control" required placeholder="About" id="message"  data-validation-required-message="Enter About"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" name="btnpost" class="btn btn-default">Post</button>
                        </div>
                    </div>
                </form>
                <?php
                                if(isset($_POST["btnpost"]))
{ #btn if
									$source=$_FILES["pic"]["tmp_name"];
	$destination="uploads/".$_FILES["pic"]["name"];
	$size =$_FILES["pic"]["size"];
	$type=$_FILES["pic"]["type"];
	
	if($_FILES["pic"]["type"]=="image/png" || $_FILES["pic"]["type"]=="image/jpeg" || $_FILES["pic"]["type"]=="image/jpg")
	
	
	{ #type if
	
	if($size > 1000000){
		//echo "<span style='color:red;'>file too large.Upload size is restricted to</span><br>";
		echo "<span style='color:red;'>File Size Exceed!!</span>";
		$totalsize=$size/1024;
		$size=$totalsize/1024;
		$totalsize=substr($size, 0,4);
		echo "<br/>File Size : ".$totalsize."MB";
		
		}
		else
		{ #size if
	
	move_uploaded_file($source,$destination);
	
	$about=htmlentities($_POST["upost"]);
	$email=$_SESSION["useremail"];
	$result=mysqli_query($arif,"select * from profile where email='$email'");
	if(mysqli_num_rows($result) > 0)
			{ #row if
	mysqli_query($arif,"update profile set profilepic='$destination', about='$about', email='$email' where email='$email'");
	echo "<script>alert('Profile Updated Sucessfully')</script>";	
			}#row if close
	else		{ #else row
	mysqli_query($arif,"insert into profile ( profilepic, about,email) values ('$destination','$about','$email')");
	echo "<script>alert('Success')</script>";
				} #else row close
		} #size if close
	
	
	
	
	
	 #size else close
			
			
			
			
			
	} #type if close
	else
	{ #type else
		echo "<span style='color:red;'>File Not Supported..!!</span>";
	} #type else close
									
								} #btn if close
								
								?>
            </div>
        </div>
    </div>

    <hr>
    
    
    
    
    
    
    
    
    
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <h1 id="location">Location</h1>
                <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                <form  method="post" novalidate >
                    
                    
                    
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>My Location</label>
                            <textarea name="uloc" rows="5" class="form-control" placeholder="Location" id="message"  data-validation-required-message="Enter Location"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    
                    
                    
                    
                    
                    
                    
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Town Or District</label>
                            <textarea name="utown" rows="5" class="form-control" placeholder="Town Or District" id="message"  data-validation-required-message="Enter Town Or District"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" name="loc" class="btn btn-default">Update</button>
                        </div>
                    </div>
                </form>
                <?php
               if(isset($_POST["loc"]))
			   {
				   $loc=htmlentities($_POST["uloc"]);
				   $town=htmlentities($_POST["utown"]);
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
            </div>
        </div>
    </div>
    
    
    
    
   
   
   
   
   <hr>
    
    
    
    
    
    
    
    
    
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <h1 id="change">Change Password</h1>
                <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                <form  method="post" novalidate >
                    
                    
                    
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Password</label>
                            <input name="pass" type="password" required placeholder="password" class="form-control" data-validation-required-message="Enter New Password" /><br>
                            <input name="cpass" type="password" required placeholder=" Confirm password" class="form-control" data-validation-required-message="Confirm Password" /><br>
                            
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    
                    
                    
                    
                    
                    
                    
                    
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" name="btnpass" class="btn btn-default">Update</button>
                        </div>
                    </div>
                </form>
                <?php
               if(isset($_POST["btnpass"]))
			   {
				  $pass=htmlentities($_POST["pass"]);
				  $cpass=htmlentities($_POST["cpass"]);
				if(strlen($pass) >= 13 || strlen($cpass) >= 13)
				{
				echo "<span style='color:red;'>Password Cannot Be Greater Than 12 Characters</span>";	
				}
				elseif(strlen($pass) <= 7 || strlen($cpass) <= 7)
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
			   
			   ?>
            </div>
        </div>
    </div>
   
    
    
    
    
    
    
    
    
    
    
    
    
    

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; <span style="color:#03C;">Companion</span> Developed By <a href="../profile/Mohammad_arif.php">Mohammad Arif</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>

</body>

</html>
