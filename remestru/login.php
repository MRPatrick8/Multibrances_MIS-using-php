<?php
session_start();
include'connection.php';
if(isset($_POST['submit_login']))
	{
    $password=$_POST['password'];
    $email=$_POST['email'];
	if($password=='')
		$pto=31;
	else{
		$passwo=md5($password);

  $chi=mysqli_query($conn, "SELECT *FROM `employees` WHERE `Email`='$email' AND `Status`='0' LIMIT 1");
$che=mysqli_query($conn, "SELECT *FROM `employees` WHERE `Password`='$passwo' AND `Status`='0' LIMIT 1");
	$ch=mysqli_query($conn, "SELECT *FROM `employees` WHERE `Email`='$email' AND `Password`='$passwo' AND `Status`='0' LIMIT 1");
		if($nc=mysqli_num_rows($ch) AND $ns=mysqli_num_rows($che) AND $nci=mysqli_num_rows($chi)){
			$res=mysqli_fetch_assoc($ch);
			{
				$userid=$res['Eid'];
				$fname=$res['Fname'];
				$lname=$res['Lname'];
				$currentp=$res['Currentp'];
				$branche=$res['Branche'];
				$uname=$res['Email'];
				$sudepo=$res['Sudepo'];
				$loge="$fname $lname";
			}
                        $_SESSION['Fname']=$fname;
						$_SESSION['Lname']=$lname;
						$_SESSION['Userid']=$userid;
						$_SESSION['Branche']=$branche;
						$_SESSION['Access']=$currentp;
						$_SESSION['Loge']=$loge;
						$_SESSION['Uname']=$uname;
						$_SESSION['Database']='';
						$_SESSION['Sudepo']=$sudepo;
						$_SESSION['Sudepi']=$sudepo;
						$_SESSION['Dco']=0;
						$_SESSION['Depa']='active';
		$ip=$_SERVER['REMOTE_ADDR'];
if($userid!='1001')
	$moves=mysqli_query($conn, "INSERT INTO `moves` (`User`, `Date`, `Time`, `Address`, `Location`) VALUES ('$loge', '$Date', '$Time', '$ip', '')");
		include'privile.php';
	       Header("location:home.php");
		}
				 else{
					 $pto=32;
				$ip=$_SERVER['REMOTE_ADDR'];
	$moves=mysqli_query($conn, "INSERT INTO `moves` (`User`, `Date`, `Time`, `Address`, `Location`) VALUES ('Unknown Person', '$Date', '$Time', '$ip', '')");
				 }
}
		}

?>
<!DOCTYPE html>
<html><head><meta charset="windows-1252">

    <title><?php echo $cna ?></title>
      <link href="style/bootstrap.css" media="all" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="style/icon-font.css">

     <link href="style/style.css" media="all" rel="stylesheet" type="text/css">

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">

         <style type="text/css">
 @media (max-width: 50em) {
.element {
display: none;
}
  }
  </style>
  </head>
<body class="login2">
	<!-- Login Screen -->
	<div class="login-wrapper">
		<a href="#" target="_blank" class="hidden-xs">
				<img src="imgs/logo.png" width="265px" height="93px" style="border-radius:5px;">
			 </a><br>
			 <h5>Enter your username and password</h5>
			<?php
	if($pto==31){
		print("<div class='alert alert-danger' style='border-radius:5px;'>
		<i class='lnr lnr-sad'></i> <button class='close' data-dismiss='alert' type='button'>×</button>Username or Password Cannot Be Empty.
		</div>");
	}
	if($pto==32){
		print("<div class='alert alert-danger' style='border-radius:5px;'>
		<i class='lnr lnr-sad'></i> <button class='close' data-dismiss='alert' type='button'>×</button>Incorrect username or password, please try again.
		</div>");
	}
	?>
	<form method="post" action="">
	<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="lnr lnr-users"></i></span><input class="form-control" placeholder="Username" name="email" type="text" autofocus='autofocus' required>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="lnr lnr-lock"></i></span><input class="form-control" placeholder="Password" name="password" type="password" required>
				</div>
			</div>

			<div class="text-left ">
				<a class="pull-right" href="forgot.php">Forgot password?</a>
			<div class="text-left">
          <label class="checkbox">
          <input name="cookie_set" value="true" type="checkbox" checked><span>Keep me logged in</span></label>
        </div>
			</div>

			<input class="btn btn-lg btn-primary btn-block" value="Log in" name="submit_login" type="submit">

		</form>


	</div>
 <script src="style/jquery-1.js" type="text/javascript">  </script>
	<script src="style/bootstrap.js" type="text/javascript"></script>
</body></html>
