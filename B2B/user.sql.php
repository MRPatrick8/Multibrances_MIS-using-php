<?php 
include('config.php');

require_once('user.class.php');
$newUser = new user();
$newUser2 = new user();

if(!empty($_REQUEST['txt_id']))
	{
	$newUser2->getUser($_REQUEST['txt_id']);
	}



/*			if(!empty($_REQUEST['cbx_outlet']))
				{
				$i=0; 
				while(!empty($_REQUEST['cbx_outlet'][$i]))
					{
					echo $_REQUEST['cbx_outlet'][$i].' u '.$_REQUEST['cbx_user'][$i].' c '.$_REQUEST['cbx_cycle'][$i].' d '.$_REQUEST['cbx_day'][$i].'<br>';
					$i++;
					}
				}		*/



//print_r($_REQUEST); die();

if(isset($_REQUEST['cmd_submit']))
	{
	switch ($_REQUEST['action']) 
		{
		
		//Recording
		case "2":
			$newUser->firstname_user = $_REQUEST['txt_firstname_user'];
			$newUser->lastname_user = $_REQUEST['txt_lastname_user'];
			$newUser->phone_user = $_REQUEST['txt_phone_user'];
			$newUser->email_user = $_REQUEST['txt_email_user'];
			$newUser->login_user = $_REQUEST['txt_login_user'];
			$newUser->password_user = crypt($_REQUEST['txt_password_user'],'t14n15');
			$newUser->type_user = $_REQUEST['cbx_type_user'];
			$newUser->setUser();
			break;
		
		//Modification
		case "3":
			$newUser->firstname_user = $_REQUEST['txt_firstname_user'];
			$newUser->lastname_user = $_REQUEST['txt_lastname_user'];
			$newUser->phone_user = $_REQUEST['txt_phone_user'];
			$newUser->email_user = $_REQUEST['txt_email_user'];
			$newUser->login_user = $_REQUEST['txt_login_user'];
			$newUser->password_user = crypt($_REQUEST['txt_password_user'],'t14n15');
			$newUser->type_user = $_REQUEST['cbx_type_user'];
			$newUser->updateUser($_REQUEST['txt_id']);
			break;
				
		//Removal
		case "4":
			$newUser->deleteUser($_REQUEST['txt_id']);
			break;
			
		case "5":
			if(!empty($_REQUEST['cbx_outlet']))
				{
				$i=0; 
				while(!empty($_REQUEST['cbx_outlet'][$i]))
					{
					$newUser->id_outlet = $_REQUEST['cbx_outlet'][$i];
					$newUser->id_user = $_REQUEST['cbx_user'][$i];
					$newUser->cycle_week = $_REQUEST['cbx_cycle'][$i];
					$newUser->cycle_day = $_REQUEST['cbx_day'][$i];
							
					$outletHasUser = $newUser2->getBusinessUser($_REQUEST['cbx_outlet'][$i]);
					
					if($outletHasUser)
						{
						if(!empty($_REQUEST['cbx_user'][$i]))
							{
							$newUser->updateUserOutlet($_REQUEST['cbx_outlet'][$i]);
							}
						else
							{
							$newUser->deleteUserOutlet($_REQUEST['cbx_outlet'][$i], $newUser2->id_user);
							}				
						}
					elseif(!empty($_REQUEST['cbx_user'][$i]))
						{
						$newUser->setUserOutlet();
						}
					$i++;
					}
				}		
			break;
			
		case "Modifier2":
			$newUser->firstname_user = $_REQUEST['txt_firstname_user'];
			$newUser->lastname_user = $_REQUEST['txt_lastname_user'];
			$newUser->phone_user = $_REQUEST['txt_phone_user'];
			$newUser->email_user = $_REQUEST['txt_email_user'];
			$newUser->login_user = $_REQUEST['txt_login_user'];
			$newUser->updateInfosUser($_REQUEST['txt_id']);
			$newUser2->login_user = $newUser->login_user;
			break;
			
		//Mot de passe
		case "Modifier3":
			$oldPwd = crypt($_REQUEST['txt_password_user0'],'t14n15');
			$newPwd = crypt($_REQUEST['txt_password_user1'],'t14n15');
			if($oldPwd == $newUser2->password_user)
				{
				$newUser->password_user = $newPwd;
				$newUser->updateUserPwd($_REQUEST['txt_id']);
				$newUser2->password_user = $newPwd;
				}
			else
				{
				$newUser->id = -1;
				$newUser->message = "db_pwd_msg1";
				}
			
			break;
		}
	}	
	
// Error Handling
$err='ok';
if($newUser->id == -1)
	{
	$err=1;
	}

$filters='';
if(!empty($_REQUEST['viewPage']))
	{
	$filters='&viewPage='.$_REQUEST['viewPage'];
	} 
if(!empty($_REQUEST['txt_search']))
	{ 
	$filters.='&txt_search='.$_REQUEST['txt_search'];
	}
elseif(!empty($_REQUEST['location']))
	{ 
	$filters.='&location='.$_REQUEST['location'];
	}

//Redirection
header('Location: '.$_REQUEST['redirect'].'?message='.$newUser->message.$filters);
exit;

/*
	//Redirection + r&eacute;sultat de l'ex&eacute;cution
	
	if(($err == 'ok') && (($_REQUEST['action'] == "Modifier2") || ($_REQUEST['action'] == "Modifier3")))
		{
		session_start();
		session_destroy();
		//Redirection
		$uri = trim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("Location: http://".$_SERVER['HTTP_HOST']."/".$uri."/session.open.php?year=".$_REQUEST['year']."&login=".$newUser2->login_user."&password=".$newUser2->password_user);
		exit;		
		}
	else
		{
		$m='';
		if(($_REQUEST['action'] == "Modifier2") || ($_REQUEST['action'] == "Modifier3"))
			{
			$m='&id='.$newUser2->id.'&action=Modifier&pwd=1';
			}
		//Redirection
		header('Location: '.$_REQUEST['redirect'].'?year='.$_REQUEST['year'].'&err='.$err.'&message='.$newUser->message.$m);
		exit;
		}
*/	

?>