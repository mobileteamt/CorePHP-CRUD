<?php
class Connection 
{	
	private $_host = 'localhost';
	private $_username = 'username';
	private $_password = 'password';
	private $_database = 'database';
	
	protected $connection;
	
	public function __construct()
	{
		if (!isset($this->connection)) {  // checked the connection for exisiting ones
			
			$this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database); // new connection creatation
			
			if (!$this->connection) {    // checked for the connection for error
				echo 'Cannot connect to database server';
				exit;
			}			
		}	
		
		return $this->connection;
	}
}
?>
