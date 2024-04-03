<?php 
include "includes/header.php"; 
include "../includes/functions.php"; 

$Profile = getProfileDetails($conn, $_SESSION["aid"]);

$ProfilePic = empty($Profile["image"]) ? 'images/default/profile.jpg' : $Profile["image"];
?>



    <section class="ftco-section" style="padding:0px;background:#ffd9e8 !important;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="my-5">
                            <h3>My Profile</h3>
                            <hr>
                        </div>
                        <form class="file-upload" id="profileinfo" method="post">
                             <input type="hidden"name="action" value="update_profile">

                            <input type="hidden"name="id" value="<?php echo $_SESSION["aid"]; ?>">

                            <div class="row mb-5 gx-5">
                                <div class="col-8 mb-5 mb-xxl-0" style="background: pink;">
                                    <div class="bg-secondary-soft px-4 py-5 rounded">
                                    <h4 class="mb-4 mt-0">Contact detail</h4>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label" style="color: black;">First Name</label>
                                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="" aria-label="First name" value="<?php echo $Profile["first_name"]; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" style="color: black;">Last Name</label>
                                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="" aria-label="Last name" value="<?php echo $Profile["last_name"]; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4" class="form-label" style="color: black;">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $Profile["email"]; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" style="color: black;">Username</label>
                                                <input type="text" class="form-control" id="username" name="username" placeholder="" aria-label="Username" value="<?php echo $Profile["username"]; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" style="color: black;">Address</label>
                                                <input type="text" class="form-control" id="address" name="address" placeholder="" aria-label="Address" value="<?php echo $Profile["address"]; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" style="color: black;">City</label>
                                                <input type="text" class="form-control" id="city" name="city" placeholder="" aria-label="City" value="<?php echo $Profile["city"]; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" style="color: black;">State</label>
                                                <input type="text" class="form-control" id="state" name="state" placeholder="" aria-label="State" value="<?php echo $Profile["state"]; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" style="color: black;">Country</label>
                                                <input type="text" class="form-control" id="country" name="country" placeholder="" aria-label="Country" value="<?php echo $Profile["country"]; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" style="color: black;">Zip</label>
                                                <input type="text" class="form-control" id="zip" name="zip" placeholder="" aria-label="Zip" value="<?php echo $Profile["zip"]; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" style="color: black;">Phone number</label>
                                                <input type="text" class="form-control" id="phone" name="phone" placeholder="" aria-label="Phone number" value="<?php echo $Profile["mobile"]; ?>">
                                            </div>
                                        </div>
                                        <div class="gap-3 d-md-flex justify-content-md-end text-center" style="margin-top: 50px;">
                                            <button type="button" class="btn btn-primary btn-lg" id="ownerupdateprofile" style="margin-right: 286px;width: 132px;
    height: 60px;" >Update profile</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4" style="background: pink;
    height: 720px;">
                                    <div class="bg-secondary-soft px-4 py-5 rounded">
                                        <div class="row g-3" style="justify-content: center;">
                                            <h4 class="mb-4 mt-0">Upload your profile photo</h4>
                                            <div class="text-center">
                                                <div class="square position-relative display-2 mb-3">
                                                     <img id="userr_profile.png" src="<?php echo '../'.$ProfilePic; ?> " style="height:250px;width:250px;border-radius: 50%;">
                                                </div>
                                                <input type="file" id="profilepic" name="profilepic" hidden="">
                                                <label class="btn btn-success-soft btn-block" for="profilepic" style="background-color:#de1794;">Upload</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </form> 
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



    <script>

    </script>

    

<?php include "includes/footer.php"; ?>