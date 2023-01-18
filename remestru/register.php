<?php
if(basename($_SERVER['PHP_SELF']) == 'register.php'){
  $rg="class='current'";
} 
else{
  $rg="";
} 
include'header.php';

			$photo="imgs/-text.png";
			$namb="submit_employee";
				$valub="Submit";
				$sexe="Male";
				$_SESSION['Link']='register.php';
		
		if(isset($_GET['id']))
			{
			$_SESSION['Code']=$_GET['id'];
			$_SESSION['Page'] = 1;
			}
				
	if(isset($_POST['open']))
		{
		$_SESSION['Code']=$_POST['code'];
	$do = mysqli_query($conn, "UPDATE `account` SET `upda`='1' WHERE `Number`=".$_SESSION['Code']."");
		$_SESSION['Page'] = 1;
		$_SESSION['Link']='plist.php';
		}

	if(isset($_POST['back']))
		{
		$_SESSION['Code']=$_POST['code'];
		$_SESSION['Page'] = $_POST['page'] - 1;
		}

	include'send_data.php';
			

			$code = $_SESSION['Code'];
			$page = $_SESSION['Page'];

			if($code=='202cb962ac59075b964b07152d234b70' OR $_SESSION['Page']=='1'){
				$link = $_SESSION['Link'];
				$xbt="<button class='btn btn-md btn-block btn-danger type='button' 
				onclick=window.location.href='$link?id=202cb962ac59075b964b07152d234b70'>
	 <i class='lnr lnr-chevron-left-circle'></i> &nbsp; Annuler </button>";
				}
			else{
				$pas=$_SESSION['Page'];
				$xbt="<form action='' method='post' name='myforme'>
				<input type='hidden' name='code' value='$code'><input type='hidden' name='page' value='$pas'>
				<button class='btn btn-md btn-block btn-warning type='submit' name='back' onclick='submitForme();'>
	 <i class='lnr lnr-chevron-left-circle'></i> &nbsp; Retourner </button></form>";
				}

	include'fetch_data.php';

		if(!$province)
	$province=$_SESSION['Prove'];
?>

 <form method="post" class="form-horizontal" action="" name="myform" enctype="multipart/form-data">
 <div class="container-fluid main-content">
<div class="page-title">
<div class="row">
</div>
</div>
  <div class="row">
        <div class="col-md-2">
		<ul class="list-group"> <li class="list-group-item active">
           <a href="register.php?id=202cb962ac59075b964b07152d234b70">
           <p>
           <i class="lnr lnr-plus-circle"></i>&nbsp;Nouvel participant
           </p></a>
           </li>
			 			  <li class="list-group-item">
           <a href="plist.php">
           <p>
           <i class="lnr lnr-menu-circle"></i>&nbsp;Liste de participants
           </p></a>
           </li>
           
		        
		   <?php
			if($_SESSION['Approe'])
				{
				?>
 <li class="list-group-item">
           <a href="approval.php">
           <p>
           <i class="lnr lnr-menu-circle"></i>&nbsp;Processus d'approuver
           </p><?php
				if($forder)
	echo"<span class='badge' style='float:right; font-size:11px; margin-right:0px; height:18px; background-color:#660099; width:25px; text-align:center; margin-top:-40px; color:#ffffff;' title='Purchase to be paid' data-toggle='tooltip' data-placement='top'> $forder </span>";
					?></a>
           </li>
				<?php
				}
			if($_SESSION['Apay'])
				{
				?>
 <li class="list-group-item">
           <a href="payment.php">
           <p>
           <i class="lnr lnr-menu-circle"></i>&nbsp;Paiement de la carte
           </p><?php
				if($fpay)
	echo"<span class='badge' style='float:right; font-size:11px; margin-right:0px; height:18px; background-color:#ffcc66; width:25px; text-align:center; margin-top:-40px; color:#ffffff;' title='Purchase to be paid' data-toggle='tooltip' data-placement='top'> $fpay </span>";
					?></a>
           </li>
				<?php
				}
				?>
				<li class="list-group-item">
           <a href="transit.php">
           <p>
           <i class="lnr lnr-menu-circle"></i>&nbsp;Impression de cartes
           </p></a>
           </li>
                       </ul>
              </div>
            









	<div class="col-md-10">  
	
	<?php 
	if($pto==10)
