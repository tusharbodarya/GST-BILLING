<?php include 'header.php'; ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12">
			<div class="card card-shadow mb-4">
				<div class="card-header border-0">
					<div class="custom-title-wrap bar-info">
						<div class="custom-title">PURCHASE ORDER  <a type="button" class="btn btn-outline-info" href="add-purchaseorder.php"><i class="icon-note mr-2"></i>ADD NEW</a></div>
					</div>
				</div>
				<div class="card-body- pt-3 pb-4">
					<div class="table-responsive">
						<table id="datatable2" class="table table-striped dt-responsive nowrap table-hover" cellspacing="0">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">ORDER ID</th>
									<th class="text-center">ACCOUNT NAME</th>
									<th class="text-center">ORDER DATE</th>
									<th class="text-center">ORDER DUE DATE</th>
									<th class="text-center">TOTAL AMOUNT</th>
									<th class="text-center">ACTION</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT * FROM tbl_purchaseorder  WHERE is_deleted='0' AND is_user='".$loguser."'";
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
										<td class="text-center"><?php echo $id; ?></td>
										<td class="text-center"><?php echo $orderid; ?></td>
										<?php
										$sql1 = "SELECT * FROM tbl_accounts  WHERE id='".$accountid."' AND is_user='".$loguser."'";
										$result1 = mysqli_query($conn,$sql1) or die("SQL Query Failed.");
										$row1 = mysqli_fetch_assoc($result1);
										$suppliername = $row1['name'];
										?>
										<td class="text-center"><?php echo $suppliername; ?></td>
										<td class="text-center"><?php echo $orderdate; ?></td>
										<td class="text-center"><?php echo $orderduedate; ?></td>
										<td class="text-center"><?php echo $total; ?></td>
										<td class="text-center">
											<a href="view-purchaseorder.php?purchaseid=<?php echo $id; ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</a>&nbsp;
											<!-- <a href="edit-purchaseorder.php?id=<?php echo $id; ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>&nbsp; -->
											<a href="delete.php?tbl=tbl_purchaseorder&id=<?php echo $id; ?>"class="btn btn-danger btn-xs delete-object" title="Delete"><i class="fa fa-trash"></i></a>
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