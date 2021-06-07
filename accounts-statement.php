<?php include 'header.php'; ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12">
			<div class="card card-shadow mb-4">
				<div class="card-header border-0">
					<div class="custom-title-wrap bar-success">
						<div class="custom-title">Account Statement</div>
					</div>
				</div>
				<div class="card-body">
					<form class="needs-validation" action="view-accountstatement.php" method="POST" novalidate>
						<div class="form-row">
							<label class="col-sm-2 col-form-label" for="accountname">Account Name *</label>
							<div class="col-md-6 mb-3">
								<select name="accountname" id="accountname" class="form-control">
									<?php
									$result = mysqli_query($conn,"select * from tbl_accounts WHERE is_deleted='0' AND is_user='".$loguser."'");
									while($row = mysqli_fetch_array($result)) {
										?>
										<option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-row">
							<label class="col-sm-2 col-form-label" for="actype">Type *</label>
							<div class="col-md-6 mb-3">
								<select name="actype" id="actype" class="form-control">
									<option value='ALL'>All-Transactions </option>
									<option value='Debit'>Debit</option>
									<option value='Credit'>Credit </option>
								</select>
							</div>
						</div>
						<div class="form-row">
							<label class="col-sm-2 col-form-label">Date Range</label>
							<div class="col-md-6 mb-3">
								<div class="input-group" data-date="12/07/2017" data-date-format="mm/dd/yyyy">
									<input type="text" class="form-control rounded dpd1" name="from">
									<span class="px-3 py-2">To</span>
									<input type="text" class="form-control rounded dpd2" name="to">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"></label>
							<div class="col-sm-4">
								<button class="btn btn-success" type="submit">VIEW STATEMENT</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	(function() {
		'use strict';
		window.addEventListener('load', function() {
			var forms = document.getElementsByClassName('needs-validation');
			var validation = Array.prototype.filter.call(forms, function(form) {
				form.addEventListener('submit', function(event) {
					if (form.checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					}
					form.classList.add('was-validated');
				}, false);
			});
		}, false);
	})();
</script>
<?php include 'footer.php';?>