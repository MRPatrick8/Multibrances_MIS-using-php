<?php
	if(isset($_POST['sauve']))
		{
			$nom=str_replace("'", "`", $_POST['nom']);
			$postnom=str_replace("'", "`", $_POST['postnom']);
			$prenom=str_replace("'", "`", $_POST['prenom']);
			$lieu=str_replace("'", "`", $_POST['lieu']);
			$date=$_POST['date'];
			$pere=str_replace("'", "`", $_POST['pere']);
			$pviva=str_replace("'", "`", $_POST['pviva']);
			$mere=str_replace("'", "`", $_POST['mere']);
			$mviva=str_replace("'", "`", $_POST['mviva']);
			$photo=str_replace("'", "`", $_POST['photo']);
			$grandpere=str_replace("'", "`", $_POST['grandpere']);
			$gpviva=str_replace("'", "`", $_POST['gpviva']);
			$grandmere=str_replace("'", "`", $_POST['grandmere']);
			$gmviva=str_replace("'", "`", $_POST['gmviva']);
			$sexe=str_replace("'", "`", $_POST['sexe']);
			$langue=str_replace("'", "`", $_POST['langue']);
			$etude=str_replace("'", "`", $_POST['etude']);
			$civil=str_replace("'", "`", $_POST['civil']);
			$conjoint=str_replace("'", "`", $_POST['conjoint']);
			$cviva=str_replace("'", "`", $_POST['cviva']);
			$enfant=str_replace(',', '', $_POST['enfant']);
			$profession=str_replace("'", "`", $_POST['profession']);
			$permis=str_replace("'", "`", $_POST['permis']);
			$categorie=str_replace("'", "`", $_POST['categorie']);
			$nationalite=str_replace("'", "`", $_POST['nationalite']);
			$pays=str_replace("'", "`", $_POST['pays']);
			$province=str_replace("'", "`", $_POST['province']);
			$territoire=str_replace("'", "`", $_POST['territoire']);
			$secteur=str_replace("'", "`", $_POST['secteur']);
			$collectivite=str_replace("'", "`", $_POST['collectivite']);
			$groupement=str_replace("'", "`", $_POST['groupement']);
			$village=str_replace("'", "`", $_POST['village']);
			$type=str_replace("'", "`", $_POST['type']);
			$idno=str_replace("'", "`", $_POST['idno']);
			$delieu=str_replace("'", "`", $_POST['delieu']);
			$carte=str_replace("'", "`", $_POST['carte']);
			$delivrance=str_replace("'", "`", $_POST['delivrance']);
			$ano=str_replace("'", "`", $_POST['ano']);
			$aavenue=str_replace("'", "`", $_POST['aavenue']);
			$aquartier=str_replace("'", "`", $_POST['aquartier']);
			$acommune=str_replace("'", "`", $_POST['acommune']);
			$aville=str_replace("'", "`", $_POST['aville']);
			$asecteur=str_replace("'", "`", $_POST['asecteur']);
			$aprovince=str_replace("'", "`", $_POST['aprovince']);
			$contact=str_replace("'", "`", $_POST['contact']);
			$email=str_replace("'", "`", $_POST['email']);
			$rnom=str_replace("'", "`", $_POST['rnom']);
			$rlieu=str_replace("'", "`", $_POST['rlieu']);
			$rphone=str_replace("'", "`", $_POST['rphone']);
			$rno=str_replace("'", "`", $_POST['rno']);
			$ravenue=str_replace("'", "`", $_POST['ravenue']);
			$rquartier=str_replace("'", "`", $_POST['rquartier']);
			$rcommune=str_replace("'", "`", $_POST['rcommune']);
			$rville=str_replace("'", "`", $_POST['rville']);
			$rsecteur=str_replace("'", "`", $_POST['rsecteur']);
			$rprovince=str_replace("'", "`", $_POST['rprovince']);
			$marque=str_replace("'", "`", $_POST['marque']);
			$fabrication=str_replace("'", "`", $_POST['fabrication']);
			$chassie=str_replace("'", "`", $_POST['chassie']);
			$couleur=str_replace("'", "`", $_POST['couleur']);
			$plaque=str_replace("'", "`", $_POST['plaque']);
			$pnom=str_replace("'", "`", $_POST['pnom']);
			$pno=str_replace("'", "`", $_POST['pno']);
			$pavenue=str_replace("'", "`", $_POST['pavenue']);
			$pquartier=str_replace("'", "`", $_POST['pquartier']);
			$pville=str_replace("'", "`", $_POST['pville']);
			$psecteur=str_replace("'", "`", $_POST['psecteur']);
			$pprovince=str_replace("'", "`", $_POST['pprovince']);
			$pcontact=str_replace("'", "`", $_POST['pconctact']);
			$pcommune=str_replace("'", "`", $_POST['pcommune']);
			$pemail=str_replace("'", "`", $_POST['pemail']);
			$photo=$_POST['photo'];			
			$code=$_POST['code'];			

$temp = explode(".", $_FILES["photo"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["photo"]["tmp_name"], "files/" . $newfilename);

if(!end($temp))
	$newfilename='';

	if($code!='202cb962ac59075b964b07152d234b70'){
$do = mysqli_query($conn, "INSERT INTO `account` (`nom`, `postnom`, `prenom`, `lieu`, `date`, `pere`, `pviva`, `mere`, `mviva`, `photo`, `grandpere`, `gpviva`, `grandmere`, `gmviva`, `sexe`, `langue`, `etude`, `civil`, `Conjoint`, `cviva`, `enfant`, `profession`, `permis`, `categorie`, `nationalite`, `pays`, `province`, `territoire`, `secteur`, `collectivite`, `groupement`, `village`, `type`, `idno`, `delieu`, `carte`, `delivrance`, `ano`, `aavenue`, `aquartier`, `acommune`, `aville`, `asecteur`, `aprovince`, `contact`, `email`, `rnom`, `rlieu`, `rphone`, `rno`, `ravenue`, `rquartier`, `rcommune`, `rville`, `rsecteur`, `rprovince`, `marque`, `fabrication`, `chassie`, `couleur`, `plaque`, `pnom`, `pno`, `pavenue`, `pquartier`, `pcommune`, `pville`, `psecteur`, `pprovince`, `pcontact`, `pemail` ) VALUES ('$nom', '$postnom', '$prenom', '$lieu', '$date', '$pere', '$pviva', '$mere', '$mviva', '$newfilename', '$grandpere', '$gpviva', '$grandmere', '$gmviva', '$sexe', '$langue', '$etude', '$civil', '$conjoint', '$cviva', '$enfant', '$profession', '$permis', '$categorie', '$nationalite', '$pays', '$province', '$territoire', '$secteur', '$collectivite', '$groupement', '$village', '$type', '$idno', '$delieu', '$carte', '$delivrance', '$ano', '$aavenue', '$aquartier', '$acommune', '$aville', '$asecteur', '$aprovince', '$contact', '$email', '$rnom', '$rlieu', '$rphone', '$rno', '$ravenue', '$rquartier', '$rcommune', '$rville', '$rsecteur', '$rprovince', '$marque', '$fabrication', '$chassie', '$couleur', '$plaque', '$pnom', '$pno', '$pavenue', '$pquartier', '$pcommune', '$pville', '$psecteur', '$pprovince', '$pcontact', '$pemail')");
			$pto=10;	
	$_SESSION['Code'] = mysqli_insert_id($conn);
	}
	else{
$do = mysqli_query($conn, "UPDATE `account` (`nom`, `postnom`, `prenom`, `lieu`, `date`, `pere`, `pviva`, `mere`, `mviva`, `photo`, `grandpere`, `gpviva`, `grandmere`, `gmviva`, `sexe`, `langue`, `etude`, `civil`, `Conjoint`, `cviva`, `enfant`, `profession`, `permis`, `categorie`, `nationalite`, `pays`, `province`, `territoire`, `secteur`, `collectivite`, `groupement`, `village`, `type`, `idno`, `delieu`, `carte`, `delivrance`, `ano`, `aavenue`, `aquartier`, `acommune`, `aville`, `asecteur`, `aprovince`, `contact`, `email`, `rnom`, `rlieu`, `rphone`, `rno`, `ravenue`, `rquartier`, `rcommune`, `rville`, `rsecteur`, `rprovince`, `marque`, `fabrication`, `chassie`, `couleur`, `plaque`, `pnom`, `pno`, `pavenue`, `pquartier`, `pcommune`, `pville`, `psecteur`, `pprovince`, `pcontact`, `pemail` ) VALUES ('$nom', '$postnom', '$prenom', '$lieu', '$date', '$pere', '$pviva', '$mere', '$mviva', '$newfilename', '$grandpere', '$gpviva', '$grandmere', '$gmviva', '$sexe', '$langue', '$etude', '$civil', '$conjoint', '$cviva', '$enfant', '$profession', '$permis', '$categorie', '$nationalite', '$pays', '$province', '$territoire', '$secteur', '$collectivite', '$groupement', '$village', '$type', '$idno', '$delieu', '$carte', '$delivrance', '$ano', '$aavenue', '$aquartier', '$acommune', '$aville', '$asecteur', '$aprovince', '$contact', '$email', '$rnom', '$rlieu', '$rphone', '$rno', '$ravenue', '$rquartier', '$rcommune', '$rville', '$rsecteur', '$rprovince', '$marque', '$fabrication', '$chassie', '$couleur', '$plaque', '$pnom', '$pno', '$pavenue', '$pquartier', '$pcommune', '$pville', '$psecteur', '$pprovince', '$pcontact', '$pemail')");
		$pto=20;
	}
		}
		?>