<?php
if(basename($_SERVER['PHP_SELF']) == 'password.php') {
  $st=" class='current'";
} else {
  $cu="";
} 
include'header.php';
 $oldpassword='';
    $newpassword='';
		$confirmpassword='';
if(isset($_POST['submit_changepassword']))
	{
    $oldpassword=$_POST['oldpassword'];
    $newpassword=$_POST['password'];
    $confirmpassword=$_POST['confirm_password'];

	if($oldpassword=='')
		$pto=10;
	elseif($newpassword=='')
		$pto=11;
	elseif($confirmpassword=='')
		$pto=12;
	else{
	if($newpassword!=$confirmpassword){
    $newpassword='';
		$confirmpassword='';
		$pto=13;
	}
	else{
		$unames=$_SESSION['Uname'];
		$oldpasswo=md5($oldpassword);
		$newpasswo=md5($newpassword);

		$dot=mysqli_query($conn, "SELECT *FROM `employees` WHERE `Email`='$unames' AND `Password`='$oldpasswo' LIMIT 1");
	$fot=mysqli_num_rows($dot);
		if($fot){

	$do=mysqli_query($conn, "UPDATE `employees` SET `Password`='$newpasswo' WHERE `Email`='$unames' AND `Password`='$oldpasswo'");
		$oldpassword='';
		 $newpassword='';
		$confirmpassword='';
		$pto=14;
		}
		else{
			$pto=15;
			 $oldpassword='';
		}
	}

	}
	}

	$_SESSION['Oldpassword']=$oldpassword;
	$_SESSION['Newpassword']=$newpassword;
	$_SESSION['Confirmpassword']=$Confirmpassword;
?>
<div class="container-fluid main-content">
        <div class="page-title">
          <h2 style='margin-top:-20px; margin-bottom: 5px; color:#ffcc33'>
        Changez Votre Mot de Passe </h2>
    </div>
<div class="row">
 <div class="col-md-12">
 <div class="widget-container fluid-height clearfix">
 <div class="widget-content padded" style='padding-top:40px;'>
 <form method="post" class="form-horizontal" action="password.php" enctype="multipart/form-data">

<?php
	$oldpassword=$_SESSION['Oldpassword'];
	$newpassword=$_SESSION['Newpassword'];
	$Confirmpassword=$_SESSION['Confirmpassword'];
if($pto==10)
echo"<center><div class='alert alert-danger' style='width:48%;text-align:center;float:center;border-radius:5px;'>
		<i class='lnr lnr-sad'></i> &nbsp;&nbsp; <button class='close' data-dismiss='alert' type='button'>×</button>L'ancien mot de passe ne peut pas être vide.
		</div>";

if($pto==11)
echo"<center><div class='alert alert-danger' style='width:48%;text-align:center;float:center;border-radius:5px;'>
		<i class='lnr lnr-sad'></i> &nbsp;&nbsp; <button class='close' data-dismiss='alert' type='button'>×</button>Le nouveau mot de passe ne peut pas être vide.
		</div></center>";

if($pto==12)
echo"<center><div class='alert alert-danger' style='width:48%;text-align:center;float:center;border-radius:5px;'>
		<i class='lnr lnr-sad'></i> &nbsp;&nbsp; <button class='close' data-dismiss='alert' type='button'>×</button>La confirmation du mot de passe ne peut pas être vide. </div></center>";

if($pto==13)
echo"<center><div class='alert alert-danger' style='width:48%;text-align:center;float:center;border-radius:5px;'>
		<i class='lnr lnr-sad'></i> &nbsp;&nbsp; <button class='close' data-dismiss='alert' type='button'>×</button>Le mot de passe ne correspond pas.
		</div></center>";

if($pto==14)
echo"<center><div class='alert alert-danger' style='width:48%;text-align:center;float:center;background-color: #60c560;color: #ffffff;border-radius:5px;'>
		<i class='lnr lnr-checkmark-circle'></i> &nbsp;&nbsp; <button class='close' data-dismiss='alert' type='button'>×</button>Votre mot de passe a été changé.
		</div></center>";

if($pto==15)
echo"<center><div class='alert alert-danger' style='width:48%;text-align:center;float:center;border-radius:5px;'>
		<i class='lnr lnr-sad'></i> &nbsp;&nbsp; <button class='close' data-dismiss='alert' type='button'>×</button>Ancien mot de passe est incorrect.
		</div></center>";

		?>

 <div class="row">
 <div class="col-md-12">
 <div class="form-group">
 <label class="control-label col-md-3">Ancien mot de passe</label>
            <div class="col-md-6">
              <input class="form-control" name="oldpassword" value="<?php echo $oldpassword ?>" type="password">
            </div>
          </div>
 <div class="form-group">
 <label class="control-label col-md-3">Nouveau mot de passe</label>
            <div class="col-md-6">
              <input class="form-control" id="password" name="password" value="<?php echo $newpassword ?>" type="password">
            </div>
          </div>
 <div class="form-group">
 <label class="control-label col-md-3">Confirmez le mot de passe</label>
            <div class="col-md-6">
              <input class="form-control" id="confirm_password" name="confirm_password" value="<?php echo $confirmpassword ?>" type="password"><span id='message'></span>
            </div>
          </div>
  <div class="form-group">
   <div class="col-md-12">  
   <div class="col-md-3"></div>  
   <div class="col-md-6">             
    <button class="btn btn-lg btn-block btn-success" type="submit" name="submit_changepassword"><i class="lnr lnr-chevron-up-circle"></i> Sauvegarder </button>  
    </div>       
   <div class="col-md-3"></div>
   </div>
 </div>
 </div></div><br><br><br>
 </form>
</div>
</div>
</div>
</div></div>
<?php
include'footer.php';
?>