<?php
include 'header.php'; 
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$accountype = $_POST['accountype'];
	$RcptPymt = $_POST['RcptPymt'];
	$accountid = $_POST['accountid'];
	$toaccount = $_POST['toaccount'];
	$ammount = $_POST['ammount'];
	$date = $_POST['date'];
	$income_type = $_POST['income_type'];
	$income_category = $_POST['income_category'];
	$income_method = $_POST['income_method'];
	$note = $_POST['note'];
	$showalert = false;
	$showerror = false;
	if(isset($RcptPymt) && isset($accountid) && isset($toaccount)){
		if($RcptPymt == 'Receipt'){
			$ac = "SELECT * FROM tbl_accounts  WHERE id='".$accountid."'";
        $acresult = mysqli_query($conn,$ac) or die("SQL Query Failed.");
        $acrow = mysqli_fetch_assoc($acresult);
        $acopeningbalance = $acrow['openingbalance'];
        $total=str_replace(',','',$ammount);
        $sum = $acopeningbalance+$total;
        $acupdatesql = "UPDATE tbl_accounts SET openingbalance='".$sum."' WHERE id='".$accountid."'";
        $acresult = mysqli_query($conn,$acupdatesql) or die("SQL Query Failed.");

        $ac1 = "SELECT * FROM tbl_accounts  WHERE id='".$toaccount."'";
        $acresult1 = mysqli_query($conn,$ac1) or die("SQL Query Failed.");
        $acrow1 = mysqli_fetch_assoc($acresult1);
        $acopeningbalance1 = $acrow1['openingbalance'];
        $total1=str_replace(',','',$ammount);
        $min1 = $acopeningbalance1-$total1;
        $acupdatesql1 = "UPDATE tbl_accounts SET openingbalance='".$min1."' WHERE id='".$toaccount."'";
        $acresult1 = mysqli_query($conn,$acupdatesql1) or die("SQL Query Failed.");
    }else if($RcptPymt == 'Payment'){
    	$ac = "SELECT * FROM tbl_accounts  WHERE id='".$accountid."'";
        $acresult = mysqli_query($conn,$ac) or die("SQL Query Failed.");
        $acrow = mysqli_fetch_assoc($acresult);
        $acopeningbalance = $acrow['openingbalance'];
        $total=str_replace(',','',$ammount);
        $min = $acopeningbalance-$total;
        $acupdatesql = "UPDATE tbl_accounts SET openingbalance='".$min."' WHERE id='".$accountid."'";
        $acresult = mysqli_query($conn,$acupdatesql) or die("SQL Query Failed.");

        $ac1 = "SELECT * FROM tbl_accounts  WHERE id='".$toaccount."'";
        $acresult1 = mysqli_query($conn,$ac1) or die("SQL Query Failed.");
        $acrow1 = mysqli_fetch_assoc($acresult1);
        $acopeningbalance1 = $acrow1['openingbalance'];
        $total1=str_replace(',','',$ammount);
        $sum = $acopeningbalance1+$total1;
        $acupdatesql1 = "UPDATE tbl_accounts SET openingbalance='".$sum."' WHERE id='".$toaccount."'";
        $acresult1 = mysqli_query($conn,$acupdatesql1) or die("SQL Query Failed.");
    }
	}
	if(isset($accountype) && isset($ammount) && !empty($accountype) && !empty($ammount)){
		$existsql = "SELECT * FROM tbl_transaction WHERE accountype='".$accountype."' AND fromaccount='".$accountid."' AND toaccount='".$toaccount."' AND is_user='".$loguser."'";
		$result = mysqli_query($conn,$existsql) or die("SQL Query Failed.");
		$existnumrows = mysqli_num_rows($result);
		// if($existnumrows > 0){
		// 	$showerror = "Transaction already Exist.";
		// }else{
			$sql = "INSERT INTO `tbl_transaction` ( `accountype`,`fromaccount`,`RcptPymt`, `toaccount`,`ammount`,`date`,`income_type`,`income_category`,`income_method`,`note`,`is_user`) VALUES ('".$accountype."','".$accountid."', '".$RcptPymt."', '".$toaccount."', '".$ammount."', '".$date."','".$income_type."', '".$income_category."', '".$income_method."', '".$note."','".$loguser."')";
			$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
			if($result){
				$showalert = true;
				// echo "<script>location.href='tbl-transaction.php';</script>";
			}else{
				$showerror = "Please Enter Correct Details";
			}
		// }
	}else{
		$showerror = "Please Fill Out Details";
	}
}else{
	$showerror = "";
	$showalert = "";
}
?>
<?php 
if($showalert){
	echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>Success</strong>  Transaction Added Successfully.
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
<style type="text/css">
	.row{
		padding-bottom: 20px;
	}
</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12">
			<div class="card card-shadow mb-4">
				<div class="row" style="padding-top: 20px;">
					<div class="col-sm-12">
						<h4>Add New Transaction</h4>
					</div>
				</div>
				<hr>
				<div class="container-fluid">
					<form method="POST">
						<div class="row">
							<div class="col-sm-4">
                                    <select name="accountype" class="selectpicker form-control" onchange="findaccounts(this.value,<?php echo $loguser; ?>)">
                                        <option value="cash">Cash</option>
                                        <option value="bank">Bank</option>
                                    </select>
                                </div>
                                <div class="frmSearch col-sm-4">
                                        <input list="accountid" class="form-control"  name="accountid" onchange="getaccounts(this.value)" id="fromaccount" autocomplete="off">
                                        <datalist id="accountid">
                                        </datalist>
                                    </div>
							<div class="col-sm-4">
								<select name="RcptPymt" id="RcptPymt" class="form-control">
									<!-- <option value='' hidden>Rcpt/Pymt </option> -->
									<option value='Receipt'>Receipt</option>
									<option value='Payment'>Payment </option>
								</select>
							</div>
						</div>
						<hr>
						<div class="row table-info">
							<div class="col-sm-4">
								<div class="col-sm-12">
									<label class="caption col-form-label">C/o <span style="color: red;">*</span></label>
									<input type="text" class="form-control" name="company_name" id="company_name" autocomplete="off">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="col-sm-12">
									<label class="caption col-form-label">To Account<span style="color: red;">*</span></label>
									<select class="form-control" name="toaccount" id="toaccount">
										<?php
											$ssql = "SELECT * FROM tbl_accounts  WHERE is_deleted='0' ORDER BY name ASC;";
											$sresult = mysqli_query($conn,$ssql) or die("SQL Query Failed.");
											while($srow2 = mysqli_fetch_assoc($sresult)){
												?>
												<option value="<?php echo $srow2['id']; ?>"><?php echo $srow2['name']; ?></option>
												<?php
											} 
							
										?>
									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="col-sm-12">
									<label class="caption col-form-label">Amount <span style="color: red;">*</span></label>
									<input type="text" class="form-control" name="ammount" id="ammount" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="col-sm-12">
									<label class="caption col-form-label">Date <span style="color: red;">*</span></label>
									<div class="input-group date dpYears" data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="<?php echo date('d/m/Y'); ?>">
										<input type="text" class="form-control"  value="<?php echo date('d/m/Y'); ?>" name='date' aria-label="Right Icon" aria-describedby="dp-ig">
										<div class="input-group-append">
											<button id="dp-ig" class="btn btn-outline-secondary" type="button"><i class="fa fa-calendar f14"></i></button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="col-sm-12">
									<label class="caption col-form-label">Type<span style="color: red;">*</span></label>
									<select class="form-control" name="income_type" id="income_type">
										<option value="CREDIT">INCOME/CREDIT</option>
										<option value="DEBIT">EXPENSE/DEBIT</option>
									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="col-sm-12">
									<label class="caption col-form-label">Category <span style="color: red;">*</span></label>
									<select class="form-control" name="income_category" id="income_category">
										<option value="INCOME">INCOME</option>
										<option value="EXPENSE">EXPENSE</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row table-info">
							<div class="col-sm-4">
								<div class="col-sm-12">
									<label class="caption col-form-label">Method <span style="color: red;">*</span></label>
									<select class="form-control" name="income_method" id="income_method">
										<option value="CASH">CASH</option>
										<option value="CARD">CARD</option>
										<option value="CHEQUE">CHEQUE</option>
										<option value="BANK">BANK</option>
										<option value="OTHER">OTHER</option>
									</select>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="col-sm-12">
									<label class="caption col-form-label">Note <span style="color: red;">*</span></label>
									<input type="text" class="form-control" name="note" id="note" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="row" style="padding-top: 20px;">
							<div class="col-sm-12">
								<button type="submit" class="btn btn-success">Add Transaction</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>
<script type="text/javascript">
	$(document).ready(function(){
		findaccounts('cash',<?php echo $loguser; ?>);
	});

function findaccounts(name,user){
    var accountstype = name;
    var user = user;
    console.log(accountstype);
    console.log(user);
    $.ajax({
        url: "fetch-transactionusers.php",
        type: "POST",
        data: {
            accountstype: accountstype,user:user
        },
        cache: false,
        success: function(result){
            console.log(result);
            $("#accountid").html(result);
        }
    });
}
	function getaccounts(name){
    var accounts = name;
    console.log(accounts);
    $.ajax({
        url: "fetch-transactionusers.php",
        type: "POST",
        data: {
            accounts: accounts
        },
        cache: false,
        success: function(result){
            console.log(result);
            $("#company_name").val(result);
        }
    });
}
</script>