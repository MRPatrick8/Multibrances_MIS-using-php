<?php
if(basename($_SERVER['PHP_SELF']) == 'partrepo.php') 
  $cm=" class='current'";
include'header.php';

$conde=$condi='';

if(isset($_POST['delo']))
		{
			$rowid=$_POST['rowid'];
	$do=mysqli_query($conn, "UPDATE `account` SET `Status`='1' WHERE `Status`='0' AND `Number`='$rowid' ORDER BY `Number` DESC LIMIT 1");
			$pto=50;
		}

if(isset($_POST['search']))
		{
			$custo=$_POST['custo'];
		}

		
		if($custo){
	$conde="AND (`nom` LIKE '%$custo%' OR `postnom` LIKE '%$custo%' OR `prenom` LIKE '%$custo%' OR `Code` LIKE '%$custo%' OR `plaque` LIKE '%$custo%' OR `idno` LIKE '%$custo%' OR `permis` LIKE '%$custo%')";
			$lim=1000;
			$condi='';
		}
		else{
			$condi="";
			$conde='';
			$lim=20;
		}

		if($custo=='*' OR $custo=='tous' OR $custo=='Tous' OR $custo=='TOUS'){
			$condi="";
			$conde='';
			$lim=999999;
		}

$doj=mysqli_query($conn, "SELECT *FROM `account` WHERE `Status`!='1' AND `province`='$prove' $conde ORDER BY `nom` ASC LIMIT $lim");
$fo=mysqli_num_rows($doj);
?>
<div class="container-fluid main-content">
  <div class="row">
        <div class="col-md-2">
		<ul class="list-group">  
		<li class="list-group-item active">
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
		   <li class="list-group-item">
           <a href="cardrepo.php">
           <p>
           <i class="lnr lnr-menu-circle"></i>&nbsp;Rapport de Cartes
           </p></a>
           </li></ul>
              </div>
                    
           
           
       
        <div class="col-lg-10">
                  <div class="row hidden-print">
         
           <div class="col-lg-6 text-center">
<?php 
	if($pto==50)
echo"<center><div class='alert alert-danger alert-sm' style='width:80%; text-align:center; float:center;
		color:#ffffff; border-radius:5px; height:34px; padding-top:5px;'><i class='lnr lnr-checkmark-circle'></i>  
		<button class='close' data-dismiss='alert' type='button'>×</button> Un participant a été supprimé. </div></center>";
		?></div>
          
         
           

        <form action="" method="post" class="form-horizontal ">                  
                       <div class="col-lg-6 no-print">
            <div class="col-lg-7"> 
      <input class="form-control"  name="custo" type="text" value="<?php echo $dato ?>" id="searchs" required>
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
                        <th> Nom & Prenom </th><th> Cantact </th><th> Email </th><th><div align='center'> N° ID National </th>
                        <th><div align='center'>N° du Permis</th><th><div align='center'>Catégorie</th>
						<th> Ville/Territoire </th><th> Etat-Civil </th>
						<th class="hidden-xs hidden-print" style="width:40px; text-align:center;"> # </th></tr>
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
$civil=$ro['civil'];
$email=$ro['email'];
$ucode=$ro['Code'];
$file=$ro['photo'];

$cust="$nom $postnom $prenom";
$do=mysqli_query($conn, "UPDATE `account` SET `Customer`='$cust' WHERE `Number`='$code' ORDER BY `Number` DESC LIMIT 1");
	if($file)
$dfile="<a href='files/$file' style='color:blue' target='_blank'>$file</a>";
        else
	        $dfile="<font color='#F9f9f9'> &nbsp; </font>";

if($ro['Status']=='0')
	$stl="style='padding:1px;'";
else
	$stl="style='padding:1px; color:#3300ff;'";

print("<tr><td $stl><div align='center'>$ucode&nbsp;</td>
	<td $stl>$nom $postnom $prenom</td><td class='text-right' $stl> $contact </td><td $stl> $email </td><td class='text-right' $stl> $idno </td>
	<td $stl><div align='right'> $permis </td><td $stl><div align='center'> $cata $catb $catc $catd $cate </td>
	<td $stl> $ville </td><td $stl> $civil </td><form method='post' action='open.php'>   
		<td class='hidden-xs hidden-print' align='right' style='width:20px; padding:0px;'><input type='hidden' name='code' value='$code'>
		<input type='hidden' name='page' value='2'><div title='Ouvrir' data-toggle='tooltip' data-placement='top'>
  <button type='submit' class='btn btn-xs btn-success hidden-print' name='open' style='height:18px; padding:0px; margin:3px;'>
	&nbsp;&nbsp;<i class='lnr lnr-download'></i>&nbsp;&nbsp;</button></div></td></form></tr>");
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