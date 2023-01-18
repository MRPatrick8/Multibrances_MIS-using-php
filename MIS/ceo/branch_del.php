<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('dbcon.php');
	$id = $_GET['id'];
	
	
	mysqli_query($con,"delete from branch  where branch_id='$id'")or die(mysqli_error());
	
	echo "<script type='text/javascript'>alert('Branch Successfully deleted!');</script>";
	echo "<script>document.location='branch.php'</script>";  

	
?>