<?php
function getProfileDetails($conn, $id){
    $id = mysqli_real_escape_string($conn, $id);
    $GetEvents = "SELECT * FROM tbl_login WHERE id = '$id'";

    $Results = mysqli_query($conn, $GetEvents);
    $data = array();

    if (mysqli_num_rows($Results) > 0) {
        $record = mysqli_fetch_assoc($Results);
        $data["id"] = $record["id"];
        $data["first_name"] = $record["first_name"];
        $data["last_name"] = $record["last_name"];
        $data["username"] = $record["username"];
        $data["image"] = $record["image"];
        $data["email"] = $record["email"];
        $data["address"] = $record["address"];
        $data["city"] = $record["city"];
        $data["state"] = $record["state"];
        $data["country"] = $record["country"];
        $data["zip"] = $record["zip"];
        $data["mobile"] = $record["mobile"];
        $data["expert"] = $record["expert"];
        $data["experience"] = $record["experience"];
    }
    return $data;
}

function UploadImageFile($folder, $image){
    try {
        $uploadDirectory = "../$folder/";
        $uploadURL = $folder . '/';
        $image_file_path = "";

        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0755, true);
        }

        $file_ext = pathinfo($_FILES[$image]['name'], PATHINFO_EXTENSION);
        $file_tmp = $_FILES[$image]["tmp_name"];

        $allowed_extensions = ['jpeg', 'jpg', 'png', 'gif', 'PNG', 'jfif'];

        if (in_array(strtolower($file_ext), $allowed_extensions)) {
            $newFileName = date("YmdHis") . "." . $file_ext;
            $uploadPath = $uploadDirectory . $newFileName;

            if (move_uploaded_file($file_tmp, $uploadPath)) {
                $image_file_path = $uploadURL . $newFileName;
            }
        }
        return $image_file_path;
    } catch (Exception $ex) {
        return "Upload Error : " . $ex->getMessage();
    }
}

function UploadImageFile_v2($folder,$filename,$image){
    try 
    {
        $uploadDirectory = "../$folder/";
        $uploadURL       = $folder.'/';
        $image_file_path = "";

        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0755, true);
        }

        $file_ext  =    pathinfo($_FILES["$image"]['name'], PATHINFO_EXTENSION);
        $file_name = $_FILES["$image"]["name"];
        $file_tmp  = $_FILES["$image"]["tmp_name"];
        $ext       = pathinfo($file_name, PATHINFO_EXTENSION);

        if (in_array($ext, ['jpeg', 'jpg', 'png', 'gif','PNG', 'jfif'])) {
            $newFileName = $filename . date("YmdHis") . "." . $file_ext;
            $uploadPath = $uploadDirectory . $newFileName;


            if (move_uploaded_file($file_tmp, $uploadPath)) {
                $image_file_path= $uploadURL . $newFileName;
            }
        }

        return $image_file_path;

    } catch (Exception $ex) {
        return "Upload Error : ".$ex->getMessage();
    }
}

function getAllStaff($conn, $id){
    $Query = "SELECT * FROM tbl_login WHERE incharge = '$id' AND type = 'Staff'";
    $Results    = mysqli_query($conn,$Query);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]         = $record["id"];
            $data["first_name"] = $record["first_name"];
            $data["last_name"]  = $record["last_name"];

            $data["username"]   = $record["username"];
            $data["email"]      = $record["email"];
            $data["address"]    = $record["address"];
            $data["city"]       = $record["city"];
            $data["state"]      = $record["state"];
            $data["country"]    = $record["country"];
            $data["zip"]        = $record["zip"];
            $data["mobile"]     = $record["mobile"];

            $data["image"]      = $record["image"];
            $data["expert"]     = $record["expert"];
            $data["store"]      = $record["store"];

            array_push($ListArray,$data);

        }

    }

    return $ListArray;
}

function getStoreDetails($conn, $id){
    $GetEvents = "SELECT * FROM tbl_stores WHERE owner = '$id'";

    $Results    = mysqli_query($conn,$GetEvents);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]            = $record["id"];
            $data["name"]          = $record["name"];

            return $data;

        }

    }
}

