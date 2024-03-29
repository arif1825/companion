<?php
include "../database.php";
session_start();
if($_SESSION["Admin"]=="")
{
header("location:../login_register/index.php");	
}
$p=mysqli_query($arif,"select * from admin");
                $a=mysqli_fetch_assoc($p);
                $email=$a["email"];
				$name=$a["name"];
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Post Blog</title>

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
                
                <a class="navbar-brand" href="../profile/myprofile.php"><?php echo $name;  ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../admin/Mohammad_arif.php">Home</a>
                    </li>
                    
                    
                    <li>
                        <a href="../profile/logout.php">Logout</a>
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
                        <h1>Post Blog</h1>
                        <hr class="small">
                        <span class="subheading">what Is on Your Mind?</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p>Share Your Ideas And Views..!!</p>
                <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                <form  method="post" novalidate enctype="multipart/form-data">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title" id="name" required data-validation-required-message="Please enter Title.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    
                    
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label> Sub Title</label>
                            <input type="text" name="subtitle" class="form-control" placeholder="Sub Title" id="name" required data-validation-required-message="Please enter  Sub Title.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    
                    
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label> Sub Title</label>
                            <input type="file" name="pic" class="form-control" placeholder="pic" id="name"  >
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    
                    
                    
                    
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Blog</label>
                            <textarea name="upost" rows="5" class="form-control" placeholder="Write Your Blog Here" id="message" required data-validation-required-message="Please enter Blog."></textarea>
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
				{
					$title=$_POST["title"];
					$stitle=$_POST["subtitle"];
					$post=$_POST["upost"];
					$source=$_FILES["pic"]["tmp_name"];
	$destination="uploads/".$_FILES["pic"]["name"];
	$size =$_FILES["pic"]["size"];
	
	if($_FILES["pic"]["type"]=="image/png" || $_FILES["pic"]["type"]=="image/jpeg" || $_FILES["pic"]["type"]=="image/jpg")
	{
		
		if($size > 1000000){
		//echo "<span style='color:red;'>file too large.Upload size is restricted to</span><br>";
		echo "<span style='color:red;'>File Size Exceed!!</span>";
		$totalsize=$size/1024;
		$size=$totalsize/1024;
		$totalsize=substr($size, 0,4);
		echo "<br/>File Size : ".$totalsize."MB";
		
		}
		else
		{
	move_uploaded_file($source,$destination);
					mysqli_query($arif,"insert into posts (email,name, title,stitle,pic,post,date) values ('$email','$name','$title','$stitle','$destination','$post',NOW())");
					echo "Posted Sucessfully";	
	
	
		}
					
	}
	else
	{ #type else
		echo "<span style='color:red;'>File Not Supported..!!</span>";
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
                    <p class="copyright text-muted">Copyright &copy; <span style="color:#03C;">Companion</span> Developed By <a href="#">Mohammad Arif</a></p>
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
