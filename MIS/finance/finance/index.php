<!DOCTYPE html>
<html>
<head>
	<title>T-KAY Finance</title>
	<?php require 'assets/autoloader.php'; ?>
	<?php require 'assets/function.php'; ?>
	<?php
    $con = mysqli_connect("localhost","root","","tkayinve_mis");
    define('bankName', 'T-KAY Investment Finance',true);
	
		$error = "";
		if (isset($_POST['userLogin']))
		{
			$error = "";
  			$user = $_POST['email'];
		    $pass = $_POST['password'];
		   
		    $result = mysqli_query($con,"select * from useraccounts where email='$user' AND password='$pass'");
		    if($result->num_rows>0)
		    { 
		      session_start();
		      $data = mysqli_fetch_assoc($result);
		      $_SESSION['userId']=$data['id'];
		      $_SESSION['user'] = $data;
		      header('location:home.php');
		     }
		    else
		    {
		      $error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong try again!</div>";
		    }
		}
		// if (isset($_POST['cashierLogin']))
		// {
		// 	$error = "";
  // 			$user = $_POST['email'];
		//     $pass = $_POST['password'];
		   
		//     $result = $con->query("select * from login where email='$user' AND password='$pass'");
		//     if($result->num_rows>0)
		//     { 
		//       session_start();
		//       $data = $result->fetch_assoc();
		//       $_SESSION['cashId']=$data['id'];
		//       //$_SESSION['user'] = $data;
		//       header('location:cindex.php');
		//      }
		//     else
		//     {
		//       $error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong try again!</div>";
		//     }
		// }
		// if (isset($_POST['managerLogin']))
		// {
		// 	$error = "";
  // 			$user = $_POST['email'];
		//     $pass = $_POST['password'];
		   
		//     $result = $con->query("select * from login where email='$user' AND password='$pass' AND type='manager'");
		//     if($result->num_rows>0)
		//     { 
		//       session_start();
		//       $data = $result->fetch_assoc();
		//       $_SESSION['managerId']=$data['id'];
		//       //$_SESSION['user'] = $data;
		//       header('location:mindex.php');
		//      }
		//     else
		//     {
		//       $error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong try again!</div>";
		//     }
		// }

	 ?>
</head>
<body style="background: url(images/bg-login2.jpg);background-size: 100%">
<h1 class="alert alert-success rounded-0"><?php echo bankname; ?><form style="float: right;" class="form-inline my-2 my-lg-0">
       	<button class="btn btn-outline-success">Return To Main page</button>
        <a href="../reports.php" data-toggle="tooltip" title="Exit" class="btn btn-outline-danger mx-1" ><i class="fa fa-sign-out fa-fw"></i></a>    
</form></h1>

<br>
<?php echo $error ?>
<br>


<div id="accordion" role="tablist" class="w-25 float-right shadowBlack" style="margin-right: 222px">
	<br><h4 class="text-center text-white">Select Your Session</h4>
  <div class="card rounded-0">
    <div class="card-header" role="tab" id="headingOne">
      <h5 class="mb-0">
        <a style="text-decoration: none;" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         <button class="btn btn-outline-success btn-block">Account info</button>
        </a>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
       <form method="POST">
       	<input type="email" value="" name="email" class="form-control" required placeholder="Enter Email">
       	<input type="password" name="password" value="" class="form-control" required placeholder="Enter Password">
       	<button type="submit" class="btn btn-primary btn-block btn-sm my-1" name="userLogin">Enter </button>
       </form>
      </div>
    </div>
  </div>
  <div class="card rounded-0">
    <div class="card-header" role="tab" id="headingTwo">
      <h5 class="mb-0">
        <a class="btn btn-outline-success btn-block" href="mindex.php">
          Manage All Accounts
        </a>
      </h5>
    </div>
    
      </div>
    </div>
  </div>
</div>
</body>
</html>