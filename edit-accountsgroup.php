<?php
include 'header.php';
if(isset($_REQUEST['id'])){
	$accountgroupid = $_REQUEST['id'];
	$sql1 = "SELECT * FROM tbl_accountsgroup  WHERE id='".$accountgroupid."'";
	$result1 = mysqli_query($conn,$sql1) or die("SQL Query Failed.");
	$row = mysqli_fetch_assoc($result1);
	$viewgroupname = $row['name'];
	$viewactype = $row['effecton'];
	$viewsequence = $row['sequence'];
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$groupname = $_POST['groupname'];
	$actype = $_POST['actype'];
	$sequence = $_POST['sequence'];
	$showalert = false;
	$showerror = false;
	if(isset($groupname) && isset($actype)){
		
			$sql = "UPDATE tbl_accountsgroup SET name='".$groupname."',effecton='".$actype."',sequence='".$sequence."' WHERE id='".$accountgroupid."'";
			$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
			if($result){
				$showalert = true;
				echo "<script>location.href='tbl-accountsgroup.php';</script>";
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
	<strong>Success</strong>  Client Group Added Successfully.
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
						<div class="custom-title">Update Account Group</div>
					</div>
				</div>
				<div class="card-body">
					<form class="needs-validation" method="POST" novalidate>
						<div class="form-row">
							<label for="groupname" class="col-sm-2 col-form-label">Group Name</label>
							<div class="col-md-6 mb-3">
								<input type="text" class="form-control" name="groupname" value="<?php echo $viewgroupname; ?>" id="groupname" required>
								<div class="invalid-feedback">
									Please provide a valid Group Name.
								</div>
							</div>
						</div>
						<div class="form-row">
								<label class="col-sm-2 col-form-label" for="actype">Effect On *</label>
							<div class="col-md-6 mb-3">
								<select name="actype" id="actype" class="form-control">
									<option value='<?php echo $viewactype; ?>' hidden><?php echo $viewactype; ?> </option>
									<option value='Balance Sheet'>Balance Sheet</option>
									<option value='Profit & Loss Accounts'>Profit & Loss Accounts </option>
									<option value='Trading Accounts'>Trading Accounts  </option>
								</select>
							</div>
						</div>
						<div class="form-row">
							<label for="sequence"  class="col-sm-2 col-form-label">Sequence</label>
							<div class="col-md-6 mb-3">
								<input type="number" class="form-control" name="sequence" value="<?php echo $viewsequence; ?>" id="sequence">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"></label>
							<div class="col-sm-4">
								<button class="btn btn-success" type="submit">UPDATE Group</button>
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
</script>
<?php include 'footer.php';?>