<?php
require_once('../function.php');
connectdb();
session_start();

if (!is_user()) {
	redirect('index.php');
}

?>

		

<?php
 $user = $_SESSION['username'];
$usid = mysql_query("SELECT id FROM users WHERE username='".$user."'");
 $uid = $usid[0];
 include ('header.php');
 ?>


<?php include('includes/loader.php'); ?>
    <!-- styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/fullcalendar.css" rel="stylesheet">
    <link href="lib/colorpicker/css/colorpicker.css" rel="stylesheet">
    <link href="lib/validation/css/validation.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  
    <div class="container">
	  
      <a href="index.php" class="btn btn-default pull-right" style="margin-bottom: 20px;">View Events</a>
		
      <div class="clearfix"></div>
        
      <div class="box">
        <div class="header"><h4>Add Event</h4></div>
        <div class="content pad"> 
            
            <form id="add_event">
            
                <label>Title:</label>
                <input type="text" class="validate[required] form-control" name="title" placeholder="Event Title" id="title">
                <label>Description:</label>
                <textarea class="form-control" name="description" id="description" placeholder="Event Description"></textarea>
                <div class="pull-left mr-10">
                <label>Start Date:</label>
                <input type="text" name="start_date" class="validate[required] form-control input-sm" id="datepicker">
                </div>
                <div class="pull-left">
                <label>Start Time:</label>
                <input type="text" class="form-control input-sm" name="start_time" placeholder="HH:MM:SS" id="tp1">
                </div>
                <div class="clearfix"></div>
                <div class="pull-left mr-10">
                <label>End Date:</label>
                <input type="text" name="end_date" class="form-control input-sm" id="datepicker2">
                </div>
                <div class="pull-left">
                <label>End Time:</label>
                <input type="text" class="form-control input-sm" name="end_time" placeholder="HH:MM:SS" id="tp2">
                </div>
                <div class="clearfix"></div>
                <label>Event Color:</label>
                <input type="text" class="form-control input-sm" name="color" id="cp">
                <label>Display Time:</label>
                <select name="allDay" class="form-control">
                    <option value="true" selected>Yes</option>
                    <option value="false">No</option>
                </select>
                <label>Url:</label>
                <input type="text" class="form-control" name="url" id="url" placeholder="http://www.domain.com">
                <p class="help-block">Hint: If this event does not have url please leave blank</p>
    
                <button type="submit" onclick="calendar.save()" class="btn btn-primary pull-right">Add Event</button>
                
            </form>
            
        </div> 
    </div>

    </div> <!-- /container -->

    <!-- javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/fullcalendar.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.calendar.js"></script>
    <script src="lib/colorpicker/bootstrap-colorpicker.js"></script>
    <script src="lib/timepicker/bootstrap-timepicker.js"></script>
    <script src="lib/validation/jquery.validationEngine.js"></script>
    <script src="lib/validation/jquery.validationEngine-en.js"></script>
    <script src="js/custom.js"></script>
    
    <script type="text/javascript">
		$().FullCalendarExt();
	</script>

  <?php
 include ('footer.php');
 ?>

