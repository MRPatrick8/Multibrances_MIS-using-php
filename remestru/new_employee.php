<?php
if(basename($_SERVER['PHP_SELF']) == 'new_employee.php') {
  $st=" class='current'";
} else {
  $st="";
} 
include'header.php';

if(isset($_POST['submit_employee']))
		{
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$idno=$_POST['idno'];
			$contact1=$_POST['contact1'];
			$contact2=$_POST['contact2'];
			$gender=$_POST['gender'];
			$email=$_POST['email'];
			$pass1=$_POST['password'];
			$pass2=$_POST['confirm_password'];
			$depart=$_POST['depart'];
			$salary=$_POST['salary'];
			$salary=preg_replace('/,/', '', $salary);
			$start=$_POST['start'];
			$currentp=$_POST['currentp'];
			$pass2=md5($pass2);

$temp = explode(".", $_FILES["photo"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["photo"]["tmp_name"], "photos/" . $newfilename);

if(!end($temp))
	$newfilename='';

	$do=mysqli_query($conn, "INSERT INTO `employees` (`Fname`, `Lname`, `Idno`, `Contact1`, `Contact2`, `Gender`, `Photo`, `Email`, `Password`, `Depart`, `Salary`, `Currentp`, `Owner`, `Date`) VALUES ('$fname', '$lname', '$idno', '$contact1', '$contact2', '$gender', '$newfilename', '$email', '$pass2', '$depart', '$salary', '$currentp', '$loge', '$Date')");
 
 $pto=10;
		}

			$fname='';
			$rowid='';
			$lname='';
			$idno='1';
			$contact1='';
			$contact2='';
			$gender='Male';
			$email='';
			$pass1=$password='';
			$pass2='';
			$depart='';
			$salary=0;
			$start='';
			$currentp='';
			$photo="imgs/-text.png";
			$namb="submit_employee";
				$valub="Submit";

	if(isset($_POST['update_employee']))
		{
			$rowid=$_POST['rowid'];
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$idno=$_POST['idno'];
			$contact1=$_POST['contact1'];
			$contact2=$_POST['contact2'];
			$gender=$_POST['gender'];
			$email=$_POST['email'];
			$pass1=$_POST['password'];
			$pass2=$_POST['confirm_password'];
			$depart=$_POST['depart'];
			$salary=$_POST['salary'];
			$salary=preg_replace('/,/', '', $salary);
			$start=$_POST['start'];
			$photoc=$_POST['photoc'];
			$passwo=$_POST['passwo'];
		if($passwo!=$pass2)
			$pass2=md5($pass2);			
			$currentp=$_POST['currentp'];
			$password=$pass2; 

$temp = explode(".", $_FILES["photo"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["photo"]["tmp_name"], "photos/" . $newfilename);

if(!end($temp)){
	$newfilename='';
	$phos='';
	$photo=$photoc;
}
else{
	$photo=$newfilename;
	$phos="`Photo`='$photo',";
}

if(!$photo)
		$photo="imgs/-text.png";
	else
		$photo="photos/$photo";

$namb="update_employee";
				$valub="Update";

	$do=mysqli_query($conn, "UPDATE `employees` SET `Fname`='$fname', `Lname`='$lname', `Idno`='$idno', `Contact1`='$contact1', `Contact2`='$contact2', `Gender`='$gender', $phos `Email`='$email', `Password`='$pass2', `Depart`='$depart', `Salary`='$salary', `Currentp`='$currentp', `Owner`='$loge' WHERE `Eid`='$rowid'");     
 
	$salary=number_format($salary);
 $pto=20;
		}

		

if(isset($_POST['edit_id']))
		{
			$rowid=$_POST['rowid'];
$do=mysqli_query($conn, "SELECT *FROM `employees` WHERE `Eid`='$rowid' ORDER BY `Eid` ASC LIMIT 1");
while($ro=mysqli_fetch_assoc($do)){
$rowid=$ro['Eid'];
$fname=$ro['Fname'];
$lname=$ro['Lname'];
$depart=$ro['Depart'];
$contact1=$ro['Contact1'];
$contact2=$ro['Contact2'];
$idno=$ro['Idno'];
$currentp=$ro['Currentp'];
$gender=$ro['Gender'];
$email=$ro['Email'];
$password=$ro['Password'];
$confirm_password=$ro['Password'];
$salary=number_format($ro['Salary']);
$start=$ro['Starting'];
$photo=$ro['Photo'];
	if(!$photo)
		$photo="imgs/-text.png";
	else
		$photo="photos/$photo";
}

$namb="update_employee";
				$valub="Update";

	}

?>
 <div class="container-fluid main-content">
<div class="page-title">
<div class="row">
<div class="col-md-6">
<h2 style='margin-top:-20px; margin-bottom: 5px; color:#ffcc33'>Utilisateurs</h2>
</div>
<div class="col-md-6">
 <div class="col-md-5 pull-right" style='text-align:right;'>
 
 </div></div>
</div></div>
  <div class="row">
        <div class="col-md-2">
		<ul class="list-group">
			 			  <li class="list-group-item">
           <a href="employees.php">
           <p>
           <i class="lnr lnr-menu-circle"></i>&nbsp;Liste des utilisateurs
           </p></a>
           </li>
           
		                            <li class="list-group-item active">
           <a href="new_employee.php">
           <p>
           <i class="lnr lnr-plus-circle"></i>&nbsp;Nouvel utilisateur
           </p></a>
           </li>
                       </ul>
		
                          </ul><br><br><center>
						   <span style="color:#d43f3a"><small>Les champs obligatoires <br> doivent être remplis.</small></span>
		</div>
	
 <div class="col-md-10">
 <div class="widget-container fluid-height clearfix">
 <div class="widget-content padded">
 <form method="post" class="form-horizontal" name="myform" action="new_employee.php" enctype="multipart/form-data">
<?php
	if($pto==10)
echo"<center><div class='alert alert-info' style='text-align:center;float:center;color: #ffffff; border-radius:5px;'>
		<i class='lnr lnr-checkmark-circle'></i> &nbsp;&nbsp; <button class='close' data-dismiss='alert' type='button'>&times</button>Un nouvel utilisateur a été créé. </div></center>";

	if($pto==20)
echo"<center><div class='alert alert-warning' style='text-align:center;float:center;color: #ffffff; border-radius:5px;'>
		<i class='lnr lnr-checkmark-circle'></i> &nbsp;&nbsp; <button class='close' data-dismiss='alert' type='button'>&times</button>L'utilisateur a été mis à jour. </div></center>";

		echo"<input value='$rowid' name='rowid' type='hidden'><input value='$file1' name='file1' type='hidden'>
		<input value='$password' name='passwo' type='hidden'><input value='$file2' name='file2' type='hidden'>
		<input value='$file3' name='file3' type='hidden'><input value='$photo' name='photoc' type='hidden'>";
		?>
 
 <div class="row">
 <div class="col-md-12">
 <div class="col-md-6">
 <div class="heading"><h4>Information personnelle</h4></div>
   <div class="form-group">
            <label class="control-label col-md-3">Nom/Post-Nom</label>
            <div class="col-md-6">
              <input class="form-control" name="fname" type="text" value="<?php echo $fname ?>" required>
            </div>
                         <span style="color:#d43f3a">
                         obligatoire
                      </span>          </div>    
   <div class="form-group">
            <label class="control-label col-md-3">Prénom</label>
            <div class="col-md-6">
              <input class="form-control" name="lname" type="text" value="<?php echo $lname ?>">
            </div>
		 </div>
            <div class="form-group">
                   <label class="control-label col-md-3">Identification</label>
                  <div class="col-md-6">
             <input class="form-control" name="idno" type="text"  value="<?php echo $idno ?>" onkeypress='return isNumberKey(event)' required>
            </div> 
			  <span style="color:#d43f3a">
                         obligatoire
                      </span>   
			</div>
			 
		  <div class="form-group">
		  <?php
		  if($gender=='Male'){
			$male='checked';
			$female='';
		}
		  else{
			$male='';
			$female='checked';
		}
		?>

                   <label class="control-label col-md-3">Gender</label>
                  <div class="col-md-6" style='padding-top:8px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input name="gender" type="radio" value='Male' <?php echo $male ?>> Male &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  <input name="gender" type="radio" value='Female' <?php echo $female ?>> Female
            </div> 
          </div><br><br><br>
    <div class="form-group">
            <label class="control-label col-md-3"><br>Photo Passport
           
            </label> 
            <div class="col-md-5">
              <div class="fileupload fileupload-new" data-provides="fileupload"><input type="hidden">
              <input value="" name="" type="hidden">
                <div class="fileupload-new img-thumbnail" style="width: 150px; height: 100px;">
                  <img src="<?php echo $photo ?>">
                </div>
                <div class="fileupload-preview fileupload-exists img-thumbnail" style="width: 200px; max-height: 150px;"></div>
                <div>
                  <span class="btn btn-default btn-file"><span class="fileupload-new">Sélectionnez l'image</span>
                  
                  <span class="fileupload-exists">Change</span>
                  <input name="photo" id="profile_pic" type="file"></span>
                  <a class="btn btn-default fileupload-exists" data-dismiss="fileupload" href="#">Supprime</a>
                 <br> <small>jpg ,png &amp; jpeg (Max : 2MB)</small>
                </div>
              </div>
            </div>
          </div>

		 
 </div>
 <div class="col-md-6">
 <div class="heading"><h4>Autre Information</h4></div>

 <div class="form-group">
                   <label class="control-label col-md-3">Telephone No.1</label>
                  <div class="col-md-6">
             <input class="form-control" name="contact1" type="text" value="<?php echo $contact1 ?>" required>
            </div> 
			 <span style="color:#d43f3a">
                         obligatoire
                      </span>   
          </div>
           <div class="form-group">
                   <label class="control-label col-md-3">Telephone No.2</label>
                  <div class="col-md-6">
              <input class="form-control" name="contact2" type="text" value="<?php echo $contact2 ?>">
            </div> 
          </div>
		  <input value="1" name="depart" type="hidden"><input value="0" name="salary" type="hidden">
 
 
							  <div class="form-group">
            <label class="control-label col-md-3">Accès utilisateur</label>
            <div class="col-md-6"><select class="form-control" name="currentp" required>
			  <option value=""> </option>
			  <?php
		
			$de=mysqli_query($conn, "SELECT *FROM `position` WHERE `Status` = '0' ORDER BY `Postid` ASC");
			  while($re=mysqli_fetch_assoc($de)){
					$ne=$re['Postid'];
					$dep=$re['Postname'];
					$tit=$re['Owner'];
					if($ne==$currentp)
						$sed="selected=selected'";
					else
						$sed="";
			echo"<option value='$ne' $sed title='$tit'>$dep</option>";
			  }
			  ?>
                            </select>
            </div>
                        <span style="color:#d43f3a">
                         obligatoire
                      </span>     </div> 







				<br><br><div class="heading"><h4>Identifiants de connexion</h4></div>
          <div class="widget-container fluid-height" style='padding:10px 5px 20px 5px;'>
		   <div class="form-group">
                   <label class="control-label col-md-4">Nom d'utilisateur</label>
                  <div class="col-md-6">
              <input class="form-control" name="email" type="text" value="<?php echo $email ?>">
            </div> 
                                </div>
          <div class="form-group">
                   <label class="control-label col-md-4">Mot de passe</label>
                  <div class="col-md-6">
              <input class="form-control" name="password" id="password" type="password" value="<?php echo $password ?>">
            </div> 
                                 </div>
          <div class="form-group">
                   <label class="control-label col-md-4">Confirmez</label>
                  <div class="col-md-6">
              <input class="form-control" type="password" name="confirm_password" id="confirm_password"  value="<?php echo $password ?>"/> <span id='message'></span>
            </div> 
                                   </div></div>      








 </div>
 </div></div>


  <div class="form-group">
  <div class="col-md-12" style="padding-top:40px;"> 
  <div class="col-md-6">                 
  <button class="btn btn-lg btn-block btn-danger" type="reset"><i class="lnr lnr-undo"></i> Reset</button>         
  </div>    
   <div class="col-md-6">                
    <button class="btn btn-lg btn-block btn-success" type="submit"  name="<?php echo $namb ?>"><i class="lnr lnr-checkmark-circle"></i> <?php echo $valub ?> </button>         
   </div>   
 </div></div>
  </form>
 </div>
 </div>
 </div>
 </div>
 </div>  
   <?php
   include'footer.php';
   ?>