<?php
class brand
	{
	var $id;
	var $name_brand;
	var $own_brand;
	var $status_brand;
	var $tableBrand;
	var $message;
	var $number_lines;

// Opening the database	
	function brand()
		{
		$this->id = -1;
		$this->tableBrand = "b2b_audit_brand";
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
	function getBrand($id)
		{
		$sql = "SELECT * ";
		$sql .= "FROM `".$this->tableBrand."` ";
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
	
	function getBrandCount()
		{
		$rsql = mysqli_query($this->connexion, " select count(`id`) from `".$this->tableBrand."` ");
		$line = mysqli_fetch_row($rsql);
		return $line;
		}

				
	function getAllBrand($whereCritere='', $orderByCritere='')
		{
		$sql = "SELECT * ";
		$sql .= "FROM `".$this->tableBrand."` ";
		
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
	function setBrand()
		{
		$this->id = $this->getNewId();
		$sql = "INSERT INTO `".$this->tableBrand."` (`id`, `name_brand`, `own_brand`, `status_brand`) ";
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
	function updateBrand($id)
		{
		$sql = "UPDATE `".$this->tableBrand."` SET ";
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
	function deleteBrand($id)
		{
		$sql = "DELETE FROM `".$this->tableBrand."` WHERE `id` = '".$this->formatData($id)."';"; 
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
		$rsql = mysqli_query($this->connexion, " select max(`id`) from `".$this->tableBrand."` ");
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