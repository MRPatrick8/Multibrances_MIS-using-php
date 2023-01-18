<?php 
include('config.php');

require_once('product.class.php');
$newProduct = new product();

//print_r($_REQUEST); die();

if(isset($_REQUEST['cmd_submit']))
	{
	switch ($_REQUEST['action']) 
		{
		
		//Recording
		case "2":
			$newProduct->name_product = $_REQUEST['txt_name_product'];
			$newProduct->category_product = $_REQUEST['cbx_category_product'];
			$newProduct->carton_product = $_REQUEST['txt_carton_product'];
			$newProduct->size_product = $_REQUEST['txt_size_product'];
			$newProduct->serial_product = $_REQUEST['txt_serial_product'];
			$newProduct->price_ontrade_product = $_REQUEST['txt_price_ontrade_product'];
			$newProduct->price_offtrade_product = $_REQUEST['txt_price_offtrade_product'];
			$newProduct->setProduct();
			break;
		
		//Modification
		case "3":
			$newProduct->name_product = $_REQUEST['txt_name_product'];
			$newProduct->category_product = $_REQUEST['cbx_category_product'];
			$newProduct->carton_product = $_REQUEST['txt_carton_product'];
			$newProduct->size_product = $_REQUEST['txt_size_product'];
			$newProduct->serial_product = $_REQUEST['txt_serial_product'];
			$newProduct->price_ontrade_product = $_REQUEST['txt_price_ontrade_product'];
			$newProduct->price_offtrade_product = $_REQUEST['txt_price_offtrade_product'];
			$newProduct->updateProduct($_REQUEST['txt_id']);
			break;
				
		//Removal
		case "4":
			$newProduct->deleteProduct($_REQUEST['txt_id']);
			break;
			
		}
	}	
	
// Error Handling
$err='ok';
if($newProduct->id == -1)
	{
	$err=1;
	}

//Redirection
header('Location: '.$_REQUEST['redirect'].'?message='.$newProduct->message);
exit;


?>