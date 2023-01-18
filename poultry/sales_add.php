<?php 
require_once('../function.php');
include('../header.php');
include('../sidebar.php');
session_start();
/* if (is_user()) {
	redirect('home.php');
} */
?>
<div class="page-wrap">
            <div class="breadcrumb">
                <a class="btn orange" href="#"><i class="icon-refresh"></i></a> <a class="btn" href="#"><?php echo basename(__DIR__);?></a>
                <div class="pull-right">
                </div>
            </div>
             <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span6">
                        <div class="row-fluid">
                            <div class="span12 well">
                                <div class="title">Add <?php echo basename(__DIR__);?></div>
                                <div class="well-content">
<?php     
$attributes = array('class' => 'form-horizontal');
echo form_open(current_url(),$attributes); ?>
<?php // echo $custom_error; ?>
 <fieldset>

                                    <div class="control-group"><label for="breed_type" class="control-label">Breed_type<span class="required">*</span></label>                              
                                   <div class="controls"><select class="input-xlarge" id="breed_type" type="text" name="breed_type" value="<?php echo set_value('breed_type'); ?>"  />
                                   
                                 <?php   foreach($breed->result() as $rows):?>
                                   
                                   <option value='<?php echo $rows->id;?>'><?php echo $rows->breed_type;?></option>
                                   
                                   <?php endforeach;?>
                                   
                                   </select>
                                    <span class="help-inline">
                                     <?php echo form_error('breed_type'); ?>
                                   </span></div></div>
                                    

                                    <div class="control-group"><label for="booking_receipt_no" class="control-label">Booking_receipt_no<span class="required">*</span></label>                              
                                   <div class="controls"><input class="input-xlarge" id="booking_receipt_no" type="text" name="booking_receipt_no" value="<?php echo set_value('booking_receipt_no'); ?>"  />
                                    <span class="help-inline">
                                     <?php echo form_error('booking_receipt_no'); ?>
                                   </span></div></div>
                                    

                                    <div class="control-group"><label for="booking_amount" class="control-label">Booking_amount<span class="required">*</span></label>                              
                                   <div class="controls"><input class="input-xlarge" id="booking_amount" type="text" name="booking_amount" value="<?php echo set_value('booking_amount'); ?>"  />
                                    <span class="help-inline">
                                     <?php echo form_error('booking_amount'); ?>
                                   </span></div></div>
                                    

                                    <div class="control-group"><label for="final_receipt_no" class="control-label">Final_receipt_no<span class="required">*</span></label>                              
                                   <div class="controls"><input class="input-xlarge" id="final_receipt_no" type="text" name="final_receipt_no" value="<?php echo set_value('final_receipt_no'); ?>"  />
                                    <span class="help-inline">
                                     <?php echo form_error('final_receipt_no'); ?>
                                   </span></div></div>
                                    

                                    <div class="control-group"><label for="final_payment" class="control-label">Final_payment<span class="required">*</span></label>                              
                                   <div class="controls"><input class="input-xlarge" id="final_payment" type="text" name="final_payment" value="<?php echo set_value('final_payment'); ?>"  />
                                    <span class="help-inline">
                                     <?php echo form_error('final_payment'); ?>
                                   </span></div></div>
                                    

                                    <div class="control-group"><label for="quantity" class="control-label">Quantity<span class="required">*</span></label>                              
                                   <div class="controls"><input class="input-xlarge" id="quantity" type="text" name="quantity" value="<?php echo set_value('quantity'); ?>"  />
                                    <span class="help-inline">
                                     <?php echo form_error('quantity'); ?>
                                   </span></div></div>
                                    

                                    <div class="control-group"><label for="unit_price" class="control-label">Unit_price<span class="required">*</span></label>                              
                                   <div class="controls"><input class="input-xlarge" id="unit_price" type="text" name="unit_price" value="<?php echo set_value('unit_price'); ?>"  />
                                    <span class="help-inline">
                                     <?php echo form_error('unit_price'); ?>
                                   </span></div></div>
                                    

                                    <div class="control-group"><label for="total" class="control-label">Total<span class="required">*</span></label>                              
                                   <div class="controls"><input class="input-xlarge" id="total" type="text" name="total" value="<?php echo set_value('total'); ?>"  />
                                    <span class="help-inline">
                                     <?php echo form_error('total'); ?>
                                   </span></div></div>
                                    

                                    <div class="control-group"><label for="worker_id" class="control-label">Worker_id<span class="required">*</span></label>                              
                                   <div class="controls"><select class="input-xlarge" id="worker_id" type="text" name="worker_id" value="<?php echo set_value('worker_id'); ?>"  />
                                   
                                   <?php   foreach($worker->result() as $rows):?>
                                   
                                   <option value='<?php echo $rows->id;?>'><?php echo $rows->first_name;?> <?php echo $rows->last_name;?></option>
                                   
                                   <?php endforeach;?>
                                   
                                   </select>
                                    <span class="help-inline">
                                     <?php echo form_error('worker_id'); ?>
                                   </span></div></div>
                                    

                                    <div class="control-group"><label for="customer_id" class="control-label">Customer_id<span class="required">*</span></label>                              
                                   <div class="controls"><select class="input-xlarge" id="customer_id" type="text" name="customer_id" value="<?php echo set_value('customer_id'); ?>"  />
                                   <?php   foreach($customer->result() as $rows):?>
                                   
                                   <option value='<?php echo $rows->id;?>'><?php echo $rows->first_name;?> <?php echo $rows->last_name;?></option>
                                   
                                   <?php endforeach;?>
                                   
                                   </select>
                                    <span class="help-inline">
                                     <?php echo form_error('customer_id'); ?>
                                   </span></div></div>
                                    

                                    <div class="control-group"><label for="approved_worker_id" class="control-label">Approved_worker_id<span class="required">*</span></label>                              
                                   <div class="controls"><select class="input-xlarge" id="approved_worker_id" type="text" name="approved_worker_id"  />
                                   
                                   <?php   foreach($worker->result() as $rows):?>
                                   
                                   <option value='<?php echo $rows->id;?>'><?php echo $rows->first_name;?> <?php echo $rows->last_name;?></option>
                                   
                                   <?php endforeach;?>
                                   
                                   </select>
                                    <span class="help-inline">
                                     <?php echo form_error('approved_worker_id'); ?>
                                   </span></div></div>
                                  <div class="control-group">
                                            <label for="date" class="control-label">Date<span class="required">*</span></label>
                                            <div class="controls">
                                                <div class="bfh-datepicker">
                                                    <div class="input-prepend bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                                        <input  id="date" type="text" name="date" class="input span8" readonly><span class="help-inline">
                                     <?php echo form_error('date'); ?>
                                   </span>
                                                    </div>
                                                    <div class="bfh-datepicker-calendar">
                                                        <table class="calendar table table-bordered">
                                                            <thead>
                                                                <tr class="months-header">
                                                                    <th class="month" colspan="4">
                                                                        <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                                                                        <span></span>
                                                                        <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                                                                    </th>
                                                                    <th class="year" colspan="3">
                                                                        <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                                                                        <span></span>
                                                                        <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                                                                    </th>
                                                                </tr>
                                                                <tr class="days-header">
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   

                                    
                                    
  <button type="submit" class="btn pull-right blue">Submit <i class="icon-ok icon-white"></i></button> 
     </fieldset>                                
  </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>    
                   
             </div>
<?php
	include('../footer.php');
?>