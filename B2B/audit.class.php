<?php
class audit
	{
	var $id;
	var $id_visit;
	var $id_outlet;
	var $datetime_visit;
	var $audit_visit;
	
	var $tableVisit;
	var $message;
	var $number_lines;

// Opening the database	
	function audit()
		{
		$this->id = -1;
		$this->tableVisit = "b2b_visit";
		//$this->tableVisitBrand = "b2b_visit_brand";
		//33$this->tableVisitResponse = "b2b_visit_response";
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
	function getVisit($id)
		{
		$sql = "SELECT * ";
		$sql .= "FROM `".$this->tableVisit."` ";
		$sql .= "WHERE `id` = '".$this->formatData($id)."';"; 
		
		$rsql = mysqli_query($this->connexion, $sql);
		//die($sql);
		if(mysqli_num_rows($rsql) == 0) 
			{
			$this->id = -1; 
			}
		else
			{ 
			$row = mysqli_fetch_assoc($rsql);
			$this->id = $row['id']; 
			$this->name_brand = $row['name_brand'];
			$this->own_brand = $row['own_brand'];
			$this->status_brand = $row['status_brand'];
			return true;
			}
		}
		
	function getAllVisit($whereCritere='', $orderByCritere='')
		{
		$sql = "SELECT * ";
		$sql .= "FROM `".$this->tableVisit."` ";
		
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
	function setVisit()
		{
		$this->id = $this->tableNewId();
		$sql = "INSERT INTO `".$this->tableVisit."` (`id`, `name_brand`, `own_brand`, `status_brand`) ";
		$sql .= "VALUES ('".$this->id."','".$this->formatData($this->name_brand)."','".$this->formatData($this->own_brand)."','".$this->formatData($this->status_brand)."'); ";
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
	function updateVisit($id)
		{
		$sql = "UPDATE `".$this->tableVisit."` SET ";
		$sql .= "`name_brand` = '".$this->formatData($this->name_brand)."', "; 
		$sql .= "`own_brand` = '".$this->formatData($this->own_brand)."', "; 
		$sql .= "`status_brand` = '".$this->formatData($this->status_brand)."' ";
		$sql .= "WHERE `id` = '".$this->formatData($id)."';"; 
		
		if(mysqli_query($this->connexion, $sql))
			{
			$this->id = $id;
			$this->message = "ok2";
			}
		else 
			{
			$this->id = -1; 
			$this->message = "nok2";
			}
		}

//Removal
	function deleteVisit($id)
		{
		$sql = "DELETE FROM `".$this->tableVisit."` WHERE `id` = '".$this->formatData($id)."';"; 
		//die($sql);
		if(mysqli_query($this->connexion, $sql)) 
			{
			$this->id = $id;
			$this->message = "ok3";
			}
		else
			{ 
			$this->id = -1; 
			$this->message = "nok3";
			}
		}

//New id
	function tableNewId()
		{
		$rsql = mysqli_query($this->connexion, " select max(`id`) from `".$this->tableVisit."` ");
		$line = mysqli_fetch_row($rsql);
		$newid = $line[0]+1;
		return $newid;
		}
	// Formatting data to avoid any problems that may be caused by the characters interpreted by PHP, MySQL or HTML (accented or special)
	function formatData($d)
		{
		return (htmlentities(mysqli_real_escape_string($this->connexion, trim($d)), ENT_QUOTES, 'ISO-8859-15'));
		}
	}
?>