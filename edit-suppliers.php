<?php
include 'header.php';
if(isset($_REQUEST['id'])){
	$suppliers = $_REQUEST['id'];
	$existsql = "SELECT * FROM tbl_suppliers WHERE id='".$suppliers."'";
	$result = mysqli_query($conn,$existsql) or die("SQL Query Failed.");
	$eproduct = mysqli_fetch_assoc($result);
	$get_name = $eproduct['name'];
	$get_company = $eproduct['company'];
	$get_phone = $eproduct['phone'];
	$get_email = $eproduct['email'];
	$get_address = $eproduct['address'];
	$get_city = $eproduct['city'];
	$get_region = $eproduct['region'];
	$get_country = $eproduct['country'];
	$get_pincode = $eproduct['pincode'];
	$get_taxid = $eproduct['taxid'];
}
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
		$sql = "UPDATE tbl_suppliers SET name='".$name."',company='".$company."',phone='".$phone."',email='".$email."',address='".$address."',city='".$city."',region='".$region."',country='".$country."',pincode='".$pincode."',taxid='".$taxid."' WHERE id='".$suppliers."'";
		$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
		if($result){
			$showalert = true;
			echo "<script>location.href='tbl-suppliers.php';</script>";
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
	<strong>Success</strong>  Suppliers Updated Successfully.
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
						<div class="custom-title">Update Suppliers</div>
					</div>
				</div>
				<div class="card-body">
					<form method="post" id="data_form">
						<div class="form-group row">
							<label class="col-sm-2 control-label">Name *</label>
							<div class="col-sm-6">
								<input type="text" placeholder="Name *" class="form-control margin-bottom" value="<?php echo $get_name; ?>" name="name">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label">Company *</label>
							<div class="col-sm-6">
								<input type="text" placeholder="Company *" class="form-control margin-bottom" value="<?php echo $get_company; ?>" name="company">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label">Phone *</label>
							<div class="col-sm-6">
								<input type="text" placeholder="Phone *" class="form-control margin-bottom" value="<?php echo $get_phone; ?>" name="phone">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label">Email *</label>
							<div class="col-sm-6">
								<input type="text" placeholder="Email *" class="form-control margin-bottom" value="<?php echo $get_email; ?>" name="email">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label">Address *</label>
							<div class="col-sm-6">
								<input type="text" placeholder="Address *" class="form-control margin-bottom" value="<?php echo $get_address; ?>" name="address">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label">City *</label>
							<div class="col-sm-6">
								<input type="text" placeholder="City *" class="form-control margin-bottom" value="<?php echo $get_city; ?>" name="city">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label">Region *</label>
							<div class="col-sm-6">
								<input type="text" placeholder="Area *" class="form-control margin-bottom" value="<?php echo $get_region; ?>" name="region">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label">Country *</label>
							<div class="col-sm-6">
								<input type="text" placeholder="Country *" class="form-control margin-bottom" value="<?php echo $get_country; ?>" name="country">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label">Pincode *</label>
							<div class="col-sm-6">
								<input type="text" placeholder="Pincode *" class="form-control margin-bottom" value="<?php echo $get_pincode; ?>" name="pincode">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label">TAX ID *</label>
							<div class="col-sm-6">
								<input type="text" placeholder="TAX ID *" class="form-control margin-bottom" value="<?php echo $get_taxid; ?>" name="taxid">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-4">
								<button type="submit" name="submit" class="btn btn-success">UPDATE PRODUCT</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>