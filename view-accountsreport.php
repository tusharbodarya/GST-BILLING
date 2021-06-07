<?php include 'header.php'; ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12">
			<div class="card card-shadow mb-4">
				<div class="card-header border-0">
					<div class="custom-title-wrap bar-info">
						<div class="custom-title">MANAGE INVOICES </div>
					</div>
				</div>
				<div class="card-body- pt-3 pb-4">
					<div class="table-responsive">
						<table id="datatable2" class="table table-striped dt-responsive nowrap table-hover" cellspacing="0">
							<thead>
								<tr>
									<th class="text-center">ORDER ID</th>
									<th class="text-center">DATE</th>
									<th class="text-center">TYPE</th>
									<th class="text-center">ACCOUNT NAME</th>
									<th class="text-center">Total Ammount</th>
									<th class="text-center">Total Balance</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if(isset($_REQUEST['saletaxtype'])){
								$saletaxtype = $_REQUEST['saletaxtype'];
								$sql = "SELECT * FROM tbl_salesinvoice  WHERE taxformat='".$saletaxtype."' AND is_user='".$loguser."'";
							    $type = 'sale';
							}else if(isset($_REQUEST['purchasetextype'])){
								$purchasetextype = $_REQUEST['purchasetextype'];
								$sql = "SELECT * FROM tbl_purchaseorder  WHERE taxformat='".$purchasetextype."' AND is_user='".$loguser."'";
							    $type = 'Purchase';
							}else if(isset($_REQUEST['saleaccountid'])){
								$saleaccountid = $_REQUEST['saleaccountid'];
								$sql = "SELECT * FROM tbl_salesinvoice  WHERE accountid='".$saleaccountid."' AND is_user='".$loguser."'";
							    $type = 'sale';
							}else if(isset($_REQUEST['purchaseaccountid'])){
								$purchaseaccountid = $_REQUEST['purchaseaccountid'];
								$sql = "SELECT * FROM tbl_purchaseorder  WHERE accountid='".$purchaseaccountid."' AND is_user='".$loguser."'";
							    $type = 'Purchase';
							}
								$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
								while($row = mysqli_fetch_assoc($result)){
									$id = $row['id'];
									$orderid = $row['orderid'];
									$accountid = $row['accountid'];
									$orderdate = $row['orderdate'];
									$orderduedate = $row['orderduedate'];
									$total = $row['total'];
									?>

									<tr>

										<td class="text-center"><?php echo $orderid; ?></td>
										<td class="text-center"><?php echo $orderdate; ?></td>
										<td class="text-center"><?php echo $type; ?></td>
										<?php
										$sql1 = "SELECT * FROM tbl_accounts  WHERE id='".$accountid."' AND is_user='".$loguser."'";
										$result1 = mysqli_query($conn,$sql1) or die("SQL Query Failed.");
										$row1 = mysqli_fetch_assoc($result1);
										$accountname = $row1['name'];
										$accountopeningbalance = $row1['openingbalance'];
										?>
										<td class="text-center"><?php echo $accountname; ?></td>
										<td class="text-center"><?php echo $total; ?></td>
										<td class="text-center"><?php echo $accountopeningbalance; ?></td>
									</tr>

									<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#datatable2').DataTable({
			dom: 'Bfrtip',
			buttons: [
			'copyHtml5',
			'excelHtml5',
			'csvHtml5',
			'pdfHtml5'
			]
		});

	});
</script>
<?php include 'footer.php'; ?>