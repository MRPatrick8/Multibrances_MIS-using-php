<?php session_set_cookie_params(0);
session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_GET['id'];
	
	
	mysqli_query($con,"delete from supplier  where supplier_id='$id'")or die(mysqli_error());
	
	echo "<script type='text/javascript'>alert('Supplier Successfully deleted!');</script>";
	echo "<script>document.location='supplier.php'</script>";  

	
?>