<?php
include 'header.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$name = $_POST['name'];
	$company = $_POST['company'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$region = $_POST['region'];
	$country = $_POST['country'];
	$pincode = $_POST['pincode'];
	$taxid = $_POST['taxid'];
	$showalert = false;
	$showerror = false;
	if(isset($name) && isset($company)){
		$existsql = "SELECT * FROM tbl_suppliers WHERE name='".$name."' AND company='".$company."' AND is_user='".$loguser."'";
		$result = mysqli_query($conn,$existsql) or die("SQL Query Failed.");
		$existnumrows = mysqli_num_rows($result);
		if($existnumrows > 0){
			$showerror = "Supplier already Exist.";
		}else{
			$sql = "INSERT INTO `tbl_suppliers` ( `name`, `company`,`phone`,`email`,`address`,`city`,`region`,`country`,`pincode`,`taxid`,`is_user`) VALUES ('".$name."', '".$company."', '".$phone."', '".$email."','".$address."', '".$city."', '".$region."', '".$country."', '".$pincode."','".$taxid."','".$loguser."')";
			$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
			if($result){
				$showalert = true;
				echo "<script>location.href='tbl-suppliers.php';</script>";
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
	<strong>Success</strong>  supplier Added Successfully.
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
						<div class="custom-title">Add New supplier Details</div>
					</div>
				</div>
				<div class="card-body">
					<form method="post" id="data_form">
						<div class="form-group row">
							<label class="col-sm-2 control-label">Name *</label>
							<div class="col-sm-6">
								<input type="text" placeholder="Name *" class="form-control margin-bottom" name="name">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label">Company *</label>
							<div class="col-sm-6">
								<input type="text" placeholder="Company *" class="form-control margin-bottom" name="company">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label">Phone *</label>
							<div class="col-sm-6">
								<input type="text" placeholder="Phone *" class="form-control margin-bottom" name="phone">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label">Email *</label>
							<div class="col-sm-6">
								<input type="text" placeholder="Email *" class="form-control margin-bottom" name="email">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label">Address *</label>
							<div class="col-sm-6">
								<input type="text" placeholder="Address *" class="form-control margin-bottom" name="address">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label">City *</label>
							<div class="col-sm-6">
								<input type="text" placeholder="City *" class="form-control margin-bottom" name="city">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label">Region *</label>
							<div class="col-sm-6">
								<input type="text" placeholder="Area *" class="form-control margin-bottom" name="region">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label">Country *</label>
							<div class="col-sm-6">
								<input type="text" placeholder="Country *" class="form-control margin-bottom" name="country">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label">Pincode *</label>
							<div class="col-sm-6">
								<input type="text" placeholder="Pincode *" class="form-control margin-bottom" name="pincode">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label">TAX ID *</label>
							<div class="col-sm-6">
								<input type="text" placeholder="TAX ID *" class="form-control margin-bottom" name="taxid">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success">ADD Supplier</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>