<?php
class outlet
	{
	var $id;
	var $name_outlet;
	var $manager_outlet;
	var $type_outlet;
	var $phone_outlet;
	var $email_outlet;
	var $location_outlet;
	var $gps_latitude_outlet;
	var $gps_longitude_outlet;
	var $login_outlet;
	var $passcode_outlet;
	var $table;
	var $message;
	var $number_lines;

// Opening the database	
	function outlet()
		{
		$this->id = -1;
		$this->table = "b2b_outlet";
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
	function getOutlet($id)
		{
		$sql = "SELECT * ";
		$sql .= "FROM `".$this->table."` ";
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
			$this->name_outlet = $row['name_outlet'];
			$this->manager_outlet = $row['manager_outlet'];
			$this->type_outlet = $row['type_outlet'];
			$this->phone_outlet = $row['phone_outlet'];
			$this->email_outlet = $row['email_outlet'];
			$this->location_outlet = $row['location_outlet'];
			$this->gps_latitude_outlet = $row['gps_latitude_outlet'];
			$this->gps_longitude_outlet = $row['gps_longitude_outlet'];
			$this->login_outlet = $row['login_outlet'];
			$this->passcode_outlet = $row['passcode_outlet'];
			return true;
			}
		}
	
	function IsOutlet($login,$passcode)
		{
		$sql = "SELECT * ";
		$sql .= "FROM `".$this->table."` ";
		$sql .= "WHERE login_outlet = '".$this->formatData($login)."' "; 
		$sql .= "AND passcode_outlet = '".$this->formatData($passcode)."' "; 
		
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
			$this->name_outlet = $row['name_outlet'];
			$this->manager_outlet = $row['manager_outlet'];
			$this->type_outlet = $row['type_outlet'];
			$this->phone_outlet = $row['phone_outlet'];
			$this->email_outlet = $row['email_outlet'];
			$this->location_outlet = $row['location_outlet'];
			$this->gps_latitude_outlet = $row['gps_latitude_outlet'];
			$this->gps_longitude_outlet = $row['gps_longitude_outlet'];
			$this->login_outlet = $row['login_outlet'];
			$this->passcode_outlet = $row['passcode_outlet'];
			return true;
			}
		}
	
	function getAllOutlet($whereCritere='', $orderByCritere='', $page=1, $limit=10)
		{
		$sql = "SELECT * ";
		$sql .= "FROM `".$this->table."` ";
		
		if($whereCritere)
			{
			$sql .= "WHERE ".$whereCritere;
			}
		if($orderByCritere)
			{
			$sql .= "ORDER BY ".$orderByCritere;
			}
		
		$startRow = $limit * ($page - 1);
		
		$sql .= " LIMIT ".$startRow.", ".$limit;		
		
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
		
	function getOutletLocations()
		{
		$sql = "SELECT DISTINCT(`location_outlet`) ";
		$sql .= "FROM `".$this->table."` ";
		$sql .= "ORDER BY location_outlet ";
		
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
	function setOutlet()
		{
		$this->id = $this->getNewId();
		$sql = "INSERT INTO `".$this->table."` (`id`, `name_outlet`, `manager_outlet`, `type_outlet`, `phone_outlet`, `email_outlet`, `location_outlet`, `gps_latitude_outlet`, `gps_longitude_outlet`, `login_outlet`, `passcode_outlet`) ";
		$sql .= "VALUES ('".$this->id."','".$this->formatData($this->name_outlet)."','".$this->formatData($this->type_outlet)."','".$this->formatData($this->phone_outlet)."','".$this->formatData($this->email_outlet)."','".$this->formatData($this->location_outlet)."','".$this->formatData($this->gps_latitude_outlet)."','".$this->formatData($this->gps_longitude_outlet)."','".$this->formatData($this->login_outlet)."','".$this->formatData($this->passcode_outlet)."'); ";
		
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
	function updateOutlet($id)
		{
		$sql = "UPDATE `".$this->table."` SET ";
		$sql .= "`name_outlet` = '".$this->formatData($this->name_outlet)."', "; 
		$sql .= "`manager_outlet` = '".$this->formatData($this->manager_outlet)."', "; 
		$sql .= "`type_outlet` = '".$this->formatData($this->type_outlet)."', "; 
		$sql .= "`phone_outlet` = '".$this->formatData($this->phone_outlet)."', "; 
		$sql .= "`email_outlet` = '".$this->formatData($this->email_outlet)."', "; 
		$sql .= "`location_outlet` = '".$this->formatData($this->location_outlet)."', "; 
		$sql .= "`gps_latitude_outlet` = '".$this->formatData($this->gps_latitude_outlet)."', "; 
		$sql .= "`gps_longitude_outlet` = '".$this->formatData($this->gps_longitude_outlet)."', "; 
		$sql .= "`login_outlet` = '".$this->formatData($this->login_outlet)."', "; 
		$sql .= "`passcode_outlet` = '".$this->formatData($this->passcode_outlet)."' ";
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

//Update GPS
	function updateGPSOutlet($id)
		{
		$sql = "UPDATE `".$this->table."` SET ";
		$sql .= "`gps_latitude_outlet` = '".$this->formatData($this->gps_latitude_outlet)."', "; 
		$sql .= "`gps_longitude_outlet` = '".$this->formatData($this->gps_longitude_outlet)."' "; 
		$sql .= "WHERE `id` = '".$this->formatData($id)."';"; 
		//die($sql);
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
	function deleteOutlet($id)
		{
		$sql = "DELETE FROM `".$this->table."` WHERE `id` = '".$this->formatData($id)."';"; 
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
		$rsql = mysqli_query($this->connexion, " select max(`id`) from `".$this->table."` ");
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