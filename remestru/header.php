<?php
session_start();
if($_SESSION['Userid'] == null OR $_SESSION['Loge'] == null){
	Header("location:index.php");
	exit();
}

	include'connection.php';

 $fname=$_SESSION['Fname'];
 $lname=$_SESSION['Lname'];
 $userid=$_SESSION['Userid'];
 $loge=$_SESSION['Loge'];
	$cna=$_SESSION['Cna'];
	$prove=$_SESSION['Prove'];
?>
<!DOCTYPE html>
   <html class=""><meta charset="utf-8">
<head><meta http-equiv="content-language" content="fr-fr">
    <title>   <?php echo $cna ?>    </title>
	<link rel="shortcut icon" type="image/png" href="imgs/logo.png"/>
    <link href="style/css.css" media="all" rel="stylesheet" type="text/css">
    <link href="style/bootstrap.css" media="all" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style/icon-font.css">
    <link href="style/jquery.css" media="all" rel="stylesheet" type="text/css">
    <link href="style/fullcalendar.css" media="all" rel="stylesheet" type="text/css">
    <link href="style/datatables.css" media="all" rel="stylesheet" type="text/css">
    <link href="style/datepicker.css" media="all" rel="stylesheet" type="text/css">
    <link href="style/timepicker.css" media="all" rel="stylesheet" type="text/css">
    <link href="style/style.css" media="all" rel="stylesheet" type="text/css">
    <!-- for mark_leave date design -->
    <link href="style/jquery-ui.css" media="all" rel="stylesheet" type="text/css">
    <!-- *********************************************************** -->

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <script src="style/jquery-1.js" type="text/javascript">  </script>
     <!-- for mark_leave date  -->
  <script src="style/jquery-ui.js" type="text/javascript"></script>
  <script src="style/jquery.min.js"></script>
  <script src="style/jquery-ui.min.js"></script>

  <!-- *************************************************************************** -->

				 <script>
				 $(document).ready(function () {
$('#dtVerticalScrollExample').DataTable({
"scrollY": "200px",
"scrollCollapse": false,
});
$('.dataTables_length').addClass('bs-select');
});

$(document).ready(function () {
$('#dtDynamicVerticalScrollExample').DataTable({
"scrollY": "50vh",
"scrollCollapse": true,
});
$('.dataTables_length').addClass('bs-select');
});

  
	 $(function() 
{
 $( "#search" ).autocomplete({
  source: 'search.php'
 });
});

 $(function() 
{
 $( "#searcho" ).autocomplete({
  source: 'searcho.php'
 });
});

 $(function() 
{
 $( "#searchi" ).autocomplete({
  source: 'searchi.php'
 });
});

 $(function() 
{
 $( "#searchu" ).autocomplete({
  source: 'searchu.php'
 });
});

 $(function() 
{
 $( "#searchs" ).autocomplete({
  source: 'searchs.php'
 });
});
</script>

  <style type="text/css">.fancybox-margin{margin-right:0px;}</style>

   <style type="text/css" media="screen">
 .hiddenDiv {
 display: none;
 }
 .visibleDiv {
 display: block;
 border: 1px grey solid;
 margin-top: 5px;
  margin-bottom: 0px;
   padding-top: 5px;
    padding-bottom: 5px;
 }
 </style>

 <style>
			.table-hover thead tr:hover th, .table-hover tbody tr:hover td {
    background-color: powderblue;
}
</style>
  
  <style type="text/css">
        .dollars:before {  }
    </style>
    <style type="text/css">

 @media (max-width: 50em) {
.element {
display: none;
}
  }

@media (min-width: 49em) {
.mobile {
display: none;
}
  }
</style>

<style type="text/css">
    @media screen {
        div.divFooter {
            display: none;
        }
    }
    @media print {
        div.divFooter {
    position: relative;
margin:-5px 10px 0px 40px; 
float:center;
height:auto;
        }
    }
	

</style></head>
   <div class="divFooter">
   <table width='90%'><tr><td style="padding:0px 5px 0px 20px;" width='20%'>
   <img src="imgs/logo.png" width="120px" height="64px"></td><td align='left'>
<?php echo $cna ?> <br><?php echo"$pho1 &nbsp;&nbsp; &nbsp;&nbsp; $pho2"; ?> <br> TIN/VAT: <?php echo $tax ?>
</td></tr></table>
</div><body class="default" style="background-color:#f9f9f9;">
<!--
  <body class="default" style="margin:0px; background-image: url('imgs/logo.png'); background-repeat: no-repeat;
  background-attachment: fixed; background-position: center; height:100%; 
  background-position: 50% 50%;
  background-size: cover;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;"> 

-->

<img style="margin-left:50px; position:absolute; top:7%; left:1%;z-index:100000;width:100px; position: fixed;" class="element hidden-print" src="imgs/logo.png" height="54px">

<?php
$month=array();
$month[01]='Janvier';
$month[02]='Février';
$month[03]='Mars';
$month[04]='Avril';
$month[05]='Mai';
$month[06]='Juin';
$month[07]='Juillet';
$month[08]='Août';
$month[09]='Septembre';
$month[10]='Octobre';
$month[11]='Novembre';
$month[12]='Décembre';

