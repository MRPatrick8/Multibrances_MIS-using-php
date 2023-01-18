<?php
if(basename($_SERVER['PHP_SELF']) == 'reverepo.php') 
  $cm=" class='current'";
include'header.php';

$conde=$condi="";
$datos=$Dati;
$dato = strtotime("-15 days", strtotime("$Date"));
$dato = date ("d-m-Y", $dato);
$province=$_SESSION['Prove'];
$custo="";
$p=0;

	if(isset($_POST['search']))
		{
		$custo=$_POST['custo'];
		$dato=$_POST['dato'];
		$datos=$_POST['datos'];
		$p=1;
		}

		if($custo){
	$conde="AND (`account`.`aville` = '$custo')";
	$ville=$custo;
		}
		else
			$ville="TOUTES LES VILLES";

		$dati=date("Y-m-d", strtotime($dato));
		$datis=date("Y-m-d", strtotime($datos));
		
	$fo=(strtotime("$datis") - strtotime("$dati")) / (60 * 60 * 24);
			if($fo==0)
				$fo=1;

				$fo=round($fo);
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
		<li class="list-group-item">
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
		<li class="list-group-item active">
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
           <form action="" method="post" class="form-horizontal ">	   
		   
		   <div class="col-lg-3"> 
					   
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
             <span><b> </b></span>
			  <span class="pull-right"><a href="#" onclick="return window.print()" class="hidden-print" title='Print' data-toggle='tooltip' data-placement='top'><i class="lnr lnr-printer"></i></a>&nbsp;&nbsp;&nbsp;</span>
            <div class="widget-container fluid-height clearfix">
            <div class="widget-content padded clearfix">

			<table class="table table-striped table-hover table-sm" style="font-size:8px;">     
                                      <thead>
                    <tr role="row"><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date </th><th> Province </th>
					<th> Ville/Territoire </th><th><div align='center'>Cash</th><th><div align='center'>Banque</th>
					<th><div align='center'>Cheque</th><th><div align='center'>Revenus</th></tr>
                    </thead><tbody>
		<?php
		$tam=$tpa=$tba=0;								$dat=$dati;
		while($dat<=$datis){
	$doj=mysqli_query($conn, "SELECT `payment`.* FROM `payment` INNER JOIN `account` ON `payment`.`Partis` = `account`.`number` WHERE `payment`.`Province`='$province' AND `payment`.`Date`='$dat' $conde ORDER BY `payment`.`Date` ASC");
					$i=1;								$ca=$ba=$che=0;		
		while($ro=mysqli_fetch_assoc($doj)){
				$code=$ro['Partis'];
				$tot=$ro['Amount'];
				$date=$ro['Date'];
                $pline=$ro['Pline'];
				$cheno=$ro['Cheno'];
				$bank=$ro['Bank'];
		
		if($pline=='Dépôt bancaire'){
$seeco=mysqli_query($conn, "SELECT *FROM `baccount` WHERE `Number`='$bank'");
$reeco=mysqli_fetch_assoc($seeco);
$accosee=$reeco['Account'];
$bansee=$reeco['Bank'];
if($accosee OR $bansee)
	$refo="$accosee/$bansee";
else
	$refo='';
	$ba+=$tot;
		}
		elseif($pline=='Payé par chèque'){
			if($cheno OR $bank)
				$refo="$cheno/$bank";
			else
				$refo='';
			$che+=$tot;
		}
		else{
			$refo="Payé en espèces";
			$ca+=$tot;
			}

		}
			
				$toto=number_format($ca, 2);
				$amoo=number_format($ba, 2);
				$resto=number_format($che, 2);
				$revo=number_format($tot, 2);

$stl="style='padding:1px; font-size:12px;'";

if($tot)
print("<tr><td $stl><div align='center'>$dat&nbsp;</td><td $stl> $province </td><td $stl> $ville </td>
<td $stl><div align='right' style='padding-right:20px;'> $toto </td><td $stl><div align='right' style='padding-right:20px;'> $amoo </td>
<td $stl><div align='right' style='padding-right:20px;'> $resto </td><td $stl><div align='right' style='padding-right:20px;'> $revo </td></tr>");
			$i++;							$tam+=$ca;					$tpa+=$ba;					$tba+=$che;
	$ca=$ba=$Che=$tot=0;

			 $dat = strtotime("+1 day", strtotime("$dat"));
				$dat=date("Y-m-d", $dat);
	}
		$tam=number_format($tam, 2);					$tpa=number_format($tpa, 2);				$tba=number_format($tba, 2);
		$tot=number_format($tba+$tam+$tpa, 2);
				?></tbody><thead>
				<tr><th> </th><th colspan="2">&nbsp;&nbsp;&nbsp; Montant Total </th>
				<th class="text-right" style='padding-right:20px;'><?php echo $tam ?></th>
				<th class="text-right" style='padding-right:20px;'><?php echo $tpa ?></th>
				<th class="text-right" style='padding-right:20px;'><?php echo $tba ?></th>
				<th class="text-right" style='padding-right:20px;'><?php echo $tot ?></th></tr>
					</thead></table><div class="row">
                    </div></div></div> </div>                   
               <div class="col-lg-12 hidden-print"> <span class="pull-right hidden-print"><a href="#" onclick="return window.print()" class="hidden-print" title='Print' data-toggle='tooltip' data-placement='top'><i class="lnr lnr-printer"></i></a>&nbsp;&nbsp;&nbsp;</span></div> 
              
            </div>
                  </div>
      
   </div></div></div>
   <?php
   include'footer.php';
   ?>