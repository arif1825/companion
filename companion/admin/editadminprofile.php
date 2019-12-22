<?php
ob_start();
include "../database.php";
session_start();
if($_SESSION["Admin"]=="")
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
				  $email=$_SESSION["Admin"];
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
                        <a href="Mohammad_arif.php">Home</a>
                    </li>
                    <li>
                        <a href="loc.php">Location | DP</a>
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
                <h1 id="About">Update Your Latest..!!</h1>
                <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                
                <?php
			  $email=$_SESSION["Admin"];
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
                
                
                <form  method="post" novalidate >
                 <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label> Studying</label>
                            <input name="studying" value="<?php echo $std; ?>" type="text" class="form-control" placeholder="studying"  />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label> Work</label>
                            <input name="work" value="<?php echo $work; ?>" type="text" class="form-control" placeholder="work"  />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label> High School</label>
                            <input name="hschool" value="<?php echo $hschool; ?>" type="text" class="form-control" placeholder="High School"  />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label> College</label>
                            <input name="college" value="<?php echo $colg; ?>" type="text" class="form-control" placeholder="College"  />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label> HomeTown</label>
                            <input name="htown" value="<?php echo $htown; ?>" type="text" class="form-control" placeholder="HomeTown"  />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label> Current City</label>
                            <input name="ccity" value="<?php echo $ccity; ?>" type="text" class="form-control" placeholder="Current City"  />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label> phone</label>
                            <input name="phone" value="<?php echo $phone; ?>" type="text" class="form-control" placeholder="phone"  />
              
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label> Facebook Username</label>
                            <input name="facebook" value="<?php echo $fb; ?>" type="text" class="form-control" placeholder="Facebook Username"  />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label> Any Website</label>
                            <input name="website" value="<?php echo $website; ?>" type="text" class="form-control" placeholder="Any Website"  />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    
                    <label> Date Of Birth</label>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label> Date Of Birth</label>
                            <input name="dob" value="<?php echo $website; ?>" type="date" class="form-control" placeholder="Any Website"  />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label> Gender</label>
                            <input value="<?php echo $gen; ?>" name="gender" type="text" class="form-control" placeholder="gender"  />
              
              
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label> Religion</label>
                            <input value="<?php echo $rlg; ?>" name="Religion" type="text" class="form-control" placeholder="Religion"  />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    
                     <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>About</label>
                            <textarea name="about"      placeholder="<?php echo $about; ?>" rows="5" class="form-control" id="message"  data-validation-required-message="Enter About"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Qoute</label>
                            <textarea name="fqoute"   placeholder="<?php echo $q; ?>" rows="5" class="form-control" id="message"  data-validation-required-message="Enter About"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    
                    
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" name="btnupdate" class="btn btn-default">Post</button>
                        </div>
                    </div>
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
				  $email=$_SESSION["Admin"];
				   $chk=mysqli_query($arif,"select * from myprofile where email='$email'");
				   if(mysqli_num_rows($chk) > 0)
				   {
					   mysqli_query($arif,"update myprofile set email='$email', std='$std',work='$work',
					   hschool='$hschool',colg='$colg',htown='$htown',ccity='$ccity',fb='$fb',dob='$dob',gender='$gen',religion='$rlg',about='$about',fq='$q',website='$website',phone='$phone' where email='$email'");
					   header("location:editadminprofile.php");
					   echo "<script>alert('Profile Updated Sucessfully')</script>";
					   
					   
					}
				else
				{
				 
				  
				  mysqli_query($arif,"insert into myprofile (email,std,work,hschool,colg,htown,ccity,fb,dob,gender,religion,about,fq,website,phone) values ('$email','$std','$work','$hschool','$colg','$htown','$ccity','$fb','$dob','$gen','$rlg','$about','$q','$website','$phone')");
				  header("location:editadminprofile.php");
				  echo "<script>alert('Success')</script>";
				  
				}
				  
				   
				}
			   
			   
			   
			   
			   
			   ?>
            </div>
        </div>
    </div>

    <hr>
    
    
    
    
    
    
    
    
    
    
   
    
    
    
    
    
    
    
    
    
    
    
    
    

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
