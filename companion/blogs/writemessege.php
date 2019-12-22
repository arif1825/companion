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
$toemail=$_GET["email"];
$r=mysqli_query($arif,"select * from register where email='$toemail'");
if(mysqli_num_rows($r) > 0)
{
	echo "";	
}
else
{
header("location:../blogs/allpost.php");	
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

    <title>Write Messege</title>

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
				  $femail=$_SESSION["useremail"];
                $result=mysqli_query($arif,"select * from register where email='$femail'");
				$resultset=mysqli_fetch_assoc($result);
				$name=$resultset["name"];
				
				?>
                <a class="navbar-brand" href="../profile/myprofile.php"><?php echo $name;  ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="allpost.php">Home</a>
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
                        <h1>Messege</h1>
                        <hr class="small">
                        <span class="subheading">Let's Chat</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                
                <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                
                <?php
                $m=mysqli_query($arif,"select * from messege where fmsg='$femail' and tmsg='$toemail' or fmsg='$toemail' and tmsg='$femail'");
				if(mysqli_num_rows($m) > 0)
				{
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
                            <textarea name="umsg" rows="5" class="form-control" placeholder="Messege" id="message" required data-validation-required-message="Please enter Messege."></textarea>
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
					mysqli_query($arif,"insert into messege (fmsg,tmsg,messege,date) values ('$femail','$toemail','$mesg',NOW())");
					header("location:writemessege.php?email=".$toemail);	
					
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
