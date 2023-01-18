<?php
// ************************** Edit sourcing record modal ******************************************************

echo"<div class='modal fade' id='tModal$n' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'><div class='modal-content'><div class='modal-header text-left'>
        <h5 class='modal-title' id='exampleModalLabel'>SOURCING RECORD <span class='pull-right'> $custo : $tag </span></h5>

      </div><form action='' method='post'>
      <div class='modal-body text-left'><div class='row'>

        <div class='form-group'>
			<div class='col-md-5' align='right'> 
            <label class='control-label'>Supplier's Name</label></div>
            <div class='col-md-6'>
           <input name='supplier' class='form-control' type='text' style='text-align:left;' value='$supplier' id='searchu' OnKeyup='return cUpper(this);' required>
            </div>
		</div>
			
			 	
		 <div class='form-group'>	 
			  <div class='col-md-5' align='right'>
			  <label class='control-label'>Physical Address</label></div>	

	 <div class='col-md-6'>
          <input name='physical' class='form-control' type='text' value='$physical'>
            </div>
		</div>


		 <div class='form-group'>
			<div class='col-md-5' align='right'> 
            <label class='control-label'>Contact Number</label></div>
            <div class='col-md-6'>
           <input name='contact' class='form-control' type='text' style='text-align:left;' value='$contact' OnKeyup='return cUpper(this);'>
            </div>
		</div>


		 <div class='form-group'>
			<div class='col-md-5' align='right'> 
            <label class='control-label'>Email Address</label></div>
            <div class='col-md-6'>
           <input name='email' class='form-control' type='text' style='text-align:left;' value='$email'>
            </div>
		</div>


		 <div class='form-group'>
			<div class='col-md-5' align='right'><br class='hidden-xs'> 
            <label class='control-label'>No of Items / CBM</label></div>
            <div class='col-md-3 col-xs-8' style='padding-right:0px;'><br class='hidden-xs'>
           <input name='items' class='form-control text-center' type='text' value='$items' onkeyup='format(this);' onkeypress='return isNumberKey(event)' title='No of items' data-toggle='tooltip' data-placement='top' required>
</div>
		   <div class='col-md-3 col-xs-4' style='padding-left:0px;'><br class='hidden-xs'>
           <input name='cbm' class='form-control text-center' type='text' value='$cbmo' onkeyup='format(this);' onkeypress='return isNumberKey(event)' title='Size (CBM)' data-toggle='tooltip' data-placement='top'>
            </div>
		</div>


		
			<div class='col-md-5' align='right'><br class='hidden-xs'>Total Value</div>
            <div class='col-md-3 col-xs-7' style='padding-right:0px;'><br class='hidden-xs'>
           <input name='value' class='form-control text-center' type='text' value='$valueo' onkeyup='format(this);' onkeypress='return isNumberKey(event)' title='Total Amount' data-toggle='tooltip' data-placement='top' required></div> 
		   
		   <div class='col-md-3 col-xs-5' style='padding-left:0px;'><br class='hidden-xs'>
		   <select class='form-control' name='currency' title='Currency' data-toggle='tooltip' data-placement='top'
		   style='padding-left:5px; padding-right:5px;' required><option value='' selected='selected'>Currency</option>";
			 
			$doi=mysqli_query($conn, "SELECT `Code`, `Rate` FROM `currency` WHERE `Code`!='' ORDER BY `Code` ASC");
			while($roi=mysqli_fetch_assoc($doi)){
				$fna=$roi['Code'];
				$rte=number_format($roi['Rate'], 2);
				if($currency==$fna)
					$s="selected";
				else
					$s="";
			echo"<option value='$fna' $s> $fna @ $rte </option>";
			}
		
		   echo"</select>
            </div>
		

		<div class='form-group'>
   <div class='col-md-5' align='right'><br class='hidden-xs'>
			  <label class='control-label'><br class='hidden-xs'>Item Description</label></div>

 <div class='col-md-6'><br class='hidden-xs'>
<textarea class='form-control' name='descript' style='height:60px; font-size:14px;'>$descript</textarea>
	</div>
	
	</div></div>

      </div><input type='hidden' name='code' value='$code'><input type='hidden' name='custo' value='$custo'>
	  <input type='hidden' name='type' value='$type'><input type='hidden' name='typ' value='$typ'>
	  <input type='hidden' name='nuo' value='$nuo'><input type='hidden' name='tag' value='$tag'>
        
		
	</div><div class='modal-header text-right' style='height:50px; padding-top:15px;'>	
		<button type='button' class='btn btn-xs btn-danger' data-dismiss='modal' style='width:80px;'> CANCEL </button>
        <button type='submit' name='edito' class='btn btn-xs btn-success' style='width:80px;'> UPDATE </button></div>
      </form>
  </div>
</div>";

// ****************************** Delete sourcing record modal ***************************************

