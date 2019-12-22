<?php
session_start();
session_destroy();
header("location:../blogs/allpost.php?msg=logged out sucessfully");

?>