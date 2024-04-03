<?php 
include "includes/header.php"; 
include "includes/functions.php"; 

$StoresInfo      = getStoreInfo($conn, $_GET["store"]);
$StoreCategories = getStoreCategories($conn, $_GET["store"]);
$HomeCategories  = getHomeCategories($conn, $_GET["store"]);
$CartCount       = getCartCount($conn, $_GET["store"], isset($_SESSION["uid"]) ? $_SESSION["uid"] : '0');
$Profile         = getProfileDetails($conn, isset($_SESSION["uid"]) ? $_SESSION["uid"] : '0');

$UserName =  isset($_SESSION["uid"]) ? $Profile["first_name"] . " " . $Profile["last_name"] : 'Demo User';
$UserImage = isset($_SESSION["uid"]) ? $Profile["image"] : SITE_URL.'images/default/profile.jpg';

?>
    <!-- <section class="ftco-section" style="padding:0px;background-color:#fff;">
    	<div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                <img class="card-img-top" id="displaystorebanner" style="height:280px;border-radius:20px;" src="<?php echo $StoresInfo['banner']; ?>" alt="image-top">
                </div>
            </div>
    	</div>
    </section> -->

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fusion Parlor</title>

        <style>
	 .btn.btn-primary {
    background: #de1794;
    border: 1px solid #B885C1;
    color: white; }
    .btn.btn-primary:hover {
      border: 1px solid #fff;
      background:#f3ade7  !important;
      color: #de1794; }
      .ftco-navbar-light {
      background: #de1794 !important;
      position: relative;
      height: 81px;
      
 } 
 .list-group-item.active {
    background:deeppink;
 }
 .ftco-section {
  background:url(./images/blurred-bar-with-stools.jpg);
  background-size:cover;
 }

 .nav-tabs .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: 0.25rem;
    border-top-right-radius: 0.25rem;
    color: black;
    font-weight: 600;
}
	</style>
    </head>
    <body style="background: #ffd9e85e;">
        
   

    <section class="ftco-section" style="position:relative;top: 0;margin: 30px 125px 300px 125px;
    border-radius: 25px;padding-top:20px;">
    	<div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h2 class="dark" id="displaystorename" style="position: relative;text-align: left;font-weight:400;"><?php echo $StoresInfo['name']; ?></h2>
                </div>
                <div class="col-md-2">
                   
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="orderonline-tab" data-toggle="tab" href="#orderonline" role="tab" aria-controls="orderonline" aria-selected="true">Book at Store</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="orderhome-tab" data-toggle="tab" href="#orderhome" role="tab" aria-controls="orderhome" aria-selected="false">Book to Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="cartitems-tab" data-toggle="tab" href="#cartitems" role="tab" aria-controls="cartitems" aria-selected="false">Cart <span id="cart-count-no" style="color: black;background-color: white;display: inline-block;padding: 5px;font-size: 12px;line-height: 1;text-align: center;white-space: nowrap;vertical-align: baseline;border-radius: 5px;font-family: 'Montserrat', Arial, sans-serif;"><?php echo $CartCount; ?></span></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent" >
                        <div class="tab-pane fade show active" id="orderonline" role="tabpanel" aria-labelledby="orderonline-tab">
                            <div class="col-12 col-sm-8 col-lg-12">
                                <div class="row"  style="padding-top:30px;">
                                    <div class="col-md-4" style="height:500px;">
                                        <div class="list-group" id="Orderlist-tab" role="tablist" style="overflow-y: scroll;height: 500px;">
                                            <?php
                                                $ServiceList = "";
                                                $ActiveCount = 1;
                                                foreach ($StoreCategories as $value) {
                                                    if($ActiveCount == 1){
                                                        echo '<a class="list-group-item list-group-item-action active" id="list-home-list" data-type="store" data-service="at_store" data-category="'.$value["id"].'" data-store="'.$value["store"].'" data-toggle="list" href="#list-StoreServices" role="tab" aria-controls="home">
                                                        <div class="image-parent" style="display: inline-block;margin-right: 20px;">
                                                            <img src="'.$value["image"].'" style="height: 50px;width: 50px;border-radius: 50%;" alt="quixote">
                                                        </div>
                                                        '.$value["name"].'</a>';

                                                        $ServiceList = getServiceContent($conn, $value["id"], $value["store"], "at_store", "store");
                                                    }else{
                                                        echo '<a class="list-group-item list-group-item-action" id="list-home-list" data-type="store"  data-service="at_store" data-category="'.$value["id"].'" data-store="'.$value["store"].'"    data-toggle="list" href="#list-StoreServices" role="tab" aria-controls="home">
                                                        <div class="image-parent" style="display: inline-block;margin-right: 20px;">
                                                            <img src="'.$value["image"].'" style="height: 50px;width: 50px;border-radius: 50%;" alt="quixote">
                                                        </div>
                                                        '.$value["name"].'</a>';
                                                    }

                                                    ++$ActiveCount;
                                        
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="height:500px;overflow-y:scroll;">
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="list-StoreServices" role="tabpanel" aria-labelledby="list-home-list">
                                                <ul id="list-StoreServicesContainer" class="list-group list-group-flush">
                                                    <?php echo $ServiceList; ?>
                                                    <!-- <li  class="list-group-item" style="margin-bottom: 10px;border-radius: 5px;">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="row main align-items-center" style="margin:0px;">
                                                                        <div class="col-2">
                                                                            <img class="img-fluid" style="border-radius: 10px;" src="https://i.imgur.com/1GrakTl.jpg">
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="row text-muted">Shirt</div>
                                                                            <div class="row">Cotton T-shirt</div>
                                                                        </div>
                                                                        <div class="col">&euro; 44.00 </div>
                                                                        <div class="col" style="text-align: right;">
                                                                            <button type="button" style="  background-color: #B885C1;outline: none;border: none;" class="btn btn-secondary btn-sm" id="bt_cart"  >Add to cart</button>
                                                                            <a href="#" style="display:none;"><img class="img-fluid" style="border-radius: 10px;height: 28px;" src="images/icons/remove.png"></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                    </li> -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="orderhome" role="tabpanel" aria-labelledby="orderhome-tab">				
                            <div class="col-12 col-sm-8 col-lg-12">
                                <div class="row"  style="padding-top:30px;">
                                    <div class="col-md-4" style="height:500px;">
                                        <div class="list-group" id="Homelist-tab" role="tablist" style="overflow-y: scroll;height: 500px;">
                                            <?php
                                                $HomeServiceList = "";
                                                $ActiveCount = 1;
                                                foreach ($HomeCategories as $value) {
                                                    if($ActiveCount == 1){
                                                        echo '<a class="list-group-item list-group-item-action active" id="list-home-list" data-type="home" data-service="at_home" data-category="'.$value["id"].'" data-store="'.$value["store"].'" data-toggle="list" href="#list-HomeServices" role="tab" aria-controls="home">
                                                        <div class="image-parent" style="display: inline-block;margin-right: 20px;">
                                                            <img src="'.$value["image"].'" style="height: 50px;width: 50px;border-radius: 50%;" alt="quixote">
                                                        </div>
                                                        '.$value["name"].'</a>';

                                                        $HomeServiceList = getServiceContent($conn, $value["id"], $value["store"], "at_home", "home");
                                                    }else{
                                                        echo '<a class="list-group-item list-group-item-action" id="list-home-list" data-type="home" data-service="at_home" data-category="'.$value["id"].'" data-store="'.$value["store"].'"    data-toggle="list" href="#list-HomeServices" role="tab" aria-controls="home">
                                                        <div class="image-parent" style="display: inline-block;margin-right: 20px;">
                                                            <img src="'.$value["image"].'" style="height: 50px;width: 50px;border-radius: 50%;" alt="quixote">
                                                        </div>
                                                        '.$value["name"].'</a>';
                                                    }

                                                    ++$ActiveCount;
                                        
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="height:500px;overflow-y:scroll;">
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="list-HomeServices" role="tabpanel" aria-labelledby="list-home-list">
                                                <ul id="list-HomeServicesContainer" class="list-group list-group-flush">
                                                    <?php echo $HomeServiceList; ?>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="cartitems" role="tabpanel" aria-labelledby="cartitems-tab">				
                            <div class="col-12 col-sm-8 col-lg-12">
                                <div class="row"  style="padding-top:30px;">
                                    <div class="col-md-8" style="height:500px;overflow-y:scroll;">
                                        <ul id="list-CartContainer" class="list-group list-group-flush">
                                            
                                        </ul>
                                    </div>
                                    <div class="col-md-4" style="height:500px;">
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="col-md-12" style="color:black;font-weight: 600;">
                                                <div class="row d-flex justify-content-between px-4">
                                                    <p class="mb-1 text-left">Subtotal</p>
                                                    <h6 class="mb-1 text-right" id="subtotal-value">₹ 0.00</h6>
                                                </div>
                                                <div class="row d-flex justify-content-between px-4">
                                                    <p class="mb-1 text-left">GST</p>
                                                    <h6 class="mb-1 text-right" id="gst-value">₹ 0.00</h6>
                                                </div>
                                                <div class="row d-flex justify-content-between px-4" id="tax">
                                                    <p class="mb-1 text-left">Total (tax included)</p>
                                                    <h6 class="mb-1 text-right" id="total-value">₹ 0.00</h6>
                                                </div>
                                                <input type="hidden" id="totalamount" value="">

                                             
                                                <button type="button" class="btn btn-primary btn-lg bt_checkout" style="width: 100%;margin-top: 50px;" onclick="pay_now()">
                                                    <span>
                                                        <span  style="color:#fff;">Pay</span>
                                                        <span style="color:#fff;" id="pay-value">₹ 0.00</span>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
    	</div>
    </section>
    <script src="js/jquery.min.js"></script>

    <script>

        function list_mycart_items(store,user)
        {

            $.ajax({
                url: "api/common.php",
                type: "POST",
                data: {
                            action: "cart_items", 
                            user: user, 
                            store: store,
                    },
                success: function(data) {
                    var details = JSON.parse(data);
            
                    if (details["status"] == "200") {

                        $("#list-CartContainer").html("");
                        $("#list-CartContainer").html(details["HTML"]);
            
                    } else {
                            alert( details["message"]);
                    }
                },
                error: function() {
                    alert("E4: Add Favourite Error.");
                    return false;
                }
            });
        }

        function calculate_amount(store,user)
        {

            $.ajax({
                url: "api/common.php",
                type: "POST",
                data: {
                            action: "calculate_amount", 
                            user: user, 
                            store: store,
                    },
                success: function(data) {
                    var details = JSON.parse(data);
            
                    if (details["status"] == "200") {

                        $("#subtotal-value").text("₹ "+details["SubTotal"]);
                        $("#gst-value").text("₹ "+details["GST"]);
                        $("#total-value").text("₹ "+details["Total"]);
                        $("#pay-value").text("₹ "+details["Total"]);
                        $("#totalamount").val(details["Total"]);

                    } else {
                            alert( details["message"]);
                    }
                },
                error: function() {
                    alert("E4: Add Favourite Error.");
                    return false;
                }
            });
        }


        $(document).ready(function(){
            setInterval(function(){ 
                list_mycart_items("<?php echo $_GET["store"]; ?>", "<?php echo isset($_SESSION["uid"]) ? $_SESSION["uid"] : '0' ?>");

                calculate_amount("<?php echo $_GET["store"]; ?>", "<?php echo isset($_SESSION["uid"]) ? $_SESSION["uid"] : '0' ?>");
            }, 5000);
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script type="text/javascript">

        function pay_now()
        {
            var name          = "<?php echo $UserName; ?>";
            var amount        = $("#totalamount").val();
            var actual_amount = parseInt(amount) * 100;
            var description   = "Beauty Parlor";

            var options = {
                "key": "<?php echo PAYMENT_KEY; ?>", 
                "amount": actual_amount, 
                "currency": "INR",
                "name": name,
                "description": description,
                "image": "<?php echo $UserImage; ?>",
                "handler": function (response){
                    $.ajax({
                        url: 'api/common.php',
                        'type': 'POST',
                        'data': {
                            'action': 'payment',
                            'name':name,
                            'user': "<?php echo isset($_SESSION["uid"]) ? $_SESSION["uid"] : '0'; ?>",
                            'store': "<?php echo $_GET["store"]; ?>",
                            'payment_id':response.razorpay_payment_id,
                            'amount':actual_amount,
                            'total':amount,
                        },
                        success:function(data){
                            console.log(data);
                            window.location.href = 'thank_you.php';
                        }
    
                    });
                },
            };

            var rzp1 = new Razorpay(options);
            rzp1.on('payment.failed', function (response){
                    alert(response.error.code);
                    alert(response.error.description);
                    alert(response.error.source);
                    alert(response.error.step);
                    alert(response.error.reason);
                    alert(response.error.metadata.order_id);
                    alert(response.error.metadata.payment_id);
            });

            rzp1.open();
        }
    </script>
 </body>
   <?php include "includes/footer.php"; ?>
</html>