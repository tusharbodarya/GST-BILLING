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
								<h4 class="table-info">CREDIT</h4>
							</div>
							<table class="table text-center">
								<tbody>
									<?php
									$total_balance0 = 0;
									$sqlacgroup = "SELECT * FROM tbl_accountsgroup  WHERE  EXISTS (SELECT * FROM tbl_accounts WHERE tbl_accountsgroup.id = tbl_accounts.accountsgroup) AND tbl_accountsgroup.effecton='Trading Accounts' AND tbl_accountsgroup.is_deleted='0' AND tbl_accountsgroup.sequence='1'";
									$resultacgroup = mysqli_query($conn,$sqlacgroup) or die("SQL Query Failed.");
									while($rowacgroup = mysqli_fetch_assoc($resultacgroup)){
										$acidacgroup = $rowacgroup['id'];
										$acnameacgroup = $rowacgroup['name'];
										
										?>
										<tr>
											<th class="text-danger" colspan="3"><?php echo $acnameacgroup; ?></th>
										</tr>
										<?php
										$sql0 = "SELECT * FROM tbl_accounts  WHERE accountsgroup='".$acidacgroup."' AND actype='CREDIT' AND is_deleted='0'";
										$result0 = mysqli_query($conn,$sql0) or die("SQL Query Failed 1.");
										while($row0 = mysqli_fetch_assoc($result0)){
											$acid0 = $row0['id'];
											$acname0 = $row0['name'];
											if($acid0 == 2){
												$sql = "SELECT sum(total),id,taxformat,totaltax FROM tbl_salesinvoice  WHERE taxformat='gst' AND is_deleted='0'";
												$result = mysqli_query($conn,$sql) or die("SQL Query Failed 2.");
												$balrow = mysqli_fetch_assoc($result);

												$balance0 = $balrow['sum(total)'];
												$id0 = $balrow['id'];
												$taxformat0 = $balrow['taxformat'];
												$totaltax0 = $balrow['totaltax'];
												$balance0=str_replace(',','',$balance0);
												$balance0 = (int)$balance0 - $totaltax0;
											}else if($acid0 == 3){
												$sql = "SELECT sum(total),id,taxformat,totaltax FROM tbl_salesinvoice  WHERE taxformat='igst' AND is_deleted='0'";
												$result = mysqli_query($conn,$sql) or die("SQL Query Failed 3.");
												$balrow = mysqli_fetch_assoc($result);

												$balance0 = $balrow['sum(total)'];
												$id0 = $balrow['id'];
												$taxformat0 = $balrow['taxformat'];
												$totaltax0 = $balrow['totaltax'];
												$balance0=str_replace(',','',$balance0);
												$balance0 = (int)$balance0 - $totaltax0;
											}else if($acid0 == 6){
												$sql = "SELECT sum(total),id,taxformat,totaltax FROM tbl_salesinvoice  WHERE taxformat='other' AND is_deleted='0'";
												$result = mysqli_query($conn,$sql) or die("SQL Query Failed 4.");
												$balrow = mysqli_fetch_assoc($result);

												$balance0 = $balrow['sum(total)'];
												$id0 = $balrow['id'];
												$taxformat0 = $balrow['taxformat'];
												$totaltax0 = $balrow['totaltax'];
												$balance0=str_replace(',','',$balance0);
												$balance0 = (int)$balance0 - $totaltax0;
											}else{
												$sql = "SELECT sum(ammount),id,RcptPymt FROM tbl_transaction  WHERE RcptPymt='Receipt' AND fromaccount='".$acid0."' OR toaccount='".$acid0."'";
												$result = mysqli_query($conn,$sql) or die("SQL Query Failed 5.");
												$balrow = mysqli_fetch_assoc($result);
												$balance0 = $balrow['sum(ammount)'];
												$id0 = $balrow['id'];
												$RcptPymt0 = $balrow['RcptPymt'];
											}
											
											?>
											<tr>
												<td><?php echo number_format((float)$balance0, 2, '.', ''); ?></td>
												<td><?php echo $acname0; ?></td>
												<td><a href="view-accountsreport.php?saletaxtype=<?php echo $taxformat0 ;?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</a></td>
											</tr>
											<?php
											$balance0 = str_replace(',','',$balance0);
											$total_balance0 += ((float)$balance0); 
										}
										?>
									</tbody>
								<?php } ?>
								<tfoot id="total_bal0"></tfoot>
							</table>
							<div class="col-sm-12" style="display: flex;text-align: center;">
								<input type="hidden" name="totalcredit" id="totalcredit" value="<?php echo $total_balance0; ?>" >
							</div>
							<div class="col-sm-12 text-danger bottomleft" style="display: flex;text-align: center;">
								<div class="col-sm-6"><h4 class="total"></h4></div>
								<div class="col-sm-6"><h4>Total</h4></div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="col-sm-12">
								<h4 class="table-info">DEBIT</h4>
							</div>
							<table class="table text-center">
								<tbody>
									<?php
									$total_balancep = 0;
									$sqlacgroup1 = "SELECT * FROM tbl_accountsgroup  WHERE  EXISTS (SELECT * FROM tbl_accounts WHERE tbl_accountsgroup.id = tbl_accounts.accountsgroup) AND tbl_accountsgroup.effecton='Trading Accounts' AND tbl_accountsgroup.is_deleted='0' AND tbl_accountsgroup.sequence='2'";
									$resultacgroup1 = mysqli_query($conn,$sqlacgroup1) or die("SQL Query Failed 6.");
									while($rowacgroup1 = mysqli_fetch_assoc($resultacgroup1)){
										$acidacgroup1 = $rowacgroup1['id'];
										$acnameacgroup1 = $rowacgroup1['name'];
										
										?>
										<tr>
											<th class="text-danger" colspan="3"><?php echo $acnameacgroup1 ;?></th>
										</tr>
										<?php
										
										$sqlp = "SELECT * FROM tbl_accounts  WHERE accountsgroup='".$acidacgroup1."' AND actype='DEBIT' AND is_deleted='0'";
										$resultp = mysqli_query($conn,$sqlp) or die("SQL Query Failed 7.");
										while($rowp = mysqli_fetch_assoc($resultp)){
											$acidp = $rowp['id'];
											$acnamep = $rowp['name'];
											if($acidp == 10){
												$sqlp1 = "SELECT sum(total),id,taxformat,totaltax FROM tbl_purchaseorder  WHERE taxformat='gst' AND is_deleted='0'";
												$resultp1 = mysqli_query($conn,$sqlp1) or die("SQL Query Failed 8.");
												$balrowp1 = mysqli_fetch_assoc($resultp1);

												$balancep = $balrowp1['sum(total)'];
												$idp = $balrowp1['id'];
												$taxformatp = $balrowp1['taxformat'];
												$totaltaxp = $balrowp1['totaltax'];
												$balancep=str_replace(',','',$balancep);
												$balancep=(int)$balancep-((int)$totaltaxp);
											} else if($acidp == 11){
												$sqlp1 = "SELECT sum(total),id,taxformat,totaltax FROM tbl_purchaseorder  WHERE taxformat='igst' AND is_deleted='0'";
												$resultp1 = mysqli_query($conn,$sqlp1) or die("SQL Query Failed 9.");
												$balrowp1 = mysqli_fetch_assoc($resultp1);

												$balancep = $balrowp1['sum(total)'];
												$idp = $balrowp1['id'];
												$taxformatp = $balrowp1['taxformat'];
												$totaltaxp = $balrowp1['totaltax'];
												$balancep=str_replace(',','',$balancep);
												$balancep=(int)$balancep-((int)$totaltaxp);
											} else if($acidp == 14){
												$sqlp1 = "SELECT sum(total),id,taxformat,totaltax FROM tbl_purchaseorder  WHERE taxformat='other' AND is_deleted='0'";
												$resultp1 = mysqli_query($conn,$sqlp1) or die("SQL Query Failed 10.");
												$balrowp1 = mysqli_fetch_assoc($resultp1);

												$balancep = $balrowp1['sum(total)'];
												$idp = $balrowp1['id'];
												$taxformatp = $balrowp1['taxformat'];
												$totaltaxp = $balrowp1['totaltax'];
												$balancep=str_replace(',','',$balancep);
												$balancep=(int)$balancep-((int)$totaltaxp);
											}else{
												$sql = "SELECT sum(ammount),id FROM tbl_transaction  WHERE toaccount='".$acidp."'";
												$result = mysqli_query($conn,$sql) or die("SQL Query Failed 11.");
												$balrow = mysqli_fetch_assoc($result);
												$balancep = $balrow['sum(ammount)'];
												$id0 = $balrow['id'];
											}

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
								<tfoot id="total_balp">
									
								</tfoot>
							</table>
							<div class="col-sm-12" style="display: flex;text-align: center;">
								<input type="hidden" name="totaldebit" id="totaldebit" value="<?php echo $total_balancep; ?>">
							</div>
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
// if($total_balancep > $total_balance0){
// $total = $total_balancep - $total_balance0;
// 	$sql = "UPDATE tbl_accounts SET openingbalance='".$total."' WHERE id='62'";
// 	$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
// 	echo "<script></script>";
// }else if($total_balance0 > $total_balancep){
// 	$total = $total_balance0 - $total_balancep;
// 	$sql = "UPDATE tbl_accounts SET openingbalance='".$total."' WHERE id='61'";
// 	$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
// } 

?>
<script type="text/javascript"> 
	var totaldebit = $("#totaldebit").val();
	var totalcredit = $("#totalcredit").val();
	if(totalcredit > totaldebit){
		var total = totalcredit - totaldebit;
		$("#total_balp").html("<tr><td><h5>"+total+"</h5></td><td><h5>Gross Profit GP:</h5></td></tr>");
		$(".total").html(totalcredit);
		$.ajax({
			url: "fetch-accounts.php",
			type: "POST",
			data: {
				totalprofit: total
			},
			cache: false,
			success: function(result){
				console.log("Gross Profit Account Updated successfully.");
			}
		});
	}else if(totaldebit > totalcredit){
		var total = totaldebit - totalcredit;
		$("#total_bal0").html("<tr><td><h5>"+total+"</h5></td><td><h5>Gross Loss GL:</h5></td></tr>");
		$(".total").html(totaldebit);
		$.ajax({
			url: "fetch-accounts.php",
			type: "POST",
			data: {
				totalloss: total
			},
			cache: false,
			success: function(result){
				console.log("Gross Loss Account Updated successfully.");
			}
		});
	}
	console.log(total);
</script>
<?php include 'footer.php'; ?>