echo"<center><div class='alert alert-danger alert-sm' style='text-align:center; float:center; 
background-color:#60c560; color:#ffffff; border-radius:5px; height:30px; padding-top:5px;'><i class='lnr lnr-checkmark-circle'></i> &nbsp;&nbsp; 
		<button class='close' data-dismiss='alert' type='button'>×</button>Le nouveau participant est enregistré correctement. </div></center>";
	if($pto==20)
echo"<center><div class='alert alert-danger alert-sm' style='text-align:center; float:center; 
background-color:#60c560; color:#ffffff; border-radius:5px; height:30px; padding-top:5px;'><i class='lnr lnr-checkmark-circle'></i> &nbsp;&nbsp; 
		<button class='close' data-dismiss='alert' type='button'>×</button>Le participant est modifié correctement. </div></center>";
		?>
		



		<?php
		if($_SESSION['Page']=='1'){
		?>
 <div class="widget-container fluid-height clearfix" style="border-radius:5px; border:1px solid #daf0f7;">

 <div class="heading text-info" style="background-color:#daf0f7; height:30px; padding:10px; padding-left:30px; margin-top:0px; margin-left:0px; margin-right:0px; padding-top:5px; border-radius:5px 5px 0px 0px; margin-bottom:20px; font-weight:none"><font style="font-weight:none">Identification du Transporteur<span class="pull-right badge" style="background-color:#ff66cc;">01</span></font></div>
		<div class="col-md-9">
							<div class="col-sm-5 form-group">
								<label>Nom</label><font size='2' color='red'> * </font>
								<input type="text" name="nom" class="form-control" value="<?php echo $nom ?>" required>
							</div>
							<div class="col-sm-3 form-group">
								<label>Post-Nom</label>
								<input type="text" name="postnom" class="form-control" value="<?php echo $postnom ?>">
							</div>
							<div class="col-sm-4 form-group">
								<label>Prénom</label><font size='2' color='red'> * </font>
								<input type="text" name="prenom" class="form-control" value="<?php echo $prenom ?>" required>
							</div>
						
						<div class="col-sm-6 form-group">
							<label>Lieu De Naissance</label><font size='2' color='red'> * </font>
							<input type="text" name="lieu" class="form-control" value="<?php echo $lieu ?>" required>
						</div>
							<div class="col-sm-6 form-group">
								<label>Date de Naissance</label><font size='2' color='red'> * </font>
			<label class="pull-right text-right text-info">DD-MM-YYYY&nbsp;&nbsp;</label>
						<div class="input-group date" data-provide="datepicker">
					<input type="text" name="date" class="form-control text-center" value="<?php echo $date ?>" autocomplete='off' required>
								<div class="input-group-addon">
								<span class="lnr lnr-calendar-full"></span>
								</div>
						</div></div>
							
							<div class="col-sm-6 form-group">
								<label>Nom du père</label><label class="pull-right text-right text-info">Vivant ?&nbsp;&nbsp;</label>
								<div class="input-group" style="width:100%">
								<input type="text" name="pere" class="form-control" value="<?php echo $pere ?>">
							<div class="input-group-addon" style="padding:0px; margin:0px; width:20%;">
			<select class="form-control" name="pviva" style="border:0px; padding-right:5px; padding-left:5px; height:32px;">
			<option value=''> Choisir </option><option value='OUI'> &nbsp; OUI </option><option value='NO'> &nbsp; NO </option>
                            </select>
								</div>
						</div></div>	
							<div class="col-sm-6 form-group">
								<label>Nom de la mère</label><label class="pull-right text-right text-info">Vivante ?&nbsp;&nbsp;</label>
								<div class="input-group" style="width:100%">
								<input type="text" name="mere" class="form-control" value="<?php echo $mere ?>">
							<div class="input-group-addon" style="padding:0px; margin:0px; width:20%;">
			<select class="form-control" name="mviva" style="border:0px; padding-right:5px; padding-left:5px; height:32px;">
			<option value=''> Choisir </option><option value='OUI'> &nbsp; OUI </option><option value='NO'> &nbsp; NO </option>
                            </select>
								</div></div>
							</div>	



							</div>
						<div class="col-md-3 text-center">

		<div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new img-thumbnail" style="width: 150px; height: 100px;">
                  <img src="<?php echo $photo ?>">
                </div>
                <div class="fileupload-preview fileupload-exists img-thumbnail" style="width: 200px; max-height: 150px;"></div>
                <div>
                  <span class="btn btn-default btn-file"><span class="fileupload-new">Sélectionnez l'image</span>
                  
                  <span class="fileupload-exists" style="height:20px;">Change</span>
                  <input name="photo" id="profile_pic" type="file"></span>
                  <a class="btn btn-default fileupload-exists" data-dismiss="fileupload" href="#">Supprime</a>
                 <br> <small>jpg ,png &amp; jpeg (Max : 2MB)</small>
                </div></div>
			</div>
			<div class="row"></div>					

<div class="col-sm-12 form-group">
<div class="col-sm-9" style="margin:0px; padding:0px;">
<div class="col-sm-6 form-group">
								<label>Nom du grand père</label><label class="pull-right text-right text-info">Vivant ?&nbsp;&nbsp;</label>
								<div class="input-group" style="width:100%">
								<input type="text" name="grandpere" class="form-control" value="<?php echo $grandpere ?>">
							<div class="input-group-addon" style="padding:0px; margin:0px; width:20%;">
			<select class="form-control" name="gpviva" style="border:0px; padding-right:5px; padding-left:5px; height:32px;">
			<option value=''> Choisir </option><option value='OUI'> &nbsp; OUI </option><option value='NO'> &nbsp; NO </option>
                            </select>
								</div></div>
							</div>
<div class="col-sm-6 form-group">
								<label>Nom de la grande mère</label><label class="pull-right text-right text-info">Vivante ?&nbsp;&nbsp;</label>
								<div class="input-group" style="width:100%">
								<input type="text" name="grandmere" class="form-control" value="<?php echo $grandmere ?>">
							<div class="input-group-addon" style="padding:0px; margin:0px; width:20%;">
			<select class="form-control" name="gmviva" style="border:0px; padding-right:5px; padding-left:5px; height:32px;">
			<option value=''> Choisir </option><option value='OUI'> &nbsp; OUI </option><option value='NO'> &nbsp; NO </option>
                            </select>
								</div></div>
							</div></div>
							<div class="col-sm-3 form-group text-center">
								<label class="text-info">Sexe</label>
		<div style="border:1px solid powderblue; border-radius:5px; height:34px; padding-top:5px;">
		  <?php
		  if($sexe=='Male'){
			$male='checked';
			$female='';
		}
		  else{
			$male='';
			$female='checked';
		}
		?>

         <label class="col-xs-6 text-center">
              <input name="sexe" type="radio" value='Male' <?php echo $male ?>> Male </label>
	     <label class="col-xs-6 text-center">
			  <input name="sexe" type="radio" value='Femelle' <?php echo $female ?>> Femelle </label> 
							</div></div>
<div class="col-sm-9" style="margin:0px; padding:0px;">
			
							<div class="col-sm-6 form-group"><br>
								<label>Langue(s) parlée(s)</label>
								<input type="text" name="langue" class="form-control" value="<?php echo $langue ?>">
							</div>
							<div class="col-sm-6 form-group">
								<br><label>Etude Faite</label>
								<input type="text" name="etude" class="form-control" value="<?php echo $etude ?>">
							</div>
							</div>
							<div class="col-sm-3 form-group">
								<br><label>Etat-Civil</label><font size='2' color='red'> * </font>
								<select class="form-control" name="civil" required>
								<option value=""> Choisir </option>
								<option value="Marié" <?php echo $ca ?>>Marié</option>
								<option value="Mariée" <?php echo $cb ?>>Mariée</option>
								<option value="Veuve" <?php echo $cc ?>>Veuve</option>
								<option value="Divorcé" <?php echo $cd ?>>Divorcé</option>
								<option value="Célibataire" <?php echo $ce ?>>Célibataire</option>
								</select>
							</div>
			

<div class="col-sm-9 form-group"><br>
								<label>Nom du Conjoint(e)</label><label class="pull-right text-right text-info">Vivant(e) ?&nbsp;&nbsp;</label>
								<div class="input-group" style="width:100%">
								<input type="text" name="conjoint" class="form-control" value="<?php echo $conjoint ?>">
							<div class="input-group-addon" style="padding:0px; margin:0px; width:20%;">
			<select class="form-control" name="cviva" style="border:0px; padding-right:5px; padding-left:5px; height:32px;">
			<option value=''> Choisir </option>
		<option value='OUI'> &nbsp; OUI </option><option value='NO'> &nbsp; NO </option></select>
								</div></div>
							</div>
		<div class="col-sm-3 form-group"><br>
								<label>Nombre d’enfant</label>
								<input type="number" name="enfant" class="form-control" value="<?php echo $enfant ?>">
							</div>

		
		<div class="col-sm-6 form-group"><br><br>
								<label>Profession</label>
								<input type="text" name="profession" class="form-control" value="<?php echo $profession ?>">
							</div>

		<div class="col-sm-1 form-group"> </div><div class="col-sm-4 form-group"><br><div class="hidden-xs"><br></div>
								<label>Adresse résidentielle (Ville/Terr)</label><font size='2' color='red'> * </font>
								<select name="aville" class="form-control" required>
								<option value=""> </option>
								<?php
						$sk=mysqli_query($conn, "SELECT `Ville` FROM `villes` WHERE `Province`='$province' ORDER BY `Ville` ASC");
								while($rk=mysqli_fetch_assoc($sk)){
									$vill=$rk['Ville'];
									if($vill==$aville)
										$h="selected";
									else
										$h="";
								echo"<option value='$vill' $h> $vill </option>";
							}
							?>

								</select>
							</div><div class="col-sm-1 form-group"> </div><div class="row"> </div>


							<div class="col-sm-6 form-group"><br>
		<label>N° Permis de conduire</label><font size='2' color='red'> * </font>
								<input type="text" name="permis" class="form-control" value="<?php echo $permis ?>" required></div>
							

		<div class="col-sm-6 form-group text-center"><br>
		<label>Categorie<font size='2' color='red'> * </font> &nbsp;&nbsp;</label><hr style="margin:0px 20px 5px 20px;">
		<span  style="font-size:18px;">
		<input class="form-check-input" name="cata" type="checkbox" value="A" style="width:30px; height:20px;" <?php echo $a ?>>A&nbsp;&nbsp;&nbsp;&nbsp;
		<input class="form-check-input" name="catb" type="checkbox" value="B" style="width:30px; height:20px;" <?php echo $b ?>>B&nbsp;&nbsp;&nbsp;&nbsp;
		<input class="form-check-input" name="catc" type="checkbox" value="C" style="width:30px; height:20px;" <?php echo $c ?>>C&nbsp;&nbsp;&nbsp;&nbsp;
		<input class="form-check-input" name="catd" type="checkbox" value="D" style="width:30px; height:20px;" <?php echo $d ?>>D&nbsp;&nbsp;&nbsp;&nbsp;
		<input class="form-check-input" name="cate" type="checkbox" value="E" style="width:30px; height:20px;" <?php echo $e ?>>E</span></div>
		<div class="row"> </div></div><br></div>

<?php
		}
