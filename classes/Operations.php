<?php
include_once 'Connection.php';

class Operations extends Connection
{
	public function __construct()
	{
		parent::__construct();
	}
	/*
	 #Function to get the data of the users
	 #Input mySQL query
	 #Output data in array
	*/
	public function getData($query)
	{		
		$result = $this->connection->query($query);
		
		if ($result == false) {
			return false;
		} 
		
		$rows = array();
		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;
	}
		
	/*
	 #Function to execute the query
	 #Input mySQL query
	 #Output true/false
	*/
	public function execute($query) 
	{
		$result = $this->connection->query($query);
		
		if ($result == false) {
			echo 'Error: cannot execute the command';
			return false;
		} else {
			return true;
		}		
	}
	/*
	 #Function to delete the data of the table
	 #Input id to delete, table from which data needs to delete
	 #Output true/false
	*/
	public function delete($id, $table) 
	{ 
		$query = "DELETE FROM $table WHERE id = $id";
		
		$result = $this->connection->query($query);
	
		if ($result == false) {
			echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
			return false;
		} else {
			return true;
		}
	}
	/*
	 #Function to correct the format of the string
	 #Input will be the string that needs to correct
	 #Output corrected string
	*/
	public function escape_string($value)
	{
		return $this->connection->real_escape_string($value);
	}
}
?>
