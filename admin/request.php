<?php 
include "includes/header.php"; 
include "../includes/functions.php"; 


$Stores = getStoreRequest($conn);

?>

<section class="ftco-section" style="padding-top: 30px;min-height:600px; background:#ffd9e8 !important;">
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
                            <table class="table table-striped" style="">
                                <thead style="background:white !important;">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Store Number</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Business Name</th>
                                        <th scope="col">Store Owner</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody style="background:white !important;">
                                <?php
                                    $count = 1;
                                    foreach ($Stores as $value) 
                                    {
                                        echo '<tr>
                                        <th scope="row" style="height: 40px;vertical-align: middle;">'.$count.'</th>
                                        <td style="height: 40px;vertical-align: middle;">'.$value["id"].'</td>
                                        <td style="height: 40px;vertical-align: middle;">'.$value["name"]. '</td>
                                        <td style="height: 40px;vertical-align: middle;">'.$value["businessname"].'</td>
                                        <td style="height: 40px;vertical-align: middle;">'.ucwords($value["owner"]).'</td>
                                        <td style="height: 40px;vertical-align: middle;">'.$value["status"].'</td>
                                        <td style="height: 40px;vertical-align: middle;">
                                        <label class="btn btn-success-soft btn-block"  style="background-color:deeppink;" onclick="delete_store(\''.$value["id"].'\', this)">Delete</label>
                                        </td></tr>';

                                        ++$count;
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