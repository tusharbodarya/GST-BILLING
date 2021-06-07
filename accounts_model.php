<?php 
include 'dbconnect.php';
$accountid = $_POST['id'];
$sql = "SELECT * FROM tbl_accounts  WHERE id='".$accountid."'";
$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$accountsgroup = $row['accountsgroup'];
$area = $row['area'];
$pincode = $row['pincode'];
$city = $row['city'];
$state = $row['state'];
$panno = $row['panno'];
$aadharno = $row['aadharno'];
$gstno = $row['gstno'];
$openingbalance = $row['openingbalance'];
$actype = $row['actype'];
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
		<td>Group Name</td>
		<td><?php echo $accountsgroup; ?></td>
	</tr>
	<tr>
		<td>Area</td>
		<td><?php echo $area; ?></td>
	</tr>
	<tr>
		<td>Pincode</td>
		<td><?php echo $pincode; ?></td>
	</tr>
	<tr>
		<td>City </td>
		<td><?php echo $city; ?></td>
	</tr>
	<tr>
		<td>State</td>
		<td><?php echo $state; ?></td>
	</tr>
	<tr>
		<td>PAN NO.</td>
		<td><?php echo $panno; ?></td>
	</tr>
	<tr>
		<td>Aadhar No.</td>
		<td><?php echo $aadharno; ?></td>
	</tr>
	<tr>
		<td>GSTIN NO.</td>
		<td><?php echo $gstno; ?></td>
	</tr>
	<tr>
		<td>Opening Balance</td>
		<td><?php echo $openingbalance; ?></td>
	</tr>
	<tr>
		<td>Account Type</td>
		<td><?php echo $actype; ?></td>
	</tr>
</table>