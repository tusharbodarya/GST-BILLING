<?php include 'dbconnect.php'; ?>
<?php
$tbl_name = $_GET['tbl'];
$id = $_GET['id'];


$sql = mysqli_query($conn,"UPDATE $tbl_name SET is_deleted='1' WHERE id=$id");

if(isset($tbl_name) && $tbl_name == "tbl_customer") 
{
	echo '<script>window.location="tbl-clientgroup.php"</script>';
}
if(isset($tbl_name) && $tbl_name == "tblclient_group") 
{
	echo '<script>window.location="tbl-clientgroup.php"</script>';
}
if(isset($tbl_name) && $tbl_name == "tbl_productcategory") 
{
	echo '<script>window.location="tbl-productcategory.php"</script>';
}
if(isset($tbl_name) && $tbl_name == "tbl_productgroup") 
{
	echo '<script>window.location="tbl-productgroup.php"</script>';
}
if(isset($tbl_name) && $tbl_name == "tbl_product") 
{
	echo '<script>window.location="tbl-product.php"</script>';
}
if(isset($tbl_name) && $tbl_name == "tbl_accounts") 
{
	echo '<script>window.location="tbl-accounts.php"</script>';
}
if(isset($tbl_name) && $tbl_name == "tbl_suppliers") 
{
	echo '<script>window.location="tbl-suppliers.php"</script>';
}
if(isset($tbl_name) && $tbl_name == "tbl_purchaseorder") 
{
	echo '<script>window.location="tbl-purchaseorder.php"</script>';
}
if(isset($tbl_name) && $tbl_name == "tbl_supplierstockreturn") 
{
	echo '<script>window.location="tbl-supplierstockreturn.php"</script>';
}
if(isset($tbl_name) && $tbl_name == "tbl_customerstockreturn") 
{
	echo '<script>window.location="tbl-customerstockreturn.php"</script>';
}
if(isset($tbl_name) && $tbl_name == "tbl_salesinvoice") 
{
	echo '<script>window.location="tbl-saleinvoice.php"</script>';
}
if(isset($tbl_name) && $tbl_name == "tbl_customercredit") 
{
	echo '<script>window.location="tbl-customercredit.php"</script>';
}
if(isset($tbl_name) && $tbl_name == "tbl_salechallan") 
{
	echo '<script>window.location="tbl-salechallan.php"</script>';
}
if(isset($tbl_name) && $tbl_name == "tbl_transaction") 
{
	echo '<script>window.location="tbl-transaction.php"</script>';
}
if(isset($tbl_name) && $tbl_name == "tbl_notes") 
{
	echo '<script>window.location="tbl-notes.php"</script>';
}

?>