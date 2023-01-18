<?php
class order
	{
	var $id;
	var $id_user;
	var $id_outlet;
	var $date_order;
	var $details_order;
	var $status_order;
	var $delivery_user;
	var $delivery_datetime;
	var $id_order;
	var $id_product;
	var $quantity_ordered;
	var $tableOrder;
	var $tableOrderDetails;
	var $tableProduct;
	var $message;
	var $number_lines;

// Opening the database	
	function order()
		{
		$this->id = -1;
		$this->tableOrder = "b2b_order";
		$this->tableOrderDetails = "b2b_order_details";
		$this->tableProduct = "b2b_product";
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
	function getOrder($id)
		{
		$sql = "SELECT * ";
		$sql .= "FROM `".$this->tableOrder."` ";
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
			$this->date_order = $row['date_order'];
			$this->details_order = $row['details_order'];
			$this->status_order = $row['status_order'];
			return true;
			}
		}
	
	function getQuantityOrdered($id_order, $id_product)
		{
		$sql = "SELECT * ";
		$sql .= "FROM `".$this->tableOrderDetails."` ";
		$sql .= "WHERE `id_order` = '".$this->formatData($id_order)."'";
		$sql .= "AND `id_product` = '".$this->formatData($id_product)."';"; 
		
		$rsql = mysqli_query($this->connexion, $sql);
		//die($sql);
		if(mysqli_num_rows($rsql) == 0) 
			{
			$this->id = -1; 
			}
		else
			{ 
			$row = mysqli_fetch_assoc($rsql);
			$this->id_order = $row['id_order']; 
			$this->id_product = $row['id_product'];
			$this->quantity_ordered = $row['quantity_ordered'];
			return true;
			}
		}
	
	function getAllOrder($whereCritere='', $orderByCritere='')
		{
		$sql = "SELECT * ";
		$sql .= "FROM `".$this->tableOrder."` ";
		
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
		
	function getAllOrderDetails($whereCritere='', $orderByCritere='')
		{
		$sql = "SELECT * ";
		$sql .= "FROM `".$this->tableOrderDetails."` o, `".$this->tableProduct."` p ";
		$sql .= "WHERE o.id_product = p.id ";
		
		if($whereCritere)
			{
			$sql .= "AND ".$whereCritere;
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
	function setOrder()
		{
		$this->id = $this->getNewId();
		$sql = "INSERT INTO `".$this->tableOrder."` (`id`, `id_user`, `id_outlet`, `date_order`, `details_order`, `status_order`) ";
		$sql .= "VALUES ('".$this->id."','".$this->formatData($this->id_user)."','".$this->formatData($this->id_outlet)."','".$this->formatData($this->date_order)."','".$this->formatData($this->details_order)."','".$this->formatData($this->status_order)."'); ";
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

	function setOrderDetails($id_order)
		{
		$this->id_order = $id_order;
		$sql = "INSERT INTO `".$this->tableOrderDetails."` (`id_order`, `id_product`, `quantity_ordered`) ";
		$sql .= "VALUES ('".$this->formatData($this->id_order)."','".$this->formatData($this->id_product)."','".$this->formatData($this->quantity_ordered)."'); ";
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
	function updateOrder($id)
		{
		$sql = "UPDATE `".$this->tableOrder."` SET ";
		$sql .= "`id_user` = '".$this->formatData($this->id_user)."', "; 
		$sql .= "`id_outlet` = '".$this->formatData($this->id_outlet)."', "; 
		$sql .= "`date_order` = '".$this->formatData($this->date_order)."', "; 
		$sql .= "`details_order` = '".$this->formatData($this->details_order)."', "; 
		$sql .= "`status_order` = '".$this->formatData($this->status_order)."' ";
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

	function updateOrderDetails($id_order, $id_product)
		{
		$sql = "UPDATE `".$this->tableOrderDetails."` SET ";
		$sql .= "`quantity_ordered` = '".$this->formatData($this->quantity_ordered)."' ";
		$sql .= "WHERE `id_order` = '".$this->formatData($id_order)."' ";
		$sql .= "AND `id_product` = '".$this->formatData($id_product)."';"; 
		
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
	function deleteOrder($id)
		{
		$sql = "DELETE FROM `".$this->tableOrder."` WHERE `id` = '".$this->formatData($id)."';"; 
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

	function deleteOrderDetails($id_order)
		{
		$sql = "DELETE FROM `".$this->tableOrderDetails."` ";
		$sql .= "WHERE `id_order` = '".$this->formatData($id_order)."' ;"; 
		
		//die($sql);
		if(mysqli_query($this->connexion, $sql)) 
			{
			$this->id = $id_order;
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
		$rsql = mysqli_query($this->connexion, " select max(`id`) from `".$this->tableOrder."` ");
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