<?php include "includes/header.php"; ?>



<section class="ftco-section" style="padding-top: 30px;">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="addstores-tab" data-toggle="tab" href="#addstores" role="tab" aria-controls="addstores" aria-selected="true" style="color: black;">Add Stores</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="addcategory-tab" data-toggle="tab" href="#addcategory" role="tab" aria-controls="addcategory" aria-selected="false" style="color: black;">Add Category</a>
					</li>
				</ul>
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
.form-control{
 border: deeppink !important;
}
.ftco-section {
	background: #ffd9e8;
 background-size:cover;
}
 </style>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="addstores" role="tabpanel" aria-labelledby="addstores-tab">
						<div class="col-12 col-sm-8 col-lg-12">
							<form class="file-upload" id="storeinfo" method="post">
								<input type="hidden"name="action" value="add_store">
								<input type="hidden"name="id" value="<?php echo $_SESSION["aid"]; ?>">
								<div class="row mb-5 gx-5">
									<div class="col-8 mb-5 mb-xxl-0">
										<div class="px-4 py-5 rounded">
											<h6 class="mb-4 mt-0" style="color:black;">Store Details</h6>
											<div class="row g-3" style="margin-bottom: 30px;">
												<div class="col-md-12">
													<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
														<div class="carousel-inner">
															<div class="carousel-item active">
																<img class="d-block w-100" style="height:200px;" id="banner_pic" src="../images/default/banner.png" >
															</div>
														</div>
													</div>
													<input type="file" id="bannerpic" name="bannerpic" hidden="">
													<label class="btn btn-success-soft btn-block" style="width: 50%;text-align: center;margin: 20px auto;background-color: deeppink;" for="bannerpic">Upload Banner</label>
												</div>
												<div class="col-md-12">
													<label class="form-label">Store Name *</label>
													<input type="text" class="form-control" id="storename" name="storename" placeholder="" aria-label="Store name" value="" required>
												</div>
												<div class="col-md-6">
													<label for="inputEmail4" class="form-label">GST Number *</label>
													<input type="text" class="form-control" id="gstnumber" name="gstnumber" value="" required>
												</div>
												<div class="col-md-6">
													<label class="form-label">Incorporated Business Name *</label>
													<input type="text" class="form-control" id="businessname" name="businessname" placeholder="" aria-label="Username" value="" required>
												</div>
												<div class="col-md-6">
													<label class="form-label">Address *</label>
													<input type="text" class="form-control" id="storeaddress" name="storeaddress" placeholder="" aria-label="Store Address" value="" required>
												</div>
												<div class="col-md-6">
													<label class="form-label">City *</label>
													<input type="text" class="form-control" id="storecity" name="storecity" placeholder="" aria-label="Store City" value="" required>
												</div>
												<div class="col-md-6">
													<label class="form-label">State *</label>
													<input type="text" class="form-control" id="storestate" name="storestate" placeholder="" aria-label="Store State" value="" required>
												</div>
												<div class="col-md-6">
													<label class="form-label">Country *</label>
													<input type="text" class="form-control" id="storecountry" name="storecountry" placeholder="" aria-label="Store Country" value="" required>
												</div>
												<div class="col-md-6">
													<label class="form-label">Zip *</label>
													<input type="text" class="form-control" id="storezip" name="storezip" placeholder="" aria-label="Store Zip" value="" required>
												</div>
												<div class="col-md-6">
													<label class="form-label">Phone number *</label>
													<input type="text" class="form-control" id="storephone" name="storephone" placeholder="" aria-label="Store Phone number" value="" required>
												</div>
											</div>
											<h6 class="mb-4 mt-0"  style="color:black;">Owner Details</h6>
											<div class="row g-3">
												<div class="col-md-6">
													<label class="form-label">First Name *</label>
													<input type="text" class="form-control" id="firstname" name="firstname" placeholder="" aria-label="First name" value="" required>
												</div>
												<div class="col-md-6">
													<label class="form-label">Last Name *</label>
													<input type="text" class="form-control" id="lastname" name="lastname" placeholder="" aria-label="Last name" value="" required>
												</div>
												<div class="col-md-6">
													<label for="inputEmail4" class="form-label">Email *</label>
													<input type="email" class="form-control" id="email" name="email" value="">
												</div>
												<div class="col-md-6">
													<label class="form-label">Username *</label>
													<input type="text" class="form-control" id="username" name="username" placeholder="" aria-label="Username" value="" required>
												</div>
												<div class="col-md-6">
													<label class="form-label">Address *</label>
													<input type="text" class="form-control" id="address" name="address" placeholder="" aria-label="Address" value="" required>
												</div>
												<div class="col-md-6">
													<label class="form-label">City *</label>
													<input type="text" class="form-control" id="city" name="city" placeholder="" aria-label="City" value="" required>
												</div>
												<div class="col-md-6">
													<label class="form-label">State *</label>
													<input type="text" class="form-control" id="state" name="state" placeholder="" aria-label="State" value="" required>
												</div>
												<div class="col-md-6">
													<label class="form-label">Country *</label>
													<input type="text" class="form-control" id="country" name="country" placeholder="" aria-label="Country" value="" required>
												</div>
												<div class="col-md-6">
													<label class="form-label">Zip *</label>
													<input type="text" class="form-control" id="zip" name="zip" placeholder="" aria-label="Zip" value="" required>
												</div>
												<div class="col-md-6">
													<label class="form-label">Phone number *</label>
													<input type="text" class="form-control" id="phone" name="phone" placeholder="" aria-label="Phone number" value="" required>
												</div>
											</div>
											<div class="gap-3 d-md-flex justify-content-md-end text-center" style="margin-top: 50px;">
												<button type="button" class="btn btn-primary btn-lg" id="addnewstore" style="margin-right: 286px;width: 132px;
    height: 60px;"  >Add Store</button>
											</div>
										</div>
									</div>
									<div class="col-4">
										<div class="px-4 py-5 rounded">
											<div class="row g-3" style="justify-content: center;">
												<h6 class="mb-4 mt-0"  style="color:black;">Upload your Store Image</h6>
												<div class="text-center">
													<div class="square position-relative display-2 mb-3">
															<img id="store_pic" src="../images/default/logo.png" style="height:250px;width:250px;">
													</div>
													<input type="file" id="storepic" name="storepic" hidden="">
													<label class="btn btn-success-soft btn-block" for="storepic" style="background-color:deeppink;">Upload Store Image</label>
												</div>
											</div>
										</div>
									</div>
								</div>                            
							</form> 
							
						</div>
					</div>
					<div class="tab-pane fade" id="addcategory" role="tabpanel" aria-labelledby="addcategory-tab">				
						<form class="file-upload" id="categoryinfo" method="post">
							<input type="hidden" name="action" value="add_category">

							<div class="row mb-5 gx-5" >
								<div class="col-12 mb-5 mb-xxl-0">
									<div class=" px-4 py-5 rounded">
										<div class="row g-3">
											<div class="col-md-3" style="justify-content: center;">
												<div class="text-center">
													<div class="square position-relative display-2 mb-3" style="height: 200px;">
														<img id="img_pic" src="../images/default/logo.png" style="height:200px;width:200px;border-radius: 50%;">
													</div>
													<input type="file" id="pic" name="pic" hidden="">
													<label class="btn btn-success-soft btn-block" for="pic" style="width: 50%;margin: 20px auto;background: deeppink;">Upload</label>
												</div>
											</div>
											<div class="col-md-8">
												<label class="form-label">Catgory Name *</label>
												<input type="text" class="form-control" id="categoryname" name="categoryname" placeholder="" value="">
												<label class="form-label">Pretty Name *</label>
												<input type="text" class="form-control" id="categoryprettyname" name="categoryprettyname" placeholder="" value="">
												<button type="button" style="margin-top: 40px;background: deeppink;" class="btn btn-primary btn-lg" id="bt_category"  >Add Category</button>
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

	


<style>
	label {
  display: inline-block;
  margin-bottom: 0.5rem; 
  color: #000;
  font-weight: 600;}
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




	</style>
<?php include "includes/footer.php"; ?>