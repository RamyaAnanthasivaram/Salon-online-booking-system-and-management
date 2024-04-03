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
    <title>Document</title>
</head>
<body>
<section class="ftco-section">
    	<div class="container">
    		<div class="row">
         
		  		<div id="storecontainer" style="display:flex;flex-wrap: wrap;justify-content: center;">
				  		<?php
							
							foreach ($StoresList as $value) 
							{
								echo '<div class="text-center" style="cursor:pointer;"  onclick="viewgallery(\''.$value["id"].'\')">
								<div class="card" style="width:20rem;background-color: #f8baff;border-radius:20px;">
									<div>
										<img class="card-img-top" id="displaystorebanner" style="height:180px;border-top-left-radius:20px;border-top-right-radius:20px;" src="'.$value["banner"].'" alt="image-top">
										<img src="'.$value["logo"].'" id="displaystorelogo" alt="profile-image" style="width:80px;position: relative;top: -30px;left: -100px;border-radius: 10%;border: 4px solid white;height: 80px;" class="profile">
										<h6 class="dark" id="displaystorename" style="position: relative;top: -70px;left: 110px;text-align: left;width: 200px;font-weight:600;">'.$value["name"].'</h6>
									</div>
								</div>
							</div>  ';
							}
						?>
                        
          </div>
          
        </div>
    	</div>
    </section>
</body>
</html>

	

		