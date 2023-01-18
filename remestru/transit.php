<?php
if(basename($_SERVER['PHP_SELF']) == 'transit.php') 
  $rg=" class='current'";		

if(isset($_POST['open']))
		{
			$code=$_POST['rowid'];
	include'creceipt.php';
	$p=80;
		}

include'header.php';
$custo='';
$conde='';
$pto=0;
if(!$p)
$msg="Il n'y a pas de carte à imprimer";
else
$msg="La carte a été bien imprimée";

// search for project name or description
if(isset($_POST['search']))
		{
			$custo=$_POST['custo'];
		}

	if($custo){
	$conde="AND (`nom` LIKE '%$custo%' OR `postnom` LIKE '%$custo%' OR `prenom` LIKE '%$custo%' OR `Code` LIKE '%$custo%' OR `plaque` LIKE '%$custo%' OR `idno` LIKE '%$custo%' OR `permis` LIKE '%$custo%')";
			$condi='';
		}
		else{
			$condi="";
			$conde='';
		}

		if($custo=='*' OR $custo=='tous' OR $custo=='Tous' OR $custo=='TOUS' OR $custo=='*'){
			$condi="";
			$conde='';
		}
?>

<div class="container-fluid main-content">
  <div class="row">
        <div class="col-md-2">
		<ul class="list-group">  <li class="list-group-item">
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
           </p>
				<?php
				if($fpay)
	echo"<span class='badge' style='float:right; font-size:11px; margin-right:0px; height:18px; background-color:#ffcc66; width:25px; text-align:center; margin-top:-40px; color:#ffffff;' title='Purchase to be paid' data-toggle='tooltip' data-placement='top'> $fpay </span>";
					?></a>
           </li>
				<?php
				}
				?> 
				<li class="list-group-item active">
           <a href="transit.php">
           <p>
           <i class="lnr lnr-menu-circle"></i>&nbsp;Impression de cartes
           </p></a>
           </li>
                       </ul>
              </div>
                    
           
           
       
        <div class="col-lg-10">
                  <div class="row">

        <form action="" method="post" class="form-horizontal ">           
                         
                       <div class="col-lg-12 hidden-print"><div class="col-lg-1"> </div> 
         
           <div class="col-lg-4"> 
		   <?php
		   if($pto==30)
	echo"<center><div class='alert alert-danger' style='border-radius:5px; height:34px; padding-top:6px;'>
<i class='lnr lnr-sad'></i> <button class='close' data-dismiss='alert' type='button'>&times;</button>
No resultd found for your search. </div></center>";

		   if($pto==20)
	echo"<center><div class='alert alert-danger' style='border-radius:5px; height:34px; padding-top:6px;'>