if($_SESSION['Page']=='2'){
	?>

 <div class="widget-container fluid-height clearfix" style="margin-top:30px; border-radius:5px; border:1px solid #daf0f7;">

 <div class="heading text-info" style="background-color:#daf0f7; height:30px; padding:10px; padding-left:30px; margin-top:0px; margin-left:0px; margin-right:0px; padding-top:5px; border-radius:5px 5px 0px 0px; margin-bottom:20px; font-weight:none"><font style="font-weight:none">Autres détails<span class="pull-right badge" style="background-color:#ff66cc;">02</span></font></div>
		<div class="col-md-12">

		
		<div class="col-sm-6 form-group">
								<label>Nationalité</label><font size='2' color='red'> * </font>
								<input type="text" name="nationalite" class="form-control" value="<?php echo $nationalite ?>" required>
							</div>

		
		<div class="col-sm-6 form-group">
								<label>Pays d’origine</label>
								<input type="text" name="pays" class="form-control" value="<?php echo $pays ?>">
							</div>
 
		 <div class="col-sm-6 form-group"><br>
								<label>Province d’origine</label>
								<input type="text" name="province" class="form-control" value="<?php echo $province ?>" readonly>
							</div>

		
		<div class="col-sm-6 form-group"><br>
								<label>Territoire d’origine</label>
								<input type="text" name="territoire" class="form-control" value="<?php echo $territoire ?>">
							</div>
		
 
		 <div class="col-sm-6 form-group"><br>
								<label>Secteur/Chefferie d’origine</label>
								<input type="text" name="secteur" class="form-control" value="<?php echo $secteur ?>">
							</div>

		
		<div class="col-sm-6 form-group"><br>
								<label>Collectivité</label>
								<input type="text" name="collectivite" class="form-control" value="<?php echo $collectivite ?>">
							</div>
		
 
		 <div class="col-sm-6 form-group"><br>
								<label>Groupement</label>
								<input type="text" name="groupement" class="form-control" value="<?php echo $groupement ?>">
							</div>

		
		<div class="col-sm-6 form-group"><br>
								<label>Village d’origine</label>
			<input type="text" name="village" class="form-control" value="<?php echo $village ?>" OnKeyup="return cUpper(this);">
							</div>

		
		<div class="col-sm-4 form-group"><br>
								<label>Type pièce d’identité</label>
								<input type="text" name="type" class="form-control" value="<?php echo $type ?>">
							</div>

		
		<div class="col-sm-4 form-group"><br>
								<label>N° ID National</label><font size='2' color='red'> * </font>
								<input type="text" name="idno" class="form-control" value="<?php echo $idno ?>" required>
							</div>

		
		<div class="col-sm-4 form-group"><br>
								<label>Lieu de délivrance</label>
								<input type="text" name="delieu" class="form-control" value="<?php echo $delieu ?>">
							</div>
		
 
		 <div class="col-sm-6 form-group"><br>
								<label>Numéro Carte de Résidence (Etranger)</label>
								<input type="text" name="carte" class="form-control" value="<?php echo $carte ?>">
							</div>

		
		<div class="col-sm-6 form-group"><br>
								<label>Lieu de délivrance</label>
								<input type="text" name="delivrance" class="form-control" value="<?php echo $delivrance ?>">
							</div>

		
		<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (No)</label>
								<input type="text" name="ano" class="form-control" value="<?php echo $ano ?>">
							</div>

		
		<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (Avenue)</label>
								<input type="text" name="aavenue" class="form-control" value="<?php echo $aavenue ?>">
							</div>

		
		<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (Quartier)</label>
								<input type="text" name="aquartier" class="form-control" value="<?php echo $aquartier ?>">
							</div>

		
		<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (Commune)</label>
								<input type="text" name="acommune" class="form-control" value="<?php echo $acommune ?>">
							</div>

														
							<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (Secteur)</label>
								<input type="text" name="asecteur" class="form-control" value="<?php echo $asecteur ?>">
							</div>
							
							<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (Province)</label>
								<input type="text" name="aprovince" class="form-control" value="<?php echo $aprovince ?>">
							</div>

							<div class="col-sm-6 form-group"><br> </div><div class="row"> </div>
		
 
		 <div class="col-sm-6 form-group"><br>
								<label>Contact du Transporteur</label><font size='2' color='red'> * </font>
								<input type="text" name="contact" class="form-control" value="<?php echo $contact ?>" required>
							</div>

		
		<div class="col-sm-6 form-group"><br>
								<label>Email du Transporteur</label>
								<input type="text" name="email" class="form-control" value="<?php echo $email ?>">
							</div><div class="row"> </div></div><br></div>

		<?php
		}
