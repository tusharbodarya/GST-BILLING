<?php 
include 'dbconnect.php';
$productid = $_POST['id'];
$sql = "SELECT * FROM tbl_product  WHERE id='".$productid."'";
$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['product_code'];
$cat = $row['product_category'];
$group = $row['product_group'];
$price = $row['price'];
$desc = $row['description'];
$tax = $row['tax_rate'];
$disc = $row['discount_rate'];
$qty = $row['product_qty'];
?>
<style type="text/css">
	td{
		padding-left: 50px;
		padding-right: 50px;
	}
</style>
<table border="2px">
	<tr>
		<td>NAME</td>
		<td><?php echo $name; ?></td>
	</tr>
	<tr>
		<td>PRODUCT CODE</td>
		<td><?php echo $code; ?></td>
	</tr>
	<tr>
		<td>Product Category</td>
		<td><?php echo $cat; ?></td>
	</tr>
	<tr>
		<td>Product Group</td>
		<td><?php echo $group; ?></td>
	</tr>
	<tr>
		<td>Product Price</td>
		<td><?php echo $price; ?></td>
	</tr>
	<tr>
		<td>Description</td>
		<td><?php echo $desc; ?></td>
	</tr>
	<tr>
		<td>TAX Rate</td>
		<td><?php echo $tax; ?></td>
	</tr>
	<tr>
		<td>Discount Rate</td>
		<td><?php echo $disc; ?></td>
	</tr>
	<tr>
		<td>Product Quantity</td>
		<td><?php echo $qty; ?></td>
	</tr>
</table>