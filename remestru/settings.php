<?php
if(basename($_SERVER['PHP_SELF']) == 'settings.php'){
  $st="class='current'";
} 
else{
  $st="";
} 
include'header.php';

// Edit a given bank account record
if(isset($_POST['edito']))
		{
			$numu=$_POST['numu'];
			$acco=$_POST['acco'];
			$name=$_POST['name'];
			$bank=$_POST['bank'];
	$so=mysqli_query($conn, "UPDATE `baccount` SET `Account`='$acco', `Bank`='$bank', `Name`='$name' WHERE `Number`='$numu' ORDER BY `Number` ASC LIMIT 1");
		if($acco=='')
			$pto=30;
		else
			$pto=20;
		}

		// Create a new bank account record
if(isset($_POST['addo']))
		{
			$acco=$_POST['acco'];
			$name=$_POST['name'];
			$bank=$_POST['bank'];
	$so=mysqli_query($conn, "INSERT INTO `baccount` (`Bank`, `Account`, `Name`) VALUES ('$bank', '$acco', '$name')");
		$pto=10;
		}

		
	  
// ************************************** Edit a city *************************************************
if(isset($_POST['editv']))
		{
			$ville=$_POST['ville'];
			$code=$_POST['code'];
			$amo=str_replace(',', '', $_POST['amo']);
			$numu=$_POST['numu'];
	$so=mysqli_query($conn, "UPDATE `villes` SET `Ville`='$ville', `Code`='$code', `Amount`='$amo' WHERE `Number`='$numu' ORDER BY `Number` ASC LIMIT 1");
		if($ville=='')
			$pto=60;
		else
			$pto=50;
		}
	
	// Create a new city record
if(isset($_POST['addv']))
		{			
			$ville=$_POST['ville'];
			$code=$_POST['code'];
			$amo=str_replace(',', '', $_POST['amo']);
			$numu=$_POST['numu'];
	$so=mysqli_query($conn, "INSERT INTO `villes` (`Ville`, `Code`, `Amount`) VALUES ('$ville', '$code', '$amo')");
		$pto=40;
		}
	$so=mysqli_query($conn, "DELETE FROM `baccount` WHERE  `Account` = ''");
	$so=mysqli_query($conn, "DELETE FROM `villes` WHERE  `Ville` = ''");
?>

<div class="container-fluid main-content">
<div class="page-title hidden-print" style="height:40px;">
        <h2 style='margin-top:-10px; margin-bottom: 5px; color:#ffcc33'>Configuration</h2>
		
    </div>  <div class="row">
	<div class="col-lg-8 hidden-print" style="margin-top:-40px;">
  <div class="col-lg-4">  </div><div class="col-lg-8">
  
     <?php  
		   if($pto==10)
	echo"<center><div class='alert alert-info' style='border-radius:5px; height:32px; padding-top:6px;'>
<i class='lnr lnr-success'></i> <button class='close' data-dismiss='alert' type='button'>&times;</button>
Un compte a été créé avec succès. </div></center>";
		   elseif($pto==20)
	echo"<center><div class='alert alert-warning' style='border-radius:5px; height:32px; padding-top:6px;'>
<i class='lnr lnr-info'></i> <button class='close' data-dismiss='alert' type='button'>&times;</button>
Un compte a été modifie avec succès. </div></center>";
		   elseif($pto==30)
	echo"<center><div class='alert alert-danger' style='border-radius:5px; height:32px; padding-top:6px;'>
<i class='lnr lnr-warning'></i> <button class='close' data-dismiss='alert' type='button'>&times;</button>
Un compte a été supprimé avec succès. </div></center>";
			elseif($pto==40)
	echo"<center><div class='alert alert-info' style='border-radius:5px; height:32px; padding-top:6px;'>
<i class='lnr lnr-warning'></i> <button class='close' data-dismiss='alert' type='button'>&times;</button>
Une ville a été ajoutée à la liste. </div></center>"; 
			elseif($pto==50)
	echo"<center><div class='alert alert-warning' style='border-radius:5px; height:32px; padding-top:6px;'>
