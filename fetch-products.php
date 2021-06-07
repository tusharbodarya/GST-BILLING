	<?php
	include 'dbconnect.php';
	if(isset($_POST['productn'])){
		$productn = $_POST['productn'];
		$sql1 = "SELECT * FROM tbl_product  WHERE name='".$productn."'";
		$result1 = mysqli_query($conn,$sql1) or die("SQL Query Failed.");
		while($row1 = mysqli_fetch_assoc($result1)){
		echo "
			<div id='p_price'> ".$row1['price']."</div>
			<div id='p_tax_rate' >".$row1['tax_rate']."</div>
			<div id='p_discount_rate'>".$row1['discount_rate']."</div>";
			
		}

	}
	?>