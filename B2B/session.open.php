<?php
include('config.php');

require_once('user.class.php');
$newUser = new user();

require_once('outlet.class.php');
$newOutlet = new outlet();

$infosChanged='';
if(!empty($_REQUEST['txt_login']))
	{
	$l = $_REQUEST['txt_login'];
	$infosChanged = '&err=ok&message=db_update_msg1';
	}
else
	{
	$l = $_REQUEST['txt_login'];
	}

if(!empty($_REQUEST['txt_password']))
	{
	$p = crypt($_REQUEST['txt_password'],'t14n15');
	}
else
	{
	$p = crypt($_REQUEST['txt_password'],'t14n15');
	}

$userStaff = $newUser->isUser($l,$p);
$userOutlet = $newOutlet->IsOutlet($l,$p);

if($userStaff === false && $userOutlet === false)
	{
	$uri = trim(dirname($_SERVER['PHP_SELF']), '/\\');
	header("Location: http://".$_SERVER['HTTP_HOST']."/".$uri."/index.php?info=1");
	}
else
	{
	
	session_start();
	
	$_SESSION['cu_time'] = time();
		
	if($userStaff)
		{
		$_SESSION['cu_id'] = $newUser->id;
		$_SESSION['cu_firstname'] = $newUser->firstname_user;
		$_SESSION['cu_lastname'] = $newUser->lastname_user;
		$_SESSION['cu_phone'] = $newUser->phone_user;
		$_SESSION['cu_email'] = $newUser->email_user;
		$_SESSION['cu_login'] = $newUser->login_user;
		$_SESSION['cu_password'] = $newUser->password_user;
		$_SESSION['cu_type'] = $newUser->type_user;
		$_SESSION['cu_outlet'] = false;
		
		$pageRedirect = 'dashboard.php';
		$_SESSION['cu_type_name'] = 'Supervisor';
		
		if($newUser->type_user == 2) 
			{
			$_SESSION['cu_type_name'] = 'Staff';
			$pageRedirect = 'dashboard2.php';
			}
		elseif($newUser->type_user == 3) 
			{
			$_SESSION['cu_type_name'] = 'Business Developer';
			$pageRedirect = 'audit.map.php';
			}
				
		}
	else
		{
		$_SESSION['cu_id'] = $newOutlet->id;
		$_SESSION['cu_firstname'] = $newOutlet->name_outlet;
		$_SESSION['cu_lastname'] = $newOutlet->location_outlet;
		$_SESSION['cu_phone'] = $newOutlet->phone_outlet;
		$_SESSION['cu_email'] = $newOutlet->email_outlet;
		$_SESSION['cu_login'] = $newOutlet->login_outlet;
		$_SESSION['cu_password'] = $newOutlet->passcode_outlet;
		$_SESSION['cu_type'] = $newOutlet->type_outlet;	
		$_SESSION['cu_outlet'] = true;	
		
		$pageRedirect = 'order.bulk.php';
		$_SESSION['cu_type_name'] = 'Customer';
		}
			
	$uri = trim(dirname($_SERVER['PHP_SELF']), '/\\');
	header("Location: http://".$_SERVER['HTTP_HOST']."/".$uri."/".$pageRedirect);
	exit();
	
/*	if(!empty($infosChanged))
		{
		$uri = trim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("Location: http://".$_SERVER['HTTP_HOST']."/".$uri."/user.infos.php?year=".$_REQUEST['year']."&id=".$newUser->id.$infosChanged);
		}
	else
		{
		$uri = trim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("Location: http://".$_SERVER['HTTP_HOST']."/".$uri."/".$pageRedirect."?year=".$_REQUEST['year']);
		}*/
	}
?>