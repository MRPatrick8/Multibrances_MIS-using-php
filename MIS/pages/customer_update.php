<?php session_set_cookie_params(0);
session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$first =$_POST['first'];
	$last =$_POST['last'];
	$email =$_POST['email'];
	$tin =$_POST['tin'];
	$company =$_POST['company'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];

	$uid=$_SESSION['id'];

	$remarks="updated a customer $first";  
	
		mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$uid','$remarks','$date')")or die(mysqli_error($con));
	mysqli_query($con,"update customer set cust_first='$first',cust_last='$last',email='$email',tin='$tin',company='$company',cust_address='$address',cust_contact='$contact' where cust_id='$id'")or die(mysqli_error());
	
	echo "<script type='text/javascript'>alert('Successfully updated customer details!');</script>";
	echo "<script>document.location='customer.php'</script>";  

	
?>
