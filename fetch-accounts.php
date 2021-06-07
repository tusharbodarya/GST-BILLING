<?php
include 'dbconnect.php';
if(isset($_POST['effecton'])){
	$effecton = $_POST['effecton'];
	$result = mysqli_query($conn,"select * from tbl_accountsgroup WHERE effecton='".$effecton."' AND is_deleted='0'");
	while($row = mysqli_fetch_array($result)) {
		?>
		<option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
		<?php 
	}
}
?>

<?php
if(isset($_POST['accounts']) && !empty($_POST['accounts'])){
	$accounts = $_POST['accounts'];
	$accountssql = "SELECT * FROM tbl_accounts  WHERE id='".$accounts."'";
	$accountsresult = mysqli_query($conn,$accountssql) or die("SQL Query Failed.");
	$accountsrow = mysqli_fetch_assoc($accountsresult);
	$accountsname = $accountsrow['name'];
	$accountsopeningbalance = $accountsrow['openingbalance'];

	echo "NAME : ".$accountsname."<br>";
	echo "Balance : ".$accountsopeningbalance."<br>";
}else{
	echo "";
}
?>
<?php
if(isset($_POST['accountstype']) && isset($_POST['user'])){
	$accountstype = $_POST['accountstype'];
	$loguser = $_POST['user'];
	if($accountstype == 'debit'){
	$ssql = "SELECT * FROM tbl_accounts  WHERE is_deleted='0' AND is_user='".$loguser."'  AND accountsgroup='41' OR accountsgroup='25' OR accountsgroup='24'";
}else if($accountstype == 'cash'){
	$ssql = "SELECT * FROM tbl_accounts  WHERE is_deleted='0' AND is_user='".$loguser."'  AND accountsgroup='21'";
	echo $ssql;
}
	$sresult = mysqli_query($conn,$ssql) or die("SQL Query Failed.");
	while($srow2 = mysqli_fetch_assoc($sresult)){
		?>
		<option value="<?php echo $srow2['id']; ?>"><?php echo $srow2['name']; ?></option>
		<?php
	} 
}
?>
<?php
if(isset($_POST['totalprofit'])){
	$totalprofit = $_POST['totalprofit'];
	$sql = "UPDATE tbl_accounts SET openingbalance='".$totalprofit."' WHERE id='62'";
	$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
	$sql = "UPDATE tbl_accounts SET openingbalance='0' WHERE id='61'";
	$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
}
if(isset($_POST['totalloss'])){
	$totalloss = $_POST['totalloss'];
	$sql = "UPDATE tbl_accounts SET openingbalance='".$totalloss."' WHERE id='61'";
	$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
	$sql = "UPDATE tbl_accounts SET openingbalance='0' WHERE id='62'";
	$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
}
?>
<?php
if(isset($_POST['netprofit'])){
	$netprofit = $_POST['netprofit'];
	$sql = "UPDATE tbl_accounts SET openingbalance='".$netprofit."' WHERE id='63'";
	$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
	$sql = "UPDATE tbl_accounts SET openingbalance='0' WHERE id='64'";
	$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
}
if(isset($_POST['netloss'])){
	$netloss = $_POST['netloss'];
	$sql = "UPDATE tbl_accounts SET openingbalance='".$netloss."' WHERE id='64'";
	$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
	$sql = "UPDATE tbl_accounts SET openingbalance='0' WHERE id='63'";
	$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
}
?>