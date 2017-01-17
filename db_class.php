<?php

class DBConnection{
	
	var $link;
	var $query;
	var $result;
	var $table;
	var $fields;
	var $where;
	var $rows;
	
	function __construct()
	{

				$this->link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);
				if (!$this->link) {
					$message = "Cannot connect to the database.";
					$_SESSION['message'] = array('danger',$message);
					} 
					else
					$_SESSION['dbconn'] = $this->link;
	}
	
	function remove()
	{
				$this->query = "DELETE FROM ".$this->table." WHERE ".$this->where;
				$this->result = mysqli_query($this->link, $this->query);
				
				if(!$this->result)
				{
					$_SESSION['mysqli_error'] = mysqli_error($this->link);
				}
				return $this->result;
	}
	
	function select()
	{
				$this->query = "SELECT ";
				$this->query .= implode(",", array_keys($this->fields));
				$this->query .= " FROM ".$this->table;
				
				if($this->where)
					$this->query .= " WHERE ".$this->where;
				
				$this->result = mysqli_query($this->link, $this->query);
				
					while ($record = mysqli_fetch_assoc($this->result)) {
							$this->rows[] = $record;
						}
				
				return $this->rows;
				
				
				
				// $this->rows = mysqli_fetch_array($this->result);
				// return $this->rows;
				// die(print_r($this->rows));
		
/*  					if(!$this->result)
					{
						$_SESSION['mysqli_error'] = mysqli_error($this->link);
						$_SESSION['mysqli_error'] .= " Query: ".$this->query; 
					}
					return $this->result; */
	}
	
	function update()
	{
				$this->query = "UPDATE ".$this->table." SET ";
				
				$fields_collect = null;

				foreach($this->fields as $k=>$v)
				{
					$fields_collect .= $k."='".$v."',";
				}
				$fields_collect1 = substr($fields_collect,0,strlen($fields_collect)-1);
				$this->query .= $fields_collect1;
				$this->query .= " WHERE ".$this->where;
				
				$this->result = mysqli_query($this->link, $this->query);
		
					if(!$this->result)
					{
						$_SESSION['mysqli_error'] = mysqli_error($this->link);
						$_SESSION['mysqli_error'] .= " Query: ".$this->query; 
					}
					return $this->result;
		
	}
	
	function insert()
	{
					$this->query = "INSERT INTO ".$this->table." (";
					

					$fields_collect = null;
					
					foreach($this->fields as $k=>$v)
					{
						$fields_collect .= $k.",";
					}
					$fields_collect1 = substr($fields_collect, 0,strlen($fields_collect)-1);
					
					$this->query .= $fields_collect1." ) VALUES (";
					
					$values_collect = null;

					
					foreach($this->fields as $k=>$v)
					{
						$values_collect .= "'".$v."',";
					}
					
					$values_collect1 = substr($values_collect, 0,strlen($values_collect)-1);

					$this->query .= $values_collect1.")";
					
					$this->result = mysqli_query($this->link, $this->query);
		
			if(!$this->result)
			{
				$_SESSION['mysqli_error'] = mysqli_error($this->link);
				$_SESSION['mysqli_error'] .= " Query: ".$this->query; 
			}
			return $this->result;
		
	

		
	}
	
	
	
}


?>