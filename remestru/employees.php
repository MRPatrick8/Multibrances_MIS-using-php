<?php
if(basename($_SERVER['PHP_SELF']) == 'employees.php') {
  $st=" class='current'";
} else {
  $st="";
} 
include'header.php';

$perpagevalue=20;
$cond="LIMIT $perpagevalue";
$conde='';
$condi='';
$depo='active';

if(isset($_POST['perpage']))
		{
			$perpagevalue=$_POST['perpagevalue'];
			$cond="LIMIT $perpagevalue";
		}
if(isset($_POST['search']))
		{
			$searchkeyword=$_POST['searchkeyword'];
		if($searchkeyword)
			$conde="AND (`Fname` LIKE '%$searchkeyword%' OR `Lname` LIKE '%$searchkeyword%' OR `Idno` LIKE '%$searchkeyword%' OR `Contact1` LIKE '%$searchkeyword%' OR `Contact2` LIKE '%$searchkeyword%')";
		else
			$conde='';
		}
if(isset($_POST['submitfilter']))
		{
			$depo=$_POST['depo'];
$_SESSION['Depa']=$depo;
}
if(!$_SESSION['Depa'])
$_SESSION['Depa']='active';

if(isset($_POST['delete_id']))
		{
			$rowid=$_POST['rowid'];
			$then=mysqli_query($conn, "UPDATE `employees` SET `Status`='1001' WHERE `Eid`='$rowid' LIMIT 1");
		}
		
		if($_SESSION['Depa']=='active')
			$condi="AND `Status`='0'";
		else
			$condi="AND `Status`='1'";

$do=mysqli_query($conn, "SELECT *FROM `employees` WHERE `Eid`!='1001' $conde $condi $cond");
$fo=mysqli_num_rows($do);
?>	  
	  
	 <div class="container-fluid main-content">
<div class="page-title">
<div class="row">
<div class="col-md-6">
<h2 style='margin-top:-20px; margin-bottom: 5px; color:#ffcc33'>Utilisateurs</h2>
</div>
<div class="col-md-6">
 <div class="col-md-5 pull-right" style='text-align:right;'>
 
 </div></div>
