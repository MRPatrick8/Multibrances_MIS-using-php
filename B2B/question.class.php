<?php
class question
	{
	var $id;
	var $text_gestion;
	var $type_reponse_question;
	var $days_used_question;
	var $status_question;
	var $tableQuestion;
	var $message;
	var $number_lines;

// Opening the database	
	function question()
		{
		$this->id = -1;
		$this->tableQuestion = "b2b_audit_question";
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
	function getQuestion($id)
		{
		$sql = "SELECT * ";
		$sql .= "FROM `".$this->tableQuestion."` ";
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
			$this->text_question = $row['text_question'];
			$this->type_response_question = $row['type_response_question'];
			$this->days_used_question = $row['days_used_question'];
			$this->status_question = $row['status_question'];
			return true;
			}
		}
		
	function getAllQuestion($whereCritere='', $orderByCritere='')
		{
		$sql = "SELECT * ";
		$sql .= "FROM `".$this->tableQuestion."` ";
		
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
	function setQuestion()
		{
		$this->id = $this->getNewId();
		$sql = "INSERT INTO `".$this->tableQuestion."` (`id`, `text_question`, `type_response_question`, `days_used_question`,`status_question`) ";
		$sql .= "VALUES ('".$this->id."','".$this->formatData($this->text_question)."','".$this->formatData($this->type_response_question)."','".$this->formatData($this->days_used_question)."','".$this->formatData($this->status_question)."'); ";
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
	function updateQuestion($id)
		{
		$sql = "UPDATE `".$this->tableQuestion."` SET ";
		$sql .= "`text_question` = '".$this->formatData($this->text_question)."', "; 
		$sql .= "`type_response_question` = '".$this->formatData($this->type_response_question)."', "; 
		$sql .= "`days_used_question` = '".$this->formatData($this->days_used_question)."', "; 
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
	function deleteQuestion($id)
		{
		$sql = "DELETE FROM `".$this->tableQuestion."` WHERE `id` = '".$this->formatData($id)."';"; 
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
		$rsql = mysqli_query($this->connexion, " select max(`id`) from `".$this->tableQuestion."` ");
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