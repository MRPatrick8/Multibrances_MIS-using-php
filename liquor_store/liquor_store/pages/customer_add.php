<?php
session_set_cookie_params(0); 
session_start();
include('../dist/includes/dbcon.php');
	$branch=$_SESSION['branch'];
	$names =$_POST['names'];
	$email =$_POST['email'];
	$tin =$_POST['tin'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];


	$id=$_SESSION['id'];
	$date = date("Y-m-d H:i:s");
	
	
	$remarks="added new customer $names";  
	
		mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($con));
	
	$query2=mysqli_query($con,"select * from customer where names='$names' and branch_id='$branch'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2);

		if ($count>0)
		{
			echo "<script type='text/javascript'>alert('Customer already exist!');</script>";
			echo "<script>document.location='cust_new.php'</script>";  
		}
		else
		{	
			
			mysqli_query($con,"INSERT INTO customer(names,email,tin,cust_address,cust_contact,branch_id,balance) 
				VALUES('$names','$email','$tin','$address','$contact','$branch','0')")or die(mysqli_error($con));

			$id=mysqli_insert_id($con);
			echo "<script>document.location='cash_transaction.php?cid=$id'</script>";  
		}

?>