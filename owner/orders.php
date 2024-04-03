<?php 
include "includes/header.php"; 
include "../includes/functions.php"; 


$Orders = getOwnerOrders($conn, $_SESSION["oid"]);
$Category = getAllCategories($conn);

?>



<section class="ftco-section" style="padding-top: 30px;min-height:600px;background:url(../images/shop-counters-unfocused.jpg);background-size:cover;">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="myorders-tab" data-toggle="tab" href="#myorders" role="tab" aria-controls="myorders" aria-selected="true">My Orders</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="myorders" role="tabpanel" aria-labelledby="myorders-tab">
						<div class="col-12 col-sm-8 col-lg-12">
                            <table class="table table-striped" style="color: #fff;">
                                <thead style="background: deeppink;">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Order Date</th>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Service</th>
                                        <th scope="col">Prefered</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody style="color: black;
    background: antiquewhite;">
                                <?php
							
                                    foreach ($Orders as $value) 
                                    {
                                        echo '<tr>
                                        <th scope="row" style="height: 40px;vertical-align: middle;">'.$value["order_id"].'</th>
                                        <td style="height: 40px;vertical-align: middle;">'.$value["order_date"].'</td>
                                        <td style="height: 40px;vertical-align: middle;">'.$value["first_name"]. " " . $value["last_name"] .'</td>
                                        <td style="height: 40px;vertical-align: middle;">'.$value["service_name"].'</td>
                                        <td style="height: 40px;vertical-align: middle;">'.ucwords($value["type"]).'</td>
                                        <td style="height: 40px;vertical-align: middle;">'.$value["action"].'</td>
                                        <td style="height: 40px;vertical-align: middle;">
                                            <select class="form-control" style="height: 40px !important;outline: none;border: 0px;" onchange="assignStaff(\''.$value["order_id"].'\', this)"><option value="">Assign Staff</option>';

                                        $StoreStaff = getStoreStaff($conn, $value["store"]);
                                        foreach ($StoreStaff as $staff) 
                                        { 
                                            $selectAssigned = "";

                                            if($value["staff"] == $staff["id"])
                                            {
                                                $selectAssigned = "selected";
                                            }

                                            echo '<option value="'.$staff["id"].'" '.$selectAssigned.'>'.$staff["first_name"] ." ". $staff["last_name"] .'</option>';
                                        }
                                        echo '</select></td></tr>';
                                    }
                                ?>

                                </tbody>
                            </table>
						</div>
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