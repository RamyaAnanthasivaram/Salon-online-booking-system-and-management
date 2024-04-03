<?php
include "../includes/config.php";
include "../includes/functions.php";

$ResponseArray 	= 	array();
$ErrorResponse  =    "";
$Action			=	stripslashes(trim($_REQUEST["action"]));
$HtmlContent    =    "";

if(isset($Action) && $Action == "login"){
    try {

        $email		= addslashes((trim($_REQUEST['email'])));
        $password	= addslashes((trim($_REQUEST['password'])));

        $CheckUserQuery = "SELECT * FROM tbl_login WHERE email = '$email' AND password = '$password' AND type = 'Customer'";
        $CheckUserQueryResults = mysqli_query($conn,$CheckUserQuery);

        if (mysqli_num_rows($CheckUserQueryResults) > 0) 
        {
            while($record = mysqli_fetch_assoc($CheckUserQueryResults)) 
            {
                
                $_SESSION["logged_in"] = true;
                $_SESSION["uid"]       = $record["id"];
                $_SESSION["username"]  = $record["username"];
                $_SESSION["useremail"] = $record["email"];
                $_SESSION["usertype"]  = $record["type"];

            }

            $ResponseArray["status"]  = "200";
            $ResponseArray["message"] = "Login Successfull.";
        } else {
            $ResponseArray["status"]  = "300";
            $ResponseArray["message"] = "Incorrect username or password.";
        }

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }

}else if(isset($Action) && $Action == "adminlogin"){
    try {
    
        $email		= addslashes((trim($_REQUEST['email'])));
        $password	= addslashes((trim($_REQUEST['password'])));
    
        $CheckUserQuery = "SELECT * FROM tbl_login WHERE email = '$email' AND password = '$password' AND type = 'Admin'";
        $CheckUserQueryResults = mysqli_query($conn,$CheckUserQuery);
    
        if (mysqli_num_rows($CheckUserQueryResults) > 0) 
        {
            while($record = mysqli_fetch_assoc($CheckUserQueryResults)) 
            {
                    
                $_SESSION["admin_logged_in"] = true;
                $_SESSION["aid"]       = $record["id"];
                $_SESSION["adminname"]  = $record["username"];
                $_SESSION["adminemail"] = $record["email"];
                $_SESSION["usertype"]  = $record["type"];
    
            }
    
            $ResponseArray["status"]  = "200";
            $ResponseArray["message"] = "Admin Login Successfull.";
        } else {
            $ResponseArray["status"]  = "300";
            $ResponseArray["message"] = "Incorrect username or password.";
        }
    
    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
}else if(isset($Action) && $Action == "ownerlogin"){
    try {
    
        $email		= addslashes((trim($_REQUEST['email'])));
        $password	= addslashes((trim($_REQUEST['password'])));
    
        $CheckUserQuery = "SELECT * FROM tbl_login WHERE email = '$email' AND password = '$password' AND type = 'Owner'";
        $CheckUserQueryResults = mysqli_query($conn,$CheckUserQuery);
    
        if (mysqli_num_rows($CheckUserQueryResults) > 0) 
        {
            while($record = mysqli_fetch_assoc($CheckUserQueryResults)) 
            {
                if($record["status"] == "Reset"){
                    $ResponseArray["cstatus"]  = $record["status"];
                    $ResponseArray["oid"]      = $record["id"];
                    $ResponseArray["type"]     = $record["type"];
                    $ResponseArray["message"]  = "You have been redirected to reset your password.";
                }else if($record["status"] == "Blocked"){
                    $ResponseArray["cstatus"]  = $record["status"];
                    $ResponseArray["message"] = "Your account has been blocked by admin. Please contact admin for more information.";
                }else{
                    $ResponseArray["cstatus"]  = $record["status"];
                    $_SESSION["owner_logged_in"] = true;
                    $_SESSION["oid"]       = $record["id"];
                    $_SESSION["ownername"]  = $record["username"];
                    $_SESSION["owneremail"] = $record["email"];
                    $_SESSION["usertype"]  = $record["type"];
                    $ResponseArray["message"] = "Owner Login Successfull.";
                }
            }
    
            $ResponseArray["status"]  = "200";
        } else {
            $ResponseArray["status"]  = "300";
            $ResponseArray["message"] = "Incorrect username or password.";
        }
    
    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
}else if(isset($Action) && $Action == "register"){

    try {
        $username	= addslashes((trim($_REQUEST['regusername'])));
        $email	    = addslashes((trim($_REQUEST['regemail'])));
        $phone	    = addslashes((trim($_REQUEST['regphone'])));
        $password	= addslashes((trim($_REQUEST['regpassword'])));
        $address	= addslashes((trim($_REQUEST['regaddress'])));
        $city	    = addslashes((trim($_REQUEST['regcity'])));
        $state	    = addslashes((trim($_REQUEST['regstate'])));
        $country	= addslashes((trim($_REQUEST['regcountry'])));
        $zip	    = addslashes((trim($_REQUEST['regzip'])));
      


        $InsertArray = array();
        $InsertArray["username"]   = $username;
        $InsertArray["email"]      = $email;
        $InsertArray["password"]   = $password;
        $InsertArray["mobile"]     = $phone;
        $InsertArray["address"]    = $address;
        $InsertArray["city"]       = $city;
        $InsertArray["state"]      = $state;
        $InsertArray["country"]    = $country;
        $InsertArray["zip"]        = $zip;
        $InsertArray["type"]       = "Customer";
        $InsertArray["status"]     = "Active";


        $columns = implode(", ",array_keys($InsertArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($InsertArray));
        $values  = implode("', '", $escaped_values);
        $AddNewUserQuery = "INSERT INTO tbl_login ($columns) VALUES ('$values')";
        $ExecuteAddNewUserQuery = mysqli_query($conn,$AddNewUserQuery) or die ("Error in query: $AddNewUserQuery. ".mysqli_error($conn));
        
        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Registration Successfull.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "owner_register"){

    try {

        $username	= addslashes((trim($_REQUEST['ownerregusername'])));
        $email	    = addslashes((trim($_REQUEST['ownerregemail'])));
        $phone	    = addslashes((trim($_REQUEST['ownerregphone'])));
        $password	= addslashes((trim($_REQUEST['ownerregpassword'])));
        $address	= addslashes((trim($_REQUEST['ownerregaddress'])));
        $city	    = addslashes((trim($_REQUEST['ownerregcity'])));
        $state	    = addslashes((trim($_REQUEST['ownerregstate'])));
        $country	= addslashes((trim($_REQUEST['ownerregcountry'])));
        $zip	    = addslashes((trim($_REQUEST['ownerregzip'])));
      


        $InsertArray = array();
        $InsertArray["username"]   = $username;
        $InsertArray["email"]      = $email;
        $InsertArray["password"]   = $password;
        $InsertArray["mobile"]     = $phone;
        $InsertArray["address"]    = $address;
        $InsertArray["city"]       = $city;
        $InsertArray["state"]      = $state;
        $InsertArray["country"]    = $country;
        $InsertArray["zip"]        = $zip;
        $InsertArray["type"]       = "Owner";
        $InsertArray["status"]     = "Active";


        $columns = implode(", ",array_keys($InsertArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($InsertArray));
        $values  = implode("', '", $escaped_values);
        $AddNewUserQuery = "INSERT INTO tbl_login ($columns) VALUES ('$values')";
        $ExecuteAddNewUserQuery = mysqli_query($conn,$AddNewUserQuery) or die ("Error in query: $AddNewUserQuery. ".mysqli_error($conn));
        
        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Owner Registration Successfull.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "stafflogin"){

    try {

        $email		= addslashes((trim($_REQUEST['email'])));
        $password	= addslashes((trim($_REQUEST['password'])));

        $CheckUserQuery = "SELECT * FROM tbl_login WHERE email = '$email' AND password = '$password' AND type = 'Staff'";
        $CheckUserQueryResults = mysqli_query($conn,$CheckUserQuery);

        if (mysqli_num_rows($CheckUserQueryResults) > 0) 
        {
            while($record = mysqli_fetch_assoc($CheckUserQueryResults)) 
            {
                if($record["status"] == "Reset"){
                    $ResponseArray["cstatus"]  = $record["status"];
                    $ResponseArray["sid"]      = $record["id"];
                    $ResponseArray["type"]     = $record["type"];
                    $ResponseArray["message"]  = "You have been redirected to reset your password.";
                }else if($record["status"] == "Blocked"){
                    $ResponseArray["cstatus"]  = $record["status"];
                    $ResponseArray["message"] = "Your account has been blocked by admin. Please contact admin for more information.";
                }else{
                    $ResponseArray["cstatus"]  = $record["status"];
                    $_SESSION["staff_logged_in"] = true;
                    $_SESSION["sid"]       = $record["id"];
                    $_SESSION["staffname"]  = $record["username"];
                    $_SESSION["staffemail"] = $record["email"];
                    $_SESSION["usertype"]  = $record["type"];
                    $ResponseArray["message"] = "Staff Login Successfull.";
                }
               

            }

            $ResponseArray["status"]  = "200";
        } else {
            $ResponseArray["status"]  = "300";
            $ResponseArray["message"] = "Incorrect username or password.";
        }

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "resetpassword"){

    try {

        $id		= addslashes((trim($_REQUEST['id'])));
        $password	= addslashes((trim($_REQUEST['password'])));

        $Query = "UPDATE tbl_login SET password = '$password', status = 'Active' WHERE id = $id";
        $Results = mysqli_query($conn,$Query);

        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Password Updated.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "update_profile"){

    try {

        $id	            = addslashes((trim($_REQUEST['id'])));
        $firstname	    = addslashes((trim($_REQUEST['firstname'])));
        $lastname	    = addslashes((trim($_REQUEST['lastname'])));
        $username	    = addslashes((trim($_REQUEST['username'])));
        $email	        = addslashes((trim($_REQUEST['email'])));
        $phone	        = addslashes((trim($_REQUEST['phone'])));
        $address	    = addslashes((trim($_REQUEST['address'])));
        $city	        = addslashes((trim($_REQUEST['city'])));
        $state	        = addslashes((trim($_REQUEST['state'])));
        $country	    = addslashes((trim($_REQUEST['country'])));
        $zip	        = addslashes((trim($_REQUEST['zip'])));
        $image          = UploadImageFile("uploads",'profilepic');

        $ProfileArray                   = array();
        $ProfileArray["first_name"]     = $firstname;
        $ProfileArray["last_name"]      = $lastname;
        $ProfileArray["username"]       = $username;
        $ProfileArray["image"]          = $image;
        $ProfileArray["email"]          = $email;
        $ProfileArray["mobile"]         = $phone;
        $ProfileArray["address"]        = $address;
        $ProfileArray["city"]           = $city;
        $ProfileArray["state"]          = $state;
        $ProfileArray["country"]        = $country;
        $ProfileArray["zip"]            = $zip;

        $UpdatProfile = "UPDATE tbl_login SET ";
        foreach($ProfileArray as $k => $v)
        {
            $UpdatProfile .= $k."='". $v."', ";
        }
        $UpdatProfile = rtrim($UpdatProfile, ", ");
        $UpdatProfile .= " where id = $id";

      

        $ExecuteQuery = mysqli_query($conn,$UpdatProfile) or die ("Error in query: $UpdatProfile. ".mysqli_error($conn));
        
        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Profile Updated.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "update_staff_profile"){

    try {

        $id	            = addslashes((trim($_REQUEST['id'])));
        $firstname	    = addslashes((trim($_REQUEST['firstname'])));
        $lastname	    = addslashes((trim($_REQUEST['lastname'])));
        $username	    = addslashes((trim($_REQUEST['username'])));
        $email	        = addslashes((trim($_REQUEST['email'])));
        $phone	        = addslashes((trim($_REQUEST['phone'])));
        $address	    = addslashes((trim($_REQUEST['address'])));
        $city	        = addslashes((trim($_REQUEST['city'])));
        $state	        = addslashes((trim($_REQUEST['state'])));
        $country	    = addslashes((trim($_REQUEST['country'])));
        $zip	        = addslashes((trim($_REQUEST['zip'])));
        $expert	        = addslashes((trim($_REQUEST['expert'])));
        $experience	    = addslashes((trim($_REQUEST['experience'])));
        $image          = UploadImageFile("uploads",'profilepic');

        $ProfileArray                   = array();
        $ProfileArray["first_name"]     = $firstname;
        $ProfileArray["last_name"]      = $lastname;
        $ProfileArray["username"]       = $username;
        $ProfileArray["image"]          = $image;
        $ProfileArray["email"]          = $email;
        $ProfileArray["mobile"]         = $phone;
        $ProfileArray["address"]        = $address;
        $ProfileArray["city"]           = $city;
        $ProfileArray["state"]          = $state;
        $ProfileArray["country"]        = $country;
        $ProfileArray["zip"]            = $zip;
        $ProfileArray["expert"]         = $expert;
        $ProfileArray["experience"]     = $experience;

        $UpdatProfile = "UPDATE tbl_login SET ";
        foreach($ProfileArray as $k => $v)
        {
            $UpdatProfile .= $k."='". $v."', ";
        }
        $UpdatProfile = rtrim($UpdatProfile, ", ");
        $UpdatProfile .= " where id = $id";

      

        $ExecuteQuery = mysqli_query($conn,$UpdatProfile) or die ("Error in query: $UpdatProfile. ".mysqli_error($conn));
        
        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Profile Updated.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "add_store"){
    try {

        $id	            = addslashes((trim($_REQUEST['id'])));

        $storename	    = addslashes((trim($_REQUEST['storename'])));
        $gstnumber	    = addslashes((trim($_REQUEST['gstnumber'])));
        $businessname	= addslashes((trim($_REQUEST['businessname'])));
        $storeaddress	= addslashes((trim($_REQUEST['storeaddress'])));
        $storecity	    = addslashes((trim($_REQUEST['storecity'])));
        $storestate	    = addslashes((trim($_REQUEST['storestate'])));
        $storecountry	= addslashes((trim($_REQUEST['storecountry'])));
        $storezip	    = addslashes((trim($_REQUEST['storezip'])));
        $storephone	    = addslashes((trim($_REQUEST['storephone'])));

        $firstname	    = addslashes((trim($_REQUEST['firstname'])));
        $lastname	    = addslashes((trim($_REQUEST['lastname'])));
        $username	    = addslashes((trim($_REQUEST['username'])));
        $email	        = addslashes((trim($_REQUEST['email'])));
        $phone	        = addslashes((trim($_REQUEST['phone'])));
        $address	    = addslashes((trim($_REQUEST['address'])));
        $city	        = addslashes((trim($_REQUEST['city'])));
        $state	        = addslashes((trim($_REQUEST['state'])));
        $country	    = addslashes((trim($_REQUEST['country'])));
        $zip	        = addslashes((trim($_REQUEST['zip'])));

        // $UploadArray                   = array();
        // $UploadArray["store"]          = "storepic";
        // $UploadArray["banner"]         = "bannerpic";

        $storeimage     = UploadImageFile("uploads",'storepic');
        $storebanner    = UploadImageFile_v2("uploads",'banner_','bannerpic');

        $OwnerArray                   = array();
        $OwnerArray["first_name"]     = $firstname;
        $OwnerArray["last_name"]      = $lastname;
        $OwnerArray["username"]       = $username;
        $OwnerArray["image"]          = "images/default/profile.jpg";
        $OwnerArray["email"]          = $email;
        $OwnerArray["password"]       = "1234";
        $OwnerArray["mobile"]         = $phone;
        $OwnerArray["address"]        = $address;
        $OwnerArray["city"]           = $city;
        $OwnerArray["state"]          = $state;
        $OwnerArray["country"]        = $country;
        $OwnerArray["zip"]            = $zip;
        $OwnerArray["type"]           = "Owner";
        $OwnerArray["status"]         = "Reset";

        $columns = implode(", ",array_keys($OwnerArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($OwnerArray));
        $values  = implode("', '", $escaped_values);
        $OwnerQuery = "INSERT INTO tbl_login ($columns) VALUES ('$values')";
        $ExecuteOwnerQuery = mysqli_query($conn,$OwnerQuery) or die ("Error in query: $OwnerQuery. ".mysqli_error($conn));

        $StoreArray                   = array();
        $StoreArray["owner"]          = mysqli_insert_id($conn);
        $StoreArray["name"]           = $storename;
        $StoreArray["gst"]            = $gstnumber;
        $StoreArray["businessname"]   = $businessname;
        $StoreArray["address"]        = $storeaddress;
        $StoreArray["city"]           = $storecity;
        $StoreArray["state"]          = $storestate;
        $StoreArray["country"]        = $storecountry;
        $StoreArray["zip"]            = $storezip;
        $StoreArray["phone"]          = $storephone;
        $StoreArray["banner"]         = $storebanner;
        $StoreArray["logo"]           = $storeimage;
        $StoreArray["status"]         = "Closed";
        $StoreArray["created_on"]     = date('Y-m-d H:i:s');

        $columns = implode(", ",array_keys($StoreArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($StoreArray));
        $values  = implode("', '", $escaped_values);
        $StoreQuery = "INSERT INTO tbl_stores ($columns) VALUES ('$values')";
        $ExecuteStoreQuery = mysqli_query($conn,$StoreQuery) or die ("Error in query: $StoreQuery. ".mysqli_error($conn));

        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "New Store Added.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
}else if(isset($Action) && $Action == "add_staff"){
    try {

        $id	            = addslashes((trim($_REQUEST['id'])));
        $firstname	    = addslashes((trim($_REQUEST['firstname'])));
        $lastname	    = addslashes((trim($_REQUEST['lastname'])));
        $username	    = addslashes((trim($_REQUEST['username'])));
        $email	        = addslashes((trim($_REQUEST['email'])));
        $phone	        = addslashes((trim($_REQUEST['phone'])));
        $address	    = addslashes((trim($_REQUEST['address'])));
        $city	        = addslashes((trim($_REQUEST['city'])));
        $state	        = addslashes((trim($_REQUEST['state'])));
        $country	    = addslashes((trim($_REQUEST['country'])));
        $zip	        = addslashes((trim($_REQUEST['zip'])));
        $store	        = addslashes((trim($_REQUEST['assignstaff'])));

       
        $StaffArray                   = array();
        $StaffArray["first_name"]     = $firstname;
        $StaffArray["last_name"]      = $lastname;
        $StaffArray["username"]       = $username;
        $StaffArray["image"]          = "images/default/profile.jpg";
        $StaffArray["email"]          = $email;
        $StaffArray["password"]       = "1234";
        $StaffArray["incharge"]       = $id;
        $StaffArray["mobile"]         = $phone;
        $StaffArray["address"]        = $address;
        $StaffArray["city"]           = $city;
        $StaffArray["state"]          = $state;
        $StaffArray["country"]        = $country;
        $StaffArray["zip"]            = $zip;
        $StaffArray["store"]          = $store;
        $StaffArray["type"]           = "Staff";
        $StaffArray["status"]         = "Reset";

        $columns = implode(", ",array_keys($StaffArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($StaffArray));
        $values  = implode("', '", $escaped_values);
        $StaffQuery = "INSERT INTO tbl_login ($columns) VALUES ('$values')";
        $ExecuteQuery = mysqli_query($conn,$StaffQuery) or die ("Error in query: $StaffQuery. ".mysqli_error($conn));

       

        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Staff Added.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
}else if(isset($Action) && $Action == "add_service"){
    try {

        $id	            = addslashes((trim($_REQUEST['id'])));
        $store	        = addslashes((trim($_REQUEST['store'])));
        $name	        = addslashes((trim($_REQUEST['servicename'])));
        $pretty_name	= addslashes((trim($_REQUEST['prettyname'])));
        $category	    = addslashes((trim($_REQUEST['servicecategory'])));

        $getpriceatstore	    = isset($_REQUEST['getpriceatstore']) ? addslashes((trim($_REQUEST['getpriceatstore']))) : "0";
        $checkpriceatstore	    = isset($_REQUEST['checkpriceatstore']) ? "Y" : "NA";

        $getpriceathome	        = isset($_REQUEST['getpriceathome']) ? addslashes((trim($_REQUEST['getpriceathome']))) : "0";
        $checkpriceathome	    = isset($_REQUEST['checkpriceathome']) ? "Y" : "NA";

        $image	                = UploadImageFile("uploads",'pic');
       
        $ServiceArray                   = array();
        $ServiceArray["owner"]          = $id;
        $ServiceArray["store"]          = $store;
        $ServiceArray["name"]           = str_replace(' ', '_', strtolower(trim($name)));
        $ServiceArray["pretty_name"]    = $pretty_name;
        $ServiceArray["image"]          = $image;
        $ServiceArray["category"]       = $category;
        $ServiceArray["at_home"]        = $checkpriceathome;
        $ServiceArray["at_home_price"]  = $getpriceathome;
        $ServiceArray["at_store"]       = $checkpriceatstore;
        $ServiceArray["at_store_price"] = $getpriceatstore;

        $columns = implode(", ",array_keys($ServiceArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($ServiceArray));
        $values  = implode("', '", $escaped_values);
        $ServiceQuery = "INSERT INTO tbl_services ($columns) VALUES ('$values')";
        $ExecuteQuery = mysqli_query($conn,$ServiceQuery) or die ("Error in query: $ServiceQuery. ".mysqli_error($conn));

        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Service Added.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
}else if(isset($Action) && $Action == "update_store_status"){
    try {

        $id	            = addslashes((trim($_REQUEST['id'])));
        $status	        = addslashes((trim($_REQUEST['status'])));

        $Query        = "UPDATE tbl_stores SET status = '$status' WHERE id = $id";
        $ExecuteQuery = mysqli_query($conn,$Query) or die ("Error in query: $Query. ".mysqli_error($conn));

        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Store Status Updated.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
}else if(isset($Action) && $Action == "add_category"){
    try {

        $name	        = addslashes((trim($_REQUEST['categoryname'])));
        $pretty_name	= addslashes((trim($_REQUEST['categoryprettyname'])));
        $image	        = UploadImageFile("uploads",'pic');
       
        $CategoryArray                            = array();
        $CategoryArray["category_name"]           = str_replace(' ', '_', strtolower(trim($name)));
        $CategoryArray["category_pretty_name"]    = $pretty_name;
        $CategoryArray["category_image"]          = $image;

        $columns = implode(", ",array_keys($CategoryArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($CategoryArray));
        $values  = implode("', '", $escaped_values);
        $CategoryQuery = "INSERT INTO tbl_category ($columns) VALUES ('$values')";
        $ExecuteQuery = mysqli_query($conn,$CategoryQuery) or die ("Error in query: $CategoryQuery. ".mysqli_error($conn));

        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Category Added.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
}else if(isset($Action) && $Action == "add_new_store"){
    try {

        $id	            = addslashes((trim($_REQUEST['id'])));

        $storename	    = addslashes((trim($_REQUEST['storename'])));
        $gstnumber	    = addslashes((trim($_REQUEST['gstnumber'])));
        $businessname	= addslashes((trim($_REQUEST['businessname'])));
        $storeaddress	= addslashes((trim($_REQUEST['storeaddress'])));
        $storecity	    = addslashes((trim($_REQUEST['storecity'])));
        $storestate	    = addslashes((trim($_REQUEST['storestate'])));
        $storecountry	= addslashes((trim($_REQUEST['storecountry'])));
        $storezip	    = addslashes((trim($_REQUEST['storezip'])));
        $storephone	    = addslashes((trim($_REQUEST['storephone'])));


        $storeimage     = UploadImageFile("uploads",'setstorelogo');
        $storebanner    = UploadImageFile_v2("uploads",'banner_','setstorebanner');

        $StoreArray                   = array();
        $StoreArray["owner"]          = $id;
        $StoreArray["name"]           = $storename;
        $StoreArray["gst"]            = $gstnumber;
        $StoreArray["businessname"]   = $businessname;
        $StoreArray["address"]        = $storeaddress;
        $StoreArray["city"]           = $storecity;
        $StoreArray["state"]          = $storestate;
        $StoreArray["country"]        = $storecountry;
        $StoreArray["zip"]            = $storezip;
        $StoreArray["phone"]          = $storephone;
        $StoreArray["banner"]         = $storebanner;
        $StoreArray["logo"]           = $storeimage;
        $StoreArray["status"]         = "Requested";
        $StoreArray["created_on"]     = date('Y-m-d H:i:s');

        $columns = implode(", ",array_keys($StoreArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($StoreArray));
        $values  = implode("', '", $escaped_values);
        $StoreQuery = "INSERT INTO tbl_stores ($columns) VALUES ('$values')";
        $ExecuteStoreQuery = mysqli_query($conn,$StoreQuery) or die ("Error in query: $StoreQuery. ".mysqli_error($conn));

        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "New Store Request Sent.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
}else if(isset($Action) && $Action == "update_staff"){
    try {

        $id	            = addslashes((trim($_REQUEST['id'])));
        $sid	        = addslashes((trim($_REQUEST['sid'])));

        $firstname	    = addslashes((trim($_REQUEST['firstname'])));
        $lastname	    = addslashes((trim($_REQUEST['lastname'])));
        $username	    = addslashes((trim($_REQUEST['username'])));
        $email	        = addslashes((trim($_REQUEST['email'])));
        $phone	        = addslashes((trim($_REQUEST['phone'])));
        $address	    = addslashes((trim($_REQUEST['address'])));
        $city	        = addslashes((trim($_REQUEST['city'])));
        $state	        = addslashes((trim($_REQUEST['state'])));
        $country	    = addslashes((trim($_REQUEST['country'])));
        $zip	        = addslashes((trim($_REQUEST['zip'])));
        $store	        = addslashes((trim($_REQUEST['assignstore'])));

       
        $StaffArray                   = array();
        $StaffArray["first_name"]     = $firstname;
        $StaffArray["last_name"]      = $lastname;
        $StaffArray["username"]       = $username;
        $StaffArray["email"]          = $email;
        $StaffArray["mobile"]         = $phone;
        $StaffArray["address"]        = $address;
        $StaffArray["city"]           = $city;
        $StaffArray["state"]          = $state;
        $StaffArray["country"]        = $country;
        $StaffArray["zip"]            = $zip;
        $StaffArray["store"]          = $store;


        $UpdatProfile = "UPDATE tbl_login SET ";
        foreach($StaffArray as $k => $v)
        {
            $UpdatProfile .= $k."='". $v."', ";
        }
        $UpdatProfile = rtrim($UpdatProfile, ", ");
        $UpdatProfile .= " where id = $sid";

      

        $ExecuteQuery = mysqli_query($conn,$UpdatProfile) or die ("Error in query: $UpdatProfile. ".mysqli_error($conn));


        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Staff Details Updated.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
}else if(isset($Action) && $Action == "store_listings"){
    try {

        $category	            = addslashes((trim($_REQUEST['category'])));
        $store	                = addslashes((trim($_REQUEST['store'])));
        $type	                = addslashes((trim($_REQUEST['type'])));
        $Price                  = "";

        $LoginState = isset($_SESSION["uid"]) ? true : false;
        
        $Query      = "SELECT * FROM tbl_services WHERE category = '$category' AND store = '$store' AND at_store = 'Y'";
        $Results    = mysqli_query($conn,$Query);

        $Content = '';

        if (mysqli_num_rows($Results) > 0) 
        {
            while($record = mysqli_fetch_assoc($Results)) 
            {
                $categoryInfo   = getCategoryInfo($conn,$category);
                $CartContent    = "";

                

                if($LoginState)
                {
                    if(CheckOrders($conn,$store,$record["id"],$_SESSION["uid"]))
                    {
                        $CartContent = '<button type="button" style="display:none;background-color: #B885C1;outline: none;border: none;" class="btn btn-secondary btn-sm" id="bt_cart_'.$record["id"].'" onclick="add_to_cart(\''.$store.'\',\''.$record["id"].'\',\''.$_SESSION["uid"].'\',\''.$type.'\')" >Add to cart</button>
                        <button type="button"  id="bt_cart_remove_'.$record["id"].'" onclick="remove_from_cart(\''.$store.'\',\''.$record["id"].'\',\''.$_SESSION["uid"].'\')" style="display:inline-block;outline:none;border: none;"><img class="img-fluid" style="border-radius: 10px;height: 28px;" src="images/icons/remove.png"></button>';
                    }else{
                        $CartContent = '<button type="button" style="background-color: #B885C1;outline: none;border: none;" class="btn btn-secondary btn-sm" id="bt_cart_'.$record["id"].'" onclick="add_to_cart(\''.$store.'\',\''.$record["id"].'\',\''.$_SESSION["uid"].'\',\''.$type.'\')" >Add to cart</button>
                        <button type="button" id="bt_cart_remove_'.$record["id"].'" onclick="remove_from_cart(\''.$store.'\',\''.$record["id"].'\',\''.$_SESSION["uid"].'\')" style="display:none;outline:none;border: none;"><img class="img-fluid" style="border-radius: 10px;height: 28px;" src="images/icons/remove.png"></button>';
                    }
                    
                }else{
                    $CartContent = '<button type="button" style="background-color: #B885C1;outline: none;border: none;" class="btn btn-secondary btn-sm"  onclick="redirect(\'login.php\')" id="bt_cart"  >Add to cart</button>
                    <a href="#" style="display:none;"><img class="img-fluid" style="border-radius: 10px;height: 28px;" src="images/icons/remove.png"></a>';
                }

                if($order_type == "store")
                {
                    $Price = $record["at_store_price"];
                }else{
                    $Price = $record["at_home_price"];
                }

                $Content .= '<li id="cart-item-'.$record["id"].'" class="list-group-item" style="margin-bottom: 10px;border-radius: 5px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="row main align-items-center" style="margin:0px;">
                                    <div class="col-2">
                                        <img class="img-fluid" style="border-radius: 10px;" src="'.$record["image"].'">
                                    </div>
                                    <div class="col">
                                        <div class="row text-muted">'.$categoryInfo["category_pretty_name"].'</div>
                                        <div class="row">&#11106;'.$record["pretty_name"].'</div>
                                    </div>
                                    <div class="col">&#8377; '.$Price.' </div>
                                    <div class="col" style="text-align: right;">
                                        '.$CartContent.'
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>';

            }

        }
        
        $ResponseArray["status"]  = "200";
        $ResponseArray["HTML"] = $Content;

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
}else if(isset($Action) && $Action == "add_to_cart"){
    try {

        $user	        = addslashes((trim($_REQUEST['user'])));
        $store	        = addslashes((trim($_REQUEST['store'])));
        $service	    = addslashes((trim($_REQUEST['service'])));
        $type	        = addslashes((trim($_REQUEST['type'])));

       
        $OrderArray                   = array();
        $OrderArray["store"]          = $store;
        $OrderArray["user"]           = $user;
        $OrderArray["service"]        = $service;
        $OrderArray["type"]           = $type;
        $OrderArray["status"]         = "Basket";
        $OrderArray["order_date"]     = date('Y-m-d H:i:s');

       
        $columns = implode(", ",array_keys($OrderArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($OrderArray));
        $values  = implode("', '", $escaped_values);
        $Query = "INSERT INTO tbl_orders ($columns) VALUES ('$values')";
        $ExecuteQuery = mysqli_query($conn,$Query) or die ("Error in query: $Query. ".mysqli_error($conn));


        $ResponseArray["status"]  = "200";
        $ResponseArray["service"] = $service;
        $ResponseArray["message"] = "Added to cart.";
        $ResponseArray["count"]   = getCartCount($conn, $store, $user);

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
}else if(isset($Action) && $Action == "remove_from_cart"){
    try {

        $user	        = addslashes((trim($_REQUEST['user'])));
        $store	        = addslashes((trim($_REQUEST['store'])));
        $service	    = addslashes((trim($_REQUEST['service'])));

        
        $Query = "DELETE FROM tbl_orders WHERE store = '$store' AND service = '$service' AND user = '$user' AND status = 'Basket'";
        $ExecuteQuery = mysqli_query($conn,$Query) or die ("Error in query: $Query. ".mysqli_error($conn));

        $ResponseArray["status"]  = "200";
        $ResponseArray["service"] = $service;
        $ResponseArray["message"] = "Removed form cart.";
        $ResponseArray["count"]   = getCartCount($conn, $store, $user);


    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
}else if(isset($Action) && $Action == "cart_items"){
    try {

        $store	                = addslashes((trim($_REQUEST['store'])));
        $user	                = addslashes((trim($_REQUEST['user'])));
        $Price = "";

        $LoginState             = isset($_SESSION["uid"]) ? true : false;
        
        $Query      = "SELECT tbl_services.*, tbl_orders.type, tbl_orders.id AS order_id FROM tbl_services INNER JOIN tbl_orders ON tbl_orders.service = tbl_services.id WHERE tbl_orders.store = '$store' AND tbl_orders.user = '$user' AND status = 'Basket'";
        $Results    = mysqli_query($conn,$Query);

        $Content = '';

        if (mysqli_num_rows($Results) > 0) 
        {
            while($record = mysqli_fetch_assoc($Results)) 
            {
                $categoryInfo   = getCategoryInfo($conn,$record["category"]);
                $CartContent    = "";

                if($LoginState)
                {
                    if(CheckOrders($conn,$store,$record["id"],$_SESSION["uid"]))
                    {
                        $CartContent = '
                        <button type="button"  id="bt_mycart_remove_'.$record["id"].'" onclick="remove_from_mycart(\''.$store.'\',\''.$record["id"].'\',\''.$_SESSION["uid"].'\')" style="display:inline-block;outline:none;border: none;"><img class="img-fluid" style="border-radius: 10px;height: 28px;" src="images/icons/remove.png"></button>';
                    }else{
                        $CartContent = '
                        <button type="button" id="bt_mycart_remove_'.$record["id"].'" onclick="remove_from_mycart(\''.$store.'\',\''.$record["id"].'\',\''.$_SESSION["uid"].'\')" style="display:none;outline:none;border: none;"><img class="img-fluid" style="border-radius: 10px;height: 28px;" src="images/icons/remove.png"></button>';
                    }
                    
                }else{
                    $CartContent = '
                    <a href="#" style="display:none;"><img class="img-fluid" style="border-radius: 10px;height: 28px;" src="images/icons/remove.png"></a>';
                }

                if($record["type"] == "store")
                {
                    $Price = $record["at_store_price"];
                }else{
                    $Price = $record["at_home_price"];
                }

                $Content .= '<li id="mycart-item-'.$record["id"].'" class="list-group-item" style="margin-bottom: 10px;border-radius: 5px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="row main align-items-center" style="margin:0px;">
                                    <div class="col-2">
                                        <img class="img-fluid" style="border-radius: 10px;" src="'.$record["image"].'">
                                    </div>
                                    <div class="col">
                                        <div class="row text-muted">'.$categoryInfo["category_pretty_name"].'</div>
                                        <div class="row">&#11106;'.$record["pretty_name"].'</div>
                                    </div>
                                    <div class="col">&#8377; '.$Price.' </div>
                                    <div class="col" style="text-align: right;">
                                        '.$CartContent.'
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>';

            }

        }else{
            $Content = '  <li class="list-group-item list-group-item-warning">Cart is empty.</li>';
        }
        
        $ResponseArray["status"]  = "200";
        $ResponseArray["HTML"] = $Content;

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
}else if(isset($Action) && $Action == "calculate_amount"){
    try {

        $store	                = addslashes((trim($_REQUEST['store'])));
        $user	                = addslashes((trim($_REQUEST['user'])));

        $SubTotal = getSubTotal($conn,$store,$user);
        $GST      = round((18 / 100) * $SubTotal);
        $Total    = $SubTotal + $GST;

        $ResponseArray["status"]    = "200";
        $ResponseArray["SubTotal"]  = $SubTotal;
        $ResponseArray["GST"]       = $GST;
        $ResponseArray["Total"]     = $Total;

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
}else if(isset($Action) && $Action == "payment"){
    try {

        $store	                = addslashes((trim($_REQUEST['store'])));
        $user	                = addslashes((trim($_REQUEST['user'])));
        $payment_id	            = addslashes((trim($_REQUEST['payment_id'])));
        $total	                = addslashes((trim($_REQUEST['total'])));

        $PaymentArray                   = array();
        $PaymentArray["store"]          = $store;
        $PaymentArray["user"]           = $user;
        $PaymentArray["payment_id"]     = $payment_id;
        $PaymentArray["amount"]         = $total;
        $PaymentArray["created_on"]     = date('Y-m-d H:i:s');
        $PaymentArray["status"]         = "Pending";

        $columns = implode(", ",array_keys($PaymentArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($PaymentArray));
        $values  = implode("', '", $escaped_values);
        $Query = "INSERT INTO tbl_transactions ($columns) VALUES ('$values')";
        $ExecuteQuery = mysqli_query($conn,$Query) or die ("Error in query: $Query. ".mysqli_error($conn));
        
        $tid = mysqli_insert_id($conn);

        $UpdateOrders = "UPDATE tbl_orders SET transaction_id = '$tid', status = 'Purchased', action = 'Paid' WHERE store = '$store' AND user = '$user' AND status = 'Basket'";
        $UpdateQuery = mysqli_query($conn,$UpdateOrders) or die ("Error in query: $UpdateOrders. ".mysqli_error($conn));

        $ResponseArray["status"]    = "200";
        $ResponseArray["message"]   = "Order has been placed successfully.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
}else if(isset($Action) && $Action == "assign_staff"){
    try {

        $order_id	            = addslashes((trim($_REQUEST['order_id'])));
        $staff	                = addslashes((trim($_REQUEST['staff'])));
     
        $UpdateOrders = "UPDATE tbl_orders SET staff = '$staff', action = 'Assigned' WHERE id = '$order_id'";
        $UpdateQuery = mysqli_query($conn,$UpdateOrders) or die ("Error in query: $UpdateOrders. ".mysqli_error($conn));

        $ResponseArray["status"]    = "200";
        $ResponseArray["message"]   = "Staff has been assigned.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
}else if(isset($Action) && $Action == "update_progress"){
    try {

        $order_id	            = addslashes((trim($_REQUEST['order_id'])));
        $staff	                = addslashes((trim($_REQUEST['staff'])));
        $progress	            = addslashes((trim($_REQUEST['progress'])));

        $UpdateOrders = "UPDATE tbl_orders SET staff = '$staff', action = '$progress' WHERE id = '$order_id'";
        $UpdateQuery = mysqli_query($conn,$UpdateOrders) or die ("Error in query: $UpdateOrders. ".mysqli_error($conn));

        $ResponseArray["status"]    = "200";
        $ResponseArray["message"]   = "Progress has been updated.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
}else if(isset($Action) && $Action == "update_store"){
    try {

        $store_id	            = addslashes((trim($_REQUEST['store_id'])));
        $status	                = addslashes((trim($_REQUEST['status'])));

        $UpdateOrders = "UPDATE tbl_stores SET status = '$status' WHERE id = '$store_id'";
        $UpdateQuery = mysqli_query($conn,$UpdateOrders) or die ("Error in query: $UpdateOrders. ".mysqli_error($conn));

        $ResponseArray["status"]    = "200";
        $ResponseArray["message"]   = "Store status updated.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
}else{
    $ResponseArray["status"]  = "404";
    $ResponseArray["message"] = "Invalid Action.";
}

$Response	=	json_encode($ResponseArray, true);

echo $Response;
exit;
?>