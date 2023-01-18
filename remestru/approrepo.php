<?php
if(basename($_SERVER['PHP_SELF']) == 'approrepo.php') 
  $cm=" class='current'";
include'header.php';

$conde=$condi="";
$dato=$datos=$Dati;
$province=$_SESSION['Prove'];
$custo="";
$p=0;

	if(isset($_POST['search']))
		{
		$dato=$_POST['dato'];
		$datos=$_POST['datos'];
		$dati=date("Y-m-d", strtotime($dato));
		$datis=date("Y-m-d", strtotime($datos));
		$p=1;
		}
		
		if($p)
$doj=mysqli_query($conn, "SELECT `approvals`.* FROM `approvals` INNER JOIN `account` ON `approvals`.`Partis` = `account`.`number` WHERE `approvals`.`Date` BETWEEN '$dati' AND '$datis' AND `account`.`province`='$province' $conde GROUP BY `approvals`.`Partis` ORDER BY `approvals`.`Date` ASC, `approvals`.`number` ASC");
		else
$doj=mysqli_query($conn, "SELECT *FROM (SELECT `approvals`.* FROM `approvals` INNER JOIN `account` ON `approvals`.`Partis` = `account`.`number` WHERE `account`.`province`='$province' GROUP BY `approvals`.`Partis` ORDER BY `approvals`.`Date` DESC LIMIT 15) SUB ORDER BY `Date` ASC, `number` ASC");
$fo=mysqli_num_rows($doj);
?>
<div class="container-fluid main-content">
  <div class="row">
        <div class="col-md-2">
		<ul class="list-group"> 
		<li class="list-group-item">
           <a href="partrepo.php?id=202cb962ac59075b964b07152d234b70">
           <p>
           <i class="lnr lnr-menu-circle"></i>&nbsp;Rapport de Participants
           </p></a>
           </li>
		   <li class="list-group-item">
           <a href="regrepo.php" style="font-size:13px;">
           <p>
           <i class="lnr lnr-menu-circle"></i>&nbsp;Rapport d`Enregistrement
           </p></a>
           </li>
			  <li class="list-group-item active">
           <a href="approrepo.php">
           <p>
           <i class="lnr lnr-menu-circle"></i>&nbsp;Rapport d`Approbation
           </p></a>
           </li>
		   <li class="list-group-item">
           <a href="cardrepo.php">
           <p>
           <i class="lnr lnr-menu-circle"></i>&nbsp;Rapport de Cartes
           </p></a>
           </li></ul>
              </div>
                    
           
           
       
        <div class="col-lg-10">
                  <div class="row hidden-print">
         
           <div class="col-lg-3 text-center"></div>
           <form action="" method="post" class="form-horizontal "><div class="col-lg-3"> 					   
			   			   
				</div><div class="col-lg-6 no-print">
            
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
                    <tr role="row"><th width="2%"> No </th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date </th><th><div align='center'>Approuvé Par</th>
					<th><div align='center'> Code </th><th> Ville/Territoire </th><th> Nom & Prenom </th>
					<th> Cantact </th><th><div align='center'> N° ID National </th><th><div align='center'>N° du Permis</th></tr>
                    </thead><tbody>
		<?php
					$i=1;				$tam=$tpa=$tba=0;		
		while($ro=mysqli_fetch_assoc($doj)){
				$code=$ro['Partis'];
				$act=$ro['Action'];
				$date=$ro['Date'];
                $user=$ro['User'];

	$sk=mysqli_query($conn, "SELECT `nom`, `postnom`, `prenom`, `contact`, `idno`, `permis`, `Code`, `aville`, `idno` FROM `account` WHERE `number`='$code' ORDER BY `number` ASC");
		$rk=mysqli_fetch_assoc($sk);
			$nom=$rk['nom'];
			$postnom=$rk['postnom'];
			$prenom=$rk['prenom'];
			$contact=$rk['contact'];
			$idno=$rk['idno'];
			$permis=$rk['permis'];
			$ucode=$rk['Code'];
			$ville=$rk['aville'];
			$idno=$rk['idno'];
$stl="style='padding:1px; font-size:12px;'";

print("<tr><td $stl><div align='right'> $i </td><td $stl><div align='center'>$date&nbsp;</td><td $stl> $user </td>
<td $stl><div align='center'>$ucode&nbsp;</td><td $stl> $ville </td><td $stl>$nom $postnom $prenom</td>
<td class='text-right' $stl> $contact </td><td $stl><div align='right'> $idno&nbsp;</td>
<td class='text-left' $stl><div align='right'> $permis&nbsp;&nbsp;</td></tr>");
			$i++;							
	}
		?>
		
						</table><div class="row"></div></div></div> </div>                   
               <div class="col-lg-12 hidden-print"> <span class="pull-right hidden-print"><a href="#" onclick="return window.print()" class="hidden-print" title='Print' data-toggle='tooltip' data-placement='top'><i class="lnr lnr-printer"></i></a>&nbsp;&nbsp;&nbsp;</span></div> 
              
            </div>
                  </div>
      
   </div></div></div>
   <?php
   include'footer.php';
   ?>