<i class='lnr lnr-warning'></i> <button class='close' data-dismiss='alert' type='button'>&times;</button>
Un ville a été modifie avec succès. </div></center>";  
			elseif($pto==60)
	echo"<center><div class='alert alert-danger' style='border-radius:5px; height:32px; padding-top:6px;'>
<i class='lnr lnr-warning'></i> <button class='close' data-dismiss='alert' type='button'>&times;</button>
Un ville a été supprimé avec succès. </div></center>"; 
	?>
    </div> 
		</div>

  <?php
if($_SESSION['Settings']){
	?>
  <div class="col-sm-4 hidden-print pull-right text-right" style="margin-top:-25px; margin-right:40px;"> 
  <div class="dropdown pull-right" style="margin-top:-25px;border:0px; background-color:transparent; text-align:left">
  <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown" style="width:180px;border:0px;">Autre Paramètres <span class="caret"></span></button>
  <ul class="dropdown-menu text-left" style="border:0px; width:250px; background-color:#ffffff; text-align:left; border-radius:10px; padding-bottom:0px;">
    <li style="border:0px; background-color:transparent; text-align:left; margin:0px;"><button class="btn btn-success btn-block btn-sm text-left" type="button" data-placement='top' data-toggle='modal' data-target='#modal-x1020'><i class="lnr lnr-chart-bars"></i>  Configuration de ville </button></li>

    <li style="border:0px; background-color:transparent; text-align:left; margin:0px;"><button class="btn btn-info btn-block btn-sm text-left" type="button" data-toggle="modal" data-target="#exampleModal" style="margin-bottom:0px;"><i class="lnr lnr-briefcase"></i> Les comptes bancaire </button></li>
  </ul>
</div>
						</div>
			<?php
}
  else{
	  ?>
<div class="col-sm-4 hidden-print pull-right" style="margin-top:-20px;"> &nbsp; </div>
		<?php
  }
	  ?>



