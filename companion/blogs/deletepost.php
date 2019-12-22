<?php
include "../database.php";

if(isset($_GET["id"]))
{
$id=$_GET["id"];
mysqli_query($arif,"delete from posts where id='$id'");
header("location:myposts.php");	
}

?>