<?php 

include "includes/header.php";
include "../includes/functions.php"; 

$StoreList = getAllOpenStores($conn, $_SESSION["oid"]);
$StaffList = getAllStaff($conn, $_SESSION["oid"]);

?>

<style>
	.nav-tabs .nav-link{
		color:black;
	}
	.list-group-item.active {
    z-index: 2;
    color: hsl(229, 23%, 23%) !important;
    background-color: deeppink;
    border-color: #f8baff;
    font-weight: 600;
}
.btn.btn-primary:hover {
      border: 1px solid #fff;
      background: #f3ade7 !important;
      color: deeppink; }
	</style>



<section class="ftco-section" style="padding-top:30px;min-height:600px;background:url(../images/blur-shopping-mall.jpg);background-size:cover;">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="allstaffs-tab" data-toggle="tab" href="#allstaffs" role="tab" aria-controls="allstaffs" aria-selected="true">All Staffs</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="addstaff-tab" data-toggle="tab" href="#addstaff" role="tab" aria-controls="addstaff" aria-selected="false">Add Staff</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent" >
					<div class="tab-pane fade show active" id="allstaffs" role="tabpanel" aria-labelledby="allstaffs-tab">
						<div class="col-12 col-sm-8 col-lg-12">
							<div class="row"  style="padding-top:30px;">
								<div class="col-4" >
									<div class="list-group" id="list-tab" role="tablist" style="overflow-y: scroll;min-height: 700px;">

										<?php

											$TabCount = 1;
											foreach ($StaffList as $value) {

												if($TabCount == 1){
													echo '<a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-'.$value["id"].'" role="tab" aria-controls="home"><div class="image-parent" style="display: inline-block;margin-right: 20px;"><img src="../'.$value["image"].'" style="height: 50px;width: 50px;border-radius: 50%;" alt="quixote"></div>'.$value["first_name"] ." ". $value["last_name"] .'</a>';
												}else{
													echo '<a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#list-'.$value["id"].'" role="tab" aria-controls="home"><div class="image-parent" style="display: inline-block;margin-right: 20px;"><img src="../'.$value["image"].'" style="height: 50px;width: 50px;border-radius: 50%;" alt="quixote"></div>'.$value["first_name"] ." ". $value["last_name"] .'</a>';
												}

												++$TabCount;
											}
										?>
										<!-- <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">
											<div class="image-parent" style="display: inline-block;margin-right: 20px;">
												<img src="../images/default/logo.png" style="height: 50px;width: 50px;border-radius: 50%;" alt="quixote">
											</div>
											Home
										</a> -->
										
									</div>
								</div>
								<div class="col-8">
									<div class="tab-content" id="nav-tabContent">
										<?php
											$oid = $_SESSION["oid"];
											$ContentCount = 1;
											foreach ($StaffList as $value) 
											{
												$CurrentStore = $value["store"];

												if($ContentCount == 1)
												{
													echo'<div class="tab-pane fade show active" id="list-'.$value["id"].'" role="tabpanel" aria-labelledby="list-home-list">
													<ul class="nav nav-tabs" id="myTab" role="tablist">
														<li class="nav-item">
															<a class="nav-link active" id="staffinfo-tab" data-toggle="tab" href="#staffinfo" role="tab" aria-controls="staffinfo" aria-selected="true">Info</a>
														</li>
														
													</ul>
													<div class="tab-content" id="myTabContent" >
														<div class="tab-pane fade show active" id="staffinfo" role="tabpanel" aria-labelledby="staffinfo-tab">
															<div class="col-12 col-sm-8 col-lg-12">
																<form class="file-upload" id="updatestaffinfo-'.$value["id"].'" method="post">
																	<input type="hidden" name="action" value="update_staff">
																	<input type="hidden" name="id" value="'.$oid.'">
																	<input type="hidden" name="sid" value="'.$value["id"].'">
																	<div class="row g-3">
																		
																		<div class="col-md-6">
																			<label class="form-label">First Name *</label>
																			<input type="text" class="form-control" id="firstname" name="firstname" placeholder="" aria-label="First name" value="'.$value["first_name"].'">
																		</div>
																		<div class="col-md-6">
																			<label class="form-label">Last Name *</label>
																			<input type="text" class="form-control" id="lastname" name="lastname" placeholder="" aria-label="Last name" value="'.$value["last_name"].'">
																		</div>
																		<div class="col-md-6">
																			<label for="inputEmail4" class="form-label">Email *</label>
																			<input type="email" class="form-control" id="email" name="email" value="'.$value["email"].'">
																		</div>
																		<div class="col-md-6">
																			<label class="form-label">Username *</label>
																			<input type="text" class="form-control" id="username" name="username" placeholder="" aria-label="Username" value="'.$value["username"].'">
																		</div>
																		<div class="col-md-6">
																			<label class="form-label">Address *</label>
																			<input type="text" class="form-control" id="address" name="address" placeholder="" aria-label="Address" value="'.$value["address"].'">
																		</div>
																		<div class="col-md-6">
																			<label class="form-label">City *</label>
																			<input type="text" class="form-control" id="city" name="city" placeholder="" aria-label="City" value="'.$value["city"].'">
																		</div>
																		<div class="col-md-6">
																			<label class="form-label">State *</label>
																			<input type="text" class="form-control" id="state" name="state" placeholder="" aria-label="State" value="'.$value["state"].'">
																		</div>
																		<div class="col-md-6">
																			<label class="form-label">Country *</label>
																			<input type="text" class="form-control" id="country" name="country" placeholder="" aria-label="Country" value="'.$value["country"].'">
																		</div>
																		<div class="col-md-6">
																			<label class="form-label">Zip *</label>
																			<input type="text" class="form-control" id="zip" name="zip" placeholder="" aria-label="Zip" value="'.$value["zip"].'">
																		</div>
																		<div class="col-md-6">
																			<label class="form-label">Phone number *</label>
																			<input type="text" class="form-control" id="phone" name="phone" placeholder="" aria-label="Phone number" value="'.$value["mobile"].'">
																		</div>
																	</div>	
																	<label class="form-label">Assigned Store *</label>
																	<select class="form-control" name="assignstore" id="assignstore">
																	<option value="">Select Store</option>';
																	

																	foreach ($StoreList as $data) 
																	{
																		$Selected 	  = "";
																		$getStore = $data["id"];
																		if($CurrentStore == $getStore)
																		{
																			$Selected = "selected";
																		}

																		echo '<option value="'.$data["id"].'"'.$Selected.'>'.$data["name"].'</option>';
																	}
																	echo'</select>
																	<div class="gap-3 d-md-flex justify-content-md-end text-center" style="margin-top: 50px;">
																		<button type="button" class="btn btn-primary btn-lg" style="background: deeppink;" onclick="updatestaffinfo(\'updatestaffinfo-'.$value["id"].'\')"  >Update Staff Details</button>
																	</div>
																</form> 
		
															</div>
														</div>
													</div>
												</div>';
												}else{
													echo '<div class="tab-pane fade show" id="list-'.$value["id"].'" role="tabpanel" aria-labelledby="list-home-list">
													<ul class="nav nav-tabs" id="myTab" role="tablist">
														<li class="nav-item">
															<a class="nav-link active" id="staffinfo-tab" data-toggle="tab" href="#staffinfo" role="tab" aria-controls="staffinfo" aria-selected="true">Info</a>
														</li>
														
													</ul>
													<div class="tab-content" id="myTabContent" >
														<div class="tab-pane fade show active" id="staffinfo" role="tabpanel" aria-labelledby="staffinfo-tab">
															<div class="col-12 col-sm-8 col-lg-12">
																<form class="file-upload" id="updatestaffinfo-'.$value["id"].'" method="post">
																	<input type="hidden" name="action" value="update_staff">
																	<input type="hidden" name="id" value="'.$oid.'">
																	<input type="hidden" name="sid" value="'.$value["id"].'">
																	<div class="row g-3">
																		
																		<div class="col-md-6">
																			<label class="form-label">First Name *</label>
																			<input type="text" class="form-control" id="firstname" name="firstname" placeholder="" aria-label="First name" value="'.$value["first_name"].'">
																		</div>
																		<div class="col-md-6">
																			<label class="form-label">Last Name *</label>
																			<input type="text" class="form-control" id="lastname" name="lastname" placeholder="" aria-label="Last name" value="'.$value["last_name"].'">
																		</div>
																		<div class="col-md-6">
																			<label for="inputEmail4" class="form-label">Email *</label>
																			<input type="email" class="form-control" id="email" name="email" value="'.$value["email"].'">
																		</div>
																		<div class="col-md-6">
																			<label class="form-label">Username *</label>
																			<input type="text" class="form-control" id="username" name="username" placeholder="" aria-label="Username" value="'.$value["username"].'">
																		</div>
																		<div class="col-md-6">
																			<label class="form-label">Address *</label>
																			<input type="text" class="form-control" id="address" name="address" placeholder="" aria-label="Address" value="'.$value["address"].'">
																		</div>
																		<div class="col-md-6">
																			<label class="form-label">City *</label>
																			<input type="text" class="form-control" id="city" name="city" placeholder="" aria-label="City" value="'.$value["city"].'">
																		</div>
																		<div class="col-md-6">
																			<label class="form-label">State *</label>
																			<input type="text" class="form-control" id="state" name="state" placeholder="" aria-label="State" value="'.$value["state"].'">
																		</div>
																		<div class="col-md-6">
																			<label class="form-label">Country *</label>
																			<input type="text" class="form-control" id="country" name="country" placeholder="" aria-label="Country" value="'.$value["country"].'">
																		</div>
																		<div class="col-md-6">
																			<label class="form-label">Zip *</label>
																			<input type="text" class="form-control" id="zip" name="zip" placeholder="" aria-label="Zip" value="'.$value["zip"].'">
																		</div>
																		<div class="col-md-6">
																			<label class="form-label">Phone number *</label>
																			<input type="text" class="form-control" id="phone" name="phone" placeholder="" aria-label="Phone number" value="'.$value["mobile"].'">
																		</div>
																	</div>	
																	<label class="form-label">Assigned Store *</label>
																	<select class="form-control" name="assignstore" id="assignstore">
																	<option value="">Select Store</option>';
																	

																	foreach ($StoreList as $data) 
																	{
																		$Selected 	  = "";
																		$getStore = $data["id"];
																		if($CurrentStore == $getStore)
																		{
																			$Selected = "selected";
																		}

																		echo '<option value="'.$data["id"].'"'.$Selected.'>'.$data["name"].'</option>';
																	}
																		
																	echo'</select>
																	<div class="gap-3 d-md-flex justify-content-md-end text-center" style="margin-top: 50px;">
																		<button type="button" class="btn btn-primary btn-lg" onclick="updatestaffinfo(\'updatestaffinfo-'.$value["id"].'\')"  >Update Staff Details</button>
																	</div>
																</form> 
		
															</div>
														</div>
													</div>
												</div>';
												}
												++$ContentCount;
											}
										?> 
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="addstaff" role="tabpanel" aria-labelledby="addstaff-tab">				
						<form class="file-upload" id="staffinfo" method="post" style="background: rgba(255, 255, 255, 0.5);">
							<input type="hidden"name="action" value="add_staff">
							<input type="hidden"name="id" value="<?php echo $_SESSION["oid"]; ?>">

							<div class="row mb-5 gx-5">
								<div class="col-12 mb-5 mb-xxl-0">
									<div class="px-4 py-5 rounded">
										<div class="row g-3">
											<div class="col-md-4">
												<label class="form-label">First Name *</label>
												<input type="text" class="form-control" id="firstname" name="firstname" placeholder="" aria-label="First name" value="">
											</div>
											<div class="col-md-4">
												<label class="form-label">Last Name *</label>
												<input type="text" class="form-control" id="lastname" name="lastname" placeholder="" aria-label="Last name" value="">
											</div>
											<div class="col-md-4">
												<label for="inputEmail4" class="form-label">Email *</label>
												<input type="email" class="form-control" id="email" name="email" value="">
											</div>
											<div class="col-md-4">
												<label class="form-label">Username *</label>
												<input type="text" class="form-control" id="username" name="username" placeholder="" aria-label="Username" value="">
											</div>
											<div class="col-md-4">
												<label class="form-label">Address *</label>
												<input type="text" class="form-control" id="address" name="address" placeholder="" aria-label="Address" value="">
											</div>
											<div class="col-md-4">
												<label class="form-label">City *</label>
												<input type="text" class="form-control" id="city" name="city" placeholder="" aria-label="City" value="">
											</div>
											<div class="col-md-4">
												<label class="form-label">State *</label>
												<input type="text" class="form-control" id="state" name="state" placeholder="" aria-label="State" value="">
											</div>
											<div class="col-md-4">
												<label class="form-label">Country *</label>
												<input type="text" class="form-control" id="country" name="country" placeholder="" aria-label="Country" value="">
											</div>
											<div class="col-md-4">
												<label class="form-label">Zip *</label>
												<input type="text" class="form-control" id="zip" name="zip" placeholder="" aria-label="Zip" value="">
											</div>
											<div class="col-md-4">
												<label class="form-label">Phone number *</label>
												<input type="text" class="form-control" id="phone" name="phone" placeholder="" aria-label="Phone number" value="">
											</div>
											<div class="col-md-8">
												<label class="form-label">Select Store *</label>
												<select class="form-control" name="assignstaff" id="assignstaff">
													<option value="">Select Store</option>
													<?php
														foreach ($StoreList as $value) {
															echo '<option value="'.$value["id"].'">'.$value["name"].'</option>';
														}
													?>
												</select>
											</div>
										</div>
										<div class="gap-3 d-md-flex justify-content-md-end text-center" style="margin-top: 50px;">
											<button type="button" class="btn btn-primary btn-lg" id="bt_addstaff" style="background:deeppink;" >Add Staff</button>
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
<section class="footer">
      <div class="footer-row">
        <div class="footer-col">
          <p >
		     Copyright ©2024 All rights reserved|Fusion Parlor
          </p>
          <div class="icons">
            <i class="fa-brands fa-facebook-f"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-linkedin"></i>
            <i class="fa-brands fa-github"></i>
          </div>
        </div>
      </div>
    </section>


<?php include "includes/footer.php"; ?>