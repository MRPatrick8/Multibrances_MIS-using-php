<?php
if(basename($_SERVER['PHP_SELF']) == 'cardrepo.php') 
  $cm=" class='current'";
include'header.php';

$conde=$condi='';
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
	$conde="AND `aville` = '$custo'";
	
	if($p)
$doj=mysqli_query($conn, "SELECT *FROM `account` WHERE `Status`!='1' AND `province`='$province' AND `Cdate` BETWEEN '$dati' AND '$datis' $conde ORDER BY `Rdate` ASC");
	else
$doj=mysqli_query($conn, "SELECT *FROM `account` WHERE `Status`!='1' AND `province`='$province' $conde ORDER BY `Rdate` DESC LIMIT 15");
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
			 			  <li class="list-group-item">
           <a href="approrepo.php">
           <p>
           <i class="lnr lnr-menu-circle"></i>&nbsp;Rapport d`Approbation
           </p></a>
           </li> 
		   <li class="list-group-item active">
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

			<table class="table table-striped table-hover table-sm style="font-size:8px;">     
                                      <thead>
                    <tr role="row">
					<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Code&nbsp;&nbsp;</th><th>&nbsp;&nbsp;&nbsp;Date&nbsp;&nbsp;</th>
                        <th> Nom & Prenom </th><th> Cantact </th><th><div align='center'> N° ID National </th>
                        <th><div align='center'>N° du Permis</th><th><div align='center'>Date&nbsp;de&nbsp;la&nbsp;Carte</th>
						<th> Date&nbsp;d`Expiration </th></tr>
                    </thead><tbody>
		<?php
					$n=1;			
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
$cdat=$ro['Cdate'];
$cdat = strtotime("-1 day", strtotime("$cdat"));
$cdat = date ("Y-m-d", $cdat);
$mt=date("m", strtotime($cdat));
$dt=date("d", strtotime($cdat));
$yr=date("Y", strtotime($cdat));
$yri=$yr+5;
$edat="$dt-$mt-$yri";

$date=date("d-m-Y", strtotime($ro['Cdate']));
$cdat=date("d-m-Y", strtotime($ro['Cdate']));
$ucode=$ro['Code'];
$file=$ro['photo'];
	if($file)
$dfile="<a href='files/$file' style='color:blue' target='_blank'>$file</a>";
        else
	        $dfile="<font color='#F9f9f9'> &nbsp; </font>";

if($ro['Status']=='0')
	$stl="style='padding:1px;'";
else
	$stl="style='padding:1px; color:#3300ff;'";

print("<tr><td $stl><div align='center'>$ucode&nbsp;</td><td $stl><div align='center'> $date </td>
	<td $stl>$nom $postnom $prenom</td><td class='text-right' $stl> $contact </td><td class='text-right' $stl> $idno </td>
	<td $stl><div align='right'> $permis </td><td $stl><div align='center'> $cdat </td>
	<td $stl><div align='center'> $edat </td></tr>");
			$n++;		
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