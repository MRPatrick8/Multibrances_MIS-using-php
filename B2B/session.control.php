<?php
include('config.php');

session_start();
//print_r($_SESSION);die("+");


if(empty($_SESSION['cu_firstname']) or empty($_SESSION['cu_lastname']) or empty($_SESSION['cu_login']) or empty($_SESSION['cu_password']) or empty($_SESSION['cu_type']) or empty($_SESSION['cu_id']) or empty($_SESSION['cu_time']))
	{
	// Cas d'informations incompletes ou inexistantes
	$uri = trim(dirname($_SERVER['PHP_SELF']), '/\\');
	header("Location: http://".$_SERVER['HTTP_HOST']."/".$uri."/index.php?info=2");  
	exit();
	}	
elseif((time() - $_SESSION['cu_time']) > (60 * 45))
	{
	$_SESSION = array();
	$uri = trim(dirname($_SERVER['PHP_SELF']), '/\\');
	header("Location: http://".$_SERVER['HTTP_HOST']."/".$uri."/index.php?info=3");  
	exit();	
	}
else
	{
	$_SESSION['cu_time'] = time();
	$cu_firstname = $_SESSION['cu_firstname'];
	$cu_lastname = $_SESSION['cu_lastname'];
	$cu_login = $_SESSION['cu_login'];
	$cu_password = $_SESSION['cu_password'];
	$cu_type = $_SESSION['cu_type'];
	$cu_type_name = $_SESSION['cu_type_name'];
	$cu_id = $_SESSION['cu_id'];
	$cu_is_outlet = $_SESSION['cu_outlet'];
	}

$pp = array(
	"faculty.php",
	"department.php",
	"classe.php",
	"year.php",
	"fee.php",
	"sponsor.php",
	"bank.php",
	"slice.php",
	"student.payment.report.php",
	"student.payment.report2.php",
	"documents.php",
	"user.php",
	"import.student.da.php"
	);
	
if((in_array(basename($_SERVER['PHP_SELF']),$pp) && $cu_type != 1 && $cu_type != 2))
	{
	die("Access denied!");
	}
?>