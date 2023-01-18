<?php
class visitBrand
	{
	var $id;
	var $id_visit;
	var $id_brand;
	var $audit_brand;
	var $available_brand;
	var $tableVisitBrand;
	var $message;
	var $number_lines;

// Opening the database	
	function visitBrand()
		{
		$this->id = -1;
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
	function getVisitBrand($id)
		{
		$sql = "SELECT * ";
		$sql .= "FROM `".$this->tableVisitBrand."` ";
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
			$this->id_visit = $row['id_visit'];
			$this->audit_brand = $row['audit_brand'];
			$this->available_brand = $row['available_brand'];
			return true;
			}
		}
				
	function getVisitBrandId($id_visit, $id_brand)
		{
		$sql = "SELECT * ";
		$sql .= "FROM `".$this->tableVisitBrand."` ";
		$sql .= "WHERE `id_visit` = '".$this->formatData($id_visit)."' ";
		$sql .= "AND `id_brand` = '".$this->formatData($id_brand)."' ;"; 
		
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
			$this->id_visit = $row['id_visit'];
			$this->audit_brand = $row['audit_brand'];
			$this->available_brand = $row['available_brand'];
			return true;
			}
		}

	function getBrandDoneCount($id_visit)
		{
		$sql = "SELECT COUNT(id_brand) ";
		$sql .= "FROM `".$this->tableVisitBrand."` b, `".$this->tableVisit."` v  ";
		$sql .= "WHERE b.id_visit = v.id ";
		$sql .= "AND v.id = '".$this->formatData($id_visit)."' ";
		
		$rsql = mysqli_query($this->connexion, $sql);
		//die($sql);
		if(mysqli_num_rows($rsql) == 0) 
			{
			return 0;
			}
		else
			{
			$line =  mysqli_fetch_row($rsql);
			return $line[0];
			}
		}
				
	function getAllVisitBrand($whereCritere='', $orderByCritere='')
		{
		$sql = "SELECT * ";
		$sql .= "FROM `".$this->tableVisitBrand."` ";
		
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
	function setVisitBrand()
		{
		$this->id = $this->getNewId();
		$sql = "INSERT INTO `".$this->tableVisitBrand."` (`id`, `id_visit`, `id_brand`, `audit_brand`, `available_brand`) ";
		$sql .= "VALUES ('".$this->id."','".$this->formatData($this->id_visit)."','".$this->formatData($this->id_brand)."','".$this->formatData($this->audit_brand)."','".$this->formatData($this->available_brand)."'); ";
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
	function updateVisitBrand($id)
		{
		$sql = "UPDATE `".$this->tableVisitBrand."` SET ";
		$sql .= "`id_visit` = '".$this->formatData($this->id_visit)."', "; 
		$sql .= "`id_brand` = '".$this->formatData($this->id_brand)."', "; 
		$sql .= "`audit_brand` = '".$this->formatData($this->audit_brand)."', "; 
		$sql .= "`available_brand` = '".$this->formatData($this->available_brand)."' ";
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
	function deleteVisitBrand($id)
		{
		$sql = "DELETE FROM `".$this->tableVisitBrand."` WHERE `id` = '".$this->formatData($id)."';"; 
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
	function getNewId()
		{
		$rsql = mysqli_query($this->connexion, " select max(`id`) from `".$this->tableVisitBrand."` ");
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