<?php
include 'header.php';
$sql = "SELECT * FROM users  WHERE  sno='".$loguser."'";
$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
$row = mysqli_fetch_assoc($result);
$headname = $row['name'];
$ugstno = $row['gstno'];
$ubamkname = $row['bamkname'];
$uacno = $row['acno'];
$uifsc = $row['ifsc'];

if(isset($_REQUEST['siid'])){
	$id = $_REQUEST['siid'];
	$pinvo = mysqli_query($conn,"SELECT * FROM tbl_salesinvoice WHERE id='".$id."'") or die("SQL Query 2 Failed.");
}else if(isset($_REQUEST['ccid'])){
	$id = $_REQUEST['ccid'];
	$pinvo = mysqli_query($conn,"SELECT * FROM tbl_customercredit WHERE id='".$id."'") or die("SQL Query 2 Failed.");
}else if(isset($_REQUEST['scid'])){
	$id = $_REQUEST['scid'];
	$pinvo = mysqli_query($conn,"SELECT * FROM tbl_salechallan WHERE id='".$id."'") or die("SQL Query 2 Failed.");
}
$porder = mysqli_fetch_assoc($pinvo);
$orderid = $porder['orderid'];
$accountid = $porder['accountid'];
$billtype = $porder['billtype'];
$refer = $porder['refer'];
$orderdate = $porder['orderdate'];
$orderduedate = $porder['orderduedate'];
$taxformat = $porder['taxformat'];
$discountFormat = $porder['discountFormat'];
$notes = $porder['notes'];
$cartarray = unserialize($porder['cartarray']);
$totaltax = $porder['totaltax'];
$totaldiscount = $porder['totaldiscount'];
$total = $porder['total'];
$created_at = $porder['created_at'];
if(isset($accountid)){
	$supplier = mysqli_query($conn,"SELECT * FROM tbl_accounts  WHERE id='".$accountid."' AND is_user='".$loguser."'")or die("SQL Query 4 Failed.");
	$srow = mysqli_fetch_assoc($supplier);
	$sname = $srow['name'];
	$sgstno = $srow['gstno'];
	$scity = $srow['city'];
	$spincode = $srow['pincode'];
}
?>
<script src="https://code.jquery.com/jquery-git.js"></script>
<style type="text/css">
	.button {
		background-color: white; 
		color: black; 
		border: 2px solid #f44336;
		width: 150px;
		height: 55px;
	}

	.button:hover {
		background-color: #f44336;
		color: white;
	}

</style>
<div style="padding-left: 50px;">
	<button class="button" onclick="printDivp('pdf')">PRINT</button>
