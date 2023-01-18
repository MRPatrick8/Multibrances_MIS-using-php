<?php
	if(isset($_POST['sauve']))
		{
			$nom=str_replace("'", "`", $_POST['nom']);
			$postnom=str_replace("'", "`", $_POST['postnom']);
			$prenom=str_replace("'", "`", $_POST['prenom']);
			$lieu=str_replace("'", "`", $_POST['lieu']);
			$date=date("Y-m-d", strtotime($_POST['date']));
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
			$cata=str_replace("'", "`", $_POST['cata']);
			$catb=str_replace("'", "`", $_POST['catb']);
			$catc=str_replace("'", "`", $_POST['catc']);
			$catd=str_replace("'", "`", $_POST['catd']);
			$cate=str_replace("'", "`", $_POST['cate']);
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
			$code=$_POST['code'];			

$temp = explode(".", $_FILES["photo"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["photo"]["tmp_name"], "files/" . $newfilename);
	if(!end($temp))
		$newfilename='';

	if(!$loge)
		$loge="SELF";

	if($code=='202cb962ac59075b964b07152d234b70'){
$do = mysqli_query($conn, "INSERT INTO `account` (`nom`, `postnom`, `prenom`, `lieu`, `date`, `pere`, `pviva`, `mere`, `mviva`, `photo`, `grandpere`, `gpviva`, `grandmere`, `gmviva`, `sexe`, `langue`, `etude`, `civil`, `conjoint`, `cviva`, `enfant`, `profession`, `permis`, `cata`, `catb`, `catc`, `catd`, `cate`, `aville`, `Status`, `Rdate`, `Time`, `User`, `Cdate`) VALUES ('$nom', '$postnom', '$prenom', '$lieu', '$date', '$pere', '$pviva', '$mere', '$mviva', '$newfilename', '$grandpere', '$gpviva', '$grandmere', '$gmviva', '$sexe', '$langue', '$etude', '$civil', '$conjoint', '$cviva', '$enfant', '$profession', '$permis', '$cata', '$catb', '$catc', '$cate', '$catd', '$aville', '2', '$Date', '$Time', '$loge', '$Date')");
	$_SESSION['Code'] = mysqli_insert_id($conn);
	$_SESSION['Page'] = $_POST['page'] + 1;
			$pto=10;
			
			$rowid=$_SESSION['Code'];
	$sk=mysqli_query($conn, "SELECT `Code`, `Amount` FROM `villes` WHERE `Ville`='$aville' ORDER BY `Ville` ASC");
		$rk=mysqli_fetch_assoc($sk);
			$ecode=str_pad($rowid, 5, '0', STR_PAD_LEFT);
				$acode=$rk['Code'];
				$amo=$rk['Amount'];
				$acode="$acode$ecode";

	$do=mysqli_query($conn, "UPDATE `account` SET `Code`='$acode', `Amount`='$amo' WHERE `Status`='2' AND `Number`='$rowid' ORDER BY `Number` DESC LIMIT 1");
			
	}
	elseif($code!='202cb962ac59075b964b07152d234b70' AND $_POST['page']=='1'){
		if($newfilename)
			$photo="`photo`='$newfilename',";
		else
			$photo="";
$do = mysqli_query($conn, "UPDATE `account` SET `nom`='$nom', `postnom`='$postnom', `prenom`='$prenom', `lieu`='$lieu', `date`='$date', `pere`='$pere', `pviva`='$pviva', `mere`='$mere', `mviva`='$mviva', $photo `grandpere`='$grandpere', `gpviva`='$gpviva', `grandmere`='$grandmere', `gmviva`='$gmviva', `sexe`='$sexe', `langue`='$langue', `etude`='$etude', `civil`='$civil', `conjoint`='$conjoint', `cviva`='$cviva', `enfant`='$enfant', `profession`='$profession', `permis`='$permis', `cata`='$cata', `catb`='$catb', `catc`='$catc', `catd`='$catd', `cate`='$cate', `aville`='$aville' WHERE `Number`='$code' ORDER BY `Number` ASC LIMIT 1");
	$_SESSION['Page'] = $_POST['page'] + 1;
	$_SESSION['Code'] = $_POST['code'];
		$pto=20;
		}
	elseif($code!='202cb962ac59075b964b07152d234b70' AND $_POST['page']=='2'){
$do = mysqli_query($conn, "UPDATE `account` SET `nationalite`='$nationalite', `pays`='$pays', `province`='$province', `territoire`='$territoire', `secteur`='$secteur', `collectivite`='$collectivite', `groupement`='$groupement', `village`='$village', `type`='$type', `idno`='$idno', `delieu`='$delieu', `carte`='$carte', `delivrance`='$delivrance', `ano`='$ano', `aavenue`='$aavenue', `aquartier`='$aquartier', `acommune`='$acommune', `asecteur`='$asecteur', `aprovince`='$aprovince', `contact`='$contact', `email`='$email' WHERE `Number`='$code' ORDER BY `Number` ASC LIMIT 1");
	$_SESSION['Page'] = $_POST['page'] + 1;
	$_SESSION['Code'] = $_POST['code'];
		$pto=20;
		}
	elseif($code!='202cb962ac59075b964b07152d234b70' AND $_POST['page']=='3'){
$do = mysqli_query($conn, "UPDATE `account` SET `rnom`='$rnom', `rlieu`='$rlieu', `rphone`='$rphone', `rno`='$rno', `ravenue`='$ravenue', `rquartier`='$rquartier', `rcommune`='$rcommune', `rville`='$rville', `rsecteur`='$rsecteur', `rprovince`='$rprovince' WHERE `Number`='$code' ORDER BY `Number` ASC LIMIT 1");
	$_SESSION['Page'] = $_POST['page'] + 1;
	$_SESSION['Code'] = $_POST['code'];
		$pto=20;
		}
	elseif($code!='202cb962ac59075b964b07152d234b70' AND $_POST['page']=='4'){
$do = mysqli_query($conn, "UPDATE `account` SET `marque`='$marque', `fabrication`='$fabrication', `chassie`='$chassie', `couleur`='$couleur', `plaque`='$plaque' WHERE `Number`='$code' ORDER BY `Number` ASC LIMIT 1");
	$_SESSION['Page'] = $_POST['page'] + 1;
	$_SESSION['Code'] = $_POST['code'];
		$pto=20;
		}
	elseif($code!='202cb962ac59075b964b07152d234b70' AND $_POST['page']=='5'){
$do = mysqli_query($conn, "UPDATE `account` SET `pnom`='$pnom', `pno`='$pno', `pavenue`='$pavenue', `pquartier`='$pquartier', `pcommune`='$pcommune', `pville`='$pville', `psecteur`='$psecteur', `pprovince`='$pprovince', `pcontact`='$pcontact', `pemail`='$pemail' ORDER BY `Number` ASC LIMIT 1");
	$_SESSION['Page'] = $_POST['page'] + 1;
	$_SESSION['Code'] = $_POST['code'];
		}
		else{
$do = mysqli_query($conn, "UPDATE `account` SET (, , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , )");		
	}
		}
		?>