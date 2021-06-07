<?php include 'header.php'; ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12">
			<div class="card card-shadow mb-4">
				<div class="card-header border-0">
					<div class="custom-title-wrap bar-info">
						<div class="custom-title">Account Group<a type="button" class="btn btn-outline-info" href="add-accountsgroup.php"><i class="icon-note mr-2"></i>ADD NEW</a></div>
					</div>
				</div>
				<div class="card-body- pt-3 pb-4">
					<div class="table-responsive">
						<table id="datatable2" class="table table-striped dt-responsive nowrap table-hover" cellspacing="0">
							<thead>
								<tr>
									<th>#</th>
									<th>NAME</th>
									<th>EFFECT ON</th>
									<th>SEQUENCE</th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$sql = "SELECT * FROM tbl_accountsgroup  WHERE is_deleted='0' AND is_user='".$loguser."'";
							$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
							while($row = mysqli_fetch_assoc($result)){
								$id = $row['id'];
								$name = $row['name'];
								$effecton = $row['effecton'];
								$sequence = $row['sequence'];
								?>
								
									<tr>

										<td><?php echo $id; ?></td>
										<td><?php echo $name; ?></td>
										<td><?php echo $effecton; ?></td>
										<td><?php echo $sequence; ?></td>
										<td>
											<a href="view-accountsgroup.php?id=<?php echo $id; ?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i>  View</a>&nbsp;
											<a href="edit-accountsgroup.php?id=<?php echo $id; ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>&nbsp;
											<a href="delete.php?tbl=tbl_accountsgroup&id=<?php echo $id; ?>"class="btn btn-danger btn-xs delete-object" title="Delete"><i class="fa fa-trash"></i></a>
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