?>

    <div class="modal-shiftfix">
      <!-- Navigation -->
      <div class="navbar navbar-fixed-top scroll-hide" style='height:106px;'>
        <div class="container-fluid top-bar" style='background-color:#1F85B5; height:40px;'>
          <div class="pull-right">
            <ul class="nav navbar-nav pull-right">

 <li class="dropdown notifications hidden-xs">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <script type="text/javascript" src="style/date_time.js"></script>   
				<span id="date_time" style="width:220px; text-align:center; font-size:18px; color:#F0F70C;"></span> 
            <script type="text/javascript">window.onload = date_time('date_time');</script> </a>
              </li>
                 
            <li class="dropdown user hidden-xs"><a data-toggle="dropdown" class="dropdown-toggle" href="#" style="color:#F0F70C;">

         <img src="<?php echo"imgs/images.png" ?>" height="24" width="24" title='<?php echo"$code : $fname $lname"; ?>'>
						 <?php echo $fname ?><b class="caret"></b>

                   </a>
                <ul class="dropdown-menu">
              <li><a href="password.php?pro=202cb962ac59075b964b07152d234b70">
               <i class="lnr lnr-lock"></i>Change Password</a>
              </li>
                <li><?php echo"<a href='vemployee.php?id=$userid'>"; ?>
             <i class="lnr lnr-mustache"></i>Votre Profil</a>
                  </li>

              <li><a href="destroy.php?pro=202cb962ac59075b964b07152d234b70">
                    <i class="lnr lnr-power-switch"></i>Sortir</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <button class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
          <a class="logo" href="#" style="color:#F0F70C;"><?php echo $cna ?></a>
        </div>
        <div class="container-fluid main-nav clearfix" style="border:0px solid red; background-color:#F6F98D;">
          <div class="nav-collapse" style='margin-top:-5px;'>

          <ul class="nav">

              <li style="border: 0px solid black; margin-top:4px;">
                <a <?php echo $co ?> href="home.php">
                <span aria-hidden="true" class="lnr lnr-home"></span>Accueil</a>
              </li>
		 <?php
	if(isset($_POST['sprove']))
	{
    $_SESSION['Prove']=$_POST['prove'];
	}
		 if($_SESSION['Prove'])
			$stilo="";
		  else
			$stilo="style='pointer-events:none;'";
	$quorder=mysqli_query($conn, "SELECT *FROM `account` WHERE `Status`='2' ORDER BY `number` ASC");
			$forder=mysqli_num_rows($quorder);
			
	$qpay=mysqli_query($conn, "SELECT *FROM `account` WHERE `Amount`>`Paid` AND `Status`='0' ORDER BY `number` ASC");
			$fpay=mysqli_num_rows($qpay);

			$notis=$forder+$fpay;
				
		 if($_SESSION['Regipage']){
						?>

			   <li <?php echo $stilo ?>><a <?php echo $rg ?> href="register.php?id=202cb962ac59075b964b07152d234b70">
                <span aria-hidden="true" class="hightop-forms"><i class="lnr lnr-laptop-phone"></i></span>Registration<b class="caret">
				
				<?php
					if($notis)
		echo"<span class='badge' style='float:right; font-size:12px; margin-right:-5px; margin-top:-30px; height:18px; background-color:#ff66cc; width:auto; text-align:center; color:#ffffff;'> $notis </span>";
				?>
				</b></a>
              </li>

		<?php
		 }
				    if($_SESSION['Sysrepo']){
						?>
                <li class="dropdown" <?php echo $stilo ?>><a data-toggle="dropdown" <?php echo $cm ?> href="#">
                <span aria-hidden="true" class="hightop-forms"><i class="lnr lnr-calendar-full"></i></span>Rapports<b class="caret"></b></a>

                <ul class="dropdown-menu">
			<?php
		if($_SESSION['Xpro']!='1'){
			?>		 
				  	<li>
                    <a class='' href='partrepo.php?pro=202cb962ac59075b964b07152d234b70'>Rapport de Participants</a>
                  </li> 

				<?php
				}
		if($_SESSION['Xsto']!='1'){
			?>
				 <li>
                    <a class="" href="payrepo.php">Raport de Paiements</a>
                  </li>
				<?php
				}
					?>
					</ul>
			</li>

						<?php
					}
					 if($_SESSION['Settings']){
						?>
                <li class="dropdown" <?php echo $stilo ?>><a data-toggle="dropdown" <?php echo $st ?> href="#">
                <span aria-hidden="true" class="hightop-forms"><i class="lnr lnr-cog"></i></span>Sertissage<b class="caret"></b></a>

                <ul class="dropdown-menu">
				   <li><a href="privileges.php">
                    Privilèges
                      </a>
                  </li>  

				<li><a href="employees.php">
                    Utilisateurs
                      </a>
                  </li> 				  
				  
				  <li><a href="settings.php">
                    Configuration
                      </a> 
                  </li>
				  </ul>
				  </li>
				  <?php
				}
				  ?>
						    <li><a href="destroy.php">
                <span aria-hidden="true"><i class="lnr lnr-exit"></i></span>Sortir</a>

                  </li>
                </ul>
              </li>		  

		  
			<?php
			if(basename($_SERVER['PHP_SELF']) != 'home.php') 
			echo"<span class='pull-right hidden-xs' style='margin:-40px 30px; border:1px dotted teal; border-radius:5px; padding:0px 5px 0px 5px; 
			width:210px; text-align:center; font-size:18px; background-color:#99cccc; position:relative; float:right; height:25px;'>".$_SESSION['Prove']."</span>";
			?>

            </ul>
          </div>
        </div>
      </div>
      </div>

	  <?php
			$pto=0;
?>