if($_SESSION['Page']=='3'){
	?>
			<div class="widget-container fluid-height clearfix" style="margin-top:30px; border-radius:5px; border:1px solid #daf0f7;">

		<div class="heading text-info" style="background-color:#daf0f7; height:30px; padding:10px; padding-left:30px; margin-top:0px; margin-left:0px; margin-right:0px; padding-top:5px; border-radius:5px 5px 0px 0px; margin-bottom:20px; font-weight:none"><font style="font-weight:none">Personne de référence en cas de besoin<span class="pull-right badge" style="background-color:#ff66cc;">03</span></font></div>
			<div class="col-sm-12">
 
		 <div class="col-sm-4 form-group">
								<label>Nom du Personne</label>
								<input type="text" name="rnom" class="form-control" value="<?php echo $rnom ?>">
							</div>

		
		<div class="col-sm-4 form-group">
								<label>Lieu</label>
								<input type="text" name="rlieu" class="form-control" value="<?php echo $rlieu ?>">
							</div>

		
		<div class="col-sm-4 form-group">
								<label>N° Téléphone</label>
								<input type="text" name="rphone" class="form-control" value="<?php echo $rphone ?>">
							</div>


		<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (No)</label>
								<input type="text" name="rno" class="form-control" value="<?php echo $rno ?>">
							</div>

		
		<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (Avenue)</label>
								<input type="text" name="ravenue" class="form-control" value="<?php echo $ravenue ?>">
							</div>

		
		<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (Quartier)</label>
								<input type="text" name="rquartier" class="form-control" value="<?php echo $rquartier ?>">
							</div>

		
		<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (Commune)</label>
								<input type="text" name="rcommune" class="form-control" value="<?php echo $rcommune ?>">
							</div>

							<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (Ville/Terr)</label>
								<input type="text" name="rville" class="form-control" value="<?php echo $rville ?>">
							</div>
							
							<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (Secteur)</label>
								<input type="text" name="rsecteur" class="form-control" value="<?php echo $rsecteur ?>">
							</div>
							
							<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (Province)</label>
								<input type="text" name="rprovince" class="form-control" value="<?php echo $rprovince ?>">
							</div>

							<div class="col-sm-3 form-group"><br> </div><div class="row"> </div><br></div></div>

<?php
		}
