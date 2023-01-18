<?php session_set_cookie_params(0);
session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_GET['id'];
	
	
	mysqli_query($con,"delete from category  where cat_id='$id'")or die(mysqli_error());
	
	echo "<script type='text/javascript'>alert('Successfully deleted category!');</script>";
	echo "<script>document.location='category.php'</script>";  

	
?>