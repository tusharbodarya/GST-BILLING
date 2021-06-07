<?php
include 'header.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$name = $_POST['name'];
	$effecton = $_POST['effecton'];
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
		$existsql = "SELECT * FROM tbl_accounts WHERE name='".$name."' AND accountsgroup='".$accountsgroup."' AND actype='".$actype."' AND is_user='".$loguser."'";
		$result = mysqli_query($conn,$existsql) or die("SQL Query Failed.");
		$existnumrows = mysqli_num_rows($result);
		if($existnumrows > 0){
			$showerror = "Account already Exist.";
		}else{
			$sql = "INSERT INTO `tbl_accounts` ( `name`,`effecton`, `accountsgroup`,`area`,`pincode`,`city`,`state`,`panno`,`aadharno`,`gstno`,`openingbalance`,`actype`,`is_user`) VALUES ('".$name."','".$effecton."', '".$accountsgroup."', '".$area."', '".$pincode."', '".$city."', '".$state."', '".$panno."', '".$aadharno."', '".$gstno."', '".$openingbalance."', '".$actype."','".$loguser."')";
			$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
			if($result){
				$showalert = true;
				echo "<script>location.href='tbl-accounts.php';</script>";
			}else{
				$showerror = "Please Enter Correct Details";
			}
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
						<div class="custom-title">Add New Account</div>
					</div>
				</div>
				<div class="card-body">
					<form class="needs-validation" method="POST" novalidate>
						<label><h4><u>Main Details</u></h4></label>
						<hr>
						<div class="form-row">
							<label for="name" class="col-sm-2 col-form-label">Name</label>
							<div class="col-md-6 mb-3">
								<input type="text" class="form-control" name="name" id="name" placeholder="Account Name" required>
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
								<select name="accountsgroup" id="accountsgroup" class="form-control" required>		
									<option value='' hidden>Under </option>
									
								</select>
							</div>
						</div>
						<hr>
						<label><h4><u>Party Details</u></h4></label>
						<div class="form-row">
							<label for="area"  class="col-sm-2 col-form-label">Area</label>
							<div class="col-md-6 mb-3">
								<input type="text" class="form-control" name="area" id="area" placeholder="Area">
								<div class="invalid-feedback">
									Please provide a valid Are.
								</div>
							</div>
						</div>
						<div class="form-row">
							<label for="pincode"  class="col-sm-2 col-form-label">Pincode</label>
							<div class="col-md-6 mb-3">
								<input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode">
								<div class="invalid-feedback">
									Please provide a valid Pincod.
								</div>
							</div>
						</div>
						<div class="form-row">
							<label for="city"  class="col-sm-2 col-form-label">City</label>
							<div class="col-md-6 mb-3">
								<input type="text" class="form-control" name="city" id="city" placeholder="City">
								<div class="invalid-feedback">
									Please provide a valid Cit.
								</div>
							</div>
						</div>
						<div class="form-row">
							<label for="state"  class="col-sm-2 col-form-label">State</label>
							<div class="col-md-6 mb-3">
								<input type="text" class="form-control" name="state" id="state" placeholder="State">
								<div class="invalid-feedback">
									Please provide a valid Stat.
								</div>
							</div>
						</div>
						<div class="form-row">
							<label for="panno"  class="col-sm-2 col-form-label">PAN NO.</label>
							<div class="col-md-6 mb-3">
								<input type="text" class="form-control" name="panno" id="panno" placeholder="PAN NO.">
								<div class="invalid-feedback">
									Please provide a valid PAN NO.
								</div>
							</div>
						</div>
						<div class="form-row">
							<label for="aadharno"  class="col-sm-2 col-form-label">Aadhar No.</label>
							<div class="col-md-6 mb-3">
								<input type="text" class="form-control" name="aadharno" id="aadharno" placeholder="Aadhar No.">
								<div class="invalid-feedback">
									Please provide a valid Aadhar No.
								</div>
							</div>
						</div>
						<div class="form-row">
							<label for="gstno"  class="col-sm-2 col-form-label">GSTIN NO.</label>
							<div class="col-md-6 mb-3">
								<input type="text" class="form-control" name="gstno" id="gstno" placeholder="GSTIN NO.">
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
								<input type="text" class="form-control" name="openingbalance" id="openingbalance" placeholder="Opening Balance">
								<div class="invalid-feedback">
									Please provide a valid Opening Balance
								</div>
							</div>
						</div>
						<div class="form-row">
							<label class="col-sm-2 col-form-label" for="actype">Account Type *</label>
							<div class="col-md-6 mb-3">
								<select name="actype" id="actype" class="form-control">
									<option value='Credit'>Credit </option>
									<option value='Debit'>Debit</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"></label>
							<div class="col-sm-4">
								<button class="btn btn-success" type="submit">SAVE ACCOUNT</button>
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