if($_SESSION['Page']=='4'){
	?>
	<div class="widget-container fluid-height clearfix" style="margin-top:30px; border-radius:5px;">
		 <div class="heading text-info" style="background-color:#daf0f7; height:30px; padding:10px; padding-left:30px; margin-top:0px; margin-left:0px; margin-right:0px; padding-top:5px; border-radius:5px 5px 0px 0px; margin-bottom:20px; font-weight:none"><font style="font-weight:none">Identification du Véhicule/Moto<span class="pull-right badge" style="background-color:#ff66cc;">04</span></font></div>

		<div class="col-sm-12"><div class="col-sm-4 form-group">
								<label>Marque du Véhicule</label>
								<input type="text" name="marque" class="form-control" value="<?php echo $marque ?>">
							</div>

		
		<div class="col-sm-4 form-group">
								<label>Date de fabrication</label>
								<input type="text" name="fabrication" class="form-control" value="<?php echo $fabrication ?>">
							</div>

		
		<div class="col-sm-4 form-group">
								<label>N° Chassie</label>
								<input type="text" name="chassie" class="form-control" value="<?php echo $chassie ?>">
							</div>

		
		<div class="col-sm-4 form-group"><br>
								<label>Couleur</label>
								<input type="text" name="couleur" class="form-control" value="<?php echo $couleur ?>">
							</div>

							<div class="col-sm-4 form-group"><br>
								<label>N° Plaque d’immatriculation</label>
								<input type="text" name="plaque" class="form-control" value="<?php echo $plaque ?>">
							</div>
							
							<div class="col-sm-4 form-group"><br> </div><div class="row"> </div><br></div></div>
<?php
		}
