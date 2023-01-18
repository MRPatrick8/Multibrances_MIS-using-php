<?php
$regipage=$register=$sysrepo=$settings=$emploaccess=$approe=$ecancel=$apay=0;
$po=mysqli_query($conn, "SELECT `Postname` FROM `position` WHERE `Postid`='$currentp' ORDER BY `Postname` ASC");
			  $ro=mysqli_fetch_assoc($po);
			  $position=$ro['Postname'];
$previ=mysqli_query($conn, "SELECT *FROM `previleges` ORDER BY `NUMBER` ASC");
	$frevi=mysqli_num_rows($previ);
		while($revi=mysqli_fetch_assoc($previ)){
			$pri=$revi['PNAME'];
			$vla=$revi["$position"];
		if($pri=='Accéder à la page d`inscription' AND $vla=='1')
			$regipage=1;
		if($pri=='Enregistrer un nouveau participant' AND $vla=='1')
			$register=1;
		if($pri=='Accéder au rapport du système' AND $vla=='1')
			$sysrepo=1;
		if($pri=='Accéder à la page de configuration' AND $vla=='1')
			$settings=1;
		if($pri=='Créer des utilisateurs du système' AND $vla=='1')
			$emploaccess=1;
		if($pri=='Approuver l`enregistrement du participant' AND $vla=='1')
			$approe=1;
		if($pri=='Supprimer un enregistrement du participant' AND $vla=='1')
			$ecancel=1;
		if($pri=='Approuver le paiement de l`enregistrement' AND $vla=='1')
			$apay=1;
			}	
		
$_SESSION['Register']=$register;	
$_SESSION['Regipage']=$regipage;	
$_SESSION['Sysrepo']=$sysrepo;	
$_SESSION['Settings']=$settings;	
$_SESSION['Emploaccess']=$emploaccess;	
$_SESSION['Approe']=$approe;		
$_SESSION['Ecancel']=$ecancel;		
$_SESSION['Apay']=$apay;		
?>