<i class='lnr lnr-warning'></i> <button class='close' data-dismiss='alert' type='button'>&times;</button>
One request has been deleted successfull. </div></center>";
		   ?></div>

            <div class="col-lg-2">  </div>

		  <div class="col-lg-3"> 	
      <input class="form-control" name="custo" type="text" id="search" required>
	              </div>                     
                       
                       <div class="col-lg-2">
                        <button class="btn  btn-primary btn-block" type="submit" name="search" title="Search" data-toggle='tooltip' data-placement='top'><i class="lnr lnr-magnifier"></i> Chercher </button>
                   
					  </div>
                         </div> 
                      
                     
                  
            </form> 
             
               
            </div>
               <?php
		$do=mysqli_query($conn, "SELECT *FROM `account` WHERE `Status` = '0' AND `Amount`<=`Paid` AND `province`='$prove' AND `Printed`!='1' $conde ORDER BY `number` ASC LIMIT 80");   
				if($fo=mysqli_num_rows($do)){
				   ?>    
             <div class="col-lg-12">
             <span> &nbsp;&nbsp; Nombre d'enregistrement(s) trouvé(s) : <b><?php echo" $fo " ?></b></span> 
			 <span class="pull-right hidden-print"><?php echo $custoo ?>&nbsp;&nbsp;
			 <a href="#" onclick="return window.print()" class="hidden-print" title='Click to print' data-toggle='tooltip' data-placement='top'>
			 <i class="lnr lnr-printer"></i></a></span>
            <div class="widget-container fluid-height clearfix">
            <div class="widget-content padded clearfix">

								
		<?php
					$n=1;		
		while($ro=mysqli_fetch_assoc($do)){
$code=$ro['number'];
$idno=$ro['idno'];
$ville=$ro['aville'];
$photo=$ro['photo'];
$perm=$ro['permis'];
$date=date("d-m-Y", strtotime($ro['date']));
$sexe=$ro['sexe'];
$ucode=$ro['Code'];
$sexe=substr("$sexe", 0, 1);
$nation=$ro['nationalite'];
$profes=$ro['profession'];


				$telo=$ro['contact'];
				$nom=$ro['nom'];
				$postnom=$ro['postnom'];
				$prenom=$ro['prenom'];
				$cata=$ro['cata'];
				$catb=$ro['catb'];
				$catc=$ro['catc'];
				$catd=$ro['catd'];
				$cate=$ro['cate'];
				if($ro['Printed']==2)
					$c="- C";
				else
					$c="";
		
$stl="style='padding:0px;'";
$stat=$ro['Status'];
$cdat=$ro['Cdate'];
$cdat = strtotime("-1 day", strtotime("$cdat"));
$cdat = date ("Y-m-d", $cdat);
$mt=date("m", strtotime($cdat));
$dt=date("d", strtotime($cdat));
$yr=date("Y", strtotime($cdat));
$mont=$month[$mt];

$dti=$dt;
$yri=$yr+5;

if($stat=='2'){
	$brd="border:1px solid #ff0066";
}
else
	$brd="border:1px solid $cls";

$chef=mysqli_query($conn, "SELECT `Chef` FROM `provinces` WHERE `Province`='$prove'");
$ref=mysqli_fetch_assoc($chef);
$cheif=$ref['Chef'];

				print("<form action='' method='post'>");

				print("<div class='col-md-5'><input type='hidden' name='rowid' value='$code'>
		<button type='submit' name='open' class='btn btn-lg btn-block btn-default' style='margin-bottom:20px; height:245px; 
			font-size:14px; background-color:#000066; $brd' title='Cliquer pour imprimer la carte' data-toggle='tooltip' data-placement='top'>
			<img src='imgs/header.JPG' width='96%' height='60' border='0' alt=''><br>
			<span style='margin-left:10px; font-size:8px; float:left; text-align:left; margin-top:5px; width:auto; 
			padding-right:10px;'> CARTE D'IDENTIFICATION DE TRANSPORTEUR ROUTIER N° $ucode </span>
			<span style='margin-top:10px; margin-left:0px; width:40px; margin-bottom:-10px;'> &nbsp;&nbsp; </span>

			
			<div style='width:96%; height:90px; background-color:#ffffff; margin-left:10px;'>
			<table width='100%' style='color:#000000; font-size:10px; font-weight:bold;'>
			<tr style='color:#ff0000; height:5px;'>
			
			<td rowspan='6' width='20%' $stl><img src='files/$photo' width='85' height='85' border='0' alt=''></td>
			<td width='20%' $stl> Nom </td><td width='20%' $stl><center> Sexe </td><td width='20%' $stl> Nationalité </td>
			<td width='20%' $stl><center> Profession </td></tr>

			<tr style='height:5px;'><td style='text-align:left; padding:1px; font-size:8px;'>$nom $postnom $prenom </td>
			<td style='text-align:center; padding:1px; font-size:10px;'> $sexe </td>
			<td $stl> $nation </td><td $stl><center> $profes </td></tr>
			
			<tr style='color:#ff0000; height:5px;'><td $stl> Affectation </td><td colspan='2' $stl> N° Permis de Conduire </td>
			<td style='color:#ff0000; padding:1px;'><center>Catégorie</td></tr>

			<tr style='height:5px;'><td $stl>&nbsp;&nbsp;Transport en Commun </td><td colspan='2' $stl> $perm </td><td style='color:#00cc00;padding:1px;'><b>
			<center> $cata $catb $catc $catd $cate </b></td></tr>

			<tr style='height:5px;'><td colspan='4' style='text-align:left; padding:1px;'><font color='#ff0000'>&nbsp;&nbsp;Addresse: </font>
			<font color='#00cc00'> Ville de $ville. </font></td></tr>

			<tr style='height:5px;'><td align='right'><b><font style='font-size:14px;'>635669 $c</font></b><td>
			<td colspan='3' style='text-align:left; padding:1px; font-size:8px'>
			<font color='#ff0000'>Date d'expiration: Le $dti $mont $yri </font></td></tr>
			
			</table>
			</div>

			<span style='margin-left:10px; font-size:8px; float:left; text-align:left; margin-top:5px; width:auto; 
			padding-right:10px;'>&nbsp;&nbsp;&nbsp;NN $idno <br><br><img alt='$idno' width='100' height='30' 
			src='barcode.php?codetype=Code39&size=30&text=$idno' /><br></span>

			<span style='float:right; border:0px solid red; margin-top:10px; margin-right:10px; font-size:8px; width:180px;'> 
			Fait à $ville, le $dt $mont $yr <br><br>
			<u>$cheif</u><br><br> Chef de Division Principale de Transport</span>

			
			</button></div></form>");
			
			 if($n % 2 != 0)
				 echo"<div class='col-md-2'> </div>";
	$n++;

		}
				  
				  
				}
				 else{
						echo"<div class='row'>
            <div class='col-lg-12' style='margin-top:-20px;'>
             <span> &nbsp;&nbsp; Total Records Found : <b> 0 </b></span>
			 <span class='pull-right hidden-print'> $custoo &nbsp;&nbsp;<a href='#' onclick='return window.print()' class='hidden-print' title='Click to print' data-toggle='tooltip' data-placement='top'><i class='lnr lnr-printer'></i></a></span>
            <div class='widget-container fluid-height clearfix'>
            <div class='widget-content padded clearfix'>
			<br><br><br><br><br><br>
	<div style='text-align:center; font-size:24px; color:#ff9999'> $msg </div><br><br><br><br><br><br>";
					}  
			
					?>                                      
                
              </div>
            </div>
                                  
                <span class="pull-right hidden-print">
			 &nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="return window.print()" class="hidden-print" title='Click to print' data-toggle='tooltip' data-placement='top'><i class="lnr lnr-printer"></i></a></span>
      
   </div></div></div>  
   <?php
   include'footer.php';
   ?>