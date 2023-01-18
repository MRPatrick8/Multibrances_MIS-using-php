<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('dbcon.php');
	$id = $_GET['id'];
	
	
	mysqli_query($con,"delete from user  where user_id='$id'")or die(mysqli_error());
	
	echo "<script type='text/javascript'>alert('User Successfully deleted!');</script>";
	echo "<script>document.location='user.php'</script>";  

	
?>