<?php
include "../database.php";
session_start();
if(isset($_SESSION["useremail"]))
{
header("location:../profile/profile.php");	
}
ob_start();
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login | Register</title>

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
                
                <a class="navbar-brand" href="#">Login | Register</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../blogs/allpost.php">Home</a>
                    </li>
                    <li>
                        <a href="#login">Login</a>
                    </li>
                    <li>
                        <a href="#register">Register</a>
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
                        <h1>Login | Register</h1>
                        <hr class="small">
                        <span class="subheading">Welcome To Companion</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <h1 id="login">Login Here..!!</h1>
                <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                <form  method="post" novalidate enctype="multipart/form-data">
                    
                    
                    
                    
                    
                    
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label> Email</label>
                            <input required type="email" name="uemail" class="form-control" placeholder="Email" id="name"  >
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    
                    
                    
                    
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Password</label>
                            <input required type="password" name="upass" class="form-control" placeholder="Passsword" id="name"  >
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" name="btnlog" class="btn btn-default">Login</button>
                        </div>
                    </div>
                </form>
                <?php
                                if(isset($_POST["btnlog"]))
								{
								$email=htmlentities($_POST["uemail"]);
								$pass=htmlentities($_POST["upass"]);
								
				
		$result=mysql_query("select * from register where email='$email' and password='$pass'");
		if(mysql_num_rows($result) > 0)
		{
			$resultset=mysql_fetch_assoc($result);
			$dbemail=$resultset["email"];
			$dbpass=$resultset["password"];
			if($dbemail==$email && $dbpass==$pass)
			{
				
				$_SESSION["useremail"]=$email;
				header("location:../profile/profile.php");	
			}
			else
		{
			echo "<script>alert('Invalid Email Or Password')</script>";
		}	
		}
		else
		{
			echo "<script>alert('Invalid Details')</script>";
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
                <h1 id="register">Register</h1>
                <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                <form  method="post" novalidate >
                    
                    
                    
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Name</label>
                            <input name="uname" type="text" class="form-control" placeholder="Your Name" required/>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Email</label>
                            <input name="uemail" type="email" class="form-control" placeholder="Email" required/>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Phone</label>
                            <input name="uphone" type="text" class="form-control" placeholder="contact Number" required/>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Password</label>
                            <input name="upass" type="password" class="form-control" placeholder="pasword" required/>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Confirm Password</label>
                            <input name="cpass" type="password" class="form-control" placeholder="Confirm Password" required/>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" name="signup" class="btn btn-default">Update</button>
                        </div>
                    </div>
                </form>
               <?php
                                            if(isset($_POST["signup"]))
											{
												$name=htmlentities($_POST["uname"]);
												$email=htmlentities($_POST["uemail"]);
												$phone=htmlentities($_POST["uphone"]);
												$pass=htmlentities($_POST["upass"]);
												$cpass=htmlentities($_POST["cpass"]);
												$result=mysql_query("select * from register where email='$email' or phone='$phone'");
												if(mysql_num_rows($result) > 0 )
												{
													echo "<script>alert('Account Already Exists')</script>";
													}
													else {
				if(strlen($phone) > 10)
				{
					echo "<script>alert('Enter 10 Digit Phone Number')</script>";
				}
				elseif(strlen($phone) < 10)
				{
					echo "<script>alert('Enter 10 Digit Phone Number')</script>";
				}
				elseif(strlen($pass) < 8)
				{
					echo "<script>alert('Password Should Be More Than 8 Characters ')</script>";
				}
				elseif(strlen($pass) > 12)
				{
					echo "<script>alert('Password Should Be Less Than 12 Characters ')</script>";
				}
				elseif($cpass != $pass )
				{
					echo "<script>alert('Password Does NOt Match ')</script>";
				}
														
				else
				{	
					if(preg_match("/^[A-Z a-z]+$/",$name) && preg_match("/^[0-9]+$/",$phone) ){									
												
												mysql_query("insert into register (name,email,phone,password) values ('$name','$email','$phone','$pass')");
											       		
												echo "<script>alert('Registered Sucessfully')</script>";				
					                                                                           }
						else{
							echo "<script>alert('Invalid Name Or Phone Number')</script>";
							}																	   
																							   
					}
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
