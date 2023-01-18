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

				
if(isset($_POST['open']))
		{
		$_SESSION['Code']=$_POST['code'];
		}

	if(isset($_POST['cancel']))
		{
		$_SESSION['Code']="202cb962ac59075b964b07152d234b70";
		}
		
		if(isset($_GET['id']))
			{
			$_SESSION['Code']=$_GET['id'];
			}

	include'send_data.php';
	include'fetch_data.php';
?>

 <div class="container-fluid main-content">
<div class="page-title">
<div class="row">
<div class="col-md-6">
<h4 style='margin-top:-10px; margin-bottom: 5px; color:#ffcc33'> </h4>
 <form method="post" class="form-horizontal" name="myform" action="" enctype="multipart/form-data">
</div>
<div class="col-md-6">
 <div class="col-md-5 pull-right" style='text-align:right;'>
 
 </div></div>
</div></div>
  <div class="row">
        <div class="col-md-2">
		<ul class="list-group">
			 			  <li class="list-group-item">
           <a href="plist.php">
           <p>
           <i class="lnr lnr-menu-circle"></i>&nbsp;Liste des participants
           </p></a>
           </li>
           
		                            <li class="list-group-item active">
           <a href="register.php?id=202cb962ac59075b964b07152d234b70">
           <p>
           <i class="lnr lnr-plus-circle"></i>&nbsp;Nouvel participant
           </p></a>
           </li>
                       </ul>
              </div>
            











<script>
$('.datepicker').datepicker({
    format: 'mm-dd-yyyy',
});
</script>

	<div class="col-md-10">  
	
	<?php 
	if($pto==10)
echo"<center><div class='alert alert-danger alert-sm' style='text-align:center; float:center; 
background-color:#60c560; color:#ffffff; border-radius:5px;'><i class='lnr lnr-checkmark-circle'></i> &nbsp;&nbsp; 
		<button class='close' data-dismiss='alert' type='button'>×</button>Le nouveau participant est enregistré correctement. </div></center>";
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
							<label>Lieu De Naissance</label>
							<input type="text" name="lieu" class="form-control" value="<?php echo $lieu ?>">
						</div>
							<div class="col-sm-6 form-group">
								<label>Date de Naissance</label><font size='2' color='red'> * </font>
			<label class="pull-right text-right text-info">YYYY-MM-DD&nbsp;&nbsp;</label>
						<div class="input-group date" data-provide="datepicker">
					<input type="text" name="date" class="form-control text-center" value="<?php echo $date ?>" required>
								<div class="input-group-addon">
								<span class="lnr lnr-calendar-full"></span>
								</div>
						</div></div>
							
							<div class="col-sm-6 form-group">
								<label>Nom du père</label><label class="pull-right text-right text-info">Vivant ?&nbsp;&nbsp;</label>
								<div class="input-group" style="width:100%">
								<input type="text" name="pere" class="form-control" value="<?php echo $pere ?>">
							<div class="input-group-addon" style="padding:0px; margin:0px; width:20%;">
			<select class="form-control" name="pviva" style="border:0px; padding-right:5px; padding-left:5px; height:32px;" required>
			<option value=''> Choisir </option><option value='YES'> &nbsp; YES </option><option value='NO'> &nbsp; NO </option>
                            </select>
								</div>
						</div></div>	
							<div class="col-sm-6 form-group">
								<label>Nom de la mère</label><label class="pull-right text-right text-info">Vivante ?&nbsp;&nbsp;</label>
								<div class="input-group" style="width:100%">
								<input type="text" name="mere" class="form-control" value="<?php echo $mere ?>">
							<div class="input-group-addon" style="padding:0px; margin:0px; width:20%;">
			<select class="form-control" name="mviva" style="border:0px; padding-right:5px; padding-left:5px; height:32px;" required>
			<option value=''> Choisir </option><option value='YES'> &nbsp; YES </option><option value='NO'> &nbsp; NO </option>
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
			<select class="form-control" name="gpviva" style="border:0px; padding-right:5px; padding-left:5px; height:32px;" required>
			<option value=''> Choisir </option><option value='YES'> &nbsp; YES </option><option value='NO'> &nbsp; NO </option>
                            </select>
								</div></div>
							</div>
