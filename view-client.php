<?php
include 'header.php';
$customerid = $_REQUEST['id'];
$sql = "SELECT * FROM tbl_customer WHERE id='".$customerid."' AND is_deleted='0' AND is_user='".$loguser."'";
$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$name = $row['name'];
$company = $row['company'];
$phone = $row['phone'];
$email = $row['email'];
$address = $row['address'];
$city = $row['city'];
$region = $row['region'];
$country = $row['country'];
$postbox = $row['postbox'];
$discount = $row['discount'];
$tax_id = $row['tax_id'];
$document_id = $row['document_id'];
$extra = $row['extra'];
$customer_group = $row['customer_group'];
$lang = $row['lang'];
$is_updated = $row['is_updated'];
?>
<div class="container emp-profile">
    <div class="row">
        <div class="col-md-4">
            <div class="profile-img">
                <img src="assets/img/clients-profile/user.png" alt="User Img"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="profile-head">
                <h5>
                    <?php echo $name; ?>
                </h5>
                <h6>
                    <?php echo $company; ?>
                </h6>
                <p class="proile-rating">LAST UPDATED : <span><?php echo $is_updated; ?></span></p>

            </div>
        </div>
        <div class="col-md-2">
            <a href="edit-client.php?id=<?php echo $id; ?>"><button type="button" class="btn btn-outline-info"><i class="icon-note mr-2"></i>Edit Profile</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
           <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active btn btn-outline-success" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-success" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Summary</a>
                    </li>
                </ul>
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Client Name</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $name; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Company</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $company; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Email</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $email; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Phone</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $phone; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Address</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $address; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Region</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $region; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>City</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $city; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Country</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $country; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Postbox</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $postbox; ?></p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Discount</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $discount; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Tax Id</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $tax_id; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Document Id</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $document_id; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Extra</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $extra; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Customer Group</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $customer_group; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Language</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $lang; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>