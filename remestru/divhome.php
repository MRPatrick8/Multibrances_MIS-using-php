<?php
$allo=mysqli_query($conn, "SELECT *FROM `account` WHERE `Status`='0' ORDER BY `number` ASC");
			$fall=mysqli_num_rows($allo);
	if($_SESSION['Regipage'])
				$mlink='plist.php';
			else
				$mlink='';
        echo"<br><br><div class='col-md-4' style='margin:0px 0px 10px 0px;'>
		<div class='widget-container stats-container' style='border-radius:5px; height:60px;'>
		<a href='$mlink' style='onmouseover=this.color:#ffffff;'>";
				   if($fall)
	echo"<span class='badge' style='float:right; font-size:14px; margin-right:10px; height:20px; background-color:#ff6666; width:25px; text-align:center; margin-top:10px; color:#ffffff;' title='Purchase to be paid' data-toggle='tooltip' data-placement='top'> $fall </span>";
                echo"<div class='number'><br>
             <div class='lnr lnr-license homeicons'></div>";
				   if($prot)
			echo"<span class='badge' style='float:center; font-size:12px; margin-right:10px; height:18px; background-color:#cc3366; width:auto; position:absolute;'> $prot </span>";			
			
			echo"</div></a>
                <div class='text'>
                 <a href='$mlink' style='color:#66cc66'> PARTICIPANTS 
                </div>
              </div></a></div>";
			  
		if($_SESSION['Register'])
				$blink='register.php?id=202cb962ac59075b964b07152d234b70';
			else
				$blink='';	
			  
			  echo"<div class='col-md-4' style='margin:0px 0px 10px 0px;'>
		<div class='widget-container stats-container' style='border-radius:5px; height:60px;'>
		<a href='$blink' style='onmouseover=this.color:#ffffff;'>
                <div class='number'><br>
                  <div class='lnr lnr-laptop-phone homeicons'></div>
				   &nbsp;&nbsp;&nbsp; </div></a>
                <div class='text'>
                 <a href='$blink' style='color:#66cc66'> REGISTRATION </font>
                </div>
              </div></a></div>";
			  
		if($_SESSION['Approe'])
				$plink='approval.php';
		else
				$plink="";
			  
			  echo"<div class='col-md-4' style='margin:0px 0px 10px 0px;'>
		<div class='widget-container stats-container' style='border-radius:5px; height:60px;'>
		<a href='$plink' style='onmouseover=this.color:#ffffff;'>";
				   if($forder)
	echo"<span class='badge' style='float:right; font-size:14px; margin-right:10px; height:20px; background-color:#660099; width:25px; text-align:center; margin-top:10px; color:#ffffff;' title='Purchase to be paid' data-toggle='tooltip' data-placement='top'> $forder </span>";
                echo"<div class='number'><br>
                  <div class='lnr lnr-checkmark-circle homeicons'></div>
				   &nbsp;&nbsp;&nbsp; </div></a><div class='text'>
                 <a href='$plink' style='color:#66cc66'> APPROBATIONS 
                </div>
              </div></a></div>";

?>