<div class="col-sm-6 form-group">
								<label>Nom de la grande mère</label><label class="pull-right text-right text-info">Vivante ?&nbsp;&nbsp;</label>
								<div class="input-group" style="width:100%">
								<input type="text" name="grandmere" class="form-control" value="<?php echo $grandmere ?>">
							<div class="input-group-addon" style="padding:0px; margin:0px; width:20%;">
			<select class="form-control" name="gmviva" style="border:0px; padding-right:5px; padding-left:5px; height:32px;" required>
			<option value=''> Choisir </option><option value='YES'> &nbsp; YES </option><option value='NO'> &nbsp; NO </option>
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
								<option value="Marié">Marié</option>
								<option value="Mariée">Mariée</option>
								<option value="Veuve">Veuve</option>
								<option value="Divorcé">Divorcé</option>
								<option value="Mariée">Mariée</option>
								<option value="Célibataire">Célibataire</option>
								</select>
							</div>
			

<div class="col-sm-9 form-group"><br>
								<label>Nom du Conjoint(e)</label><label class="pull-right text-right text-info">Vivant(e) ?&nbsp;&nbsp;</label>
								<div class="input-group" style="width:100%">
								<input type="text" name="conjoint" class="form-control" value="<?php echo $conjoint ?>">
							<div class="input-group-addon" style="padding:0px; margin:0px; width:20%;">
			<select class="form-control" name="cviva" style="border:0px; padding-right:5px; padding-left:5px; height:32px;" required>
			<option value=''> Choisir </option>
		<option value='YES'> &nbsp; YES </option><option value='NO'> &nbsp; NO </option></select>
								</div></div>
							</div>
		<div class="col-sm-3 form-group"><br>
								<label>Nombre d’enfant</label>
								<input type="number" name="enfant" class="form-control" value="<?php echo $enfant ?>">
							</div>

		
		<div class="col-sm-6 form-group"><br>
								<label>Profession</label>
								<input type="text" name="profession" class="form-control" value="<?php echo $profession ?>">
							</div>

		<div class="col-sm-6 form-group"> </div><div class="row"> </div>


							<div class="col-sm-6 form-group"><br>
		<label>N° Permis de conduire</label><font size='2' color='red'> * </font>
		<label class="pull-right text-right text-info">Categorie<font size='2' color='red'> * </font> &nbsp;&nbsp;</label>
								<div class="input-group" style="width:100%">
								<input type="text" name="permis" class="form-control" value="<?php echo $permis ?>" required>
							<div class="input-group-addon" style="padding:0px; margin:0px; width:20%;">
			<select class="form-control" name="categorie" style="border:0px; padding-right:5px; padding-left:5px; height:32px;" required>
		<option value=''> Choisir </option><option value='A'> &nbsp; A </option><option value='B'> &nbsp; B </option>
		<option value='C'> &nbsp; C </option><option value='D'> &nbsp; D </option><option value='E'> &nbsp; E </option>
                            </select>
								</div></div>
							</div>
		<div class="col-sm-6 form-group"> </div><div class="row"> </div></div><br></div>



 <div class="widget-container fluid-height clearfix" style="margin-top:30px; border-radius:5px; border:1px solid #daf0f7;">

 <div class="heading text-info" style="background-color:#daf0f7; height:30px; padding:10px; padding-left:30px; margin-top:0px; margin-left:0px; margin-right:0px; padding-top:5px; border-radius:5px 5px 0px 0px; margin-bottom:20px; font-weight:none"><font style="font-weight:none">Autre details<span class="pull-right badge" style="background-color:#ff66cc;">02</span></font></div>
		<div class="col-md-12">

		
		<div class="col-sm-6 form-group"><br>
								<label>Nationalité</label><font size='2' color='red'> * </font>
								<input type="text" name="nationalite" class="form-control" value="<?php echo $nationalite ?>" required>
							</div>

		
		<div class="col-sm-6 form-group"><br>
								<label>Pays d’origine</label>
								<input type="text" name="pays" class="form-control" value="<?php echo $pays ?>">
							</div>
 
		 <div class="col-sm-6 form-group"><br>
								<label>Province d’origine</label>
								<input type="text" name="province" class="form-control" value="<?php echo $province ?>">
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
								<label>Adresse résidentielle (Ville/Terr)</label><font size='2' color='red'> * </font>
								<input type="text" name="aville" class="form-control" value="<?php echo $aville ?>" required>
							</div>
							
							<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (Secteur)</label>
								<input type="text" name="asecteur" class="form-control" value="<?php echo $asecteur ?>">
							</div>
							
							<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (Province)</label>
								<input type="text" name="aprovince" class="form-control" value="<?php echo $aprovince ?>">
							</div>

							<div class="col-sm-3 form-group"><br> </div><div class=""> </div>
		
 
		 <div class="col-sm-6 form-group"><br>
								<label>Contact du Transporteur</label><font size='2' color='red'> * </font>
								<input type="text" name="contact" class="form-control" value="<?php echo $contact ?>" required>
							</div>

		
		<div class="col-sm-6 form-group"><br>
								<label>Email du Transporteur</label>
								<input type="text" name="email" class="form-control" value="<?php echo $email ?>">
							</div><div class="row"> </div></div><br></div>

			<div class="widget-container fluid-height clearfix" style="margin-top:30px; border-radius:5px; border:1px solid #daf0f7;">

		<div class="heading text-info" style="background-color:#daf0f7; height:30px; padding:10px; padding-left:30px; margin-top:0px; margin-left:0px; margin-right:0px; padding-top:5px; border-radius:5px 5px 0px 0px; margin-bottom:20px; font-weight:none"><font style="font-weight:none">Personne de référence en cas de besoin<span class="pull-right badge" style="background-color:#ff66cc;">03</span></font></div>
			<div class="col-sm-12">
 
		 <div class="col-sm-4 form-group"><br>
								<label>Nom du Personne</label>
								<input type="text" name="rnom" class="form-control" value="<?php echo $rnom ?>">
							</div>

		
		<div class="col-sm-4 form-group"><br>
								<label>Lieu</label>
								<input type="text" name="rlieu" class="form-control" value="<?php echo $rlieu ?>">
							</div>

		
		<div class="col-sm-4 form-group"><br>
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

	<div class="widget-container fluid-height clearfix" style="margin-top:30px; border-radius:5px;">
		 <div class="heading text-info" style="background-color:#daf0f7; height:30px; padding:10px; padding-left:30px; margin-top:0px; margin-left:0px; margin-right:0px; padding-top:5px; border-radius:5px 5px 0px 0px; margin-bottom:20px; font-weight:none"><font style="font-weight:none">Identification du Véhicule<span class="pull-right badge" style="background-color:#ff66cc;">04</span></font></div>

		<div class="col-sm-12"><div class="col-sm-4 form-group"><br>
								<label>Marque du Véhicule</label>
								<input type="text" name="marque" class="form-control" value="<?php echo $marque ?>">
							</div>

		
		<div class="col-sm-4 form-group"><br>
								<label>Date de fabrication</label>
								<input type="text" name="fabrication" class="form-control" value="<?php echo $fabrication ?>">
							</div>

		
		<div class="col-sm-4 form-group"><br>
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

	<div class="widget-container fluid-height clearfix" style="margin-top:30px; border-radius:5px; border:1px solid #daf0f7;">

	<div class="heading text-info" style="background-color:#daf0f7; height:30px; padding:10px; padding-left:30px; margin-top:0px; margin-left:0px; margin-right:0px; padding-top:5px; border-radius:5px 5px 0px 0px; margin-bottom:20px; font-weight:none"><font style="font-weight:none">Propriétaire du Véhicule<span class="pull-right badge" style="background-color:#ff66cc;">05</span></font></div>

			<div class="col-sm-3 form-group"><br>
								<label>Nom du Propriétaire</label>
								<input type="text" name="pnom" class="form-control" value="<?php echo $pnom ?>">
							</div>

		
		<div class="col-sm-3 form-group"><br>
								<label>Adresse (N°)</label>
								<input type="text" name="pno" class="form-control" value="<?php echo $pno ?>">
							</div>

		
		<div class="col-sm-3 form-group"><br>
								<label>Adresse (Avenue)</label>
								<input type="text" name="pavenue" class="form-control" value="<?php echo $pavenue ?>">
							</div>

		
		<div class="col-sm-3 form-group"><br>
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

							<div class="col-sm-3 form-group"><br> </div><div class="row"> </div>


 <div class=""> </div>
	<?php
		$code = $_SESSION['Code'];
		?>
		</div><input type="hidden" name="code" value="<?php echo $code ?>"><hr>
   <div class="form-group">
   <div class="col-md-6">      
    <button class="btn btn-lg btn-block btn-danger" type="submit" name="cancel">
	 <i class="lnr lnr-chevron-left-circle"></i> &nbsp; Cancel </button>         
   </div>
   <div class="col-md-6">      
    <button class="btn btn-lg btn-block btn-info" type="submit" name="sauve">
	 Continuer &nbsp; <i class="lnr lnr-checkmark-circle"></i></button>         
   </div>
 </div>
 
 </form></div></div><br><br></div></div></div>  
   <?php
   include'footer.php';
   /*
   $do = mysqli_query($conn, "INSERT INTO `account` (`nom`, `postnom`, `prenom`, `lieu`, `date`, `pere`, `pviva`, `mere`, `mviva`, `photo`, `grandpere`, `gpviva`, `grandmere`, `gmviva`, `sexe`, `langue`, `etude`, `civil`, `Conjoint`, `cviva`, `enfant`, `profession`, `permis`, `categorie`, `nationalite`, `pays`, `province`, `territoire`, `secteur`, `collectivite`, `groupement`, `village`, `type`, `idno`, `delieu`, `carte`, `delivrance`, `ano`, `aavenue`, `aquartier`, `acommune`, `aville`, `asecteur`, `aprovince`, `contact`, `email`, `rnom`, `rlieu`, `rphone`, `rno`, `ravenue`, `rquartier`, `rcommune`, `rville`, `rsecteur`, `rprovince`, `marque`, `fabrication`, `chassie`, `couleur`, `plaque`, `pnom`, `pno`, `pavenue`, `pquartier`, `pcommune`, `pville`, `psecteur`, `pprovince`, `pcontact`, `pemail`) VALUES ('$nom', '$postnom', '$prenom', '$lieu', '$date', '$pere', '$pviva', '$mere', '$mviva', '$newfilename', '$grandpere', '$gpviva', '$grandmere', '$gmviva', '$sexe', '$langue', '$etude', '$civil', '$conjoint', '$cviva', '$enfant', '$profession', '$permis', '$categorie', '$nationalite', '$pays', '$province', '$territoire', '$secteur', '$collectivite', '$groupement', '$village', '$type', '$idno', '$delieu', '$carte', '$delivrance', '$ano', '$aavenue', '$aquartier', '$acommune', '$aville', '$asecteur', '$aprovince', '$contact', '$email', '$rnom', '$rlieu', '$rphone', '$rno', '$ravenue', '$rquartier', '$rcommune', '$rville', '$rsecteur', '$rprovince', '$marque', '$fabrication', '$chassie', '$couleur', '$plaque', '$pnom', '$pno', '$pavenue', '$pquartier', '$pcommune', '$pville', '$psecteur', '$pprovince', '$pcontact', '$pemail')");
   */
   ?>