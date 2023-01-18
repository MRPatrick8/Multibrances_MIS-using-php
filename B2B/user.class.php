<?php
class user
	{
	var $id;
	var $firstname_user;
	var $lastname_user;
	var $phone_user;
	var $email_user;
	var $login_user;
	var $password_user;
	var $type_user;
	var $table;
	var $tableLink;
	var $id_user;
	var $id_outlet;
	var $cycle_week;
	var $cycle_day;
	var $message;
	var $number_lines;

// Opening the database	
	function user()
		{
		$this->id = -1;
		$this->tableUser = "b2b_user";
		$this->tableLink = "b2b_user_outlet";
		$this->tableOutlet = "b2b_outlet";
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
	function getUser($id)
		{
		$sql = "SELECT * ";
		$sql .= "FROM `".$this->tableUser."` ";
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
			$this->firstname_user = $row['firstname_user'];
			$this->lastname_user = $row['lastname_user'];
			$this->phone_user = $row['phone_user'];
			$this->email_user = $row['email_user'];
			$this->login_user = $row['login_user'];
			$this->password_user = $row['password_user'];
			$this->type_user = $row['type_user'];
			return true;
			}
		}
	
	function getBusinessUser($id_outlet)
		{
		$sql = "SELECT * ";
		$sql .= "FROM `".$this->tableLink."` l, `".$this->tableUser."` u ";
		$sql .= "WHERE l.`id_user` = u.`id`";
		$sql .= "AND `id_outlet` = '".$this->formatData($id_outlet)."';"; 
		
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
			$this->id = $row['id_user']; 
			$this->id_user = $row['id_user'];
			$this->id_outlet = $row['id_outlet'];
			$this->cycle_week = $row['cycle_week'];
			$this->cycle_day = $row['cycle_day'];
			$this->firstname_user = $row['firstname_user'];
			$this->lastname_user = $row['lastname_user'];
			$this->phone_user = $row['phone_user'];
			$this->email_user = $row['email_user'];
			return true;
			}
		}
	
	function IsUser($compte,$motDePasse)
		{
		$sql = "SELECT * ";
		$sql .= "FROM `".$this->tableUser."` ";
		$sql .= "WHERE login_user = '".$this->formatData($compte)."' "; 
		$sql .= "AND password_user = '".$this->formatData($motDePasse)."' "; 
		
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
			$this->firstname_user = $row['firstname_user'];
			$this->lastname_user = $row['lastname_user'];
			$this->phone_user = $row['phone_user'];
			$this->email_user = $row['email_user'];
			$this->login_user = $row['login_user'];
			$this->password_user = $row['password_user'];
			$this->type_user = $row['type_user'];
			return true;
			}
		}
	
	function getAllUser($whereCritere='', $orderByCritere='')
		{
		$sql = "SELECT * ";
		$sql .= "FROM `".$this->tableUser."` ";
		
		if($whereCritere)
			{
			$sql .= " WHERE ".$whereCritere;
			}
		if($orderByCritere)
			{
			$sql .= " ORDER BY ".$orderByCritere;
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
		
	function getAllUserOutlet($whereCritere='', $orderByCritere='')
		{
		$sql = "SELECT *,  ";
		$sql .= "  CASE cycle_day ";
		$sql .= "    WHEN 'Monday' THEN 1 ";
		$sql .= "    WHEN 'Tuesday' THEN 2 ";
		$sql .= "    WHEN 'Wednesday' THEN 3 ";
		$sql .= "    WHEN 'Thursday' THEN 4 ";
		$sql .= "    WHEN 'Friday' THEN 5 ";
		$sql .= "    WHEN 'Saturday' THEN 6 ";
		$sql .= "    WHEN 'Sunday' THEN 7 End ";
		$sql .= "  AS SortWeekday ";
		$sql .= "FROM `".$this->tableLink."`ou, `".$this->tableOutlet."` o ";
		$sql .= "WHERE  ou.id_outlet = o.id ";
		
		if($whereCritere)
			{
			$sql .= " AND ".$whereCritere;
			}
		if($orderByCritere)
			{
			$sql .= " ORDER BY ".$orderByCritere;
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
		
	function getUserCallCycle($user, $week, $day, $orderByCritere='')
		{
		$sql = "SELECT * ";
		$sql .= "FROM `".$this->tableLink."` ou, `".$this->tableOutlet."` o ";
		$sql .= "WHERE  ou.id_outlet = o.id ";
		$sql .= "AND id_user = '".$this->formatData($user)."' ";
		$sql .= "AND cycle_week = '".$this->formatData($week)."' ";
		$sql .= "AND cycle_day = '".$this->formatData($day)."' ";
		if($orderByCritere)
			{
			$sql .= " ORDER BY ".$orderByCritere;
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
	function setUser()
		{
		$this->id = $this->getNewId();
		$sql = "INSERT INTO `".$this->tableUser."` (`id`, `firstname_user`, `lastname_user`, `phone_user`, `email_user`, `login_user`, `password_user`, `type_user`) ";
		$sql .= "VALUES ('".$this->id."','".$this->formatData($this->firstname_user)."','".$this->formatData($this->lastname_user)."','".$this->formatData($this->phone_user)."','".$this->formatData($this->email_user)."','".$this->formatData($this->login_user)."','".$this->formatData($this->password_user)."','".$this->formatData($this->type_user)."'); ";
		
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

	function setUserOutlet()
		{
		$this->id = $this->getNewId();
		$sql = "INSERT INTO `".$this->tableLink."` (`id_user`, `id_outlet`, `cycle_week`, `cycle_day`) ";
		$sql .= "VALUES ('".$this->id_user."','".$this->formatData($this->id_outlet)."','".$this->formatData($this->cycle_week)."','".$this->formatData($this->cycle_day)."'); ";
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
	function updateUser($id)
		{
		$sql = "UPDATE `".$this->tableUser."` SET ";
		$sql .= "`firstname_user` = '".$this->formatData($this->firstname_user)."', "; 
		$sql .= "`lastname_user` = '".$this->formatData($this->lastname_user)."', "; 
		$sql .= "`phone_user` = '".$this->formatData($this->phone_user)."', "; 
		$sql .= "`email_user` = '".$this->formatData($this->email_user)."', "; 
		$sql .= "`login_user` = '".$this->formatData($this->login_user)."', "; 
		$sql .= "`password_user` = '".$this->formatData($this->password_user)."', "; 
		$sql .= "`type_user` = '".$this->formatData($this->type_user)."' ";
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

	function updateUserOutlet($id_outlet)
		{
		$sql = "UPDATE `".$this->tableLink."` SET ";
		$sql .= "`id_user` = '".$this->formatData($this->id_user)."', ";
		$sql .= "`cycle_week` = '".$this->formatData($this->cycle_week)."', ";
		$sql .= "`cycle_day` = '".$this->formatData($this->cycle_day)."' ";
		$sql .= "WHERE `id_outlet` = '".$this->formatData($id_outlet)."';"; 
		//die($sql);
		if(mysqli_query($this->connexion, $sql))
			{
			$this->message = "ok2";
			}
		else 
			{
			$this->id = -1; 
			$this->message = "nok2";
			}
		}

//Removal
	function deleteUser($id)
		{
		$sql = "DELETE FROM `".$this->tableUser."` WHERE `id_user` = '".$this->formatData($id)."';"; 
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

	function deleteUserOutlet($id_outlet, $id_user)
		{
		$sql = "DELETE FROM `".$this->tableLink."` "; 
		$sql .= "WHERE `id_user` = '".$this->formatData($id_user)."' "; 
		$sql .= "AND `id_outlet` = '".$this->formatData($id_outlet)."';"; 
		//die($sql);
		if(mysqli_query($this->connexion, $sql)) 
			{
			$this->id = $id_user;
			$this->message = "ok3";
			}
		else
			{ 
			$this->id = -1; 
			$this->message = "nok3";
			}
		}

//Modification
	function updateInfosUser($id)
		{
		$sql = "UPDATE `".$this->tableUser."` SET ";
		$sql .= "`firstname_user` = '".$this->formatData($this->firstname_user)."', "; 
		$sql .= "`lastname_user` = '".$this->formatData($this->lastname_user)."', "; 
		$sql .= "`phone_user` = '".$this->formatData($this->phone_user)."', "; 
		$sql .= "`email_user` = '".$this->formatData($this->email_user)."', "; 
		$sql .= "`login_user` = '".$this->formatData($this->login_user)."', "; 
		$sql .= "`language_user` = '".$this->formatData($this->language_user)."' "; 
		$sql .= "WHERE `id` = '".$this->formatData($id)."';"; 
		
		if(mysqli_query($this->connexion, $sql))
			{
			$this->id = $id;
			$this->message = "Record updated successfully";
			}
		else 
			{
			$this->id = -1; 
			$this->message = "Update failed: an unexpected error has occurred!";
			}
		}

//Modification
	function updateUserPwd($id)
		{
		$sql = "UPDATE `".$this->tableUser."` SET ";
		$sql .= "`password_user` = '".$this->formatData($this->password_user)."' "; 
		$sql .= "WHERE `id` = '".$this->formatData($id)."';"; 
		
		if(mysqli_query($this->connexion, $sql))
			{
			$this->id = $id;
			$this->message = "Record updated successfully";
			}
		else 
			{
			$this->id = -1; 
			$this->message = "Update failed: an unexpected error has occurred!";
			}
		}

//New id
	function getNewId()
		{
		$rsql = mysqli_query($this->connexion, " select max(`id`) from `".$this->tableUser."` ");
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