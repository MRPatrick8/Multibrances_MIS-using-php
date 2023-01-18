<?php 
session_set_cookie_params(0);
session_start();
include('../dist/includes/dbcon.php');
	$branch=$_SESSION['branch'];
	$tin = $_POST['tin'];
	$name = $_POST['name'];
	$company = $_POST['company'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];

	$id=$_SESSION['id'];
	
	$remarks="added new supplier";  
	
		mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($con));	
			
			mysqli_query($con,"INSERT INTO supplier(tin,supplier_name,supplier_company,supplier_email,supplier_address,supplier_contact,branch_id) 
				VALUES('$tin','$name','$company','$email','$address','$contact','$branch')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new supplier!');</script>";
					  echo "<script>document.location='supplier.php'</script>";  
	
?>