<?php session_set_cookie_params(0);
session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$name =$_POST['prod_name'];
	$supplier =$_POST['supplier'];
	$price = $_POST['prod_price'];
	$reorder = $_POST['reorder'];
	$category = $_POST['category'];
	$serial = $_POST['serial'];
	$desc = $_POST['desc'];
	
	$uid=$_SESSION['id'];
	$date = date("Y-m-d H:i:s");
	
	$remarks="Updated  product $name";  
	
		mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$uid','$remarks','$date')")or die(mysqli_error($con));
			
	mysqli_query($con,"update product set prod_name='$name',prod_price='$price',
	reorder='$reorder',supplier_id='$supplier',cat_id='$category',serial='$serial',prod_desc='$desc' where prod_id='$id'")or die(mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully updated product details!');</script>";
	echo "<script>document.location='product.php'</script>";  

	
?>
