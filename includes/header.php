<?php
include 'config.php';
$GLOBALS['UserID']  = "";

if(isset($_SESSION["user_logged_in"]) && $_SESSION["user_logged_in"] == true){ 
    $GLOBALS['UserID'] = $_SESSION["user_id"];
}

$CurrentPage = basename($_SERVER['PHP_SELF']);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Fusion Parlor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/css/animate.css">
    
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/css/aos.css">

    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/css/jquery.timepicker.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/css/icomoon.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/css/style.css">
    <style>
  
  .ftco-navbar-light .navbar-nav > .nav-item > .nav-link {
      padding-top: 1.5rem;
      padding-bottom: 1.5rem;
      padding-left: 20px;
      padding-right: 20px;
      color: white;
  }
    </style>
  </head>
  <body>
    
    <?php if($CurrentPage == "profile.php"){}else{ ?>
    
    <?php } ?>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar  ftco-navbar-light" id="ftco-navbar" style="background: deeppink;">
	    <div class="container">
      <img src="image.png" style="width:208px;">
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <!-- <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
	          <li class="nav-item"><a href="work.html" class="nav-link">Work</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li> -->
            <?php
                if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true){ 
                  echo '<li class="nav-item"><a href="index.php" class="nav-link"> Home </a></li>';
                  

                  echo '<li class="nav-item"><a href="profile.php" class="nav-link"> Welcome, '.$_SESSION["username"].'</a></li>';
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