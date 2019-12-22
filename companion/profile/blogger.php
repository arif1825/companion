<?php
include "../database.php";
if(isset($_GET["email"]))
{
$email=$_GET["email"];
$b=mysqli_query($arif,"select * from admin where email='$email'");
if(mysqli_num_rows($b) > 0 )
{
	
}
else
{
	
	

$r=mysqli_query($arif,"select * from register where email='$email'");
if(mysqli_num_rows($r) > 0)
{
	echo "";	
}
else
{
header("location:../blogs/allpost.php");	
}	
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

    <title> Blogger Profile</title>

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

<body id="page-top" class="index">

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
                        <a href="../blogs/allpost.php">Home</a>
                    </li>
                    <?php
					session_start();
                    if(isset($_SESSION["useremail"]))
					{
					
					?>
					<li class="page-scroll">
                        <a href="../blogs/writemessege.php?email=<?php echo $email; ?>">Messege</a>
                    </li>
					
					<?php
						
					}
					
					?>
                    
                    
                    
                    
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
                       
                       
   <style>
 .profilelabel{
	
	
	margin-right:5px;
	color:#009;
	font-weight:600;
	
	}
	.profileheading{
		color:#03F;}
		.spanprofile{
			
			color:#06C;
			text-transform:capitalize;
			
			}
   
   </style>                    
           <?php
			  
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
				  
			  $std="Not Updated Yet";   
				 $work="Not Updated Yet";
				 $hschool="Not Updated Yet";
				 $colg="Not Updated Yet";
				 $htown="Not Updated Yet";
				 $ccity="Not Updated Yet";
				 $fb="Not Updated Yet"; 
				 $website="Not Updated Yet";
				 $dob="Not Updated Yet";
				 $gen="Not Updated Yet";
				 $rlg="Not Updated Yet";
				 $about="Not Updated Yet";
				 $q="Not Updated Yet";
				  $phone="Not Updated Yet";
				  
				  
			}
			  ?>             
                       
                       
                       
                       
                       <div id="profile">
            <h1 class="profileheading">Education</h1><br/>
            <span class="profilelabel">Studying:</span><span class="spanprofile"><?php echo $std; ?></span><br/><br/>
            
             <span class="profilelabel">Work:</span><span class="spanprofile"><?php echo $work; ?></span><br/><br/>
             <span class="profilelabel">High School:</span><span class="spanprofile"><?php echo $hschool; ?></span><br/><br/>
            <span class="profilelabel">College:</span><span class="spanprofile"><?php echo $colg; ?></span><br/><br/>
            <hr/>
            <h1 class="profileheading">Places I Have Lived..</h1><br/>
          <span class="profilelabel">Hometown:</span><span class="spanprofile"><?php echo $htown; ?></span><br/><br/> 
          <span class="profilelabel">Current City:</span><span class="spanprofile"><?php echo $ccity; ?></span><br/><br/> 
          <hr/>
            <h1 class="profileheading">Contact Info</h1><br/>
            <span class="profilelabel">Mobile:</span><span class="spanprofile">+91-<?php echo $phone; ?></span><br/><br/>
            <span class="profilelabel">facebook:</span><span class="spanprofile">https://www.facebook.com/<?php echo $fb; ?></span><br/><br/>
            <span class="profilelabel">Website:</span><span class="spanprofile"><?php echo $website; ?></span><br/><br/>
            <span class="profilelabel">Email:</span><span class="spanprofile"><?php echo $email; ?></span><br/><br/>
            <hr/>
            <h1 class="profileheading">Basic Info</h1><br/>
            <span class="profilelabel">Birthday:</span><span class="spanprofile"><?php echo $dob; ?></span><br/><br/>
            <span class="profilelabel">Gender:</span><span class="spanprofile"><?php echo $gen; ?></span><br/><br/>
            
            <span class="profilelabel">Religion:</span><span class="spanprofile"><?php echo $rlg; ?></span><br/><br/>
            <span class="profilelabel">Work:</span><span class="spanprofile"><?php echo $work; ?></span><br/><br/>
            <hr/>
            <h1 class="profileheading">About Me</h1>
            <p>
            
            <?php echo $about; ?>
            
            </p>
            <hr/>
            <h1 class="profileheading">Favorite Qoute</h1><br/>
            <?php echo $q; ?>
            
            
            </div>
                       
                       
                       
                       
                       
                       
                       
                       
                       
                        
                    </div>
                </div>
            </div>
        </div>
    </header>

    

   
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
                        Copyright &copy; Companion. Developed By Mohammad Arif
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
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/cabin.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/cake.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/circus.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/game.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/safe.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/submarine.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
