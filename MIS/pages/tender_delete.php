<?php session_set_cookie_params(0);
session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_GET['id'];
	
	$uid=$_SESSION['id'];
	
	$remarks="deleted a tender";  
	
		mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$uid','$remarks','$date')")or die(mysqli_error($con));
	mysqli_query($con,"delete from tender  where id='$id'")or die(mysqli_error());
	
	echo "<script type='text/javascript'>alert('tender Successfully deleted!');</script>";
	echo "<script>document.location='tenders.php'</script>";  

	
?>