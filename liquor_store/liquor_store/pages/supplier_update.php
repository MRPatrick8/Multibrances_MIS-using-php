<?php session_set_cookie_params(0);
session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$tin =$_POST['tin'];
	$name =$_POST['name'];
	$email =$_POST['email'];
	$address =$_POST['address'];
	$contact =$_POST['contact'];

	$uid=$_SESSION['id'];
	$date = date("Y-m-d H:i:s");
	$remarks="added updated a supplier $name";  
	
	mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$uid','$remarks','$date')")or die(mysqli_error($con));
	
	mysqli_query($con,"update supplier set tin = '$tin',supplier_name='$name',supplier_email='$email',supplier_address='$address',supplier_contact='$contact' where supplier_id='$id'")or die(mysqli_error());
	
	echo "<script type='text/javascript'>alert('Successfully updated supplier details!');</script>";
	echo "<script>document.location='supplier.php'</script>"; 
?>