function getAllServices($conn, $id){
    $Query = "SELECT * FROM tbl_services WHERE owner = '$id'";
    $Results    = mysqli_query($conn,$Query);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]           = $record["id"];
            $data["name"]         = $record["name"];
            $data["pretty_name"]  = $record["pretty_name"];
            $data["image"]        = $record["image"];

            array_push($ListArray,$data);

        }

    }

    return $ListArray;
}

function getAllStores($conn, $id){
    $Query = "SELECT * FROM tbl_stores WHERE owner = '$id' AND is_deleted = '0'";
    $Results    = mysqli_query($conn,$Query);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]            = $record["id"];
            $data["name"]          = $record["name"];
            $data["banner"]        = $record["banner"];
            $data["logo"]          = $record["logo"];
            $data["status"]        = $record["status"];
            $data["gst"]           = $record["gst"];

            array_push($ListArray,$data);

        }

    }

    return $ListArray;
}

function getStores($conn){
    $Query = "SELECT * FROM tbl_stores WHERE status = 'Open' AND is_deleted = '0'";
    $Results    = mysqli_query($conn,$Query);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]            = $record["id"];
            $data["name"]          = $record["name"];
            $data["banner"]        = $record["banner"];
            $data["logo"]          = $record["logo"];
            $data["status"]        = $record["status"];
            $data["gst"]           = $record["gst"];

            array_push($ListArray,$data);

        }

    }

    return $ListArray;
}

function getAllCategories($conn){
    $Query = "SELECT * FROM tbl_category";
    $Results    = mysqli_query($conn,$Query);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]                     = $record["id"];
            $data["category_name"]          = $record["category_name"];
            $data["category_image"]         = $record["category_image"];
            $data["category_pretty_name"]   = $record["category_pretty_name"];
            array_push($ListArray,$data);

        }

    }

    return $ListArray;
}

function getAllOpenStores($conn, $id){
    $Query = "SELECT * FROM tbl_stores WHERE status = 'Open' OR status = 'Approved' AND owner = '$id'";
    $Results    = mysqli_query($conn,$Query);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]            = $record["id"];
            $data["name"]          = $record["name"];
            $data["banner"]        = $record["banner"];
            $data["logo"]          = $record["logo"];
            $data["status"]        = $record["status"];
            $data["gst"]           = $record["gst"];

            array_push($ListArray,$data);

        }

    }

    return $ListArray;
}

function getStoreInfo($conn, $id){
    $Query = "SELECT * FROM tbl_stores WHERE status = 'Open' AND id = ".$id;
    $Results    = mysqli_query($conn,$Query);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]            = $record["id"];
            $data["name"]          = $record["name"];
            $data["banner"]        = $record["banner"];
            $data["logo"]          = $record["logo"];
            $data["status"]        = $record["status"];
            $data["gst"]           = $record["gst"];

            return $data;

        }

    }

}

function getCategoryInfo($conn, $id){
    $Query      = "SELECT * FROM tbl_category WHERE id = ".$id;
    $Results    = mysqli_query($conn,$Query);
    $ListArray  = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data                          = array();
            $data["id"]                    = $record["id"];
            $data["category_name"]         = $record["category_name"];
            $data["category_image"]        = $record["category_image"];
            $data["category_pretty_name"]  = $record["category_pretty_name"];
       

            return $data;

        }

    }

}

function getStoreCategories($conn, $id)
{
    $Query = "SELECT DISTINCT(category), (SELECT category_pretty_name from tbl_category WHERE id = s.category) as name, (SELECT category_image from tbl_category WHERE id = s.category) as image, (SELECT COUNT(category) from tbl_services WHERE category = s.category AND at_store = 'Y' AND store = '$id') as `count` from tbl_services as s";
    $Results    = mysqli_query($conn,$Query);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]          = $record["category"];
            $data["name"]        = $record["name"];
            $data["count"]       = $record["count"];
            $data["image"]       = $record["image"];
            $data["store"]       = $id;

            array_push($ListArray,$data);

        }

    }

    return $ListArray;
}

