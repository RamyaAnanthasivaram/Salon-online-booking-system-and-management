<?php 
include "includes/header.php"; 
include "../includes/functions.php"; 

$Stores = getAllStores($conn,$_SESSION["oid"]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <style>
    .btn.btn-primary {
    background: deeppink;
    border: 1px solid #B885C1;
    color: #fff;
}
.btn.btn-primary:hover {
      border: 1px solid #fff;
      background: #f3ade7 !important;
      color: deeppink; 
    }
    </style>

</head>
<body style="background:url(../images/towels-with-flowers-light-table-against-blurred-background.jpg);background-size:cover;">
    


<section class="ftco-section" style="padding-top:30px;background:transparent;">
	<div class="container">
		<div class="row">
			<div class="col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="mystores-tab" data-toggle="tab" href="#mystores" role="tab" aria-controls="mystores" aria-selected="true">My Stores</a>
					</li>
					<!-- <li class="nav-item">
						<a class="nav-link" id="addstores-tab" data-toggle="tab" href="#addstores" role="tab" aria-controls="addstores" aria-selected="false">Add New Store</a>
					</li> -->
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="mystores" role="tabpanel" aria-labelledby="mystores-tab">
						<div class="col-12 col-sm-8 col-lg-12" style="padding-top: 20px;">
                            <div id="storecontainer" style="display:flex;flex-wrap: wrap;justify-content: center;">
                                <?php
                                    foreach ($Stores as $value) 
                                    {
                                        $store_status = "";

                                        if($value["status"] == "Closed" || $value["status"] == "Approved" )
                                        {
                                            $store_status = '<button type="button" onclick="store_status(\'Open\',\''.$value["id"].'\')" class="btn btn-primary btn-lg bt_store_stat" > Open </button>';
                                        }if($value["status"] == "Requested" || $value["status"] == "On Hold" || $value["status"] == "Declined" ){
                                            $store_status = '<button type="button" class="btn btn-primary btn-lg bt_store_stat" > '.$value["status"].' </button>';
                                        }else if($value["status"] == "Open" ){
                                            $store_status = '<button type="button" onclick="store_status(\'Closed\',\''.$value["id"].'\')" class="btn btn-primary btn-lg bt_store_stat" > Close </button>';
                                        }

                                        echo '<div class="card" style="width:18rem;background-color: rgba(255, 255, 255, 0.5);;">
                                            <div>
                                                <img class="card-img-top" style="height:207px;" src="../'.$value["banner"].'" alt="image-top"></img>
                                                <img src="../'.$value["logo"].'" alt="profile-image" style="width:100px;" class="profile">
                                            </div>
                                            <div class="card-body">
                                                <h5 class="dark"> '.$value["name"].' </h5>
                                                <p class="card-text">   
                                                    <span class="grey" style="font-size: 14px;">'.$value["gst"].'</span>
                                                </p>
                                                '.$store_status.'
                                            </div>  
                                            <hr class="line"> 
                                            <div>
                                                <div class="stats">
                                                    <p class="m-0 dark">'.getStaffsCount($conn,$value["id"]).'</p>
                                                    <p class="grey">Staffs</p>
                                                </div>
                                                <div class="stats">
                                                    <p class="m-0 dark">'.getServicesCount($conn,$value["id"]).'</p>
                                                    <p class="grey">Services</p>
                                                </div>
                                                <div class="stats">
                                                    <p class="m-0 dark">'.getOrdersCount($conn,$value["id"]).'</p>
                                                    <p class="grey">Orders</p>
                                                </div> 
                                            </div>
                                        </div>';
                                    }
                                ?>
                            </div>
						</div>
					</div>
					<div class="tab-pane fade" id="addstores" role="tabpanel" aria-labelledby="addstores-tab">				
						<form class="file-upload" id="newstoreinfo" method="post">
							<input type="hidden" name="action" value="add_new_store">
							<input type="hidden" name="id" value="<?php echo $_SESSION["oid"]; ?>">
							<div class="row mb-5 gx-5">
								<div class="col-12 mb-5 mb-xxl-0">
									<div class=" px-4 py-5 rounded">
										<div class="row g-3">
											<div class="col-md-4" style="justify-content: center;">
												<div class="text-center">
                                                    <div class="card" style="width:18rem;background-color: #f8baff;">
                                                        <div>
                                                            <img class="card-img-top" id="displaystorebanner" style="height:100px;" src="../images/default/banner.png" alt="image-top">
                                                            <img src="../images/default/logo.png" id="displaystorelogo" alt="profile-image" style="width:100px;" class="profile">
                                                        </div>
                                                        <div class="card-body">
                                                            <h5 class="dark" id="displaystorename"> Store Name </h5>
                                                        </div>  
                                                    </div>
												</div>
											</div>
                                            <div class="col-md-8">
                                                <label class="form-label">Store Name *</label>
												<input type="text" class="form-control" id="setstorename" name="storename" placeholder="" aria-label="Store name" value="">
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <input type="file" class="form-control" id="setstorelogo" 
                                                        name="setstorelogo" hidden/>
                                                        <label style="background-color: #B885C1;color: white;padding: 0.5rem;font-family: sans-serif;border-radius: 0.3rem;cursor: pointer;margin-top: 1rem;" for="setstorelogo">Choose File</label>
                                                        <span id="setstorelogofile" style="margin-left: 0.3rem;font-family: 'Montserrat', Arial, sans-serif;color: #fff;font-weight: 600;">No file chosen</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="file" class="form-control" id="setstorebanner" 
                                                        name="setstorebanner" hidden/>
                                                        <label style="background-color: #B885C1;color: white;padding: 0.5rem;font-family: sans-serif;border-radius: 0.3rem;cursor: pointer;margin-top: 1rem;" for="setstorebanner">Choose File</label>
                                                        <span id="setstorebannerfile" style="margin-left: 0.3rem;font-family: 'Montserrat', Arial, sans-serif;color: #fff;font-weight: 600;">No file chosen</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="inputEmail4" class="form-label">GST Number *</label>
                                                        <input type="text" class="form-control" id="gstnumber" name="gstnumber" value="">
                                                        <label class="form-label">Address *</label>
                                                        <input type="text" class="form-control" id="storeaddress" name="storeaddress" placeholder="" aria-label="Store Address" value="">
                                                        <label class="form-label">State *</label>
													    <input type="text" class="form-control" id="storestate"     name="storestate" placeholder="" aria-label="Store State" value="">
                                                        <label class="form-label">Zip *</label>
													    <input type="text" class="form-control" id="storezip" name="storezip" placeholder="" aria-label="Store Zip" value="">
                                                        <button type="button" style="margin-top: 40px;" class="btn btn-primary btn-lg" id="bt_request_new_store"  >Request New Store</button>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Incorporated Business Name *</label>
                                                        <input type="text" class="form-control" id="businessname" name="businessname" placeholder="" aria-label="Username" value="">
                                                        <label class="form-label">City *</label>
													    <input type="text" class="form-control" id="storecity" name="storecity" placeholder="" aria-label="Store City" value="">
                                                        <label class="form-label">Country *</label>
													    <input type="text" class="form-control" id="storecountry" name="storecountry" placeholder="" aria-label="Store Country" value="">
                                                        <label class="form-label">Phone number *</label>
													    <input type="text" class="form-control" id="storephone" name="storephone" placeholder="" aria-label="Store Phone number" value="">
                                                    </div>
                                                </div>
											</div>
											
										</div>
										
									</div>
								</div>
							
							</div>                            
						</form> 
					</div>
				</div>
				
			</div>
		</div>
	</div>
</section>



</body>

<script>
const setstorelogo = document.getElementById('setstorelogo');
const setstorelogofile = document.getElementById('setstorelogofile');
setstorelogo.addEventListener('change', function(){
     setstorelogofile.textContent = this.files[0].name
})

const setstorebanner = document.getElementById('setstorebanner');
const setstorebannerfile = document.getElementById('setstorebannerfile');
setstorebanner.addEventListener('change', function(){
     setstorebannerfile.textContent = this.files[0].name
})
</script>
<?php include "includes/footer.php"; ?>
</html>