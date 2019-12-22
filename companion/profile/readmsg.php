<?php
include "../database.php";
ob_start();
session_start();
if($_SESSION["useremail"]=="")
{
header("location:../login_register/index.php");	
}

if(isset($_GET["email"]))
{
$email=$_GET["email"];
$a=mysqli_query($arif,"select * from messege where fmsg='$email' or tmsg='$email'");
if(mysqli_num_rows($a) > 0 )
{
	
}
else
{
header("location:messege.php");	
}	
}
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Messeges</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<script>
function status()
{
	
	
<?php

$status="read";
?>
}
</script>
<body onLoad="status()" id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
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
                <a class="navbar-brand" href="#page-top"> <?php echo $name; ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    
                    
                    
                    
                    
                    <li class="page-scroll">
                        <a href="messege.php">Home</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <?php 
				$result1=mysqli_query($arif,"select * from profile where email='$email'");
				if(mysqli_num_rows($result1) > 0)
				{
					$array1=mysqli_fetch_assoc($result1);
					$pic=$array1["profilepic"];
					
					$about=$array1["about"];	
				
				
				
				 ?>
                    <img style="border:1px solid black;border-radius:100%; width:300px; height:300px;" class="img-responsive"  src="<?php echo $pic; ?>" alt=""><?php } 
					else
					{
						?>
						<img class="img-responsive" alt="" src="img/profile.png">
						<?php
						
						$about="Not Updated Yet";
						
						}
					?>
                    
                    <div class="intro-text">
                        <span class="name"><?php echo $name; ?></span>
                        <hr class="star-light">
                        
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Messeges</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
            <?php
            
			$femail=$_SESSION["useremail"];
			$email=$_GET["email"];
                $m=mysqli_query($arif,"select * from messege where fmsg='$femail' and tmsg='$email' or fmsg='$email' and tmsg='$femail'");
				
				if(mysqli_num_rows($m) > 0)
				{
					mysqli_query($arif,"update messege set status='$status' where fmsg='$femail' and tmsg='$email' or fmsg='$email' and tmsg='$femail'");
					?>
					<div style="width:700px;  overflow:auto; height:300px;">
					<?php
					while($a=mysqli_fetch_assoc($m))
					{
						$id=$a["id"];
					 $fmsg=$a["fmsg"];
					 $c=mysqli_query($arif,"select * from register where email='$fmsg'");
					 $d=mysqli_fetch_assoc($c);
					  echo $nam=$d["name"];
					 ?>&nbsp;&nbsp;<span style="color:green;"><?php	echo $msg=$a["messege"];?></span> &nbsp;&nbsp;<?php echo $a["date"];?> &nbsp;&nbsp;<a style="color:red;" href="delmsg.php?id=<?php echo $id; ?>&email=<?php echo $toemail; ?>">Delete</a><br><?php
					}	
				}
				
				?>
			
            
            </div>
            
            
             <form  method="post" novalidate >
                 <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Messege</label>
                            <textarea style="border:1px solid black;" name="umsg" rows="5" class="form-control" placeholder="Messege" id="message" required data-validation-required-message="Please enter Messege."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" name="btnmsg" class="btn btn-default">Send</button>
                        </div>
                    </div>
                </form>
                <?php
                if(isset($_POST["btnmsg"]))
				{
					$mesg=$_POST["umsg"];
					mysqli_query($arif,"insert into messege (fmsg,tmsg,messege,date) values ('$femail','$email','$mesg',NOW())");
					header("location:readmsg.php?email=".$email);	
					
				}
				
				
				?>
            
            
			
            
            
                
                
                
                
            </div>
        </div>
    </section>

    

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <?php
                        $result2=mysqli_query($arif,"select * from location where email='$email'");
						if(mysqli_num_rows($result2) > 0)
						{
						$array2=mysqli_fetch_assoc($result2);
						$loc=$array2["location"];
						$date=$array2["date"];
						$town=$array2["town"];	
						
						
						?>
                        <p><?php echo $loc; ?><br><?php echo $town; ?></p><?php }
						else{
							$loc="Not Updated";
						$date="Not Updated";
						$town="Not Updated";
						?>
						
						<p><?php echo $loc; ?><br><?php ; ?></p>
						<?php
							
							}
						
						 ?>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="https://www.facebook.com" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://www.gmail.com" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="https://www.twitter.com" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>About Website</h3>
                        <p>This Website is dedicated to every Blogger.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Companion. Developed By <a href="Mohammad_arif.php">Mohammad Arif</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Portfolio Modals -->
    
    
    
    
    
    
    
    
    
    
    
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>

</body>

</html>
