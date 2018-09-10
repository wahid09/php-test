<?php

/**
 * 
 */
class Database{
	
	public $host = HOST;
	public $user = USER;
	public $pass = PASS
	public $db   = DB;
	

	public $link;
	public $error;

	private function connectDB(){
		$this->link = new mysqli($this->host, $this->user, $this->pass, $this->db);
		if(!$this->link){
			$this->error = "connection failed". $this->link->connect_error;
		}
	}
}
?>