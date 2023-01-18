<?php 
session_set_cookie_params(0);
session_start();
$branch=$_SESSION['branch'];
include('../dist/includes/dbcon.php');

	$date = $_POST['date'];
	$company = $_POST['company'];
	$requirements = $_POST['requirements'];
	$deadline = $_POST['deadline'];
	$reference = $_POST['reference'];
	$other = $_POST['other'];
	$fees = $_POST['fees'];
	$comment = $_POST['comment'];

	$id=$_SESSION['id'];

	$remarks="added a new tender";  
	
		mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($con));	

			mysqli_query($con,"INSERT INTO tenders(date,company,requirements,deadline,reference,other,fees,comment,branch_id)
			VALUES('$date','$company','$requirements','$deadline','$reference','$other','$fees','$comment','$branch')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new tender!');</script>";
					  echo "<script>document.location='tenders.php'</script>";  
		
?>