<div class="col-md-4 text-center">
	<label>Gender</label><div style="border:1px solid powderblue; border-radius:5px; height:34px; padding-top:5px;">
		  <?php
		  if($gender=='Male'){
			$male='checked';
			$female='';
		}
		  else{
			$male='';
			$female='checked';
		}
		?>

         <label class="col-xs-6 text-center">
              <input name="gender" type="radio" value='Male' <?php echo $male ?>> Male </label>
	     <label class="col-xs-6 text-center">
			  <input name="gender" type="radio" value='Female' <?php echo $female ?>> Female </label> 
        </div></div>