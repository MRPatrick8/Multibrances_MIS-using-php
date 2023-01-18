<?php
   session_set_cookie_params(0); 
session_start(); 
// $branch=$_SESSION['branch'];    

       
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel='shortcut icon' type='image/x-icon' href="../upload/TKAY LOGO.png">
<title>Edit Projects</title>
</head>
<body>
<?php
			$branch=$_SESSION['branch'];
			$zz = $_POST['id'];
			$pname = $_POST['project_name'];
		    $cname = $_POST['client_name'];
			$contact = $_POST['contact'];
			$address = $_POST['address'];
			$amt_paid = $_POST['amount_paid'];
			$amt_due = $_POST['amount_due'];
			$assign = $_POST['assign'];
			$status = $_POST['status'];
			$due_date = $_POST['due_date'];
			
	   include('connection.php');
	   $id=$_SESSION['id'];
	
	$remarks="Updated a project $pname";  
	
		mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($con));
		
	 			$query = 'UPDATE project set project_name ="'.$pname.'",
					client_name ="'.$cname.'", contact="'.$contact.'", address="'.$address.'",amount_paid='.$amt_paid.',amount_due="'.$amt_due.'",assign="'.$assign.'", status="'.$status.'", 
					due_date="'.$due_date.'" WHERE
					project_id ="'.$zz.'" and branch_id ="'.$branch.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));
							
?>	
	<script type="text/javascript">
			alert("Update Successfull.");
			window.location = "manage_projects.php";
		</script>
 </body>
</html>