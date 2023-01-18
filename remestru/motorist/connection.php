<?php
session_start();
$serv="localhost";  
$log="root";
$pass="";
$dbname="motorist";
$Time = gmdate('H:i:s', strtotime('+2 hours'));
$conn = mysqli_connect("$serv", "$log", "$pass", "$dbname");
if(isset($_POST['submit_settings']))
		{
			$mail=$_POST['mail'];
			$web=$_POST['web'];
			$adde=$_POST['adde'];
			$country=$_POST['country'];
			$city=$_POST['city'];
			$pho1=$_POST['pho1'];
			$pho2=$_POST['pho2'];
			$tax=$_POST['tax'];
			$cost=str_replace(',', '', $_POST['cost']);
	$doin=mysqli_query($conn, "UPDATE `company` SET `Email`='$mail', `Website`='$web', `Address`='$adde', `Country`='$country', `City`='$city', `Phone1`='$pho1', `Phone2`='$pho2', `Vat`='$tax', `Cost`='$cost'");
		}
		$priorder=0;
$hed=mysqli_query($conn, "SELECT *FROM company");
	$rd=mysqli_fetch_assoc($hed);
		$web=$rd['Website'];
		$cna=$rd['Cname'];
		$adde=$rd['Address'];
		$mail=$rd['Email'];
		$pho1=$rd['Phone1'];
		$pho2=$rd['Phone2'];
		$tax=$rd['Vat'];
		$city=$rd['City'];
		$country=$rd['Country'];
		$fcost=$rd['Cost'];

$Date = gmdate("Y-m-d");								$Dati = gmdate("d-m-Y");
$loge=$_SESSION['Loge'];
$_SESSION['Web']=$web;
$_SESSION['Cna']=$cna;

		$suser=$rd['Suser'];
		$spass=$rd['Spass'];
		$smsco=$rd['SMS'];
$pto=0;
?>
