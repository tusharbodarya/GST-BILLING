<?php
include 'dbconnect.php';
if(isset($_POST['id'])){
	$modid = $_POST['id'];
	$sql1 = "SELECT * FROM tbl_notes  WHERE is_deleted='0' AND id='".$modid."'";
	$result1 = mysqli_query($conn,$sql1) or die("SQL Query Failed.");
	$row1 = mysqli_fetch_assoc($result1);
	$edittitle = $row1['title'];
	$editdescription = $row1['description'];
?>
<table border="2px" style="width: 100%;">
		<tr>
			<th>Titel</th>
			<td><?php echo $edittitle; ?></td>
		</tr>
		<tr>
			<th>Description</th>
			<td><?php echo $editdescription; ?></td>
		</tr>
</table>
<?php } ?>
