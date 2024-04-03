<?php
session_start();
unset($_SESSION["owner_logged_in"]); 
unset($_SESSION["oid"]); 
unset($_SESSION["ownername"]); 
unset($_SESSION["owneremail"]); 
unset($_SESSION["usertype"]); 


// session_unset();
// session_destroy();
header('location:index.php');
?>