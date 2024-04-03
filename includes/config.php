<?php
session_start();

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
  $Protocol = "https://";
}else{
  $Protocol = "http://";
}

define("DEV_ENV","ON"); //  ON or OFF - For UI
define("PROD_ENV","OFF"); //  ON or OFF - For DB

define("PAYMENT_KEY","rzp_test_U2XWpODmhRkL0l");

$CurrentServer = $_SERVER['SERVER_NAME'];

if($CurrentServer == "localhost")
{
    define("SITE_URL",$Protocol.$_SERVER['SERVER_NAME']."/parlor"); 
    define("ROOT",$_SERVER['DOCUMENT_ROOT']."/parlor"); 
    define("UPLOAD_PATH",$_SERVER['DOCUMENT_ROOT']."/parlor/uploads"); 
    define("UPLOAD_URL",SITE_URL."/uploads"); 

    if(PROD_ENV == 'ON'){
      define("DB_SERVER","mocha3036.mochahost.com"); 
      define("DB_USER","deuneic1_siteadmin"); 
      define("DB_PASS","admin@3112"); 
      define("DB_NAME","deuneic1_parlor"); 
    }else{
      define("DB_SERVER","localhost"); 
      define("DB_USER","root"); 
      define("DB_PASS",""); 
      define("DB_NAME","parlor_db"); 
    }
    

}else{
    define("SITE_URL",$Protocol.$_SERVER['SERVER_NAME']."/site/parlor"); 
    define("ROOT",$_SERVER['DOCUMENT_ROOT']."/site/parlor"); 
    define("UPLOAD_PATH",$_SERVER['DOCUMENT_ROOT']."/site/parlor/uploads"); 
    define("UPLOAD_URL",SITE_URL."/uploads"); 

    define("DB_SERVER","mocha3036.mochahost.com"); 
    define("DB_USER","deuneic1_siteadmin"); 
    define("DB_PASS","admin@3112"); 
    define("DB_NAME","deuneic1_parlor"); 
}

// Create connection
$conn =  mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

?>