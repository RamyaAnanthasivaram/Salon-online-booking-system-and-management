<?php
include '../includes/config.php';
$GLOBALS['AdminID']  = "";

if(!isset($_SESSION["admin_logged_in"])){ 
  header('location:login.php');
}

if(isset($_SESSION["admin_logged_in"]) && $_SESSION["admin_logged_in"] == true){ 
    $GLOBALS['AdminID'] = $_SESSION["aid"];
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Fusion Parlor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700" rel="stylesheet">

    <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">

    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/ionicons.min.css">

    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../css/jquery.timepicker.css">
    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/icomoon.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <link rel="stylesheet" href="../css/style.css">
  </head>
  <style>
    .ftco-navbar-light .navbar-nav > .nav-item > .nav-link {
    padding-top: 1.5rem;
    padding-bottom: 1.5rem;
    padding-left: 20px;
    padding-right: 20px;
    color: white;
}
    </style>
  <body>
    

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar" style="background: #de1794 !important; ">
	    <div class="container">
	      <img src="..\images\fusion-parlor-high-resolution-logo-white-transparent.png" style="width:208px;">
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="request.php" class="nav-link">Manage Stores</a></li>

            <?php
                if(isset($_SESSION["admin_logged_in"]) && $_SESSION["admin_logged_in"] == true){ 
                  
                  echo '<li class="nav-item"><a href="profile.php" class="nav-link"> Welcome, '.$_SESSION["adminname"].'</a></li>';
                  echo '<li class="nav-item"><a href="logout.php" class="nav-link"> Logout </a></li>';

                }else{
                  echo '<li class="nav-item"><a href="login.php" class="nav-link"> Login </a></li>';
                  echo '<li class="nav-item"><a href="register.php" class="nav-link"> Register </a></li>';

                } 
            ?>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->