<?php
	// **************************************** Bank Account Modal ******************************************************		
	echo"<div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'> CONFIGURATION DES COMPTES </h5>

      </div>
      <div class='modal-body' style='height:auto;'>
	  <table class='table table-striped'>     
                                      <thead>
                    <tr role='row'><th class='hidden-xs'>&nbsp;No&nbsp;</th><th> N° de Compte </th>
					<th> Nom&nbsp;de&nbsp;la&nbsp;banque </th><th> Nom&nbsp;du&nbsp;compte </th><th style='width:80px;'><div align='center'> # </th></th>
						 <tbody>";
				$i=1;							$stl="padding:2px;";
	  $dob=mysqli_query($conn, "SELECT *FROM `baccount` ORDER BY `Number` ASC");
		while($rob=mysqli_fetch_assoc($dob)){
			$numu=$rob['Number'];
			$bank=$rob['Bank'];
			$acco=$rob['Account'];
			$name=$rob['Name'];
			$clr="";

			print("<tr><form method='post' action=''><td class='hidden-xs' style='$stl $clr'><div align='center'>$i&nbsp;</td>
						<td style='$stl $clr'><div align='left'>
						<input name='acco' class='form-control' type='text' style='text-align:left; width:140px; height:24px; margin:0px 0px 0px 0px; padding:0px 10px 0px 10px; background-color:transparent;' value='$acco' onChange=this.style.color='#ff3366'></td>

						<td style='$stl $clr'><div align='left'>
						<input name='bank' class='form-control' type='text' style='text-align:left; width:140px; height:24px; margin:0px 0px 0px 0px; padding:0px 10px 0px 10px; background-color:transparent;' value='$bank' onChange=this.style.color='#ff3366' list='banki'>
						<datalist id='banki'>");
			
	$selecti =mysqli_query($conn, "SELECT `Fname` FROM `banks` WHERE (`Fname` != '' AND `Status` = '0') GROUP BY `Fname` ORDER BY `Fname` ASC");
			while ($rowi=mysqli_fetch_array($selecti)) 
				{
				 $datai = $rowi['Fname'];
				 echo"<option value='$datai'>";
				}			
						
						print("</datalist></td>

						<td style='$stl $clr'><div align='left'>
						<input name='name' class='form-control' type='text' style='text-align:left; width:160px; height:24px; margin:0px 0px 0px 0px; padding:0px 10px 0px 10px; background-color:transparent;' value='$name' onChange=this.style.color='#ff3366'><input type='hidden' name='numu' value='$numu'></td>
						<td><div align='center'><button type='submit' class='btn btn-xs btn-warning hidden-print' name='edito' style='height:22px; margin:0px 0px 0px 0px; padding:0px;' title='Modifier' data-toggle='tooltip' data-placement='top'>&nbsp;&nbsp;<i class='lnr lnr-pencil'></i>&nbsp;&nbsp;</button></td>
						</form></tr>");

						$i++;
		}

		print("<tr><form method='post' action=''><td class='hidden-xs' style='$stl $clr'><div align='center'>$i&nbsp;</td>
						<td style='$stl $clr'><div align='left'>
						<input name='acco' class='form-control' type='text' style='text-align:left; width:140px; height:24px; margin:0px 0px 0px 0px; padding:0px 10px 0px 10px; background-color:transparent;' onChange=this.style.color='#ff3366'></td>

						<td style='$stl $clr'><div align='left'>
						<input name='bank' class='form-control' type='text' style='text-align:left; width:140px; height:24px; margin:0px 0px 0px 0px; padding:0px 10px 0px 10px; background-color:transparent;' onChange=this.style.color='#ff3366' list='bank'>
						<datalist id='bank'>");
			
	$select =mysqli_query($conn, "SELECT `Fname` FROM `banks` WHERE `Fname` != '' GROUP BY `Fname` ORDER BY `Fname` ASC");
			while ($row=mysqli_fetch_array($select)) 
				{
				 $data = $row['Fname'];
				 echo"<option value='$data'>";
				}			
						
						print("</datalist></td>

						<td style='$stl $clr'><div align='left'>
						<input name='name' class='form-control' type='text' style='text-align:left; width:160px; height:24px; margin:0px 0px 0px 0px; padding:0px 10px 0px 10px; background-color:transparent;' onChange=this.style.color='#ff3366'></td>
						<td><div align='center'><button type='submit' class='btn btn-xs btn-success hidden-print' name='addo' style='height:22px; margin:0px 0px 0px 0px; padding:0px;' title='Ajouter' data-toggle='tooltip' data-placement='top'>&nbsp;&nbsp;<i class='lnr lnr-plus-circle'></i>&nbsp;&nbsp;</button></td>
						</form></tr>");

			echo"</table></div><div class='modal-footer' style='margin-top:-10px; height:50px; padding-top:5px; border:0px solid blue;'>
       
        <button type='button' class='btn btn-sm btn-danger' data-dismiss='modal' style='height:20px; padding-top:0px; width:120px;'>FERMER</button>
      </div>
    </div>
  </div>
</div>";

// *************************************************** End of Modal ************************************************************



	// **************************************** City configuration ******************************************************		
	echo"<div class='modal fade' id='modal-x1020' tabindex='-1' role='dialog' 
	aria-labelledby='exampleModalLabel' aria-hidden='true' style='top:10px;'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'> CONFIGURATION DE VILLES </h5>

      </div>
      <div class='modal-body' style='height:auto;'>
	  <table class='table table-striped'>     
                                      <thead>
                    <tr role='row'><th class='hidden-xs'>&nbsp;&nbsp;No&nbsp;</th><th> Nom&nbsp;de&nbsp;la&nbsp;ville </th>
					<th> Code&nbsp;du&nbsp;ville </th><th> Montant </th><th style='width:80px;'><div align='center'> # </th></th>
						 <tbody>";
				$i=1;							$stl="padding:2px;";
	  $dob=mysqli_query($conn, "SELECT *FROM `villes` ORDER BY `Number` ASC");
		while($rob=mysqli_fetch_assoc($dob)){
			$numu=$rob['Number'];
			$ville=$rob['Ville'];
			$code=$rob['Code'];
			$amo=$rob['Amount'];
			$clr="";

			print("<tr><form method='post' action=''><td class='hidden-xs' style='$stl $clr'><div align='center'>$i&nbsp;&nbsp;</td>
						<td style='$stl $clr'><div align='left'>
						<input name='ville' class='form-control' type='text' style='text-align:left; width:220px; height:24px; margin:0px 0px 0px 0px; padding:0px 10px 0px 10px; background-color:transparent;' value='$ville' onChange=this.style.color='#ff3366' OnKeyup='return cUpper(this);'></td>

						<td style='$stl $clr'><div align='left'>
						<input name='code' class='form-control' type='text' style='text-align:center; width:120px; height:24px; margin:0px 0px 0px 0px; padding:0px 10px 0px 10px; background-color:transparent;' value='$code' onChange=this.style.color='#ff3366' OnKeyup='return cUpper(this);'>");
			
			print("</td><td style='$stl $clr'><div align='left'>
						<input name='amo' class='form-control' type='text' style='text-align:right; width:100px; height:24px; margin:0px 0px 0px 0px; padding:0px 10px 0px 10px; background-color:transparent;' value='$amo' onChange=this.style.color='#ff3366' onkeyup='format(this);' onkeypress='return isNumberKey(event)'><input type='hidden' name='numu' value='$numu'></td>
						<td><div align='center'><button type='submit' class='btn btn-xs btn-warning hidden-print' name='editv' style='height:22px; margin:0px 0px 0px 0px; padding:0px;' title='Modifier' data-toggle='tooltip' data-placement='top'>&nbsp;&nbsp;<i class='lnr lnr-pencil'></i>&nbsp;&nbsp;</button></td>
						</form></tr>");

						$i++;
		}

		print("<tr><form method='post' action=''><td class='hidden-xs' style='$stl $clr'><div align='center'>$i&nbsp;&nbsp;</td>
						<td style='$stl $clr'><div align='left'>
						<input name='ville' class='form-control' type='text' style='text-align:left; width:220px; height:24px; margin:0px 0px 0px 0px; padding:0px 10px 0px 10px; background-color:transparent;' onChange=this.style.color='#ff3366' OnKeyup='return cUpper(this);'></td>

						<td style='$stl $clr'><div align='left'>
						<input name='code' class='form-control' type='text' style='text-align:center; width:120px; height:24px; margin:0px 0px 0px 0px; padding:0px 10px 0px 10px; background-color:transparent;' onChange=this.style.color='#ff3366' OnKeyup='return cUpper(this);'>");
						
		print("</td><td style='$stl $clr'><div align='left'>
						<input name='amo' class='form-control' type='text' style='text-align:left; width:100px; height:24px; margin:0px 0px 0px 0px; padding:0px 10px 0px 10px; background-color:transparent;' onChange=this.style.color='#ff3366' onkeyup='format(this);' onkeypress='return isNumberKey(event)'></td>
						<td><div align='center'><button type='submit' class='btn btn-xs btn-success hidden-print' name='addv' style='height:22px; margin:0px 0px 0px 0px; padding:0px;' title='Ajouter' data-toggle='tooltip' data-placement='top'>&nbsp;&nbsp;<i class='lnr lnr-plus-circle'></i>&nbsp;&nbsp;</button></td>
						</form></tr>");

			echo"</table></div><div class='modal-footer' style='margin-top:-10px; height:50px; padding-top:5px; border:0px solid blue;'>
       
        <button type='button' class='btn btn-sm btn-danger' data-dismiss='modal' style='height:20px; padding-top:0px; width:120px;'>FERMER</button>
      </div>
    </div>
  </div>
</div>";

// *************************************************** End of Modal ************************************************************

?>
			</div>
 <div class="row">
 <div class="col-md-12">
 <div class="widget-container fluid-height clearfix">
 <div class="widget-content padded">
 <form method="post" class="form-horizontal" action="" enctype="multipart/form-data">
 <div class="row">
 <div class="col-md-12">
 <div class="col-md-6">
   <div class="form-group">
            <label class="control-label col-md-4">Nom de l'institution</label>
            <div class="col-md-6">
              <input class="form-control" name="cna" value="<?php echo $cna ?>" type="text" readonly>
            </div>
          </div>
   <div class="form-group">
            <label class="control-label col-md-4">Adresse e-mail</label>
            <div class="col-md-6">
              <input class="form-control" name="mail" value="<?php echo $mail ?>" type="text">
            </div>
   </div>
    <div class="form-group">
 <label class="control-label col-md-4">Site Internet</label>
     <div class="col-md-6">
                <input class="form-control" name="web" value="<?php echo $web ?>" type="text">
              </div></div>
  <div class="form-group">
                   <label class="control-label col-md-4">Addresse</label>
                  <div class="col-md-6">
              <textarea class="form-control" name="adde"><?php echo $adde ?>          
                              </textarea>
            </div> 
          </div>
    
          <div class="form-group">
          <label class="control-label col-md-4">Pays</label>
          <div class="col-md-6">
<select class="form-control" name="country">
        <option value=""></option>
    <option value="<?php echo $country ?>" selected><?php echo $country ?></option>
</select>
          </div>
          </div>
          <div class="form-group">
                   <label class="control-label col-md-4">Ville</label>
                  <div class="col-md-6">
             <input class="form-control" name="city" value="<?php echo $city ?>" type="text">
            </div> 
          </div>
          <div class="form-group">
                   <label class="control-label col-md-4">Telephone 1</label>
                  <div class="col-md-6">
              <input class="form-control" name="pho1" value="<?php echo $pho1 ?>" type="text">
            </div> 
          </div>
          <div class="form-group">
                   <label class="control-label col-md-4">Telephone 2</label>
                  <div class="col-md-6">
              <input class="form-control" name="pho2" value="<?php echo $pho2 ?>" type="text">
            </div> 
          </div> 
 </div>
 <div class="col-md-6">
   
  
   <div class="form-group">
    <label class="control-label col-md-4">Identification fiscale</label>
                     <div class="col-md-6">
              <input class="form-control" name="tax" value="<?php echo $tax ?>" type="text">
              </div>
            </div>       
   <div class="form-group">
    <label class="control-label col-md-4">Devise et coût </label>
                     <div class="col-md-3">
              <input class="form-control" name="curre1" value="USD" style='text-align:center;' OnKeyup='return cUpper(this);' type="text" readonly>
              </div>
			   <div class="col-md-3">
              <input class="form-control" name="cost" value="<?php echo $fcost ?>" style='text-align:center;' OnKeyup='return cUpper(this);' type="text">
              </div>
            </div>  
 <div class="form-group">
 <label class="control-label col-md-3"> </label>
     <div class="col-md-6" style="text-align:center;">
	 <input value="0" name="bch" type="hidden">
              </div>
              </div> 
      <div class="form-group"><br><br>
            <label class="control-label col-md-2"> &nbsp;&nbsp; </label>
            <div class="col-md-6 text-center">
              <div class="fileupload fileupload-new" data-provides="fileupload">
              <input value="" name="" type="hidden">
                <div class="fileupload-new img-thumbnail">
                      <img src="imgs/logo.png" width="100%">
                     
                </div>
                <div class="fileupload-preview fileupload-exists img-thumbnail" style="width: 200px; max-height: 150px;"></div>
                <div>
                  <span class="btn btn-default btn-file">
                  <span class="fileupload-new">Sélectionnez l'image</span>
                  <span class="fileupload-exists">Change</span>
                  <input name="logo" id="logo" type="file"></span>
                  <a class="btn btn-default fileupload-exists" data-dismiss="fileupload" href="#">Supprime</a>&nbsp;
             <br><small>Uniquement au format <b>.png</b>&nbsp;(Max&nbsp;:&nbsp;64M)</small><br><br>
                  
                </div>
              </div>
            </div>
          </div> 
 
 </div></div></div>
   <div class="form-group">
  <div class="col-md-1"></div>
   <div class="col-md-10">                 
    <button class="btn btn-lg btn-block btn-primary" type="submit" name="submit_settings"><i class="lnr lnr-chevron-up-circle"></i> Update</button>         
   </div>
   <div class="col-md-1"></div>
 </div>
 
 </form></div></div><br><br><br></div></div></div>  
   <?php
   include'footer.php';
   ?>