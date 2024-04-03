<?php 
include "includes/header.php"; 
include "includes/functions.php"; 

$StoresList = getStores($conn);

		?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Fusion Parlor</title>

	<style>
		.ftco-section {
   
   
    background: #ffd9e8;
}
		</style>
</head>

	


<body style="background: #ffd9e8">
    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
          <!-- <div class="col-md-12"> -->
		  		<div id="storecontainer" style="display:flex;flex-wrap: wrap;justify-content: center;">
				  		<?php
							
							foreach ($StoresList as $value) 
							{
								echo '<div class="text-center" style="cursor:pointer;"  onclick="viewgallery(\''.$value["id"].'\')">
								<div class="card" style="width:20rem;background-color: deeppink;border-radius:20px;">
									<div>
										<img class="card-img-top" id="displaystorebanner" style="height:180px;border-top-left-radius:20px;border-top-right-radius:20px;" src="'.$value["banner"].'" alt="image-top">
										<img src="'.$value["logo"].'" id="displaystorelogo" alt="profile-image" style="width:80px;position: relative;top: -30px;left: -100px;border-radius: 10%;border: 4px solid white;height: 80px;" class="profile">
										<h6 class="dark" id="displaystorename" style="position: relative;top: -70px;left: 110px;text-align: left;width: 200px;font-weight:600;color: white !important;">'.$value["name"].'</h6>
									</div>
								</div>
							</div>  ';
							}
						?>
					<!-- <div class="text-center">
						<div class="card" style="width:20rem;background-color: #f8baff;border-radius:20px;">
							<div>
								<img class="card-img-top" id="displaystorebanner" style="height:180px;border-top-left-radius:20px;border-top-right-radius:20px;" src="images/default/banner.png" alt="image-top">
								<img src="images/default/logo.png" id="displaystorelogo" alt="profile-image" style="width:80px;position: relative;top: -30px;left: -100px;border-radius: 10%;border: 4px solid white;height: 80px;" class="profile">
								<h6 class="dark" id="displaystorename" style="position: relative;top: -70px;left: 110px;text-align: left;width: 200px;font-weight:600;"> Store Name </h6>
							</div>
							<div>
								<div class="stats">
									<p class="m-0 dark">80K</p>
									<p class="grey">Followers</p>
								</div>
								<div class="stats">
									<p class="m-0 dark"> 803K</p>
									<p class="grey"> Likes</p>
								</div>
								<div class="stats">
									<p class="m-0 dark">1.4K</p>
									<p class="grey"> Photos</p>
								</div> 
							</div>
						</div>
					</div>    -->
				</div> 
          </div>
          
        </div>
    	</div>
    </section>

    <section class="ftco-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center">
            <h2 class="mb-4">Our Exports</h2>
          </div>
        </div>
        <div class="row">
        	<div class="col-lg-3 d-flex mb-sm-4 ">
        		<div class="staff">
      				<div class="img mb-4" style="background-image: url(images/person_1.jpg);"></div>
      				<div class="info text-center">
      					<h3><a href="teacher-single.html">Mellisa Smith</a></h3>
      					<span class="position">Stylist</span>
      					<div class="text">
	        				<p>Meet our team of skilled beauty experts dedicated to enhancing your natural beauty and providing personalized care.</p>
	        			</div>
      				</div>
        		</div>
        	</div>
        	<div class="col-lg-3 d-flex mb-sm-4 ">
        		<div class="staff">
      				<div class="img mb-4" style="background-image: url(images/person_2.jpg);"></div>
      				<div class="info text-center">
      					<h3><a href="teacher-single.html">Marie Mush</a></h3>
      					<span class="position">Fashionist</span>
      					<div class="text">
	        				<p>Our Beauty Experts are industry-leading professionals committed to delivering exceptional beauty services tailored to your unique needs.</p>
	        			</div>
      				</div>
        		</div>
        	</div>
        	<div class="col-lg-3 d-flex mb-sm-4">
        		<div class="staff">
      				<div class="img mb-4" style="background-image: url(images/person_3.jpg);"></div>
      				<div class="info text-center">
      					<h3><a href="teacher-single.html">Ana Jacobson</a></h3>
      					<span class="position">Makeup Stylist</span>
      					<div class="text">
	        				<p>Our Beauty Experts bring expertise and passion to every service, ensuring personalized care and stunning results.</p>
	        			</div>
      				</div>
        		</div>
        	</div>
        	<div class="col-lg-3 d-flex mb-sm-4">
        		<div class="staff">
      				<div class="img mb-4" style="background-image: url(images/person_4.jpg);"></div>
      				<div class="info text-center">
      					<h3><a href="teacher-single.html">Ivan Dorchsner</a></h3>
      					<span class="position">Nail Specialist</span>
      					<div class="text">
	        				<p>Discover unparalleled expertise and personalized attention from our team of dedicated beauty professionals.</p>
	        			</div>
      				</div>
        		</div>
        	</div>
        </div>
      </div>
    </section>

	<section class="ftco-section ftco-discount img" style="background-image: url(images/bg_2.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row justify-content-end">
				<div class="col-md-5 discount">
					<h3></h3>
					<h2 class="mb-4">About</h2>
					<p class="mb-4">Welcome to Fusion parlor, the premier destination for booking beauty appointments at top salons across Fusion Parlor. With a curated selection of esteemed salons, we're here to connect you with the perfect place to pamper yourself and elevate your beauty routine.</p>
					  
				</div>
			</div>
		</div>
	</section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center">
            <h2 class="mb-4"></h2>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-4">
        		<a href="#" class="work-entry">
        			<img src="images/work-1.jpg" class="img-fluid" alt="Colorlib Template">
        			<div class="info d-flex align-items-center">
        				<div>
        					<div class="icon mb-4 d-flex align-items-center justify-content-center">
        						<span class="icon-search"></span>
        					</div>
		        			<h3>Lips Makeover</h3>
	        			</div>
        			</div>
        		</a>
        	</div>
        	<div class="col-md-4">
        		<a href="#" class="work-entry">
        			<img src="images/work-2.jpg" class="img-fluid" alt="Colorlib Template">
        			<div class="info d-flex align-items-center">
        				<div>
        					<div class="icon mb-4 d-flex align-items-center justify-content-center">
        						<span class="icon-search"></span>
        					</div>
		        			<h3>Hair Style</h3>
	        			</div>
        			</div>
        		</a>
        	</div>
        	<div class="col-md-4">
        		<a href="#" class="work-entry">
        			<img src="images/work-3.jpg" class="img-fluid" alt="Colorlib Template">
        			<div class="info d-flex align-items-center">
        				<div>
        					<div class="icon mb-4 d-flex align-items-center justify-content-center">
        						<span class="icon-search"></span>
        					</div>
		        			<h3>Makeup</h3>
	        			</div>
        			</div>
        		</a>
        	</div>
        </div>
    	</div>
    </section>

    <section class="ftco-partner ">
    	<div class="container">
		<div class="row justify-content-center">
          <div class="col-md-7 heading-section text-center">
            <h2 class="mb-4">Top brands for you</h2>
          </div>
        </div>
    		<div class="row partner justify-content-center">
    			<div class="col-md-10">
    				<div class="row">
						
						<?php
							
							foreach ($StoresList as $value) 
							{
								echo '<div class="col-md-3">
								<a href="#" class="partner-entry">
									<img src="'.$value["logo"].'" class="img-fluid" alt="'.$value["name"].'">
								</a>
							</div>';
							}
						?>
						
						

					</div>
				</div>
			</div>
    	</div>
    </section>
	


	
<style>
	 .ftco-navbar-light {
      background: #de1794 !important;
      position: relative; } 
	</style>
	
	</body>
	<?php include "includes/footer.php"; ?>	
</html>