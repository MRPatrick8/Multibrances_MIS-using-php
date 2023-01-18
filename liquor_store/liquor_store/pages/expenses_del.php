<?php
session_set_cookie_params(0);
session_start();
include("../dist/includes/dbcon.php");
$user_id=$_SESSION['id'];
$id = $_REQUEST['id'];

$result=mysqli_query($con,"DELETE FROM expenses WHERE expenses_id ='$id'")
	or die(mysqli_error());
	
$date = date("Y-m-d H:i:s");
	
$remarks="deleted an expense";
mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$user_id','$remarks','$date')")or die(mysqli_error($con));

echo "<script>document.location='expenses.php'</script>";  
?>