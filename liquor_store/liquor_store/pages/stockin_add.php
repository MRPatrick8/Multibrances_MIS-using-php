<?php 
session_set_cookie_params(0);
session_start();
include('../dist/includes/dbcon.php');
	$branch=$_SESSION['branch'];
	$name = $_POST['prod_name'];
	$qty = $_POST['qty'];
	$amt = $_POST['amt'];
	$receiver = $_POST['rec'];
	$mode = $_POST['mode'];
	$due = $_POST['due'];
	
	date_default_timezone_set('Africa/Kigali');

	$date = date("Y-m-d H:i:s");
	$id=$_SESSION['id'];
	
	$query=mysqli_query($con,"select prod_name from product where prod_id='$name'")or die(mysqli_error());
  
        $row=mysqli_fetch_array($query);
		$product=$row['prod_name'];
	$remarks="added $qty  $product";  
	
		mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($con));
		
		
	mysqli_query($con,"UPDATE product SET prod_qty=prod_qty+'$qty' where prod_id='$name' and branch_id='$branch'") or die(mysqli_error($con)); 
			
			mysqli_query($con,"INSERT INTO stockin(prod_id,qty,amount,date,receiver,mode,due,branch_id) VALUES('$name','$qty','$amt','$date','$receiver','$mode','$due','$branch')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new stocks!');</script>";
					  echo "<script>document.location='stockin.php'</script>";  
	
?>