function CheckOrders($conn, $store, $service, $user)
{
    $Query = "SELECT * FROM tbl_orders WHERE store = '$store' AND service = '$service' AND user = '$user' AND status = 'Basket'";
    $Results    = mysqli_query($conn,$Query);

    if (mysqli_num_rows($Results) > 0) {
        return true;
    } else {
        return false;
    }
}

function getServiceContent($conn, $category, $store, $type, $order_type)
{

    $LoginState = isset($_SESSION["uid"]) ? true : false;
    
    $Query      = "SELECT * FROM tbl_services WHERE category = '$category' AND store = '$store' AND $type = 'Y'";
    $Results    = mysqli_query($conn,$Query);

    $Content = '';

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $categoryInfo   = getCategoryInfo($conn,$category);
            $CartContent    = "";
            $Price = "";

            if($LoginState)
            {
                if(CheckOrders($conn,$store,$record["id"],$_SESSION["uid"]))
                {
                    $CartContent = '<button type="button" style="display:none;background-color:deeppink;outline: none;border: none;" class="btn btn-secondary btn-sm" id="bt_cart_'.$record["id"].'" onclick="add_to_cart(\''.$store.'\',\''.$record["id"].'\',\''.$_SESSION["uid"].'\',\''.$order_type.'\')" >Add to cart</button>
                    <button type="button"  id="bt_cart_remove_'.$record["id"].'" onclick="remove_from_cart(\''.$store.'\',\''.$record["id"].'\',\''.$_SESSION["uid"].'\')" style="display:inline-block;outline:none;border: none;background: #fff;"><img class="img-fluid" style="border-radius: 10px;height: 28px;" src="images/icons/remove.png"></button>';
                }else{
                    $CartContent = '<button type="button" style="background-color:deeppink;outline: none;border: none;" class="btn btn-secondary btn-sm" id="bt_cart_'.$record["id"].'" onclick="add_to_cart(\''.$store.'\',\''.$record["id"].'\',\''.$_SESSION["uid"].'\',\''.$order_type.'\')" >Add to cart</button>
                    <button type="button" id="bt_cart_remove_'.$record["id"].'" onclick="remove_from_cart(\''.$store.'\',\''.$record["id"].'\',\''.$_SESSION["uid"].'\')" style="display:none;outline:none;border: none;background: #fff;"><img class="img-fluid" style="border-radius: 10px;height: 28px;" src="images/icons/remove.png"></button>';
                }
                
            }else{
                $CartContent = '<button type="button" style="background-color:deeppink;outline: none;border: none;" class="btn btn-secondary btn-sm"  onclick="redirect(\'login.php\')" id="bt_cart"  >Add to cart</button>
                <a href="#" style="display:none;"><img class="img-fluid" style="border-radius: 10px;height: 28px;" src="images/icons/remove.png"></a>';
            }

            if($order_type == "store"){
               $Price = $record["at_store_price"];
            }else{
               $Price = $record["at_home_price"];
            }

            $Content .= '<li id="cart-item-'.$record["id"].'" class="list-group-item" style="margin-bottom: 10px;border-radius: 5px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="row main align-items-center" style="margin:0px;width:100%;">
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

    return $Content;
}

function getHomeCategories($conn, $id)
{
    $Query = "SELECT DISTINCT(category), (SELECT category_pretty_name from tbl_category WHERE id = s.category) as name, (SELECT category_image from tbl_category WHERE id = s.category) as image, (SELECT COUNT(category) from tbl_services WHERE category = s.category AND at_home = 'Y' AND store = '$id') as `count` from tbl_services as s";
    $Results    = mysqli_query($conn,$Query);
    $ListArray  = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]          = $record["category"];
            $data["name"]        = $record["name"];
            $data["count"]       = $record["count"];
            $data["image"]       = $record["image"];
            $data["store"]       = $id;

            array_push($ListArray,$data);

        }

    }

    return $ListArray;
}

