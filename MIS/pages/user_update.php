<?php session_set_cookie_params(0);
session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$name =$_POST['name'];
	$username =$_POST['username'];
	$status = $_POST['status'];
	
	$uid=$_SESSION['id'];
	$remarks="updated user info";  
	
		mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$uid','$remarks','$date')")or die(mysqli_error($con));
	mysqli_query($con,"update user set name='$name',username='$username',status='$status' where user_id='$id'")or die(mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully updated user details!');</script>";
	echo "<script>document.location='user.php'</script>";  

	
?>
