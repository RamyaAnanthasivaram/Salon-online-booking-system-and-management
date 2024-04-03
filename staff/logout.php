<?php
session_start();
unset($_SESSION["staff_logged_in"]); 
unset($_SESSION["sid"]); 
unset($_SESSION["staffname"]); 
unset($_SESSION["staffemail"]); 
unset($_SESSION["usertype"]); 


// session_unset();
// session_destroy();
header('location:index.php');
?>