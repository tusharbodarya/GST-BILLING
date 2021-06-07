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
								<h4 class="table-info">INCOME</h4>
							</div>
							<table class="table text-center">
								<thead>
									<tr id="GP"></tr>
								</thead>
								<?php

								$sqlacgroup = "SELECT * FROM tbl_accountsgroup  WHERE  EXISTS (SELECT * FROM tbl_accounts WHERE tbl_accountsgroup.id = tbl_accounts.accountsgroup) AND tbl_accountsgroup.effecton='Profit & Loss Accounts' AND tbl_accountsgroup.is_deleted='0' AND tbl_accountsgroup.sequence='1'";
								$resultacgroup = mysqli_query($conn,$sqlacgroup) or die("SQL Query Failed1.");
								while($rowacgroup = mysqli_fetch_assoc($resultacgroup)){
									$acidacgroup = $rowacgroup['id'];
									$acnameacgroup = $rowacgroup['name'];

									?>
									<tr>
										<th class="text-danger" colspan="3"><?php echo $acnameacgroup; ?></th>
									</tr>
									<tbody>
										<?php
										$total_balance0 = 0;
										$sql0 = "SELECT * FROM tbl_accounts  WHERE accountsgroup='".$acidacgroup."'";
										$result0 = mysqli_query($conn,$sql0) or die("SQL Query Failed.");
										while($row0 = mysqli_fetch_assoc($result0)){
											$acid0 = $row0['id'];
											$acname0 = $row0['name'];
											$sql = "SELECT sum(ammount),id,RcptPymt FROM tbl_transaction  WHERE RcptPymt='Receipt' AND fromaccount='".$acid0."' OR toaccount='".$acid0."'";
											$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
											$balrow = mysqli_fetch_assoc($result);
											$balance0 = $balrow['sum(ammount)'];
											$id0 = $balrow['id'];
											$RcptPymt0 = $balrow['RcptPymt'];
										// $totaltax0 = $balrow['totaltax'];
											$balance0=str_replace(',','',$balance0);
										// $balance0 = $balance0 - $totaltax0;
											?>
											<tr>
												<td><?php echo number_format((float)$balance0, 2, '.', ''); ?></td>
												<td><?php echo $acname0; ?></td>
												<td><a href="view-accountsreport.php?saletaxtype=<?php echo $RcptPymt0 ;?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</a></td>
											</tr>
											<?php
											$balance0 = str_replace(',','',$balance0);
											$total_balance0 += ((float)$balance0); 
										}
										?>
									</tbody>
								<?php } ?>
								<tfoot>
									<tr>
										<td><h5><?php echo number_format((float)$total_balance0, 2, '.', ''); ?></h5></td></tr>
										<tr id="total_bal0"></tr>
									</tfoot>
								</table>
								<div class="col-sm-12 text-danger bottomleft" style="display: flex;text-align: center;">
									<div class="col-sm-6"><h4 class="total"></h4></div>
									<div class="col-sm-6"><h4>Total</h4></div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="col-sm-12">
									<h4 class="table-info">EXPENSE</h4>
								</div>
								<table class="table text-center">
									<thead><tr id="GL"></tr></thead>
									<?php

									$sqlacgroup = "SELECT * FROM tbl_accountsgroup  WHERE  EXISTS (SELECT * FROM tbl_accounts WHERE tbl_accountsgroup.id = tbl_accounts.accountsgroup) AND tbl_accountsgroup.effecton='Profit & Loss Accounts' AND tbl_accountsgroup.is_deleted='0' AND tbl_accountsgroup.sequence='2'";
									$resultacgroup = mysqli_query($conn,$sqlacgroup) or die("SQL Query Failed1.");
									while($rowacgroup = mysqli_fetch_assoc($resultacgroup)){
										$acidacgroup = $rowacgroup['id'];
										$acnameacgroup = $rowacgroup['name'];

										?>
										<tr>
											<th class="text-danger" colspan="3"><?php echo $acnameacgroup; ?></th>
										</tr>
										<tbody>
											<?php
											$total_balancep = 0;
											$sqlp = "SELECT * FROM tbl_accounts  WHERE accountsgroup='".$acidacgroup."'";
											$resultp = mysqli_query($conn,$sqlp) or die("SQL Query Failed.");
											while($rowp = mysqli_fetch_assoc($resultp)){
												$acidp = $rowp['id'];
												$acnamep = $rowp['name'];
												$sqlp1 = "SELECT sum(ammount),id,RcptPymt FROM tbl_transaction  WHERE RcptPymt='Payment'AND fromaccount='".$acidp."' OR toaccount='".$acidp."'";
												$resultp1 = mysqli_query($conn,$sqlp1) or die("SQL Query Failed.");
												$balrowp1 = mysqli_fetch_assoc($resultp1);

												$balancep = $balrowp1['sum(ammount)'];
												$idp = $balrowp1['id'];
												$RcptPymtp = $balrowp1['RcptPymt'];
										// $totaltaxp = $balrowp1['totaltax'];
												$balancep=str_replace(',','',$balancep);
												?>
												<tr>
													<td><?php echo number_format((float)$balancep, 2, '.', ''); ?></td>
													<td><?php echo $acnamep; ?></td>
													<td><a href="view-accountsreport.php?purchasetextype=<?php echo $taxformatp ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</a></td>
												</tr>
												<?php
												$balancep = str_replace(',','',$balancep);
												$total_balancep += ((float)$balancep); 
											}
											?>
										</tbody>
									<?php } ?>
									<tfoot>
										<tr>
											<td><h5><?php echo number_format((float)$total_balancep, 2, '.', ''); ?></h5></td>
										</tr>
										<tr id="total_balp"></tr>
									</tfoot>
								</table>

								<div class="col-sm-12 text-danger bottomright" style="display: flex;text-align: center;">
									<div class="col-sm-6"><h4 class="total"></h4></div>
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
	$sqlgl = "SELECT * FROM tbl_accounts  WHERE id='61'";
	$resultgl = mysqli_query($conn,$sqlgl) or die("SQL Query Failed.");
	$rowgl = mysqli_fetch_assoc($resultgl);
	$balancegl = $rowgl['openingbalance'];
	$sqlgp = "SELECT * FROM tbl_accounts  WHERE id='62'";
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
		if(total_bal0 > total_balp){
			var total = total_bal0 - total_balp;
			$("#total_balp").html("<td>"+total+"</td><td>Net Profit GP:</td>");
			$(".total").html(totalcredit);
			$.ajax({
			url: "fetch-accounts.php",
			type: "POST",
			data: {
				netprofit: total
			},
			cache: false,
			success: function(result){
				console.log("Net Profit Account Updated successfully.");
			}
		});
		}else if(total_balp > total_bal0){
			var total = total_balp - total_bal0;
			$("#total_bal0").html("<td>"+total+"</td><td>Net Loss GL:</td>");
			$.ajax({
			url: "fetch-accounts.php",
			type: "POST",
			data: {
				netloss: total
			},
			cache: false,
			success: function(result){
				console.log("Net Loss Account Updated successfully.");
			}
		});
		}
	</script>
	<?php include 'footer.php'; ?>