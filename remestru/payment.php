<?php
if(basename($_SERVER['PHP_SELF']) == 'payment.php') 
  $rg=" class='current'";
include'header.php';

$conde=$condi='';

if(isset($_POST['copie']))
		{
			$rowid=$_POST['rowid'];
			$reason=str_replace("'", "`", $_POST['reason']);
	$do=mysqli_query($conn, "UPDATE `account` SET `Copier`='1' WHERE `Status`='0' AND `Number`='$rowid' ORDER BY `Number` DESC LIMIT 1");
	$so=mysqli_query($conn, "INSERT INTO `reason` (`Date`, `Account`, `Reason`) VALUES ('$Date', '$rowid', '$reason')");
			$pto=50;
		}

// add a payment
if(isset($_POST['addpa']))
		{
			$date=$pdate=date("Y-m-d", strtotime($_POST['dati']));
			$amo=$_POST['amo'];
			$amo=str_replace(',', '', $_POST['amo']);
			$pline=$_POST['pline'];
			$naso=$_POST['naso'];
			$copie=$_POST['copie'];

			$pieces = explode("-", $pline);
				$pline = $pieces[0]; // piece1
				$cheno=$bank='';
			
		if($pline=='Payé par cheque'){
			$cheno=$_POST['cheno'];
			$bank=$_POST['bna'];
			$pdate=date("Y-m-d", strtotime($_POST['pda']));
		}
		if($pline=='Dépôt bancaire'){
			$cheno=$_POST['slino'];
			$bank=$_POST['acco'];
		}
			$pto=60;
	$so=mysqli_query($conn, "INSERT INTO `payment` (`Date`, `Time`, `Partis`, `Amount`, `Pline`, `Refer`, `User`, `Cheno`, `Bank`, `Pdate`, `Province`) VALUES ('$date', '$Time', '$naso', '$amo', '$pline', 'Achat de carte', '$loge', '$cheno', '$bank', '$pdate', '$prove')");
		if($copie=='1')
	$do=mysqli_query($conn, "UPDATE `account` SET `Printed`='2', `Copier`='0' WHERE `Number`='$naso' ORDER BY `Number` DESC LIMIT 1");
		else
	$do=mysqli_query($conn, "UPDATE `account` SET `Paid`=`Paid`+'$amo', `Cdate`='$date' WHERE `Number`='$naso' ORDER BY `Number` DESC LIMIT 1");
		}

if(isset($_POST['search']))
		{
			$custo=$_POST['custo'];
		}

		
		if($custo){
	$conde="AND (`account`.`nom` LIKE '%$custo%' OR `account`.`postnom` LIKE '%$custo%' OR `account`.`prenom` LIKE '%$custo%' OR `account`.`Code` LIKE '%$custo%' OR `account`.`plaque` LIKE '%$custo%' OR `account`.`idno` LIKE '%$custo%' OR `account`.`permis` LIKE '%$custo%')";
			$lim=1000;
			$condi='';
		}
		else{
			$condi="";
			$conde='';
			$lim=2000;
		}

		if($custo=='*' OR $custo=='tous' OR $custo=='Tous' OR $custo=='TOUS'){
			$condi="";
			$conde='';
			$lim=999999;
		}

$doj=mysqli_query($conn, "SELECT `account`.* FROM `account` WHERE (`account`.`Status`!='1' AND `account`.`Amount`>`account`.`Paid` AND `account`.`province`='$prove' $conde) OR (`account`.`Status`!='1' AND `account`.`Copier`='1' AND `account`.`province`='$prove' $conde) ORDER BY `account`.`number` ASC LIMIT $lim");
$fo=mysqli_num_rows($doj);
?>
<div class="container-fluid main-content">
  <div class="row">
        <div class="col-md-2">
		<ul class="list-group"> <li class="list-group-item">
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
 <li class="list-group-item active">
           <a href="payment.php">
           <p>
           <i class="lnr lnr-menu-circle"></i>&nbsp;Paiement de la carte
           </p>
				<?php
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
                    
           
           
       
        <div class="col-lg-10">
                  <div class="row hidden-print">
         
           <div class="col-lg-6 text-center">
<?php 
	if($pto==50)
echo"<center><div class='alert alert-info alert-sm' style='width:80%; text-align:center; float:center;
		color:#ffffff; border-radius:5px; height:34px; padding-top:5px;'><i class='lnr lnr-checkmark-circle'></i>  
		<button class='close' data-dismiss='alert' type='button'>×</button> Paiement de la carte a été activé. </div></center>";
	if($pto==60)
