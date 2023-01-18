<?php
session_set_cookie_params(0); 
session_start();
include('../dist/includes/dbcon.php');
	$branch=$_SESSION['branch'];
	$first =$_POST['first'];
	$last =$_POST['last'];
	$email =$_POST['email'];
	$tin =$_POST['tin'];
	$company =$_POST['company'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	
	$id=$_SESSION['id'];
	
	$remarks="added a new customer $first";  
	
		mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($con));


	
	$query2=mysqli_query($con,"select * from customer where cust_first='$first' and cust_last='$last' and branch_id='$branch'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2);

		if ($count>0)
		{
			echo "<script type='text/javascript'>alert('Customer already exist!');</script>";
			echo "<script>document.location='customers_add.php'</script>";  
		}
		else
		{	
			
			mysqli_query($con,"INSERT INTO customer(cust_first,cust_last,email,tin,company,cust_address,cust_contact,branch_id,balance) 
				VALUES('$first','$last','$email','$tin','$company','$address','$contact','$branch','0')")or die(mysqli_error($con));

			$id=mysqli_insert_id($con);
			echo "<script>document.location='customers_add.php'</script>";  
		}

?>