echo"<div class='modal fade' id='xModal$n' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'><div class='modal-content'><div class='modal-header text-left'>
        <h5 class='modal-title' id='exampleModalLabel'>DELETE CONFIRMATION <span class='pull-right'> $supplier: $valueo $currency </span></h5>

      </div><form action='' method='post'>
      <div class='modal-body text-left' style='height:40px;'>
        <h5 style='color:#ff0033'>Are you sure you want to delete this record ?</h5>
      </div><input type='hidden' name='code' value='$code'><input type='hidden' name='custo' value='$custo'>
	  <input type='hidden' name='type' value='$type'><input type='hidden' name='typ' value='$typ'>
	  <input type='hidden' name='tag' value='$tag'><input type='hidden' name='nuo' value='$nuo'>
      <div class='modal-footer' style='margin-top:-10px; height:50px; padding-top:5px; border:0px solid blue;'>
        <button type='button' class='btn btn-sm btn-success' data-dismiss='modal'>&nbsp;NO&nbsp;</button>
        <button type='submit' name='delox' class='btn btn-sm btn-danger'>YES</button>
      </div></form>
    </div>
  </div>
</div>";

// ***************************** Add file modal **************************************

echo"<div class='modal fade' id='fModal$n' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'><div class='modal-content'><div class='modal-header text-left'>
        <h5 class='modal-title' id='exampleModalLabel'>ADD FILE <span class='pull-right'> $supplier: $valueo $currency </span></h5>

      </div><form action='' method='post' enctype='multipart/form-data'>
      <div class='modal-body text-left' style='height:auto;'><div class='row'>

	   <div class='form-group'>
			<div class='col-md-4'> &nbsp; File Type <br>
			<select class='form-control' name='ftype' required>
				<option value='' selected='selected'>SELECT TYPE</option><option value='QUOTATION'>QUOTATION</option>
				<option value='SALES INVOICE'>SALES INVOICE</option><option value='DELIVERY NOTE'>DELIVERY NOTE</option></select></div>
		<div class='col-md-1'> </div>
			
			<div class='col-md-7'> &nbsp; Choose File <br>

			<div class='fileupload fileupload-new' data-provides='fileupload'>
                <span class='btn btn-default btn-file' style='width:90px;'>
				<span class='fileupload-new'>Select</span><span class='fileupload-exists'>Change</span>
				<input name='file1' id='app_file' type='file' readonly='readonly' required></span><span class='fileupload-preview'></span>
						
              <p class='pull-right text-right'><small>Zip, txt, jpeg, png, pdf, doc (Max : 2M)</small></p>       
              </div><br>     


			</div></div>
      </div><input type='hidden' name='code' value='$code'><input type='hidden' name='custo' value='$custo'>
	  <input type='hidden' name='type' value='$type'><input type='hidden' name='typ' value='$typ'>
	  <input type='hidden' name='tag' value='$tag'><input type='hidden' name='nuo' value='$nuo'></div>
	  
	  <div class='modal-header text-right' style='margin-top:0px; height:50px; padding-top:15px;'>	
		<button type='button' class='btn btn-xs btn-danger' data-dismiss='modal' style='width:80px;'> CANCEL </button>
        <button type='submit' name='addfile' class='btn btn-xs btn-success' style='width:80px;'> SAVE </button>
      </div></form>
    </div>
  </div>
</div>";

// *********************** Change Rate ************************************************
			echo"<div class='col-lg-7'><div class='modal fade' id='rateModal$n' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'><div class='modal-content'><div class='modal-header text-left'>
        <h5 class='modal-title' id='exampleModalLabel'> Change Rate <span class='pull-right'> </span></h5>

      </div><form action='' method='post'>
      <div class='modal-body text-left' style='height:100px;'>
			<div class='row'>
		<div class='col-md-12'>
			<div class='col-md-6 text-right' style='padding-top:30px;'><b> Price / CBM </b>
            </div>


	<div class='col-md-5'><br><div class='input-group'>
	<input name='rats' class='form-control text-center' type='text' onkeyup='format(this);' onkeypress='return isNumberKey(event)' title='Rate' data-toggle='tooltip' data-placement='top' value='$rateo' required><span class='input-group-addon text-info'>$currency</span>
  </div>

</div>

			</div></div></div><hr>
			<input type='hidden' name='code' value='$code'><input type='hidden' name='custo' value='$custo'>
	  <input type='hidden' name='type' value='$type'><input type='hidden' name='typ' value='$typ'>
	  <input type='hidden' name='tag' value='$tag'><input type='hidden' name='nuo' value='$nuo'>
      <div class='modal-footer' style='margin-top:-10px; height:50px; padding-top:5px; border:0px solid blue;'>
        <button type='button' class='btn btn-sm btn-danger' data-dismiss='modal' style='width:80px;'> CANCEL </button>
        <button type='submit' name='change' class='btn btn-sm btn-success' style='width:80px;'> UPDATE </button>
      </div></form>
    </div>
  </div>
</div>";
?>