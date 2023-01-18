<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['submit']))
  {
$location=$_POST['location'];
$houseoverview=$_POST['houseoverview'];
$price=$_POST['price'];
$rooms=$_POST['rooms'];
$himage1=$_FILES["img1"]["name"];
$himage2=$_FILES["img2"]["name"];
$himage3=$_FILES["img3"]["name"];
$himage4=$_FILES["img4"]["name"];
$himage5=$_FILES["img5"]["name"];
$compound=$_POST['compound'];
$bathroom=$_POST['bathroom'];
$kitchen=$_POST['kitchen'];
//$bathroom=$_POST['bathroom'];
$parking=$_POST['parking'];
$wifi=$_POST['wifi'];

move_uploaded_file($_FILES["img1"]["tmp_name"],"img/houseimages/".$_FILES["img1"]["name"]);
move_uploaded_file($_FILES["img2"]["tmp_name"],"img/houseimages/".$_FILES["img2"]["name"]);
move_uploaded_file($_FILES["img3"]["tmp_name"],"img/houseimages/".$_FILES["img3"]["name"]);
move_uploaded_file($_FILES["img4"]["tmp_name"],"img/houseimages/".$_FILES["img4"]["name"]);
move_uploaded_file($_FILES["img5"]["tmp_name"],"img/houseimages/".$_FILES["img5"]["name"]);

$sql="INSERT INTO tblhouse(location,houseoverview,price,rooms,himage1,himage2,himage3,himage4,himage5,compound,bathroom,kitchen,parking,wifi) VALUES(:location,:houseoverview,:price,:rooms,:himage1,:himage2,:himage3,:himage4,:himage5,:compound,:bathroom,:kitchen,:parking,:wifi)";
$query = $dbh->prepare($sql);
$query->bindParam(':location',$location,PDO::PARAM_STR);
$query->bindParam(':houseoverview',$houseoverview,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':rooms',$rooms,PDO::PARAM_STR);
$query->bindParam(':himage1',$himage1,PDO::PARAM_STR);
$query->bindParam(':himage2',$himage2,PDO::PARAM_STR);
$query->bindParam(':himage3',$himage3,PDO::PARAM_STR);
$query->bindParam(':himage4',$himage4,PDO::PARAM_STR);
$query->bindParam(':himage5',$himage5,PDO::PARAM_STR);
$query->bindParam(':compound',$compound,PDO::PARAM_STR);
$query->bindParam(':bathroom',$bathroom,PDO::PARAM_STR);
$query->bindParam(':kitchen',$kitchen,PDO::PARAM_STR);
$query->bindParam(':parking',$parking,PDO::PARAM_STR);
$query->bindParam(':wifi',$wifi,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="House posted successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}


	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Real Estate | Admin Post House</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="../assets/images/favicon-icon/favicon.png">
<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Post A House</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
											
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">House Location<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="location" class="form-control" required>
</div>
<label class="col-sm-2 control-label">House Overview<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="houseoverview" rows="3" required></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Price(in Rwf)<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="number" name="price" class="form-control" required>
</div>
</div>


<div class="form-group">

<label class="col-sm-2 control-label">Bed rooms<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="number" name="rooms" class="form-control" required>
</div>
</div>

<div class="col-sm-3">
<div class="form-group">
<input type="number" id="bathroom" name="bathroom" >
<label for="bathroom"> Bathrooms </label>
</div></div>
<div class="hr-dashed"></div>


<div class="form-group">
<div class="col-sm-12">
<h4><b>Upload Images</b></h4>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Image 1 <span style="color:red">*</span><input type="file" name="img1" required>
</div>
<div class="col-sm-4">
Image 2<span style="color:red">*</span><input type="file" name="img2" >
</div>
<div class="col-sm-4">
Image 3<span style="color:red">*</span><input type="file" name="img3" >
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Image 4<span style="color:red">*</span><input type="file" name="img4" >
</div>
<div class="col-sm-4">
Image 5<input type="file" name="img5">
</div>

</div>
<div class="hr-dashed"></div>									
</div>
</div>
</div>
</div>
							

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Accessories</div>
<div class="panel-body">


<div class="form-group">
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="compound" name="compound" value="1">
<label for="compound"> Compound </label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="kitchen" name="kitchen" value="1">
<label for="kitchen"> Kitchen </label>
</div></div>

<div class="checkbox checkbox-inline">
<input type="checkbox" id="parking" name="parking" value="1">
<label for="parking"> Parking </label>
</div>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="wifi" name="wifi" value="1">
<label for="wifi"> WiFi </label>
</div>
</div>

<div class="form-group">
	<div class="col-sm-8 col-sm-offset-2">
		<button class="btn btn-default" type="reset">Cancel</button>
		<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
	</div>
</div>

				</form>
			</div>
		</div>
	</div>
</div>
						
					

					</div>
				</div>
				
			

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>