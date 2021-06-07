<?php
include 'header.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $showerror=false;
  $showalert=false;
  if(isset($_POST['name']) && isset($_POST['company_name']) &&isset($_POST['phone']) &&isset($_POST['email']) &&isset($_POST['address']) &&isset($_POST['city']) &&isset($_POST['region']) &&isset($_POST['contry']) &&isset($_POST['postbox']) &&isset($_POST['discount']) &&isset($_POST['tax_id']) &&isset($_POST['document_id']) &&isset($_POST['extra']) &&isset($_POST['customer_group']) &&isset($_POST['lang']) && isset($loguser)){
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
    $sql = mysqli_query($conn,"SELECT * FROM tbl_customer WHERE name='".$name."' AND  company = '".$company."' AND is_user='".$loguser."'") or die("1.SQL Query Failed.");
    $existnumrows = mysqli_num_rows($sql);
    if($existnumrows > 0){
      $showerror = "Client already Exist.";
    }else{
      $sql= mysqli_query($conn,"INSERT INTO `tbl_customer` ( `name`,`company`, `phone`,`email`,`address`, `city`,`region`,`country`, `postbox`,`discount`,`tax_id`, `document_id`,`extra`,`customer_group`, `lang`,`is_user`) VALUES ('".$name."','".$company."', '".$phone."','".$email."','".$address."', '".$city."','".$region."','".$country."', '".$postbox."','".$discount."','".$tax_id."', '".$document_id."','".$extra."','".$customer_group."', '".$lang."','".$loguser."')")or die("2.SQL Query Failed.");
      if($sql){
        $showalert = true;
        echo "<script>location.href='tbl-clients.php';</script>";
      }else{
        $showerror = "SQL Query Failed.";
      }
    }
  }else{
    $showerror = "Please Fill Full Details.";
  }
}else{
  $showalert = "";
  $showerror = "";
}
?>
<?php 
if($showalert){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong>  Client Added Successfully.
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
<!--page title-->
<!--/page title-->
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="col-xl-12">
      <div class="card card-shadow mb-4">
        <div class="card-header border-0">
          <div class="custom-title-wrap bar-success">
            <div class="custom-title">ADD NEW CUSTOMER</div>
          </div>
        </div>
        <div class="card-body">
          <form id="wizard-validation-form" action="" method="POST" class="right-text-label-form">
            <div>
              <h3>
                <i class="vl_line-graph-pointed d-block"></i>
                Step 1
              </h3>
              <section>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label col-form-label-sm" for="name">Name *</label>
                  <div class="col-sm-6">
                    <input class="required form-control chang" id="name" name="name" type="text">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label col-form-label-sm" for="company_name">Company *</label>
                  <div class="col-sm-6">
                    <input class="required form-control chang" id="company_name" name="company_name" type="text">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label col-form-label-sm" for="phone">Phone *</label>
                  <div class="col-sm-6">
                    <input class="form-control chang" id="phone" name="phone" type="text">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label col-form-label-sm" for="email">Email *</label>
                  <div class="col-sm-6">
                    <input id="email" name="email" type="text" class="email form-control chang">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label col-form-label-sm" for="address">Address *</label>
                  <div class="col-sm-6">
                    <input class="form-control chang" id="address" name="address" type="text">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label col-form-label-sm" for="city">City *</label>
                  <div class="col-sm-6">
                    <input class="form-control chang" id="city" name="city" type="text">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label col-form-label-sm" for="region">Region *</label>
                  <div class="col-sm-6">
                    <input class="form-control chang" id="region" name="region" type="text">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label col-form-label-sm" for="contry">Country *</label>
                  <div class="col-sm-6">
                    <input class="form-control chang" id="contry" name="contry" value="INDIA" type="text">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label col-form-label-sm" for="postbox">PostBox *</label>
                  <div class="col-sm-6">
                    <input class="form-control chang" id="postbox" name="postbox" type="text">
                  </div>
                </div>
              </section>
              <h3>
                <i class="vl_dashboard d-block"></i>
                Step 2
              </h3>
              <section>
                <div class="form-group row">
                  <div class="col-sm-12">
                   <table class="table table-striped table-hover">
                    <tbody>
                      <tr>
                        <th>Name</th>
                        <td id="printName"></td>
                      </tr>
                      <tr>
                        <th>Company</th>
                        <td id="printCompany"></td>
                      </tr>
                      <tr>
                        <th>Phone</th>
                        <td id="printPhone"></td>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <td id="printEmail"></td>
                      </tr>
                      <tr>
                        <th>Address</th>
                        <td id="printAddress"></td>
                      </tr>
                      <tr>
                        <th>City</th>
                        <td id="printCity"></td>
                      </tr>
                      <tr>
                        <th>Region</th>
                        <td id="printRegion"></td>
                      </tr>
                      <tr>
                        <th>Country</th>
                        <td id="printCountry"></td>
                      </tr>
                      <tr>
                        <th>PostBox</th>
                        <td id="printPostBox"></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </section>
            <h3>
              <i class="vl_tick-circle d-block"></i>
              Step Final
            </h3>
            <section>
             <div class="form-group row">
              <label class="col-sm-4 col-form-label col-form-label-sm" for="discount">Discount *</label>
              <div class="col-sm-6">
                <input class="required form-control" id="discount" name="discount" type="text">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label col-form-label-sm" for="tax_id">TAX ID *</label>
              <div class="col-sm-6">
                <input class="required form-control" id="tax_id" name="tax_id" type="text">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label col-form-label-sm" for="document_id">Document ID *</label>
              <div class="col-sm-6">
                <input class="required form-control" id="document_id" name="document_id" type="text">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label col-form-label-sm" for="extra">Extra *</label>
              <div class="col-sm-6">
                <input class="required form-control" id="extra" name="extra" type="text">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label col-form-label-sm">Customer group</label>
              <div class="col-sm-6">
                <select class="form-control" id="customer_group" name="customer_group">
                  <option value="">Select Customer group</option>
                  <?php
                  $result = mysqli_query($conn,"select * from tblclient_group WHERE is_deleted='0' AND is_user='".$loguser."'");
                  while($row = mysqli_fetch_array($result)) {
                    ?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label col-form-label-sm">Language</label>
              <div class="col-sm-6">
                <select class="form-control" id="lang" name="lang">
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
        <!-- <div class="form-group row">
            <label class="col-sm-4 col-form-label col-form-label-sm">Customer Login</label>
            <div class="col-sm-6">
                <select class="required form-control" id="option_s1" name="param">
                    <option value="yes">
                        Yes
                    </option>
                    <option value="no">
                        No
                    </option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label col-form-label-sm">Password</label>
            <div class="col-sm-6">
                <input type="text" class="required form-control" placeholder="Password">
            </div>
          </div> -->
        </section>
      </div>
    </form>
  </div>
</div>
</div>
</div>
</div>
<script>
  $(document).on('change', '.chang', function() {
   var name = $("#name").val();
   var company_name = $("#company_name").val();
   var phone = $("#phone").val();
   var email = $("#email").val();
   var address = $("#address").val();
   var city = $("#city").val();
   var region = $("#region").val();
   var contry = $("#contry").val();
   var postbox = $("#postbox").val();
   $("#printName").html(name);
   $("#printCompany").html(company_name);
   $("#printPhone").html(phone);
   $("#printEmail").html(email);
   $("#printAddress").html(address);
   $("#printCity").html(city);
   $("#printRegion").html(region);
   $("#printCountry").html(contry);
   $("#printPostBox").html(postbox);
 });
</script>
<?php include 'footer.php';?>