</div>
<div id="pdf">
	<div style="border: 3px solid;margin: 50px; background-color: white;" >
		<div style="text-align: center;border-bottom: 2px solid;background-color: #f2f2f2;width: 100%;">
			<p style="font-size: xx-large;padding-top: 0px;margin-top: 0px;margin-bottom: 0px;padding-bottom: 0px;"><?php echo strtoupper($headname); ?></p>
		</div>
		<div style="border-bottom: 2px solid;padding: 25px;"></div>
		<div style="border-bottom: 2px solid;width: 100%">
			<p style="float: left;width: 33.33%;margin-bottom: 0rem;text-align: left;"><?php echo $billtype; ?></p>
			<p style="float: left;width: 33.33%;margin-bottom: 0rem;text-align: center;">TAX INVOICE</p>
			<p style="float: left;width: 33.33%;margin-bottom: 0rem;text-align: right;">Original</p>
			<p style="clear: both;margin-bottom: 0rem;"></p>
		</div>
		<div style="display: flex;">
			<div style="width: 65%;border-right: 2px solid;">
				<p>M/S : <?php echo $sname; ?></p>
				<p><?php echo $scity.' - '.$spincode; ?></p>
				<p>GST NO : <?php echo $sgstno; ?></p>
				<p style="clear: both;margin-bottom: 0rem;"></p>
			</div>
			<div style="width: 35%;border-bottom: 2px solid;background-color: #f2f2f2;margin-bottom: 40px;">
				<p style="margin-bottom: 0rem;">Bill No : #<?php echo $orderid; ?></p>
				<p style="margin-bottom: 0rem;">Challen Date : <?php echo date_format(date_create($created_at),"d/m/Y"); ?></p>
				<p style="margin-bottom: 0rem;">Challen No : #</p>
				<p style="clear: both;margin-bottom: 0rem;"></p>
			</div>
		</div>
		<div style="border-top: 2px solid;width: 100%;">
			<table style="width: 100%;">
				<thead>
					<tr style="text-align:center">
						<th style="border-right: 2px solid;width: 3%;">Sr.</th>
						<th style="border-right: 2px solid;width: 33%;">Product Name</th>
						<th style="border-right: 2px solid;width: 6%;">HSN/SAC</th>
						<th style="border-right: 2px solid;width: 6%;">Design</th>
						<th style="border-right: 2px solid;width: 6%;">QTY</th>
						<th style="border-right: 2px solid;width: 6%;">Rate</th>
						<th style="border-right: 2px solid;width: 6%;">Discount</th>
						<th style="border-right: 2px solid;width: 6%;">Taxable</th>
						<th style="border-right: 2px solid;width: 5%;">GST</th>
						<th style="border-right: 2px solid;border-bottom: 2px solid;width: 13%;" colspan="2">Tax Amount</th>						
						<th style="width: 10%;">Net</th>
					</tr>
					<tr style="text-align:center">
						<th style="border-right: 2px solid;border-bottom: 2px solid;"></th>
						<th style="border-right: 2px solid;border-bottom: 2px solid;"></th>
						<th style="border-right: 2px solid;border-bottom: 2px solid;">COD</th>
						<th style="border-right: 2px solid;border-bottom: 2px solid;">COD</th>
						<th style="border-right: 2px solid;border-bottom: 2px solid;"></th>
						<th style="border-right: 2px solid;border-bottom: 2px solid;"></th>
						<th style="border-right: 2px solid;border-bottom: 2px solid;"></th>
						<th style="border-right: 2px solid;border-bottom: 2px solid;">Amount</th>
						<th style="border-right: 2px solid;border-bottom: 2px solid;">%</th>
						<th style="border-right: 2px solid;border-bottom: 2px solid;">Central</th>
						<th style="border-right: 2px solid;border-bottom: 2px solid;">State/UT</th>
						<th style="border-bottom: 2px solid;">Amount</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sum=0;
					$a = 0;
					foreach ($cartarray as $key => $value) {
						$a++;
						$value['product_discount']=str_replace(',','',$value['product_discount']);
						$value['product_price']=str_replace(',','',$value['product_price']);
						$value['texttaxa']=str_replace(',','',$value['texttaxa']);
						$value['product_tax']=str_replace(',','',$value['product_tax']);
						$value['ammount']=str_replace(',','',$value['ammount']);
						$val = $value['texttaxa'] / $value['product_qty'];
						$dis_amt = (($value['product_price'] * $value['product_qty'] + $value['texttaxa']) * intval($value['product_discount']) )/100;
						$sum+=$val;
						?>
						<tr>
							<td style="border-right: 2px solid;"><?php echo $a; ?></td>
							<td style="border-right: 2px solid;"><?php echo $value['product_name']; ?></td>
							<td style="border-right: 2px solid;"></td>
							<td style="border-right: 2px solid;"></td>
							<td style="border-right: 2px solid;"><?php echo $value['product_qty']; ?></td>
							<td style="border-right: 2px solid;"><?php echo number_format((float)$value['product_price'], 2, '.', ''); ?></td>
							<td style="border-right: 2px solid;"><?php echo  number_format((float)$dis_amt, 2, '.', ''); ?></td>
							<td style="border-right: 2px solid;"><?php echo  number_format((float)$value['texttaxa'], 2, '.', ''); ?></td>
							<td style="border-right: 2px solid;"><?php echo  number_format((float)$value['product_tax'], 1, '.', ''); ?></td>
							<td style="border-right: 2px solid;"><?php echo  number_format((float)$val, 2, '.', ''); ?></td>
							<td style="border-right: 2px solid;"><?php echo  number_format((float)$val, 2, '.', ''); ?></td>
							<td style=""><?php echo  number_format((float)$value['ammount'], 2, '.', ''); ?></td>
						</tr>
						<?php

					}
					?>
				</tbody>
			</table>
		</div>
		<?php
		$totaldiscount=str_replace(',','',$totaldiscount);
		$totaltax=str_replace(',','',$totaltax);
		$sum=str_replace(',','',$sum);
		$total=str_replace(',','',$total);
		?>
		<div style="border-top: 2px solid;background-color: #f2f2f2;display: flex;width: 100%;">
			<p style="width: 55%;">GSTIN No. : <span> <?php echo $ugstno; ?></span></p>
			<p style="width: 5%;">Total</p>
			<p style="width: 8%;"><?php echo number_format((float)$totaldiscount, 2, '.', ''); ?></p>
			<p style="width: 9%;"><?php echo number_format((float)$totaltax, 2, '.', ''); ?></p>
			<p style="width: 6%;"><?php echo number_format((float)$sum, 2, '.', ''); ?></p>
			<p style="width: 7%;"><?php echo number_format((float)$sum, 2, '.', ''); ?></p>
			<p style="width: 10%;"><?php echo number_format((float)$total, 2, '.', ''); ?></p>
		</div>
		<div style="display: flex;">
			<div style="width: 73%;border-top: 2px solid;">
				<p style="margin-bottom: 0rem;">Bank Name : <?php echo $ubamkname; ?></p>
				<p style="margin-bottom: 0rem;">Bank A/C No. : <?php echo $uacno; ?></p>
				<p style="margin-bottom: 0rem;">RTGS/IFSC Code : <?php echo $uifsc; ?></p>
			</div>
			<div style="width: 27%;border-top: 2px solid;border-left: 2px solid;"></div>
		</div>
		<div style="display: flex;">
			<div style="width: 73%;border-top: 2px solid;">
				<p>Total GST : <?php $st = $sum + $sum; echo displaywords($st); ?></p>
				<p>Bill Amount : <?php echo displaywords($total); ?></p>
			</div>
			<div style="width: 27%;border-top: 2px solid;border-left: 2px solid;">
				<div style="display: flex;background-color: #f2f2f2;height: 30px;padding-bottom: 30px;border: 1px solid;" >
					<p style="text-align: left;width: 50%;">Grand Total</p><p style="text-align:left;width: 50%;"><?php echo number_format((float)$total, 2, '.', ''); ?></p>
				</div>
				<div>
					Note :
				</div>
			</div>
		</div>
		<div style="display: flex;">
			<div style="width: 73%;border-top: 2px solid;">
				<h6>Terms & Condition :</h6>
				<ol>
					<li>Goods once sold will not be taken back.</li>
					<li>Interest @18% p.a. will be charged if payment is not made within due date.</li>
					<li>Our risk and responsibility ceases as soon as the goods leave our premises.</li>
					<li>"Subject to 'SURAT' Jurisdiction only. <strong>E.&.O.E</strong>"</li>
				</ol>
			</div>
			<div style="width: 27%;border-top: 2px solid;float: right;padding: 10px;">
				<p style="float: right;">For, <?php echo strtoupper($headname); ?></p>
				<br>
				<br>
				<br>
				<p style="padding-left: 90px;">(Authorised Signatory)</p>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>
