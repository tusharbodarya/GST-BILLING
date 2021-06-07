<?php
include 'dbconnect.php';
if(isset($_POST['productgroup'])){
	$productgroup = $_POST['productgroup'];
	$sql = "SELECT * FROM tbl_product  WHERE product_group='".$productgroup."'";
	$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
	while($row2 = mysqli_fetch_assoc($result)){
		?>
		<option value="<?php echo $row2['name']; ?>">
			<?php
		}
	}
		?>
