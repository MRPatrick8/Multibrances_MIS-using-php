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
$id=intval($_GET['id']);

$sql="update tblhouse set location=:location,houseoverview=:houseoverview,price=:price,rooms=:rooms,compound=:compound,bathroom=:bathroom,kitchen=:kitchen,parking=:parking,wifi=:wifi where id=:id ";
$query = $dbh->prepare($sql);
$query->bindParam(':location',$location,PDO::PARAM_STR);
$query->bindParam(':houseoverview',$houseoverview,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':rooms',$rooms,PDO::PARAM_STR);
$query->bindParam(':compound',$compound,PDO::PARAM_STR);
$query->bindParam(':bathroom',$bathroom,PDO::PARAM_STR);
$query->bindParam(':kitchen',$kitchen,PDO::PARAM_STR);
$query->bindParam(':parking',$parking,PDO::PARAM_STR);
$query->bindParam(':wifi',$wifi,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();

$msg="Data updated successfully";


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
	
	<title>Real Estate | Admin Edit House Info</title>

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
					
						<h2 class="page-title">Edit House</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
									<div class="panel-body">
<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from tblhouse where tblhouse.id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">House Location<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="location" class="form-control" value="<?php echo htmlentities($result->location)?>" required>
</div>
</div>
											
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">House Overview<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="houseoverview" rows="3" required><?php echo htmlentities($result->houseoverview);?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Price (Rwf)<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="price" class="form-control" value="<?php echo htmlentities($result->Price);?>" required>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Bedrooms<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="bedroom" class="form-control" value="<?php echo htmlentities($result->bedroom);?>" required>
</div>
<label class="col-sm-2 control-label">Bathrooms<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="bathroom" class="form-control" value="<?php echo htmlentities($result->bathroom);?>" required>
</div>
</div>
<div class="hr-dashed"></div>								
<div class="form-group">
<div class="col-sm-12">
<h4><b>House Images</b></h4>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Image 1 <img src="img/houseimages/<?php echo htmlentities($result->himage1);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changehimage1.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 1</a>
</div>
<div class="col-sm-4">
Image 2<img src="img/houseimages/<?php echo htmlentities($result->himage2);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changehimage2.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 2</a>
</div>
<div class="col-sm-4">
Image 3<img src="img/houseimages/<?php echo htmlentities($result->himage3);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changehimage3.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 3</a>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Image 4<img src="img/houseimages/<?php echo htmlentities($result->himage4);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changehimage4.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 4</a>
</div>
<div class="col-sm-4">
Image 5
<?php if($result->himage5=="")
{
echo htmlentities("File not available");
} else {?>
<img src="img/houseimages/<?php echo htmlentities($result->himage5);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changehimage5.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 5</a>
<?php } ?>
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
<?php if($result->compound==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="compound" checked value="1">
<label for="inlineCheckbox1"> Compound </label>
</div>
<?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="compound" value="1">
<label for="inlineCheckbox1"> Compound </label>
</div>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->kitchen==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="kitchen" checked value="1">
<label for="inlineCheckbox2"> Kitchen </label>
</div>
<?php } else {?>
<div class="checkbox checkbox-success checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="kitchen" value="1">
<label for="inlineCheckbox2"> Kitchen </label>
</div>
<?php }?>
</div>
<div class="col-sm-3">
<?php if($result->parking==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="parking" checked value="1">
<label for="inlineCheckbox3"> Parking </label>
</div>
<?php } else {?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="parking" value="1">
<label for="inlineCheckbox3"> Parking </label>
</div>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->wifi==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="wifi" checked value="1">
<label for="inlineCheckbox3"> WiFi </label>
</div>
<?php } else {?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="wifi" value="1">
<label for="inlineCheckbox3"> WiFi </label>
</div>
<?php } ?>
</div>

</div>

<?php }} ?>


		<div class="form-group">
			<div class="col-sm-8 col-sm-offset-2" >
				
				<button class="btn btn-primary" name="submit" type="submit" style="margin-top:4%">Save changes</button>
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