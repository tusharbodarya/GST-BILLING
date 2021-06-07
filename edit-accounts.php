<?php
include 'header.php';
if(isset($_REQUEST['id'])){
	$accountid = $_REQUEST['id'];
	$sql1 = "SELECT * FROM tbl_accounts  WHERE id='".$accountid."'";
	$result1 = mysqli_query($conn,$sql1) or die("SQL Query Failed.");
	$row = mysqli_fetch_assoc($result1);
	$viewname = $row['name'];
	$viewaccountsgroup = $row['accountsgroup'];
	$viewarea = $row['area'];
	$viewpincode = $row['pincode'];
	$viewcity = $row['city'];
	$viewstate = $row['state'];
	$viewpanno = $row['panno'];
	$viewaadharno = $row['aadharno'];
	$viewgstno = $row['gstno'];
	$viewopeningbalance = $row['openingbalance'];
	$viewactype = $row['actype'];
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$name = $_POST['name'];
	$accountsgroup = $_POST['accountsgroup'];
	$area = $_POST['area'];
	$pincode = $_POST['pincode'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$panno = $_POST['panno'];
	$aadharno = $_POST['aadharno'];
	$gstno = $_POST['gstno'];
	$openingbalance = $_POST['openingbalance'];
	$actype = $_POST['actype'];
	$showalert = false;
	$showerror = false;
	if(isset($name) && isset($accountsgroup)){
		$sql = "UPDATE tbl_accounts SET name='".$name."',accountsgroup='".$accountsgroup."',area='".$area."',pincode='".$pincode."',city='".$city."',state='".$state."',panno='".$panno."',aadharno='".$aadharno."',gstno='".$gstno."',openingbalance='".$openingbalance."',actype='".$actype."' WHERE id='".$accountid."'";
		$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
		if($result){
			$showalert = true;
			echo "<script>location.href='tbl-accounts.php';</script>";
		}else{
			$showerror = "Please Enter Correct Details";
		}
	}
}else{
	$showerror = "";
	$showalert = "";
}
?>
<?php 
if($showalert){
	echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>Success</strong>  Account Addeed Successfully.
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
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12">
			<div class="card card-shadow mb-4">
				<div class="card-header border-0">
					<div class="custom-title-wrap bar-success">
						<div class="custom-title">Edit New Account</div>
					</div>
				</div>
				<div class="card-body">
					<form class="needs-validation" method="POST" novalidate>
						<label><h4><u>Main Details</u></h4></label>
						<hr>
						<div class="form-row">
							<label for="name" class="col-sm-2 col-form-label">Name</label>
							<div class="col-md-6 mb-3">
								<input type="text" class="form-control" name="name" id="name" value="<?php echo $viewname;?>" placeholder="Account Name" required>
								<div class="invalid-feedback">
									Please provide a valid Account Name.
								</div>
							</div>
						</div>
						<div class="form-row">
							<label class="col-sm-2 col-form-label" for="effecton">Effect On *</label>
							<div class="col-md-6 mb-3">
								<select name="effecton" id="effecton" class="form-control">
									<option value='' hidden>Effect On </option>
									<option value='Balance Sheet'>Balance Sheet</option>
									<option value='Profit & Loss Accounts'>Profit & Loss Accounts </option>
									<option value='Trading Accounts'>Trading Accounts  </option>
								</select>
							</div>
						</div>
						<div class="form-row">
							<label class="col-sm-2 col-form-label" for="accountsgroup">Group Name *</label>
							<div class="col-md-6 mb-3">
								<select name="accountsgroup" id="accountsgroup" class="form-control">
									<?php
									$acsql = "SELECT * FROM tbl_accountsgroup  WHERE id='".$viewaccountsgroup."'";
									$acresult = mysqli_query($conn,$acsql) or die("SQL Query Failed.");
									$acrow = mysqli_fetch_assoc($acresult);
									$acname = $acrow['name'];
									?>
									<option value='<?php echo $viewaccountsgroup;?>' hidden><?php echo $acname;?> </option>

								</select>
							</div>
						</div>
						<hr>
						<label><h4><u>Party Details</u></h4></label>
						<div class="form-row">
							<label for="area"  class="col-sm-2 col-form-label">Area</label>
							<div class="col-md-6 mb-3">
								<input type="text" class="form-control" name="area" id="area" value="<?php echo $viewarea;?>" placeholder="Area">
							</div>
						</div>
						<div class="form-row">
							<label for="pincode"  class="col-sm-2 col-form-label">Pincode</label>
							<div class="col-md-6 mb-3">
								<input type="text" class="form-control" name="pincode" id="pincode" value="<?php echo $viewpincode;?>" placeholder="Pincode">
							</div>
						</div>
						<div class="form-row">
							<label for="city"  class="col-sm-2 col-form-label">City</label>
							<div class="col-md-6 mb-3">
								<input type="text" class="form-control" name="city" id="city" value="<?php echo $viewcity;?>" placeholder="City">
							</div>
						</div>
						<div class="form-row">
							<label for="state"  class="col-sm-2 col-form-label">State</label>
							<div class="col-md-6 mb-3">
								<input type="text" class="form-control" name="state" id="state" value="<?php echo $viewstate;?>" placeholder="State">
							</div>
						</div>
						<div class="form-row">
							<label for="panno"  class="col-sm-2 col-form-label">PAN NO.</label>
							<div class="col-md-6 mb-3">
								<input type="text" class="form-control" name="panno" id="panno" value="<?php echo $viewpanno;?>" placeholder="PAN NO.">
							</div>
						</div>
						<div class="form-row">
							<label for="aadharno"  class="col-sm-2 col-form-label">Aadhar No.</label>
							<div class="col-md-6 mb-3">
								<input type="text" class="form-control" name="aadharno" id="aadharno" value="<?php echo $viewaadharno;?>" placeholder="Aadhar No.">
							</div>
						</div>
						<div class="form-row">
							<label for="gstno"  class="col-sm-2 col-form-label">GSTIN NO.</label>
							<div class="col-md-6 mb-3">
								<input type="text" class="form-control" name="gstno" id="gstno" value="<?php echo $viewgstno;?>" placeholder="GSTIN NO." >
								<div class="invalid-feedback">
									Please provide a valid GSTIN NO.
								</div>
							</div>
						</div>
						<hr>
						<label><h4><u>Balance Method</u></h4></label>
						<div class="form-row">
							<label for="openingbalance"  class="col-sm-2 col-form-label">Opening Balance</label>
							<div class="col-md-6 mb-3">
								<input type="text" class="form-control" name="openingbalance" id="openingbalance" value="<?php echo $viewopeningbalance;?>" placeholder="Opening Balance">
								<div class="invalid-feedback">
									Please provide a valid Opening Balance
								</div>
							</div>
						</div>
						<div class="form-row">
							<label class="col-sm-2 col-form-label" for="actype">Account Type *</label>
							<div class="col-md-6 mb-3">
								<select name="actype" id="actype" class="form-control">
									<option value="<?php echo $viewactype;?>" hidden><?php echo $viewactype;?> </option>
									<option value='Debit'>Debit</option>
									<option value='Credit'>Credit </option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"></label>
							<div class="col-sm-4">
								<button class="btn btn-success" type="submit">UPDATE ACCOUNT</button>
							</div>
						</div>
					</form>
				</div>
			</div>
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
	$(document).ready(function() {

		$('#effecton').on('change', function() {
			var effecton = this.value;
// console.log(effecton);
$.ajax({
	url: "fetch-accounts.php",
	type: "POST",
	data: {
		effecton: effecton
	},
	cache: false,
	success: function(result){
  // console.log(result);
  $("#accountsgroup").html(result);
}
});
});
	});
</script>
<?php include 'footer.php'; ?>