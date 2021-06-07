<?php 
include 'dbconnect.php';
if(isset($_POST['id'])){
	$suppliersid = $_POST['id'];
	$sql = "SELECT * FROM tbl_suppliers  WHERE id='".$suppliersid."'";
	$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
	$row = mysqli_fetch_assoc($result);
	$name = $row['name'];
	$company = $row['company'];
	$phone = $row['phone'];
	$email = $row['email'];
	$address = $row['address'];
	$city = $row['city'];
	$region = $row['region'];
	$country = $row['country'];
	$pincode = $row['pincode'];
	$taxid = $row['taxid'];
	?>
	<style type="text/css">
		td{
			padding-left: 50px;
			padding-right: 50px;
		}
	</style>
	<table border="2px">
		<tr>
			<td>Name</td>
			<td><?php echo $name; ?></td>
		</tr>
		<tr>
			<td>Company</td>
			<td><?php echo $company; ?></td>
		</tr>
		<tr>
			<td>Phone</td>
			<td><?php echo $phone; ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><?php echo $email; ?></td>
		</tr>
		<tr>
			<td>Address </td>
			<td><?php echo $address; ?></td>
		</tr>
		<tr>
			<td>City</td>
			<td><?php echo $city; ?></td>
		</tr>
		<tr>
			<td>Region</td>
			<td><?php echo $region; ?></td>
		</tr>
		<tr>
			<td>Country</td>
			<td><?php echo $country; ?></td>
		</tr>
		<tr>
			<td>Pincode</td>
			<td><?php echo $pincode; ?></td>
		</tr>
		<tr>
			<td>TAX ID</td>
			<td><?php echo $taxid; ?></td>
		</tr>
	</table>
<?php } ?>