if($_SESSION['Page']=='5'){
	?>
	<div class="widget-container fluid-height clearfix" style="margin-top:30px; border-radius:5px; border:1px solid #daf0f7;">

	<div class="heading text-info" style="background-color:#daf0f7; height:30px; padding:10px; padding-left:30px; margin-top:0px; margin-left:0px; margin-right:0px; padding-top:5px; border-radius:5px 5px 0px 0px; margin-bottom:20px; font-weight:none"><font style="font-weight:none">Propriétaire du Véhicule/Moto<span class="pull-right badge" style="background-color:#ff66cc;">05</span></font></div>
			<div class="col-sm-12">
			<div class="col-sm-3 form-group">
								<label>Nom du Propriétaire</label>
								<input type="text" name="pnom" class="form-control" value="<?php echo $pnom ?>">
							</div>

		
		<div class="col-sm-3 form-group">
								<label>Adresse (N°)</label>
								<input type="text" name="pno" class="form-control" value="<?php echo $pno ?>">
							</div>

		
		<div class="col-sm-3 form-group">
								<label>Adresse (Avenue)</label>
								<input type="text" name="pavenue" class="form-control" value="<?php echo $pavenue ?>">
							</div>

		
		<div class="col-sm-3 form-group">
								<label>Adresse (Quartier)</label>
								<input type="text" name="pquartier" class="form-control" value="<?php echo $pquartier ?>">
							</div>

		
		<div class="col-sm-3 form-group"><br>
								<label>Adresse (Commune)</label>
								<input type="text" name="pcommune" class="form-control" value="<?php echo $pcommune ?>">
							</div>

							<div class="col-sm-3 form-group"><br>
								<label>Adresse (Ville/Terr)</label>
								<input type="text" name="pville" class="form-control" value="<?php echo $pville ?>">
							</div>
							
							<div class="col-sm-3 form-group"><br>
								<label>Adresse (Secteur)</label>
								<input type="text" name="psecteur" class="form-control" value="<?php echo $psecteur ?>">
							</div>
							
							<div class="col-sm-3 form-group"><br>
								<label>Adresse (Province)</label>
								<input type="text" name="pprovince" class="form-control" value="<?php echo $pprovince ?>">
							</div>

							<div class="col-sm-3 form-group"><br>
								<label>Numero de Contact</label>
								<input type="text" name="pcontact" class="form-control" value="<?php echo $pcontact ?>">
							</div>

							<div class="col-sm-3 form-group"><br>
								<label>Address E-mail</label>
								<input type="text" name="pemail" class="form-control" value="<?php echo $pemail ?>">
							</div>

							<div class="col-sm-3 form-group"><br> </div><div class="row"> </div><br></div></div>
	<?php
}
							if($_SESSION['Page']=='6'){
								if($upda=='0')
									$msg="et le numéro d'enregistrement a été envoyé sur $contact.";
								else
									$msg=".";
	?>
	<div class="widget-container fluid-height clearfix" style="margin-top:0px; border-radius:5px; border:1px solid #daf0f7;">
	<div class="col-sm-12 text-center text-primary" style="height:280px; padding-top:120px;"> 
	Toutes les données ont été enregistrées<?php echo $msg ?></div></div>

	<?php
							}
		?>

	<input type="hidden" name="code" value="<?php echo $code ?>">
   <input type="hidden" name="page" value="<?php echo $_SESSION['Page'] ?>"> 
   
   <div class="row"> </div></form><hr><div class="col-md-6">
    <?php echo $xbt ?>         
   </div>

   <div class="col-md-6">      
    <button class="btn btn-md btn-block btn-info" type="submit" name="sauve" onclick="submitForm();">
	 Continuer &nbsp; <i class="lnr lnr-chevron-right-circle"></i></button>         
   </div></div>
 
 </div></div><br><br></div></div></div>  
   <?php
   include'footer.php';
   ?>