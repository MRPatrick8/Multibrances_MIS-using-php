<?php session_set_cookie_params(0);
session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$date = $_POST['date'];
	$company = $_POST['company'];
	$requirements = $_POST['requirements'];
	$deadline = $_POST['deadline'];
	$reference = $_POST['reference'];
	$other = $_POST['other'];
	$fees = $_POST['fees'];
	$comment = $_POST['comment'];

	$uid=$_SESSION['id'];
	$remarks="updated a tender";  
	
		mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($con));
			
	mysqli_query($con,"update tenders set date='$date',company='$company',
	requirements='$requirements',deadline='$deadline',reference='$reference',other='$other',fees='$fees',comment='$comment' where id='$id'")or die(mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully updated tender details!');</script>";
	echo "<script>document.location='tenders.php'</script>";  

	
?>