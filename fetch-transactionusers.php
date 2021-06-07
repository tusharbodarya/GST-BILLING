<?php
include 'dbconnect.php';
if(isset($_POST['accountstype']) && isset($_POST['user'])){
	$accountstype = $_POST['accountstype'];
	$loguser = $_POST['user'];
	if($accountstype == 'bank'){
		$ssql = "SELECT * FROM tbl_accounts  WHERE is_deleted='0' AND is_user='".$loguser."'  AND accountsgroup='18' OR accountsgroup='17'";
	}else if($accountstype == 'cash'){
		$ssql = "SELECT * FROM tbl_accounts  WHERE is_deleted='0' AND is_user='".$loguser."'  AND accountsgroup='21'";
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
if(isset($_POST['ac_id'])){
	$ac_id = $_POST['ac_id'];
	$sql = "SELECT * FROM tbl_accounts  WHERE id='".$ac_id."' AND is_deleted='0'";
	$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
	$row = mysqli_fetch_assoc($result);
	if(isset($row['name'])){
		echo $row['name'];
	}else{
		echo "";
	}
}
if(isset($_POST['accounts']) && !empty($_POST['accounts'])){
	$accounts = $_POST['accounts'];
	$accountssql = "SELECT * FROM tbl_accounts  WHERE id='".$accounts."'";
	$accountsresult = mysqli_query($conn,$accountssql) or die("SQL Query Failed.");
	$accountsrow = mysqli_fetch_assoc($accountsresult);
	$accountsname = $accountsrow['name'];
	$accountsopeningbalance = $accountsrow['openingbalance'];

	echo $accountsname;
}else{
	echo "";
}


?>