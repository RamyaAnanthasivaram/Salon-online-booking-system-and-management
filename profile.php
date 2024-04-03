<?php 
include "includes/header.php"; 
include "includes/functions.php"; 

$Profile = getProfileDetails($conn, $_SESSION["uid"]);
$Orders  = getUserTransactions($conn, $_SESSION["uid"]);

$ProfilePic = empty($Profile["image"]) ? 'images/default/profile.jpg' : $Profile["image"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<section class="ftco-section" style="background: url('two-roses-lipsticks-pink-backdrop.jpg');background-size: cover;background-position: center;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="myprofile-home-tab" data-toggle="tab" href="#myprofile-home" role="tab" aria-controls="myprofile" aria-selected="true">My Profile</a>
                                <a class="nav-item nav-link" id="myorders-tab" data-toggle="tab" href="#myorders" role="tab" aria-controls="myorders" aria-selected="false">My Orders</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="myprofile-home" role="tabpanel" aria-labelledby="myprofile-home-tab">
                                <form class="file-upload" id="profileinfo" method="post">
                                    <input type="hidden"name="action" value="update_profile">
                                    <input type="hidden"name="id" value="<?php echo $_SESSION["uid"]; ?>">
                                    <div class="row mb-5 gx-5">
                                        <div class="col-8 mb-5 mb-xxl-0">
                                            <div class="px-4 py-5 rounded">
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label class="form-label">First Name *</label>
                                                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="" aria-label="First name" value="<?php echo $Profile["first_name"]; ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Last Name *</label>
                                                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="" aria-label="Last name" value="<?php echo $Profile["last_name"]; ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="inputEmail4" class="form-label">Email *</label>
                                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $Profile["email"]; ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Username *</label>
                                                        <input type="text" class="form-control" id="username" name="username" placeholder="" aria-label="Username" value="<?php echo $Profile["username"]; ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Address *</label>
                                                        <input type="text" class="form-control" id="address" name="address" placeholder="" aria-label="Address" value="<?php echo $Profile["address"]; ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">City *</label>
                                                        <input type="text" class="form-control" id="city" name="city" placeholder="" aria-label="City" value="<?php echo $Profile["city"]; ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">State *</label>
                                                        <input type="text" class="form-control" id="state" name="state" placeholder="" aria-label="State" value="<?php echo $Profile["state"]; ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Country *</label>
                                                        <input type="text" class="form-control" id="country" name="country" placeholder="" aria-label="Country" value="<?php echo $Profile["country"]; ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Zip *</label>
                                                        <input type="text" class="form-control" id="zip" name="zip" placeholder="" aria-label="Zip" value="<?php echo $Profile["zip"]; ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Phone number *</label>
                                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="" aria-label="Phone number" value="<?php echo $Profile["mobile"]; ?>">
                                                    </div>
                                                </div>
                                                <div class="gap-3 d-md-flex justify-content-md-end text-center" style="margin-top: 50px;">
                                                    <button type="button" class="btn btn-primary btn-lg" id="updateprofile"  style="background:deeppink;" >Update profile</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="px-4 py-5 rounded">
                                                <div class="row g-3" style="justify-content: center;">
                                                    <div class="text-center">
                                                        <div class="square position-relative display-2 mb-3">
                                                        <img id="profile_pic" src="peron_profile.png" style="height:250px;width:250px;border-radius: 50%;">                                                        </div>
                                                        <input type="file" id="profilepic" name="profilepic" hidden="">
                                                        <label class="btn btn-success-soft btn-block" for="profilepic" style="background:deeppink;">Upload</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                            
                                </form> 
                            </div>
                            <div class="tab-pane fade" id="myorders" role="tabpanel" aria-labelledby="myorders-tab">
                                <div class="list-group">
                                    <?php
                                        foreach ($Orders as $rows) 
                                        {
                                            $OrderContent = "";
                                            foreach ($rows["orders"] as $value) 
                                            {
                                                $OrderContent .= '<div class="card" style="width: 12rem;background-color:#ec8bf7;margin-top:20px;">
                                                <img class="card-img-top" style="height: 180px;" src="'.$value["service_image"].'" alt="Card image cap">
                                                <div class="card-body" style="top:0px;padding: 5px;height: 30px;">
                                                    '.$value["service_name"].'
                                                </div>
                                                <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <img class="img-fluid" style="border-radius: 0px;height: 20px;" src="images/icons/user.png">
                                                    '.$value["staff_name"].'
                                                </li>
                                                <li class="list-group-item">
                                                    <img class="img-fluid" style="border-radius: 0px;height: 20px;" src="images/icons/store.png">
                                                    '.$value["store_name"].'
                                                </li>
                                              </ul>
                                                </div>';
                                            }

                                            echo '<a href="#" class="list-group-item list-group-item-action flex-column align-items-start" style="margin-top:20px;">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">#ORDER NUMBER - '.$rows["id"].'</h5>
                                                <small>'.time_elapsed_string($rows["created_on"]).'</small>
                                            </div>
                                            <div class="order-container" style="display: flex;flex-wrap: wrap;">
                                                '.$OrderContent.'
                                            </div>
                                            </a>';
                                        }
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <script>

    </script>

<?php include "includes/footer.php"; ?>
</body>
</html>