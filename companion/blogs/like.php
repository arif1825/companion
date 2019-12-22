<?php
	include "../database.php"; # here we have included database.php file which contains the database connection.
	
	session_start(); #session started.
	if(isset($_SESSION["useremail"])){
	$email=$_SESSION["useremail"];
$r=mysqli_query($arif,"select * from register where email='$email'");
$a=mysqli_fetch_assoc($r);
  $name=$a["name"];
	if($_GET["type"]=="like") # here we are checking weather we get type=like in our url. the method has been set to get here. refer to newsfeed.php
	{
	mysqli_query($arif,"insert into tbl_like(postid,name,email) values(".$_GET["postid"].",'$name','$email')"); # mysqli_query is a function which is used to execute querries. here we have used inseert querry where we are inserting data in specfic mentioned rows. we have passed the respective values to respective rows. remember there should be no mismatch in  the data passing. NOW() is used to pass the current date time. $_SESSION["email"] contains the email of currently logged user. $_SESSION["authuser"]." contains the name of currently logged user. $_POST["postid"]. contains the data passed by the user in the textarea named as postid.
	}else if($_GET["type"]=="unlike") # else if we got type=unlike in the url then the following code will be executed. refer to newsfeed.php
	{
		mysqli_query($arif,"delete from tbl_like where postid='".$_GET["postid"]."' and email='$email'");
		}
	$id=$_GET["postid"];
	header("location:post.php?id=".$id);
	}
	
	elseif(isset($_SESSION["Admin"]))
	{
		
		$email=$_SESSION["Admin"];
$r=mysqli_query($arif,"select * from admin where email='$email'");
$a=mysqli_fetch_assoc($r);
  echo $name=$a["name"];
	if($_GET["type"]=="like") # here we are checking weather we get type=like in our url. the method has been set to get here. refer to newsfeed.php
	{
	mysqli_query($arif,"insert into tbl_like(postid,name,email) values(".$_GET["postid"].",'$name','$email')"); # mysqli_query is a function which is used to execute querries. here we have used inseert querry where we are inserting data in specfic mentioned rows. we have passed the respective values to respective rows. remember there should be no mismatch in  the data passing. NOW() is used to pass the current date time. $_SESSION["email"] contains the email of currently logged user. $_SESSION["authuser"]." contains the name of currently logged user. $_POST["postid"]. contains the data passed by the user in the textarea named as postid.
	}else if($_GET["type"]=="unlike") # else if we got type=unlike in the url then the following code will be executed. refer to newsfeed.php
	{
		mysqli_query($arif,"delete from tbl_like where postid='".$_GET["postid"]."' and email='$email'");
		}
	$id=$_GET["postid"];
	header("location:myfullpost.php?id=".$id);
		
		
	}
?>