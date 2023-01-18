<?php session_set_cookie_params(0);
session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	// $branch=$_SESSION['branch'];
	$expe_date = $_POST['expe_date'];
	$expense_cat = $_POST['expense_cat'];
	$expense_desc = $_POST['expense_desc'];
	$amount = $_POST['amount'];
	$mode = $_POST['mode'];
	$request = $_POST['request'];
	// $receiver = $_POST['receiver'];

	$uid=$_SESSION['id'];
	$date = date("Y-m-d H:i:s");
	
	$remarks="updated expense $expense_cat";  
	
	mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$uid','$remarks','$date')")or die(mysqli_error($con));
	
	mysqli_query($con,"update expenses set expe_date='$expe_date',expense_cat='$expense_cat',expense_desc='$expense_desc',amount='$amount',mode='$mode',request='$request' where expenses_id='$id'")or die(mysqli_error());
	
	echo "<script>document.location='expenses.php'</script>";  

	
?>