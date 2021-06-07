<?php
include 'header.php';
	if(isset($_REQUEST['id'])){
	$groupid = $_REQUEST['id'];
		$existsql = "SELECT * FROM tblclient_group WHERE id='$groupid'";
		$result = mysqli_query($conn,$existsql) or die("SQL Query Failed.");
		$cgroup = mysqli_fetch_assoc($result);
		$g_name = $cgroup['name'];
		$g_description = $cgroup['description'];
	}
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$groupname = $_POST['groupname'];
	$description = $_POST['description'];
	$showalert = false;
	$showerror = false;
	if(isset($groupname) && isset($description)){
			$query =mysqli_query($conn, "UPDATE tblclient_group SET name='".$groupname."',description='".$description."' WHERE id='".$groupid."'")or die("SQL Query Failed.");
			if($query){
				$showalert = true;
				echo "<script>location.href='tbl-clientgroup.php';</script>";
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
	<strong>Success</strong>  Client Group Updated Successfully.
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
						<div class="custom-title">Edit Client Group</div>
					</div>
				</div>
				<div class="card-body">
					<form class="needs-validation" method="POST" novalidate>
						<div class="form-row">
							<label for="groupname" class="col-sm-2 col-form-label">Group Name</label>
							<div class="col-md-6 mb-3">
								<input type="text" class="form-control" name="groupname" id="groupname" value="<?php echo $g_name;?>"  required>
								<div class="invalid-feedback">
									Please provide a valid Group Name.
								</div>
							</div>
						</div>
						<div class="form-row">
							<label for="description"  class="col-sm-2 col-form-label">Description</label>
							<div class="col-md-6 mb-3">
								<input type="text" class="form-control" name="description" id="description" value="<?php echo $g_description ;?>">
								<div class="invalid-feedback">
									Please provide a valid Description.
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"></label>
							<div class="col-sm-4">
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