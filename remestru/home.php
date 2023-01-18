<?php
if(basename($_SERVER['PHP_SELF']) == 'home.php') {
  $co=" class='current'";
} else {
  $co="";
} 
include'header.php';
?>

<script src="style/chart.min.js"></script>  
        <!-- Statistics -->
                <div class="row">
          <div class="col-lg-12"><center>

		<?php
	$fog=mysqli_query($conn, "SELECT *FROM `provinces` ORDER BY `Province` DESC LIMIT 100");
		while($rog=mysqli_fetch_assoc($fog)){
			$prove=$rog['Province'];
			$chef=$rog['Chef'];
				$bte="submit";
				$nme="sprove";
				$tle="Cliquez pour ouvrir $namo";
				$ville=$terri=0;
				$clr="#FF7A00";
				$dsd="";

$see0=mysqli_query($conn, "SELECT `Number` FROM `account` WHERE `Province`='$prove' AND `Status`='0' ORDER BY `Province` ASC LIMIT 100000000");
				if($parts=mysqli_num_rows($see0))
					$bd="<span class='badge' style='float:right; font-size:12px; margin-right:0px; margin-top:5px; height:18px; background-color:#ff66cc; width:auto; text-align:center; color:#ffffff;'> $parts </span>";
				else
					$bd="";

			$see1=mysqli_query($conn, "SELECT `Number` FROM `villes` WHERE `Province`='$prove' AND `Ville` LIKE '%VILLE%' ORDER BY `Province` ASC LIMIT 100");
				$ville=mysqli_num_rows($see1);

			$see2=mysqli_query($conn, "SELECT `Number` FROM `villes` WHERE `Province`='$prove' AND `Ville` LIKE '%TERRI%' ORDER BY `Province` ASC LIMIT 100");
				$terri=mysqli_num_rows($see2);

				if($ville=='0' AND $terri=='0')
					$cls="color:#99cccc";
				else
					$cls="color:#006699";

				if(!$chef){
					$bte="button";
					$tle="Vous ne pouvez pas ouvrir cette province";
					$dsd="disabled";
					$clr="#ffcccc";
				}
					
		print("<div class='col-md-4'><form action='homepage.php' method='post'>
		<button type='$bte' name='$nme' style='color:$clr; font-weight:bold; font-size: 16px; 
		text-align:center; height: 70px; width:335px; cursor:pointer; border-radius:5px; margin:20px; border:1px solid teal;' 
		title='$tle' data-toggle='tooltip' data-placement='top' $dsd> $bd
		
		$prove <br><input type='hidden' name='prove' value='$prove'><font color='teal' size='2'> $chef </font><br>
		<font style='font-size:12px; $cls'> VILLE: $ville &nbsp;&nbsp;&nbsp;&nbsp; TERRITOIRE: $terri </font></button></form></div>");
		}
		?>

            

            </div>
        </div>        <!-- End Statistics -->



                </div>
              </div>
			 </div>       
          
        </div>  </div>  
	

<?php
include'footer.php';
?>
