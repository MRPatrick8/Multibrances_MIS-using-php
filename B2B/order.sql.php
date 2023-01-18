<?php 
include('config.php');

require_once('order.class.php');
$newOrder = new order();
 
$_REQUEST['redirect'] = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/order.php';
//print_r($_REQUEST); 
//echo isset($_REQUEST['cmd_submit']);
//die();

if(isset($_REQUEST['cmd_submit']))
	{
	switch ($_REQUEST['action']) 
		{
		
		//Recording
		case "2":
			$newOrder->name_order = $_REQUEST['txt_name_order'];
			$newOrder->category_order = $_REQUEST['cbx_category_order'];
			$newOrder->carton_order = $_REQUEST['txt_carton_order'];
			$newOrder->serial_order = $_REQUEST['txt_serial_order'];
			$newOrder->price_ontrade_order = $_REQUEST['txt_price_ontrade_order'];
			$newOrder->price_offtrade_order = $_REQUEST['txt_price_offtrade_order'];
			$newOrder->setOrder();
			break;
		
		//Modification
		case "3":
			$newOrder->name_order = $_REQUEST['txt_name_order'];
			$newOrder->category_order = $_REQUEST['cbx_category_order'];
			$newOrder->carton_order = $_REQUEST['txt_carton_order'];
			$newOrder->serial_order = $_REQUEST['txt_serial_order'];
			$newOrder->price_ontrade_order = $_REQUEST['txt_price_ontrade_order'];
			$newOrder->price_offtrade_order = $_REQUEST['txt_price_offtrade_order'];
			$newOrder->updateOrder($_REQUEST['txt_id']);
			break;
				
		//Removal
		case "4":
			$newOrder->deleteOrderDetails($_REQUEST['txt_id']);
			$newOrder->deleteOrder($_REQUEST['txt_id']);
			break;
			
		case "5":
			$newOrder->id_user = $_REQUEST['txt_user'];
			$newOrder->id_outlet = $_REQUEST['txt_outlet'];
			$newOrder->date_order = date("Y-m-d H:i:s");
			$newOrder->details_order = '';
			$newOrder->status_order = 0;
			$newOrder->setOrder();
			
			if(sizeof($_REQUEST['txt_product']) > 0)
				{
				$i=0; 
				while($i < sizeof($_REQUEST['txt_product']))
					{
					//echo $i. ' -> ' . $_REQUEST['txt_product'][$i]. ' -> ' . $_REQUEST['txt_quantity'][$i].'<br><br>'; die();
					$newOrder->id_product = $_REQUEST['txt_product'][$i];
					$newOrder->quantity_ordered = $_REQUEST['txt_quantity'][$i];
					$newOrder->setOrderDetails($newOrder->id);
					$i++;
					}
				}
			break;
			
		}
	}	
	
// Error Handling
$err='ok';
if($newOrder->id == -1)
	{
	$err=1;
	}

//Redirection
header('Location: '.$_REQUEST['redirect'].'?message='.$newOrder->message);
exit;


?>