<?php session_set_cookie_params(0);
session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	//$name = $_POST['name'];
	$qty =$_POST['qty'];
	$amt =$_POST['amt'];
	$due =$_POST['due'];
	$mode =$_POST['mode'];
	//$rec =$_POST['rec'];
	
	mysqli_query($con,"update stockin set qty='$qty',amount='$amt',due='$due',mode='$mode' where stockin_id='$id'")or die(mysqli_error());
	
	echo "<script>document.location='stockin.php'</script>";  

	
?>
