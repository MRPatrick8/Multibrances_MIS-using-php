<?php
class visitResponse
	{
	var $id;
	var $id_visit_brand;
	var $id_question;
	var $response;
	var $audit_response;
	var $tableVisitResponse;
	var $tableVisitBrand;
	var $tableVisit;
	var $message;
	var $number_lines;

// Opening the database	
	function visitResponse()
		{
		$this->id = -1;
		$this->tableVisitResponse = "b2b_visit_response";
		$this->tableVisitBrand = "b2b_visit_brand";
		$this->tableVisit = "b2b_visit";
		//account infos
		$filename = 'xtxwpd.php';
		if(file_exists($filename)) 
			{
			$f = fopen ($filename,'r');
			if(!feof ($f)) 
				{
				$buffer = fgets($f, 4096);
				list($this->user,$this->host,$this->pwd,$this->db_name) = explode(";",$buffer);
				}
			fclose ($f);
			}
			//die(print_r($this));

		
		$this->connexion = mysqli_connect($this->host, $this->user, $this->pwd, $this->db_name);
		if(!$this->connexion) 
			{
			die("Database connection failed: " . mysqli_connect_error());
			}
		
		$db = mysqli_select_db($this->connexion, $this->db_name);
		if(!$db) 
			{
			die("Database selection failed: " . mysqli_connect_error());
			}	

		}

//Consultation
	function getVisitResponse($id_visit_brand, $id_question)
		{
		$sql = "SELECT * ";
		$sql .= "FROM `".$this->tableVisitResponse."` ";
		$sql .= "WHERE `id_visit_brand` = '".$this->formatData($id_visit_brand)."'";
		$sql .= "AND `id_question` = '".$this->formatData($id_question)."' ;"; 
		
		$rsql = mysqli_query($this->connexion, $sql);
		//die($sql);
		if(mysqli_num_rows($rsql) == 0) 
			{
			$this->id = -1; 
			}
		else
			{
			$this->id = 1; 
			$row = mysqli_fetch_assoc($rsql);
			$this->id_visit_brand = $row['id_visit_brand'];
			$this->id_question = $row['id_question'];
			$this->response = $row['response'];
			$this->audit_response = $row['audit_response'];
			return true;
			}
		}
				
	function getVisitBrandResponse($id_visit, $id_brand='')
		{
		$sql = "SELECT * ";
		$sql .= "FROM `".$this->tableVisitResponse."` r,  `".$this->tableVisitBrand."` b, `".$this->tableVisit."` v  ";
		$sql .= "WHERE r.id_visit_brand = b.id ";
		$sql .= "AND b.id_visit = v.id ";
		$sql .= "AND v.id = '".$this->formatData($id_visit)."' ";
		if($id_brand)
			{
			$sql .= "AND b.id_band = '".$this->formatData($id_brand)."' ";
			}
		
		$rsql = mysqli_query($this->connexion, $sql);
		//die($sql);
		if(mysqli_num_rows($rsql) == 0) 
			{
			$this->id = -1; 
			}
		else
			{ 
			$ret = array();
			while($line = mysqli_fetch_object($rsql))
				{
				$ret[] = $line;
				}
			return $ret;
			}			
		}
				
	function countBrandAvailability($id_brand, $date)
		{
		$sql = "SELECT COUNT(DISTINCT(id_outlet)) ";
		$sql .= "FROM `".$this->tableVisitResponse."` r,  `".$this->tableVisitBrand."` b, `".$this->tableVisit."` v  ";
		$sql .= "WHERE r.id_visit_brand = b.id ";
		$sql .= "AND b.id_visit = v.id ";
		$sql .= "AND b.id_brand = '".$this->formatData($id_brand)."' ";
		$sql .= "AND date(v.datetime_visit) = '".$this->formatData($date)."' ";
		$sql .= "AND r.id_question = '1' ";
		$sql .= "AND r.response = 'Yes' "; 
				
		$rsql = mysqli_query($this->connexion, $sql);
		//die($sql);
		if(mysqli_num_rows($rsql) == 0) 
			{
			$this->id = -1;
			return 0; 
			}
		else
			{ 
			$line = mysqli_fetch_row($rsql);
			return $line[0];
			}			
		}
				
	function getAllVisitResponse($whereCritere='', $orderByCritere='')
		{
		$sql = "SELECT * ";
		$sql .= "FROM `".$this->tableVisitResponse."` ";
		
		if($whereCritere)
			{
			$sql .= "WHERE ".$whereCritere;
			}
		if($orderByCritere)
			{
			$sql .= "ORDER BY ".$orderByCritere;
			}
		
		$rsql = mysqli_query($this->connexion, $sql);
		//die($sql);
		if(mysqli_num_rows($rsql) == 0) 
			{
			$this->id = -1; 
			}
		else
			{ 
			$ret = array();
			while($line = mysqli_fetch_object($rsql))
				{
				$ret[] = $line;
				}
			return $ret;
			}			
		}
		
//Recording
	function setVisitResponse()
		{
		$this->id = $this->id_visit_brand;
		$sql = "INSERT INTO `".$this->tableVisitResponse."` (`id_visit_brand`, `id_question`, `response`, `audit_response`) ";
		$sql .= "VALUES ('".$this->id_visit_brand."','".$this->formatData($this->id_question)."','".$this->formatData($this->response)."','".$this->formatData($this->audit_response)."'); ";
		//die($sql);
		if(mysqli_query($this->connexion, $sql))
			{
			$this->message = "ok1";
			}
		else 
			{
			$this->id = -1;
			$this->message = "nok1";
			}
		}			

//Modification
	function updateVisitResponse($id_visit_brand, $id_question)
		{
		$sql = "UPDATE `".$this->tableVisitResponse."` SET ";
		$sql .= "`response` = '".$this->formatData($this->response)."', "; 
		$sql .= "`audit_response` = '".$this->formatData($this->audit_response)."' ";
		$sql .= "WHERE `id_visit_brand` = '".$this->formatData($id_visit_brand)."' ";
		$sql .= "AND `id_question` = '".$this->formatData($id_question)."';"; 
		//die($sql);
		if(mysqli_query($this->connexion, $sql))
			{
			$this->id = $id_visit_brand;
			$this->message = "ok2";
			}
		else 
			{
			$this->id = -1; 
			$this->message = "nok2";
			}
		}

//Removal
	function deleteVisitResponse($id_visit_brand, $id_question)
		{
		$sql = "DELETE FROM `".$this->tableVisitResponse."` ";
		$sql .= "WHERE `id_visit_brand` = '".$this->formatData($id_visit_brand)."' ";
		$sql .= "AND `id_question` = '".$this->formatData($id_question)."';"; 
		//die($sql);
		if(mysqli_query($this->connexion, $sql)) 
			{
			$this->id = $id_visit_brand;
			$this->message = "ok3";
			}
		else
			{ 
			$this->id = -1; 
			$this->message = "nok3";
			}
		}


	// Formatting data to avoid any problems that may be caused by the characters interpreted by PHP, MySQL or HTML (accented or special)
	function formatData($d)
		{
		return (htmlentities(mysqli_real_escape_string($this->connexion, trim($d)), ENT_QUOTES, 'ISO-8859-15'));
		}
	}
?>