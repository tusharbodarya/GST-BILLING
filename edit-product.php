<?php
include 'header.php';
if(isset($_REQUEST['id'])){
	$productid = $_REQUEST['id'];
		$existsql = "SELECT * FROM tbl_product WHERE id='".$productid."'";
		$result = mysqli_query($conn,$existsql) or die("SQL Query Failed.");
		$eproduct = mysqli_fetch_assoc($result);
		$name = $eproduct['name'];
		$code = $eproduct['product_code'];
		$cat = $eproduct['product_category'];
		$group = $eproduct['product_group'];
		$purchaserate = $eproduct['purchase_rate'];
		$salerate = $eproduct['sale_rate'];
		$desc = $eproduct['description'];
		$tax = $eproduct['tax_rate'];
		$disc = $eproduct['discount_rate'];
		$qty = $eproduct['product_qty'];
	}
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$product_name = $_POST['product_name'];
	$product_code = $_POST['product_code'];
	$product_cat = $_POST['product_cat'];
	$product_group = $_POST['product_group'];
	$product_purchaserate = $_POST['product_purchaserate'];
	$product_salerate = $_POST['product_salerate'];
	$product_desc = $_POST['product_desc'];
	$product_tax = $_POST['product_tax'];
	$product_disc = $_POST['product_disc'];
	$product_qty = $_POST['product_qty'];
	$showalert = false;
	$showerror = false;
	if(isset($product_name) && isset($product_code)){
			$sql = "UPDATE tbl_product SET name='".$product_name."',product_code='".$product_code."',product_category='".$product_cat."',product_group='".$product_group."',purchase_rate='".$product_purchaserate."',sale_rate='".$product_salerate."',description='".$product_desc."',tax_rate='".$product_tax."',discount_rate='".$product_disc."',product_qty='".$product_qty."' WHERE id='".$productid."'";
			$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
			if($result){
				$showalert = true;
				echo "<script>location.href='tbl-product.php';</script>";
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
	<strong>Success</strong>  Update Updated Successfully.
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
						<div class="custom-title">Update Product</div>
					</div>
				</div>
				<div class="card-body">
					<form method="post" id="data_form">
						<input type="hidden" name="act" value="add_product">
						<div class="form-group row">
							<div class="col-sm-6"><label class="col-form-label" for="product_name">Product Name *</label>
								<input type="text"  class="form-control margin-bottom" name="product_name" value="<?php echo $name; ?>">
							</div>
							<div class="col-sm-6"><label class="col-form-label" for="product_code">Product Code *</label>
								<input type="text"  class="form-control" name="product_code" value="<?php echo $code; ?>">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-6"><label class="col-form-label" for="product_cat">Product Category *</label>
								<select name="product_cat" id="product_cat" class="form-control">
									<?php
									$procatresult = mysqli_query($conn,"select * from tbl_productcategory WHERE id='".$cat."' AND is_user='".$loguser."'");
									$procatrow = mysqli_fetch_array($procatresult);
									$catname = $procatrow['name'];
										?>
									<option value='<?php echo $cat; ?>' hidden><?php echo $catname; ?> </option>
									<?php
									$result = mysqli_query($conn,"select * from tbl_productcategory WHERE is_deleted='0' AND is_user='".$loguser."'");
									while($row = mysqli_fetch_array($result)) {
										?>
										<option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-sm-6"><label class="col-form-label" for="product_group">Product Group *</label>
								<select id="product_group" name="product_group" class="form-control select-box">
									<?php
									$progroupresult1 = mysqli_query($conn,"select * from tbl_productgroup WHERE id='".$group."' AND is_user='".$loguser."'");
									$progrouprow1 = mysqli_fetch_array($progroupresult1);
									$groupname = $progrouprow1['name'];
										?>
									<option value='<?php echo $group; ?>' hidden><?php echo $groupname; ?></option>
									<?php
									$result1 = mysqli_query($conn,"select * from tbl_productgroup WHERE is_deleted='0' AND is_user='".$loguser."'");
									while($row1 = mysqli_fetch_array($result1)) {
										?>
										<option value="<?php echo $row1['id'];?>"><?php echo $row1['name'];?></option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 control-label" for="product_purchaserate">Product Purchase Rate *</label>
							<div class="col-sm-6">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">$</span>
									<input type="text" class="form-control" name="product_purchaserate"  aria-describedby="sizing-addon"
									onkeypress="return isNumber(event)" value="<?php echo $purchaserate; ?>">
								</div>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 control-label"
							for="product_salerate">Purchase Sale Rate *</label>
							<div class="col-sm-6">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">$</span>
									<input type="text" name="product_salerate" class="form-control"  aria-describedby="sizing-addon1" onkeypress="return isNumber(event)" value="<?php echo $salerate; ?>">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Description *</label>
							<div class="col-sm-8">
								<textarea class="form-control margin-bottom" name="product_desc"><?php echo $desc; ?></textarea>
							</div>
						</div>
						<hr>
						<div class="input-group mb-3">

						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label">TAX Rate *</label>
							<div class="col-sm-4">
								<div class="input-group-append">
									<input type="text" name="product_tax" class="form-control" aria-describedby="sizing-addon1" onkeypress="return isNumber(event)" value="<?php echo $tax; ?>">
									<span class="input-group-text">%</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label">Discount Rate *</label>
							<div class="col-sm-4">
								<div class="input-group-append">
									<input type="text" name="product_disc" class="form-control" aria-describedby="sizing-addon1" onkeypress="return isNumber(event)" value="<?php echo $disc; ?>">
									<span class="input-group-text">%</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label">Product Quantity *</label>
							<div class="col-sm-4">
								<input type="text" class="form-control margin-bottom" name="product_qty" onkeypress="return isNumber(event)" value="<?php echo $qty; ?>">
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