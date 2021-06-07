<?php
include 'header.php';
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($loguser)){
	$title = $_POST['title'];
	$description = $_POST['description'];
	$showalert = false;
	$showerror = false;
	if(isset($title) && isset($description) && !empty($title)){
		$existsql = "SELECT * FROM tbl_notes WHERE title='$title' AND is_user='".$loguser."'";
		$result = mysqli_query($conn,$existsql) or die("SQL Query Failed.");
		$existnumrows = mysqli_num_rows($result);
		if($existnumrows > 0){
			$showerror = "Note already Exist.";
		}else{
			$sql = "INSERT INTO `tbl_notes` ( `title`, `description`,`is_user`) VALUES ('".$title."', '".$description."', '".$loguser."')";
			$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
			if($result){
				$showalert = true;
				echo "<script>location.href='tbl-notes.php';</script>";
			}else{
				$showerror = "Please Enter Correct Details";
			}
		}
	}else{
		$showerror = "Please Enter Correct Details";
	}
}else{
	$showerror = "";
	$showalert = "";
}
?>
<?php 
if($showalert){
	echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>Success</strong> Note Added Successfully.
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
						<div class="custom-title">Add New Client Group</div>
					</div>
				</div>
				<div class="card-body">
					<form class="needs-validation" method="POST" novalidate>
						<div class="form-row">
							<label for="title" class="col-sm-2 col-form-label">Title</label>
							<div class="col-md-6 mb-3">
								<input type="text" class="form-control" name="title" id="title" placeholder="Note Title" autocomplete="off" required>
								<div class="invalid-feedback">
									Please provide a valid Title.
								</div>
							</div>
						</div>
						<div class="form-row">
							<label for="description"  class="col-sm-2 col-form-label">Description</label>
							<div class="col-md-6 mb-3">
								<textarea class="form-control" rows="5" id="description" name="description"></textarea>
								<div class="invalid-feedback">
									Please provide a valid Description.
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"></label>
							<div class="col-sm-4">
								<button class="btn btn-success" type="submit">Add Note</button>
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