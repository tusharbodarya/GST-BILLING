<?php include 'header.php'; ?>
<div id="invoice-company-details" class="row mt-2">
	<div class="col-md-6 col-sm-12 text-xs-center text-md-left"><p></p>
		<img src="https://pos.ultimatekode.com/userfiles/company/logo.png"
		class="img-responsive p-1 m-b-2" style="max-height: 120px;">
		<p class="ml-2">ABC Company</p>
	</div>
	<div class="col-md-6 col-sm-12 text-xs-center text-md-right">
		<h2>Purchase Order</h2>
		<p class="pb-1"> PO#1002</p>
		<p class="pb-1">Reference:</p>                        <ul class="px-0 list-unstyled">
			<li>Gross Amount</li>
			<li class="lead text-bold-800">$ 440.02</li>
		</ul>
	</div>
</div>
<!--/ Invoice Company Details -->

<!-- Invoice Customer Details -->
<div id="invoice-customer-details" class="row pt-2">
	<div class="col-sm-12 text-xs-center text-md-left">
		<p class="text-muted">Bill From</p>
	</div>
	<div class="col-md-6 col-sm-12 text-xs-center text-md-left">
		<ul class="px-0 list-unstyled">


			<li class="text-bold-800"><a
				href="https://pos.ultimatekode.com/supplier/view?id=2"><strong
				class="invoice_a">Cecelia Gierhard</strong></a></li><li>59226 Spenser Parkway</li><li>Bakersfield,United States</li><li> Phone: 661-972-8611</li><li> Email: cgierhard1@yahoo.co.jp                            </li>
			</ul>

		</div>
		<div class="offset-md-3 col-md-3 col-sm-12 text-xs-center text-md-left">
			<p><span class="text-muted">Order Date :</span> 20-03-2021</p> <p><span class="text-muted">Due Date :</span> 20-03-2021</p>  <p><span class="text-muted">Terms :</span> Payment On Receipt</p>                    </div>
		</div>
		<!--/ Invoice Customer Details -->

		<!-- Invoice Items Details -->
		<div id="invoice-items-details" class="pt-2">
			<div class="row">
				<div class="table-responsive col-sm-12">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Description</th>
								<th class="text-xs-left">Rate</th>
								<th class="text-xs-left">Qty</th>
								<th class="text-xs-left">Tax</th>
								<th class="text-xs-left"> Discount</th>
								<th class="text-xs-left">Amount</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">1</th>
								<td>Pasta - Orecchiette</td>                           
								<td>$ 407.42</td>
								<td>1.00</td>
								<td>$ 44.82 (11.00%)</td>
								<td>$ 12.22 (3.00%)</td>
								<td>$ 440.02</td>
							</tr><tr><td colspan=5></td></tr>
						</tbody>
					</table>
				</div>
			</div>
			<p></p>
			<div class="row">
				<div class="col-md-7 col-sm-12 text-xs-center text-md-left">


					<div class="row">
						<div class="col-md-8"><p
							class="lead">Payment Status:
							<u><strong
								id="pstatus">Due</strong></u>
							</p>
							<p class="lead">Payment Method: <u><strong
								id="pmethod"></strong></u>
							</p>

							<p class="lead mt-1"><br>Note:</p>
							<code>
							</code>
						</div>
					</div>
				</div>
				<div class="col-md-5 col-sm-12">
					<p class="lead">Total Due</p>
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
									<td>Sub Total</td>
									<td class="text-xs-right"> $ 407.42</td>
								</tr>
								<tr>
									<td>TAX</td>
									<td class="text-xs-right">$ 44.82</td>
								</tr>
								<tr>
									<td> Discount</td>
									<td class="text-xs-right">$ 12.22</td>
								</tr>
								<tr>
									<td> Shipping</td>
									<td class="text-xs-right">$ 0.00</td>
								</tr>
								<tr>
									<td class="text-bold-800">Total</td>
									<td class="text-bold-800 text-xs-right"> $ 440.02</td>
								</tr>
								<tr>
									<td>Payment Made</td>
									<td class="pink text-xs-right">
										(-)  <span id="paymade">$ 0.00</span></td>
									</tr>
									<tr class="bg-grey bg-lighten-4">
										<td class="text-bold-800">Balance Due</td>
										<td class="text-bold-800 text-xs-right">  <span id="paydue">$ 440.02</span></strong></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="text-xs-center">
							<p>Authorized person</p>
							<img src="https://pos.ultimatekode.com/userfiles/employee_sign/sign.png" alt="signature" class="height-100"/>
							<h6>(BusinessOwner)</h6>
							<p class="text-muted">Business Owner</p>                            </div>
						</div>
					</div>
				</div>

				<!-- Invoice Footer -->

				<div id="invoice-footer"><p class="lead">Debit Transactions:</p>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Date</th>
								<th>Method</th>
								<th>Debit</th>
								<th>Credit</th>
								<th>Note</th>


							</tr>
						</thead>
						<tbody id="activity">

						</tbody>
					</table>

					<div class="row">

						<div class="col-md-7 col-sm-12">

							<h6>Terms & Condition</h6>
							<p> <strong>Payment On Receipt</strong><br><p>1. 10% discount if payment received within ten days otherwise payment 30 days after invoice date<br></p></p>
						</div>

					</div>

				</div>
	
				<!--/ Invoice Footer -->
				<hr>
				<?php include 'footer.php'; ?>