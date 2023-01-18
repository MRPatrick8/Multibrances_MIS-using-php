<?php
if(basename($_SERVER['PHP_SELF']) == 'cherepo.php') 
  $cm=" class='current'";
include'header.php';

$conde=$condi="";
$dato=$datos=$Dati;
$province=$_SESSION['Prove'];
$custo="";
$p=0;

	if(isset($_POST['search']))
		{
		$custo=$_POST['custo'];
		$dato=$_POST['dato'];
		$datos=$_POST['datos'];
		$dati=date("Y-m-d", strtotime($dato));
		$datis=date("Y-m-d", strtotime($datos));
		$p=1;
		}

		if($custo)
	$conde="AND (`account`.`aville` = '$custo')";
		
		if($p)
$doj=mysqli_query($conn, "SELECT `payment`.* FROM `payment` INNER JOIN `account` ON `payment`.`Partis` = `account`.`number` WHERE `payment`.`Date` BETWEEN '$dati' AND '$datis' AND `account`.`province`='$province' AND `payment`.`Pline`='Payé par chèque' $conde ORDER BY `payment`.`Date` ASC, `payment`.`number` ASC");
		else
$doj=mysqli_query($conn, "SELECT *FROM (SELECT `payment`.* FROM `payment` INNER JOIN `account` ON `payment`.`Partis` = `account`.`number` WHERE `account`.`province`='$province' AND `payment`.`Pline`='Payé par chèque' ORDER BY `payment`.`Date` DESC LIMIT 15) SUB ORDER BY `Date` ASC, `number` ASC");
$fo=mysqli_num_rows($doj);
?>
<div class="container-fluid main-content">
  <div class="row">
        <div class="col-md-2">
		<ul class="list-group"> 
		<li class="list-group-item">
           <a href="payrepo.php?id=202cb962ac59075b964b07152d234b70">
           <p>
           <i class="lnr lnr-menu-circle"></i>&nbsp;Rapport de Paiements
           </p></a>
           </li> 
		<li class="list-group-item active">
           <a href="cherepo.php?id=202cb962ac59075b964b07152d234b70">
           <p>
           <i class="lnr lnr-menu-circle"></i>&nbsp;Rapport de Chèques
           </p></a>
           </li> 
		<li class="list-group-item">
           <a href="versrepo.php?id=202cb962ac59075b964b07152d234b70">
           <p>
           <i class="lnr lnr-menu-circle"></i>&nbsp;Rapport de Versements
           </p></a>
           </li>
		<li class="list-group-item">
           <a href="reverepo.php?id=202cb962ac59075b964b07152d234b70">
           <p>
           <i class="lnr lnr-menu-circle"></i>&nbsp;Rapport de revenus
           </p></a>
           </li>
			 			
        </ul>
              </div>
                    
           
           
       
        <div class="col-lg-10">
                  <div class="row hidden-print">
         
           <div class="col-lg-3 text-center"></div>
           <form action="" method="post" class="form-horizontal "><div class="col-lg-3"> 
					   
			   <select class="form-control" name="custo"><option value=""> TOUTES LES VILLES </option>
		 <?php
				$sk=mysqli_query($conn, "SELECT `Ville` FROM `villes` WHERE `Province`='$province' ORDER BY `Ville` ASC");
								while($rk=mysqli_fetch_assoc($sk)){
									$vill=$rk['Ville'];
									if($vill==$custo)
										$h="selected";
									else
										$h="";
								echo"<option value='$vill' $h> $vill </option>";
						}
						?>
			   </select>
					   
					   </div>       
           

                   
                       <div class="col-lg-6 no-print">
            
            <div class="col-lg-4"> 
          <div class="input-group date" data-provide="datepicker">
	<input type="text" name="dato" class="form-control text-center" value="<?php echo $dato ?>" required>
		 <div class="input-group-addon"><span class="lnr lnr-calendar-full"></span>
				</div>
			</div></div>


		  <div class="col-lg-4"> 
            
          <div class="input-group date" data-provide="datepicker">
	<input type="text" name="datos" class="form-control text-center" value="<?php echo $datos ?>" required>
		 <div class="input-group-addon"><span class="lnr lnr-calendar-full"></span>
				</div>
              </div></div>                      
                       
                       <div class="col-lg-3">
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

			<table class="table table-striped table-hover table-sm" style="font-size:8px;">     
                                      <thead>
                    <tr role="row"><th> Date </th><th> Code </th><th><div align='center'> Ville/Territoire </th>
                        <th> Nom & Prenom </th><th> Cantact </th><th style="text-align:center;"> Numéro du Chèque </th>
						<th><div align='center'> Nom de la Banque </th><th><div align='center'>Montant Payé</th></tr>
                    </thead><tbody>
		<?php
					$i=1;				$tam=$tpa=$tba=0;		
		while($ro=mysqli_fetch_assoc($doj)){
				$code=$ro['Partis'];
				$tot=$ro['Amount'];
				$date=$ro['Date'];
                $pline=$ro['Pline'];
				$cheno=$ro['Cheno'];
				$bank=$ro['Bank'];

	$sk=mysqli_query($conn, "SELECT `nom`, `postnom`, `prenom`, `contact`, `idno`, `permis`, `Code`, `aville` FROM `account` WHERE `number`='$code' ORDER BY `number` ASC");
		$rk=mysqli_fetch_assoc($sk);
			$nom=$rk['nom'];
			$postnom=$rk['postnom'];
			$prenom=$rk['prenom'];
			$contact=$rk['contact'];
			$idno=$rk['idno'];
			$permis=$rk['permis'];
			$ucode=$rk['Code'];
			$ville=$rk['aville'];
			
				$toto=number_format($tot, 2);

$stl="style='padding:1px; font-size:12px;'";

print("<tr><td $stl><div align='center'>$date&nbsp;</td><td $stl><div align='center'>$ucode&nbsp;</td><td $stl> $ville </td>
	<td $stl>$nom $postnom $prenom</td><td class='text-right' $stl> $contact </td><td $stl><div align='right'> &nbsp;$cheno </td>
	<td class='text-left' $stl> &nbsp;$bank </td><td $stl><div align='right' style='padding-right:20px;'> $toto </td></tr>");
			$i++;							$tam+=$tot;					
	}
		$tam=number_format($tam, 2);					
				?></tbody><thead>
				<tr><th> </th><th colspan='3'>&nbsp;&nbsp;&nbsp; Montant Total </th><th colspan='3'> </th>
				<th class="text-right" style='padding-right:20px;'><?php echo $tam ?></th></tr>
					</thead></table><div class="row">
                    </div></div></div> </div>                   
               <div class="col-lg-12 hidden-print"> <span class="pull-right hidden-print"><a href="#" onclick="return window.print()" class="hidden-print" title='Print' data-toggle='tooltip' data-placement='top'><i class="lnr lnr-printer"></i></a>&nbsp;&nbsp;&nbsp;</span></div> 
              
            </div>
                  </div>
      
   </div></div></div>
   <?php
   include'footer.php';
   ?>