<?php
function displaywords($number){
	$no = round($number);
	$point = round($number - $no, 2) * 100;
	$point = abs($point);
	$hundred = null;
	$digits_1 = strlen($no);
	$i = 0;
	$str = array();
	$words = array('0' => '', '1' => 'One', '2' => 'Two',
		'3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
		'7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
		'10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
		'13' => 'Thirteen', '14' => 'Fourteen',
		'15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
		'18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
		'30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
		'60' => 'Sixty', '70' => 'Seventy',
		'80' => 'Eighty', '90' => 'Ninety');
	$digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
	while ($i < $digits_1) {
		$divider = ($i == 2) ? 10 : 100;
		$number = floor($no % $divider);
		$no = floor($no / $divider);
		$i += ($divider == 10) ? 1 : 2;
		if ($number) {
			$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
			$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
			$str [] = ($number < 21) ? $words[$number] .
			" " . $digits[$counter] . $plural . " " . $hundred
			:
			$words[floor($number / 10) * 10]
			. " " . $words[$number % 10] . " "
			. $digits[$counter] . $plural . " " . $hundred;
		} else $str[] = null;
	}
	$str = array_reverse($str);
	$result = implode('', $str);
	$points = ($point) ? "" . $words[$point / 10] . " " . $words[$point = $point % 10] : ''; 
	
	if($points != ''){        
		echo $result . "Rupees  " . $points . " Paise Only";
	} else {
		echo $result . "Rupees Only";
	}
}
?>
<script type="text/javascript">
	function printDivp(divName){
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;

		document.body.innerHTML = printContents;

		window.print();

		document.body.innerHTML = originalContents;

	}
</script>