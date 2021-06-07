<?php
include 'header.php';
$accountname = $_POST['accountname'];
$actype = $_POST['actype'];
$from = $_POST['from'];
$to = $_POST['to'];
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12">
			<div class="card card-shadow mb-4">
				<div class="card-header border-0">
					<div class="custom-title-wrap bar-info">
						<div class="custom-title">ACCOUNTS  <a type="button" class="btn btn-outline-info" href="add-accounts.php"><i class="icon-note mr-2"></i>ADD NEW</a></div>
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
								</tr>
							</thead>
							<tbody>
								<?php
								if(isset($accountname) && $actype=='ALL'){
									$sql = "SELECT * FROM tbl_accounts  WHERE id='".$accountname."' AND created_at between '".date('Y-m-d',strtotime($from))."' and '".date('Y-m-d',strtotime($to))."' AND is_user='".$loguser."'";
								}else if(isset($accountname) && $actype=='Debit'){
									$sql = "SELECT * FROM tbl_accounts  WHERE id='".$accountname."' AND actype='".$actype."' AND created_at between '".date('Y-m-d',strtotime($from))."' and '".date('Y-m-d',strtotime($to))."' AND is_user='".$loguser."'";
								}else if(isset($accountname) && $actype=='Credit'){
									$sql = "SELECT * FROM tbl_accounts  WHERE id='".$accountname."' AND actype='".$actype."' AND created_at between '".date('Y-m-d',strtotime($from))."' and '".date('Y-m-d',strtotime($to))."' AND is_user='".$loguser."'";
								}else{
									echo "<script>location.href='accounts-statement.php';</script>";
								}
								$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
								while($row = mysqli_fetch_assoc($result)){
									$date = $row['created_at'];
									$name = $row['name'];
									$accountsgroup = $row['accountsgroup'];
									$openingbalance	 = $row['openingbalance'];
									?>

									<tr>

										<td><?php echo date('d-m-Y h:i A',strtotime($date)); ?></td>
										<td><?php echo $name; ?></td>
										<td><?php echo $accountsgroup; ?></td>
										<td><?php echo $openingbalance;?>.00</td>
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