function getCartCount($conn, $store, $user)
{
    $Query = "SELECT COUNT(*) AS count FROM tbl_orders WHERE store = '$store' AND user = '$user' AND status = 'Basket'";

    $Results    = mysqli_query($conn,$Query);
    $ListArray  = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            return $record["count"];
        }

    }else{
        return '0';
    }

}

function getServicePrice($conn, $service, $type): int
{
    $Query = "SELECT $type AS price FROM tbl_services WHERE id = '$service'";

    $Results    = mysqli_query($conn,$Query);

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            return $record["price"];
        }

    }

}

function getSubTotal($conn, $store, $user): int
{
    $Query       = "SELECT * FROM tbl_orders WHERE store = '$store' AND user = '$user' AND status = 'Basket'";
    $Results     = mysqli_query($conn,$Query);
    $PriceArray  = array();

    $price = 0;

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            if($record["type"] == "store")
            {
                $price += getServicePrice($conn, $record["service"], "at_store_price");
            }else{
                $price += getServicePrice($conn, $record["service"], "at_home_price");

            }
        }
        return $price;

    }else{
        return $price;
    }

}

function getUserTransactions($conn, $user){
    $Query = "SELECT * FROM tbl_transactions WHERE user = '$user' ORDER BY id DESC";
    $Results    = mysqli_query($conn,$Query);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $TransactionArray = array();
            $TransactionArray["id"]                      = $record["id"];
            $TransactionArray["created_on"]              = $record["created_on"];

            $OrdersArray      = array();
            $Orders           = "SELECT o.*, (SELECT image from tbl_services WHERE id = o.service) AS service_image, (SELECT pretty_name from tbl_services WHERE id = o.service) AS service_name FROM tbl_orders AS o WHERE transaction_id = '".$record["id"]."' ORDER BY id DESC";

            $OrdersResults    = mysqli_query($conn,$Orders);

            if (mysqli_num_rows($OrdersResults) > 0) 
            {
                while($info = mysqli_fetch_assoc($OrdersResults)) 
                {
                    $InfoArray = array();
                    $InfoArray["service_image"]  = $info["service_image"];
                    $InfoArray["service_name"]   = $info["service_name"];

                    $StoreDetails = getStoreInfo($conn, $info["store"]);

                    $InfoArray["store_name"]   = $StoreDetails["name"];

                    if($info["staff"])
                    {
                        $StaffDetails = getProfileDetails($conn, $info["staff"]);

                        $InfoArray["staff_name"]   = $StaffDetails["first_name"] . ' ' . $StaffDetails["last_name"];
                    }else{
                        $InfoArray["staff_name"]   = 'Not Assigned';

                    }


                    array_push($OrdersArray,$InfoArray);

                }

            }

            $TransactionArray["orders"]  = $OrdersArray;

            array_push($ListArray,$TransactionArray);
        }

    }

    return $ListArray;
}


function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function getAllOrders($conn, $id){
    $Query = "SELECT * FROM tbl_login WHERE incharge = '$id' AND type = 'Staff'";
    $Results    = mysqli_query($conn,$Query);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]         = $record["id"];
            $data["first_name"] = $record["first_name"];
            $data["last_name"]  = $record["last_name"];

            $data["username"]   = $record["username"];
            $data["email"]      = $record["email"];
            $data["address"]    = $record["address"];
            $data["city"]       = $record["city"];
            $data["state"]      = $record["state"];
            $data["country"]    = $record["country"];
            $data["zip"]        = $record["zip"];
            $data["mobile"]     = $record["mobile"];

            $data["image"]      = $record["image"];
            $data["expert"]     = $record["expert"];
            $data["store"]      = $record["store"];

            array_push($ListArray,$data);

        }

    }

    return $ListArray;
}

