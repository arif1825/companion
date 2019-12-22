<?php
include "../database.php";
if($_GET["id"])
{
$id=$_GET["id"];
$email=$_GET["email"];
mysqli_query($arif,"delete from messege where id='$id'");
header("location:writemessege.php?email=".$email);	
}

?>