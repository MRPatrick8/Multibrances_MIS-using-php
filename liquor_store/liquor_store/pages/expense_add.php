<?php 
session_set_cookie_params(0);
session_start();
include('../dist/includes/dbcon.php');
	$branch=$_SESSION['branch'];
	$expe_date = $_POST['expe_date'];
	$expense_cat = $_POST['expense_cat'];
	$expense_desc = $_POST['expense_desc'];
	$amount = $_POST['amount'];
	$mode = $_POST['mode'];
	$request = $_POST['request'];
	$receiver = $_POST['receiver'];
	
	date_default_timezone_set('Africa/Kigali');

	$date = date("Y-m-d H:i:s");
	$id=$_SESSION['id'];
	
	$remarks="Spent $amount on $expense_cat";  
	
		mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($con));
			
			mysqli_query($con,"INSERT INTO expenses(user_id,expe_date,expense_cat,expense_desc,amount,mode,request,receiver,branch_id) VALUES('$id','$expe_date','$expense_cat','$expense_desc','$amount','$mode','$request','$receiver','$branch')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new Expense!');</script>";
					  echo "<script>document.location='expenses.php'</script>";  
	
?>