<?php
include "../database.php"; 
session_start(); #session started.
if(isset($_SESSION["useremail"])){
$email=$_SESSION["useremail"];
$r=mysqli_query($arif,"select * from register where email='$email'");
$a=mysqli_fetch_assoc($r);
 echo $name=$a["name"];
mysqli_query($arif,"insert into comment(comment,date,email,name,postid) values('".$_POST["txtcomment"]."',NOW(),'$email','$name','".$_POST["postid"]."')"); # mysqli_query is a function which is used to execute querries. here we have used inseert querry where we are inserting data in specfic mentioned rows. we have passed the respective values to respective rows. remember there should be no mismatch in  the data passing. NOW() is used to pass the current date time. $_SESSION["email"] contains the email of currently logged user. $_SESSION["authuser"]." contains the name of currently logged user. 
$id=$_POST["postid"];
header("location:post.php?id=".$id);
}
?>
<?php
if(isset($_SESSION["Admin"])){
	$email=$_SESSION["Admin"];
$r=mysqli_query($arif,"select * from admin where email='$email'");
$a=mysqli_fetch_assoc($r);
 echo $name=$a["name"];
mysqli_query($arif,"insert into comment(comment,date,email,name,postid) values('".$_POST["txtcomment"]."',NOW(),'$email','$name','".$_POST["postid"]."')"); # mysqli_query is a function which is used to execute querries. here we have used inseert querry where we are inserting data in specfic mentioned rows. we have passed the respective values to respective rows. remember there should be no mismatch in  the data passing. NOW() is used to pass the current date time. $_SESSION["email"] contains the email of currently logged user. $_SESSION["authuser"]." contains the name of currently logged user. 
$id=$_POST["postid"];
header("location:myfullpost.php?id=".$id);
	
	
	}

?>