<?php 
include('config.php');

require_once('visit.class.php');
$newVisit = new visit();

require_once('visit.brand.class.php');
$newVisitBrand = new visitBrand();
$newVisitBrand2 = new visitBrand();

require_once('visit.response.class.php');
$newVisitResponse = new visitResponse();
$newVisitResponse2 = new visitResponse();

//print_r($_REQUEST); die();

if(isset($_REQUEST['cmd_submit']))
	{
	switch ($_REQUEST['action']) 
		{

		case "23":
			// visit
			$newVisit->id_user = $_REQUEST['txt_user'];
			$newVisit->id_outlet = $_REQUEST['txt_outlet'];
			$newVisit->datetime_visit = $_REQUEST['txt_select'];
			$newVisit->audit_visit = 1;
			 
			if(empty($_REQUEST['txt_visit']))
				{
				$newVisit->setVisit();	
				}
			else
				{
				$newVisit->updateVisit($_REQUEST['txt_visit']);	
				}
			
			// visit brand
			$newVisitBrand->id_visit = $newVisit->id;
			$newVisitBrand->id_brand = $_REQUEST['txt_brand'];
			$newVisitBrand->audit_brand = 1;
			$newVisitBrand->available_brand = '1';
			
			$newVisitBrand2->getVisitBrandId($newVisit->id, $_REQUEST['txt_brand']); 
			if($newVisitBrand2->id < 0)
				{
				$newVisitBrand->setVisitBrand();	
				}
			else
				{
				$newVisitBrand->updateVisitBrand($newVisitBrand2->id);	
				}
			
			//visit question and response
			if(sizeof($_REQUEST['txt_response']) > 0)
				{
				$i=0; 
				while($i < sizeof($_REQUEST['txt_response']))
					{
					$newVisitResponse->id_visit_brand = $newVisitBrand->id;
					$newVisitResponse->id_question = $_REQUEST['question'][$i];
					$newVisitResponse->response = $_REQUEST['txt_response'][$i];
					$newVisitResponse->audit_response = 1;
					
					$newVisitResponse2->getVisitResponse($newVisitBrand->id, $_REQUEST['question'][$i]);
					
					if($newVisitResponse2->id < 0)
						{
						$newVisitResponse->setVisitResponse();	
						}
					else
						{
						$newVisitResponse->updateVisitResponse($newVisitBrand2->id, $_REQUEST['question'][$i]);	
						}
					$i++;
					}
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
header('Location: '.$_REQUEST['redirect'].'&message='.$newVisit->message.$filters);
exit;

?>