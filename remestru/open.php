<?php
if(basename($_SERVER['PHP_SELF']) == 'open.php'){
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
		$page = $_POST['page'];
		}

	if(isset($_POST['cancel']))
		{
		$_SESSION['Code']="202cb962ac59075b964b07152d234b70";
		}
		
		if(isset($_GET['id']))
			{
			$_SESSION['Code']=$_GET['id'];
			}

	include'fetch_data.php';
?>

 <div class="container-fluid main-content">
<div class="page-title">
<div class="row">
</div></div>
  <div class="row">
        <div class="col-md-2">
		<ul class="list-group">
		<?php
			if($page=='1'){
				$ret="window.location.href='plist.php'";
				?>
			
		          <li class="list-group-item">
           <a href="register.php?id=202cb962ac59075b964b07152d234b70">
           <p>
           <i class="lnr lnr-plus-circle"></i>&nbsp;Nouvel participant
           </p></a>
           </li>
			 			  <li class="list-group-item active">
           <a href="plist.php">
           <p>
           <i class="lnr lnr-menu-circle"></i>&nbsp;Liste des participants
           </p></a>
           </li>
           
		   <?php
			if($_SESSION['Approe'])
				{
				?>
 <li class="list-group-item">
           <a href="approval.php">
           <p>
           <i class="lnr lnr-plus-circle"></i>&nbsp;Processus d'approuver
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
		   <?php
 }
				else{
				$ret="window.location.href='partrepo.php'";
				?>
				<li class="list-group-item active">
           <a href="partrepo.php?id=202cb962ac59075b964b07152d234b70">
           <p>
           <i class="lnr lnr-plus-circle"></i>&nbsp;Rapport de Participants
           </p></a>
           </li>
		   <li class="list-group-item">
           <a href="regrepo.php" style="font-size:13px;">
           <p>
           <i class="lnr lnr-menu-circle"></i>&nbsp;Rapport d`Enregistrement
           </p></a>
           </li>
			 			  <li class="list-group-item">
           <a href="#">
           <p>
           <i class="lnr lnr-menu-circle"></i>&nbsp;Rapport d`Approbation
           </p></a>
           </li>

 <li class="list-group-item">
           <a href="cardrepo.php">
           <p>
           <i class="lnr lnr-menu-circle"></i>&nbsp;Rapport de Cartes
           </p></a>
           </li>
		   <?php
		   }
		   ?>
                       </ul>
              </div>
            











<script>
$('.datepicker').datepicker({
    format: 'mm-dd-yyyy',
});
</script>

	 
<?php
		$code = $_SESSION['Code'];

		 
			if($_SESSION['Approe']){
				$dx="";
				$bx="info";
				$dxu="data-placement='top' data-toggle='modal' data-target='#exampleModals'";
			}
			else{
				$dx="disabled";
				$bx="default";
				$dxu="";
			}
			if($_SESSION['Ecancel']){
				$dxi="data-placement='top' data-toggle='modal' data-target='#exampleModal'";
				$bxi="danger";
			}
			else{
				$dxi="disabled";
				$bxi="default";
			}
			if(!$aville){
				$dx="disabled";
				$bx="default";
			}


				
 echo"<div class='modal fade' id='exampleModals' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' 
	aria-hidden='true' style='top:40px;'><div class='modal-dialog' role='document'>
		<div class='modal-content'><div class='modal-header text-left'>
        <h5 class='modal-title' id='exampleModalLabel'>Copie de la Carte
		<span class='pull-right'><b> ($nom $postnom $prenom) <b></span></h5>

      </div><form action='payment.php' method='post'>
      <div class='modal-body text-left' style='height:160px;'>
        <h5 style='color:#0000cc'>Notez la raison pour laquelle la carte doit être réimprimée</h5>
		<textarea class='form-control' rows='3' name='reason'></textarea>
      </div><input type='hidden' name='rowid' value='$code'><input type='hidden' name='ville' value='$aville'>
      <div class='modal-header' style='margin-top:-10px; height:50px; padding-top:10px; text-align:right; border:0px solid blue;'>
        <button type='button' class='btn btn-sm btn-warning' data-dismiss='modal' style='width:100px;'> Annuler </button>
        <button type='submit' name='copie' class='btn btn-sm btn-success' style='width:100px;'> Sauvegarder </button>
      </div></form>
    </div>
  </div>
</div>";
		?>
  <div class="col-md-10 form-group" style="padding-left:0px; padding-right:0px; padding-top:20px; margin-bottom:20px;">
   <div class="col-md-4">      
    <button class="btn btn-sm btn-block btn-warning" type="button" onclick="<?php echo $ret ?>">
	 <i class="lnr lnr-chevron-left-circle"></i> &nbsp; Retourner </button>         
   </div>
   <div class="col-md-4">
    <button class="btn btn-sm btn-block btn-default" type="button" <?php echo" $dx $dxu"; ?>> 
	&nbsp; <i class="lnr lnr-printer"></i> &nbsp; Copie de la Carte </button>         
   </div>
   <div class="col-md-4">      
    <button class="btn btn-sm btn-block btn-<?php echo $bxi ?>" type="button"  <?php echo $dxi ?>>
	<i class="lnr lnr-cross-circle"></i> &nbsp; Soupprimer </button>         
   </div></div><div class="col-md-10">
	
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
								<input type="text" readonly readonly name="nom" class="form-control" value="<?php echo $nom ?>" required>
							</div>
							<div class="col-sm-3 form-group">
								<label>Post-Nom</label>
								<input type="text" readonly readonly name="postnom" class="form-control" value="<?php echo $postnom ?>">
							</div>
							<div class="col-sm-4 form-group">
								<label>Prénom</label><font size='2' color='red'> * </font>
								<input type="text" readonly readonly name="prenom" class="form-control" value="<?php echo $prenom ?>" required>
							</div>
						
						<div class="col-sm-6 form-group">
							<label>Lieu De Naissance</label>
							<input type="text" readonly readonly name="lieu" class="form-control" value="<?php echo $lieu ?>">
						</div>
							<div class="col-sm-6 form-group">
								<label>Date de Naissance</label><font size='2' color='red'> * </font>
			<label class="pull-right text-right text-info">YYYY-MM-DD&nbsp;&nbsp;</label>
						<div class="input-group date" data-provide="datepicker">
					<input type="text" readonly name="date" class="form-control text-center" value="<?php echo $date ?>" required>
								<div class="input-group-addon">
								<span class="lnr lnr-calendar-full"></span>
								</div>
						</div></div>
							
							<div class="col-sm-6 form-group">
								<label>Nom du père</label><label class="pull-right text-right text-info">Vivant ?&nbsp;&nbsp;</label>
								<div class="input-group" style="width:100%">
								<input type="text" readonly name="pere" class="form-control" value="<?php echo $pere ?>">
							<div class="input-group-addon" style="padding:0px; margin:0px; width:20%;">
			<select class="form-control" name="pviva" style="border:0px; padding-right:5px; padding-left:5px; height:32px;" required>
			<option value=''> Choisir </option><option value='YES'> &nbsp; YES </option><option value='NO'> &nbsp; NO </option>
                            </select>
								</div>
						</div></div>	
							<div class="col-sm-6 form-group">
								<label>Nom de la mère</label><label class="pull-right text-right text-info">Vivante ?&nbsp;&nbsp;</label>
								<div class="input-group" style="width:100%">
								<input type="text" readonly name="mere" class="form-control" value="<?php echo $mere ?>">
							<div class="input-group-addon" style="padding:0px; margin:0px; width:20%;">
			<select class="form-control" name="mviva" style="border:0px; padding-right:5px; padding-left:5px; height:32px;" required>
			<option value=''> Choisir </option><option value='YES'> &nbsp; YES </option><option value='NO'> &nbsp; NO </option>
                            </select>
								</div></div>
							</div>	



							</div>
						<div class="col-md-3 text-center">

		<div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new img-thumbnail" style="width: 250px; height: 200px;">
                  <img src="<?php echo $photo ?>">
                </div>
                <div class="fileupload-preview fileupload-exists img-thumbnail" style="width: 200px; max-height: 150px;"></div>
                <div>

                </div></div>
			</div>
			<div class="row"></div>					

<div class="col-sm-12 form-group">
<div class="col-sm-9" style="margin:0px; padding:0px;">
<div class="col-sm-6 form-group">
								<label>Nom du grand père</label><label class="pull-right text-right text-info">Vivant ?&nbsp;&nbsp;</label>
								<div class="input-group" style="width:100%">
								<input type="text" readonly name="grandpere" class="form-control" value="<?php echo $grandpere ?>">
							<div class="input-group-addon" style="padding:0px; margin:0px; width:20%;">
			<select class="form-control" name="gpviva" style="border:0px; padding-right:5px; padding-left:5px; height:32px;" required>
			<option value=''> Choisir </option><option value='YES'> &nbsp; YES </option><option value='NO'> &nbsp; NO </option>
                            </select>
								</div></div>
							</div>
<div class="col-sm-6 form-group">
								<label>Nom de la grande mère</label><label class="pull-right text-right text-info">Vivante ?&nbsp;&nbsp;</label>
								<div class="input-group" style="width:100%">
								<input type="text" readonly name="grandmere" class="form-control" value="<?php echo $grandmere ?>">
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
								<input type="text" readonly name="langue" class="form-control" value="<?php echo $langue ?>">
							</div>
							<div class="col-sm-6 form-group">
								<br><label>Etude Faite</label>
								<input type="text" readonly name="etude" class="form-control" value="<?php echo $etude ?>">
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
								<input type="text" readonly name="conjoint" class="form-control" value="<?php echo $conjoint ?>">
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
								<input type="text" readonly name="profession" class="form-control" value="<?php echo $profession ?>">
							</div>

		<div class="col-sm-6 form-group"> </div><div class="row"> </div>


							<div class="col-sm-6 form-group"><br>
		<label>N° Permis de conduire</label><font size='2' color='red'> * </font>
		<label class="pull-right text-right text-info">Categorie<font size='2' color='red'> * </font> &nbsp;&nbsp;</label>
								<div class="input-group" style="width:100%">
								<input type="text" readonly name="permis" class="form-control" value="<?php echo $permis ?>" required>
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
								<input type="text" readonly name="nationalite" class="form-control" value="<?php echo $nationalite ?>" required>
							</div>

		
		<div class="col-sm-6 form-group"><br>
								<label>Pays d’origine</label>
								<input type="text" readonly name="pays" class="form-control" value="<?php echo $pays ?>">
							</div>
 
		 <div class="col-sm-6 form-group"><br>
								<label>Province d’origine</label>
								<input type="text" readonly name="province" class="form-control" value="<?php echo $province ?>">
							</div>

		
		<div class="col-sm-6 form-group"><br>
								<label>Territoire d’origine</label>
								<input type="text" readonly name="territoire" class="form-control" value="<?php echo $territoire ?>">
							</div>
		
 
		 <div class="col-sm-6 form-group"><br>
								<label>Secteur/Chefferie d’origine</label>
								<input type="text" readonly name="secteur" class="form-control" value="<?php echo $secteur ?>">
							</div>

		
		<div class="col-sm-6 form-group"><br>
								<label>Collectivité</label>
								<input type="text" readonly name="collectivite" class="form-control" value="<?php echo $collectivite ?>">
							</div>
		
 
		 <div class="col-sm-6 form-group"><br>
								<label>Groupement</label>
								<input type="text" readonly name="groupement" class="form-control" value="<?php echo $groupement ?>">
							</div>

		
		<div class="col-sm-6 form-group"><br>
								<label>Village d’origine</label>
			<input type="text" readonly name="village" class="form-control" value="<?php echo $village ?>" OnKeyup="return cUpper(this);">
							</div>

		
		<div class="col-sm-4 form-group"><br>
								<label>Type pièce d’identité</label>
								<input type="text" readonly name="type" class="form-control" value="<?php echo $type ?>">
							</div>

		
		<div class="col-sm-4 form-group"><br>
								<label>N° ID National</label><font size='2' color='red'> * </font>
								<input type="text" readonly name="idno" class="form-control" value="<?php echo $idno ?>" required>
							</div>

		
		<div class="col-sm-4 form-group"><br>
								<label>Lieu de délivrance</label>
								<input type="text" readonly name="delieu" class="form-control" value="<?php echo $delieu ?>">
							</div>
		
 
		 <div class="col-sm-6 form-group"><br>
								<label>Numéro Carte de Résidence (Etranger)</label>
								<input type="text" readonly name="carte" class="form-control" value="<?php echo $carte ?>">
							</div>

		
		<div class="col-sm-6 form-group"><br>
								<label>Lieu de délivrance</label>
								<input type="text" readonly name="delivrance" class="form-control" value="<?php echo $delivrance ?>">
							</div>

		
		<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (No)</label>
								<input type="text" readonly name="ano" class="form-control" value="<?php echo $ano ?>">
							</div>

		
		<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (Avenue)</label>
								<input type="text" readonly name="aavenue" class="form-control" value="<?php echo $aavenue ?>">
							</div>

		
		<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (Quartier)</label>
								<input type="text" readonly name="aquartier" class="form-control" value="<?php echo $aquartier ?>">
							</div>

		
		<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (Commune)</label>
								<input type="text" readonly name="acommune" class="form-control" value="<?php echo $acommune ?>">
							</div>
				<?php
			if(!$aville){
				$brd="style='background-color:#f7e8da; border:1px solid red;'";
			}
			else
				$brd="";
			?>
							<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (Ville/Terr)</label><font size='2' color='red'> * </font>
								<input type="text" readonly name="aville" class="form-control" value="<?php echo $aville ?>" <?php echo $brd ?> required>
							</div>
							
							<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (Secteur)</label>
								<input type="text" readonly name="asecteur" class="form-control" value="<?php echo $asecteur ?>">
							</div>
							
							<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (Province)</label>
								<input type="text" readonly name="aprovince" class="form-control" value="<?php echo $aprovince ?>">
							</div>

							<div class="col-sm-3 form-group"><br> </div><div class=""> </div>
		
 
		 <div class="col-sm-6 form-group"><br>
								<label>Contact du Transporteur</label><font size='2' color='red'> * </font>
								<input type="text" readonly name="contact" class="form-control" value="<?php echo $contact ?>" required>
							</div>

		
		<div class="col-sm-6 form-group"><br>
								<label>Email du Transporteur</label>
								<input type="text" readonly name="email" class="form-control" value="<?php echo $email ?>">
							</div><div class="row"> </div></div><br></div>

			<div class="widget-container fluid-height clearfix" style="margin-top:30px; border-radius:5px; border:1px solid #daf0f7;">

		<div class="heading text-info" style="background-color:#daf0f7; height:30px; padding:10px; padding-left:30px; margin-top:0px; margin-left:0px; margin-right:0px; padding-top:5px; border-radius:5px 5px 0px 0px; margin-bottom:20px; font-weight:none"><font style="font-weight:none">Personne de référence en cas de besoin<span class="pull-right badge" style="background-color:#ff66cc;">03</span></font></div>
			<div class="col-sm-12">
 
		 <div class="col-sm-4 form-group"><br>
								<label>Nom du Personne</label>
								<input type="text" readonly name="rnom" class="form-control" value="<?php echo $rnom ?>">
							</div>

		
		<div class="col-sm-4 form-group"><br>
								<label>Lieu de naissance</label>
								<input type="text" readonly name="rlieu" class="form-control" value="<?php echo $rlieu ?>">
							</div>

		
		<div class="col-sm-4 form-group"><br>
								<label>N° Téléphone</label>
								<input type="text" readonly name="rphone" class="form-control" value="<?php echo $rphone ?>">
							</div>


		<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (No)</label>
								<input type="text" readonly name="rno" class="form-control" value="<?php echo $rno ?>">
							</div>

		
		<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (Avenue)</label>
								<input type="text" readonly name="ravenue" class="form-control" value="<?php echo $ravenue ?>">
							</div>

		
		<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (Quartier)</label>
								<input type="text" readonly name="rquartier" class="form-control" value="<?php echo $rquartier ?>">
							</div>

		
		<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (Commune)</label>
								<input type="text" readonly name="rcommune" class="form-control" value="<?php echo $rcommune ?>">
							</div>

			
							<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (Ville/Terr)</label>
								<input type="text" readonly name="rville" class="form-control" value="<?php echo $rville ?>">
							</div>
							
							<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (Secteur)</label>
								<input type="text" readonly name="rsecteur" class="form-control" value="<?php echo $rsecteur ?>">
							</div>
							
							<div class="col-sm-3 form-group"><br>
								<label>Adresse résidentielle (Province)</label>
								<input type="text" readonly name="rprovince" class="form-control" value="<?php echo $rprovince ?>">
							</div>

							<div class="col-sm-3 form-group"><br> </div><div class="row"> </div><br></div></div>

	<div class="widget-container fluid-height clearfix" style="margin-top:30px; border-radius:5px;">
		 <div class="heading text-info" style="background-color:#daf0f7; height:30px; padding:10px; padding-left:30px; margin-top:0px; margin-left:0px; margin-right:0px; padding-top:5px; border-radius:5px 5px 0px 0px; margin-bottom:20px; font-weight:none"><font style="font-weight:none">Identification du Véhicule<span class="pull-right badge" style="background-color:#ff66cc;">04</span></font></div>

		<div class="col-sm-12"><div class="col-sm-4 form-group"><br>
								<label>Marque du Véhicule</label>
								<input type="text" readonly name="marque" class="form-control" value="<?php echo $marque ?>">
							</div>

		
		<div class="col-sm-4 form-group"><br>
								<label>Date de fabrication</label>
								<input type="text" readonly name="fabrication" class="form-control" value="<?php echo $fabrication ?>">
							</div>

		
		<div class="col-sm-4 form-group"><br>
								<label>N° Chassie</label>
								<input type="text" readonly name="chassie" class="form-control" value="<?php echo $chassie ?>">
							</div>

		
		<div class="col-sm-4 form-group"><br>
								<label>Couleur</label>
								<input type="text" readonly name="couleur" class="form-control" value="<?php echo $couleur ?>">
							</div>

							<div class="col-sm-4 form-group"><br>
								<label>N° Plaque d’immatriculation</label>
								<input type="text" readonly name="plaque" class="form-control" value="<?php echo $plaque ?>">
							</div>
							
							<div class="col-sm-4 form-group"><br> </div><div class="row"> </div><br></div></div>

	<div class="widget-container fluid-height clearfix" style="margin-top:30px; border-radius:5px; border:1px solid #daf0f7;">

	<div class="heading text-info" style="background-color:#daf0f7; height:30px; padding:10px; padding-left:30px; margin-top:0px; margin-left:0px; margin-right:0px; padding-top:5px; border-radius:5px 5px 0px 0px; margin-bottom:20px; font-weight:none"><font style="font-weight:none">Propriétaire du Véhicule<span class="pull-right badge" style="background-color:#ff66cc;">05</span></font></div>

			<div class="col-sm-3 form-group"><br>
								<label>Nom du Propriétaire</label>
								<input type="text" readonly name="pnom" class="form-control" value="<?php echo $pnom ?>">
							</div>

		
		<div class="col-sm-3 form-group"><br>
								<label>Adresse (N°)</label>
								<input type="text" readonly name="pno" class="form-control" value="<?php echo $pno ?>">
							</div>

		
		<div class="col-sm-3 form-group"><br>
								<label>Adresse (Avenue)</label>
								<input type="text" readonly name="pavenue" class="form-control" value="<?php echo $pavenue ?>">
							</div>

		
		<div class="col-sm-3 form-group"><br>
								<label>Adresse (Quartier)</label>
								<input type="text" readonly name="pquartier" class="form-control" value="<?php echo $pquartier ?>">
							</div>

		
		<div class="col-sm-3 form-group"><br>
								<label>Adresse (Commune)</label>
								<input type="text" readonly name="pcommune" class="form-control" value="<?php echo $pcommune ?>">
							</div>

							<div class="col-sm-3 form-group"><br>
								<label>Adresse (Ville/Terr)</label>
								<input type="text" readonly name="pville" class="form-control" value="<?php echo $pville ?>">
							</div>
							
							<div class="col-sm-3 form-group"><br>
								<label>Adresse (Secteur)</label>
								<input type="text" readonly name="psecteur" class="form-control" value="<?php echo $psecteur ?>">
							</div>
							
							<div class="col-sm-3 form-group"><br>
								<label>Adresse (Province)</label>
								<input type="text" readonly name="pprovince" class="form-control" value="<?php echo $pprovince ?>">
							</div>

							<div class="col-sm-3 form-group"><br>
								<label>Numero de Contact</label>
								<input type="text" readonly name="pcontact" class="form-control" value="<?php echo $pcontact ?>">
							</div>

							<div class="col-sm-3 form-group"><br>
								<label>Address E-mail</label>
								<input type="text" readonly name="pemail" class="form-control" value="<?php echo $pemail ?>">
							</div>

							<div class="col-sm-3 form-group"><br> </div><div class="row"> </div>


 <div class=""> </div>
	
		</div><input type="hidden" name="code" value="<?php echo $code ?>"><hr>
  
 <div class="form-group">
   <div class="col-md-4">      
    <button class="btn btn-sm btn-block btn-warning" type="button" onclick="<?php echo $ret ?>">
	 <i class="lnr lnr-chevron-left-circle"></i> &nbsp; Retourner </button>         
   </div>
   <form action="payment.php" method="post"><div class="col-md-4">
   <?php echo"<input type='hidden' name='rowid' value='$code'><input type='hidden' name='ville' value='$aville' required>"; ?>
    <button class="btn btn-sm btn-block btn-default" type="submit" name="copie" <?php echo $dx ?>> 
	&nbsp; <i class="lnr lnr-printer"></i> &nbsp; Copie de la Carte </button>         
   </div></form>
   <div class="col-md-4">      
    <button class="btn btn-sm btn-block btn-<?php echo $bxi ?>" type="button"  <?php echo $dxi ?>>
	<i class="lnr lnr-cross-circle"></i> &nbsp; Soupprimer </button>         
   </div>
 </div>
 </form></div></div><br>
 
 <?php
 echo"<div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' 
	aria-hidden='true' style='top:40px;'><div class='modal-dialog' role='document'>
		<div class='modal-content'><div class='modal-header text-left'>
        <h5 class='modal-title' id='exampleModalLabel'>Confirmation de la suppression 
		<span class='pull-right'><b> ($nom $postnom $prenom) <b></span></h5>

      </div><form action='plist.php' method='post'>
      <div class='modal-body text-left' style='height:40px;'>
        <h5 style='color:#ff0033'>Êtes-vous sûr de vouloir supprimer ce participant ?</h5>
      </div><input type='hidden' name='rowid' value='$code'>
      <div class='modal-footer' style='margin-top:-10px; height:50px; padding-top:5px; border:0px solid blue;'>
        <button type='button' class='btn btn-sm btn-success' data-dismiss='modal'>&nbsp;NO&nbsp;</button>
        <button type='submit' name='delo' class='btn btn-sm btn-danger'>OUI</button>
      </div></form>
    </div>
  </div>
</div>";
?>
 

 
 <br></div></div></div>  
   <?php
   include'footer.php';
   /*
   $do = mysqli_query($conn, "INSERT INTO `account` (`nom`, `postnom`, `prenom`, `lieu`, `date`, `pere`, `pviva`, `mere`, `mviva`, `photo`, `grandpere`, `gpviva`, `grandmere`, `gmviva`, `sexe`, `langue`, `etude`, `civil`, `conjoint`, `cviva`, `enfant`, `profession`, `permis`, `cata`, `catb`, `catc`, `catd`, `cate`, `nationalite`, `pays`, `province`, `territoire`, `secteur`, `collectivite`, `groupement`, `village`, `type`, `idno`, `delieu`, `carte`, `delivrance`, `ano`, `aavenue`, `aquartier`, `acommune`, `aville`, `asecteur`, `aprovince`, `contact`, `email`, `rnom`, `rlieu`, `rphone`, `rno`, `ravenue`, `rquartier`, `rcommune`, `rville`, `rsecteur`, `rprovince`, `marque`, `fabrication`, `chassie`, `couleur`, `plaque`, `pnom`, `pno`, `pavenue`, `pquartier`, `pcommune`, `pville`, `psecteur`, `pprovince`, `pcontact`, `pemail`) VALUES ('$nom', '$postnom', '$prenom', '$lieu', '$date', '$pere', '$pviva', '$mere', '$mviva', '$newfilename', '$grandpere', '$gpviva', '$grandmere', '$gmviva', '$sexe', '$langue', '$etude', '$civil', '$conjoint', '$cviva', '$enfant', '$profession', '$permis', '$cata', '$catb', '$catc', '$catd', '$cate', '$nationalite', '$pays', '$province', '$territoire', '$secteur', '$collectivite', '$groupement', '$village', '$type', '$idno', '$delieu', '$carte', '$delivrance', '$ano', '$aavenue', '$aquartier', '$acommune', '$aville', '$asecteur', '$aprovince', '$contact', '$email', '$rnom', '$rlieu', '$rphone', '$rno', '$ravenue', '$rquartier', '$rcommune', '$rville', '$rsecteur', '$rprovince', '$marque', '$fabrication', '$chassie', '$couleur', '$plaque', '$pnom', '$pno', '$pavenue', '$pquartier', '$pcommune', '$pville', '$psecteur', '$pprovince', '$pcontact', '$pemail')");
   */
   ?>