function getOwnerOrders($conn, $id){
    $Query = "SELECT o.*, a.pretty_name AS service_name, u.first_name, u.last_name FROM tbl_orders AS o INNER JOIN tbl_transactions as t ON o.transaction_id = t.id INNER JOIN tbl_stores as s ON o.store = s.id INNER JOIN tbl_login as u ON o.user = u.id INNER JOIN tbl_services as a ON o.service = a.id WHERE t.status = 'Pending' AND s.owner = '$id' ORDER BY o.id DESC";
    $Results    = mysqli_query($conn,$Query);
    $ListArray  = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data                     = array();
            $data["order_id"]         = $record["id"];
            $data["store"]            = $record["store"];
            $data["user"]             = $record["user"];
            $data["service"]          = $record["service"];
            $data["type"]             = $record["type"];
            $data["status"]           = $record["status"];
            $data["order_date"]       = date("d, M Y", strtotime($record["order_date"]));
            $data["action"]           = $record["action"];
            $data["service_name"]     = $record["service_name"];
            $data["first_name"]       = $record["first_name"];
            $data["last_name"]        = $record["last_name"];
            $data["staff"]            = $record["staff"];

            array_push($ListArray,$data);

        }

    }

    return $ListArray;
}

function getStoreStaff($conn, $id){
    $Query = "SELECT * FROM tbl_login WHERE store ='$id'";
    $Results    = mysqli_query($conn,$Query);
    $ListArray  = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data                          = array();
            $data["id"]                    = $record["id"];
            $data["first_name"]            = $record["first_name"];
            $data["last_name"]             = $record["last_name"];

            array_push($ListArray,$data);

        }

    }

    return $ListArray;
}

function getStaffOrders($conn, $id){
    $Query = "SELECT o.*, a.pretty_name AS service_name, u.first_name, u.last_name FROM tbl_orders AS o INNER JOIN tbl_transactions as t ON o.transaction_id = t.id INNER JOIN tbl_stores as s ON o.store = s.id INNER JOIN tbl_login as u ON o.user = u.id INNER JOIN tbl_services as a ON o.service = a.id WHERE t.status = 'Pending' AND o.staff = '$id' ORDER BY o.id DESC";
    $Results    = mysqli_query($conn,$Query);
    $ListArray  = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data                     = array();
            $data["order_id"]         = $record["id"];
            $data["store"]            = $record["store"];
            $data["user"]             = $record["user"];
            $data["service"]          = $record["service"];
            $data["type"]             = $record["type"];
            $data["status"]           = $record["status"];
            $data["order_date"]       = date("d, M Y", strtotime($record["order_date"]));
            $data["action"]           = $record["action"];
            $data["service_name"]     = $record["service_name"];
            $data["first_name"]       = $record["first_name"];
            $data["last_name"]        = $record["last_name"];
            $data["staff"]            = $record["staff"];

            array_push($ListArray,$data);

        }

    }

    return $ListArray;
}

function getStoreRequest($conn){
    $GetEvents = "SELECT s.*, u.first_name, u.last_name FROM tbl_stores AS s INNER JOIN tbl_login AS u ON s.owner = u.id WHERE s.is_deleted = '0';    ";

    $Results    = mysqli_query($conn,$GetEvents);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]            = $record["id"];
            $data["name"]          = $record["name"];
            $data["businessname"]  = $record["businessname"];
            $data["owner"]         = $record["first_name"] . " " . $record["last_name"];
            $data["status"]        = $record["status"];

            array_push($ListArray,$data);

        }

    }

    return $ListArray;

}

function getStaffsCount($conn, $id){
    $Query      = "SELECT COUNT(*) AS count FROM tbl_login WHERE store = ".$id;
    $Results    = mysqli_query($conn,$Query);
    $ListArray  = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            return $record["count"];
        }

    }

}

function getServicesCount($conn, $id){
    $Query      = "SELECT COUNT(*) AS count FROM tbl_services WHERE store = ".$id;
    $Results    = mysqli_query($conn,$Query);
    $ListArray  = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            return $record["count"];
        }

    }

}

function getOrdersCount($conn, $id){
    $Query      = "SELECT COUNT(*) AS count FROM tbl_orders WHERE store = ".$id;
    $Results    = mysqli_query($conn,$Query);
    $ListArray  = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            return $record["count"];
        }

    }

}
?>