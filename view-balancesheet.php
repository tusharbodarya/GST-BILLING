<?php include 'header.php'; ?>
<style type="text/css">
h4{
	margin: 1%;
	padding: 2%;
	text-align: center;
}
.bottomleft {
	position: absolute;
	bottom: 0px;
	left: 16px;
	font-size: 18px;
}
.bottomright {
	position: absolute;
	bottom: 0px;
	right: 16px;
	font-size: 18px;
}
</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12">
			<div class="card card-shadow mb-4">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-6">
							<div class="col-sm-12">
								<h4 class="table-info">LIABILITY</h4>
							</div>
							<table class="table text-center">
								<?php
								$total_openingbalance1 = 0;
									$sql0 = "SELECT * FROM tbl_accountsgroup WHERE EXISTS (SELECT * FROM tbl_accounts WHERE tbl_accountsgroup.id = tbl_accounts.accountsgroup) AND tbl_accountsgroup.effecton='Balance Sheet' AND tbl_accountsgroup.is_deleted='0' AND tbl_accountsgroup.sequence='1' OR tbl_accountsgroup.sequence='0'";
									// $sql0 = "SELECT tbl_accountsgroup.id,tbl_accountsgroup.name,tbl_accounts.accountsgroup FROM tbl_accountsgroup INNER JOIN tbl_accounts ON tbl_accountsgroup.id = tbl_accounts.accountsgroup WHERE tbl_accountsgroup.effecton='Balance Sheet' AND tbl_accountsgroup.is_deleted='0' AND tbl_accountsgroup.sequence='1' OR tbl_accountsgroup.sequence='0'";
									// "SELECT tbl_accountsgroup.id,tbl_accountsgroup.name,tbl_accounts.accountsgroup FROM tbl_accountsgroup  WHERE effecton='Balance Sheet' AND is_deleted='0' AND sequence='1' OR sequence='0' INNER JOIN tbl_accounts ON tbl_accountsgroup.id = tbl_accounts.accountsgroup"
									$result0 = mysqli_query($conn,$sql0) or die("SQL Query Failed.");
									while($row0 = mysqli_fetch_assoc($result0)){
										$acid0 = $row0['id'];
										$acname0 = $row0['name'];
								
										?>
								<thead>
									<tr>
										<th class="text-danger" colspan="3"><?php echo $acname0; ?></th>
									</tr>
								</thead>
								<tbody>
									<?php
									
									$sql1 = "SELECT * FROM tbl_accounts  WHERE accountsgroup='".$acid0."' AND actype='LIABILITY'";
									$result1 = mysqli_query($conn,$sql1) or die("SQL Query Failed.");
									while($row1 = mysqli_fetch_assoc($result1)){
										$acid1 = $row1['id'];
										$acname1 = $row1['name'];
										$openingbalance1 = $row1['openingbalance'];
								
										?>
										<tr>
											<td><?php echo number_format((float)$openingbalance1, 2, '.', ''); ?></td>
											<td><?php echo $acname1; ?></td>
											<td><a href="view-accountsreport.php?saletaxtype=<?php echo $taxformat0 ;?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</a></td>
										</tr>
										<?php
										$openingbalance1 = str_replace(',','',$openingbalance1);
									 $total_openingbalance1 += ((float)$openingbalance1); 
									}
									?>

								</tbody>
							<?php } ?>
							</table>
							<div class="col-sm-12 text-danger bottomleft" style="display: flex;text-align: center;">
							<div class="col-sm-6"><h4><?php echo $total_openingbalance1; ?></h4></div>
							<div class="col-sm-6"><h4>Total</h4></div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="col-sm-12">
								<h4 class="table-info">ASSET</h4>
							</div>
							<table class="table text-center">
								<?php
								$total_openingbalancea = 0;
									$sqla1 = "SELECT * FROM tbl_accountsgroup  WHERE  EXISTS (SELECT * FROM tbl_accounts WHERE tbl_accountsgroup.id = tbl_accounts.accountsgroup) AND tbl_accountsgroup.effecton='Balance Sheet' AND tbl_accountsgroup.is_deleted='0' AND tbl_accountsgroup.sequence='2' OR tbl_accountsgroup.sequence='0'";
									$resulta1 = mysqli_query($conn,$sqla1) or die("SQL Query Failed.");
									while($rowa1 = mysqli_fetch_assoc($resulta1)){
										$acida1 = $rowa1['id'];
										$acnamea1 = $rowa1['name'];
								
										?>
								<thead>
									<tr>
										<th class="text-danger" colspan="3"><?php echo $acnamea1; ?></th>
									</tr>
								</thead>
								<tbody>
									<?php
									
									$sqla = "SELECT * FROM tbl_accounts  WHERE accountsgroup='".$acida1."' AND actype='ASSET'";
									$resulta = mysqli_query($conn,$sqla) or die("SQL Query Failed.");
									while($rowa = mysqli_fetch_assoc($resulta)){
										$acida = $rowa['id'];
										$acnamea = $rowa['name'];
										$openingbalancea = $rowa['openingbalance'];
								
										?>
										<tr>
											<td><?php echo number_format((float)$openingbalancea, 2, '.', ''); ?></td>
											<td><?php echo $acnamea; ?></td>
											<td><a href="view-accountsreport.php?saletaxtype=<?php echo $taxformat0 ;?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</a></td>
										</tr>
										<?php
										$openingbalancea = str_replace(',','',$openingbalancea);
									 $total_openingbalancea += ((float)$openingbalancea); 
									}
									?>

								</tbody>
							<?php } ?>
								<tfoot>
										<tr>
											<td><h5><?php echo number_format((float)$total_openingbalancea, 2, '.', ''); ?></h5></td>
										</tr>
										<tr id="total_balp"></tr>
									</tfoot>
							</table>
							<div class="col-sm-12 text-danger bottomright" style="display: flex;text-align: center;">
							<div class="col-sm-6"><h4><?php echo $total_openingbalancea; ?></h4></div>
							<div class="col-sm-6"><h4>Total</h4></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	$sqlgl = "SELECT * FROM tbl_accounts  WHERE id='64'";
	$resultgl = mysqli_query($conn,$sqlgl) or die("SQL Query Failed.");
	$rowgl = mysqli_fetch_assoc($resultgl);
	$balancegl = $rowgl['openingbalance'];
	$sqlgp = "SELECT * FROM tbl_accounts  WHERE id='63'";
	$resultgp = mysqli_query($conn,$sqlgp) or die("SQL Query Failed.");
	$rowgp = mysqli_fetch_assoc($resultgp);
	$balancegp = $rowgp['openingbalance'];
	?>
	<script type="text/javascript">
		var balancegp = "<?php echo $balancegp; ?>";
		var balancegl = "<?php echo $balancegl; ?>";
		if(balancegp > 0){
			$("#GP").html("<td>"+balancegp+"</td><td>Gross Profit GP:</td>");
		}else if(balancegl > 0){
			$("#GL").html("<td>"+balancegl+"</td><td>Gross Loss GP:</td>");
		}

		var total_balp = <?php echo $total_balancep; ?>;
		var total_bal0 = <?php echo $total_balance0; ?>;
		total_balp = parseInt(total_balp)+parseInt(balancegl);
		total_bal0 = parseInt(total_bal0)+parseInt(balancegp);
		alert(total_balp);
		if(total_bal0 > total_balp){
			var total = total_bal0 - total_balp;
			$("#total_balp").html("<td>"+total+"</td><td>Difference GP:</td>");
		}else if(total_balp > total_bal0){
			var total = total_balp - total_bal0;
			$("#total_bal0").html("<td>"+total+"</td><td>Difference GL:</td>");
		}
	</script>
<?php include 'footer.php'; ?>