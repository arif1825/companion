<?php
include "../database.php";
session_start();
if($_SESSION["Admin"]=="")
{
header("location:../login_register/index.php");	
}
$id=$_GET["id"];
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clean Blog</title>

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
				$r=mysqli_query($arif,"select * from posts where id='$id'");
				$c=mysqli_fetch_assoc($r);
				  $email=$c["email"];
				  
                $result=mysqli_query($arif,"select * from register where email='$email'");
				$resultset=mysqli_fetch_assoc($result);
				$name=$resultset["name"];
				
				?>
                <a class="navbar-brand" href="../profile/myprofile.php"><?php echo $name; ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../admin/Mohammad_arif.php">Home</a>
                    </li>
                    
                    
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/post-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                    <?php
                    if(isset($_GET["id"])){
						$id=$_GET["id"];
						$p=mysqli_query($arif,"select * from posts where id=$id");
						if(mysqli_num_rows($p) > 0)
						{
						$a=mysqli_fetch_assoc($p);
						$title=$a["title"];
				        $post=$a["post"];
				        $date=$a["date"];
				        $stitle=$a["stitle"];
						$pic=$a["pic"];
				        
						
						
					?>
                    
                        <h1><?php echo $title; ?></h1>
                        <h2 class="subheading"><?php $stitle; ?></h2>
                        <span class="meta">Posted by <a href="../profile/blogger.php?email=<?php echo $email; ?>"><?php echo $name; ?></a> on <?php  echo $date; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <p><?php  echo $post; ?></p>

                   

                    

                    

                    

                    <?php 
					if($pic=="uploads/")
					{
						echo "";
					}
					else{
					 ?>

                    
                        <img class="img-responsive" src="<?php echo $pic; ?>" alt="">
                    <?php } ?>
                    
                </div>
            </div>
        </div>
    </article>

    <hr>
<?php
						}
						else
						{
							echo "<h1>NO Post Found</h1>";
							}
					}
					else
					{
					echo "<h1>NO Post Found</h1>";	
						
					}

?>
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