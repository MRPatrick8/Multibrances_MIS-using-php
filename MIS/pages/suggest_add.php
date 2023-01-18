<?php
include('../dist/includes/dbcon.php');
session_set_cookie_params(0);
session_start();
error_reporting(0);
$branch = $_SESSION['branch'];
?>
<?php
	
	$name=$_POST['name'];
	$descr=$_POST['descr'];
	$price=$_POST['price'];
	// $supplier=$_POST['supplier'];
	// $qty=$_POST['qty'];
	
	$fileInfo = PATHINFO($_FILES["image"]["name"]);
	
	if (empty($_FILES["image"]["name"])){
		$location="";
	}
	else{
		if ($fileInfo['extension'] == "jpg"  OR $fileInfo['extension'] == "jpeg" OR $fileInfo['extension'] == "png") {
			$newFilename = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
			move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $newFilename);
			$location = "upload/" . $newFilename;
		}
		else{
			$location="";
			?>
				<script>
					window.alert('Photo not added. Please upload JPG or PNG photo only!');
				</script>
			<?php
		}
	}
	$id=$_SESSION['id'];
	
	$remarks="added suggested a new product $name";  
	
		mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($con));
	
	mysqli_query($con,"insert into suggestion (name,descr,price,image, branch_id) values ('$name','$descr','$price','$location', '$branch')");
	
	?>
		<script>
			window.alert('suggestion added successfully!');
			window.history.back();
		</script>
	<?php
?>