echo"<center><div class='alert alert-info alert-sm' style='width:80%; text-align:center; float:center; border:0px;
		color:#ffffff; border-radius:5px; height:34px; padding-top:5px; background-color:#60c560;'><i class='lnr lnr-checkmark-circle'></i>  
		<button class='close' data-dismiss='alert' type='button'>×</button> Le paiement est effectué avec succès. </div></center>";
		?></div>
          
         
           

        <form action="" method="post" class="form-horizontal ">                  
                       <div class="col-lg-6 no-print">
            <div class="col-lg-7"> 
      <input class="form-control"  name="custo" type="text" value="<?php echo $custo ?>" id="searchs" required>
			</div>                      
                       
                       <div class="col-lg-4">
                        <button class="btn  btn-primary btn-block" type="submit" name="search"><i class="lnr lnr-magnifier"></i> Chercher </button>
                   
					  </div>
                         </div> 
                      
                     
                  
            </form> 
             
               
            </div>
             <div class="row">
            <div class="col-lg-12" style='margin-top:-20px;'>
             <span>Nombre d'enregistrement(s) trouvé(s) : <b><?php echo" $fo " ?></b></span>
			  <span class="pull-right"><a href="#" onclick="return window.print()" class="hidden-print" title='Print' data-toggle='tooltip' data-placement='top'><i class="lnr lnr-printer"></i></a>&nbsp;&nbsp;&nbsp;</span>
            <div class="widget-container fluid-height clearfix">
            <div class="widget-content padded clearfix">

			<table class="table table-striped table-hover table-sm style="font-size:8px;">     
                                      <thead>
                    <tr role="row"> <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Code&nbsp;&nbsp;</th>
                        <th> Nom & Prenom </th><th> Cantact </th><th><div align='center'> N° ID National </th>
                        <th><div align='center'>N° du Permis</th><th><div align='center'>Montant à payer</th>
						<th><div align='center'>Montant payé</th><th><div align='center'>Reste à payer</th>
						<th class="hidden-xs hidden-print" style="width:20px; text-align:center;"> Payer </th></tr>
                    </thead><tbody>
		<?php
					$i=1;			
		while($ro=mysqli_fetch_assoc($doj)){
$code=$ro['number'];
$nom=$ro['nom'];
$postnom=$ro['postnom'];
$prenom=$ro['prenom'];
$contact=$ro['contact'];
$idno=$ro['idno'];
$permis=$ro['permis'];
			$cata=$ro['cata'];
			$catb=$ro['catb'];
			$catc=$ro['catc'];
			$catd=$ro['catd'];
			$cate=$ro['cate'];
$ville=$ro['aville'];
$civil=$ro['civil'];
$ucode=$ro['Code'];
$amo=$ro['Paid'];
$copie=$ro['Copier'];

if($copie=='1')
	$amo=0;

$sk=mysqli_query($conn, "SELECT `Amount` FROM `villes` WHERE `Ville`='$ville' ORDER BY `Ville` ASC");
		$rk=mysqli_fetch_assoc($sk);
				$tot=$rk['Amount'];
				$rest=$tot-$amo;
				if($rest<0)
					$rest=0;
				$toto=number_format($tot, 2);
				$amoo=number_format($amo, 2);
				$resto=number_format($rest, 2);

$stl="style='padding:1px;'";

print("<tr><td $stl><div align='center'>$ucode&nbsp;</td>
	<td $stl>$nom $postnom $prenom</td><td class='text-right' $stl> $contact </td><td class='text-right' $stl> $idno </td>
	<td $stl><div align='right'> $permis </td><td $stl><div align='right' style='padding-right:20px;'> $toto </td>
	<td $stl><div align='right' style='padding-right:20px;'> $amoo </td><td $stl><div align='right' style='padding-right:20px;'> $resto </td>
	<td class='hidden-xs hidden-print text-center' style='width:20px; padding:0px;'>");
	include'addpay.php';
    print("<div title='Ajouter un paiement' data-toggle='tooltip' data-placement='top'>
	<button type='button' class='btn btn-xs btn-warning hidden-print' style='height:18px; width:32px; padding:0px; margin:0px; margin-right:2px;' data-toggle='modal' data-target='#exampleModalo$i'> &nbsp;<i class='lnr lnr-briefcase'></i>&nbsp; </button></td></div></tr>");
			$i++;		
	}

				?></tbody>
                  </table>
                    <div class="row">
                    </div></div></div> </div>                   
               <div class="col-lg-12 hidden-print"> <span class="pull-right hidden-print"><a href="#" onclick="return window.print()" class="hidden-print" title='Print' data-toggle='tooltip' data-placement='top'><i class="lnr lnr-printer"></i></a>&nbsp;&nbsp;&nbsp;</span></div> 
              
            </div>
                  </div>
      
   </div></div></div>
   <?php
   include'footer.php';
   ?>