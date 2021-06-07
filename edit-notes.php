<?php
include 'header.php';
if(isset($_REQUEST['id'])){
	$modid = $_REQUEST['id'];
	$sql1 = "SELECT * FROM tbl_notes  WHERE is_deleted='0' AND id='".$modid."'";
	$result1 = mysqli_query($conn,$sql1) or die("SQL Query Failed.");
	$row1 = mysqli_fetch_assoc($result1);
	$edittitle = $row1['title'];
	$editdescription = $row1['description'];
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$title = $_POST['title'];
	$description = $_POST['description'];
	$showalert = false;
	$showerror = false;
	if(isset($title) && isset($description)){
		$sql = "UPDATE tbl_notes SET title='".$title."',description='".$description."' WHERE id='".$modid."'";
		$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
		if($result){
			$showalert = true;
			echo "<script>location.href='tbl-notes.php';</script>";
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
	<strong>Success</strong>  Notes Updated Successfully.
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
						<div class="custom-title">Update Notes</div>
					</div>
				</div>
				<div class="card-body">
					<form class="needs-validation" method="POST" novalidate>
						<div class="form-row">
							<label for="title" class="col-sm-2 col-form-label">Title</label>
							<div class="col-md-6 mb-3">
								<input type="text" class="form-control" name="title" id="title" value="<?php echo $edittitle; ?>" autocomplete="off" required>
								<div class="invalid-feedback">
									Please provide a valid Title.
								</div>
							</div>
						</div>
						<div class="form-row">
							<label for="description"  class="col-sm-2 col-form-label">Description</label>
							<div class="col-md-6 mb-3">
								<textarea class="form-control" rows="5" id="description" name="description"><?php echo $editdescription; ?></textarea>
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
<?php include 'footer.php'; ?>