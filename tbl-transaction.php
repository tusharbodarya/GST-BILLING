<?php include 'header.php'; ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12">
			<div class="card card-shadow mb-4">
				<div class="card-header border-0">
					<div class="custom-title-wrap bar-info">
						<div class="custom-title">Suppliers Stock Return  <a type="button" class="btn btn-outline-info" href="add-transaction.php"><i class="icon-note mr-2"></i>ADD NEW</a></div>
					</div>
				</div>
				<div class="card-body- pt-3 pb-4">
					<div class="table-responsive">
						<table id="datatable2" class="table table-striped dt-responsive nowrap table-hover" cellspacing="0">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">DATE</th>
									<th class="text-center">ACCOUNT</th>
									<th class="text-center">Type</th>
									<th class="text-center">Ammount</th>
									<th class="text-center">PAYER</th>
									<th class="text-center">METHOD</th>
									<th class="text-center">ACTION</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT * FROM tbl_transaction  WHERE is_deleted='0' AND is_user='".$loguser."'";
								$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
								while($row = mysqli_fetch_assoc($result)){
									$id = $row['id'];
									$date = $row['date'];
									$income_type = $row['income_type'];
									$toaccount = $row['toaccount'];
									$ammount = $row['ammount'];
									$fromaccount = $row['fromaccount'];
									$income_method = $row['income_method'];
									$accountype = $row['accountype'];
									?>

									<tr>

										<td class="text-center"><?php echo $id; ?></td>
										<td class="text-center"><?php echo $date; ?></td>
										<?php
										$sql1 = "SELECT * FROM tbl_accounts WHERE id='".$fromaccount."'";
										$result1 = mysqli_query($conn,$sql1) or die("SQL Query Failed.");
										$row1 = mysqli_fetch_assoc($result1);
										$acname = $row1['name'];
										?>
										<td class="text-center"><?php echo $acname; ?></td>
										<td class="text-center"><?php echo $income_type; ?></td>
										<td class="text-center"><?php echo $ammount; ?></td>
										<?php
										$sql2 = "SELECT * FROM tbl_accounts  WHERE id='".$toaccount."'";
										$result2 = mysqli_query($conn,$sql2) or die("SQL Query Failed.");
										$row2 = mysqli_fetch_assoc($result2);
										$acname1 = $row2['name'];
										?>
										<td class="text-center"><?php echo $acname1; ?></td>
										<td class="text-center"><?php echo $income_method; ?></td>
										<td class="text-center">
											<a href="view-purchaseorder.php?supplierstockreturnid=<?php echo $id; ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</a>&nbsp;
											<!-- <a href="edit-purchaseorder.php?id=<?php echo $id; ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>&nbsp; -->
											<a href="delete.php?tbl=tbl_transaction&id=<?php echo $id; ?>"class="btn btn-danger btn-xs delete-object" title="Delete"><i class="fa fa-trash"></i></a>
										</td>
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