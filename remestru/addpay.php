<?php
// ****************************** Invoice payment modal *********************************
		echo"<div class='modal fade' id='exampleModalo$i' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true' 
		style='top:20px;'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content text-left'>
      <div class='modal-header'>
   <h5 class='modal-title' id='exampleModalLabel'>Ajouter un paiement <label class='pull-right'><b>$nom $postnom $prenom : &nbsp;&nbsp;&nbsp; $ <b>$resto</b></label> </h5>

      </div><div class='modal-body' style='text-align:center; height:auto;'><form action='' method='post'>";	 
	?>

 <div class="col-md-2" align="right">
			 <label class="control-label">Fait&nbsp;Par</label></div> 
			 
	<div class="col-md-5">
			 <input name="usa" class="form-control" type="text" value="<?php echo $loge ?>" style='height:30px; width:200px' readonly></div>

		<div class="col-md-1 text-right"> &nbsp;Date </div> 
			
	<div class="col-md-4"> 
          <div class="input-group date" data-provide="datepicker">	
	<input class="form-control form-center" name="dati" type="text" value="<?php echo $Dati ?>" onkeypress='return isNumberKey(event)' style="height:30px; width:120px;"><div class="input-group-addon"><span class="lnr lnr-calendar-full"></span>
				</div></div></div><div class="col-md-12"> </div><div class="row"> </div>
	
	
	<div class="col-md-3 text-right" style="margin-top:30px;"> Montant payé &nbsp; </div> 

 <div class="col-md-4" align="right" style="margin-top:30px;">
 <input name="amo" class="form-control text-center" type="text" onkeyup='format(this);' onkeypress='return isNumberKey(event)' value="<?php echo $resto ?>" style='height:30px;' placeholder="Paid Amount"></div>	   
		   
		   
		   <div class="col-md-5" align="right" style="margin-top:30px;">

	<?php	
		echo"<SELECT name='pline' class='form-control' style='font-size:14px; height:30px; padding-top:4px;' onchange='showDiv(this.value);' required>
				<OPTION VALUE='' SELECTED>Mode de paiement</OPTION>
				<OPTION value='Payé en espèces'>Payé en espèces</OPTION>
				<OPTION value='Dépôt bancaire-$i'>Dépôt bancaire</OPTION>
				<OPTION value='Payé par chèque-$i'>Payé par chèque</OPTION>
					</SELECT></div><div class='row'> </div>




            <div class='col-md-12 text-center'>
 <div id='Payé par chèque-$i' class='hiddenDiv' style='border:1px solid #6666ff; border-radius:5px; padding:15px; color:#000099; 
 font-weight:normal; height:120px; padding-top:20px; width:96%; margin:20px 0px -80px 20px; float:center;'>

<div class='col-md-6'> <input class='form-control form-center' name='cheno' type='text' placeholder='N° de Cheque' onkeypress='return isNumberKey(event)' style='height:30px;'></div>
		<div class='col-md-6'><div align='right'><select class='form-control' name='bna' style='height:30px; padding:0px;'>
				<option value='' selected='selected'>Nom de la banque</option>";
			
			$doi=mysqli_query($conn, "SELECT `Fname` FROM `banks` ORDER BY `Fname` ASC");
			while($roi=mysqli_fetch_assoc($doi)){
				$fna=$roi['Fname'];
			echo"<option value='$fna'> $fna </option>";
			}
			?>   
                            </select></div></div>

	<div class="col-md-6"><div align='right'><br> Date de Paiement
			&nbsp;:&nbsp; </div></div><div class="col-md-6"><br><div class="input-group date" data-provide="datepicker">
	<input class="form-control form-center" name="pda" type="text" value="<?php echo $Dati ?>" onkeypress='return isNumberKey(event)' style="height:30px;">
		<div class="input-group-addon"><span class="lnr lnr-calendar-full"></span>
				</div>
			</div>
			</div>
					</div>
							</div><div class="row"> </div>












<?php

           echo"<div class='col-md-12'>
 <div id='Dépôt bancaire-$i' class='hiddenDiv' style='border:1px solid #6666ff; border-radius:5px; padding:15px; color:#000099; 
 font-weight:normal; height:70px; padding-top:20px; width:96%; margin:20px 0px -80px 20px; float:center;'>

<div class='col-md-5'> <input class='form-control form-center' name='slino' type='text' placeholder='N° de bordereau' onkeypress='return isNumberKey(event)' style='height:30px;'></div>
		<div class='col-md-7'><div align='right'><select class='form-control' name='acco' style='height:30px; padding:0px;'>
				<option value='' selected='selected'>Compte bancaire</option>";
			
			$doi=mysqli_query($conn, "SELECT *FROM `baccount` ORDER BY `Number` ASC");
			while($roi=mysqli_fetch_assoc($doi)){
				$nu=$roi['Number'];
				$fna=$roi['Bank'];
				$acco=$roi['Account'];
				$purpo=$roi['Purpose'];
			echo"<option value='$nu' title='$purpo'> $fna $acco </option>";
			}
			?>   
                            </select></div></div>

	
					</div><div class="row"> </div><br></div>
						


<?php
	echo"</div><div class='modal-header' style='height:50px; text-align:right; padding:10px 20px 5px 5px;'> 
		<input type='hidden' name='naso' value='$code'><input type='hidden' name='copie' value='$copie'>
        <button type='button' class='btn btn-sm btn-default' style='width:120px' data-dismiss='modal'> FERMER </button>
        <button type='submit' class='btn btn-sm btn-success' style='width:120px' name='addpa'> SAUVEGARDER</button>
      </div></form>
    </div></div>
    </form></div>";

	// ***************************************************** End of modal ********************************************
	?>