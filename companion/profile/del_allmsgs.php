<?php
include "../database.php";
session_start();
 echo $toemail=$_SESSION["useremail"];
$femail=$_GET["email"];
mysqli_query($arif,"delete from messege where fmsg='$femail' and tmsg='$toemail'");
header("location:messege.php");

?>