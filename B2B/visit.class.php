<?php
class visit
	{
	var $id;
	var $id_user;
	var $id_outlet;
	var $datetime_visit;
	var $audit_visit;
	var $tableVisit;
	var $message;
	var $number_lines;

// Opening the database	
	function visit()
		{
		$this->id = -1;
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
			$this->id_user = $row['id_user'];
			$this->id_outlet = $row['id_outlet'];
			$this->datetime_visit = $row['datetime_visit'];
			$this->audit_visit = $row['audit_visit'];
			return true;
			}
		}
				
	function getVisitUserOutlet($user, $outlet, $date)
		{
		$sql = "SELECT * ";
		$sql .= "FROM `".$this->tableVisit."` ";
		$sql .= "WHERE `id_user` = '".$this->formatData($user)."' "; 
		$sql .= "AND `id_outlet` = '".$this->formatData($outlet)."' "; 
		$sql .= "AND date(`datetime_visit`) = '".$this->formatData($date)."';"; 
		
		$rsql = mysqli_query($this->connexion, $sql);
		//die($sql);
		if(mysqli_num_rows($rsql) == 0) 
			{
			$this->id = -1;
			return false;
			}
		else
			{ 
			$row = mysqli_fetch_assoc($rsql);
			$this->id = $row['id']; 
			$this->id_user = $row['id_user'];
			$this->id_outlet = $row['id_outlet'];
			$this->datetime_visit = $row['datetime_visit'];
			$this->audit_visit = $row['audit_visit'];
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
		$this->id = $this->getNewId();
		$sql = "INSERT INTO `".$this->tableVisit."` (`id`, `id_user`, `id_outlet`, `datetime_visit`, `audit_visit`) ";
		$sql .= "VALUES ('".$this->id."','".$this->formatData($this->id_user)."','".$this->formatData($this->id_outlet)."','".$this->formatData($this->datetime_visit)."','".$this->formatData($this->audit_visit)."'); ";
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
		$sql .= "`id_user` = '".$this->formatData($this->id_user)."', "; 
		$sql .= "`id_outlet` = '".$this->formatData($this->id_outlet)."', "; 
		$sql .= "`datetime_visit` = '".$this->formatData($this->datetime_visit)."', "; 
		$sql .= "`audit_visit` = '".$this->formatData($this->audit_visit)."' ";
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
	function getNewId()
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