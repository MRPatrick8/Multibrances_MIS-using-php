<div class="page-wrap">
            <div class="breadcrumb">
                <a class="btn orange" href="#"><i class="icon-refresh"></i></a> <a class="btn" href="#"><?php echo $this->uri->segment('1');?></a>
                <div class="pull-right">
                </div>
            </div>
             <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span6">
                        <div class="row-fluid">
                            <div class="span12 well">
                                <div class="title">Edit <?php echo $this->uri->segment('1');?></div>
                                <div class="well-content">
								<?php     

$attributes = array('class' => 'form-horizontal');
echo form_open(current_url(),$attributes); ?>
<?php echo $custom_error; ?>
<fieldset>
<?php echo form_hidden('id',$result->id) ?>

                                   <div class="control-group"><label for="feed_type" class="control-label">Feed_type<span class="required">*</span></label>                              
                                   <div class="controls">                              
                                    <input class="input-xlarge" id="feed_type" type="text" name="feed_type" value="<?php echo $result->feed_type ?>"  />
                                    <span class="help-inline">
                                     <?php echo form_error('feed_type'); ?>
                                   </span></div></div>
                                    

                                   <div class="control-group"><label for="amount" class="control-label">Amount<span class="required">*</span></label>                              
                                   <div class="controls">                              
                                    <input class="input-xlarge" id="amount" type="text" name="amount" value="<?php echo $result->amount ?>"  />
                                    <span class="help-inline">
                                     <?php echo form_error('amount'); ?>
                                   </span></div></div>
                                    

                                   <div class="control-group"><label for="receipt_no" class="control-label">Receipt_no<span class="required">*</span></label>                              
                                   <div class="controls">                              
                                    <input class="input-xlarge" id="receipt_no" type="text" name="receipt_no" value="<?php echo $result->receipt_no ?>"  />
                                    <span class="help-inline">
                                     <?php echo form_error('receipt_no'); ?>
                                   </span></div></div>
                                    

                                   <div class="control-group"><label for="date_issued" class="control-label">Date_issued<span class="required">*</span></label>                              
                                   <div class="controls">                              
                                    <input class="input-xlarge" id="date_issued" type="text" name="date_issued" value="<?php echo $result->date_issued ?>"  />
                                    <span class="help-inline">
                                     <?php echo form_error('date_issued'); ?>
                                   </span></div></div>
                                    
  <button type="submit" class="btn pull-right blue">Submit <i class="icon-ok icon-white"></i></button> 
  </fieldset>                                   
  </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>    
                   
             </div>
