<?php 
include('config.php');

require_once('outlet.class.php');
$newOutlet = new outlet();
$newOutlet2 = new outlet();

if(!empty($_REQUEST['txt_id']))
	{
	$newOutlet2->getOutlet($_REQUEST['txt_id']);
	}
//print_r($_REQUEST); die();

if(isset($_REQUEST['cmd_submit']))
	{
	switch ($_REQUEST['action']) 
		{
		
		//Recording
		case "2":
			$newOutlet->name_outlet = $_REQUEST['txt_name_outlet'];
			$newOutlet->manager_outlet = $_REQUEST['txt_manager_outlet'];
			$newOutlet->type_outlet = $_REQUEST['cbx_type_outlet'];
			$newOutlet->phone_outlet = $_REQUEST['txt_phone_outlet'];
			$newOutlet->email_outlet = $_REQUEST['txt_email_outlet'];
			$newOutlet->location_outlet = $_REQUEST['txt_location_outlet'];
			$newOutlet->gps_latitude_outlet = $_REQUEST['txt_gps_latitude_outlet'];
			$newOutlet->gps_longitude_outlet = $_REQUEST['txt_gps_longitude_outlet'];
			$newOutlet->login_outlet = $_REQUEST['txt_login_outlet'];
			$newOutlet->passcode_outlet = crypt($_REQUEST['txt_passcode_outlet'],'t14n15');
			$newOutlet->setOutlet();
			break;
		
		//Modification
		case "3":
			$newOutlet->name_outlet = $_REQUEST['txt_name_outlet'];
			$newOutlet->manager_outlet = $_REQUEST['txt_manager_outlet'];
			$newOutlet->type_outlet = $_REQUEST['cbx_type_outlet'];
			$newOutlet->phone_outlet = $_REQUEST['txt_phone_outlet'];
			$newOutlet->email_outlet = $_REQUEST['txt_email_outlet'];
			$newOutlet->location_outlet = $_REQUEST['txt_location_outlet'];
			$newOutlet->gps_latitude_outlet = $_REQUEST['txt_gps_latitude_outlet'];
			$newOutlet->gps_longitude_outlet = $_REQUEST['txt_gps_longitude_outlet'];
			$newOutlet->login_outlet = $_REQUEST['txt_login_outlet'];
			$newOutlet->passcode_outlet = crypt($_REQUEST['txt_passcode_outlet'],'t14n15');
			$newOutlet->updateOutlet($_REQUEST['txt_id']);
			break;
				
		//Removal
		case "4":
			$newOutlet->deleteOutlet($_REQUEST['txt_id']);
			break;
		
		case "5":
			$newOutlet->gps_latitude_outlet = $_REQUEST['txt_gps_latitude_outlet'];
			$newOutlet->gps_longitude_outlet = $_REQUEST['txt_gps_longitude_outlet'];
			$newOutlet->updateGPSOutlet($_REQUEST['txt_id']);
			break;
			
		case "Modifier2":
			$newOutlet->name_outlet = $_REQUEST['txt_name_outlet'];
			$newOutlet->type_outlet = $_REQUEST['txt_type_outlet'];
			$newOutlet->phone_outlet = $_REQUEST['txt_phone_outlet'];
			$newOutlet->email_outlet = $_REQUEST['txt_email_outlet'];
			$newOutlet->login_outlet = $_REQUEST['txt_login_outlet'];
			$newOutlet->updateInfosOutlet($_REQUEST['txt_id']);
			$newOutlet2->login_outlet = $newOutlet->login_outlet;
			break;
			
		//Mot de passe
		case "Modifier3":
			$oldPwd = crypt($_REQUEST['txt_password_outlet0'],'t14n15');
			$newPwd = crypt($_REQUEST['txt_password_outlet1'],'t14n15');
			if($oldPwd == $newOutlet2->password_outlet)
				{
				$newOutlet->password_outlet = $newPwd;
				$newOutlet->updateOutletPwd($_REQUEST['txt_id']);
				$newOutlet2->password_outlet = $newPwd;
				}
			else
				{
				$newOutlet->id = -1;
				$newOutlet->message = "db_pwd_msg1";
				}
			
			break;
		}
	}	
	
// Error Handling
$filters = '';
if(!empty($_REQUEST['redirect2']))
	{
	$filters = $_REQUEST['redirect2'];
	}

//Redirection
header('Location: '.$_REQUEST['redirect'].'?message='.$newOutlet->message.$filters);
exit;

?>