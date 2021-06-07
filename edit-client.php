<?php
include 'header.php';
$customerid = $_REQUEST['id'];
$sql = "SELECT * FROM tbl_customer WHERE id='".$customerid."' AND is_deleted='0'";
$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
$row = mysqli_fetch_assoc($result);
$rowid = $row['id'];
$rowname = $row['name'];
$rowcompany = $row['company'];
$rowphone = $row['phone'];
$rowemail = $row['email'];
$rowaddress = $row['address'];
$rowcity = $row['city'];
$rowregion = $row['region'];
$rowcountry = $row['country'];
$rowpostbox = $row['postbox'];
$rowdiscount = $row['discount'];
$rowtax_id = $row['tax_id'];
$rowdocument_id = $row['document_id'];
$rowextra = $row['extra'];
$rowcustomer_group = $row['customer_group'];
$rowlang = $row['lang'];
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $showerror=false;
  $showalert=false;
  if(isset($_POST['name']) && isset($_POST['company_name']) &&isset($_POST['phone']) &&isset($_POST['email']) &&isset($_POST['address']) &&isset($_POST['city']) &&isset($_POST['region']) &&isset($_POST['contry']) &&isset($_POST['postbox']) &&isset($_POST['discount']) &&isset($_POST['tax_id']) &&isset($_POST['document_id']) &&isset($_POST['extra']) &&isset($_POST['customer_group']) &&isset($_POST['lang'])){
    $name = $_POST['name'];
    $company = $_POST['company_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $region = $_POST['region'];
    $country = $_POST['contry'];
    $postbox = $_POST['postbox'];
    $discount = $_POST['discount'];
    $tax_id = $_POST['tax_id'];
    $document_id = $_POST['document_id'];
    $extra = $_POST['extra'];
    $customer_group = $_POST['customer_group'];
    $lang = $_POST['lang'];
    $sql= mysqli_query($conn,"UPDATE tbl_customer SET name='".$name."',company='".$company."',phone='".$phone."',email='".$email."',address='".$address."',city='".$city."',region='".$region."',country='".$country."',postbox='".$postbox."',discount='".$discount."',tax_id='".$tax_id."',document_id='".$document_id."',extra='".$extra."',customer_group='".$customer_group."',lang='".$lang."' WHERE id='".$customerid."'")or die("2.SQL Query Failed.");
    if($sql){
      $showalert = true;
      echo "<script>location.href='tbl-clients.php';</script>";
    }else{
      $showerror = "SQL Query Failed.";
    }
}else{
  $showerror = "Please Fill Full Details.";
}
}else{
  $showalert = "";
  $showerror = "";
}
?>
<div class="container-fluid">
  <?php 
  if($showalert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong>  Client Updated Successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>'; 
  }
  if($showerror){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error ! </strong> '.$showerror.'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>'; 
  }
  ?>
  <div class="row">
    <div class="col-xl-12">
      <div class="card card-shadow mb-4">
        <div class="card-header border-0">
          <div class="custom-title-wrap bar-success">
            <div class="custom-title">Edit Client Group</div>
          </div>
        </div>
        <div class="card-body">
          <form class="needs-validation" method="POST" novalidate>
            <div class="form-row">
              <label for="groupname" class="col-sm-2 col-form-label">Name *</label>
              <div class="col-md-8 mb-3">
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $rowname; ?>"  required>
                <div class="invalid-feedback">
                  Please provide a valid Name.
                </div>
              </div>
            </div>
            <div class="form-row">
              <label for="description"  class="col-sm-2 col-form-label">Company *</label>
              <div class="col-md-8 mb-3">
                <input type="text" class="form-control" name="company_name" id="company_name" value="<?php echo $rowcompany; ?>" required>
                <div class="invalid-feedback">
                  Please provide a valid Company.
                </div>
              </div>
            </div>
            <div class="form-row">
              <label for="description"  class="col-sm-2 col-form-label">Phone *</label>
              <div class="col-md-8 mb-3">
                <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $rowphone; ?>" required>
                <div class="invalid-feedback">
                  Please provide a valid Phone.
                </div>
              </div>
            </div>
            <div class="form-row">
              <label for="description"  class="col-sm-2 col-form-label">Email *</label>
              <div class="col-md-8 mb-3">
                <input type="text" class="form-control" name="email" id="email" value="<?php echo $rowemail; ?>" required>
                <div class="invalid-feedback">
                  Please provide a valid Email.
                </div>
              </div>
            </div>
            <div class="form-row">
              <label for="description"  class="col-sm-2 col-form-label">Address *</label>
              <div class="col-md-8 mb-3">
                <input type="text" class="form-control" name="address" id="address" value="<?php echo $rowaddress; ?>" required>
                <div class="invalid-feedback">
                  Please provide a valid Address.
                </div>
              </div>
            </div>
            <div class="form-row">
              <label for="description"  class="col-sm-2 col-form-label">City *</label>
              <div class="col-md-8 mb-3">
                <input type="text" class="form-control" name="city" id="city" value="<?php echo $rowcity; ?>" required>
                <div class="invalid-feedback">
                  Please provide a valid City.
                </div>
              </div>
            </div>
            <div class="form-row">
              <label for="description"  class="col-sm-2 col-form-label">Region *</label>
              <div class="col-md-8 mb-3">
                <input type="text" class="form-control" name="region" id="region" value="<?php echo $rowregion; ?>" required>
                <div class="invalid-feedback">
                  Please provide a valid Region.
                </div>
              </div>
            </div>
            <div class="form-row">
              <label for="description"  class="col-sm-2 col-form-label">Country *</label>
              <div class="col-md-8 mb-3">
                <input type="text" class="form-control" name="contry" id="contry" value="<?php echo $rowcountry; ?>" required>
                <div class="invalid-feedback">
                  Please provide a valid Country.
                </div>
              </div>
            </div>
            <div class="form-row">
              <label for="description"  class="col-sm-2 col-form-label">PostBox *</label>
              <div class="col-md-8 mb-3">
                <input type="text" class="form-control" name="postbox" id="postbox" value="<?php echo $rowpostbox; ?>" required>
                <div class="invalid-feedback">
                  Please provide a valid PostBox.
                </div>
              </div>
            </div>
            <div class="form-row">
              <label for="description"  class="col-sm-2 col-form-label">Discount *</label>
              <div class="col-md-8 mb-3">
                <input type="text" class="form-control" name="discount" id="discount" value="<?php echo $rowdiscount; ?>" required>
                <div class="invalid-feedback">
                  Please provide a valid Discount.
                </div>
              </div>
            </div>
            <div class="form-row">
              <label for="description"  class="col-sm-2 col-form-label">TAX ID *</label>
              <div class="col-md-8 mb-3">
                <input type="text" class="form-control" name="tax_id" id="tax_id" value="<?php echo $rowtax_id; ?>" required>
                <div class="invalid-feedback">
                  Please provide a valid TAX ID.
                </div>
              </div>
            </div>
            <div class="form-row">
              <label for="description"  class="col-sm-2 col-form-label">Document ID *</label>
              <div class="col-md-8 mb-3">
                <input type="text" class="form-control" name="document_id" id="document_id" value="<?php echo $rowdocument_id; ?>" required>
                <div class="invalid-feedback">
                  Please provide a valid Document ID.
                </div>
              </div>
            </div>
            <div class="form-row">
              <label for="description"  class="col-sm-2 col-form-label">Extra *</label>
              <div class="col-md-8 mb-3">
                <input type="text" class="form-control" name="extra" id="extra" value="<?php echo $rowextra; ?>" required>
                <div class="invalid-feedback">
                  Please provide a valid Extra.
                </div>
              </div>
            </div>
            <div class="form-row">
              <label for="description"  class="col-sm-2 col-form-label">Customer group *</label>
              <div class="col-md-8 mb-3">
                <select class="form-control" id="customer_group" name="customer_group">
                  <?php 
                  $result1 = mysqli_query($conn,"select * from tblclient_group WHERE id='".$rowcustomer_group."' AND is_deleted='0' AND is_user='".$loguser."'");
                  $row1 = mysqli_fetch_array($result1);
                  ?>
                  <option value="<?php echo $row1['id']; ?>" hidden><?php echo $row1['name'];?></option>
                  <?php
                  $result = mysqli_query($conn,"select * from tblclient_group WHERE is_deleted='0' AND is_user='".$loguser."'");
                  while($row = mysqli_fetch_array($result)) {
                    ?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-row">
              <label for="description"  class="col-sm-2 col-form-label">Language *</label>
              <div class="col-md-8 mb-3">
                <select class="form-control" id="lang" name="lang">
                  <option value="<?php echo $rowlang; ?>">
                    <?php echo $rowlang; ?>
                  </option>
                  <option value="English">
                    English
                  </option>
                  <option value="Hindi">
                    Hindi
                  </option>
                  <option value="Gujarati">
                    Gujarati
                  </option>
                  <option value="Punjabi">
                    Punjabi
                  </option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label"></label>
              <div class="col-sm-6">
                <button class="btn btn-success" type="submit">Update Group</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      var forms = document.getElementsByClassName('needs-validation');
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>
<?php include 'footer.php';?>
