<?php
include 'header.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$product_name = $_POST['product_name'];
	$product_code = $_POST['product_code'];
	$product_cat = $_POST['product_cat'];
	$product_group = $_POST['product_group'];
	$product_price = $_POST['product_price'];
	$product_desc = $_POST['product_desc'];
	$product_tax = $_POST['product_tax'];
	$product_disc = $_POST['product_disc'];
	$product_qty = $_POST['product_qty'];
	$showalert = false;
	$showerror = false;
	if(isset($product_name) && isset($product_code) && isset($product_price) && isset($product_group) && !empty($product_name) && !empty($product_code) && !empty($product_price) && !empty($product_group)){
		$existsql = "SELECT * FROM tbl_product WHERE name='".$product_name."' AND product_code='".$product_code."' AND is_deleted='0' AND is_user='".$loguser."'";
		$result = mysqli_query($conn,$existsql) or die("SQL Query Failed.");
		$existnumrows = mysqli_num_rows($result);
		if($existnumrows > 0){
			$showerror = "Product already Exist.";
		}else{
			$sql = "INSERT INTO `tbl_product` ( `name`, `product_code`,`product_category`,`product_group`,`price`,`description`,`tax_rate`,`discount_rate`,`product_qty`,`is_user`) VALUES ('".$product_name."', '".$product_code."', '".$product_cat."', '".$product_group."','".$product_price."', '".$product_desc."', '".$product_tax."', '".$product_disc."', '".$product_qty."','".$loguser."')";
			$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
			if($result){
				$showalert = true;
				echo "<script>location.href='tbl-product.php';</script>";
			}else{
				$showerror = "Please Enter Correct Details";
			}
		}
	}else{
		$showerror = "Please Fill Details.";
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
						<div class="custom-title">Add New Product</div>
					</div>
				</div>
				<div class="card-body">
					<form method="post" id="data_form">
						<input type="hidden" name="act" value="add_product">
						<div class="form-group row">
							<div class="col-sm-6"><label class="col-form-label" for="product_name">Product Name *</label>
								<input type="text" placeholder="Product Name" class="form-control margin-bottom" name="product_name" autocomplete="off">
							</div>
							<div class="col-sm-6"><label class="col-form-label" for="product_code">Product Code *</label>
								<input type="text" placeholder="Product Code" class="form-control" name="product_code" autocomplete="off">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-6"><label class="col-form-label" for="product_cat">Product Category *</label>
								<select name="product_cat" id="product_cat" class="form-control">
									<option value='' hidden>Select Product Category </option>
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
									<option value='' hidden>Select Product Group</option>
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
							<label class="col-sm-2 control-label"
							for="product_price"> Price *</label>
							<div class="col-sm-6">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">$</span>
									<input type="text" name="product_price" class="form-control" placeholder="0.00" aria-describedby="sizing-addon1" onkeypress="return isNumber(event)">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Description *</label>
							<div class="col-sm-8">
								<textarea placeholder="Description" class="form-control margin-bottom" name="product_desc"></textarea>
							</div>
						</div>
						<hr>
						<div class="input-group mb-3">

						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label">TAX Rate *</label>
							<div class="col-sm-4">
								<div class="input-group-append">
									<input type="text" name="product_tax" class="form-control" placeholder="TAX Rate" aria-describedby="sizing-addon1" onkeypress="return isNumber(event)">
									<span class="input-group-text">%</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label">Discount Rate *</label>
							<div class="col-sm-4">
								<div class="input-group-append">
									<input type="text" name="product_disc" class="form-control" placeholder="Discount Rate" aria-describedby="sizing-addon1" onkeypress="return isNumber(event)">
									<span class="input-group-text">%</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label">Product Quantity *</label>
							<div class="col-sm-4">
								<input type="text" placeholder="Stock Quantity*" class="form-control margin-bottom" name="product_qty" onkeypress="return isNumber(event)">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-4">
								<button type="submit" class="btn btn-success">ADD PRODUCT</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>