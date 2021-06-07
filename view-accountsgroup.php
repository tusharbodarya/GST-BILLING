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
									<th>ACCOUNT GROUP</th>
									<th>OPENING BALANCE</th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$accountid = $_REQUEST['id'];
								$sql = "SELECT * FROM tbl_accounts  WHERE accountsgroup='".$accountid."' AND is_deleted='0'";
								$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
								while($row = mysqli_fetch_assoc($result)){
									$id = $row['id'];
									$name = $row['name'];
									$accountsgroup = $row['accountsgroup'];
									$openingbalance	 = $row['openingbalance'];
									?>
									<tr>
										<td><?php echo $id; ?></td>
										<td><?php echo $name; ?></td>
										<?php
										$sql1 = "SELECT * FROM tbl_accountsgroup  WHERE id='".$accountsgroup."'";
										$result1 = mysqli_query($conn,$sql1) or die("SQL Query Failed.");
										$row1 = mysqli_fetch_assoc($result1);
										$accountsgroupname = $row1['name'];
											?>
										<td><?php echo $accountsgroupname; ?></td>
										<td><?php echo $openingbalance; ?></td>
										<td><button type="button" class="btn btn-success"  data-toggle="modal" onclick="modelview('<?php echo $id; ?>')" data-target="#exampleModal">View</button>&nbsp;
											<a href="edit-accounts.php?id=<?php echo $id; ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>&nbsp;
											<a href="delete.php?tbl=tbl_accounts&id=<?php echo $id; ?>"class="btn btn-danger btn-xs delete-object" title="Delete"><i class="fa fa-trash"></i></a>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Product Details</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Woohoo, you're reading this text in a modal!
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
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
	function modelview(id){
		$.ajax({
			url:"accounts_model.php",
			type : "POST",
			data : {id:id},
			success : function(data){
				$('.modal-body').html(data);
			}
		});
	}
</script>
<?php include 'footer.php'; ?>