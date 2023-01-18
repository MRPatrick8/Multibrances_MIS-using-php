<?php 
session_set_cookie_params(0);
session_start();
$id=$_SESSION['id'];	
include('../dist/includes/dbcon.php');

	$discount = $_POST['discount'];
	//$payment = $_POST['payment'];
	$mode = $_POST['mode'];
	// $id = $_POST['id'];
	$amount_due = $_POST['amount_due'];
	$due = $_POST['due'];
	
	date_default_timezone_set("Africa/Kigali"); 
	$date = date("Y-m-d H:i:s");
	$cid=$_REQUEST['cid'];
	$branch=$_SESSION['branch'];
	
	$total=$amount_due;
	$cid=$_REQUEST['cid'];

		$tendered = $_POST['tendered'];
		$change = $_POST['change'];

		mysqli_query($con,"INSERT INTO sales(cust_id,user_id,discount,amount_due,mode,due,total,date_added,modeofpayment,cash_tendered,cash_change,branch_id) 
	VALUES('$cid','$id','$discount','$amount_due','$mode','$due','$total','$date','cash','$tendered','$change','$branch')")or die(mysqli_error($con));

		
		
	$sales_id=mysqli_insert_id($con);
	$_SESSION['sid']=$sales_id;
	$query=mysqli_query($con,"select * from temp_trans where branch_id='$branch'")or die(mysqli_error($con));
		while ($row=mysqli_fetch_array($query))
		{
			$pid=$row['prod_id'];	
 			$qty=$row['qty'];
			$price=$row['price'];
			
			
			mysqli_query($con,"INSERT INTO sales_details(prod_id,qty,price,sales_id) VALUES('$pid','$qty','$price','$sales_id')")or die(mysqli_error($con));
			mysqli_query($con,"UPDATE product SET prod_qty=prod_qty-'$qty' where prod_id='$pid' and branch_id='$branch'") or die(mysqli_error($con)); 
		}
		
		$query1=mysqli_query($con,"SELECT or_no FROM payment NATURAL JOIN sales  ORDER BY payment_id DESC LIMIT 0 , 1")or die(mysqli_error($con));

			$row1=mysqli_fetch_array($query1);
				$or=$row1['or_no'];	

				$orn = uniqid();
				mysqli_query($con,"INSERT INTO payment(cust_id,user_id,payment,payment_date,branch_id,payment_for,due,status,sales_id,or_no) 
	VALUES('$cid','$id','$total','$date','$branch','$date','$due','paid','$sales_id','$orn')")or die(mysqli_error($con));
				mysqli_query($con,"UPDATE customer set count = count+1 where cust_id = $cid");
				
				echo "<script>document.location='receipt.php?cid=$cid'</script>"; 
	
  
	$remarks="sold $qty of $pid at $price";  
	
		mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($con)); 	
		
		$result=mysqli_query($con,"DELETE FROM temp_trans where branch_id='$branch'")	or die(mysqli_error($con));
		//echo "<script>document.location='receipt.php?cid=$cid'</script>";

?>