</div></div>
  <div class="row">
        <div class="col-md-2">
		<ul class="list-group">
			 			  <li class="list-group-item active">
           <a href="employees.php">
           <p>
           <i class="lnr lnr-menu-circle"></i>&nbsp;Liste des utilisateurs
           </p></a>
           </li>
           
		                            <li class="list-group-item">
           <a href="new_employee.php">
           <p>
           <i class="lnr lnr-plus-circle"></i>&nbsp;Nouvel utilisateur
           </p></a>
           </li>
                       </ul>
		
         
  
            <div class="widget-container fluid-height">
              <div class="widget-content">
               
                <div class="panel-group" id="accordion">
                  <div class="panel">
                    <div class="panel-heading">
                    </div> 
                  </div>
                  <div class="panel">
                    <div class="panel-heading">
                      <div class="panel-title">
                      </div>
                    </div>
                    <div class="panel-collapse collapse in" id="collapseTwo">
                    </div>
                  </div>
                  <div class="panel filter-categories">
                    <div class="panel-heading">
                      <div class="panel-title">
               <a class="accordion-toggle collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseThree">
                        <div class="caret pull-right"></div>  
                        Trier par</a>
                      </div>
                    </div>
                    <div class="panel-collapse collapse in" id="collapseThree">
                      <div class="panel-body">
                      <form method="POST" action="employees.php">
                      <input value="view_employees" name="user" type="hidden">
                      <select class="form-control" name="department">
                      <option selected="selected" value="">Afficher tout</option>
              
                      </select><br>
                      <button class="btn btn-block btn-primary" type="button" name="submitfilter">
                      <i class="lnr lnr-checkmark-circle"></i> Soumettre </button>
                      </form></div></div>   </div>
                </div>
              </div>
            </div>        
         </div>
         
         
         <!-- Search and show per page on top of table -->
         <div class="col-md-10">
          <div class="row">
           <div class="col-md-3"> 
           <form action="employees.php" method="POST" class="form-horizontal ">
        <input name="searchkeyword" value="" type="hidden">
        <input name="column_name" value="" type="hidden">
    
            <div class="col-md-7"> 
           <select name="perpagevalue" class="form-control">
                              <option selected="selected" value="20">020 par page</option>
                              <option value="50">050 par page</option>
                              <option value="100">100 par page</option>
                              <option value="200">200 par page</option>
                              <option value="300">300 par page</option>
                              <option value="500">500 par page</option>
                            
               </select>
          
         </div>    
          
                    <div class="col-md-5"> 
      
                 <button class="btn  btn-primary  btn-block" type="submit" name="perpage"><i class="lnr lnr-chevron-right-circle"></i> Afficher </button>
				
          </div> 
    
        </form>
        </div>
          
          
           <div class="col-md-9">
           

        <form action="" method="post" class="form-horizontal ">
                  
                       <div class="col-md-7 text-center" style="padding-top:10px;"> 
                       
		<span>Nombre d'enregistrements trouvés : <b><?php echo" $fo / $perpagevalue" ?></b></span>
                        </div>
                       <div class="col-lg-5 input-group">
                       
                      <input class="form-control" name="searchkeyword" placeholder="search" type="text">
                      <input value="" name="department" type="hidden">
                      <span class="input-group-btn">
                        <button class="btn  btn-primary" type="submit" name="search"><i class="lnr lnr-magnifier"></i> Chercher </button>
                      </span>
                      
                      
                      </div>
         </form>
            </div> 
               
            </div>
            
            <div class="row" style='padding-top:-30px;'>
            <div class="col-md-12">
            <span>&nbsp;&nbsp;&nbsp;</span>  
            <div class="widget-container fluid-height clearfix" style='margin-top:-40px;'>
            <div class="widget-content padded clearfix">
                
                                 <table class="table table-striped table-hover table-sm" style='margin-top:-20px;'>     
                                      <thead>
                    <tr role="row">
                     <th> No </th> 
                       <th> Code </th>
                       <th> Nom/Post-Nom </th>
                       <th> Prénom </th> 
                       <th> Calculation </th>
                       <th><center> Telephone&nbsp;No </th>
					   <th><center> Identification </th>
					   <th><center> Accèss </th>
                        <th colspan='2' class="text-center"> Actions</th>
                     </tr>
                    </thead>
                                        <tbody>
                                          
				<?php
				$n=1;
				while($ro=mysqli_fetch_assoc($do)){
$code=$ro['Eid'];
$fna=$ro['Fname'];
$lna=$ro['Lname'];
$dep=$ro['Depart'];
$cont=$ro['Contact1'];
$idn=$ro['Idno'];
$pos=$ro['Currentp'];
$user="$fna $lna";

$dup=mysqli_query($conn, "UPDATE `employees` SET `User`='$user' WHERE `Eid`='$code'");

$then=mysqli_query($conn, "SELECT `Depart` FROM `depart` WHERE `Number` = '$dep'");
$ren=mysqli_fetch_assoc($then);
$dep=$ren['Depart'];

$theni=mysqli_query($conn, "SELECT `Postname` FROM `position` WHERE `Postid` = '$pos'");
$reni=mysqli_fetch_assoc($theni);
$pos=$reni['Postname'];

	print("<tr><td class='hidden-xs'> $n</td><td class='hidden-xs'> $code</td><td> $fna</td><td> $lna</td><td class='hidden-xs'> $dep</td>
	<td align='right'> $cont</td><td class='hidden-xs' align='right'> $idn</td><td class='hidden-xs'> $pos</td>
	
	  <td  align='right' style='width:50px;padding:0px;'><div class='action-buttons'>
                                                <a class='table-actions' href='vemployee.php?id=$code'>Afficher</a></td>

						<form method=post action='new_employee.php'><td align='right' style='width:60px;padding:0px;'>
                        <input type='hidden' name='rowid' value='$code'>
                           <button class='btn-xs btn-link' type='submit' name='edit_id'>
						   <span style=color:blue;>Modifier</span></button></td></form></tr>");
												$n++;
				}
				?>
                    </tbody>   
                  </table>
                                      <div class="row">
                 </div>
                                
              </div>
            </div>
        </div>
       </div>
       </div>
       </div> </div> <?php
	   include'footer.php';
	   ?>