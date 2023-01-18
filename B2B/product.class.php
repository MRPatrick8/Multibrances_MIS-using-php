<?php
class product
	{
	var $id;
	var $name_product;
	var $category_product;
	var $serial_product;
	var $price_ontrade_product;
	var $price_offtrade_product;
	var $carton_product;
	var $size_product;
	var $table;
	var $message;
	var $number_lines;

// Opening the database	
	function product()
		{
		$this->id = -1;
		$this->table = "b2b_product";
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
	function getProduct($id)
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
			$this->name_product = $row['name_product'];
			$this->category_product = $row['category_product'];
			$this->serial_product = $row['serial_product'];
			$this->price_ontrade_product = $row['price_ontrade_product'];
			$this->price_offtrade_product = $row['price_offtrade_product'];
			$this->carton_product = $row['carton_product'];
			$this->size_product = $row['size_product'];
			return true;
			}
		}
	
	function getAllProduct($whereCritere='', $orderByCritere='')
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
	function setProduct()
		{
		$this->id = $this->getNewId();
		$sql = "INSERT INTO `".$this->table."` (`id`, `name_product`, `category_product`, `serial_product`, `price_ontrade_product`, `price_offtrade_product`, `carton_product`, `size_product`) ";
		$sql .= "VALUES ('".$this->id."','".$this->formatData($this->name_product)."','".$this->formatData($this->category_product)."','".$this->formatData($this->serial_product)."','".$this->formatData($this->price_ontrade_product)."','".$this->formatData($this->price_offtrade_product)."','".$this->formatData($this->carton_product)."','".$this->formatData($this->size_product)."'); ";
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
	function updateProduct($id)
		{
		$sql = "UPDATE `".$this->table."` SET ";
		$sql .= "`name_product` = '".$this->formatData($this->name_product)."', "; 
		$sql .= "`category_product` = '".$this->formatData($this->category_product)."', "; 
		$sql .= "`serial_product` = '".$this->formatData($this->serial_product)."', "; 
		$sql .= "`price_ontrade_product` = '".$this->formatData($this->price_ontrade_product)."', "; 
		$sql .= "`price_offtrade_product` = '".$this->formatData($this->price_offtrade_product)."', "; 
		$sql .= "`carton_product` = '".$this->formatData($this->carton_product)."', "; 
		$sql .= "`size_product` = '".$this->formatData($this->size_product)."' ";
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
	function deleteProduct($id)
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