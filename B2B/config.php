<?php
ini_set("register_globals","off");
//ini_set("display_errors","off");  
ini_set("expose_php","off");
//ini_set('session.cookie_secure', '0');

date_default_timezone_set('Africa/Kigali');
header('Content-Type: text/html; charset=ISO-8859-15');

// action 
if(empty($_REQUEST["c"]))
	{
	$_REQUEST["c"]=1;
	}
switch ($_REQUEST["c"]) 
	{
    case 2:
        $dConfig["submit"]="Save New";
		$dConfig["info"]="Enter information in the form and click on Save";
		break;
	case 3:
        $dConfig["submit"]="Update";
        $dConfig["info"]="Change the information displayed in the form and click on Update";
        break;
    case 4:
        $dConfig["submit"]="Delete";
        $dConfig["info"]="The information displayed in the form will be removed, click Delete to continue";
        break;
    default:
		$_REQUEST["c"]=1;
		$dConfig["submit"]="View";
        $dConfig["info"]="";
        break;
	}

$dConfig["message"]["ok1"] = "Record inserted successfully";
$dConfig["message"]["nok1"] = "Insert failed: an unexpected error has occurred!";
$dConfig["message"]["ok2"] = "Record updated successfully";
$dConfig["message"]["nok2"] = "Update failed: an unexpected error has occurred!";
$dConfig["message"]["ok3"] = "Record deleted successfully";
$dConfig["message"]["nok3"] = "Delete failed: an unexpected error has occurred!";
              
?>